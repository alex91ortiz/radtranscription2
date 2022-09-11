<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('results', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('code',20);
            $table->date('date');
            $table->string('diagnostic',80);
            $table->longText('findings');
            $table->string('oneoption',200);
            $table->string('secondoption',200);
            $table->integer('user_id')->unsigned();
            $table->string('exam',200);
            $table->integer('companie_id')->unsigned();
            $table->integer('specialist_id')->unsigned();
            $table->integer('formalitie_id')->unsigned();
            $table->integer('entitie_id')->unsigned();
            $table->integer('typeexam_id')->unsigned();
            $table->integer('value');
            $table->boolean('comparative');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('companie_id')->references('id')->on('companies');
            $table->foreign('specialist_id')->references('id')->on('specialists');
            $table->foreign('formalitie_id')->references('id')->on('formalities');
            $table->foreign('entitie_id')->references('id')->on('entities');
            $table->foreign('typeexam_id')->references('id')->on('typeexams');
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
		//
		Schema::dropIfExists('results');
	}

}
