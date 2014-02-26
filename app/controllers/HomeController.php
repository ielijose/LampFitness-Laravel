<?php

class HomeController extends BaseController {

	public function index()
	{
		$this->cortar();

		$estadisticas = array();

	    $estadisticas['activos'] =  Userinfo::where('UserFlag', '=', 2)->get();  
	    $estadisticas['caducados'] =  DB::table('Userinfo')->where(DB::raw('DATEDIFF(FecCorte, CURDATE())'), '<', '-60')->get() ;
	    $estadisticas['all'] = Userinfo::all();
	    $estadisticas['inactivos'] =  Userinfo::where('UserFlag', '=', 3)->get();
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
	    return View::make('login');
	}

	private function cortar(){
		$clientes = Userinfo::all();

		foreach ($clientes as $key => $cliente) {
			if($cliente->getRestante() < 0){
				//dd($cliente);
			}
		}
	}

}