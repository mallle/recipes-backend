<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\Http\Resources\Description as DescriptionResource;
use App\Http\Resources\Ingredient as IngredientResource;
use App\Http\Resources\Tag as TagResource;
use App\Http\Resources\Equipment as EquipmentResource;

class Recipe extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return [
                'id' => $this->id,
        		'name' => $this->name,
                'persons' => $this->persons,
                'total' => $this->totalPreparationtime(),
                'preparationtime' => $this->preparationtime,
                'resttime' => $this->resttime,
                'bakingtime' => $this->bakingtime,
                'effort' => $this->effort,
                'image' => url('/storage/recipes/' . $this->image),
                'descriptions' => DescriptionResource::collection($this->descriptions),
                'ingredients' => IngredientResource::collection($this->ingredients),
                'tags' => TagResource::collection($this->tags),
                'equipment' => EquipmentResource::collection($this->equipments)
        ];
    }
}
