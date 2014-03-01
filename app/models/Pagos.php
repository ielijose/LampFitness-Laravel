<?php

class Pagos extends Eloquent {

	protected $table = 'pagos';
	public $timestamp = false;	

	public function getFecha(){
		$date = new DateTime($this->Fecha);
    	return $this->translate($date->format('d F Y'));
	}

	public function translate($string){
	    $mes_ingles=array("January","February","March","April","May","June","July","August","September","October","November","December"); 
	    $mes_espanol=array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); 

	    return str_replace($mes_ingles, $mes_espanol, $string);
	}

	public function cliente(){
		return $this->BelongsTo('Userinfo', 'Codigo', 'Userid');
	}

}