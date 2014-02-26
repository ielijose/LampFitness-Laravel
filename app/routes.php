<?php

Route::get('/', ['uses' => 'HomeController@index', 'before' => 'auth']);

Route::get('/login', ['uses' => 'HomeController@login'] );
Route::post('/login', ['uses' => 'AuthController@doLogin', 'before' => 'guest']);
Route::get('/logout', ['uses' => 'AuthController@doLogout', 'before' => 'auth']);



Route::get('/clientes', function(){
    $clientes = Userinfo::all();
    return View::make('clientes', array('clientes' => $clientes));
});

Route::get('/clientes/imprimir', function(){
    $clientes = Userinfo::orderBy(DB::raw("CAST(Userid AS DECIMAL)"), 'ASC')->get();
    return View::make('clientes-imprimir', array('clientes' => $clientes));
});


View::composer('includes.header', function($view)
{
    $cumples = DB::table('Userinfo')
    ->select('Userid', 'Name', 
        DB::raw('DATEDIFF(Brithday + INTERVAL (YEAR (CURRENT_TIMESTAMP) - YEAR (Brithday)) +0 YEAR, CURDATE()) as dias, YEAR(CURRENT_TIMESTAMP) - YEAR (Brithday) as anos')
        )
    ->whereRaw('DATEDIFF(Brithday + INTERVAL (YEAR (CURRENT_TIMESTAMP) - YEAR (Brithday)) +0 YEAR, CURDATE()) = 0 ')
    ->orderBy('dias', 'asc')
    ->get();

    $vencidos = Userinfo::where('FecCorte', 'LIKE', date('Y-m-d') .'%')->get();

    $view->with(array('cumples'=> $cumples, 'vencidos' => $vencidos));
});

Route::get('/cliente/{id}', function($id){
    $cliente = Userinfo::where('Userid', '=', $id)->get()[0];
    $pagos = Pagos::where('Codigo', '=', $id)->get();   

   //dd( $cliente->getRestante());

    return View::make('cliente', array('cliente' => $cliente, 'pagos' => $pagos));
});


Route::get('/planes', ['uses' => 'PlanController@index', 'before' => 'auth']);
Route::post('/plan', ['uses' => 'PlanController@post_plan', 'before' => 'auth']);
