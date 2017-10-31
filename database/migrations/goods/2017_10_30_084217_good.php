<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Good extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods',function (Blueprint $table){
			$table->increments('id');
			$table->integer('id_user');
            $table->string('name');
			$table->text('description');
			$table->integer('count');
			$table->float('price');
			$table->string('image');
			$table->boolean('active');
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
        Schema::drop('goods');
    }
}
