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
<?php 
	if(isset($_SESSION['gererPointAnimation'])&&$_SESSION['gererPointAnimation']==true){
		
		include_once ("../manager/MainManager.php");
		$pathPDF= $mainManager->getPathPDF();
		
		echo '<h1 class="soustitredescription">Points animations</h1>';
		echo '<a href="'.$pathPDF.'pointanimation.pdf">Vous trouverez ici le r&eacute;capitulatif des points animations</a>';
		if(isset($_SESSION['gererPointAnimation'])&&$_SESSION['gererPointAnimation']==true){
			echo '<form action="animation.php" method="POST" enctype="multipart/form-data">';
			echo '<input type="file" name="monfichier"/>';
			echo '<input type="submit" value="Envoyer le document"/></form>';
		}
				
		if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0){ 
			$mainManager->sendPdf("pointanimation");
		}
	}
	echo '<h1 class="soustitredescription">Les animations</h1>';

	echo '<img  class="image_description"  src="../image/imageExplicative/animation1.png" />';
	echo '<img  class="image_description"  src="../image/imageExplicative/animation2.png" />';
	echo '<img  class="image_description"  src="../image/imageExplicative/animation3.png" />';

	echo '<p class="text-description">Si vous êtes int&eacute;ress&eacute;s, pas de problème, on est là ! <a href="contact.php">contactez-nous</a> en indiquant vos coordonn&eacute;es, et notre pr&eacute;sident vous contactera.</p>';
	echo '</div>';
	include("squelettePage/footer.php");
	
	?>
</body>
</html>	