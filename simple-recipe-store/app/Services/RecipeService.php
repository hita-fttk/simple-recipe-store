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

    public function fetchRecipeList()
    {
        return $this->recipeRepository->fetchRecipeList();
    }

    public function showRecipe($recipeId)
    {
        $recipe = $this->recipeRepository->showRecipe($recipeId);

    }
    public function createRecipe(string $recipeName, string $recipeCategory)
    {
        return $this->recipeRepository->createRecipe($recipeName,$recipeCategory);

    }
}

?>