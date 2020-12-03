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

Route::namespace('Admin')->prefix('admin')->group(function(){
    /**Rotas de perfil */
    Route::resource('profiles', ProfilePlanController::class);
    
    /*Rotas de planos e detalhes */
    Route::prefix('plans/{url}')->group(function(){
        Route::resource('details', DetailPlanController::class);        
    });
    Route::any('plans/search','PlanController@search')->name('plans.search');
    Route::resource('plans', PlanController::class);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
