<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\CookingProcess;

class CookingProcessingIngredient extends Model
{
    use HasFactory;
    protected $table = 'cooking_processing_ingredient';

    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class);
    }

    public function cookingprocess()
    {
        return $this->belongsTo(CookingProcess::class);
    }


    protected $fillable = [
        'ingredient_id',
        'cooking_process_id',
    ];
}
