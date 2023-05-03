<?php
namespace App\Http\Services;

use App\Http\Repository\IngredientRepository;

class IngredientService
{
    protected $ingredientRepository;

    public function __construct(IngredientRepository $ingredientRepository)
    {
        $this->ingredientRepository = $ingredientRepository;
    }

    public function createIngredient()
    {

    }
}

?>