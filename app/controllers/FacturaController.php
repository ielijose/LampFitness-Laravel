<?php

class FacturaController extends BaseController {

    public function post_facturar()
    {
        $inputs = Input::all();

        $cliente = Userinfo::where('Userid', '=', Input::get('id'))->get()[0];

        if(intval($cliente->getRestante()) < 0){
             $fecha = new DateTime();
        }else{
             $fecha = new DateTime($cliente->FecCorte);
        }
        


        $fecha->add(new DateInterval('P1M'));

        DB::table('userinfo')
                ->where('Userid', $cliente->Userid)
                ->update(array( 'FecCorte' => $fecha->format('Y-m-d'), 
                                'Duty' => Input::get('plan'), 
                                'UserFlag' => 2)
                );

        /* */
        $descripcion = Input::get('documento');
        if(strlen(Input::get('documento')) == 0){
            $descripcion = 'Pago de mensualidad.';
            if(Input::get('inscripcion') == 1){
                $descripcion = 'Pago de mensualidad e inscripción.';
            }
        }

        $pago = new Pagos;
        $pago->Codigo = $cliente->Userid;
        $pago->Descripcion = $descripcion;
        $pago->Monto = Input::get('total');
        $pago->Fecha = date("Y-m-d H:i:s");
        $pago->Modo = Input::get('pago');
        $pago->NDocumento = Input::get('documento');
        $pago->Plan = Input::get('plan');
        $pago->save();
        
        return Redirect::to('/cliente/' . $cliente->Userid);
    }

    public function get_facturar($id){
        $pago = Pagos::find($id);

        $plan = Plan::find($pago->Plan);
        if(isset($plan->nombre))
        $pago->Plan = $plan->nombre;


        $cliente = Userinfo::where('Userid', '=', $pago->Codigo)->get()[0];
        return View::make('invoice', array('pago' => $pago, 'cliente' => $cliente));
    }

}