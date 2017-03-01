<?php
	class Contact{
		private $_pseudo;
		private $_dateMessage;
		private $_contenu;
		private $_mail;
		private $_objet;
		private $_ipPosteur;

		public function hydrate(array $donnees){
			foreach ($donnees as $key => $value){
				$method = 'set'.ucfirst($key);
					
				if (method_exists($this, $method)){
				  $this->$method($value);
				}
			}
		}
		
		//constructeur ajouter bdd
		/*public function __construct(){
			
		}*/

		
		
		// Getter/Acesseur
		public function getPseudo(){
			return $this->_pseudo;
		}
		public function getDateMessage(){
			return $this->_dateMessage;
		}
		public function getContenu(){
			return $this->_contenu;
		}
		public function getMail(){
			return $this->_mail;
		}
		public function getObjet(){
			return $this->_objet;
		}
		public function getIpPosteur(){
			return $this->_ipPosteur;
		}
		
		
		//setter
		public function setPseudo($pseudo){
			if (is_string($pseudo)){
				$this->_pseudo = $pseudo;
			}
		}
		public function setDateMessage($dateMessage){
			$this->_dateMessage = $dateMessage;
		}
		public function setContenu($contenu){
			if (is_string($contenu)){
				$this->_contenu = $contenu;
			}
		}
		public function setMail($mail){
			if (is_string($mail)){
				$this->_mail = $mail;
			}
		}
		public function setObjet($objet){
			if (is_string($objet)){
				$this->_objet = $objet;
			}
		}
		public function setIpPosteur($ipPosteur){
			$this->_ipPosteur = $ipPosteur;
		}

	}

?>