<?php
namespace App\Repository;

use App\Models\KitchenTool;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\Cooking;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Type\Integer;

class RecipeRepository
{
    public function createRecipe(string $recipeName, string $recipeCategory)
    {        
        return Recipe::create([
            'name' => $recipeName,
            'category' => $recipeCategory
        ]);
    }

    public function fetchRecipeList()
    {
        return $recipe = Recipe::all();
    }

    public function fetchAlltoRecipe()
    {
        $ingredients = Ingredient::all();
        $kitchentools = KitchenTool::all();
        $cookings = Cooking::all();
        $recipeList = [
            'ingredients' => $ingredients,
            'kitchentools' => $kitchentools,
            'cookings' => $cookings
        ];
        return $recipeList;
    }

    public function showRecipe(int $recipeId)
    {
        return $recipe = Recipe::find($recipeId);
    }
}

?>