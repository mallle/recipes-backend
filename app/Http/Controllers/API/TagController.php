<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;
use App\Http\Resources\Tag as TagResource;
use App\Http\Resources\Recipe as RecipeResource;

class TagController extends Controller
{
    public function index(){

        $tag = Tag::all();

        return TagResource::collection($tag);

    }

    public function findRecipes(Request $request, $id){

        $tag = Tag::find($id);

        $recipes = $tag->recipes()->get();

        return RecipeResource::collection($recipes);
    }
}
