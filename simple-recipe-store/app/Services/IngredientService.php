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

    public function showIngredient($id)
    {
        $ingredient_id = $this->ingredientRepository->showIngredient($id);


    }
    public function storeIngredient(string $ingredientName)
    {
        return $ingredient = $this->ingredientRepository->storeIngredient($ingredientName);

    }
}

?>