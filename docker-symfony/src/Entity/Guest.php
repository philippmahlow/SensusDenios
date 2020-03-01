<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GuestRepository")
 */
class Guest
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isVegan;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isVegetarian;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isAvoidGluten;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isAvoidPork;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isAvoidFish;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getIsVegan(): ?bool
    {
        return $this->isVegan;
    }

    public function setIsVegan(bool $isVegan): self
    {
        $this->isVegan = $isVegan;

        return $this;
    }

    public function getIsVegetarian(): ?bool
    {
        return $this->isVegetarian;
    }

    public function setIsVegetarian(bool $isVegetarian): self
    {
        $this->isVegetarian = $isVegetarian;

        return $this;
    }

    public function getIsAvoidGluten(): ?bool
    {
        return $this->isAvoidGluten;
    }

    public function setIsAvoidGluten(bool $isAvoidGluten): self
    {
        $this->isAvoidGluten = $isAvoidGluten;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIsAvoidPork()
    {
        return $this->isAvoidPork;
    }

    /**
     * @param mixed $isAvoidPork
     */
    public function setIsAvoidPork($isAvoidPork): void
    {
        $this->isAvoidPork = $isAvoidPork;
    }

    /**
     * @return mixed
     */
    public function getIsAvoidFish()
    {
        return $this->isAvoidFish;
    }

    /**
     * @param mixed $isAvoidFish
     */
    public function setIsAvoidFish($isAvoidFish): void
    {
        $this->isAvoidFish = $isAvoidFish;
    }


}
