<?PHP
	include "ArticleC.php";

    
    $ArticlesC = new ArticleC();

		$ArticlesC->treated($_GET["id"],"accepted");
		header('Location:../../view/admin/articles.php');




?>
