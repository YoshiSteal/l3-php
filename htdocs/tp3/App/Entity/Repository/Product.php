<?php

namespace App\Entity\Repository;

use App\Entity\EntityInterface;

class Product implements RepositoryInterface
{
    /**
     * @return EntityInterface[]
     */
    public function findAll() : array
    {
        //TODO return all row from table
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