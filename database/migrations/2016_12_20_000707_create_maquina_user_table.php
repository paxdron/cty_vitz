<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaquinaUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maquina_user', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('maquina_id')->unsigned();
			$table->foreign('maquina_id')->references('id')->on('maquinas');

			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->smallInteger('n_espacios')->unsigned()->default(0);
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
		Schema::dropIfExists('maquina_user');
    }
}
