<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
	<meta charset="utf-8"/>  <!-- norme html 5 -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/style_menu.css">
	<link rel="stylesheet" type="text/css" href="../css/style_index.css">
	<title> Site d'anima'fond, une association de cirque </title>
</head>

	<?php
		include("squelettePage/menu.php");
		echo '<div class="col-md-8 col-md-offset-2" id="mainDiv">';

		include ("../manager/CommentaireManager.php");
		include ("../manager/ArticleManager.php");

		$commentaireManager = new CommentaireManager();
		$commentaireManager->setDb($mainManager->getDb());

		$articleManager = new ArticleManager();
		$articleManager->setDb($mainManager->getDb());

		$article = new Article();
		$article->setNumeroArticle($_POST['numeroarticle']);

	if(isset($_SESSION['supprimercom'])&&($_SESSION['supprimercom']==true)&&isset($_POST['supprimercecom'])){ //SUPPRIMER UN COMMENTAIRE
			$commentaireManager->deleteCommentaire($_POST['numeroarticle'],$_POST['supprimercecom']);
			echo '<u><strong>Le commentaire a bien &eacute;t&eacute; supprim&eacute;.</strong></u>';
		}
		if(isset($_POST['ajoutcom'])&&isset($_POST['contenucom'])){ //ECRITURE DANS LA BDD DU COMMENTAIRE 

			$idCommentaire = $commentaireManager->numberCommentaireArticle($article->getNumeroArticle()) + 1;

			$newCommentaire = new Commentaire();
			$newCommentaire->setNumeroCommentaire($idCommentaire);
			$newCommentaire->setNumeroArticle($article->getNumeroArticle());
			$newCommentaire->setContenu($_POST['contenucom']);
			$newCommentaire->setIpPosteur($_SERVER["REMOTE_ADDR"]);

			if(isset($_SESSION['pseudo'])){
				$newCommentaire->setAuteur($_SESSION['pseudo']);
			} else {
				$newCommentaire->setAuteur($_POST['pseudo']);
			}
			$commentaireManager->add($newCommentaire);
			echo 'Votre commentaire a bien &eacute;t&eacute; ajout&eacute;';
			
		}

		$article=  $articleManager->getArticleWithId( $article->getNumeroArticle());

		echo "<h1>".$article->getTitre()."</h1>";

		echo "<img id='imageConsulterArticle' src='../image/articles/imageFond/".$article->getImage()."'/>";
		echo "<p><u>Ecrit par ".$article->getAuteur().", le ".$article->getDatePoste()."</u></p>";
		echo "<p class='contenuarticle'>".$article->getContenu()."</p>";

		echo '<form method="POST" action="consulterarticle.php"><table><tr>'; //ECRITURE D'UN COMMENTAIRE
		if(isset($_SESSION['pseudo'])) {
			echo "<td>pseudo :</td><td>".$_SESSION['pseudo']."</td></tr>";
			echo "<input type=\"hidden\" name=\"pseudo\" value=\"".$_SESSION['pseudo']."\">";
		}
		else {echo '<td>pseudo</td><td><input type="text" name="pseudo"/></td></tr>';}
		echo "<input type=\"hidden\" name=\"numeroarticle\" value=\"".$article->getNumeroArticle()."\"/>";
		echo '<input type="hidden" name="ajoutcom" value="true"/>';
		?>
		<tr><td colspan="2">Votre commentaire</td></tr>
		<tr><td colspan="2"><textarea name="contenucom" cols="40" rows="10"></textarea></td></tr>
		<tr><td colspan="2"><input type="submit" value="publier"></td></tr>
		</table></form>
	
	<?php  

	$commentaires = array();
	$commentaires=$commentaireManager->getCommentaireByIdArticle($article->getNumeroArticle());

	foreach ($commentaires as $commentaire){
		echo '<div class="commentaire">';
		echo '<table><tr><td><u><b>Article &eacute;crit par '.htmlspecialchars($commentaire->getAuteur()).' le '.$commentaire->getDatePoste().'</b></u></td>';
		if(isset($_SESSION['supprimercom'])&&$_SESSION['supprimercom']==true){
			echo '<td><form method="POST" action="consulterarticle.php">';
			echo '<input type="hidden" name="numeroarticle" value="'.$commentaire->getNumeroCommentaire().'"/>';
			echo '<input type="hidden" name="supprimercecom" value="'.$commentaire->getNumeroArticle().'"/>';
			echo '<input type="submit" class="imagesupprimer" value=""/></form></td>';
		}
		echo '</tr></table>';
		echo '<p>'.htmlspecialchars($commentaire->getContenu()).'</p><br/>';
		echo '</div>';
	}

	include("squelettePage/footer.php");
	?>

</body>
</html>