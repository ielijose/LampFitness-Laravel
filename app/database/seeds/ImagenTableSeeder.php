<?php

class ImagenTableSeeder extends Seeder {

    public function run()
    {
        DB::table('imagenes')->delete();

        Imagen::create(
        	array(
        		'imagen' => 'uploads/productos/1.png',
        		'producto_id' => '1',
        	)
        );

        Imagen::create(
            array(
                'imagen' => 'uploads/productos/2.png',
                'producto_id' => '1',
            )
        );

         Imagen::create(
            array(
                'imagen' => 'uploads/productos/3.png',
                'producto_id' => '1',
            )
        );

          Imagen::create(
            array(
                'imagen' => 'uploads/productos/4.png',
                'producto_id' => '1',
            )
        );

    }

}