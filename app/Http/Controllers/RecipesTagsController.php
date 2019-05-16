<?php

namespace App\Http\Controllers;
use App\Recipe;

use Illuminate\Http\Request;

class RecipesTagsController extends Controller
{
    public function detach($recipe_id, $tag_id)
    {

        $recipe = Recipe::find($recipe_id);

        $recipe->tags()->detach($tag_id);

        if ($recipe) 
        {
            return back()->with(['message' => 'Detach was successful']);
        } 
        else 
        {
            return back()->with(['message' => 'Error not detached!']);
        }

    }

        public function attach(\Illuminate\Http\Request $request, $recipe_id)
    {
        $recipe = Recipe::find($recipe_id);

        $tag_id = $request->get("tag_id");

        if (! $recipe->tags()->syncWithoutDetaching([$tag_id]))
        {
            $recipe->tags()->attach($tag_id);
        }

        if ($recipe) 
        {
            return redirect('recipes/' . $recipe_id)->with(['message' => 'Attach was successful']);
        } 
        else
        {
            return back()->with(['message' => 'Error not atached!']);
        }

    }
}
