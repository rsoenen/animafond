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
	include ("../manager/RangManager.php");
	include ("../manager/UtilisateurManager.php");
	include ("../manager/EvenementManager.php");
	
	$rangManager = new RangManager();
	$utilisateurManager = new UtilisateurManager();
	$evenementManager= new EvenementManager();
	
	if(isset($_SESSION['gererRang'])&&$_SESSION['gererRang']==true){
		if(isset($_POST['nomRang'])){ //EDITION DE LA BDD POUR LES DROITS DES DIFFERENTS RANGS
			
			$updatedRang = new Rang();
			$updatedRang -> setNomRang($_POST['nomRang']);
			$updatedRang -> setGererEvenement($_POST['gererEvenement']);
			$updatedRang -> setGererCommentaire ($_POST['gererCommentaire']);
			$updatedRang -> setGererArticle($_POST['gererArticle']);
			$updatedRang -> setGererPageDiverse($_POST['gererPageDiverse']);
			$updatedRang -> setGererTrocAFond($_POST['gererTrocAFond']);
			$updatedRang -> setGererRang($_POST['gererRang']);
			$updatedRang -> setGererBandeau($_POST['gererBandeau']);
			$updatedRang -> setGererGalerie($_POST['gererGalerie']);
			$updatedRang -> setGererPointAnimation($_POST['gererPointAnimation']);
			
			$rangManager -> updateRang($updatedRang);
			
			$rangManager -> updateDroit($_SESSION['rang']);
			echo 'Modification effectuée';
			
		}

		if(isset($_POST['nouvNomRang'])){ //AJOUT A LA BDD UN NOUVEAU RANG
			
			$newRang = new Rang();
			$newRang -> setNomRang($_POST['nouvNomRang']);
			$newRang -> setGererEvenement($_POST['gererEvenement']);
			$newRang -> setGererCommentaire ($_POST['gererCommentaire']);
			$newRang -> setGererArticle($_POST['gererArticle']);
			$newRang -> setGererPageDiverse($_POST['gererPageDiverse']);
			$newRang -> setGererTrocAFond($_POST['gererTrocAFond']);
			$newRang -> setGererRang($_POST['gererRang']);
			$newRang -> setGererBandeau($_POST['gererBandeau']);
			$newRang -> setGererGalerie($_POST['gererGalerie']);
			$newRang -> setGererPointAnimation($_POST['gererPointAnimation']);
			
			$rangManager -> addRang($newRang);
			
			echo 'Le nouveau rang a été ajouté';
		}
		if(isset($_POST['modifierRang'])){ //MODIFICATION DU RANG D'UN UTILISATEUR
			
			$utilisateurManager -> updateRang($_POST['modifierRang'], $_POST['newRang']);
			
			echo 'Le rang de '.$_POST['modifierRang'].' été modifié';
		}
		
		$rangs = $rangManager -> recupererAllRang();
		
		
		echo '<br/><table border="1"><tr><td>Rang</td><td>Gérer les événements</td><td>Gérer les commentaires</td>
		<td>Gérer les articles</td><td>Gérer les pages annexes</td><td>Gérer TrocAFond</td>
		<td>Gérer les rangs</td><td>Gérer le bandeau</td><td>Gérer la galerie</td>
		<td>Gérer le point animation</td></tr>';
		
		foreach($rangs as $data){
			if($data-> getNomRang() =='admin'){ //RANG ADMIN AFFICHER MAIS NON MODIFIABLE
				echo '<tr><td>'.$data-> getNomRang().'</td>';
				if ($data-> gereEvenement()){echo '<td>OUI</td>';}else{echo'<td>NON</td>';}
				if ($data-> gereCommentaire()){echo '<td>OUI</td>';}else{echo'<td>NON</td>';}
				if ($data-> gereArticle()){echo '<td>OUI</td>';}else{echo'<td>NON</td>';}
				if ($data-> gerePageDiverse()){echo '<td>OUI</td>';}else{echo'<td>NON</td>';}
				if ($data-> gereTrocAFond()){echo '<td>OUI</td>';}else{echo'<td>NON</td>';}
				if ($data-> gereRang()){echo '<td>OUI</td>';}else{echo'<td>NON</td>';}
				if ($data-> gereBandeau()){echo '<td>OUI</td>';}else{echo'<td>NON</td>';}
				if ($data-> gereGalerie()){echo '<td>OUI</td>';}else{echo'<td>NON</td>';}
				if ($data-> gerePointAnimation()){echo '<td>OUI</td>';}else{echo'<td>NON</td>';}
					
			}
			else{ //AFFICHAGE ET POSSIBILITE DE MODIFICATION POUR LES RANGS AUTRES QUE ADMIN
				echo '<form ACTION="gestiondroit.php" method="POST"><input type="hidden" name="nomRang" value="'.$data-> getNomRang().'"/><tr><td>'.$data-> getNomRang().'</td>';
				echo '<td><select name="gererEvenement"><option value=1';if($data-> gereEvenement()){echo "selected=\"selected\"";}echo '>OUI</option><option value="false" ';if(!$data-> gereEvenement()){echo "selected=\"selected\"";}echo'>NON</option></select></td>';
				echo '<td><select name="gererCommentaire"><option value=1';if($data-> gereCommentaire()){echo "selected=\"selected\"";}echo '>OUI</option><option value="false" ';if(!$data-> gereCommentaire()){echo "selected=\"selected\"";}echo'>NON</option></select></td>';
				echo '<td><select name="gererArticle"><option value=1';if($data-> gereArticle()){echo "selected=\"selected\"";}echo '>OUI</option><option value="false" ';if(!$data-> gereArticle()){echo "selected=\"selected\"";}echo'>NON</option></select></td>';
				echo '<td><select name="gererPageDiverse"><option value=1';if($data-> gerePageDiverse()){echo "selected=\"selected\"";}echo '>OUI</option><option value="false" ';if(!$data-> gerePageDiverse()){echo "selected=\"selected\"";}echo'>NON</option></select></td>';
				echo '<td><select name="gererTrocAFond"><option value=1';if($data-> gereTrocAFond()){echo "selected=\"selected\"";}echo '>OUI</option><option value="false" ';if(!$data-> gereTrocAFond()){echo "selected=\"selected\"";}echo'>NON</option></select></td>';
				echo '<td><select name="gererRang"><option value=1';if($data-> gereRang()){echo "selected=\"selected\"";}echo '>OUI</option><option value="false" ';if(!$data-> gereRang()){echo "selected=\"selected\"";}echo'>NON</option></select></td>';
				echo '<td><select name="gererBandeau"><option value=1';if($data-> gereBandeau()){echo "selected=\"selected\"";}echo '>OUI</option><option value="false" ';if(!$data-> gereBandeau()){echo "selected=\"selected\"";}echo'>NON</option></select></td>';
				echo '<td><select name="gererGalerie"><option value=1';if($data-> gereGalerie()){echo "selected=\"selected\"";}echo '>OUI</option><option value="false" ';if(!$data-> gereGalerie()){echo "selected=\"selected\"";}echo'>NON</option></select></td>';
				echo '<td><select name="gererPointAnimation"><option value=1';if($data->gerePointAnimation()){echo "selected=\"selected\"";}echo '>OUI</option><option value="false" ';if(!$data->gerePointAnimation()){echo "selected=\"selected\"";}echo'>NON</option></select></td>';
				echo '<td><input type="submit" value="Enregistrer les modifications"/></td></tr></form>';
			}
		}
		if(isset($_SESSION['gererRang'])&&($_SESSION['gererRang']==true)&&isset($_POST['ajouterRang'])){ //CREATION D'UN NOUVEAU RANG
			echo '<form ACTION="gestiondroit.php" method="POST"><tr><td><input type="text" name="nouvNomRang" /></td>';
				echo '<td><select name="gererEvenement"><option value=1>OUI</option><option value="false" selected=\"selected\">NON</option></select></td>';
				echo '<td><select name="gererCommentaire"><option value=1>OUI</option><option value="false" selected=\"selected\">NON</option></select></td>';
				echo '<td><select name="gererArticle"><option value=1>OUI</option><option value="false" selected=\"selected\">NON</option></select></td>';
				echo '<td><select name="gererPageDiverse"><option value=1>OUI</option><option value="false" selected=\"selected\">NON</option></select></td>';
				echo '<td><select name="gererTrocAFond"><option value=1>OUI</option><option value="false" selected=\"selected\">NON</option></select></td>';
				echo '<td><select name="gererRang"><option value=1>OUI</option><option value="false" selected=\"selected\">NON</option></select></td>';
				echo '<td><select name="gererBandeau"><option value=1>OUI</option><option value="false" selected=\"selected\">NON</option></select></td>';
				echo '<td><select name="gererGalerie"><option value=1>OUI</option><option value="false" selected=\"selected\">NON</option></select></td>';
				echo '<td><select name="gererPointAnimation"><option value=1>OUI</option><option value="false" selected=\"selected\">NON</option></select></td>';
				echo '<td><input type="submit" value="Ajouter ce nouveau rang"/></td></tr></form>';
		}
		echo '</table>';
		if (isset($_SESSION['gererRang'])&&$_SESSION['gererRang']==true){//PROPOSER LA CREATION D'UN NOUVEAU RANG
			echo '<form action="gestiondroit.php" method="POST"><input type="hidden" name="ajouterRang"value="true"/><input type="submit" value="Ajouter un nouveau rang"/></form>';
		}
		$utilisateurs = $utilisateurManager -> getAllUtilisateur();
		
		
		echo '<table class="gestionrang" border="1">';
		echo '<tr><td><b>Pseudo</b></td><td><b>Rang</b></td><td><b>Mail</b></td><td><b>Derniere connexion</b></td></tr>';
		foreach ($utilisateurs as $data){ //modifier le rang des personnes!
			echo '<tr><form action="gestiondroit.php" method="POST"><input type="hidden" name="modifierRang" value="'.$data->getPseudo().'"/><td>'.$data->getPseudo().'</td>';
			echo '<td><select name="newRang">';
			foreach($rangs as $dataRang){
				echo '<option value="'.$data->getRang().'" ';if($dataRang->getNomRang()==$data->getRang()){echo 'selected="selected"';}echo'>'.$dataRang->getNomRang().'</option>';
			}
			echo'</select></td>';
	
			echo "<td>".$data->getMail()."</td>";
			echo "<td>".$data->getDerniereConnexion()."</td>";
			echo '<td><input type="submit" value="Modifier le rang"/></td></form></tr>';
		}
		
		echo '</table><br/>';
		echo '<a href="gestionenvcontact.php">Gérer les messages envoyés par la section contact</a>';
		
		

		if (isset($_SESSION['gererEvenement'])&&$_SESSION['gererEvenement']){
			echo '<h1 class="conseiladmini">Gestion Evenement</h1>';
			if (isset($_POST["visible"])){
				$updatedEvenement= new Evenement();
				$updatedEvenement->setNomEvenement($_POST['nomevenement']);
				$updatedEvenement->setVisible($_POST['visible']);
				$evenementManager->updateEvenement($updatedEvenement);
				echo "L'événement a bien été modifié";
			}

			$evenement= new Evenement();
			$evenement = $evenementManager->getEvenement();

			echo '<form action="gestiondroit.php" method="POST">';
			echo '<table><tr><td>Nom de l\'événement: </td><td><input type="text" value="'.$evenement->getNomEvenement().'"" name="nomevenement"/></td></tr>';
			echo '<tr><td>Visible sur le site: </td><td><INPUT type= "radio" ';if($evenement->isVisible()){echo ' checked';} echo ' name="visible" value=1/>OUI<INPUT type= "radio" name="visible" ';if(!$evenement->isVisible()){echo ' checked';} echo ' value="false"/>NON </td></tr>';
			echo '<tr><td colapse="2"><input type="submit" Value="Enregistrer les modifications"/></td></tr>';
			echo '</table></form>';

		}
	} else { //SI LA PERSONNE N'A PAS LE DROIT D'ACCEDER A CETTE PAGE
		echo '<h1>Vous n\'avez pas les droits nécessaires pour consulter cette page !!!</h1>';
		echo '<a href="accueil.php">Retourner à l\'accueil</a>';
	}
	include("squelettePage/footer.php");
	?>
</body></html>