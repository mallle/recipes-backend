<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipment;

class EquipmentController extends Controller
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
        $equipments = Equipment::orderBy('name')->get();

        return view('equipments.create', [
            'equipments' => $equipments,
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

        $equipment = new Equipment;

        if(!$equipment)
        {
            return back()->with(['error', 'Equipment cannot be initialized']);
        } 
        else
        {
            $equipment->name = $request->get('name');

            $equipment->save();

            return back()->with(['success' => 'Equipment was added']);  
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
        $equipment = Equipment::find($id);

        return view('equipments.edit', [
            'equipment' => $equipment,
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

        $equipment = Equipment::find($id);

        if(!$equipment)
        {
            return back()->with(['error', 'Equipment not found']);
        } 
        else
        {  
            $equipment->name = $request->get('name');

            $equipment->update();

            if($equipment)
            {
                return redirect('/equipments')->with(['success' => 'Equipment was updated']);
            } 
            else
            {
                return back()->with(['error' => 'EquipmentControllerquipment was not updated']);
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
        $equipment = Equipment::find($id);

        if(!$equipment)
        {
            return back()->with(['error' => 'Equipment not found']);
        } 
        elseif($equipment)
        {
            $equipment->delete();
            return back()->with(['success' => 'Equipment was deleted']);
        } 
        else
        {
            return back()->with(['error' => 'Equipment was not deleted']);
        }
    }
}
