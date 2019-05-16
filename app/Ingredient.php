<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Recipe;
use App\Description;

class Ingredient extends Model
{

    public function recipes()
    {
    	return $this -> belongsToMany('\App\Recipe', 'ingredient_recipe', 'ingredient_id', 'recipe_id')->withPivot('amount', 'type');
    }

    public function descriptions()
    {
    	return $this -> belongsToMany('\App\Description', 'description_ingredient', 'description_id', 'ingredient_id')->withPivot('amount', 'type');
    }

}
