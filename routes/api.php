<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('/recipes', 'API\RecipeController@find');
Route::get('/recipes', 'API\RecipeController@index');
Route::get('/recipes/{recipe}', 'API\RecipeController@show');


Route::get('/tags', 'API\TagController@index');
Route::get('tags/{id}/recipes', 'API\TagController@findRecipes');

