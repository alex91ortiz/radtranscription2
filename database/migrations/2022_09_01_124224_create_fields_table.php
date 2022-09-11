<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name',80);
            $table->integer('position');
			$table->integer('entitie_id')->nullable()->unsigned();
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
        Schema::drop('fields');
    }
}
