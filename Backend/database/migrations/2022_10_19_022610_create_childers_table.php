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
            $table->enum('utilization_engagement_type',['pinjam_pakai','pakai_sendiri','sewa_sip_bmd','retribusi']);
            $table->integer('rental_retribution');
            $table->string('utilization_engagement_name');
            $table->string('allotment_of_use');
            $table->string('coordinate');
            $table->string('large');
            $table->string('present_condiition')->nullable();
            $table->date('validity_period_of');
            $table->date('validity_period_until');
            $table->string('engagement_number');
            $table->date('engagement_date');
            $table->string('description');
            $table->string('application_letter');
            $table->string('agreement_letter');
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
