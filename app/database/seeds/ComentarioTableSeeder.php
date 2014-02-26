<?php

class ComentarioTableSeeder extends Seeder {

    public function run()
    {
        DB::table('comentarios')->delete();

        Comentario::create(
        	array(
        		'nombre' => 'Nombre 1',
                'email' => 'Correo 1',
                'telefono' => 'Telefono 1 ',
                'comentario' => 'Comentario',
        		'producto_id' => '1',
        	)
        );

        Comentario::create(
            array(
                'nombre' => 'Nombre 2',
                'email' => 'Correo 2',
                'telefono' => 'Telefono 2 ',
                'comentario' => 'Comentario',
                'producto_id' => '1',
            )
        );

        Comentario::create(
            array(
                'nombre' => 'Nombre 3',
                'email' => 'Correo 3',
                'telefono' => 'Telefono 3 ',
                'comentario' => '"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."',
                'producto_id' => '1',
            )
        );

    }

}