<?php
namespace App\Services;

use App\Repository\CookingRepository;


class CookingService
{
    protected $cookingRepository;

    public function __construct(CookingRepository $cookingRepository)
    {
        $this->cookingRepository = $cookingRepository;
    }

    public function fetchCookingList()
    {
        return $this->cookingRepository->fetchCookingList();
    }

    public function createCooking(string $cookingName)
    {
        return $this->cookingRepository->createCooking($cookingName);
    }
    public function deleteCooking($id)
    {
        return $this->cookingRepository->deleteCooking($id);
    }
}

?>