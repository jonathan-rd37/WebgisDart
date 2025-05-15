<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisastersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('disasters', function (Blueprint $table) {
            $table->id();
            $table->string('location'); // Nama kota atau lokasi
            $table->string('disaster'); // Nama bencana
            $table->string('description'); // Status bantuan
            $table->decimal('latitude', 10, 8)->nullable();// Add latitude
            $table->decimal('longitude', 11, 8)->nullable();// Add longitude
            $table->timestamps(); // Menambahkan created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('disasters');
    }
}
