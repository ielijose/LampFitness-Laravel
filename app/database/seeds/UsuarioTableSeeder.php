<?php

class UsuarioTableSeeder extends Seeder {

    public function run()
    {
        DB::table('usuarios')->delete();

        Usuario::create(
        	array(
                'id' => 1,
        		'nombre' => 'Eli José Carrasquero',
        		'username' => 'ielijose',
        		'password' => Hash::make('1234'),
                'admin' => true
        	)
        );

         Usuario::create(
            array(
                'id' => 2,
                'nombre' => 'Usuario',
                'username' => 'user',
                'password' => Hash::make('1234'),
                'admin' => false
            )
        );

    }

}