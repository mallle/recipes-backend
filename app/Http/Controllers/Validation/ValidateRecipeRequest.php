<?php

namespace App\Http\Controllers\Validation;

trait ValidateRecipeRequest{

	protected function validateRequest($request)
	{
		$request->validate([
            'name' => 'required',
            'persons' => 'required',
            'preparationtime' => 'required|integer',
            'resttime' => 'required|integer',
            'bakingtime' => 'required|integer',
            'effort' => 'required',
            'image' => 'nullable',
        ]);
	}
}
