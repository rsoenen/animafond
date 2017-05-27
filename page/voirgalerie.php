<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
	<meta charset="utf-8"/>  <!-- norme html 5 -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/style_menu.css">
	<link rel="stylesheet" type="text/css" href="../css/style_galerie.css">
	<link rel="stylesheet" type="text/css" href="../css/style_index.css">

	<title> Site d'anima'fond, une association de cirque </title>
</head>
<body>
<?php 
	include("squelettePage/menu.php");
?>
<div class= "col-md-8 col-md-offset-2" id="mainDiv">

	<?php
		include ("../manager/GalerieManager.php");
		$galerieManager = new GalerieManager();
		$galerieManager->setDb($mainManager->getDb());

		include ("../manager/PhotoGalerieManager.php");
		$photoGalerieManager = new PhotoGalerieManager();
		$photoGalerieManager->setDb($mainManager->getDb());
		
		$pathPicture = $photoGalerieManager -> getPathPicture();
		
		if(isset($_POST['nomphoto'])&&isset($_POST['nomevenement'])){
			
			$nomdossier= $galerieManager-> getNomDossierEvenement($_POST["nomevenement"]);
			
			echo '<img class="imagesolo" src="'.$pathPicture.$nomdossier.'/'.$_POST['nomphoto'].'" />';
			
			$images = $photoGalerieManager ->getPreviousNextPicture($_POST["nomevenement"],$_POST['nomphoto']);
			echo '<table><tr>';
			if($images[0] != null){echo '<td><form action="voirgalerie.php" method="POST"><input type="hidden" name="nomphoto" value="'.$images[0].'"/><input type="hidden" name="nomevenement" value="'.$_POST['nomevenement'].'"/><input type="submit" value="Photo précédente"></form></td>';}
			echo '<td><form action="galerie.php" method="POST"><input type="hidden" name="choixevenement" value="'.$_POST['nomevenement'].'"/><input type="submit" value="Retourner à la galerie"></form></td>';
			if($images[1] != null){echo '<td><form action="voirgalerie.php" method="POST"><input type="hidden" name="nomphoto" value="'.$images[1].'"/><input type="hidden" name="nomevenement" value="'.$_POST['nomevenement'].'"/><input type="submit" value="Photo suivante"></form></td>';}
			echo '</tr></table>';
		}
		else {
			echo '<a href="accueil.php">retourner à l\'accueil</a><br/>';
			echo '<a href="galerie.php">retourner à la galerie</a>';
		}
		
		include("squelettePage/footer.php");
	?>

</body></html>