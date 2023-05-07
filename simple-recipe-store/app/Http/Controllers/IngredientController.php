<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ingredient;
use App\Services\IngredientService;


class IngredientController extends Controller
{
    private $ingredientService;

    public function __construct(IngredientService $ingredientService)
    {
        $this->ingredientService = $ingredientService;
    }

    public function show(Request $request)
    {
        $id = $request->input('id');
        $ingredient = $this->ingredientService->showIngredient($id);

        // $ingredientName = $request->input('ingredient_name');
        // $ingredientAmount = $request->input('ingredient_amount');

        // $this->ingredientService->createIngredient($ingredientName, $ingredientAmount);

        // 以下略
    }

    public function store(Request $request)
    {
        $name = $request->name;
        echo $name;
    }
}
