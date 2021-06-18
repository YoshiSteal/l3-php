<?php

namespace App\Entity\Repository;

use App\Entity\EntityInterface;
use \PDO;

class Customer extends AbstractRepository implements RepositoryInterface
{
    /**
     * @return EntityInterface[]
     */
    public function findAll(): array
    {
        $sql = "Select * from customers";
        $query = $this->getConnexion()->query($sql);
        return $query->fetchAll(PDO::FETCH_CLASS, \App\Entity\Product::class);
    }

    /**
     * @param int $id
     * @return \App\Entity\Product
     */
    public function find(int $id): EntityInterface
    {
        $sql = "Select * from customers WHERE id = $id";
        $query = $this->getConnexion()->query($sql);
        return $query->fetchObject(\App\Entity\Product::class);
    }

    /**
     * @param int $id
     * @return EntityInterface[]
     */
    public function findBy($column, $value): array
    {
        $sql = "Select * from customers WHERE $column = $value";
        $query = $this->getConnexion()->query($sql);
        return $query->fetchAll(PDO::FETCH_CLASS, \App\Entity\Product::class);
    }
}