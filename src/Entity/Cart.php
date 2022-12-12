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
    private ?user $fk_user = null;

    #[ORM\ManyToOne]
    private ?service $fk_service = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFkUser(): ?user
    {
        return $this->fk_user;
    }

    public function setFkUser(?user $fk_user): self
    {
        $this->fk_user = $fk_user;

        return $this;
    }

    public function getFkService(): ?service
    {
        return $this->fk_service;
    }

    public function setFkService(?service $fk_service): self
    {
        $this->fk_service = $fk_service;

        return $this;
    }
}
