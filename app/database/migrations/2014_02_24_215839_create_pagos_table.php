<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pagos', function($table)
	    {
	        $table->increments('id');
	        $table->integer('userid')->unsigned()->nullable();
	        $table->string('descripcion');
	        $table->string('monto');
	        $table->string('modo');
	        $table->string('documento');
	        $table->integer('plan')->unsigned()->nullable();
	        $table->foreign('plan')->references('id')->on('planes');
	        $table->timestamps();
	    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pagos');
	}

}
