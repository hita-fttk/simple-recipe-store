<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IngredientController;
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

Route::get('/recipes', function () {
    return view('recipe');
})->middleware(['auth', 'verified'])->name('recipes');

Route::get('/ingredients', function () {
    return view('ingredient');
})->middleware(['auth', 'verified'])->name('ingredients');

Route::get('/kitchentools', function () {
    return view('kitchentool');
})->middleware(['auth', 'verified'])->name('kitchentools');
Route::get('/kitchentool_resister',[KitchenToolController::class,'store'])->name('kitchentool_resister');

Route::get('/cookings', function () {
    return view('cooking');
})->middleware(['auth', 'verified'])->name('cookings');
Route::get('/cooking_resister',[CookingController::class,'store'])->name('cooking_resister');

Route::get('/ingredient_resister/{id}', function () {
    return view('ingredient_resister');
})->middleware(['auth', 'verified'])->name('ingredient.resister');

Route::get('/ingredient_resister',function(){
    return view('ingredient_resister');
})->middleware(['auth', 'verified'])->name('ingredient_resister');

Route::get('/ingredients',[IngredientController::class,'index'])->name('ingredients.list');
Route::get('/ingredients/{id}',[IngredientController::class,'index_copy'])->name('ingredients');
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
