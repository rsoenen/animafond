<html>
<head>
	<meta charset="utf-8"/>  <!-- norme html 5 -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/style_menu.css">
	<link rel="stylesheet" type="text/css" href="../css/style_connexion.css">
	<title> Site d'anima'fond, une association de cirque </title></head>
<body>
<?php include("squelettePage/menu.php"); ?>
<div id="mainDiv" class= "col-md-8 col-md-offset-2">

<?php if(!isset($_SESSION['pseudo'])){ ?>
	<form action="confirmation.php"  class="form-horizontal" method="POST">
		<div class="form-group">
			<label for="pseudoConnection" class="col-sm-2 control-label">Pseudo :</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="pseudoConnection" required="required" value="<?php if(isset($_POST['pseudo'])){echo $_POST['pseudo'];}?>"/>
			</div>
		</div>
		<div class="form-group">
			<label for="mdp" class="col-sm-2 control-label">Mot de passe :</label>
			<div class="col-sm-10">
				<input type="password" class="form-control" name="mdp"/>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<center><button type="submit" class="btn btn-default">Se connecter</button></center>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<center>
					<a href="inscription.php">S'inscrire</a><br>
					<a href="motdepasseoublie.php">Mot de passe oublié?</a>
				</center>
			</div>
		</div>
	</form>

	<?php }
		include("squelettePage/footer.php");
	?>
	
</div>
</body>
</html>