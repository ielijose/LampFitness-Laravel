<?php

class HomeController extends BaseController {

	public function index()
	{
		$estadisticas = array();

	    $estadisticas['activos'] =  Userinfo::where('UserFlag', '=', 2)->orderBy('FecCorte', 'asc')->orderBy('Duty', 'desc')->get();  
	    $estadisticas['caducados'] =  DB::table('Userinfo')->whereRaw('DATEDIFF(FecCorte, CURDATE()) < -60 AND Duty = 1')->get() ;
	    $estadisticas['all'] = Userinfo::all();
	    $estadisticas['inactivos'] =  Userinfo::where('UserFlag', '=', 3)->orderBy('FecCorte', 'desc')->get();
	    //$estadisticas['vencer'] =  DB::table('Userinfo')->where(DB::raw('DATEDIFF(FecCorte, CURDATE())'), '<', '7')->get() ;
	    $estadisticas['vencer'] =  
	    Userinfo::select('*', DB::raw('DATEDIFF(FecCorte, CURDATE()) as dias'))
	    ->whereRaw('DATEDIFF(FecCorte, CURDATE()) BETWEEN 0 AND 7 AND UserFlag = 2')
	    ->orderBy('dias')->get() ;
	   

	    $estadisticas['cumple'] = DB::table('Userinfo')
	    ->select('Userid', 'Name', 
	        DB::raw('DATEDIFF(Brithday + INTERVAL (YEAR (CURRENT_TIMESTAMP) - YEAR (Brithday)) +0 YEAR, CURDATE()) as dias, YEAR(CURRENT_TIMESTAMP) - YEAR (Brithday) as anos')
	        )
	    ->whereRaw('DATEDIFF(Brithday + INTERVAL (YEAR (CURRENT_TIMESTAMP) - YEAR (Brithday)) +0 YEAR, CURDATE()) BETWEEN 0 AND 7 ')
	    ->orderBy('dias', 'asc')
	    ->get();

	    return View::make('index', array('estadisticas' => $estadisticas));
	}

	public function login()
	{
		$this->cortar();
	    return View::make('login');
	}

	private function cortar(){
		$clientes = Userinfo::all();

		foreach ($clientes as $key => $cliente) {
			if($cliente->Duty == 3 && $cliente->UserFlag == 3){
				DB::table('userinfo')->where('Userid', $cliente->Userid)->update(array('UserFlag' => 2));
			}

			if($cliente->getRestante() < 0){
				if($cliente->UserFlag == 2 && $cliente->Duty != 3){
					DB::table('userinfo')->where('Userid', $cliente->Userid)->update(array('UserFlag' => 3));
				}				
			}else{
				if($cliente->UserFlag == 3){
					DB::table('userinfo')->where('Userid', $cliente->Userid)->update(array('UserFlag' => 2));
				}
			}
		}
	}

	public function caja(){
		$pagos = Pagos::where('Fecha', 'LIKE', date('Y-m-d'). '%')->get();
    	return View::make('caja', array('pagos' => $pagos));	
	}

}