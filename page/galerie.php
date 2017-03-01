<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
	<meta charset="utf-8"/>  <!-- norme html 5 -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/style_menu.css">
	<title> Site d'anima'fond, une association de cirque </title>
</head>
<body>
<?php 
	include("squelettePage/menu.php");
?>
<div class= "col-md-8 col-md-offset-2">
<?php 
	
	include ("../manager/GalerieManager.php");
	$galerieManager = new GalerieManager();
	
	include ("../manager/PhotoGalerieManager.php");
	$photoGalerieManager = new PhotoGalerieManager();
	
	$pathPicture = $photoGalerieManager -> getPathPicture();
		
	if(isset($_SESSION['gererGalerie'])&&$_SESSION['gererGalerie']==true&&isset($_POST['addevenement'])){ //TRAITEMENT DE LA DEMANDE POUR AJOUTER UN EVENEMENT
		
		$newGalerie = new Galerie();
		$newGalerie -> setEvenement($_POST['addevenement']);
		$newGalerie -> setCreateurGalerie($_SESSION['pseudo']);
		$galerieManager->addGalerie($newGalerie);
		
		echo 'Evenement ajouté';
	}
	
	if(isset($_SESSION['gererGalerie'])&&$_SESSION['gererGalerie']==true&&isset($_POST['supprimerphoto'])){ //REQUETE POUR SUPPRIMER UNE PHOTO
		
		$photoDelete = new PhotoGalerie();
		$photoDelete -> setEvenement($_POST['choixevenement']);
		$photoDelete -> setNomPhoto($_POST['supprimerphoto']);
		$photoGalerieManager-> deletePhoto($photoDelete);
		
		echo 'Photo supprimée';
		
	}
	if(isset($_SESSION['gererGalerie'])&&$_SESSION['gererGalerie']==true){ //AJOUT D'UNE PHOTO DANS UN EVENEMENT
        if (isset($_POST["nombrelien"])){   
                
			$newPhoto = new PhotoGalerie();
			$newPhoto -> setEvenement($_POST['choixevenement']);
			$newPhoto -> setAuteur($_SESSION["pseudo"]);
				
            for ($i=1;$i<=$_POST["nombrelien"];$i++){
                $nomfichier="monfichier".$i;
				
				$photoGalerieManager -> addPhoto($newPhoto, $nomfichier);
			}
			
			echo 'Photo(s) ajoutée(s)';
		}
	}
	
	
	
	if(isset($_SESSION['gererGalerie'])&&$_SESSION['gererGalerie']==true){ //DEMANDE POUR AJOUTER UN EVENEMENT ET POUR PASSER EN MODE EDITION
		echo '<form action="galerie.php" method="POST"><table><tr><td>Ajouter un événement</td><td><input type="text" name="addevenement"/></td><td><input type="submit" value="Ajouter un évenement"></td></tr></table></form>';
		if(isset($_POST['passermodeedition'])&&($_POST['passermodeedition']=='true')){echo '<form action="galerie.php" method="POST"><input type="hidden" name="passermodeedition" value="false"/>';if(isset($_POST['choixevenement'])){echo '<input type="hidden" name="choixevenement" value="'.$_POST['choixevenement'].'"/>';}echo '<input type="submit" value="Quitter le mode édition"></form>';}
		else{echo '<form action="galerie.php" method="POST"><input type="hidden" name="passermodeedition" value="true"/>';if(isset($_POST['choixevenement'])){echo '<input type="hidden" name="choixevenement" value="'.$_POST['choixevenement'].'"/>';}echo '<input type="submit" value="Passez en mode édition"></form>';}
	}
	
	$listGalerie = $galerieManager -> getListGalerie ();
	
	if(isset($_POST['choixevenement'])){
		echo '<h1 class="conseiladmini">'.$_POST['choixevenement'].'</h1>';
	}else {
		
		
		echo '<h1 class="conseiladmini">CHOIX DE L\'EVENEMENT</h1>';
		echo '<table>';$colonne=0;
		foreach($listGalerie as $data){ //CHOIX POUR SAVOIR QUEL EVENEMENT REGARDER
			
			$nomPhoto = $photoGalerieManager-> getFirstPictureEvenement($data->getEvenement());
			
			if ($colonne == 0){echo '<tr>';}
			echo '<td><form action="galerie.php" method="POST">';
			echo '<table><tr><td><input type="hidden" name="choixevenement" value="'.$data->getEvenement().'"><input type="image" src="'.$pathPicture.$data->getNomDossier().'/'.$nomPhoto.'" class="photo_galerie"/></td></tr><tr><td align="center">'.$data->getEvenement().'</td><tr></table>';
			echo '</form></td>';
			if ($colonne == 3){echo '</tr>';$colonne =0;} else {$colonne ++;}
		}
		if ($colonne != 0){echo '</tr>';}
		echo '</table>';
	}
	
	if(isset($_POST['choixevenement'])){ //SI UN EVENEMENT A ETE SELECTIONNER
		$evenementchoisi=$_POST['choixevenement'];
		if(isset($_SESSION['gererGalerie'])&&$_SESSION['gererGalerie']==true){ //DEMANDE POUR AJOUTER UNE PHOTO A L'EVENEMENT CHOISI
			echo '<form action="galerie.php" method="POST" enctype="multipart/form-data"><div id="mesinput">'
                                . '<p>Ajouter une ou des photos pour l\'évenement : '.$evenementchoisi.'.</p>'
                                . '<label for="monfichier1" >Image 1:</label>'
                                . '<input type="file" id="monfichier1" name="monfichier1"/><br/></div>'
                                . '<input type="hidden" id="nombrelien" name="nombrelien" value="1" />'
                                . '<input type="hidden" name="choixevenement" value="'.$evenementchoisi.'"/>'
                                . '<input type="button" id="ajouterinput" value="Ajouter une autre image" />'
                                . '<input type="submit" value="Ajouter la photo"/></form>';
		}
		
		$nomdossier= $galerieManager-> getNomDossierEvenement($evenementchoisi);
		
		$listPhoto= $photoGalerieManager -> getAllPhotoEvenement($evenementchoisi);
		
		
		if(isset($_POST['passermodeedition'])&&$_POST['passermodeedition']=='true'&&isset($_SESSION['gererGalerie'])&&$_SESSION['gererGalerie']==true){
			echo '<table>';
			$colonne = 0;
			foreach($listPhoto as $data){
				if ($colonne == 0){echo '<tr>';}
				echo '<form action="voirgalerie.php" method="POST"><input type="hidden" name="nomphoto" value="'.$data->getNomPhoto().'"/>';
				echo '<input type="hidden" name="nomevenement" value="'.$_POST['choixevenement'].'"/>';
				echo '<td class="tdphotogalerie"><input type="image" src="'.$pathPicture.$nomdossier.'/'.$data->getNomPhoto().'"/ class="photo_galerie"></form>';
				echo '<form method="POST" action="galerie.php"><input type="hidden" name="supprimerphoto" value="'.$data->getNomPhoto().'"><input type="hidden" name="choixevenement" value="'.$_POST['choixevenement'].'"><input type="submit" value="Supprimer cette photo"/></form></td>';
				if ($colonne == 3){echo '</tr>';$colonne =0;} else {$colonne ++;}
			}
			if ($colonne != 0){echo '</tr>';}
			echo '</table>';
		
		}
		else { //SI ON EST PAS EN MODE EDITION
			echo '<table>';
			$colonne = 0;
			
			foreach($listPhoto as $data){
				if ($colonne == 0){echo '<tr>';}
				echo '<form action="voirgalerie.php" method="POST"><input type="hidden" name="nomphoto" value="'.$data->getNomPhoto().'"/>';
				echo '<input type="hidden" name="nomevenement" value="'.$_POST['choixevenement'].'"/>';
				echo '<td class="tdphotogalerie"><input type="image" alt="test" src="'.$pathPicture.$nomdossier.'/'.$data->getNomPhoto().'"/ class="photo_galerie" ></td>';
				echo '</form>';
				if ($colonne == 3){echo '</tr>';$colonne =0;} else {$colonne ++;}
			} 
			if ($colonne != 0){echo '</tr>';}
			echo '</table>';
			
		}
	}
	
	include("squelettePage/footer.php");
?>
    <script type="text/javascript" src="../js/ajoutimage.js"></script>
</body></html>