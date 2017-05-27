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
		<img class="image_description" src="../image/imageExplicative/monocycle.gif" alt="Texte d&eacute;crivant la pratique du monocycle">
		 
		<h1 id="mono-basket" class="soustitredescription">Mono-basket</h1>
		<img class="image_description" src="../image/imageExplicative/monobasket.gif" alt="Texte d&eacute;crivant la pratique du mono-basket">
		<a href="../documents/Reglement_monobasket.pdf">R&eacute;glement mono-basket</a>

		<h1 id="trial" class="soustitredescription">Trial</h1>
		<img class="image_description" src="../image/imageExplicative/trial.gif" alt="Texte d&eacute;crivant la pratique du trial">
		 


		<h1 id ="mono-hockey"class="soustitredescription">Mono-hockey</h1>
		<img class="image_description" src="../image/imageExplicative/monohockey.gif" alt="Texte d&eacute;crivant la pratique du mono-hockey">
		<a href="../documents/Reglement_mono-hockey.pdf">R&eacute;glement mono-hockey</a>

		<h1 id ="freestyle"class="soustitredescription">Freestyle</h1>
		<img  class="image_description" src="../image/imageExplicative/freestyle.gif" alt="Texte d&eacute;crivant la pratique du free-style">


		<h1 id ="athletisme"class="soustitredescription">Athl&eacute;tisme</h1>
		<img  class="image_description"  src="../image/imageExplicative/athletisme.gif" alt="Texte d&eacute;crivant la pratique de l'athl&eacute;tisme sur monocycle">


		<a href="../documents/lesprotectionsmonocycle.pdf">Information sur les protections</a>
	</div>
<?php include("squelettePage/footer.php"); ?>
</body>
</html>