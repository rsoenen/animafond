<?php	

	require_once('MainManager.php');
	include('/../model/MembreConseil.php');
	
	class MembreConseilManager extends MainManager{
		
		private $pathPicture = "../image/quisommesnous/" ;
		
		public function addMembreConseil(MembreConseil $newMembre){
			
			$nomImageSansExtension=$newMembre->getNom().$newMembre->getPrenom();
			$nomImage = $this->sendPicture($nomImageSansExtension,$this->getPathPicture(),'monfichier');
			
			$q = $this->_db->prepare('INSERT INTO `membreconseil`(`role`, `prenom`, `nom`, `position`, `image`) VALUES (:role,:prenom,:nom,:position,:image)');

			$q->bindValue(':role', $newMembre->getRole(), PDO::PARAM_STR);
			$q->bindValue(':prenom', $newMembre->getPrenom(), PDO::PARAM_STR);
			$q->bindValue(':nom', $newMembre->getNom(), PDO::PARAM_STR);
			$q->bindValue(':position', $newMembre->getPosition(), PDO::PARAM_INT);
			$q->bindValue(':image', $nomImage, PDO::PARAM_STR);

			$q->execute();
		}
		
		public function updateMembreConseil(MembreConseil $membre){
			
			$q = $this->_db->prepare('UPDATE `membreconseil` SET `role`=:role, position=:position WHERE `nom`=:nom AND `prenom`=:prenom');
			$q->bindValue(':role', $membre->getRole(), PDO::PARAM_STR);
			$q->bindValue(':position', $membre->getPosition(), PDO::PARAM_INT);
			$q->bindValue(':nom', $membre->getNom(), PDO::PARAM_STR);
			$q->bindValue(':prenom', $membre->getPrenom(), PDO::PARAM_STR);
			$q ->execute();
		}
		
		public function getListMembreConseil(){
			$membresConseil = [];
			
			$q = $this->_db->prepare("SELECT * FROM membreconseil ORDER BY position ASC"); 
			$q->execute();
			
			while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
				$newMembreConseil = new MembreConseil();
				$newMembreConseil->hydrate($donnees);
				$membresConseil[] = $newMembreConseil;				
			}
			
			return $membresConseil;
		}
		
		public function deleteMembreConseil(MembreConseil $membreDelete){
			unlink($this ->getPathPicture().$membreDelete->getImage());
			
			$q = $this->_db->prepare("DELETE FROM `membreconseil` WHERE role=:role AND nom=:nom");
			$q->bindValue(':role', $membreDelete->getRole(), PDO::PARAM_STR);
			$q->bindValue(':nom', $membreDelete->getNom(), PDO::PARAM_STR);
			$q->execute();
		}
		
		public function updatePicture(MembreConseil $membreUpdate){			
			unlink($this ->getPathPicture().$membreUpdate->getImage());
			
			$nomImageSansExtension=$membreUpdate->getNom().$membreUpdate->getPrenom();
			$nomImage = $this->sendPicture($nomImageSansExtension,$this->getPathPicture(),'monfichier');
			
			
			$q = $this->_db->prepare('UPDATE `membreconseil` SET `image`=:image WHERE `nom`=:nom AND `prenom`=:prenom');
			$q->bindValue(':image', $nomImage, PDO::PARAM_STR);
			$q->bindValue(':nom', $membreUpdate->getNom(), PDO::PARAM_STR);
			$q->bindValue(':prenom', $membreUpdate->getPrenom(), PDO::PARAM_STR);
			$q ->execute();
			
		}
		
		public function getPathPicture(){
			return $this->pathPicture;
		}
	}
?>