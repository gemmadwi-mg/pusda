<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('childers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('parent_id')->unsigned();
            $table->string('application_letter');
            $table->string('agreement_letter');
            $table->string('utilization');
            $table->string('allcation');
            $table->string('large');
            $table->string('rental_value');
            $table->string('validity_period');
            $table->string('coornate');
            $table->enum('description',['installment','paidoff']);
            $table->timestamps();
            $table->foreign('parent_id')->references('id')->on('parents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('childers');
    }
}
