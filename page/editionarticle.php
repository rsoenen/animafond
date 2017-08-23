<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
	<meta charset="utf-8"/>  <!-- norme html 5 -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/style_menu.css">
	<link rel="stylesheet" type="text/css" href="../css/style_index.css">
	<title> Site d'anima'fond, une association de cirque </title>
	<script src="../module/ckeditor/ckeditor.js"></script>
</head>
<body>
<div class="article">
<?php
	include("squelettePage/menu.php");
	echo '<div class="col-md-8 col-md-offset-2" id="mainDiv">';

	include ("../manager/ArticleManager.php");
	$articleManager = new ArticleManager();
	$articleManager->setDb($mainManager->getDb());

	if(isset($_POST['numeroarticle'])&&(!isset($_POST['postezimage']))&&!isset($_POST['editer'])){

		$article = new Article();
		$article = $articleManager->getArticleWithId($_POST['numeroarticle']);
	
	}
	if(isset($_POST['nomimage'])){
		$nomImage = $mainManager->sendPicture($_POST['nomimage'], $mainManager->getPathPictureArticle(),'monfichier');

		echo "POUR METTRE L'IMAGE, METTEZ DE CE CODE A L'ENDROIT OU VOUS VOULEZ VOTRE IMAGE : &lt;img src='".$mainManager->getPathPictureArticle().$nomImage."'/&gt;";

	} else if (isset($_POST['editer'])&&isset($_POST['contenu'])&&isset($_POST['titre'])){ //ON ENREGISTRE L'ARTICLE

		$updateArticle = new Article();
		$updateArticle -> setNumeroArticle($_POST['numeroarticle']);
		$updateArticle -> setAuteur($_SESSION["pseudo"]);
		$updateArticle -> setContenu($_POST["contenu"]);
		$updateArticle -> setTitre($_POST['titre']);
		$updateArticle->setPreambule($_POST['preambule']);
		$articleManager ->updateArticle($updateArticle);

		header('Location: index.php');
	}
	?>
	<div id="main">

		<form method="POST" action="editionarticle.php" enctype="multipart/form-data"> <!-- RENVOIE A LA SERVLET NOUVEL ARTICLE, METHODE POST -->
			<label for="titre" class="textCouleurBlanche">Titre de l'article :</label>
			<textarea name="titre" id="titre" rows="1" cols="110" required="required"><?php if(isset($_POST['titre'])){echo $_POST['titre'];}if(isset($article)){echo $article->getTitre();} ?> </textarea><br/>
			<label for="preambule" class="textCouleurBlanche">Préambule :</label>
			<textarea name="preambule" id="preambule" rows="1" cols="110" required="required">
			<?php if(isset($_POST['preambule'])){echo $_POST['preambule'];}if(isset($article)){echo $article->getPreambule();} ?>
		</textarea>
			<textarea name="contenu" id="contenu" rows="10" cols="110" required="required">
						<?php if(isset($_POST['contenu'])){echo $_POST['contenu'];}if(isset($article)){echo $article->getContenu();} ?>
	            </textarea>
			<br />
			<script>
				CKEDITOR.replace('contenu'); // APPELLE NOTRE EDITEUR DE TEXTE
			</script>
			<div>
				<h4>Image à insérer dans le contenu</h4>
				<label for="nomimage" class="textCouleurBlanche">Nom de l'image :</label>
				<input type="text" name="nomimage"/><br/> <!--HEBERGEMENT D'IMAGE-->
				<input type="file" name="monfichier"/><br/>
				<input type="submit" name="postezimage" class="btn btn-default" value="Poster l'image"/>
			</div>

			<input type="hidden" name="numeroarticle" value="<?php echo $_POST['numeroarticle']; ?>"/>
			<input type="hidden" name="editer" value="true"/>

			<input type="submit" class="btn btn-default" value="Publier l'article"/>
		</form>


	</div>

</div>
<?php
	include("squelettePage/footer.php");
?>
</body>

</html>