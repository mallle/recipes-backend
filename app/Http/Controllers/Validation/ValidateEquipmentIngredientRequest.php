<?php

namespace App\Http\Controllers\Validation;

trait ValidateEquipmentIngredientRequest{

	protected function validateRequest($request)
	{
		$request->validate([
            'name' => 'required|unique:equipment|unique:ingredients',
        ]);
	}
}
