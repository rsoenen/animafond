<div id="enTete">
    <div class="row">
        <?php
        $url = $_SERVER['PHP_SELF'];
        $page = basename($url);

        if ($page == "contact.php") {
            echo '<a href="index.php"><img class="col-md-offset-2 col-md-8" id="banniere" src="../image/design/banniere/banniere_contact.png"/></a>';
        } else if ($page == "partenaire.php" || $page == "editerpartenaire.php") {
            echo '<a href="index.php"><img class="col-md-offset-2 col-md-8" id="banniere" src="../image/design/banniere/banniere_partenaire.png"/></a>';
        } else if ($page == "connexion.php" || $page == "inscription.php" || $page == "deconnexion.php" || $page == "monprofil.php" || $page == "motdepasseoublie.php" || $page == "generateurmdp.php" || $page == "gestionenvcontact.php") {
            echo '<a href="index.php"><img class="col-md-offset-2 col-md-8" id="banniere" src="../image/design/banniere/banniere_connexion.png"/></a>';
        } else if ($page == "evenement.php") {
            echo '<a href="index.php"><img class="col-md-offset-2 col-md-8" id="banniere" src="../image/design/banniere/banniere_evenement.png"/></a>';
        } else {
            echo '<a href="index.php"><img class="col-md-offset-2 col-md-8" id="banniere" src="../image/design/banniere/banniere_accueil.png"/></a>';
        }


        ?>
    </div>
    <!-- Permet de faire défiler un texte -->
    <?php
    require_once("../manager/MainManager.php");

    require_once("../manager/BandeauManager.php");
    require_once("../manager/EvenementManager.php");
    $mainManager = new MainManager();
    $mainManager->createConnection();

    $bandeauManager = new BandeauManager();
    $bandeauManager->setDb($mainManager->getDb());

    $bandeau = $bandeauManager->getTextBandeau();

    $evenementManager = new EvenementManager();
    $evenementManager->setDb($mainManager->getDb());

    $evenement = new Evenement();
    $evenement = $evenementManager->getEvenement();

    $size = "col-md-3";
    if ($evenement->isVisible() || (isset($_SESSION['gererEvenement']) && $_SESSION['gererEvenement'])) {
        $size = "col-md-2";
    }

    ?>
    <div class="row">
        <marquee id="texte_defilant" direction="left" scrollamount="15"><span
                onmouseover="getElementById('texte_defilant').stop();"
                onmouseout="getElementById('texte_defilant').start();"><?php echo $bandeau->getTextBandeau(); ?></span>
        </marquee>
        <!-- Problème avec le bandeau, il n'affiche le texte que si il rentre dans la page. Sinon il le coupe-->
    </div>

    <div class="row">
        <nav class="col-md-8 col-md-offset-2">
            <div class="container-fluid">

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav row">
                        <li>
                            <a class="col-md-3 button_Asso" data-toggle="dropdown" role="button" aria-haspopup="true"
                               aria-expanded="false">
                                ASSOCIATION
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="col-md-3 button_Asso" href="quisommesnous.php">QUI SOMMES NOUS</a></li>
                                <li><a class="col-md-3 button_Asso" href="atelier.php">L'ATELIER</a></li>
                                <li><a class="col-md-3 button_Asso" href="animation.php">ANIMATION</a></li>
                                <li><a class="col-md-3 button_Asso" href="monocycle.php">MONOCYCLE</a></li>
                                <li><a class="col-md-3 button_Asso" href="galerie.php">GALERIE</a></li>
                            </ul>
                        </li>
                        <?php
                        echo '<li><a  id="button_partenaires" class="' . $size . '" href="partenaire.php">PARTENAIRE</a></li>';

                        if ($evenement->isVisible() || (isset($_SESSION['gererEvenement']) && $_SESSION['gererEvenement'])) {
                            echo '<li><a id="button_evenement" class="col-md-2" href="evenement.php">' . strtoupper($evenement->getNomEvenement()) . '</a></li>';
                        }


                        echo '<li><a id="button_contact"  class="' . $size . '" href="contact.php">CONTACT</a></li>';


                        if (!isset($_SESSION['pseudo'])) {
                            echo '<li><a id="button_seConnecter"  class="' . $size . '" href="connexion.php">CONNEXION</a></li>';
                        } else { ?>

                            <li class="dropdown">
                                <a href="#" id="button_seConnecter" class="dropdown-toggle col-md-3"
                                   data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">MON
                                    COMPTE</span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="monprofil.php" id="button_seConnecter">MES INFOS</a></li>
                                    <?php
                                    if (isset($_SESSION['gererRang']) && $_SESSION['gererRang'] == true) {
                                        echo "<li><a href=\"gestiondroit.php\">GESTION SITE</a></li>";
                                    }
                                    ?>
                                    <li><a href="deconnexion.php">DECONNEXION</a></li>
                                </ul>
                            </li>
                        <?php } ?>
                    </ul>
                </div>

            </div>
        </nav>
    </div>
</div>