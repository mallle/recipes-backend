<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingredient;
use App\Tag;
use App\Recipe;
use App\RecipeIngredients;
use App\Description;
use App\Equipment;
use App\Validation\ValidateRecipeRequest;

class RecipeController extends Controller
{

    use Validation\ValidateRecipeRequest;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::orderBy('name')->get();

        return view('recipes.index', [
            'recipes' => $recipes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ingredients = Ingredient::orderBy('name')->get();

        return view('recipes.create', [
            'ingredients' => $ingredients,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validateRequest($request);

        $recipe = new Recipe;

        $recipe->name = $request->get('name');
        $recipe->persons = $request->get('persons');
        $recipe->preparationtime = $request->get('preparationtime');
        $recipe->resttime = $request->get('resttime');
        $recipe->bakingtime = $request->get('bakingtime');
        $recipe->effort = $request->get('effort');
        
        $image = $request->file('image');
        $filename = str_replace(' ', '', strtolower($recipe->name) . '.jpg');  
        $image->move($recipe->getRecipePath(), $filename);
        $recipe->image = $filename;

        $recipe->save();

        return redirect('recipes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipe = Recipe::find($id);
        $descriptions = $recipe->descriptions()->orderBy('descriptionnumber')->get();
        $tags = Tag::orderBy('name')->get();
        $equipments = Equipment::orderBy('name')->get();
        $ingredients = Ingredient::orderBy('name')->get();

        return view('recipes.show', [
            'recipe' => $recipe,
            'descriptions' => $descriptions,
            'tags' => $tags,
            'equipments' => $equipments,
            'ingredients' => $ingredients
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recipe = Recipe::find($id);

        return view('recipes.edit', [
            'recipe' => $recipe
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $this->validateRequest($request);

        $recipe = Recipe::find($id);

        if(!$recipe)
        {
            return back()->with(['error', 'Ingredient not found']);
        } 

        else
        {  
            $recipe->name = $request->get('name');
            $recipe->persons = $request->get('persons');
            $recipe->preparationtime = $request->get('preparationtime');
            $recipe->resttime = $request->get('resttime');
            $recipe->bakingtime = $request->get('bakingtime');
            $recipe->effort = $request->get('effort');
            
            if($request->has('image'))
            {
                $image = $request->file('image');
                $filename = str_replace(' ', '', strtolower($recipe->name) . '.jpg');  
                $image->move($recipe->getRecipePath(), $filename);
                $recipe->image = $filename;
            }
            
            $recipe->update();

            if($recipe)
            {
                return redirect('recipes/' . $recipe->id)->with(['success' => 'Recipe was updated']);
            } 
            else
            {
                return back()->with(['error' => 'Recipe was not updated']);
            }
        }

        return redirect();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipe = Recipe::find($id);
        

        if(!$recipe)
        {
            return back()->with(['error' => 'Recipe not found']);
        }

        $recipe->delete();

        return redirect('recipes')->with(['success' => 'Recipe was deleted']);
    }
}
