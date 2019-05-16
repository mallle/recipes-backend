<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Recipe;
use App\Ingredient;
use App\Equipment;

class Description extends Model
{
	public function recipe()
	{
		return $this->belongsTo('App\Recipe');
	}

	public function ingredients()
    {
    	return $this -> belongsToMany('\App\Ingredient', 'description_ingredient', 'description_id', 'ingredient_id')->withPivot('amount', 'type');
    }

    public function equipments()
    {
    	return $this -> belongsToMany('\App\Equipment', 'description_equipment', 'description_id', 'equipment_id');
    }
    
}
