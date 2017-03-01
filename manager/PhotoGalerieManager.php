<?php	

	require_once('MainManager.php');
	require_once('GalerieManager.php');
	include('/../model/PhotoGalerie.php');
	
	class PhotoGalerieManager extends MainManager{
		 		
		private $pathPicture = "../image/galerie/" ;
		
		public function addPhoto(PhotoGalerie $newPhoto, $nomFichier){
			
			$galerieManager = new GalerieManager();
			
			$nomdossier = $galerieManager -> getNomDossierEvenement($newPhoto->getEvenement());
					
			$q = $this->_db->prepare('SELECT numeroPhoto FROM photogalerie WHERE evenement=:evenement ORDER BY numerophoto DESC LIMIT 1');
			$q -> bindValue(':evenement', $newPhoto->getEvenement(), PDO::PARAM_STR);
			$q -> execute();
			$row = $q -> fetch();
			$numerophoto=$row['numeroPhoto']+1;
						
			$nomphoto= $this->sendPicture("photo".$numerophoto,$this->getPathPicture().$nomdossier."/",$nomFichier);
				
			$q = $this->_db->prepare('INSERT INTO `photogalerie`(`nomPhoto`, `evenement`, `auteur`,`datePoste`,`numeroPhoto`) VALUES (:nomphoto,:evenement,:pseudo,NOW(),:numerophoto);');
			$q-> bindValue(':nomphoto', $nomphoto, PDO::PARAM_STR);
			$q-> bindValue(':evenement', $newPhoto->getEvenement(), PDO::PARAM_STR);
			$q-> bindValue(':pseudo', $newPhoto->getAuteur(), PDO::PARAM_STR);
			$q-> bindValue(':numerophoto', $numerophoto, PDO::PARAM_INT);
			$q-> execute();
		}
		
		public function deletePhoto(PhotoGalerie $delPhotoGalerie){
		
			$galerieManager = new GalerieManager();
			
			$numeroEvenement = $galerieManager -> getNumeroEvenement($delPhotoGalerie->getEvenement());
			
			unlink($this->pathPicture."evenement".$numeroEvenement."/".$delPhotoGalerie->getNomPhoto()); 
			
			$q = $this->_db->prepare('DELETE FROM `photogalerie` WHERE nomPhoto=:nomphoto AND evenement=:evenement;');
			$q->bindValue(':nomphoto', $delPhotoGalerie->getNomPhoto(), PDO::PARAM_STR);
			$q->bindValue(':evenement', $delPhotoGalerie->getEvenement(), PDO::PARAM_STR);
			$q->execute();
		}
		
		public function getFirstPictureEvenement($evenement){
			
			$q = $this->_db->prepare('SELECT `nomPhoto` FROM `photogalerie` WHERE  `evenement`=:evenement ORDER BY `numeroPhoto` ASC LIMIT 1');
			$q->bindValue(':evenement',$evenement, PDO::PARAM_STR);
			$q->execute();
			$row = $q->fetch();
			
			return $row['nomPhoto'];
		}
		
		public function getAllPhotoEvenement($evenement){
			$photos = [];
			
			$q = $this->_db->prepare('SELECT nomphoto  FROM `photogalerie` WHERE evenement=:evenement');
			$q -> bindValue(':evenement',$evenement, PDO::PARAM_STR);
			$q -> execute();
			
			while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
				$newPhoto = new PhotoGalerie();
				$newPhoto->hydrate($donnees);
				$photos[] = $newPhoto;				
			}
			
			return $photos;
		}
		
		public function getPreviousNextPicture($evenement,$nomPhoto){
			$photos = $this->getAllPhotoEvenement($evenement);
			
			$l = 0;
			while($photos[$l]->getNomPhoto()!= $nomPhoto && $l < count($photos)){ //TEST POUR RETROUVER LA PHOTO SELECTIONNER
				$l=$l+1;
			}
			if($photos[$l]->getNomPhoto() == $nomPhoto){ //ON PREND LES PHOTOS AUTOUR
				$imageprecedente = null;
				$imagesuivante = null;
				if($l>0){$imageprecedente=$photos[$l-1]->getNomPhoto();}
				if($l<count($photos)){$imagesuivante=$photos[$l+1]->getNomPhoto();}
			}
			$rep=[$imageprecedente,$imagesuivante];
			
			return $rep;
		}
		
		public function getPathPicture(){
			return $this ->pathPicture;
		}
		
	}




?>