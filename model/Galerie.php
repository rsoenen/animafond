<?php


	class Galerie{
		private $_evenement;
		private $_createurGalerie;
		private $_dateCreation;
		private $_numeroEvenement;
		private $_nomDossier;
		
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
		public function getEvenement(){
			return $this->_evenement;
		}
		public function getCreateurGalerie(){
			return $this->_createurGalerie;
		}
		public function getDateCreation(){
			return $this->_dateCreation;
		}
		public function getNumeroEvenement(){
			return $this->_numeroEvenement;
		}
		public function getNomDossier(){
			return $this->_nomDossier;
		}
		
		//setter
		public function setEvenement($evenement){
			if (is_string($evenement)){
				$this->_evenement = $evenement;
			}
		}
		public function setCreateurGalerie($createur){
			if (is_string($createur)){
				$this->_createurGalerie = $createur;
			}
		}
		public function setDateCreation($dateCreation){
			$this->_dateCreation = $dateCreation;
		}
		public function setNumeroEvenement($numeroEvenement){
			if (!is_numeric($numeroEvenement)){
				trigger_error('Le numero de l\'événement doit être un nombre !', E_USER_WARNING);
				return;
			}
			$this->_numeroEvenement = intval($numeroEvenement);
		}
		public function setNomDossier($nomDossier){
			if (is_string($nomDossier)){
				$this->_nomDossier = $nomDossier;
			}
		}
	}


?>