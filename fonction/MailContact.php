<?php
	$mail='animafond@live.fr';  // D�claration de l'adresse de destination.
	if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui pr�sentent des bogues.
	{
		$passage_ligne = "\r\n";
	}
	else
	{
		$passage_ligne = "\n";
	}
	//=====D�claration des messages au format texte et au format HTML.
	$message_txt ="De ".$nom.", ".$mailcontact.$passage_ligne.$passage_ligne.$_POST['contenu'];
	$message_html = "<html><head></head><body><b>Message de ".$nom."(".$mailcontact.")</b><br/><br/>".$_POST['contenu'].".</body></html>";
	//==========
	 
	//=====Cr�ation de la boundary.
	$boundary = "-----=".md5(rand());
	//==========
	 
	//=====D�finition du sujet.
	if(isset($_POST['objet'])){$sujet=$_POST['objet'];}else{$sujet="Message d'un utilisateur du site";}
	//=========
	 
	//=====Cr�ation du header de l'e-mail.
	$header = "From: \"".$nom."\"<".$mailcontact.">".$passage_ligne;
	$header.= "Reply-to: \"Animafond\" <animafond@live.fr>".$passage_ligne;
	$header.= "MIME-Version: 1.0".$passage_ligne;
	$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
	//==========
	 
	//=====Cr�ation du message.
		$message = $passage_ligne."--".$boundary.$passage_ligne;
		//=====Ajout du message au format texte.
		$message.= "Content-Type: text/plain; charset=\"UTF-8\"".$passage_ligne;
		$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
		$message.= $passage_ligne.$message_txt.$passage_ligne;
		//==========
		$message.= $passage_ligne."--".$boundary.$passage_ligne;
		//=====Ajout du message au format HTML
		$message.= "Content-Type: text/html; charset=\"UTF-8\"".$passage_ligne;
		$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
		$message.= $passage_ligne.$message_html.$passage_ligne;
		//==========
		$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
		$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
		//==========
	//=====Envoi de l'e-mail.
	mail($mail,$sujet,$message,$header);
	 
	//==========
		
	
	
	// MESSAGE DE CONFIMATION A LA PERSONNE
	
	$mail=$mailcontact;  // D�claration de l'adresse de destination.
	if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui pr�sentent des bogues.
	{
		$passage_ligne = "\r\n";
	}
	else
	{
		$passage_ligne = "\n";
	}
	//=====D�claration des messages au format texte et au format HTML.
	$message_txt =$message_txt ="Bonjour,".$passage_ligne.$passage_ligne."Votre mail a bien été transmis à ANIM'A FOND. Nous traiterons votre demande dès que possible.".$passage_ligne." En cas de demande urgente, vous pouvez contacter Cyril RAVET au 06.63.60.86.58.".$passage_ligne.$passage_ligne."Cordialement".$passage_ligne.$passage_ligne." L'�quipe d'ANIM'A FOND";
	$message_html = "<html><head></head><body><b>Bonjour,</b><br/><br/>Votre mail a bien été transmis à ANIM'A FOND. Nous traiterons votre demande dès que possible.<br/>En cas de demande urgente, vous pouvez contacter Cyril RAVET au 06.63.60.86.58.<br/><br/>L'�quipe d'ANIM'A FOND</body></html>";
	//==========
	 
	//=====Cr�ation de la boundary.
	$boundary = "-----=".md5(rand());
	//==========
	 
	//=====D�finition du sujet.
	$sujet = "Confirmation d'envoi de votre message";
	//=========
	 
	//=====Cr�ation du header de l'e-mail.
	$header = "From: \"Animafond\" <animafond@live.fr>".$passage_ligne;
	$header.= "Reply-to: \"".$nom."\"<".$mailcontact.">".$passage_ligne;
	$header.= "MIME-Version: 1.0".$passage_ligne;
	$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
	//==========
	 
	//=====Cr�ation du message.
		$message = $passage_ligne."--".$boundary.$passage_ligne;
		//=====Ajout du message au format texte.
		$message.= "Content-Type: text/plain; charset=\"UTF-8\"".$passage_ligne;
		$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
		$message.= $passage_ligne.$message_txt.$passage_ligne;
		//==========
		$message.= $passage_ligne."--".$boundary.$passage_ligne;
		//=====Ajout du message au format HTML
		$message.= "Content-Type: text/html; charset=\"UTF-8\"".$passage_ligne;
		$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
		$message.= $passage_ligne.$message_html.$passage_ligne;
		//==========
		$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
		$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
	//==========
	//=====Envoi de l'e-mail.
	mail($mail,$sujet,$message,$header);
?>