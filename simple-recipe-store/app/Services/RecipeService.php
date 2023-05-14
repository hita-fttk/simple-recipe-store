<?php
namespace App\Services;

use App\Repository\RecipeRepository;

class RecipeService
{
    protected $recipeRepository;

    public function __construct(RecipeRepository $recipeRepository)
    {
        $this->recipeRepository = $recipeRepository;
    }

    public function listRecipe()
    {
        return $this->recipeRepository->listRecipe();
    }

    public function showRecipe($id)
    {
        $recipe = $this->recipeRepository->showRecipe($id);

    }
    public function createRecipe(string $recipeName, string $recipeCategory)
    {
        return $this->recipeRepository->createRecipe($recipeName,$recipeCategory);

    }
}

?>