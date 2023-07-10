<?php
namespace App\Repository;

use App\Models\KitchenTool;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\Cooking;
use App\Models\CookingProcess;
use App\Models\CookingProcessingIngredient;
use App\Models\RecipeCookingProcess;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Type\Integer;

class RecipeRepository
{
    public function createRecipe(string $recipeName, string $recipeCategory)
    {        
        $recipe = Recipe::create([
            'name' => $recipeName,
            'category' => $recipeCategory
        ]);
        return $recipe;
    }

    // Repositoryでfor文を回す文法
    // public function createCookingProcess(array $kitchentoolIds array $cookingIds array $time)
    // {        
    //     foreach ($kitchentoolIds as $index => $kitchentoolId) {
    //         $cookingId = $cookingIds[$index];
    //         $seconds = $time[$index];
        

    //     $createCookingProcess[] = CookingProcess::create([
    //         'kitchentool_id' => $kitchentoolId,
    //         'cooking_id' => $cookingId,
    //         'time' => $seconds
    //     ]);
    // }
    // return $createCookingProcess;
    // }

    // Service内で$requestの必要なプロパティを$cookingProcessAtributesに格納する文法
    public function createCookingProcess(array $cookingProcessAttributes)
    {
        foreach($cookingProcessAttributes as $cookingProcessAttribute) {
            $cookingProcessRecords[] = CookingProcess::create($cookingProcessAttribute);
        }
        // dd($cookingProcessAttributes);
        return $cookingProcessRecords;
    }


    public function createCookingProcessingIngredient(array $cookingProcessIngredientAttributes)
    {        
        // dd($cookingProcessIngredientAttributes);
        foreach ($cookingProcessIngredientAttributes as $cookingProcessIngredientAttribute){
        $cooking_processing_ingredients[] = CookingProcessingIngredient::create($cookingProcessIngredientAttribute);
        }
        return $cooking_processing_ingredients;
    }

    public function createRecipeCookingProcess(int $recipeId, array $cooking_processing_ingredient_ids)
    {
        foreach ($cooking_processing_ingredient_ids as $cooking_processing_ingredient_id){
        RecipeCookingProcess::create([
            'recipe_id' => $recipeId,
            'cooking_processing_ingredient_id' => $cooking_processing_ingredient_id
        ]);
        }
    }
    public function fetchRecipeList()
    {
        return $recipes = Recipe::all();
    }

    public function fetchRecipes($id)
    {
        if (func_num_args() > 0){
            return $recipes = Recipe::find($id); 
        } else {
            return $recipes = Recipe::all();
        }
    }


    public function showRecipe(int $recipeId)
    {   
        $recipeCookingProcess = Recipe::find($recipeId);
        $recipeDetails = $recipeCookingProcess->cookingProcessingIngredient;
        // dd($recipeCookingProcess);
        $recipe = $recipeDetails[1]->ingredient->name;
        // $recipe = $recipeDetails[0]->cookingProcess[0]->cooking->name;
        // $cooking = $recipe[0]->cooking->name;
        // $recipeName = $recipeCookingProcess->recipe;
        // dd($recipe);
        return $recipeDetails;
         
    }
    public function updateRecipe(int $recipeId, array $updateIngredient, array $updateKitchenTool, array $updateTime, array $updateCooking)
    {
        $recipeCookingProcess = Recipe::find($recipeId);
        $cookingProcessingIngredient = $recipeCookingProcess->cookingProcessingIngredient;
        $count = count($cookingProcessingIngredient);
        for ($i=0; $i<$count; $i++) {
            $cookingProcessingIngredientId = $cookingProcessingIngredient[$i]->id;

            $cookingProcessingIngredientRecord = CookingProcessingIngredient::find($cookingProcessingIngredientId);
            $cookingProcessingIngredientRecord->ingredient_id = $updateIngredient[$i];

            $cookingProcessId = $cookingProcessingIngredient[$i]->cookingProcess[0]->id;
            $cookingProcessRecord = CookingProcess::find($cookingProcessId);
            $cookingProcessRecord->kitchentool_id = $updateKitchenTool[$i];
            $cookingProcessRecord->cooking_id = $updateCooking[$i];
            $cookingProcessRecord->time = $updateTime[$i];

            $cookingProcessingIngredientRecord->save();
            $cookingProcessRecord->save();

        }
        return;
    }
    public function recipeDelete($id)
    {
        $recipe = Recipe::find($id);
        $recipe->delete();
        return;
    }
}

?>