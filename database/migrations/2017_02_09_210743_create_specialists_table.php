<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialistsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('specialists', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('dni')->nullable();
            $table->string('name',80);
            $table->string('rm',30);
            $table->string('specialty',80);
            $table->longText('firma')->nullable();
            $table->integer('companie_id')->nullable()->unsigned();
            $table->timestamps();
            $table->foreign('companie_id')->references('id')->on('companies');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('specialists');
	}

}
