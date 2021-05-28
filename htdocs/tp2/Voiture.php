<?php

class Voiture{
    private $_couleur;
    private $_puissance;
    private $_vitesse;
    const NB_ROUES = 4;

    public function getCouleur()
    {
        return $this->_couleur;
    }

    public function getPuissance()
    {
        return $this->_puissance;
    }

    public function getVitesse()
    {
        return $this->_vitesse;
    }

    public function setCouleur($couleur)
    {
        $this->_couleur = $couleur;
    }

    public function setPuissance($puissance)
    {
        $this->_puissance = $puissance;
    }

    public function setVitesse($vitesse)
    {
        $this->_vitesse = $vitesse;
    }


    public function accelerer(){
        $this->setVitesse($this->getVitesse() + 1);
    }

    public function ralentir(){
        $this->setVitesse($this->getVitesse() - 1);
    }
}