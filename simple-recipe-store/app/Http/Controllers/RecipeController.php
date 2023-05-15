<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RecipeService;

class RecipeController extends Controller
{
    private $recipeService;

    public function __construct(RecipeService $recipeService)
    {
        $this->recipeService = $recipeService;
    }

    public function list()
    { 
        $recipes = $this->recipeService->listRecipe();

        return view('recipe_list',compact('recipes'));
    }

    public function resister_view()
    {
        return view('/recipe_resister');
    }

    public function show(Request $request)
    {
        $id = $request->input('id');
        $recipe = $this->recipeService->showRecipe($id);

        return view('',compact(''));

    }

    public function store(Request $request)
    {
        $recipe = $this->recipeService->createRecipe($request->name,$request->category);

        return redirect('recipe.list');
    }
    public function update(Request $request)
    {
        $id = $request->input('id');
        $recipe = $this->recipeService($id);

        return redirect('/recipe.show');
    }
    public function delete(Request $request)
    {
        $id = $request->input('id');
        $recipe = $this->recipeService($id);

        return redirect('/recipe.list');
    }
}
