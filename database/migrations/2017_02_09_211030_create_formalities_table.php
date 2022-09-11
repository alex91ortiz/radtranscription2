<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormalitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('formalities', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('firstname',30);
            $table->string('lastname',30);
            $table->string('dni',15);
            $table->string('date',30);
            $table->string('gender',2);
            $table->string('update',100);
            $table->string('time',10);
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
		Schema::drop('formalities');
	}

}
