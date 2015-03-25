<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Session;

class StoreUserPostRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		Session::reflash();

		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name'=>'required|alpha_dash|min:6|unique:users',
			'email'=>'required|email|unique:users',
			'password'=>'required|min:6|confirmed',
			'qq'=>'sometimes|numeric'
		];
	}

}
