<?php


	class Utilisateur{
		private $_pseudo;
		private $_mdp;
		private $_homme;
		private $_rang;
		private $_mail;
		private $_derniereConnexion;

		public function hydrate(array $donnees){
			foreach ($donnees as $key => $value){
				$method = 'set'.ucfirst($key);
					
				if (method_exists($this, $method)){
				  $this->$method($value);
				}
			}
		}
		
		//constructeur ajouter bdd
		public function __construct(){
			$this->setRang("membre");
		}

		// Getter/Acesseur
		public function getPseudo(){
			return $this->_pseudo;
		}
		public function getMdp(){
			return $this->_mdp;
		}
		public function isHomme(){
			return $this->_homme;
		}
		public function getRang(){
			return $this->_rang;
		}
		public function getMail(){
			return $this->_mail;
		}
		public function getDerniereConnexion(){
			return $this->_derniereConnexion;
		}
		
		//setter
		public function setPseudo($pseudo){
			if (is_string($pseudo)){
				$this->_pseudo = $pseudo;
			}
		}
		public function setMdp($mdp){
			if (is_string($mdp)){
				$this->_mdp = $mdp;
			}
		}
		public function setHomme($homme){
			$this->_homme = $homme;
		}
		public function setRang($rang){
			if (is_string($rang)){
				$this->_rang = $rang;
			}
		}
		public function setMail($mail){
			if (is_string($mail)){
				$this->_mail = $mail;
			}
		}
		public function setDerniereConnexion($derniereConnexion){
			$this->_derniereConnexion = $derniereConnexion;
		}
	}


?>