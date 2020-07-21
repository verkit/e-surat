<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLetterFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('letter_forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('letter_id');
            $table->unsignedBigInteger('form_id');
            $table->foreign('letter_id')->on('letters')->references('id')->onDelete('cascade');
            $table->foreign('form_id')->on('forms')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('letter_forms');
    }
}
