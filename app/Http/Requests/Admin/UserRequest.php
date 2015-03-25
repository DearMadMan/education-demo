<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class UserRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
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
			'name'=>'required|unique:users|max:255',
			'email'=>'required|email|unique:users|max:255',
			'nick_name'=>'max:255',
			'password'=>'required|max:255',
			'repassword'=>'required|max:255',
			'user_type_id'=>'numeric',
			'qq'=>'numeric',
			'address'=>'max:255',
			'phone'=>'numeric',
			'wechat'=>'max:255',
			'alipay'=>'max:255',
			'score'=>'numeric'
		];
	}

}
