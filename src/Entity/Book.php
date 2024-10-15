<?php

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookRepository::class)]
class Book
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $titile = null;

    #[ORM\Column]
    private ?bool $enabled = null;

    #[ORM\ManyToOne(inversedBy: 'Book')]
    private ?Author $author = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitile(): ?\DateTimeInterface
    {
        return $this->titile;
    }

    public function setTitile(\DateTimeInterface $titile): static
    {
        $this->titile = $titile;

        return $this;
    }

    public function isEnabled(): ?bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): static
    {
        $this->enabled = $enabled;

        return $this;
    }

    public function getAuthor(): ?Author
    {
        return $this->author;
    }

    public function setAuthor(?Author $author): static
    {
        $this->author = $author;

        return $this;
    }
}
//naawed nchouf el jointure php bin/console make:entity 
//emb3ed nhot esem el entity enli ena deja khdmetha maanetha twali kifma el update w emb3ednhot esm el entity lokhra w eb3ed nkhtar el type relation 

