<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
	<meta charset="utf-8"/>  <!-- norme html 5 -->
  <link rel="stylesheet" type="text/css" href="../css/style_menu.css">
  <link rel="stylesheet" type="text/css" href="../css/style_index.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">


	<title> Site d'anima'fond, une association d'art du cirque et de monocycle</title>
</head>
<body>
<?php 

	if(isset($_SESSION['gererBandeau'])&&$_SESSION['gererBandeau']==true&&isset($_POST['nouveaubandeau'])){ //UPDATE LE NOUVEAU BANDEAU DANS LA BDD
        require_once ("../manager/BandeauManager.php");
        require_once ("../manager/MainManager.php");

        $mainManager=new MainManager();
        $mainManager->createConnection();
        $bandeauManager = new BandeauManager();
        $bandeauManager->setDb($mainManager->getDb());

		$bandeau = new Bandeau();
		$bandeau -> setTextBandeau($_POST["nouveaubandeau"]);
		$bandeau -> setLastUpdateur($_SESSION['pseudo']);
		
		$bandeauManager -> changeTextBandeau($bandeau);		
	}
	
	include("squelettePage/menu.php"); //MENU PLACER ICI POUR LES CHANGEMENTS DE PERSONNES
    include ("../manager/ArticleManager.php");

      $articleManager = new ArticleManager();
      $articleManager->setDb($mainManager->getDb());
      echo '<div id="mainDiv" class= "col-md-8 col-md-offset-2">';
     $listArticle = $articleManager->getListArticle(3, false);

if(isset($_SESSION['gererBandeau'])&&$_SESSION['gererBandeau']==true&&!isset($_POST['modifierbandeau'])){ //DEMANDE SI ON SOUHAITE MODIFIER LE BANDEAU
  echo '<form action="index.php" method="POST"><input type="hidden" name="modifierbandeau" value="true"/><input class="btn btn-default" type="submit" value="Modifier le bandeau"/></form>';
}
if(isset($_SESSION['gererBandeau'])&&$_SESSION['gererBandeau']==true&&isset($_POST['modifierbandeau'])){ //MODIFICATION DU BANDEAU
  $bandeau = $bandeauManager -> getTextBandeau($_SESSION['rang']);
  echo '<form action="index.php" class="form-inline" method="POST"><div class="form-group">
    <label for="textBandeau">Entrez le texte pour le bandeau</label>
    <input type="text" class="form-control" name="nouveaubandeau" id="textBandeau" value="'.$bandeau->getTextBandeau().'"/>
  <input type="submit" class="btn btn-default" value="Enregistrez le nouveau texte"/></form>';
}

?>
	    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="col-md-8 carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="<?php echo ArticleManager::$PATH_IMAGE_FOND_ARTICLE.$listArticle[0]->getImage();?>" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1><?php echo $listArticle[0]->getTitre();?></h1>
              <p><?php echo $listArticle[0]->getPreambule();?></p>
              <form method="POST" action="consulterarticle.php">
                  <?php
                    echo '<input type="hidden" name="numeroarticle" value='.$listArticle[0]->getNumeroArticle().' />';
                  ?>
                <p><input type="submit" class="btn btn-lg btn-primary" value="Lire l'article"></p>
              </form>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="second-slide" src="<?php echo ArticleManager::$PATH_IMAGE_FOND_ARTICLE.$listArticle[1]->getImage();?>" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1><?php echo $listArticle[1]->getTitre();?></h1>
              <p><?php echo $listArticle[1]->getPreambule();?></p>
              <form method="POST" action="consulterarticle.php">
                <?php
                echo '<input type="hidden" name="numeroarticle" value='.$listArticle[1]->getNumeroArticle().' />';
                ?>
                <p><input type="submit" class="btn btn-lg btn-primary" value="Lire l'article"></p>
              </form>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="third-slide" src="<?php echo ArticleManager::$PATH_IMAGE_FOND_ARTICLE.$listArticle[2]->getImage();?>" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1><?php echo $listArticle[2]->getTitre();?></h1>
              <p><?php echo $listArticle[2]->getPreambule();?></p>
              <form method="POST" action="consulterarticle.php">
                <?php
                echo '<input type="hidden" name="numeroarticle" value='.$listArticle[2]->getNumeroArticle().' />';
                ?>
                <p><input type="submit" class="btn btn-lg btn-primary" value="Lire l'article"></p>
              </form>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->

    <div class="col-md-4" class="rightCollum">
        <h2>Nous joindre</h2>
      <div class="row">
        <img src="../image/design/iconefacebook.png" class="icone col-md-2">
        <a href="https://www.facebook.com/anima.fond">Compte d'animafond</a>
      </div>
    </div>
    <br/>
    <a href="articles.php"><button class="btn btn-default">Tous nos articles</button></a>
</div>
<?php include("squelettePage/footer.php");?>
</body>
</html>