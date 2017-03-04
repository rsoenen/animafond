<?php
	require_once('MainManager.php');
	include(MainManager::$ABSOLUTE_PATH.'/model/Partenaire.php');
	
	class PartenaireManager extends MainManager{
		
		private $pathPicture = "../image/partenaire/";
		
		public function addPartenaire(Partenaire $partenaire){
			
			$nomImage = $this->sendPicture($partenaire->getNom(),$this->getPathPicture());
			
			$q = $this->_db->prepare('INSERT INTO partenaire VALUES (:nom,:image,:lien,:statut)');
			$q->bindValue(':nom', $partenaire->getNom(), PDO::PARAM_STR);
			$q->bindValue(':image', $nomImage, PDO::PARAM_STR);
			$q->bindValue(':lien', $partenaire->getLien(), PDO::PARAM_STR);
			$q->bindValue(':statut', $partenaire->getStatut(), PDO::PARAM_STR);

			$q->execute();
		}
		
		public function updatePartenaire(Partenaire $partenaireUpdate){
			
			if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0){ 
				$q = $this->_db->prepare("SELECT * FROM partenaire WHERE nom=:nom;"); 
				$q->bindValue(':nom', $partenaireUpdate-> getNom(), PDO::PARAM_STR);
				$q->execute();
				
				$donnees = $q->fetch(PDO::FETCH_ASSOC);
				$partenaire = new Partenaire();
			
				if (!empty($donnees)){
					$partenaire->hydrate($donnees);	
					unlink($this ->getPathPicture().$partenaire->getImage());					
				}
				$nomImage = $this->sendPicture($partenaireUpdate->getNom(),$this->getPathPicture());
				
				$q = $this->_db->prepare('UPDATE `partenaire` SET `lien`=:lien, image=:image, statut=:statut WHERE nom=:nom');
				$q->bindValue(':lien', $partenaireUpdate->getLien(), PDO::PARAM_STR);
				$q->bindValue(':image', $nomImage, PDO::PARAM_STR);
				$q->bindValue(':statut', $partenaireUpdate->getStatut(), PDO::PARAM_STR);
				$q->bindValue(':nom', $partenaireUpdate->getNom(), PDO::PARAM_STR);
				$q->execute();
			}
			else { //UPDATE SANS CHANGEMENT D'IMAGE
			
				$q = $this->_db->prepare('UPDATE `partenaire` SET `lien`=:lien, `statut`=:statut WHERE nom=:nom');
				$q->bindValue(':lien', $partenaireUpdate->getLien(), PDO::PARAM_STR);
				$q->bindValue(':statut', $partenaireUpdate->getStatut(), PDO::PARAM_STR);
				$q->bindValue(':nom', $partenaireUpdate->getNom(), PDO::PARAM_STR);
				$q->execute();
				
			}
		}
		
		public function partenaireByName($image){
			$q = $this->_db->prepare("SELECT * FROM partenaire WHERE image=:image;"); 
			$q->bindValue(':image', $image, PDO::PARAM_STR);
			$q->execute();
			
			$donnees = $q->fetch(PDO::FETCH_ASSOC);
			$partenaire = new Partenaire();
			
			if (!empty($donnees)){
				$partenaire->hydrate($donnees);		
			}
			
			return $partenaire;
		}
		
		public function listPartenaireByStatut($statut){
			$listPartenaire= array();
			
			$q = $this->_db->prepare("SELECT * FROM partenaire WHERE statut=:statut;"); 
			$q->bindValue(':statut', $statut, PDO::PARAM_STR);
			$q->execute();		
			
			while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
				$partenaire = new Partenaire();
				$partenaire->hydrate($donnees);
				$listPartenaire[] = $partenaire;				
			}

			return $listPartenaire;
		}
		
		public function deletePartenaire(Partenaire $partenaire){
			$q = $this->_db->prepare('DELETE FROM `partenaire` WHERE nom=:nom');
			$q->bindValue(':nom', $partenaire->getNom(), PDO::PARAM_STR);
			$q->execute();
			
			unlink($this ->getPathPicture().$partenaire->getImage());
		}
		
		public function getPathPicture(){
			return $this ->pathPicture;
		}
		
	}




?>