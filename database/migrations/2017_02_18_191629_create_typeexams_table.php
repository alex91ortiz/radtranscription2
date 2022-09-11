<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeexamsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('typeexams', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name',80);
			$table->integer('value');
			$table->integer('companie_id')->nullable()->unsigned();
			$table->integer('entitie_id')->nullable()->unsigned();
            $table->timestamps();
            $table->foreign('companie_id')->references('id')->on('companies');
            $table->foreign('entitie_id')->references('id')->on('entities');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('typeexams');
	}

}
