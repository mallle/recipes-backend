<?php

namespace App\Http\Controllers\Validation;

trait ValidateDescriptionRequest{

	protected function validateRequest($request)
	{
		$request->validate([
            'descriptionnumber' => 'required|integer',
            'description' => 'required',
        ]);
	}
}