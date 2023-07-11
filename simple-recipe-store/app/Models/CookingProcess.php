<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CookingProcess extends Model
{
    use HasFactory;
    protected $table = 'cooking_process';

    public function kitchentool()
    {
        return $this->belongsTo(KitchenTool::class);
    }

    public function cooking()
    {
        return $this->belongsTo(Cooking::class);
    }

    public function cookingprocessingingredient()
    {
        return $this->hasMany(CookingProcessingIngredient::class);
    }


    protected $fillable = [
        'kitchentool_id',
        'cooking_id',
        'time'
    ];
}
