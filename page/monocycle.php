<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
	<meta charset="utf-8"/>  <!-- norme html 5 -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/style_menu.css">
	<link rel="stylesheet" type="text/css" href="../css/style_index.css">

	<title> Site d'anima'fond, une association d'art du cirque et de monocycle</title>
</head>
<body>
	<?php include("squelettePage/menu.php");?>
	<div class= "col-md-8 col-md-offset-2" id="mainDiv">
		<h1 id="monocycle" class="soustitredescription">Monocycle Sportif</h1>
		<img src="../image/imageExplicative/monocycle.gif" alt="Texte décrivant la pratique du monocycle">
		 
		<h1 id="mono-basket" class="soustitredescription">Mono-basket</h1>
		<img src="../image/imageExplicative/monobasket.gif" alt="Texte décrivant la pratique du mono-basket">
		<a href="../documents/Reglement_monobasket.pdf">Réglement mono-basket</a>

		<h1 id="trial" class="soustitredescription">Trial</h1>
		<img src="../image/imageExplicative/trial.gif" alt="Texte décrivant la pratique du trial">
		 


		<h1 id ="mono-hockey"class="soustitredescription">Mono-hockey</h1>
		<img src="../image/imageExplicative/monohockey.gif" alt="Texte décrivant la pratique du mono-hockey">
		<a href="../documents/Reglement_mono-hockey.pdf">Réglement mono-hockey</a>

		<h1 id ="freestyle"class="soustitredescription">Freestyle</h1>
		<img src="../image/imageExplicative/freestyle.gif" alt="Texte décrivant la pratique du free-style">


		<h1 id ="athletisme"class="soustitredescription">Athlétisme</h1>
		<img src="../image/imageExplicative/athletisme.gif" alt="Texte décrivant la pratique de l'athlétisme sur monocycle">


		<a href="../documents/lesprotectionsmonocycle.pdf">Information sur les protections</a>
	</div>
<?php include("squelettePage/footer.php"); ?>
</body>
</html>