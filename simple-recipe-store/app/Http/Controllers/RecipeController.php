<?php

namespace App\Http\Controllers;

use App\Services\IngredientService;
use App\Services\KitchenToolService;
use App\Services\CookingService;
use App\Services\RecipeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RecipeController extends Controller
{
    private $recipeService;
    private $ingredientService;
    private $kitchentoolService;
    private $cookingService;

    public function __construct(RecipeService $recipeService,IngredientService $ingredientService,KitchenToolService $kitchentoolService,CookingService $cookingService)
    {
        $this->recipeService = $recipeService;
        $this->ingredientService = $ingredientService;
        $this->kitchentoolService = $kitchentoolService;
        $this->cookingService = $cookingService;
    }

    public function list()
    { 
        $recipes = $this->recipeService->fetchRecipeList();
        $ingredients = $this->ingredientService->fetchIngredientList();
        $kitchentools = $this->kitchentoolService->fetchKitchenToolList();
        $cookings = $this->cookingService->fetchCookingList();

        return view('recipe_list',compact('recipes'));
    }

    public function store_view()
    {
        $ingredients = $this->ingredientService->fetchIngredientList();
        $kitchentools = $this->kitchentoolService->fetchKitchenToolList();
        $cookings = $this->cookingService->fetchCookingList();
        // dd($recipeList);
        return view('recipe_resister',compact('ingredients','kitchentools','cookings'));
    }

    public function show(Request $request)
    {
        $recipeId = intval($request->input('id'));
        $recipe = $this->recipeService->showRecipe($recipeId);

        return view('recipe_resister');

    }

    public function store(Request $request)
    {
        dd($request);
        $recipe = $this->recipeService->createRecipe($request->name,$request->category,);

        return redirect()->route('recipe.list');
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
