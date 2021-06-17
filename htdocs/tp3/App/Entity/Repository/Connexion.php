<?php


namespace App\Entity\Repository;

use \PDO;
class Connexion
{
    /**
     * @var Singleton
     * @access private
     * @static
     */
    private $lhost = 'localhost';
    private $bdd = 'magasin';
    private $user = 'root';
    private $pass = '';
    private $driver='mysql';

    private static $_instance = null;

    private $PDO;

    private function __construct() {
        $this->PDO = new PDO($this->driver.":host=".$this->lhost.";dbname=$this->bdd", $this->user, $this->pass);
        $this->PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance() {

        if(is_null(self::$_instance)) {
            self::$_instance = new Connexion();
        }

        return self::$_instance;
    }

    public function getPDO(): PDO
    {
        return $this->PDO;
    }
}