<?php

namespace App\Entity\Repository;

use App\Entity\EntityInterface;
use \PDO;

class Product extends AbstractRepository implements RepositoryInterface
{
    /**
     * @return EntityInterface[]
     */
    public function findAll() : array
    {
        $sql = "Select * from products";
        $products = $this->getConnexion()->query($sql);
        $i = 0;
        foreach ($products as $p){
            //echo $p[0]." ".$p[1]." ".$p[2]."<br>";
            $product = new \App\Entity\Product($p[1], $p[2]);
            $array[$i] = $product;
            $i++;
        }
        return $array;
    }

    /**
     * @param int $id
     * @return \App\Entity\Product
     */
    public function find(int $id) : EntityInterface
    {
        //TODO return produit filtré par id
    }

    /**
     * @param int $id
     * @return EntityInterface[]
     */
    public function findBy($column, $value) : array
    {
        //TODO return produit filtré par id
    }
}