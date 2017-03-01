<?php	

	require_once('MainManager.php');
	include('/../model/Galerie.php');
	
	class GalerieManager extends MainManager{
		 		
		public function addGalerie(Galerie $galerie){
			$q = $this->_db->query("SELECT numeroevenement FROM galerie ORDER BY numeroevenement DESC LIMIT 1");
			$row = $q->fetch();
			
			$numeroevenement=$row['numeroevenement']+1;
			$nomevenement="evenement".$numeroevenement;
			
			$q = $this->_db->prepare('INSERT INTO `galerie`(`evenement`, `createurGalerie`, `dateCreation`,`numeroEvenement`, `nomDossier` ) VALUES (:addEvenement,:pseudo,NOW(),:numeroEvenement,:nomEvenement)');

			$q->bindValue(':addEvenement', $galerie->getEvenement(), PDO::PARAM_STR);
			$q->bindValue(':pseudo', $galerie->getCreateurGalerie(), PDO::PARAM_STR);
			$q->bindValue(':numeroEvenement', $numeroevenement, PDO::PARAM_INT);
			$q->bindValue(':nomEvenement', $nomevenement, PDO::PARAM_STR);

			$q->execute();
			
			mkdir("../image/galerie/evenement".$numeroevenement, 0777);
		}
		
		public function getListGalerie (){
			$galeries = [];
			
			$q = $this->_db->query('SELECT `evenement`,`nomDossier`  FROM `galerie` ORDER BY `evenement` DESC'); 
			
			while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
				$newGalerie = new Galerie();
				$newGalerie->hydrate($donnees);
				$galeries[] = $newGalerie;				
			}
			
			return $galeries;
		}
		
		public function getNomDossierEvenement($evenement){
			
			$q = $this->_db->prepare('SELECT nomDossier FROM galerie WHERE evenement=:evenement ORDER BY nomdossier DESC LIMIT 1;');
			$q-> bindParam(':evenement', $evenement, PDO::PARAM_STR);
			$q-> execute();
			$row = $q->fetch();
			
			return $row['nomDossier'];
		}
		
		public function getNumeroEvenement($evenement){
			
			$q = $this->_db->prepare("SELECT numeroEvenement FROM galerie WHERE evenement=:evenement;"); 
			$q->bindValue(':evenement', $evenement, PDO::PARAM_STR);
			$q->execute();
			$row = $q->fetch();
			
			return $row['numeroEvenement'];
			
		}
	}




?>