<?php

namespace App\Entity;

use App\Repository\SectionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SectionRepository::class)
 */
class Section
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $nameSect;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbSect;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbStud;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameSect(): ?string
    {
        return $this->nameSect;
    }

    public function setNameSect(string $nameSect): self
    {
        $this->nameSect = $nameSect;

        return $this;
    }

    public function getNbSect(): ?int
    {
        return $this->nbSect;
    }

    public function setNbSect(int $nbSect): self
    {
        $this->nbSect = $nbSect;

        return $this;
    }

    public function getNbStud(): ?int
    {
        return $this->nbStud;
    }

    public function setNbStud(int $nbStud): self
    {
        $this->nbStud = $nbStud;

        return $this;
    }
}
