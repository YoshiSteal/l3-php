<?php

class Voiture{
    private $_couleur;
    private $_puissance;
    private $_vitesse;

    /**
     * @return mixed
     */
    public function getCouleur()
    {
        return $this->_couleur;
    }

    /**
     * @return mixed
     */
    public function getPuissance()
    {
        return $this->_puissance;
    }

    /**
     * @return mixed
     */
    public function getVitesse()
    {
        return $this->_vitesse;
    }

    public function accelerer(){
        //TODO
    }

}