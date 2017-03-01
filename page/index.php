<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
	<meta charset="utf-8"/>  <!-- norme html 5 -->
	<!--<link rel="stylesheet" type="text/css" href="style.css"> -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/style_menu.css">
    <link rel="stylesheet" type="text/css" href="../css/style_index.css">

	<title> Site d'anima'fond, une association d'art du cirque et de monocycle</title>
</head>
<body>
<?php 
	echo '<div >';
	include ("../manager/ArticleManager.php");
	include ("../manager/BandeauManager.php");
	include ("../manager/CommentaireManager.php");
	
	
	$articleManager = new ArticleManager();
	$bandeauManager = new BandeauManager();

	if(isset($_SESSION['gererBandeau'])&&$_SESSION['gererBandeau']==true&&isset($_POST['nouveaubandeau'])){ //UPDATE LE NOUVEAU BANDEAU DANS LA BDD
		
		$bandeau = new Bandeau();
		$bandeau -> setTextBandeau($_POST["nouveaubandeau"]);
		$bandeau -> setLastUpdateur($_SESSION['pseudo']);
		
		$bandeauManager -> changeTextBandeau($bandeau);		
	}
	
	include("squelettePage/menu.php"); //MENU PLACER ICI POUR LES CHANGEMENTS DE PERSONNES
	

	if(isset($_SESSION['gererBandeau'])&&$_SESSION['gererBandeau']==true&&!isset($_POST['modifierbandeau'])){ //DEMANDE SI ON SOUHAITE MODIFIER LE BANDEAU
		echo '<form action="index.php" method="POST"><input type="hidden" name="modifierbandeau" value="true"/><input type="submit" value="Modifier le bandeau"/></form>';
	}
	if(isset($_SESSION['gererBandeau'])&&$_SESSION['gererBandeau']==true&&isset($_POST['modifierbandeau'])){ //MODIFICATION DU BANDEAU
		$bandeau = $bandeauManager -> getTextBandeau($_SESSION['rang']);
		echo '<form action="index.php" method="POST"><table><tr><td>Entrez le texte pour le bandeau</td><td><input type="text" name="nouveaubandeau" value="'.$bandeau->getTextBandeau().'"/></td><td><input type="submit" value="Enregistrez le nouveau texte"/></td></tr></table></form>';
	}

     $listArticle = $articleManager->getListArticle(3);

?>
	    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="col-md-8 col-md-offset-2 carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="../image/articles/imageFond/<?php echo $listArticle[0]->getImage();?>" alt="First slide">
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
          <img class="second-slide" src="../image/articles/imageFond/<?php echo $listArticle[1]->getImage();?>" alt="Second slide">
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
          <img class="third-slide" src="../image/articles/imageFond/<?php echo $listArticle[2]->getImage();?>" alt="Third slide">
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


<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><p>test</p>
<?php include("squelettePage/footer.php");?>
</body>
</html>