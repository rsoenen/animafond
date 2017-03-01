<?php	

	require_once('MainManager.php');
	include('/../model/Bandeau.php');
	
	class BandeauManager extends MainManager{
		 		
		public function changeTextBandeau($bandeau){
			$q = $this->_db->prepare('UPDATE `bandeau` SET `textBandeau`=:textBandeau, posteur = :posteur');
			$q->bindValue(':textBandeau', $utilisateur->getTextBandeau(), PDO::PARAM_STR);
			$q->bindValue(':posteur', $utilisateur->getLastUpdateur(), PDO::PARAM_STR);
			$q->execute();
			
			$requete1->execute(array($_POST["nouveaubandeau"]));
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