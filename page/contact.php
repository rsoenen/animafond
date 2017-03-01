<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
	<meta charset="utf-8"/>  <!-- norme html 5 -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/style_menu.css">
	<link rel="stylesheet" type="text/css" href="../css/style_contact.css">
	<title> Site d'anima'fond, une association de cirque </title>
</head>
<body>
<?php include("squelettePage/menu.php");?>
<div class= "col-md-8 col-md-offset-2" id="mainDiv">
<h1>SECTION CONTACT </h1>
<p>Si vous souhaitez entrer en contact avec animafond, vous pouvez nous laisser un message grâce au formulaire ci-dessous. Nous traiterons votre message dès que possible.</p>
<form action="confirmation.php" method="POST" class="form-horizontal">
	<?php 
		if(!isset($_SESSION['pseudo'])){
			echo 	'<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Nom et prénom :</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="name" required="required"/>
						</div>
					</div>';
		}
	?>
	<div class="form-group">
		<label for="mail" class="col-sm-2 control-label">Mail :</label>
		<div class="col-sm-10">
			<input type="email" name="mail" required="required" class="form-control" />
		</div>
	</div>
	<div class="form-group">
		<label for="objet" class="col-sm-2 control-label">Objet :</label>
		<div class="col-sm-10">
			<input type="text" name="objet" required="required" class="form-control" />
		</div>
	</div>
	<div class="form-group">
		<label for="contenu" class="col-sm-2 control-label">Votre message :</label>
		<div class="col-sm-10">
			<textarea name="contenu" class="col-sm-12" rows="10" required="required"></textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">Envoyer</button>
		</div>
	</div>	
</form>
		

</div>

<?php include("squelettePage/footer.php");?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script>
</body>

</html>