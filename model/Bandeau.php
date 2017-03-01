<?php
	class Bandeau{
		private $_textBandeau;
		private $_lastUpdateur;

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
		public function getTextBandeau(){
			return $this->_textBandeau;
		}
		public function getLastUpdateur(){
			return $this->_lastUpdateur;
		}
		
		
		//setter
		public function setTextBandeau($textBandeau){
			if (is_string($textBandeau)){
				$this->_textBandeau = $textBandeau;
			}
		}
		public function setLastUpdateur($lastUpdateur){
			if (is_string($lastUpdateur)){
				$this->_lastUpdateur = $lastUpdateur;
			}
		}
	}


?>