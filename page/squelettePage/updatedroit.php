<?php	
	if(isset($_SESSION['pseudo'])){  //si on est connecter, on recupere les droits
	$requeteupdate = $bdd->prepare('SELECT * FROM `rang` WHERE nomrang=:rang;'); 
	$requeteupdate->bindParam(':rang', $_SESSION['rang'], PDO::PARAM_STR);
	$requeteupdate->execute();
	$row = $requeteupdate->fetch();
		$_SESSION['editerequipe']=$row['editerequipe'];
		$_SESSION['editercom']=$row['editercommentaire'];
		$_SESSION['supprimercom']=$row['supprimercommentaire'];
		$_SESSION['ecrireart']=$row['ecrirearticle'];
		$_SESSION['editerart']=$row['editerarticle'];
		$_SESSION['editerpartenaire']=$row['editerpartenaire'];
		$_SESSION['supprimerart']=$row['supprimerarticle'];
		$_SESSION['gereroffre']=$row['gereroffre'];
		$_SESSION['gererrang']=$row['gererrang'];
		$_SESSION['modifierbandeau']=$row['modifierbandeau'];
		$_SESSION['gerergalerie']=$row['gerergalerie'];
		$_SESSION['gererpages']=$row['gererpages'];
		$_SESSION['voirPointAnimation']=$row['voirPointAnimation'];
		$_SESSION['gestionEvenement']=$row['gestionEvenement'];
	}?>