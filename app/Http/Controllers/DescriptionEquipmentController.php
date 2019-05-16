<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Description;

class DescriptionEquipmentController extends Controller
{
    public function detach($description_id, $equipment_id)
    {

        $description = Description::find($description_id);

        $description->equipments()->detach($equipment_id);

        if ($description)
        {
            return redirect('descriptions/' . $description_id)->with(['success' => 'Detach was successful']);
        }
        else
        {
            return back()->with(['message' => 'Error not detached!']);
        }

    }

    public function attach(\Illuminate\Http\Request $request, $description_id)
    {
        $description = Description::find($description_id);
        
        $equipment_id = $request->get("equipment_id");

        if (! $description->equipments()->syncWithoutDetaching([$equipment_id]))
        {
            $description->equipments()->attach($equipment_id);
        }

        if ($description)
        {
            return redirect('descriptions/' . $description_id)->with(['success' => 'Attach was successful']);
        }
        else
        {
            return back()->with(['message' => 'Error not atached!']);
        }

    }
}
