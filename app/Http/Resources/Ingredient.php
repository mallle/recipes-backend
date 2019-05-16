<?php

namespace App\Http\Resources;

use App\RecipeIngredients;
use App\Recipe;
use Illuminate\Http\Resources\Json\Resource;


class Ingredient extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'name' => $this->name,
            'amount_per_person' => $this->pivot->amount,
            'type' => RecipeIngredients::getType($this->pivot->type),
          ];


    }
}
