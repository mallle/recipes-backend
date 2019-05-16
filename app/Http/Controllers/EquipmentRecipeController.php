<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;


class EquipmentRecipeController extends Controller
{
    public function detach($recipe_id, $equipment_id)
    {

        $recipe = Recipe::find($recipe_id);

        $recipe->equipments()->detach($equipment_id);

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

        $equipment_id = $request->get("equipment_id");

        if (! $recipe->equipments()->syncWithoutDetaching([$equipment_id]))
        {
            $recipe->equipments()->attach($equipment_id);
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
