<?php
namespace App\Services;

use App\Repository\KitchenToolRepository;

class KitchenToolService
{
    protected $kitchentoolRepository;

    public function __construct(KitchenToolRepository $kitchentoolRepository)
    {
        $this->kitchentoolRepository = $kitchentoolRepository;
    }

    public function fetchKitchenToolList()
    {
        return $this->kitchentoolRepository->fetchKitchenToolList();
    }

    public function createKitchenTool(string $kitchentoolName)
    {
        return $this->kitchentoolRepository->createKitchenTool($kitchentoolName);
    }
    public function deleteKitchenTool($id)
    {
        return $this->kitchentoolRepository->deleteKitchenTool($id);
    }
}

?>