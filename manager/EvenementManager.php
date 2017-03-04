<?php

/**
 * Created by PhpStorm.
 * User: RomainS
 * Date: 08/01/2017
 * Time: 11:09
 */
require_once('MainManager.php');
include(MainManager::$ABSOLUTE_PATH.'/model/Evenement.php');

class EvenementManager extends MainManager
{
    public function getEvenement(){
        $q = $this->_db->query("SELECT * FROM `evenement`");

        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        $evenement = new Evenement();
        $evenement->hydrate($donnees);

        return $evenement;
    }

    public function updateEvenement($evenement){
        $q = $this->_db->prepare("UPDATE `evenement` SET `NomEvenement`=:nomEvenement,`visible`=:visible");
        $q->bindValue(':nomEvenement', $evenement->getNomEvenement(), PDO::PARAM_STR);
        $q->bindValue(':visible',$evenement->isVisible(), PDO::PARAM_STR);
        $q->execute();

    }

}