<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
	<meta charset="utf-8"/>  <!-- norme html 5 -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/style_menu.css">
	<link rel="stylesheet" type="text/css" href="../css/style_evenement.css">

	<title> Site d'anima'fond, une association d'art du cirque et de monocycle</title>
</head>
<body>
	<?php
		include("squelettePage/menu.php");
		echo '<div id="mainDiv" class= "col-md-8 col-md-offset-2">';

		require_once("../manager/ArticleManager.php");

		$articleManager=new ArticleManager();
		$articleManager->setDb($mainManager->getDb());


	$evenement = new Evenement();
		$evenement = $evenementManager->getEvenement();

		echo '<br/><h1 class="conseiladmini">'.$evenement->getNomEvenement().'</h1>';

	if(isset($_POST['confsupprimerarticle'])&&isset($_SESSION['gererArticle'])&&$_SESSION['gererArticle']==true){ //CONFIRMATION DE SUPPRESSION D'ARTICLE
		echo '<table><form action="evenement.php" method="POST"><input type="hidden" name="supprimerarticle" value="'.$_POST['confsupprimerarticle'].'"/><tr><td cospan="2">Etes vous sur de supprimer cet article<br/></td></tr><tr><td><input type="submit" value="OUI"></td></form>';
		echo '<td><form action="accueil.php" method="POST"><input type="submit" value="NON"/></form></td><table>';
	}
	if(isset($_POST['supprimerarticle'])&&isset($_SESSION['gererArticle'])&&$_SESSION['gererArticle']==true){ //SUPPRESSION DE LA BDD D'UN ARTICLE
	
		$requete2 = $bdd->prepare("DELETE FROM `article` WHERE `numeroArticle`= :numeroArticle"); //Suppresion article
		$requete2->bindParam(':numeroArticle', $_POST['supprimerarticle'], PDO::PARAM_INT);
		$requete2->execute();
		
		echo 'L\'article a &eacute;t&eacute; supprim&eacute;';
	}
		
		if(isset($_SESSION['ecrireart'])&&$_SESSION['ecrireart']){echo '<a href="ajouterArticleEvenement.php">Vous pouvez &eacute;crire un article</a>';}
		$listArticle = $articleManager->getListArticle(1, true);

		foreach ($listArticle as $article){
			echo '<form method="POST" action="consulterpage.php"><input type="hidden" name="numeroarticle" value='.$article->getNumeroArticle().'>';
			echo '<table width="1000px"><tr>';
			echo '<td><h1 class="titre_article"><input class="titre_article" type="submit" value="'.$article->getTitre().'"></h1></form></td>';
			if(isset($_SESSION['gererArticle'])&&$_SESSION['gererArticle']==true){ //editer un article
				echo '<td width="100px"><form method="POST" action="editionarticle.php">';
				echo '<input type="hidden" name="numeroarticle" value='.$article->getNumeroArticle().'>';
				echo '<input type="submit" value="Editer cet article"></form></td>';
				echo '<td width="50px"><form method="POST" action="evenement.php">';
				echo '<input type="hidden" name="confsupprimerarticle" value='.$article->getNumeroArticle().'>';
				echo '<input type="submit" class="imagesupprimer" value=""></form></td>';
			}
			
			echo '</tr></table>';
			echo '<p class="contenuarticle">'.$article->getContenu().'</p><br/>';
		}
		echo '</div>';
		include("squelettePage/footer.php");
	?>
</body>