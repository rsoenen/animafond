<?php

/**
 * Created by PhpStorm.
 * User: RomainS
 * Date: 06/11/2016
 * Time: 09:59
 */
require_once('MainManager.php');
include('/../model/DateConseilAdministration.php');

class DateConseilAdministrationManager extends MainManager{


    public function getDateConseilAdministration(){
        $q = $this->_db->prepare('SELECT * FROM `dateConseilAdministration` WHERE `evenement`=\'conseiladmin\'');
        $q-> execute();
        $row = $q->fetch();
        $conseilAdministration = new DateConseilAdministration();
        $conseilAdministration ->hydrate($row);

        return $conseilAdministration;
    }

    public function updateDateConseilAdministration(DateConseilAdministration $dateConseilAdministration){
        $q = $this->_db->prepare("UPDATE dateConseilAdministration SET dateConseil=:dateConseil WHERE evenement='conseiladmin'");
        $q->bindValue(':dateConseil', $dateConseilAdministration->getDateConseil());
        $q->execute();
    }
}