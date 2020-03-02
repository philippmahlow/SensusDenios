<?php


namespace DENIOS\Restaurant\Dishes;


class Ingredient
{
    use IngredientTrait;

    /**
     * @var string $name
     */
    protected $name;


    /**
     * @var bool
     */
    protected $isVegan;

    /**
     * @var bool
     */
    protected $isVegatarian;

    /**
     * @var bool
     */
    protected $isGlutenFree;

    /**
     * @var bool
     */
    protected $hasFish;

    /**
     * @var bool
     */
    protected $hasPork;


    /**
     * Ingredients constructor.
     * @param string $name
     * @param bool $isVegan
     * @param bool $isVegatarian
     * @param bool $isGlutenFree
     * @param bool $hasFish
     * @param bool $hasPork
     * @param array $additionalIngredients
     */
    function __construct(string $name,bool $isVegan, bool $isVegatarian, bool $isGlutenFree, bool $hasFish, bool $hasPork,array $additionalIngredients = null)
    {
        $this->name = $name;
        $this->isVegan = $isVegan;
        $this->isVegatarian = $isVegatarian;
        $this->isGlutenFree = $isGlutenFree;
        $this->hasFish = $hasFish;
        $this->hasPork = $hasPork;
        $this->ingredients = $additionalIngredients;

    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return bool
     */
    public function isVegan(): bool
    {
        if($this->getIngredients()) {
            foreach($this->getIngredients() as $ingredient) {
                if(!$ingredient->isVegan) {
                    return false;
                }
            }

            return true;
        }
        return $this->isVegan;
    }

    /**
     * @param bool $isVegan
     */
    public function setIsVegan(bool $isVegan)
    {
        $this->isVegan = $isVegan;
    }

    /**
     * @return bool
     */
    public function isVegatarian(): bool
    {
        return $this->isVegatarian;
    }

    /**
     * @param bool $isVegatarian
     */
    public function setIsVegatarian(bool $isVegatarian)
    {
        $this->isVegatarian = $isVegatarian;
    }

    /**
     * @return bool
     */
    public function isGlutenFree(): bool
    {
        return $this->isGlutenFree;
    }

    /**
     * @param bool $isGlutenFree
     */
    public function setIsGlutenFree(bool $isGlutenFree)
    {
        $this->isGlutenFree = $isGlutenFree;
    }

    /**
     * @return bool
     */
    public function isHasFish(): bool
    {
        return $this->hasFish;
    }

    /**
     * @param bool $hasFish
     */
    public function setHasFish(bool $hasFish)
    {
        $this->hasFish = $hasFish;
    }

    /**
     * @return bool
     */
    public function isHasPork(): bool
    {
        return $this->hasPork;
    }

    /**
     * @param bool $hasPork
     */
    public function setHasPork(bool $hasPork)
    {
        $this->hasPork = $hasPork;
    }


}