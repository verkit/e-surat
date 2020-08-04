<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberFamilyCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_family_cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('family_card_id');
            $table->string('fullname')->nullable();
            $table->string('nik')->nullable();
            $table->unsignedBigInteger('gender_id')->nullable();
            $table->string('birthplace')->nullable();
            $table->date('birthdate')->nullable();
            $table->unsignedBigInteger('religion_id')->nullable();
            $table->string('education')->nullable();
            $table->string('profession')->nullable();
            $table->unsignedBigInteger('blood_type_id')->nullable();
            $table->unsignedBigInteger('marital_status_id')->nullable();
            $table->date('marriage_date')->nullable();
            $table->string('status_in_family')->nullable();
            $table->unsignedBigInteger('citizenship_id')->nullable();
            $table->string('passport')->nullable();
            $table->string('kitap')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->timestamps();

            $table->foreign('family_card_id')->references('id')->on('family_cards')->onDelete('cascade');
            $table->foreign('marital_status_id')->references('id')->on('marital_statuses')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('citizenship_id')->references('id')->on('citizenships')->onDelete('cascade');
            $table->foreign('blood_type_id')->references('id')->on('blood_types')->onDelete('cascade');
            $table->foreign('religion_id')->references('id')->on('religions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_family_cards');
    }
}
