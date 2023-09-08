<?PHP
	include "avisC.php";

    
    $avisC = new avisC();

  
		$avisC->treated($_GET["id"],"accepted");
		header('Location:../../view/admin/avis.php');
	



?>
