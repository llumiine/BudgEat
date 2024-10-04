<?php

namespace App\Entity;

use App\Repository\CommanderRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommanderRepository::class)
 */
class Commander
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
    private $total;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateRecup;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateAchat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $commentaireSupp;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $commentaireResto;

    /**
     * @ORM\Column(type="integer")
     */
    private $note;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTotal(): ?int
    {
        return $this->total;
    }

    public function setTotal(int $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getDateRecup(): ?\DateTimeInterface
    {
        return $this->dateRecup;
    }

    public function setDateRecup(\DateTimeInterface $dateRecup): self
    {
        $this->dateRecup = $dateRecup;

        return $this;
    }

    public function getDateAchat(): ?\DateTimeInterface
    {
        return $this->dateAchat;
    }

    public function setDateAchat(\DateTimeInterface $dateAchat): self
    {
        $this->dateAchat = $dateAchat;

        return $this;
    }

    public function getCommentaireSupp(): ?string
    {
        return $this->commentaireSupp;
    }

    public function setCommentaireSupp(string $commentaireSupp): self
    {
        $this->commentaireSupp = $commentaireSupp;

        return $this;
    }

    public function getCommentaireResto(): ?string
    {
        return $this->commentaireResto;
    }

    public function setCommentaireResto(string $commentaireResto): self
    {
        $this->commentaireResto = $commentaireResto;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): self
    {
        $this->note = $note;

        return $this;
    }
}
