<?php

class Item extends Base {

	protected $owner = NULL;
	protected $effect = array();
	protected $type = 'item';

	public function __construct(&$owner = NULL){
		if($owner){
			$this->owner = $owner;
			$this->owner->take_item($this);
		}
	}

	public function give($to,&$from = NULL){

		$this->owner = $to;

	}
	public function get_owner(){
		return $this->owner;
	}
	public function get_type(){
		return $this->type;
	}
	public function get_effect(){
		return $this->effect;
	}
	
}