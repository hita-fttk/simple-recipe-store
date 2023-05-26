<?php
namespace App\Services;

use App\Repository\RecipeRepository;
use App\Repository\IngredientRepository;
use App\Repository\KitchenToolRepository;
use App\Repository\CookingRepository;

class RecipeService
{
    protected $recipeRepository;
    protected $ingredientRepository;
    protected $kitchentoolRepository;
    protected $cookingRepository;

    public function __construct(RecipeRepository $recipeRepository,IngredientRepository $ingredientRepository,KitchenToolRepository $kitchentoolRepository,CookingRepository $cookingRepository)
    {
        $this->recipeRepository = $recipeRepository;
        $this->ingredientRepository = $ingredientRepository;
        $this->kitchentoolRepository = $kitchentoolRepository;
        $this->cookingRepository = $cookingRepository;
    }

    public function fetchRecipeList()
    {
        return $this->recipeRepository->fetchRecipeList();
    }
    public function fetchRecipeElement()
    {
        $ingredients = $this->ingredientRepository->fetchIngredientList();
        $kitchentools = $this->kitchentoolRepository->fetchKitchenToolList();
        $cookings = $this->cookingRepository->fetchCookingList();

        $recipeList = [
            'ingredients' => $ingredients,
            'kitchentools' => $kitchentools,
            'cookings' => $cookings
        ];
        return $recipeList;

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