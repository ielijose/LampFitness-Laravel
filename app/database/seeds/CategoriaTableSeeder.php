<?php

class CategoriaTableSeeder extends Seeder {

    public function run()
    {
        DB::table('categorias')->delete();

        Categoria::create(
        	array(
                'id' => 1,
        		'nombre' => 'Accesorios',
        	)
        );

        Categoria::create(
        	array(
                'id' => 2,
        		'nombre' => 'Repuestos',
        	)
        );

        Categoria::create(
        	array(
                'id' => 3,
        		'nombre' => 'Lentes',
        	)
        );

        Categoria::create(
        	array(
                'id' => 4,
        		'nombre' => 'Carteras',
        	)
        );

    }

}