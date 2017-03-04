<?php	

	require_once('MainManager.php');
	include(MainManager::$ABSOLUTE_PATH.'model/Bandeau.php');
	
	class BandeauManager extends MainManager{
		 		
		public function changeTextBandeau($bandeau){
			$q = $this->_db->prepare('UPDATE `bandeau` SET `textBandeau`=:textBandeau, posteur = :posteur');
			$q->bindValue(':textBandeau', $bandeau->getTextBandeau(), PDO::PARAM_STR);
			$q->bindValue(':posteur', $bandeau->getLastUpdateur(), PDO::PARAM_STR);
			$q->execute();

            $q->execute();
		}
		
		public function getTextBandeau(){
			$q = $this->_db->query("SELECT * FROM bandeau"); 
			
			
			$donnees = $q->fetch(PDO::FETCH_ASSOC);
			$bandeau = new Bandeau();
			
			if (!empty($donnees)){
				$bandeau->hydrate($donnees);	
			}
			return $bandeau;
		}

	}




?>