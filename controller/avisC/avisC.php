<?php
require_once __DIR__."/../../config.php";
require_once __DIR__."/../../model/avis.php";

	class avisC{

		public function listavis()
		{
			$sql="SELECT *,B.id as idR,B.status as status FROM avis B inner join utilisateurs A on B.UserID = A.id ORDER BY B.id DESC";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		function deleteavis($id)
		{
			$sql = "DELETE FROM avis WHERE id = :id";
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
					'UPDATE avis SET
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

		function recupererMonavis($id){
			$sql="SELECT * from avis where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
	
				$type = $query->fetch(PDO::FETCH_OBJ);
				return $type;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		
		}
	}











$db = config::getConnexion();
if(isset($_GET["add"])&&isset($_POST["rating_data"])&&!empty($_POST["rating_data"]))
{
	$review = new avis(
	    $_POST["article_id"],  
		$_POST["UserID"],  
		$_POST["rating_data"],   
		$_POST["user_review"],  
		);


		$sql = "INSERT INTO avis
		(article_id,UserID, user_rating, user_review,datetime,status) 
		VALUES (:article_id,:UserID, :user_rating, :user_review,:datetime,:status)";
       
    
			$data = array(
			'article_id' => $review->getarticleID(),
			':UserID'		=>	$review->getuserID(),
			':user_rating'		=>	$review->getuser_rating(),
			':user_review'		=>	$review->getuser_review(),
			':datetime'			=>	date('Y-m-d H:i:s'),
			':status'			=>  "pending",
		);		  
		$statement = $db->prepare($sql);

		$statement->execute($data);
		

    }

if(isset($_POST["action"]))
{
	
	$average_rating = 0;
	$total_review = 0;
	$five_star_review = 0;
	$four_star_review = 0;
	$three_star_review = 0;
	$two_star_review = 0;
	$one_star_review = 0;
	$total_user_rating = 0;
	$review_content = array();
	//userid
	$id=$_GET["id"];
	$query = "SELECT *,B.id as idR FROM avis B inner join utilisateurs A on B.UserID = A.id inner join articles y on B.article_id = y.id where y.id=$id and B.status='accepted'  ORDER BY B.datetime DESC ";
    $result = $db->query($query, PDO::FETCH_ASSOC);

	foreach($result as $row)
	{
		$status="";
		if($row["status"]=="pending"){
			$status="Pending";
		}else{
			$status="Treated - Check inbox";
		}
		$review_content[] = array(
			'user_name'		=>	$row["pseudo"],
			'user_review'	=>	$row["user_review"],
			'rating'		=>	$row["user_rating"],
			'datetime'		=>	date('Y-m-d', strtotime($row["datetime"])),
			'id' =>	$row["idR"],
			'status'   =>	$status,
		);

		if($row["user_rating"] == '5')
		{
			$five_star_review++;
		}

		if($row["user_rating"] == '4')
		{
			$four_star_review++;
		}

		if($row["user_rating"] == '3')
		{
			$three_star_review++;
		}

		if($row["user_rating"] == '2')
		{
			$two_star_review++;
		}

		if($row["user_rating"] == '1')
		{
			$one_star_review++;
		}

		$total_review++;

		$total_user_rating = $total_user_rating + $row["user_rating"];

	}

	$average_rating = $total_user_rating / $total_review;

	$output = array(
		'average_rating'	=>	number_format($average_rating, 1),
		'total_review'		=>	$total_review,
		'five_star_review'	=>	$five_star_review,
		'four_star_review'	=>	$four_star_review,
		'three_star_review'	=>	$three_star_review,
		'two_star_review'	=>	$two_star_review,
		'one_star_review'	=>	$one_star_review,
		'review_data'		=>	$review_content
	);

	echo json_encode($output);

}

?>






