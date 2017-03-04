<?php

/**
 * Created by PhpStorm.
 * User: RomainS
 * Date: 06/11/2016
 * Time: 09:59
 */
require_once('MainManager.php');
include(MainManager::$ABSOLUTE_PATH.'/model/DateConseilAdministration.php');

class DateConseilAdministrationManager extends MainManager{


    public function getDateConseilAdministration(){
        $q = $this->_db->prepare('SELECT * FROM `dateConseilAdministration` WHERE `evenement`=\'conseiladmin\'');
        $q-> execute();

        $conseilAdministration = new DateConseilAdministration();

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
            $conseilAdministration->hydrate($donnees);
        }

        return $conseilAdministration;
    }

    public function updateDateConseilAdministration(DateConseilAdministration $dateConseilAdministration){
        $q = $this->_db->prepare("UPDATE dateConseilAdministration SET dateConseil=:dateConseil WHERE evenement='conseiladmin'");
        $q->bindValue(':dateConseil', $dateConseilAdministration->getDateConseil());
        $q->execute();
    }
}