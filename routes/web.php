<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Route Users
    Route::get('/Users',[App\Http\Controllers\UsersController::class,'Index'])->name('Index'); 
    
    //Ingredients rutes
    // Route::get('/Ingredientes','IngredientesController@Index');
    // Route::get('/Ingredientes/Listar','IngredientesController@Listar');
    Route::get('/Ingredientes', [App\Http\Controllers\IngredientesController::class, 'Index'])->name('Index');
    Route::get('/Ingredientes/Listar', [App\Http\Controllers\IngredientesController::class, 'Listar'])->name('Listar');
    Route::get('/Ingredientes/Create', [App\Http\Controllers\IngredientesController::class, 'Create'])->name('Create');
    Route::post('/Ingredientes/Save', [App\Http\Controllers\IngredientesController::class, 'Save'])->name('Save');
    Route::get('/Ingredientes/Edit/{id}', [App\Http\Controllers\IngredientesController::class, 'Edit'])->name('Edit');
    Route::post('/Ingredientes/Update', [App\Http\Controllers\IngredientesController::class, 'Update'])->name('Update');
    Route::get('/Ingredientes/UpdateState/{id}/{estado}', [App\Http\Controllers\IngredientesController::class, 'UpdateState'])->name('UpdateState');
    
    // DetalleReceta Route 
    Route::get('/DetalleReceta', [App\Http\Controllers\DetalleRecetaController::class, 'Index'])->name('Index');
    Route::get('/DetalleReceta/Create', [App\Http\Controllers\DetalleRecetaController::class, 'Create'])->name('Create');
    Route::post('/DetalleReceta/Save', [App\Http\Controllers\DetalleRecetaController::class, 'Save'])->name('Save');
    
    // //  Clasificaciones Route
    Route::get('/Clasificaciones', [App\Http\Controllers\ClasificacionesController::class, 'Index'])->name('Index');
    Route::get('/Clasificaciones/Listar', [App\Http\Controllers\ClasificacionesController::class, 'Listar'])->name('Listar');
    Route::get('/Clasificaciones/Create', [App\Http\Controllers\ClasificacionesController::class, 'Create'])->name('Create');
    Route::post('/Clasificaciones/Save', [App\Http\Controllers\ClasificacionesController::class, 'Save'])->name('Save');
    Route::get('/Clasificaciones/Edit/{id}', [App\Http\Controllers\ClasificacionesController::class, 'Edit'])->name('Edit');
    Route::post('/Clasificaciones/Update', [App\Http\Controllers\ClasificacionesController::class, 'Update'])->name('Update');
    Route::get('/Clasificaciones/UpdateState/{id}/{estado}', [App\Http\Controllers\ClasificacionesController::class, 'UpdateState'])->name('UpdateState');
    

