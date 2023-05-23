<?php
namespace App\Repository;

use App\Models\Cooking;
use Ramsey\Uuid\Type\Integer;

class CookingRepository
{
    public function createCooking(string $cookingName)
    {        
        return Cooking::create([
            'name' => $cookingName,
        ]);
    }

    public function fetchCookingList()
    {
        return $cooking = Cooking::all();
    }
}

?>