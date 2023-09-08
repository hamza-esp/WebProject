<?PHP
	include "ArticleC.php";

    
    $ArticlesC = new ArticleC();

	if($_GET["id"]){
		$ArticlesC->deleteArticle($_GET["id"]);
		header('Location:../../view/mes-articles.php');
	}
	
if($_GET["delete"]){	
	$ArticlesC->deleteArticle($_GET["delete"]);
	header('Location: ../../view/admin/articles.php');
}



?>
