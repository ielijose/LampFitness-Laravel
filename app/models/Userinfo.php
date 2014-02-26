<?php
use Carbon\Carbon;

class Userinfo extends Eloquent {

	protected $table = 'Userinfo';


	public function status()
	{	
		$status = '';
		switch ($this->UserFlag) {
			case 2:
				$status = '<span class="label label-info">Activo</span>';
				break;
			case 3:
				$status = '<span class="label label-warning">Inactivo</span>';
				break;			
			default:
				$status = 'ERROR';
				break;
		}
		if($this->getCaducado()){
			$status = '<span class="label label-danger">Caducado</span>';
		}
		return $status;
	}

	public function plan()
	{	
		return $this->hasOne('Plan', 'id', 'Duty');
	}

	public function getCumple(){
		$date = new DateTime($this->Brithday);
    	return $this->translate($date->format('d F Y'));
	}

	public function getToday(){
		$date = new DateTime($this->Brithday);
		return ($date->format('d F') == date('d F')) ? '<span class="label label-success">Hoy</span> ' : '' ;
	}

	public function getEdad(){
		$date = new DateTime($this->Brithday);
   		$fecha = $date->format('Y-m-d');		
	    list($Y,$m,$d) = explode("-",$fecha);
	    return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
	}

	public function getInicio(){
		$date = new DateTime($this->EmployDate);
    	return $this->translate($date->format('d F Y'));
	}
	public function getCorte(){
		$date = new DateTime($this->FecCorte);
    	return $this->translate($date->format('d F Y'));
	}

	public function getAntiguedad(){
		$date = new DateTime($this->EmployDate);

		$datetime1 = new DateTime($date->format('Y-m-d'));
	    $datetime2 = new DateTime();
	    $interval = $datetime1->diff($datetime2);
	    $interval->format('%R');
	    return $interval->days;
	}

	public function getRestante(){
		$date = new DateTime($this->FecCorte);

		$datetime1 = new DateTime();
	    $datetime2 = new DateTime($date->format('Y-m-d'));
	    $datetime2->add(new DateInterval('P1D'));
	    $interval = $datetime1->diff($datetime2);

	    return $interval->format('%R%a');
	    return $interval->days;
	}

	public function getCaducado(){	
		if($this->getRestante() <= -60){
			DB::table('userinfo')
	            ->where('Userid', $this->Userid)
	            ->update(array('UserFlag' => 3));
			return true;		
		}
		return false;
	}

	public function getActivo(){
		if($this->UserFlag == 2 && $this->getRestante() <= 0 ){
			$this->cortar();
		}		
		return ($this->UserFlag == 2 && !$this->getCaducado());
	}

	public function cortar(){
		if($this->getRestante() <= 0){
			$this->UserFlag = 3;
			return true;
		}
		return false;
	}

	public function getIntervalo(){
	    return $this->getRestante() + $this->getAntiguedad();
	}

	public function translate($string){
	    $mes_ingles=array("January","February","March","April","May","June","July","August","September","October","November","December"); 
	    $mes_espanol=array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); 

	    return str_replace($mes_ingles, $mes_espanol, $string);
	}
}