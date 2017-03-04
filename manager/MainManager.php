<?php
	
	class MainManager{
		
		protected $_db;
        public static $ABSOLUTE_PATH="../";
		protected $extensions_autorisees = array('jpg', 'jpeg', 'gif','png','JPG','JPEG','GIF','PNG');
		private $pathPdf = "../documents/";
        private $pathPictureArticle = '../image/articles/';
        public static $PATH_IMAGE_FOND_ARTICLE = "../image/articles/imageFond/";

		
		public function __construct(){
			$this->setDb(new PDO('mysql:host=localhost;dbname=animafond', 'root', ''));
		}
		
		public function setDb(PDO $db){
			$this->_db = $db;
		}
		
		public function sendPicture($nomImageSansExtension,$_pathPicture,$nomFichier){
			
			if (isset($_FILES[$nomFichier]) AND $_FILES[$nomFichier]['error'] == 0){ 
				if ($_FILES[$nomFichier]['size'] <= 1000000){
					$infosfichier = pathinfo($_FILES[$nomFichier]['name']);
					$extension_upload = $infosfichier['extension'];
					if (in_array($extension_upload,$this->getExtentionAutorisees())){
						$nomImage=$nomImageSansExtension.'.'.$extension_upload;
						move_uploaded_file($_FILES[$nomFichier]['tmp_name'], $_pathPicture.$nomImage);
						return $nomImage;
					}
				}
			}		
		}
		
		public function sendPdf($nomPDF){
			if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0){ 
				if ($_FILES['monfichier']['size'] <= 1000000){
					$infosfichier = pathinfo($_FILES['monfichier']['name']);
					$extension_upload = $infosfichier['extension'];
					$extensions_pdf = array('pdf');
					if (in_array($extension_upload,$extensions_pdf)){
                        $nomImage=$nomPDF.'.'.$extension_upload;
						move_uploaded_file($_FILES['monfichier']['tmp_name'], $this->getPathPDF().$nomImage);
						return $nomImage;
					}
				}
			}		
		}
		
		public function convertisseurCaractereAccent($stringAModifier){
			$search  = array('é', 'è', 'ê', 'ë', 'ù', 'à', 'ç', ' ', '&');
			$replace = array('&eacute;', '&egrave;', '&ecirc;', '&euml;', '&ugrave;', '&agrave;', '&ccedil;', '&nbsp;', '&amp;');
			$rep = str_replace($search, $replace, $stringAModifier);
			
			return $rep;
        }

        /**
         * @return string
         */
        public function getPathPictureArticle()
        {
            return $this->pathPictureArticle;
        }
        public function getExtentionAutorisees(){
            return $this->extensions_autorisees;
        }
        public function getPathPDF(){
            return $this->pathPdf;
        }


	}




?>