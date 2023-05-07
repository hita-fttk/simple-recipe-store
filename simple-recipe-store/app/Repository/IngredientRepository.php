<?php
namespace App\Repository;

use App\Models\Ingredient;

class IngredientRepository
{
    protected $ingredient;

    public function __construct(Ingredient $ingredient)
    {
        $this->ingredient = $ingredient;
    }

    public function getIngredient($ingredient_id)
    {
        $ingredient = Ingredient::find($ingredient_id);
        
        return $ingredient;
    }
}

?>