<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getIndex()
	{
		$items = Auth::user()->items;
		return View::make('home', compact('items'));
	}

	public function postIndex()
	{
		$id = Input::get('id');
		$item = Item::findOrFail($id);

		if($item->user_id == Auth::user()->id){
			$item->mark();
		}
		return Redirect::route('home');
	}

	public function getNew(){
		return View::make('new');
	}

	public function postNew(){
		$rules = ['name' => 'required|max:255|min:3|unique:items'];
		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			return Redirect::to('new')->withErrors($validator);
		}

		$item = new Item;
		$item->user_id = Auth::user()->id;
		$item->name = Input::get('name');
		$item->save();

		return Redirect::route('home');
	}

	public function getDelete($item_id){
		$task = Item::findOrFail($item_id);

		if($task->user_id == Auth::user()->id){
			$task->delete();
		}

		return Redirect::route('home');
	}
}
