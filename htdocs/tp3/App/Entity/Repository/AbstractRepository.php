<?php

namespace App\Entity\Repository;
abstract class AbstractRepository implements RepositoryInterface
{
    function getConnexion()
    {
        // return connexion pdo
    }
}