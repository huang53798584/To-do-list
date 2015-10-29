<?php

class AuthController extends \BaseController {

	public function getLogin(){
		return View::make('login');
	}

	public function postLogin(){
		$rules = [
			'email' => 'required',
			'password' => 'required'
		];
		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			return Redirect::to('login')->withErrors($validator);
		}

		$credentials = array(
			'email' => Input::get('email'),
			'password' => Input::get('password'),
		);

		if(Auth::attempt($credentials)) {
			return Redirect::intended('/');
		}else{
			return Redirect::back()->withErrors('Incorrect login')->withInput();
		}

	}

}
