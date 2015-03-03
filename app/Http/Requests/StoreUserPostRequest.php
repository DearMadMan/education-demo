<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreUserPostRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return false;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name'=>'required|min:6|unique:users',
			'email'=>'required|email|unique:users',
			'password'=>'required|min:6',
			'repassword'=>'required|min:6',
			'qq'=>'sometimes|numeric'
		];
	}

}
