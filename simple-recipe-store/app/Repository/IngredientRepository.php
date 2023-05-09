<?php
namespace App\Repository;

use App\Models\Ingredient;

class IngredientRepository
{
    public function storeIngredient(string $ingredientName)
    {        
        return Ingredient::create([
            'name' => $ingredientName
        ]);
    }

    public function showIngredient(int $ingredientId)
    {
        return $ingredient = Ingredient::find($ingredientId);
    }
}

?>