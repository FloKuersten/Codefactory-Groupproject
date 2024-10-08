<?php

namespace App\Entity;

use App\Repository\CartRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CartRepository::class)]
class Cart
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    public ?User $fk_user = null;

    #[ORM\ManyToOne]
    public ?Service $fk_service = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFkUser(): ?User
    {
        return $this->fk_user;
    }

    public function setFkUser(?User $fk_user): self
    {
        $this->fk_user = $fk_user;

        return $this;
    }

    public function getFkService(): ?Service
    {
        return $this->fk_service;
    }

    public function setFkService(?Service $fk_service): self
    {
        $this->fk_service = $fk_service;

        return $this;
    }
}
