<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\KitchenToolController;
use App\Http\Controllers\CookingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/recipes',[RecipeController::class,'list'])->name('recipe.list');
Route::get('/recipes/{id}',[RecipeController::class,'show'])->name('recipe.show');
Route::get('/recipes/new',[RecipeController::class,'store_view'])->name('recipe.store_view');
Route::post('/recipes',[RecipeController::class,'store'])->name('recipe.store');
Route::put('/recipes/{id}',[RecipeController::class,'update'])->name('recipe.update');
Route::delete('/recipes/{id}',[RecipeController::class,'delete'])->name('recipe.delete');

Route::get('/cookings',[CookingController::class,'list'])->name('cooking.list');
Route::get('/cookings/new',[CookingController::class,'store_view'])->name('cooking.store_view');
Route::post('/cookings',[CookingController::class,'store'])->name('cooking.store');

Route::get('/kitchentools',[KitchenToolController::class,'list'])->name('kitchentool.list');
Route::get('/kitchentools/new',[KitchenToolController::class,'store_view'])->name('kitchentool.store_view');
Route::post('/kitchentools',[KitchenToolController::class,'store'])->name('kitchentool.store');

Route::get('/ingredients',[IngredientController::class,'index'])->name('ingredients.list');
Route::get('/ingredients/{id}',[IngredientController::class,'index_copy'])->name('ingredients.show');
Route::get('/ingredients/new',[IngredientController::class,'store_view'])->name('ingredient.store_view');
Route::post('/ingredients',[IngredientController::class,'store'])->name('ingredients.store');
Route::put('/ingredients',[IngredientController::class,'update'])->name('ingredients.update');
Route::delete('/ingredients',[IngredientController::class,'delete'])->name('ingredients.delete');

// Route::get('/ingredient_resister/{id}',IngredientController::class,'store')->name('ingredient_store');
// Route::get('/ingredient_resister',[IngredientController::class,'store'])->name('ingredient_store');
// Route::get('/ingredient_resister/{id}',[IngredientController::class,'store'])->name('ingredient_resister');

Route::get('/ingredient_show/{id}',[IngredientController::class,'show'])->name('ingredient_show');
Route::get('/ingredient_show',[IngredientController::class,'show'])->name('ingredient_show');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
