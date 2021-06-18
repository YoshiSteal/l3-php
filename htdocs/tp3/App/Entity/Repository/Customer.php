<?php

namespace App\Entity\Repository;

use App\Entity\EntityInterface;
use \PDO;

class Customer extends AbstractRepository implements RepositoryInterface
{
    public function __construct(){
        $this->table = "customers";
        $this->chemin = \App\Entity\Customer::class;
    }
}