<?php
	require_once('MainManager.php');
	include(MainManager::$ABSOLUTE_PATH.'/model/Rang.php');
	
	class RangManager extends MainManager{
		
		public function addRang(Rang $rang){
						
			$q = $this->_db->prepare("INSERT INTO `rang`(`nomRang`, `gererEvenement`, `gererCommentaire`, `gererArticle`, 
			`gererPageDiverse`, `gererTrocAFond`, `gererRang`, `gererBandeau`, `gererGalerie`, `gererPointAnimation`) VALUES 
			(:nomRang,:gererEvenement,:gererCommentaire,:gererArticle,:gererPageDiverse,:gererTrocAFond,:gererRang,:gererBandeau,:gererGalerie,:gererPointAnimation)");
			
			$q->bindValue(':nomRang',$rang->getNomRang(), PDO::PARAM_STR);
			$q->bindValue(':gererEvenement',$rang->gereEvenement(), PDO::PARAM_BOOL);
			$q->bindValue(':gererCommentaire',$rang->gereCommentaire(), PDO::PARAM_BOOL);
			$q->bindValue(':gererArticle',$rang->gereArticle(), PDO::PARAM_BOOL);
			$q->bindValue(':gererPageDiverse',$rang->gerePageDiverse(), PDO::PARAM_BOOL);
			$q->bindValue(':gererTrocAFond',$rang->gereTrocAFond(), PDO::PARAM_BOOL);
			$q->bindValue(':gererRang',$rang->gereRang(), PDO::PARAM_BOOL);
			$q->bindValue(':gererBandeau',$rang->gereBandeau(), PDO::PARAM_BOOL);
			$q->bindValue(':gererGalerie',$rang->gereGalerie(), PDO::PARAM_BOOL);
			$q->bindValue(':gererPointAnimation',$rang->gerePointAnimation(), PDO::PARAM_BOOL);
			
			$q->execute();
		}
		
		public function updateRang(Rang $rang){
						
			$q = $this->_db->prepare("UPDATE `rang` SET `gererEvenement`=:gererEvenement,
			`gererCommentaire`=:gererCommentaire,`gererArticle`=:gererArticle,`gererPageDiverse`=:gererPageDiverse,`gererTrocAFond`=:gererTrocAFond,
			`gererRang`=:gererRang,`gererBandeau`=:gererBandeau,`gererGalerie`=:gererGalerie,`gererPointAnimation`=:gererPointAnimation
			WHERE `nomRang`=:nomRang");
			
			$q->bindValue(':nomRang',$rang->getNomRang(), PDO::PARAM_STR);
			$q->bindValue(':gererEvenement',$rang->gereEvenement(), PDO::PARAM_BOOL);
			$q->bindValue(':gererCommentaire',$rang->gereCommentaire(), PDO::PARAM_BOOL);
			$q->bindValue(':gererArticle',$rang->gereArticle(), PDO::PARAM_BOOL);
			$q->bindValue(':gererPageDiverse',$rang->gerePageDiverse(), PDO::PARAM_BOOL);
			$q->bindValue(':gererTrocAFond',$rang->gereTrocAFond(), PDO::PARAM_BOOL);
			$q->bindValue(':gererRang',$rang->gereRang(), PDO::PARAM_BOOL);
			$q->bindValue(':gererBandeau',$rang->gereBandeau(), PDO::PARAM_BOOL);
			$q->bindValue(':gererGalerie',$rang->gereGalerie(), PDO::PARAM_BOOL);
			$q->bindValue(':gererPointAnimation',$rang->gerePointAnimation(), PDO::PARAM_BOOL);
			
			$q->execute();
		}
		
		public function recupererAllRang(){
			$rangs = array();
			
			$q = $this->_db->prepare("SELECT * FROM `rang` "); 
			$q->execute();
			
			while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
				$newRang = new Rang();
				$newRang->hydrate($donnees);
				$rangs[] = $newRang;				
			}
			
			return $rangs;
		}
		
		public function updateDroit($nomRang){
			$q = $this->_db->prepare('SELECT * FROM `rang` WHERE nomRang=:rang;'); 
			$q->bindParam(':rang', $nomRang, PDO::PARAM_STR);
			$q->execute();
			$row = $q -> fetch();
			
			$_SESSION['gererEvenement']=$row['gererEvenement'];
			$_SESSION['gererCommentaire']=$row['gererCommentaire'];
			$_SESSION['gererArticle']=$row['gererArticle'];
			$_SESSION['gererPageDiverse']=$row['gererPageDiverse'];
			$_SESSION['gererTrocAFond']=$row['gererTrocAFond'];
			$_SESSION['gererRang']=$row['gererRang'];
			$_SESSION['gererBandeau']=$row['gererBandeau'];
			$_SESSION['gererGalerie']=$row['gererGalerie'];
			$_SESSION['gererPointAnimation']=$row['gererPointAnimation'];
		}
	}




?>