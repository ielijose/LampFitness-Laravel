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
        		'password' => Hash::make('1234')
        	)
        );

         Usuario::create(
            array(
                'id' => 2,
                'nombre' => 'Luis Padron',
                'username' => 'lp',
                'password' => Hash::make('1234')
            )
        );

    }

}