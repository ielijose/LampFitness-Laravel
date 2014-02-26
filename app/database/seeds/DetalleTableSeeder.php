<?php

class DetalleTableSeeder extends Seeder {

    public function run()
    {
        DB::table('detalles')->delete();

        Detalle::create(
        	array(
        		'detalle' => 'Detalle 1 ',
        		'producto_id' => '1',
        	)
        );

        Detalle::create(
            array(
                'detalle' => 'Detalle 2 ',
                'producto_id' => '1',
            )
        );

        Detalle::create(
            array(
                'detalle' => 'Detalle 3 ',
                'producto_id' => '1',
            )
        );

        Detalle::create(
            array(
                'detalle' => 'Detalle 4 ',
                'producto_id' => '1',
            )
        );

    }

}