<?php

class Voiture{
    private $_couleur;
    private $_puissance;
    private $_vitesse;
    const NB_ROUES = 4;

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

    /**
     * @param mixed $couleur
     */
    public function setCouleur($couleur)
    {
        $this->_couleur = $couleur;
    }

    /**
     * @param mixed $puissance
     */
    public function setPuissance($puissance)
    {
        $this->_puissance = $puissance;
    }

    /**
     * @param mixed $vitesse
     */
    public function setVitesse($vitesse)
    {
        $this->_vitesse = $vitesse;
    }


    public function accelerer(){
        //TODO
    }

    public function ralentir(){
        //TODO
    }
}