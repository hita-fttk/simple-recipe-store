<?php
namespace App\Http\Repository;

use App\Http\Models\Ingredient;

class IngredientRepository
{
    protected $ingredient;

    public function __construct(Ingredient $ingredient)
    {
        $this->ingredient = $ingredient;
    }
}

?>