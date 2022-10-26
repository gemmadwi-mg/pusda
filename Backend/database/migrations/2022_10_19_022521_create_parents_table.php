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
            $table->string('certificate_number')->unique();
            $table->string('certificate_date');
            $table->enum('utilization_type',['pinjam_pakai','pakai_sendiri','sewa_retibusi']);
            $table->string('address');
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
