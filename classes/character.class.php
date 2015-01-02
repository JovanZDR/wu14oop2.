<?php

class Character extends Base {

	protected $name;

	protected $shoot;
	protected $layup;
	protected $rebound;
	protected $defence;

	protected $items = array();

	protected $success = 50;

	public function __construct ($name){
		$this->name = $name;
	}

	public function greet(){
		echo "Hi! My name is". $this->name;
	}

	public function take_item(&$item){
		if(count($item) < 4){
		$this->give($item);
		$this->items[] = $item;
		return $this->name."got".get_class($item);
		}
		else{
		return $this->name."already has three items, can not have more";
		}
	}

	public function get__name(){
		return $this->name;
	}
	public function get__shoot(){
		return $this->shoot;
	}
	public function get__layup(){
		return $this->layup;
	}
	public function get__rebound(){
		return $this->rebound;
	}
	public function get__defence(){
		return $this->defence;
	}
	public function get__items(){
		return $this->items;
	}
	public function get__success(){
		return $this->success;
	}
}
