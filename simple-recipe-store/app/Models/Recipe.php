<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CookingProcessingIngredient;
use App\Models\RecipeCookingProcess;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Recipe extends Model
{
    use HasFactory, Notifiable;
    public function cookingProcessingIngredient()
    {
        return $this->belongsToMany(CookingProcessingIngredient::class,'recipe_cooking_processes','recipe_id','cooking_processing_ingredient_id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'category',
    ];
}
