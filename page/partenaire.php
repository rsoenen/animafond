<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
	<meta charset="utf-8"/>  <!-- norme html 5 -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="../css/style_menu.css"/>
	<link rel="stylesheet" type="text/css" href="../css/style_partenaire.css"/>
	<title> Site d'anima'fond, une association de cirque </title>
</head>
<body>
<?php include("squelettePage/menu.php");?>
<div class= "col-md-8 col-md-offset-2" id="mainDiv">
<?php
		include ("../manager/PartenaireManager.php");
		$partenaireManager = new PartenaireManager();
		$pathPicture = $partenaireManager -> getPathPicture();
		
		$listPartenaire = $partenaireManager -> listPartenaireByStatut('officiel');
		
		echo '<h1 class="titrepartenaire">PARTENAIRES OFFICIELS</h1>';
		include("squelettePage/affichagePartenaire.php");
		
		
		$listPartenaire = $partenaireManager -> listPartenaireByStatut('sportif');
		
		echo '<h1 class="titrepartenaire">MONOCYCLE SPORTIF</h1>';
		include("squelettePage/affichagePartenaire.php");
	
		$listPartenaire = $partenaireManager -> listPartenaireByStatut('materiel');
		
		echo '<h1 class="titrepartenaire">ACHATS MATERIELS</h1>';
		include("squelettePage/affichagePartenaire.php");
		
		
		if(isset($_SESSION['editerpartenaire'])&&$_SESSION['editerpartenaire']==true){
			echo '<form action="editerpartenaire.php" method="POST"><input type="hidden" name="ajoutpartenaire" value="true"><input type="submit" value="Ajouter un partenaire"/></form>';
		}
		
		include("squelettePage/footer.php");
	?>
	</div>
</body>
</html>