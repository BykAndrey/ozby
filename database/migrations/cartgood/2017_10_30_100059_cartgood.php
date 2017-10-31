<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cartgood extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartgood',function (Blueprint $table){
			$table->increments('id');
			$table->integer('id_good');//товар
            $table->integer('count');
            $table->float('price');
			$table->integer('id_sales');//продавец
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
        Schema::drop('cartgood');
    }
}
