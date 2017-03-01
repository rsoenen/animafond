<?php
	class Article{
		private $_titre;
		private $_contenu;
		private $_datePoste;
		private $_auteur;
		private $_ipPosteur;
		private $_numeroArticle;
		private $_evenement; //Boolean
        private $_image;
        private $_preambule;

		public function hydrate(array $donnees){
			foreach ($donnees as $key => $value){
				$method = 'set'.ucfirst($key);
					
				if (method_exists($this, $method)){
				  $this->$method($value);
				}
			}
		}

		// Getter/Acesseur
		public function getTitre(){
			return $this->_titre;
		}
		public function getContenu(){
			return $this->_contenu;
		}
		public function getDatePoste(){
			return $this->_datePoste;
		}
		public function getAuteur(){
			return $this->_auteur;
		}
		public function getIpPosteur(){
			return $this->_ipPosteur;
		}
		public function getNumeroArticle(){
			return $this->_numeroArticle;
		}
		public function isEvenement(){
			return $this->_evenement;
		}
        public function getImage(){
            return $this->_image;
        }
        public function getPreambule(){
            return $this->_preambule;
        }
		
		//setter
		public function setTitre($titre){
			if (is_string($titre)){
				$this->_titre = $titre;
			}
		}
		public function setContenu($contenu){
			if (is_string($contenu)){
				$this->_contenu = $contenu;
			}
		}
		public function setDatePoste($datePoste){
			$this->_datePoste = $datePoste;
		}
		public function setAuteur($auteur){
			if (is_string($auteur)){
				$this->_auteur = $auteur;
			}
		}
		public function setIpPosteur($ipPosteur){
			$this->_ipPosteur = $ipPosteur;
		}
		public function setNumeroArticle($numeroArticle){
			if (!is_numeric($numeroArticle)){
				trigger_error('Le numero de l\'article doit �tre un nombre !', E_USER_WARNING);
				return;
			}
			$this->_numeroArticle = intval($numeroArticle);
		}
		public function setEvenement($evenement){
			$this->_evenement = $evenement;
		}
        public function setImage($image){
            if (is_string($image)){
                $this->_image = $image;
            }
        }
        public function setPreambule($preambule){
            if (is_string($preambule)){
                $this->_preambule = $preambule;
            }
        }
    }


?>