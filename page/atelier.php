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
	<h1 class="soustitredescription">L'atelier</h1>
	
	<?php   
	
	include_once("../manager/MainManager.php");
	$mainManager = new mainManager();
		
	$pathPDF= $mainManager->getPathPDF();

	echo '<a href="'.$pathPDF.'formulaireinscription.pdf">Formulaire d\'inscription</a>'; ?>

	<img  src="../image/imageExplicative/atelier.gif"/>
	
	<div id="formulaireinscription">
	<?php
	if(isset($_SESSION['gererPointAnimation'])&&$_SESSION['gererPointAnimation']==true){
		echo '<form action="atelier.php" method="POST" enctype="multipart/form-data">';
		echo '<input type="file" name="monfichier"/>';
		echo '<input type="submit" value="Envoyer le questionnaire"/></form>';
	}
	
	if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0){ 
		$mainManager->sendPdf("pointanimation");
        echo "Formulaire mise à jour.";
	}
	
	echo "</div>";
	include("squelettePage/footer.php");
?>	
</div>
</body>
</html>