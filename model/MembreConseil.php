<?php


	class MembreConseil{
		private $_role;
		private $_nom;
		private $_prenom;
		private $_position;
		private $_image;

		public function hydrate(array $donnees){
			foreach ($donnees as $key => $value){
				$method = 'set'.ucfirst($key);
					
				if (method_exists($this, $method)){
				  $this->$method($value);
				}
			}
		}
		
		//constructeur ajouter bdd
		//public function __construct(){
			
		//}

		// Getter/Acesseur
		public function getRole(){
			return $this->_role;
		}
		public function getNom(){
			return $this->_nom;
		}
		public function getPrenom(){
			return $this->_prenom;
		}
		public function getPosition(){
			return $this->_position;
		}
		public function getImage(){
			return $this->_image;
		}
		
		//setter
		public function setRole($role){
			if (is_string($role)){
				$this->_role = $role;
			}
		}
		public function setNom($nom){
			if (is_string($nom)){
				$this->_nom = $nom;
			}
		}
		public function setPrenom($prenom){
			if (is_string($prenom)){
				$this->_prenom = $prenom;
			}
		}
		public function setPosition($position){
			if (!is_numeric($position)){
				trigger_error('La position doit être un nombre !', E_USER_WARNING);
				return;
			}
			$this->_position = intval($position);
		}
		public function setImage($image){
			if (is_string($image)){
				$this->_image = $image;
			}
		}

		public function updateMembre($_role, $_nom, $_prenom,$_position){
			$this->setRole($_role);
			$this->setNom($_nom);
			$this->setPrenom($_prenom);
			$this->setPosition($_position);
		}
	}


?>