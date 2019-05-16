<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingredient;

class IngredientController extends Controller
{
    use Validation\ValidateEquipmentIngredientRequest;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $ingredients = Ingredient::orderBy('name')->get();

        return view('ingredients.create', [
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

        $ingredient = new Ingredient;

        if(!$ingredient)
        {
            return back()->with(['error', 'Ingredient cannot be initialized']);
        } 
        else
        {
            $ingredient->name = $request->get('name');

            $ingredient->save();

            return back()->with(['success' => 'Ingredient was added']);  
        }        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ingredient = Ingredient::find($id);

        return view('ingredients.edit', [
            'ingredient' => $ingredient,
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
        
        $ingredient = Ingredient::find($id);

        if(!$ingredient)
        {
            return back()->with(['error', 'Ingredient not found']);
        } 
        else
        {  
            $ingredient->name = $request->get('name');

            $ingredient->update();

            if($ingredient)
            {
                return redirect('/ingredients')->with(['success' => 'Ingredient was updated']);
            } 
            else
            {
                return back()->with(['error' => 'Ingredient was not updated']);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ingredient = Ingredient::find($id);

        if(!$ingredient)
        {
            return back()->with(['error' => 'Ingredient not found']);
        } 
        elseif($ingredient)
        {
            $ingredient->delete();
            return back()->with(['success' => 'Ingredient was deleted']);
        } 
        else
        {
            return back()->with(['error' => 'Ingredient was not deleted']);
        }
    }
}
