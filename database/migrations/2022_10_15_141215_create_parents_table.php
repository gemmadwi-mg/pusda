<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parents', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('auhtor')->unsigned();
            $table->string('no_reg')->unique();
            $table->string('name_goods');
            $table->string('address');
            $table->string('village');
            $table->string('kec');
            $table->string('kab_city');
            $table->string('no')->unique();
            $table->date('date');
            $table->string('large');
            $table->timestamps();
            $table->foreign('auhtor')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parents');
    }
}
