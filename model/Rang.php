<?php


	class Rang{
		private $_nomRang;
		private $_gererEvenement;
		private $_gererCommentaire;
		private $_gererArticle;
		private $_gererPageDiverse;
		private $_gererTrocAFond;
		private $_gererRang;
		private $_gererBandeau;
		private $_gererGalerie;
		private $_gererPointAnimation;
		
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
		public function getNomRang(){
			return $this->_nomRang;
		}
		public function gereEvenement(){
			return $this->_gererEvenement;
		}
		public function gereCommentaire(){
			return $this->_gererCommentaire;
		}
		public function gereArticle(){
			return $this->_gererArticle;
		}
		public function gerePageDiverse(){
			return $this->_gererPageDiverse;
		}
		public function gereTrocAFond(){
			return $this->_gererTrocAFond;
		}
		public function gereRang(){
			return $this->_gererRang;
		}
		public function gereBandeau(){
			return $this->_gererBandeau;
		}
		public function gereGalerie(){
			return $this->_gererGalerie;
		}
		public function gerePointAnimation(){
			return $this->_gererPointAnimation;
		}
		//setter
		
		public function setNomRang($nomRang){
			if (is_string($nomRang)){
				$this->_nomRang = $nomRang;
			}
		}
		public function setGererEvenement($gererEvenement){
			$this->_gererEvenement = $gererEvenement;
		}
		public function setGererCommentaire($gererCommentaire){
			$this->_gererCommentaire = $gererCommentaire;
		}
		public function setGererArticle($gererArticle){
			$this->_gererArticle = $gererArticle;
		}
		public function setGererPageDiverse($gererPageDiverse){
			$this->_gererPageDiverse = $gererPageDiverse;
		}
		public function setGererTrocAFond($gererTrocAFond){
			$this->_gererTrocAFond = $gererTrocAFond;
		}
		public function setGererRang($gererRang){
			$this->_gererRang = $gererRang;
		}
		public function setGererBandeau($gererBandeau){
			$this->_gererBandeau = $gererBandeau;
		}
		public function setGererGalerie($gererGalerie){
			$this->_gererGalerie = $gererGalerie;
		}
		public function setGererPointAnimation($gererPointAnimation){
			$this->_gererPointAnimation = $gererPointAnimation;
		}
	}


?>