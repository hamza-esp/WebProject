<?php 
    session_start(); // Démarrage de la session
   // require_once 'config.php'; // On inclut la connexion à la base de données
include "../../config.php";
    if(!empty($_POST['email']) && !empty($_POST['password'])) // Si il existe les champs email, password et qu'il sont pas vident
    {
        // Patch XSS
        $email = htmlspecialchars($_POST['email']); 
        $password = htmlspecialchars($_POST['password']);
        
        $email = strtolower($email); // email transformé en minuscule
        
        // On regarde si l'utilisateur est inscrit dans la table utilisateurs
        $db = config::getConnexion();
        $check = $db->prepare('SELECT * FROM utilisateurs WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();
        
        

        // Si > à 0 alors l'utilisateur existe
        if($row > 0)
        {

            // Si le mail est bon niveau format
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                // Si le mot de passe est le bon
                if(password_verify($password, $data['password']))
                {
       
                    $_SESSION['user'] = $data['id'];

                  
                    if($data['role'] == "client"){
                        $_SESSION['role'] = "client";
                        header('Location: ../../view/index.php');
                        die();

                    }elseif($data['role'] == "admin"){
                        $_SESSION['role'] = "admin";
                        header('Location:../../view/admin/index.php');
                        die();
                    }
                    
                

                   
   
                }else{ header('Location: ../../view/connection.php?login_err=password'); die(); }
            }else{ header('Location: ../../view/connection.php?login_err=email'); die(); }
        }else{ header('Location: ../../view/connection.php?login_err=already'); die(); }
    }else{ header('Location: ../../view/connection.php'); die();} // si le formulaire est envoyé sans aucune données 