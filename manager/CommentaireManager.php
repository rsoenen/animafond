<?php	
	
	require_once('MainManager.php');
	include(MainManager::$ABSOLUTE_PATH.'model/Commentaire.php');
	
	class CommentaireManager extends MainManager{
		
				
		public function add(Commentaire $commentaire){
			
			$q = $this->_db->prepare('INSERT INTO `commentaire`(`numeroarticle`, `numerocommentaire`, `contenu`, `auteur`, `dateposte`,`ipPosteur`, `visible`,`nbxedition`) VALUES (:numeroArticle,:numeroCommentaire,:contenu,:auteur,NOW(),:ipPosteur,true,0)');

			$q->bindValue(':numeroArticle', $commentaire->getNumeroArticle(), PDO::PARAM_INT);
			$q->bindValue(':numeroCommentaire', $commentaire->getNumeroCommentaire(), PDO::PARAM_INT);
			$q->bindValue(':contenu', $commentaire->getContenu(), PDO::PARAM_STR);
			$q->bindValue(':auteur', $commentaire->getAuteur(), PDO::PARAM_STR);
			$q->bindValue(':ipPosteur', $commentaire->getIpPosteur(), PDO::PARAM_STR);


			$q->execute();
		}
		
		public function deleteAllCommentaireArticle($numeroArticle){
			$q = $this->_db->prepare("DELETE FROM `commentaire` WHERE `numeroarticle`=:numeroArticle");
			$q->bindValue(':numeroArticle', intval($numeroArticle), PDO::PARAM_INT);
			$q->execute();
		}
		
		public function deleteCommentaire($numeroArticle,$numeroCommentaire){
			$q = $this->_db->prepare("DELETE FROM `commentaire` WHERE (`numeroarticle`=:numeroArticle AND `numerocommentaire`=:numeroCommentaire) ;");
            $q->bindValue(':numeroArticle', intval($numeroArticle), PDO::PARAM_INT);
			$q->bindValue(':numeroCommentaire', intval($numeroCommentaire), PDO::PARAM_INT);
			$q->execute();
		}
		
		public function numberCommentaireArticle ($numeroArticle){
			$q = $this->_db->prepare('SELECT count(numeroarticle) AS nbxcommentaire FROM commentaire WHERE numeroarticle=:numeroArticle;');
			$q->bindValue(':numeroArticle', intval($numeroArticle), PDO::PARAM_INT);
			$q->execute();
			$donnees = $q->fetch();
			return $donnees['nbxcommentaire'];
		}

		public function getCommentaireByIdArticle($numeroArticle){
            $q = $this->_db->prepare("SELECT numeroarticle,numerocommentaire,contenu,auteur,dateposte FROM commentaire WHERE numeroarticle=:numeroarticle ORDER BY dateposte DESC LIMIT 10;"); //LIMITE A 10 COMMENTAIRES
            $q->bindValue(':numeroarticle', $numeroArticle, PDO::PARAM_INT);
            $q->execute();

            $commentaires = array();

            while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
                $newCommentaire = new Commentaire();
                $newCommentaire->hydrate($donnees);
                $commentaires[] = $newCommentaire;
            }

            return $commentaires;
        }
		
	}




?>