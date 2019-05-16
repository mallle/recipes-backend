<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use App\Description;

class DescriptionController extends Controller
{
    use Validation\ValidateDescriptionRequest;
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $recipe_id)
    {
        $this->validateRequest($request);

        $description = new Description;

        if(!$description)
        {
            return back()->with(['error', 'Description cannot be initialized']);
        } 
        else
        {
            $description->description = $request->get('description');
            $descriptionnumber = rtrim($request->get('descriptionnumber'), '.');
            $description->descriptionnumber = $descriptionnumber;
            $description->recipe_id = $recipe_id;
            $description->save();

            return back()->with(['success' => 'Description was added']);  
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
        $description = Description::find($id);
        $recipe = $description->recipe;

        return view('descriptions.show', [
            'description' => $description,
            'recipe' => $recipe
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
        $description = Description::find($id);

        return view('descriptions.edit', [
            'description' => $description
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
        
        $description = Description::find($id);

        if(!$description)
        {
            return back()->with(['error', 'Description not found']);
        } 
        else
        {  
            $description->description = $request->get('description');
            $description->descriptionnumber = $request->get('descriptionnumber');
            $description->update();

            if($description)
            {
                return redirect('/recipes/' . $description->recipe_id)->with(['success' => 'Description was updated']);
            } 
            else
            {
                return back()->with(['error' => 'Description was not updated']);
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
        $description = Description::find($id);

        if(!$description)
        {
            return back()->with(['error' => 'Description not found']);
        } 
        elseif($description)
        {
            $description->delete();
            return back()->with(['success' => 'Description was deleted']);
        } 
        else
        {
            return back()->with(['error' => 'Description was not deleted']);
        }
    }
}
