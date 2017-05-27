<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>  <!-- norme html 5 -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/style_menu.css">
	<link rel="stylesheet" type="text/css" href="../css/style_connexion.css">
	<title> Site d'anima'fond, une association de cirque </title>
</head>
<body>
<?php include("squelettePage/menu.php"); ?>
<div id="mainDiv" class= "col-md-8 col-md-offset-2">
<?php
	if(isset($_GET['cle'])){
		echo '<form method="POST" action="generateurmdp.php?cle='.$_GET['cle'].'">'; 
		if(isset($_POST['newmdp'])&&isset($_POST['confnewmdp'])&&(strlen($_POST['newmdp'])>5)){
			if($_POST['newmdp']==$_POST['confnewmdp']){

				$utilisateurManager=new UtilisateurManager();
				$utilisateurManager->updateMdpForget($_POST['newmdp'], $_GET['cle']);

				echo 'Mot de passe modifié';
				}
				else {
					echo '<b>Les deux mots de passes que vous avez rentré ne sont pas identiques.</b>';
			}	
		} else if (isset($_POST['newmdp'])&&strlen($_POST['newmdp'])<6){
			echo '<b>Votre mot de passe doit faire au minimum 6 caractères.</b>';
		}
		
		?>
		
		
		<table>
		<tr><td>Entrez votre nouveau mot de passe</td><td><input type="password" name="newmdp"></td></tr>
		<tr><td>Confirmez votre nouveau mot de passe</td><td><input type="password" name="confnewmdp"></td></tr>
		<tr><td colspan="2"><input type="submit" value="Enregistrer votre nouveau mot de passe"></td></tr>
		</table></form>
		
		
	
	 <?php
		}
		include("squelettePage/footer.php");
	?>



</div>
</body>
</html>