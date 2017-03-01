<?php
	class Commentaire{
		private $_numeroArticle;
		private $_numeroCommentaire;
		private $_contenu;
		private $_auteur;
		private $_ipPosteur;
		private $_datePoste;
		private $_visible;
		private $_nbxEdition;

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
		public function getNumeroArticle(){
			return $this->_numeroArticle;
		}
		public function getNumeroCommentaire(){
			return $this->_numeroCommentaire;
		}
		public function getContenu(){
			return $this->_contenu;
		}
		public function getAuteur(){
			return $this->_auteur;
		}
		public function getIpPosteur(){
			return $this->_ipPosteur;
		}
		public function getDatePoste(){
			return $this->_datePoste;
		}
		public function isVisible(){
			return $this->_visible;
		}
		public function getNbxEdition(){
			return $this->_nbxEdition;
		}

		
		//setter
		public function setNumeroArticle($numeroArticle){
			if (!is_numeric($numeroArticle)){
				trigger_error('Le numero de l\'article doit être un nombre !', E_USER_WARNING);
				return;
			}
			
			$this->_numeroArticle = intval($numeroArticle);
		}
		public function setNumeroCommentaire($numeroCommentaire){
			if (!is_numeric($numeroCommentaire)){
				trigger_error('Le numero du commentaire doit être un nombre !', E_USER_WARNING);
				return;
			}
			$this->_numeroCommentaire = intval($numeroCommentaire);
		}
		public function setContenu($contenu){
			if (is_string($contenu)){
				$this->_contenu = $contenu;
			}
		}
		public function setAuteur($auteur){
			if (is_string($auteur)){
				$this->_auteur = $auteur;
			}
		}
		public function setIpPosteur($ipPosteur){
			if (is_string($ipPosteur)){
				$this->_ipPosteur = $ipPosteur;
			}
		}
		public function setDatePoste($datePoste){
			$this->_datePoste = $datePoste;
		}
		public function setVisible($visible){
			$this->_visible = $visible;
		}
		public function setNbxEdition($nbxEdition){
			if (!is_numeric($nbxEdition)){
				trigger_error('Le nombre d\'édition doit être un nombre !', E_USER_WARNING);
				return;
			}
			$this->_nbxEdition = intval($nbxEdition);
		}
		
		

	}


?>