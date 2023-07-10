<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CookingProcessingIngredient;
use App\Models\Recipe;

class RecipeCookingProcess extends Model
{
    use HasFactory;
        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'recipe_id',
        'cooking_processing_ingredient_id',
        'user_id'
    ];
    // public function recipe()
    // {
    //     return $this->belongsToMany(Recipe::class,'recipe_cooking_processes');
    // }

    // public function cookingprocessingingredient()
    // {
    //     return $this->belongsToMany(CookingProcessingIngredient::class,'recipe_cooking_processes');
    // }   



}
