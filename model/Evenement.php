<?php

/**
 * Created by PhpStorm.
 * User: RomainS
 * Date: 08/01/2017
 * Time: 11:04
 */
class Evenement
{
    private $_nomEvenement;
    private $_visible;

    public function hydrate(array $donnees){
        foreach ($donnees as $key => $value){
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }


    public function getNomEvenement(){
        return $this->_nomEvenement;
    }
    public function isVisible(){
        return $this->_visible;
    }

    public function setNomEvenement($nomEvenement){
        if (is_string($nomEvenement)){{}
            $this->_nomEvenement = $nomEvenement;
        }
    }
    public function setVisible($visible){
        $this->_visible = $visible;
    }


}