<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('entities', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name',80);
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
		//
		Schema::drop('entities');
	}

}
