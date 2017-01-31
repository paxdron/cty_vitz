<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEspacioPublicidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		Schema::create('espacio_publicidad', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('espacio_id')->unsigned();
			$table->foreign('espacio_id')->references('id')->on('espacios');
			$table->integer('publicidad_id')->unsigned();
			$table->foreign('publicidad_id')->references('id')->on('publicidads');

			$table->timestamps();
			$table->softDeletes();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::dropIfExists('espacio_publicidad');
    }
}
