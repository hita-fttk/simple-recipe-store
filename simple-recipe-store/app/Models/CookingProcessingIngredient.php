<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CookingProcess;
use App\Models\RecipeCookingProcess;
use App\Models\Ingredient;

class CookingProcessingIngredient extends Model
{
    use HasFactory;
    protected $table = 'cooking_processing_ingredient';

    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class,'ingredient_id');
    }

    public function cookingProcess()
    {
        return $this->belongsToMany(CookingProcess::class,'cooking_processing_ingredient','cooking_process_id');
    }

    public function reciepcookingprocess()
    {
        return $this->hasMany(RecipeCookingProcess::class);
    }

    public function recipe()
    {
        return $this->belongsToMany(Recipe::class);
    }


    protected $fillable = [
        'ingredient_id',
        'cooking_process_id',
    ];
}
