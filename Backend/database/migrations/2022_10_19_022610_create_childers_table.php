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
            $table->string('rental_retribution');
            $table->enum('utilization_engagement_type',['pinjam_pakai','pakai_sendiri','sewa_sip_bmd','retribusi']);
            $table->string('utilization_engagement_name');
            $table->string('allotment_of_use');
            $table->string('coordinate');
            $table->string('large');
            $table->string('present_condition')->nullable();
            $table->string('assets_value');
            $table->date('validity_period_of');
            $table->date('validity_period_until');
            $table->string('engagement_number')->unique();
            $table->date('engagement_date');
            $table->string('description')->nullable();
            $table->string('application_letter')->nullable();
            $table->string('agreement_letter')->nullable();
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
