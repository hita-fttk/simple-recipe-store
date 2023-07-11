<?php
namespace App\Services;

use App\Repository\RecipeRepository;
use App\Repository\IngredientRepository;
use App\Repository\KitchenToolRepository;
use App\Repository\CookingRepository;

class RecipeService
{
    protected $recipeRepository;
    protected $ingredientRepository;
    protected $kitchentoolRepository;
    protected $cookingRepository;

    public function __construct(RecipeRepository $recipeRepository,IngredientRepository $ingredientRepository,KitchenToolRepository $kitchentoolRepository,CookingRepository $cookingRepository)
    {
        $this->recipeRepository = $recipeRepository;
        $this->ingredientRepository = $ingredientRepository;
        $this->kitchentoolRepository = $kitchentoolRepository;
        $this->cookingRepository = $cookingRepository;
    }

    public function fetchRecipeList()
    {
        return $this->recipeRepository->fetchRecipeList();
    }

    public function fetchRecipes($id)
    {
        return $this->recipeRepository->fetchRecipes($id);
    }

    public function updateRecipe(int $recipeId, array $updateIngredient, array $updateKitchenTool, array $updateTime, array $updateCooking)
    {
        return $this->recipeRepository->updateRecipe($recipeId,$updateIngredient,$updateKitchenTool,$updateTime,$updateCooking);
    }

    public function showRecipe($recipeId)
    {
        return $this->recipeRepository->showRecipe($recipeId);

    }
    public function createRecipe(string $recipeName, string $recipeCategory)
    {
        $recipe = $this->recipeRepository->createRecipe($recipeName,$recipeCategory);
        $recipeId = $recipe->id;
        return $recipeId;
    }

    public function createCookingProcess(array $kitchentoolIds,array $cookingIds,array $time)
    {
        // Service内で$requestの必要なプロパティを$cookingProcessAtributesに格納する文法
        foreach ($kitchentoolIds as $index => $kitchentoolId) {
            $cookingId = $cookingIds[$index];
            $seconds = $time[$index];
    
            $cookingProcessAttributes[] = [
                'kitchentool_id' => $kitchentoolId,
                'cooking_id' => $cookingId,
                'time' => $seconds
            ];
        }
        // dd($cookingProcessAttributes);


         $cookingProcessRecords = $this->recipeRepository->createCookingProcess($cookingProcessAttributes);
        return $cookingProcessRecords;
    }

    public function createCookingProcessingIngredient(array $ingredientIds,array $cookingProcessRecords)
    {
        // dd($cookingProcessRecords);
        foreach ($ingredientIds as $index => $ingredientId){
            $cookingProcessId = $cookingProcessRecords[$index]->id;

            $cookingProcessIngredientAttributes[] = [
                'ingredient_id' => $ingredientId,
                'cooking_process_id' => $cookingProcessId
            ];
        }
        // dd($cookingProcessIngredientAttributes);
        $cooking_processing_ingredients = $this->recipeRepository->createCookingProcessingIngredient($cookingProcessIngredientAttributes);
        foreach ($cooking_processing_ingredients as $cooking_processing_ingredient){
            $cooking_processing_ingredient_ids[] = $cooking_processing_ingredient->id;
        }
        return $cooking_processing_ingredient_ids;
    }
    public function createRecipeCookingProcess(int $recipeId, array $cooking_processing_ingredient_ids)
    {
        $this->recipeRepository->createRecipeCookingProcess($recipeId,$cooking_processing_ingredient_ids);
    }

    public function recipeDelete($id)
    {
        $this->recipeRepository->recipeDelete($id);
    }
}

?>