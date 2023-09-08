<?PHP
	include "avisC.php";

    
    $avisC = new avisC();

  
		$avisC->deleteavis($_GET["delete"]);
		header('Location:../../view/admin/avis.php');



?>
