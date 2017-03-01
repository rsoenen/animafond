<?php


	class PhotoGalerie{
		private $_nomPhoto;
		private $_evenement;
		private $_auteur;
		private $_datePoste;
		private $_numeroPhoto;
		
		public function hydrate(array $donnees){
			foreach ($donnees as $key => $value){
				$method = 'set'.ucfirst($key);
					
				if (method_exists($this, $method)){
				  $this->$method($value);
				}
			}
		}
	
		public function __construct(){
		}

		// Getter/Acesseur
		public function getNomPhoto(){
			return $this->_nomPhoto;
		}
		public function getEvenement(){
			return $this->_evenement;
		}
		public function getAuteur(){
			return $this->_auteur;
		}
		public function getDatePoste(){
			return $this->_datePoste;
		}
		public function getNumeroPhoto(){
			return $this->_numeroPhoto;
		}
		
		
		//setter
		
		public function setNomPhoto($nomPhoto){
			if (is_string($nomPhoto)){
				$this->_nomPhoto = $nomPhoto;
			}
		}
		public function setEvenement($evenement){
			if (is_string($evenement)){
				$this->_evenement = $evenement;
			}
		}
		public function setAuteur($auteur){
			if (is_string($auteur)){
				$this->_auteur = $auteur;
			}
		}
		public function setDatePoste($datePoste){
			$this->_datePoste = $datePoste;
		}
		public function setNumeroPhoto($numeroPhoto){
			if (!is_numeric($numeroPhoto)){
				trigger_error('Le numero de la photo doit être un nombre !', E_USER_WARNING);
				return;
			}
			$this->_numeroPhoto = intval($numeroPhoto);
		}
	}


?>