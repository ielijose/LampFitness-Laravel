<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		/*$this->call('CategoriaTableSeeder');
		$this->call('ProductoTableSeeder');
		$this->call('ImagenTableSeeder');

		$this->call('DetalleTableSeeder');

		$this->call('ComentarioTableSeeder');*/

		$this->call('UsuarioTableSeeder');

	}

}