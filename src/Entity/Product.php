<?php

namespace App\Entity;

use App\Repository\ProductRepository; //mnjem nestaaml kn el repo mteeha brk
use Doctrine\ORM\Mapping as ORM;//bech yasnaa el entite w partie attribute w yasnaa el getters w el setteres

#[ORM\Entity(repositoryClass: ProductRepository::class)]//CHQ ENTITE ANDHA REEPO WHD
class Product // el classe hethi mtkhde kn maa el  repositoryClass: ProductRepository::class
{
    #[ORM\Id]//annotation: cle primaire
    #[ORM\GeneratedValue]// auto increment fiha el el getters
    #[ORM\Column]
    private ?int $id = null; //varible : kif nhb nbadel varinble enbadel menha  fiha el get w el set

    #[ORM\Column(length: 20)]
    private ?string $username = null;

    #[ORM\Column(length: 50)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }
}
