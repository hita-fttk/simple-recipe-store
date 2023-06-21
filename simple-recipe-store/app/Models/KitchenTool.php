<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class KitchenTool extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'kitchentools';

    public function cookingProcess()
    {
        return $this->hasMany(CookingProcess::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];
}
