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
    Route::namespace('ACL')->group(function(){

        Route::get('profiles/{profile}/permissions', 'PermissionProfileController@permissions')->name('profile.permissions');
        Route::any('profiles/search','ProfileController@search')->name('profiles.search');
        Route::resource('profiles', ProfileController::class);

        Route::any('permissions/search','PermissionController@search')->name('permissions.search');
        Route::resource('permissions', PermissionController::class);
    });

    
    /*Rotas de planos e detalhes */
    Route::prefix('plans/{url}')->group(function(){
        Route::resource('details', DetailPlanController::class);        
    });
    Route::any('plans/search','PlanController@search')->name('plans.search');
    Route::resource('plans', PlanController::class);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
