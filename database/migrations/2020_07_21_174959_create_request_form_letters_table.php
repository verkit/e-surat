<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestFormLettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_form_letters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('req_letter_id');
            $table->unsignedBigInteger('req_form_id');
            $table->foreign('req_letter_id')->on('request_letters')->references('id')->onDelete('cascade');
            $table->foreign('req_form_id')->on('request_forms')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('request_form_letters');
    }
}
