<?php 
    require_once '../../config.php'; // On inclu la connexion à la bdd
    session_start();
    // Si les variables existent et qu'elles ne sont pas vides

        // Patch XSS
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $password_retype = htmlspecialchars($_POST['password_retype']);

        // On vérifie si l'utilisateur existe
        $db = config::getConnexion();
        $check = $db->prepare('SELECT pseudo, email FROM utilisateurs WHERE id = ?');
        $check->execute(array($_SESSION['user']));
        $data = $check->fetch();
        $row = $check->rowCount();

        $email = strtolower($email); // on transforme toute les lettres majuscule en minuscule pour éviter que Foo@gmail.com et foo@gmail.com soient deux compte différents ..
        
        // Si la requete renvoie un 0 alors l'utilisateur n'existe pas 


        if ($pseudo == $data['pseudo'] && $email == $data['email'] && empty($_POST['password'])  ) {
            header('Location: ../../view/usermodif.php?reg_err=pasmodif'); die();
        }  

        if ($pseudo != $data['pseudo'] && $email != $data['email']) {   
                $modefy = $db->prepare("UPDATE `utilisateurs` SET `pseudo`=:pseudo WHERE id=:id");
                $modefy->execute(array(
                    'pseudo' => $pseudo,
                    'id' => $_SESSION['user']
                ));        
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {                
                $modefy = $db->prepare("UPDATE `utilisateurs` SET `email`=:email WHERE id=:id");
                $modefy->execute(array(
                    'email' => $email,
                    'id' => $_SESSION['user']
                ));            
    }else{ header('Location: ../../view/usermodif.php?reg_err=email'); die();}

header('Location: ../../view/usermodif.php?reg_err=emailandp' );die();
        }

        if ($pseudo != $data['pseudo']) {   
            if(strlen($pseudo) <= 100){ // On verifie que la longueur du pseudo <= 100

                $modefy = $db->prepare("UPDATE `utilisateurs` SET `pseudo`=:pseudo WHERE id=:id");
                $modefy->execute(array(
                    'pseudo' => $pseudo,
                    'id' => $_SESSION['user']
                ));

            }
            header('Location: ../../view/usermodif.php?reg_err=pseudo_length');
        }
      if ($email != $data['email'] ) {    
                    if(filter_var($email, FILTER_VALIDATE_EMAIL))
                    {                
                        $modefy = $db->prepare("UPDATE `utilisateurs` SET `email`=:email WHERE id=:id");
                        $modefy->execute(array(
                            'email' => $email,
                            'id' => $_SESSION['user']
                        ));            
            }else{ header('Location: ../../view/usermodif.php?reg_err=email'); die();}

        header('Location: ../../view/usermodif.php?reg_err=email_length' );die();
    }   
    
    
            if(!empty($_POST['password']))
{
                        if($password === $password_retype){ // si les deux mdp saisis sont bon
                            if(strlen($password) >= 8){   
                            // On hash le mot de passe avec Bcrypt, via un coût de 12
                            $cost = ['cost' => 12];
                            $password = password_hash($password, PASSWORD_BCRYPT, $cost);

                            $modefy = $db->prepare("UPDATE `utilisateurs` SET `password`=:password WHERE id=:id");
                            $modefy->execute(array(
                                'password' => $password,
                                'id' => $_SESSION['user']
                            ));
                            // On redirige avec le message de succès
                            header('Location: ../../view/usermodif.php?reg_err=success');
                            die();
                            }else{ header('Location: ../../view/usermodif.php?reg_err=password_length'); die();}
                        }else{ header('Location: ../../view/usermodif.php?reg_err=password'); die();}

                    }
    