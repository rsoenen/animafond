<!DOCTYPE html>
<?php session_start();?>
<html>
<head>
	<meta charset="utf-8"/>  <!-- norme html 5 -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/style_menu.css">
	<link rel="stylesheet" type="text/css" href="../css/style_connexion.css">
	<title> Site d'anima'fond, une association de cirque </title>
</head>
<body>
<?php 
	session_destroy();
	include("squelettePage/menu.php");
	echo '<div class= "col-md-8 col-md-offset-2">';
	echo "Vous avez bien été déconnecté.";
	include("squelettePage/footer.php");
?>
</div>
</body>
</html>