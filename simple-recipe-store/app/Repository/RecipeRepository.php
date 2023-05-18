<?php
namespace App\Repository;

use App\Models\Recipe;
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

    public function showRecipe(int $recipeId)
    {
        return $recipe = Recipe::find($recipeId);
    }
}

?>