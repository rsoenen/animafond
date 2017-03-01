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

    include ("../manager/ArticleManager.php");
    include ("../manager/BandeauManager.php");
    include ("../manager/CommentaireManager.php");


    $articleManager = new ArticleManager();
    $bandeauManager = new BandeauManager();
    $commentaireManager = new CommentaireManager();

    if(isset($_SESSION['gererBandeau'])&&$_SESSION['gererBandeau']==true&&isset($_POST['nouveaubandeau'])){ //UPDATE LE NOUVEAU BANDEAU DANS LA BDD

        $bandeau = new Bandeau();
        $bandeau -> setTextBandeau($_POST["nouveaubandeau"]);
        $bandeau -> setLastUpdateur($_SESSION['pseudo']);

        $bandeauManager -> changeTextBandeau($bandeau);
    }

    include("squelettePage/menu.php"); //MENU PLACER ICI POUR LES CHANGEMENTS DE PERSONNES
    echo '<div id ="mainDiv" class="col-md-8 col-md-offset-2">';
    if(isset($_POST['gererArticle'])&&isset($_SESSION['gererArticle'])&&$_SESSION['supprimerart']==true){ //CONFIRMATION DE SUPPRESSION D'ARTICLE
        echo '<table><form action="index.php" method="POST"><input type="hidden" name="supprimerarticle" value="'.$_POST['confsupprimerarticle'].'"/><tr><td cospan="2">Etes vous sur de supprimer cet article<br/></td></tr><tr><td><input type="submit" value="OUI"></td></form>';
        echo '<td><form action="index.php" method="POST"><input type="submit" value="NON"/></form></td><table>';
    }
    if(isset($_POST['gererArticle'])&&isset($_SESSION['gererArticle'])&&$_SESSION['supprimerart']==true){ //SUPPRESSION DE LA BDD D'UN ARTICLE

        $articleManager -> deleteArticle($_POST['supprimerarticle']);
        $commentaireManager -> deleteAllCommentaireArticle($_POST['supprimerarticle']);

        echo 'L\'article a été supprimé';
    }
    if(isset($_SESSION['gererBandeau'])&&$_SESSION['gererBandeau']==true&&!isset($_POST['modifierbandeau'])){ //DEMANDE SI ON SOUHAITE MODIFIER LE BANDEAU
        echo '<form action="index.php" method="POST"><input type="hidden" name="modifierbandeau" value="true"/><input type="submit" value="Modifier le bandeau"/></form>';
    }
    if(isset($_SESSION['gererBandeau'])&&$_SESSION['gererBandeau']==true&&isset($_POST['modifierbandeau'])){ //MODIFICATION DU BANDEAU
        $bandeau = $bandeauManager -> getTextBandeau($_SESSION['rang']);
        echo '<form action="index.php" method="POST"><table><tr><td>Entrez le texte pour le bandeau</td><td><input type="text" name="nouveaubandeau" value="'.$bandeau->getTextBandeau().'"/></td><td><input type="submit" value="Enregistrez le nouveau texte"/></td></tr></table></form>';
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
    if(isset($_SESSION['ecrireart'])&&$_SESSION['ecrireart']){echo '<a href="redactionarticle.php">Vous pouvez écrire un article</a>';}

    $listArticle = $articleManager->getListArticle($nombrearticleaffiche);

    foreach ($listArticle as $article){ // récupération des données des articles dans la base de donné, en les mettant dans des tableaux

        echo '<form method="POST" action="consulterarticle.php"><input type="hidden" name="numeroarticle" value='.$article->getNumeroArticle().'>';
        echo '<table width="col-md-8 col-md-offset-2"><tr>';
        echo '<td><h1 class="titre_article"><input class="titre_article" type="submit" value="'.$article->getTitre().'"></h1></form></td>';
        if(isset($_SESSION['editerart'])&&$_SESSION['editerart']==true){ //editer un article
            echo '<td width="100px"><form method="POST" action="editionarticle.php">';
            echo '<input type="hidden" name="numeroarticle" value='.$article->getNumeroArticle().'>';
            echo '<input type="submit" value="Editer cet article"></form></td>';}
        if(isset($_SESSION['supprimerart'])&&$_SESSION['supprimerart']==true){ //SUPPRIMER UN ARTICLE
            echo '<td width="50px"><form method="POST" action="accueil.php">';
            echo '<input type="hidden" name="confsupprimerarticle" value='.$article->getNumeroArticle().'>';
            echo '<input type="submit" class="imagesupprimer" value=""></form></td>';
        }

        echo '</tr></table>';
        echo '<div class="row">';
        echo '<img src="../image/articles/imageFond/'.$article->getImage().'" class="col-md-4"/>
        <p class="contenuarticle col-md-8">'.$article->getPreambule().'</p><br/>';
        echo '<form action="consulterarticle.php" method="POST"><input type="hidden" name="numeroarticle" value="'.$article->getNumeroArticle().'"/>
        <input type="submit" class="btn btn-lg btn-primary" value="Lire l\'article"></form>';

        $numberCommentaire = $commentaireManager->numberCommentaireArticle($article->getNumeroArticle());
        echo '<form method="POST" action="consulterarticle.php"><input type="hidden" name="numeroarticle" value='.$article->getNumeroArticle().'>';
        if($numberCommentaire>1){echo '<input class="acccommentaire" type="submit" value="Il y a '.$numberCommentaire.' commentaires"/>';}else{echo '<input class="acccommentaire" type="submit" value="Il y a '.$numberCommentaire.' commentaire"/>';}
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