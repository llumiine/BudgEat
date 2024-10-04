<?php

namespace App\Entity;

use App\Repository\CarteBancaireRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CarteBancaireRepository::class)
 */
class CarteBancaire
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
    private $numeroCarte;

    /**
     * @ORM\Column(type="integer")
     */
    private $CVC;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCarte;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroCarte(): ?int
    {
        return $this->numeroCarte;
    }

    public function setNumeroCarte(int $numeroCarte): self
    {
        $this->numeroCarte = $numeroCarte;

        return $this;
    }

    public function getCVC(): ?int
    {
        return $this->CVC;
    }

    public function setCVC(int $CVC): self
    {
        $this->CVC = $CVC;

        return $this;
    }

    public function getDateCarte(): ?\DateTimeInterface
    {
        return $this->dateCarte;
    }

    public function setDateCarte(\DateTimeInterface $dateCarte): self
    {
        $this->dateCarte = $dateCarte;

        return $this;
    }
}
