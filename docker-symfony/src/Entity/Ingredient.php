<?php

namespace App\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\IngredientRepository")
 */
class Ingredient
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
    private $isGluten;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isFish;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isPork;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Dish", mappedBy="ingredients")
     */
    private $dishes;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Ingredient")
     */
    private $ingredients;


    public function __construct()
    {
        $this->dishes = new ArrayCollection();
        $this->ingredients = new ArrayCollection();
    }

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

    public function getIsGluten(): ?bool
    {
        return $this->isGluten;
    }

    public function setIsGluten(bool $isGluten): self
    {
        $this->isGluten = $isGluten;

        return $this;
    }

    public function getIsFish(): ?bool
    {
        return $this->isFish;
    }

    public function setIsFish(bool $isFish): self
    {
        $this->isFish = $isFish;

        return $this;
    }

    public function getIsPork(): ?bool
    {
        return $this->isPork;
    }

    public function setIsPork(bool $isPork): self
    {
        $this->isPork = $isPork;

        return $this;
    }

    /**
     * @return Collection|Ingredient[]
     */
    public function getIngredients(): Collection
    {
        return $this->ingredients;
    }

    public function addIngredient(Ingredient $ingredient): self
    {
        if (!$this->ingredients->contains($ingredient)) {
            $this->ingredients[] = $ingredient;
        }

        return $this;
    }

    public function removeIngredient(Ingredient $ingredient): self
    {
        if ($this->ingredients->contains($ingredient)) {
            $this->ingredients->removeElement($ingredient);
        }

        return $this;
    }

    /**
     * @return Collection
     */
    public function getDishes(): Collection
    {
        return $this->dishes;
    }

    public function addDish(Dish $dish): self
    {
        if (!$this->dishes->contains($dish)) {
            $this->dishes[] = $dish;
            $dish->addIngredient($this);
        }

        return $this;
    }

    public function removeDish(Dish $dish): self
    {
        if ($this->dishes->contains($dish)) {
            $this->dishes->removeElement($dish);
            $dish->removeIngredient($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }


}
