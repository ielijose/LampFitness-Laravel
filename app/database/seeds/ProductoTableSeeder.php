<?php

class ProductoTableSeeder extends Seeder {

    public function run()
    {
        DB::table('productos')->delete();

        Producto::create(
        	array(
                'id' => 1,
        		'nombre' => 'Producto 1',
        		'precio' => '50',
        		'descripcion' => 'Descripción del producto',
                'categoria_id' => '1'
        	)
        );

        Producto::create(
            array(
                'id' => 2,
                'nombre' => 'Producto 2',
                'precio' => '500',
                'descripcion' => 'Descripción del producto',
                'categoria_id' => '1'
            )
        );

    }

}