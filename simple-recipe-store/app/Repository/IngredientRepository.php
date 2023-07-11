<?php
namespace App\Repository;

use App\Models\Ingredient;

class IngredientRepository
{
    public function createIngredient(string $ingredientName)
    {        
        return Ingredient::create([
            'name' => $ingredientName
        ]);
    }

    public function showIngredient(int $ingredientId)
    {
        return $ingredient = Ingredient::find($ingredientId);
    }
    public function fetchIngredientList()
    {
        return $ingredients = Ingredient::all();
    }
    public function fetchIngredients($id)
    {
        return $ingredients = Ingredient::find($id);
    }
    public function deleteIngredient($id)
    {
        $deleteIngredinet = Ingredient::find($id);
        return $deleteIngredinet->delete();
    }
}

?>