<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Recipe;

class Tag extends Model
{

	const TYPE_CATEGORY = 1;
    const TYPE_PREPERATION = 2;
    const TYPE_TIME = 3;
    const TYPE_MEET = 4;

    public function recipes()
    {
    	return $this->belongsToMany('\App\Recipe', 'recipe_tag', 'tag_id', 'recipe_id');
    }

    public function getType()
    {
    	switch ($this->type) 
    	{
    		case static::TYPE_CATEGORY:
    			return 'Category';
    		case static::TYPE_PREPERATION:
    			return 'Preperation';
    		case static::TYPE_TIME:
    			return 'Time';
    		case static::TYPE_MEET:
    			return 'Meet';
    		default:
    			return 'undefined';
    	}
    }
}
