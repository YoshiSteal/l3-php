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
        $query = $this->getConnexion()->query($sql);
        return $query->fetchAll(PDO::FETCH_CLASS, \App\Entity\Product::class);
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