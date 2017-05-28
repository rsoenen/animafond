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
<?php
	include("squelettePage/menu.php");
	echo '<div id="mainDiv" class="col-md-8 col-md-offset-2">';
	include ("../manager/ArticleManager.php");
	if(isset($_POST['nomimage'])){
		$nomImage = $mainManager->sendPicture($_POST['nomimage'], $mainManager->getPathPictureArticle(),'monfichier');

		echo "POUR METTRE L'IMAGE, METTEZ DE CE CODE A L'ENDROIT OU VOUS VOULEZ VOTRE IMAGE : &lt;img src='".$mainManager->getPathPictureArticle().$nomImage."'/&gt;";
	}
	if(isset($_POST['publier'])&&isset($_POST['contenu'])&&isset($_POST['titre'])){ //ON ENREGISTRE L'ARTICLE

		$articleManager = new ArticleManager();
		$articleManager->setDb($mainManager->getDb());

		$newArticle = new Article();
		$newArticle -> setAuteur($_SESSION["pseudo"]);
		$newArticle -> setContenu($_POST["contenu"]);
		$newArticle -> setIpPosteur($_SERVER["REMOTE_ADDR"]);
		$newArticle -> setTitre($_POST['titre']);
		$newArticle->setPreambule($_POST['preambule']);
		$newArticle ->setImage('monfichierfond');
		$newArticle -> setEvenement(false);
		$articleManager ->add($newArticle);

		header('Location: confirmation.php');
	}
	
	
//	if(isset($_SESSION['ecrireart'])&&$_SESSION['ecrireart']==true){?>
<div id="main">

	<form method="POST" action="redactionarticle.php" enctype="multipart/form-data"> <!-- RENVOIE A LA SERVLET NOUVEL ARTICLE, METHODE POST -->
		<label for="titre" class="textCouleurBlanche">Titre de l'article :</label>
		<textarea name="titre" id="titre" rows="1" cols="110" required="required"><?php if(isset($_POST['titre'])){echo $_POST['titre'];}?> </textarea><br/>
		<label for="preambule" class="textCouleurBlanche">Préambule :</label>
		<textarea name="preambule" id="preambule" rows="1" cols="110" required="required">
			<?php if(isset($_POST['preambule'])){echo $_POST['preambule'];}?>
		</textarea>
		<textarea name="contenu" id="contenu" rows="10" cols="110" required="required">
	                <?php if(isset($_POST['contenu'])){echo $_POST['contenu'];} ?>
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
			<input type="submit" name="postezimage" value="Poster l'image">
		</div>

		<div>
			<h4>Image représentant l'article</h4>
			<label for="monfichierfond" class="textCouleurBlanche">Image :</label>
			<input required="required" type="file" name="monfichierfond"/><br/>
		</div>

		<input type="hidden" name="publier" value="true"/>
		<input class="bouttonAjoutModificationArticle" type="submit" id="envoyerArticle" value="Publier l'article"/>
	</form>


</div>
<!--		--><?php
			include("squelettePage/footer.php");
//			}else {
//			echo 'Vous n\'avez pas les droits nécéssaires pour rédiger un article.<br/>';
//			echo '<a href="accueil.php">Retourner à l\'accueil</a>';}
//			echo '</div>';
//			include("footer.php");
//			?>
</body>
</html>