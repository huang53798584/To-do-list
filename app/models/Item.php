<?php

class Item extends Eloquent {

	public function user(){
		return $this->belongsTo('User');
	}

	public function mark(){

		$this->done = $this->done ? false : true;
		$this->save();
	}
}
