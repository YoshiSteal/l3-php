<?php

namespace App\Entity\Repository;

use App\Entity\EntityInterface;
use \PDO;

class Product extends AbstractRepository implements RepositoryInterface
{
    public function __construct(){
        $this->table = "products";
        $this->chemin = \App\Entity\Product::class;
    }
}