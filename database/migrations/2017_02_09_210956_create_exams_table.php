<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exams', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name');
            $table->longText('description',200);
            $table->string('diagnostic',80);
            $table->string('oneoption',200);
            $table->string('secondoption',200);
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
		Schema::drop('exams');
	}

}
