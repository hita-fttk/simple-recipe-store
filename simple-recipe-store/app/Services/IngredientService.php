<?php
namespace App\Services;

use App\Repository\IngredientRepository;

class IngredientService
{
    protected $ingredientRepository;

    public function __construct(IngredientRepository $ingredientRepository)
    {
        $this->ingredientRepository = $ingredientRepository;
    }

    public function fetchIngredientList()
    {
        return $this->ingredientRepository->fetchIngredientList();
    }
    public function fetchIngredients($id)
    {
        return $this->ingredientRepository->fetchIngredients($id);

    }
    public function storeIngredient(string $ingredientName)
    {
        return $this->ingredientRepository->createIngredient($ingredientName);
    }
    public function deleteIngredient($id)
    {
        return $this->ingredientRepository->deleteIngredient($id);
    }
}

?>