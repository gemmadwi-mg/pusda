<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('childrens_id')->unsigned();
            $table->string('periode_name')->nullable();
            $table->date('date');
            $table->string('amount');
            $table->string('proof_of_payment');
            $table->enum('status',['notyet_paidoff','paidoff']);
            $table->timestamps();
            $table->foreign('childrens_id')->references('id')->on('childers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
