<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Recipe;
use App\Equipment;

class Equipment extends Model
{
    public function recipes()
    {
    	return $this -> belongsToMany('\App\Recipe', 'recipe_equipment', 'equipment_id', 'recipe_id');
    }

    public function descriptions()
    {
    	return $this -> belongsToMany('\App\Description', 'description_equipment', 'description_id', 'equipment_id');
    }
}
