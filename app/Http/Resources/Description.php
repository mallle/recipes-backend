<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\Http\Resources\Equipment as EquipmentResource;
use App\Http\Resources\Ingredient as IngredientResource;

class Description extends Resource
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

        return  [
            'id' => $this->descriptionnumber,
            'descriptionnumber' => $this->descriptionnumber,
            'description' => $this->description,
            'equipment' => EquipmentResource::collection($this->equipments),
            'ingredients' => IngredientResource::collection($this->ingredients)
          ];
    }
}
