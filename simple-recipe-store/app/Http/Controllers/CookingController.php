<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CookingService;

class CookingController extends Controller
{
    private $cookingService;

    public function __construct(CookingService $cookingService)
    {
        $this->cookingService = $cookingService;
    }

    public function list()
    {
        $cookings = $this->cookingService->fetchCookingList();

        return view('cooking_list',compact('cookings'));
    }

    public function store_view()
    {
        return view('/cooking_resister');
    }
    
    public function store(Request $request)
    {
        $cookings = $this->cookingService->createCooking($request->name);
        return redirect()->route('cooking.list');
    }
    public function delete($id)
    {
        $this->cookingService->deleteCooking($id);
        return redirect()->route('cooking.list');
    }
}
