<?php
	require_once('MainManager.php');
	include(MainManager::$ABSOLUTE_PATH.'/model/Contact.php');
	
	class ContactManager extends MainManager{
		
		public function add(Contact $contact){
			
			$q = $this->_db->prepare('INSERT INTO `contact`(`pseudo`, `datemessage`, `contenu`, `mail`, `objet`, `ipPosteur`) VALUES (:pseudo,NOW(),:contenu,:mail,:objet,:ipPosteur)');

			$q->bindValue(':pseudo', $contact->getPseudo(), PDO::PARAM_STR);
			$q->bindValue(':contenu',this.convertisseurCaractereAccent($contact->getContenu()), PDO::PARAM_STR);
			$q->bindValue(':mail', $contact->getMail(), PDO::PARAM_STR);
			$q->bindValue(':objet', $contact->getObjet(), PDO::PARAM_STR);
			$q->bindValue(':ipPosteur', $contact->getIpPosteur());
			$q->execute();
		}

		public function getAllContact(){
            $cotnacts = array();

            $q = $this->_db->prepare("SELECT * FROM contact  ORDER BY datemessage DESC ");
            $q->execute();

            while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
                $newContact = new Contact();
                $newContact->hydrate($donnees);
                $cotnacts[] = $newContact;
            }

            return $cotnacts;
        }
	}




?>