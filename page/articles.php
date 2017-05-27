<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
    <meta charset="utf-8"/>  <!-- norme html 5 -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/style_menu.css">
    <link rel="stylesheet" type="text/css" href="../css/style_index.css">
    <link rel="stylesheet" type="text/css" href="../css/style_articles.css">
    <title> Site d'anima'fond, une association d'art du cirque et de monocycle</title>
</head>
<body>
<?php

     if(isset($_SESSION['gererBandeau'])&&$_SESSION['gererBandeau']==true&&isset($_POST['nouveaubandeau'])){ //UPDATE LE NOUVEAU BANDEAU DANS LA BDD

        $bandeau = new Bandeau();
        $bandeau -> setTextBandeau($_POST["nouveaubandeau"]);
        $bandeau -> setLastUpdateur($_SESSION['pseudo']);

        $bandeauManager -> changeTextBandeau($bandeau);
    }

    include("squelettePage/menu.php"); //MENU PLACER ICI POUR LES CHANGEMENTS DE PERSONNES

    include ("../manager/ArticleManager.php");
    include ("../manager/CommentaireManager.php");


    $articleManager = new ArticleManager();
    $articleManager->setDb($mainManager->getDb());

    $commentaireManager= new CommentaireManager();
    $commentaireManager->setDb($mainManager->getDb());
    echo '<div id ="mainDiv" class="col-md-8 col-md-offset-2">';
    if(isset($_POST['gererArticle'])&&isset($_SESSION['gererArticle'])&&$_SESSION['supprimerart']==true){ //CONFIRMATION DE SUPPRESSION D'ARTICLE
        echo '<table><form action="index.php" method="POST"><input type="hidden" name="supprimerarticle" value="'.$_POST['confsupprimerarticle'].'"/><tr><td cospan="2">Etes vous sur de supprimer cet article<br/></td></tr><tr><td><input type="submit" value="OUI"></td></form>';
        echo '<td><form action="index.php" method="POST"><input type="submit" value="NON"/></form></td><table>';
    }
    if(isset($_POST['gererArticle'])&&isset($_SESSION['gererArticle'])&&$_SESSION['supprimerart']==true){ //SUPPRESSION DE LA BDD D'UN ARTICLE

        $articleManager -> deleteArticle($_POST['supprimerarticle']);
        $commentaireManager -> deleteAllCommentaireArticle($_POST['supprimerarticle']);

        echo 'L\'article a &eacute;t&eacute; supprim&eacute;';
    }

    $nombrearticle= $articleManager -> getNumberArticle();

    if(isset($_POST['nombrearticleaffiche'])){ //GESTION DU NOMBRE D'ARTICLE VISIBLE
        $nombrearticleaffiche=$_POST['nombrearticleaffiche'];
        if($nombrearticleaffiche>$nombrearticle){
            $nombrearticleaffiche=$nombrearticle;
        }
    } else {
        $nombrearticleaffiche=5;
    }
    if(isset($_SESSION['gererArticle'])&&$_SESSION['gererArticle']){echo '<a href="redactionarticle.php"><button class="btn btn-default">R&eacute;diger un article</button></a>';}

    $listArticle = $articleManager->getListArticle($nombrearticleaffiche, false);

    foreach ($listArticle as $article){ // récupération des données des articles dans la base de donné, en les mettant dans des tableaux

        echo '<form method="POST" action="consulterarticle.php"><input type="hidden" name="numeroarticle" value='.$article->getNumeroArticle().'>';
        echo '<table width="col-md-8 col-md-offset-2"><tr>';
        echo '<td><h1 class="titre_article"><input class="titre_article" type="submit" value="'.$article->getTitre().'"></h1></form></td>';
        if(isset($_SESSION['gererArticle'])&&$_SESSION['gererArticle']==true){ //editer un article
            echo '<td width="100px"><form method="POST" action="editionarticle.php">';
            echo '<input type="hidden" name="numeroarticle" value='.$article->getNumeroArticle().'>';
            echo '<input class="btn btn-default" type="submit" value="Editer cet article"></form></td>';}
        if(isset($_SESSION['gererArticle'])&&$_SESSION['gererArticle']==true){ //SUPPRIMER UN ARTICLE
            echo '<td width="50px"><form method="POST" action="accueil.php">';
            echo '<input type="hidden" name="confsupprimerarticle" value='.$article->getNumeroArticle().'>';
            echo '<input type="submit" class="btn btn-default" value="Supprimer cet article"></form></td>';
        }

        echo '</tr></table>';
        echo '<div class="row">';
        echo '<img src="../image/articles/imageFond/'.$article->getImage().'" class="col-md-offset-1 col-md-4"/>
        <p class="contenuarticle col-md-offset-1 col-md-6">'.$article->getPreambule().'</p><br/>';
        echo '<form action="consulterarticle.php" method="POST"><input type="hidden" name="numeroarticle" value="'.$article->getNumeroArticle().'"/>
        <input type="submit" class="col-md-offset-1 col-md-2 btn btn-lg btn-primary" value="Lire l\'article"></form>';

        echo '<form method="POST" action="consulterarticle.php"><input type="hidden" name="numeroarticle" value='.$article->getNumeroArticle().'>';
        echo '</form></div>';
    }

    if($nombrearticleaffiche < $nombrearticle){
        $nombrearticleaffiche=$nombrearticleaffiche+5;
        echo "<form method='POST'><input type='hidden' name='nombrearticleaffiche' value='".$nombrearticleaffiche."'/>";
        echo '<input type="submit" value="Voir plus d\'article"/></form>';
    }
    echo '</div>';
    include("squelettePage/footer.php");
?>
</body>
</html>