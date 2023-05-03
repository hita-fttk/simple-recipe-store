<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\IngredientService;

class IngredientController extends Controller
{
    private $ingredientService;

    public function __construct(IngredientService $ingredientService)
    {
        $this->ingredientService = $ingredientService;
    }

    public function store(Request $request)
    {
        dd($request);

        $ingredientName = $request->input('ingredient_name');
        $ingredientAmount = $request->input('ingredient_amount');

        $this->ingredientService->createIngredient($ingredientName, $ingredientAmount);

        // 以下略
    }
}
