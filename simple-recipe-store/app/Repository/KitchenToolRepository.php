<?php
namespace App\Repository;

use App\Models\KitchenTool;
use Ramsey\Uuid\Type\Integer;

class KitchenToolRepository
{
    public function createKitchenTool(string $kitchentoolName)
    {        
        return KitchenTool::create([
            'name' => $kitchentoolName,
        ]);
    }

    public function fetchKitchenToolList()
    {
        return $kitchentool = KitchenTool::all();
    }
    public function deleteKitchenTool($id)
    {
        $kitchentool = KitchenTool::find($id);
        return $kitchentool->delete();
    }
}

?>