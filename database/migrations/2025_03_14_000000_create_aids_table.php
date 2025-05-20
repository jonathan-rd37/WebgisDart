<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAidsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('aids', function (Blueprint $table) {
            $table->id();
            $table->foreignId('disaster_id')->constrained('disasters')->onDelete('cascade');
            $table->string('item_name');
            $table->integer('quantity')->default(1);
            $table->string('sender_name');
            $table->string('phone_number');
            $table->string('tracking_number');
            $table->foreignId('mail_service_id')->constrained('mail_services');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('aids');
    }
}
