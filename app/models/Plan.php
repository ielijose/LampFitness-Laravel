<?php

class Plan extends Eloquent {

	protected $table = 'planes';
	public $timestamp = true;

	public function plan(){
		return '<span class="label label-' . $this->color . '">' .  $this->nombre . '</span>';
	}
	
}