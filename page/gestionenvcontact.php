<!DOCTYPE html>
<?php session_start(); ?>
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
include("squelettePage/menu.php");
?>
<div id="mainDiv" class= "col-md-8 col-md-offset-2">
	<?php


	include ("../manager/ContactManager.php");
	$contactManager = new ContactManager();
	$contactManager->setDb($mainManager->getDb());

	$listContact = $contactManager->getAllContact();

	echo '<div class="article">';

	foreach($listContact as $contact){
		echo '<table><tr><td><u>Poster par '.$contact->getPseudo().' le '.$contact->getDateMessage().' avec pour adresse mail :'.$contact->getMail().'</u></td></tr>';
		echo '<tr><td>'.$contact->getContenu().'</td></tr></table><br/>';
	}
	include("squelettePage/footer.php");
	?>
</div>
</body>
</html>