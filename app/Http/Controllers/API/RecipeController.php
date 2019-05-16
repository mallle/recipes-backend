<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Recipe;
use App\Tag;
use App\Http\Resources\Recipe as RecipeResource;

class RecipeController extends Controller

{

    public function index(){

        $recipes = Recipe::latestFirst()->paginate(5);

        return RecipeResource::collection($recipes);

    }

    public function show(Recipe $recipe) {

        return new RecipeResource($recipe);

    }

    public function tags(Request $request){

        $this->validate($request, [
           'name' => 'alpha'
        ]);
        $tag = Tag::where('name', '=', $request->get('name'))->first();

        $recipes = $tag->recipes()->get();

        return RecipeResource::collection($recipes);

    }


    public function find()
    {
//        $data = [];
//
//        $recipes = Recipe::orderBy('name')->get();
//
//		// return $categories;
//
//        foreach($recipes as $recipe)
//        {
//            $ingredients = [];
//            foreach ($recipe->ingredients as $ingredient) {
//                  $ingredients[] = [
//                    'name' => $ingredient->name,
//                    'amount' => $ingredient->pivot->amount,
//                    'type' => $ingredient->pivot->type,
//                  ];
//            }
//
//            $descriptions = [];
//            foreach ($recipe->descriptions()->orderBy('descriptionnumber')->get() as $description) {
//                  $descriptions[] = [
//                    'descriptionnumber' => $description->descriptionnumber,
//                    'description' => $description->description,
//                  ];
//            }
//
//        	$data[] = [
//        		'id' => $recipe->id,
//        		'name' => $recipe->name,
//                'persons' => $recipe->persons,
//                'preparationtime' => $recipe->preparationtime,
//                'resttime' => $recipe->resttime,
//                'bakingtime' => $recipe->bakingtime,
//                'effort' => $recipe->effort,
//                'image' => url('/storage/recipes/' . $recipe->image),
//                'descriptions' => $descriptions,
//                'ingredients' => $ingredients,
//                'tags' => $recipe->tags
//        	];
//
//        }
        
//        return  $data;
    }

}
