<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware'=>'auth'], function(){
	
	//tag 
	Route::get('/tags', 'TagController@create')->name('tag.create');
	Route::post('/tags/store', 'TagController@store')->name('tags.store');
	Route::get('/tags/{tag_id}/edit', 'TagController@edit');
	Route::patch('/tags/{id}', 'TagController@update');
	Route::delete('/tags/{id}', 'TagController@destroy');

	//Ingredients
	Route::get('/ingredients', 'IngredientController@create')->name('ingredient.create');
	Route::post('/ingredients/store', 'IngredientController@store')->name('ingredient.store');
	Route::get('/ingredients/{ingredients_id}/edit', 'IngredientController@edit');
	Route::patch('/ingredients/{id}', 'IngredientController@update');
	Route::delete('/ingredients/{id}', 'IngredientController@destroy');

	//Recipes 
	Route::get('recipes/', 'RecipeController@index')->name('recipes');
	Route::get('/recipes/create', 'RecipeController@create')->name('recipes.create');
	Route::get('/recipes/{id}', 'RecipeController@show');
	Route::post('/recipes/store', 'RecipeController@store')->name('recipes.store');
	Route::get('/recipes/{tag_id}/edit', 'RecipeController@edit');
	Route::patch('/recipes/{id}', 'RecipeController@update');
	Route::delete('/recipes/{id}', 'RecipeController@destroy');

	//Equipments
	Route::get('/equipments', 'EquipmentController@create')->name('equipments.create');
	Route::post('/equipments/store', 'EquipmentController@store')->name('equipments.store');
	Route::get('/equipments/{equipment_id}/edit', 'EquipmentController@edit');
	Route::patch('/equipments/{id}', 'EquipmentController@update');
	Route::delete('/equipments/{id}', 'EquipmentController@destroy');

	//Descriptions
	Route::post('/descriptions/store/{recipe_id}', 'DescriptionController@store');
	Route::get('/descriptions/{id}', 'DescriptionController@show');
	Route::get('/descriptions/{id}/edit', 'DescriptionController@edit');
	Route::patch('/descriptions/{id}', 'DescriptionController@update');
	Route::delete('/descriptions/{id}', 'DescriptionController@destroy');

	//RecipeTag
	Route::post('/recipes/{recipe_id}/attach_tag', 'RecipesTagsController@attach');
	Route::delete('/recipes/{recipe_id}/detach_tag/{tag_id}', 'RecipesTagsController@detach');

	//RecipeIngredient
	Route::post('/recipes/{recipe_id}/attach_ingredient', 'RecipesIngredientsController@attach');
	Route::delete('/recipes/{recipe_id}/detach_ingredient/{ingredient_id}', 'RecipesIngredientsController@detach');

	//RecipeEquipment
	Route::post('/recipes/{recipe_id}/attach_equipment', 'EquipmentRecipeController@attach');
	Route::delete('/recipes/{recipe_id}/detach_equipment/{equipment_id}', 'EquipmentRecipeController@detach');


	//DescriptionsIngredients
	Route::post('/descriptions/{recipe_id}/attach_ingredient', 'DescriptionIngredientController@attach');
	Route::delete('/descriptions/{recipe_id}/detach_ingredient/{ingredient_id}', 'DescriptionIngredientController@detach');

	//DescriptionsEquipment
	Route::post('/descriptions/{recipe_id}/attach_equipment', 'DescriptionEquipmentController@attach');
	Route::delete('/descriptions/{recipe_id}/detach_equipment/{equipment_id}', 'DescriptionEquipmentController@detach');
});

Route::get('/{any}', 'FrontendController@index')->where('any', '.*');
