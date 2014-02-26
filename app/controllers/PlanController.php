<?php

class PlanController extends BaseController {
    
    public function index()
    {   
        $planes = Plan::all();

        return View::make('planes.index', array('planes' => $planes)); 
    }

    public function post_plan()
    {   
        $plan = new Plan;
        $plan->nombre = Input::get('nombre');
        $plan->inscripcion = Input::get('inscripcion');
        $plan->mensualidad = Input::get('mensualidad');
        $plan->save();

        return Redirect::to('/planes');  
    }

    public function post_password()
    {
        $inputs = Input::all();

        if($inputs['pass1'] == $inputs['pass2']){

            $usuario = Usuario::find(  Auth::user()->id  );
            $usuario->password = Hash::make(Input::get('pass1'));
            $usuario->save();

        }

        return Redirect::to('/panel/categorias');
    }
    
    public function dashboard()
    {   
        return Redirect::to('/panel/gamas');  
    }   

    public function categorias()
    {   
        $categorias = Categoria::all();
        return View::make('admin.categorias', array('categorias' => $categorias));  
    }  

    public function get_categoria($id)
    {   
        $categoria = Categoria::find($id);
        if($categoria){
            return View::make('admin.categoria', array('categoria' => $categoria));  
        }else{
            return Redirect::to('/panel/gamas');
        }
    } 

    public function post_categoria(){    
        $inputs = Input::all();

        $categoria = new Categoria;
        $categoria->nombre = Input::get('nombre');
        $categoria->save();

        return Redirect::to('/panel/gamas');             
    }

    public function get_nuevoproducto($id)
    {   
        $categoria = Categoria::find($id);
        if($categoria){
            return View::make('admin.productos.nuevo', array('categoria' => $categoria));
        }else{
            return Redirect::to('/panel/gamas');
        }          
    }

    public function post_nuevoproducto()
    {               
        $inputs = Input::all();
        $producto = new Producto();

        $producto->nombre = $inputs['nombre'];
        $producto->precio = $inputs['precio'];
        $producto->descripcion = $inputs['descripcion'];
        $producto->categoria_id = $inputs['categoria_id'];
        $producto->save();

        $detalles = explode(",", $inputs['detalles']);

        if(count($detalles)){
            foreach ($detalles as $key => $detalle) {
                $d = new Detalle();
                $d->detalle = $detalle;
                $d->producto_id = $producto->id;
                $d->save();
            }
        }

        $imagenes = Session::get('imgs');
        if(count($imagenes)){
            $destinationPath = '/uploads/productos/';
            foreach ($imagenes as $key => $imagen) {
                $i = new Imagen();
                $i->imagen = $destinationPath . $imagen;
                $i->producto_id = $producto->id;
                $i->save();
            }
            Session::forget('imgs');
        }
        return Redirect::to('/panel/categoria/' . $producto->categoria_id );
    }    

    public function borrar_categoria($id)
    {   
        Categoria::destroy($id);
    } 
    
    public function editar_categoria($id)
    {   
        $categoria = Categoria::find($id);
        if($categoria){
            return View::make('admin.editar-categoria', array('categoria' => $categoria));  
        }else{
            return Redirect::to('/panel/gamas');
        }
    }

    public function post_editar_categoria(){
        $inputs = Input::all();
        $id = Input::get('id');

        $categoria = Categoria::find($id);
        $categoria->nombre = Input::get('nombre');
       
        $categoria->save();   
        return Redirect::to('/panel/gamas');     
    }
}