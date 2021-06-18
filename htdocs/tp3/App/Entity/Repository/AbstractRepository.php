<?php

namespace App\Entity\Repository;
use App\Entity\EntityInterface;
use \PDO;

abstract class AbstractRepository implements RepositoryInterface
{

    protected $table;
    protected $chemin;

    function getConnexion()
    {
        return Connexion::getInstance()->getPDO();
    }

    /**
     * @return EntityInterface[]
     */
    public function findAll() : array
    {
        $sql = "Select * from $this->table";
        $query = $this->getConnexion()->query($sql);
        return $query->fetchAll(PDO::FETCH_CLASS, $this->chemin);
    }

    /**
     * @param int $id
     * @return \App\Entity\Product
     */
    public function find(int $id) : EntityInterface
    {
        $sql = "Select * from $this->table WHERE id = $id";
        $query = $this->getConnexion()->query($sql);
        return $query->fetchObject($this->chemin);
    }

    /**
     * @param int $id
     * @return EntityInterface[]
     */
    public function findBy($column, $value) : array
    {
        $sql = "Select * from $this->table WHERE $column = $value";
        $query = $this->getConnexion()->query($sql);
        return $query->fetchAll(PDO::FETCH_CLASS, $this->chemin);
    }
}