<?php


	class Partenaire{
		private $_nom;
		private $_image;
		private $_lien;
		private $_statut;
		
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
			
		}

		// Getter/Acesseur
		public function getNom(){
			return $this->_nom;
		}
		public function getImage(){
			return $this->_image;
		}
		public function getLien(){
			return $this->_lien;
		}
		public function getStatut(){
			return $this->_statut;
		}
		
		//setter
		public function setNom($nom){
			if (is_string($nom)){
				$this->_nom = $nom;
			}
		}
		public function setImage($image){
			if (is_string($image)){
				$this->_image = $image;
			}
		}
		public function setLien($lien){
			if (is_string($lien)){
				$this->_lien = $lien;
			}
		}
		public function setStatut($statut){
			if (is_string($statut)){
				$this->_statut = $statut;
			}
		}
		
		public function updatePartenaire($nom, $lien, $statut){
			$this->setNom($nom);
			$this->setLien($lien);
			$this->setStatut($statut);			
		}
	}


?>