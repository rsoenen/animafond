<?php
	require_once('MainManager.php');
	include(MainManager::$ABSOLUTE_PATH.'/model/Utilisateur.php');
	
	class UtilisateurManager extends MainManager{
		
		public function add(Utilisateur $utilisateur){
			$q = $this->_db->prepare('INSERT INTO utilisateur VALUES (:pseudo,:mdphache,:sexe,"membre",:mail,"",NOW())');
			$q->bindValue(':pseudo', $utilisateur->getPseudo(), PDO::PARAM_STR);
			$q->bindValue(':mdphache', $utilisateur->getMdp(), PDO::PARAM_STR);
			$q->bindValue(':sexe', $utilisateur->isHomme(), PDO::PARAM_BOOL);
			$q->bindValue(':mail', $utilisateur->getMail(), PDO::PARAM_STR);

			$q->execute();
		}
		
		public function searchUtilisateur($pseudo){
			$q = $this->_db->prepare("SELECT * FROM utilisateur WHERE pseudo=:pseudo;"); 
			$q->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
			$q->execute();		
			
			$donnees = $q->fetch(PDO::FETCH_ASSOC);
			$utilisateur = new Utilisateur();
			
			if (!empty($donnees)){
				$utilisateur->hydrate($donnees);			
			}
			return $utilisateur;
		}
		
		public function getAllUtilisateur(){
			$utilisateurs = array();
			
			$q = $this->_db->prepare("SELECT * FROM `utilisateur` ORDER BY pseudo ASC"); 
			$q->execute();
			
			while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
				$newUtilisateur = new Utilisateur();
				$newUtilisateur->hydrate($donnees);
				$utilisateurs[] = $newUtilisateur;				
			}
			
			return $utilisateurs;
		}
		
		public function updateLastConnexion(Utilisateur $utilisateur){
			$q = $this->_db->prepare("UPDATE utilisateur SET derniereconnexion=NOW() WHERE pseudo=:pseudo");
			$q->bindValue(':pseudo', $utilisateur->getPseudo(), PDO::PARAM_STR);
			$q->execute();
		}
		
		public function updateMdp(Utilisateur $utilisateur){
			
			$q = $this->_db->prepare("UPDATE utilisateur SET mdp=:mdp WHERE pseudo=:pseudo");
			$q->bindValue(':pseudo', $utilisateur->getPseudo(), PDO::PARAM_STR);
			$q->bindValue(':mdp', $utilisateur->getMdp(), PDO::PARAM_STR);
			$q->execute();
		}
		
		public function updateMail($pseudo, $mail){
			
			$q = $this->_db->prepare("UPDATE utilisateur SET mail=:mail WHERE pseudo=:pseudo");
			$q->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
			$q->bindValue(':mail', $mail, PDO::PARAM_STR);
			$q->execute();
		}
		
		public function updateRang($pseudo, $rang){
			$q = $this->_db->prepare("UPDATE `utilisateur` SET `rang`=:rang WHERE `pseudo`=:pseudo;");
			$q->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
			$q->bindValue(':rang', $mail, PDO::PARAM_STR);
			$q->execute();
		}
		
	}




?>