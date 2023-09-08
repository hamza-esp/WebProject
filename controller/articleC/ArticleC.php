<?php
require_once __DIR__ . "/../../config.php";
require_once __DIR__ . "/../../model/article.php";

class ArticleC
{
    public function listArticles($user)
    {

        if ($user=="admin"){
            $sql="SELECT * FROM articles";
        }else   if ($user=="client"){
            $sql="SELECT * FROM articles where status = 'accepted'"; 
        }
 
         
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    public function mesArticles($id)
    {

    $sql="SELECT * FROM articles where user_id=".$id;
         
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    public function getArticleById($id)
    {
        $sql="SELECT * FROM articles where id=$id";
        $db = config::getConnexion();     
            $query=$db->prepare($sql);
            $query->execute();

            $type=  $query->fetchAll(PDO::FETCH_ASSOC);
            return $type;
    }

    public function insertArticle($title, $subject, $user_id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'INSERT INTO articles (title, subject, user_id, created_at,status) VALUES (:title, :subject, :user_id, NOW(),"pending")'
            );
            $query->bindParam(':title', $title);
            $query->bindParam(':subject', $subject);
            $query->bindParam(':user_id', $user_id);
    
            if ($query->execute()) {
                return $db->lastInsertId();
            } else {
                // Insertion failed, handle the error gracefully
                throw new Exception('Failed to insert the article.');
            }
        } catch (PDOException $e) {
            // Handle database-related errors
            die('Database Error: ' . $e->getMessage());
        } catch (Exception $e) {
            // Handle other exceptions (e.g., custom application-specific errors)
            die('Error: ' . $e->getMessage());
        }
    }
    

    public function updateArticle($id, $title, $subject)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE articles SET
                subject	 = :subject,
                title =:title,
                created_at = NOW()
                WHERE id = :id'
            );
            $query->execute([
                'title' => $title,
                'subject' => $subject,
                'id' => $id
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function deleteArticle($id)
    {
        $sql = "DELETE FROM articles WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function treated($id,$status){
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE articles SET
                    status = :status
                WHERE id = :id'
            );
            $query->execute([
                'status' => $status,
                'id' => $id
            ]);
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}







?>

