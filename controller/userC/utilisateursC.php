<?php




class utilisateursC
{
    public function listutilisateurs($id)
    {
        $db = config::getConnexion();
        $req = $db->prepare('SELECT * FROM utilisateurs WHERE token != ?');
        $req->execute(array($id));
        $data = $req->fetchAll();
        return $data;
    }

    function deleteutilisateurs($id)
    {
        $sql = "DELETE FROM utilisateurs WHERE token = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }



    function GetUSER($id)
    {
        $db = config::getConnexion();
        $req = $db->prepare('SELECT * FROM utilisateurs WHERE token = ?');
        $req->execute(array($id));
        $data = $req->fetch();
        return $data;
    }

}
