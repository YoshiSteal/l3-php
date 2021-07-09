<?php

namespace App\Entity;

use App\Repository\PariRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PariRepository::class)
 */
class Pari
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_match;

    /**
     * @ORM\Column(type="integer")
     */
    private $score_1;

    /**
     * @ORM\Column(type="integer")
     */
    private $score_2;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdMatch(): ?int
    {
        return $this->id_match;
    }

    public function setIdMatch(int $id_match): self
    {
        $this->id_match = $id_match;

        return $this;
    }

    public function getScore1(): ?int
    {
        return $this->score_1;
    }

    public function setScore1(int $score_1): self
    {
        $this->score_1 = $score_1;

        return $this;
    }

    public function getScore2(): ?int
    {
        return $this->score_2;
    }

    public function setScore2(int $score_2): self
    {
        $this->score_2 = $score_2;

        return $this;
    }

    public function getIdUser(): ?int
    {
        return $this->id_user;
    }

    public function setIdUser(int $id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }
}
