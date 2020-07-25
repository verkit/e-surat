<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVillagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('villagers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nik');
            $table->date('birthdate');
            $table->string('birthplace');
            $table->string('profession');
            $table->unsignedBigInteger('gender_id');
            $table->unsignedBigInteger('marital_status_id');
            $table->string('address');
            $table->string('religion');
            $table->string('last_education');
            $table->string('ktp');
            $table->string('kk');
            $table->string('phone');
            $table->timestamps();

            $table->foreign('user_id')->on('users')->references('id')->onDelete('cascade');
            $table->foreign('gender_id')->on('genders')->references('id')->onDelete('cascade');
            $table->foreign('marital_status_id')->on('marital_statuses')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('villagers');
    }
}
