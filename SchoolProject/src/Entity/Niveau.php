<?php

namespace App\Entity;

use App\Repository\NiveauRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NiveauRepository::class)
 */
class Niveau
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
    private $nbNiv;

    /**
     * @ORM\Column(type="integer")
     */
    private $numNiv;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbNiv(): ?int
    {
        return $this->nbNiv;
    }

    public function setNbNiv(int $nbNiv): self
    {
        $this->nbNiv = $nbNiv;

        return $this;
    }

    public function getNumNiv(): ?int
    {
        return $this->numNiv;
    }

    public function setNumNiv(int $numNiv): self
    {
        $this->numNiv = $numNiv;

        return $this;
    }
}
