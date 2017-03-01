<?php


class DateConseilAdministration{

    private $_evenement;
    private $_dateConseil;


    public function hydrate(array $donnees){
        foreach ($donnees as $key => $value){
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }

    public function __construct(){
    }

    /**
     * @return mixed
     */
    public function getDateConseil()
    {
        return $this->_dateConseil;
    }

    public function getEvenement(){
        return $this->_evenement;
    }

    /**
     * @param mixed $dateConseil
     */
    public function setDateConseil($dateConseil)
    {
        $this->_dateConseil = $dateConseil;
    }
    public function setEvenement($evenement){
        if (is_string($evenement)){
            $this->_evenement = $evenement;
        }
    }


}


?>