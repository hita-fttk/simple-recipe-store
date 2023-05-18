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

    public function index()
    {
        $ingredients = Ingredient::all(); 

        return view('/ingredient',compact('ingredients'));
    }

    public function store_view()
    {
        return view('/ingredient_resister');
    }

    public function show(Request $request)
    {
        $id = $request->input('id');
        $ingredient = $this->ingredientService->showIngredient($id);

        return ;

    }

    public function store(Request $request)
    {
        $ingredient = $this->ingredientService->storeIngredient($request->name);

        return redirect('/ingredients');
    }
    public function update(Request $request)
    {
        $ingredient = new Ingredient;
        $ingredient->name = $request->name;

        $ingredient->save();

        return redirect('/ingredients');
    }
    public function delete(Request $request)
    {
        $ingredient = new Ingredient;
        $ingredient->name = $request->name;

        $ingredient->save();
        return redirect('/ingredients');
    }
}
