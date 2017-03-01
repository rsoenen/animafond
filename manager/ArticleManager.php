<?php	

	require_once('MainManager.php');
	include('/../model/Article.php');
	
	class ArticleManager extends MainManager{
		 		
		public function add(Article $article){
			
			$q = $this->_db->prepare('INSERT INTO `article`(`titre`, `contenu`, `dateposte`, `auteur`, `ipPosteur`, `evenement`,`image`, `preambule`) VALUES (:titre, :contenu, NOW(), :auteur, :ipPosteur, :evenement, :image, :preambule)');

			$q->bindValue(':titre', this.convertisseurCaractereAccent($article->getTitre()), PDO::PARAM_STR);
			$q->bindValue(':contenu', this.convertisseurCaractereAccent($article->getContenu()), PDO::PARAM_STR);
			$q->bindValue(':auteur', $article->getAuteur(), PDO::PARAM_STR);
			$q->bindValue(':ipPosteur', $article->getIpPosteur(), PDO::PARAM_STR);
			$q->bindValue(':evenement', $article->isEvenement(), PDO::PARAM_BOOL);
            $q->bindValue(':image', $article->getImage(),PDO::PARAM_STR);
            $q->bindValue(':preambule', this.convertisseurCaractereAccent($article->getPreambule()),PDO::PARAM_STR);

			$q->execute();

            $this->addImageToArticle($article);
		}

		private function addImageToArticle(Article $article){

            $q = $this->_db->prepare("SELECT * FROM article WHERE (titre=:titre AND contenu=:contenu)");
            $q->bindValue(':titre', $article->getTitre(), PDO::PARAM_STR);
            $q->bindValue(':contenu',$article->getContenu(), PDO::PARAM_STR);
            $q->execute();

            $donnees = $q->fetch(PDO::FETCH_ASSOC);
            $myArticle = new Article();
            $myArticle->hydrate($donnees);


            $nameImage = $this->sendPicture("article".$myArticle->getNumeroArticle(), ArticleManager::$PATH_IMAGE_FOND_ARTICLE, $article->getImage());
            $myArticle->setImage($nameImage);

            $this->updateImageToArticle($myArticle);
        }
		
		public function deleteArticle(Article $article){
			$q = $this->_db->prepare("DELETE FROM `article` WHERE `numeroarticle`= :numeroArticle"); 
			$q->bindValue(':numeroArticle', $article->getNumeroArticle(), PDO::PARAM_INT);
			$q->execute();
		}
		
		public function getNumberArticle(){
			$q = $this->_db->query('SELECT COUNT(`numeroarticle`) AS nombrearticle FROM `article`');
			$donnees = $q->fetch();
			return $donnees['nombrearticle'];
		}
		
		public function getListArticle ($numberArticle){
			$articles = [];
			
			$q = $this->_db->prepare("SELECT * FROM article WHERE evenement=false ORDER BY dateposte DESC LIMIT :nombrearticleaffiche");
			$q->bindValue(':nombrearticleaffiche', intval($numberArticle), PDO::PARAM_INT);
			$q->execute();
			
			while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
				$newArticle = new Article();
				$newArticle->hydrate($donnees);
				$articles[] = $newArticle;				
			}
			
			return $articles;
		}
		
		public function getArticleWithId($idArticle){
			$numeroArticle = intval($idArticle);
			$q = $this->_db->prepare("SELECT * FROM article WHERE numeroarticle=:numeroarticle;");
			$q->bindValue(':numeroarticle', $numeroArticle, PDO::PARAM_INT);
			$q->execute();
			
			$donnees = $q->fetch(PDO::FETCH_ASSOC);
			$article = new Article();
			$article->hydrate($donnees);
					
			return $article;
			
		}
		
		public function updateArticle (Article $article){
			
			$q = $this->_db->prepare('UPDATE `article` SET `titre`=:titre,`contenu`=:contenu,`preambule`=:preambule  WHERE numeroarticle=:numeroarticle ');
			$q->bindValue(':titre', this.convertisseurCaractereAccent($article->getTitre()),PDO::PARAM_STR);
			$q->bindValue(':contenu', this.convertisseurCaractereAccent($article->getContenu()), PDO::PARAM_STR);
            $q->bindValue(':preambule', this.convertisseurCaractereAccent($article->getPreambule()), PDO::PARAM_STR);
            $q->bindValue(':numeroarticle', $article->getNumeroArticle(),PDO::PARAM_INT);
			
			$q->execute();
		}

		public function updateImageToArticle(Article $article){
            $q = $this->_db->prepare('UPDATE `article` SET `image`=:image WHERE numeroarticle=:numeroarticle ');
            $q->bindValue(':image', $article->getImage(),PDO::PARAM_STR);
            $q->bindValue(':numeroarticle', $article->getNumeroArticle(), PDO::PARAM_INT);

            $q->execute();
        }

	}




?>