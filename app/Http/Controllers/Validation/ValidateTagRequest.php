<?php

namespace App\Http\Controllers\Validation;

trait ValidateTagRequest{

	protected function validateRequest($request)
	{
		$request->validate([
            'name' => 'required|unique:tags',
            'type' => 'required',
        ]);
	}
}