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

    public function store(Request $request)
    {
        // dd($request);
        $recipeId = $this->recipeService->createRecipe($request->name,$request->category);
        // Repositoryでfor文を回す文法
        // $createCookingProcess = $this->recipeService->createCookingProcess($request->kitchentoolId,$request->cookingId,$request->time);

        // Service内で$requestの必要なプロパティを$cookingProcessAtributesに格納する文法
        $cookingProcessRecords = $this->recipeService->createCookingProcess($request->kitchentoolId,$request->cookingId,$request->time);
        // dd($cookingprocess);
        $cooking_processing_ingredient_ids = $this->recipeService->createCookingProcessingIngredient($request->ingredientId,$cookingProcessRecords);
        $this->recipeService->createRecipeCookingProcess($recipeId,$cooking_processing_ingredient_ids);
        return redirect()->route('recipe.list');
    }

    public function show($id)
    {
        // dd($id);
        $recipes = $this->recipeService->fetchRecipes($id);
        $ingredients = $this->ingredientService->fetchIngredientList();
        $kitchentools = $this->kitchentoolService->fetchKitchenToolList();
        $cookings = $this->cookingService->fetchCookingList();
        $recipeDetails = $this->recipeService->showRecipe($id);

        return view('recipe_detail', compact('recipes','ingredients','kitchentools','cookings','recipeDetails'));

    }

    public function update($id, Request $request)
    {
        $this->recipeService->updateRecipe($id, $request->updateIngredient, $request->updateKitchenTool, $request->updateTime, $request->updateCooking);
        
        return redirect()->route('recipe.list');
    }
    public function delete($id)
    {
        $this->recipeService->recipeDelete($id);
        return redirect()->route('recipe.list');
    }
}
