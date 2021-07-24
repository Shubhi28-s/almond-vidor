<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveySubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_submissions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('delegate_id')->unsigned();
            $table->foreign('delegate_id')->references('id')->on('delegates')->onDelete('cascade');
            $table->bigInteger('vingage_id')->unsigned();
            $table->foreign('vingage_id')->references('id')->on('vingages')->onDelete('cascade');
            $table->bigInteger('survey_id')->unsigned();
            $table->foreign('survey_id')->references('id')->on('surveys')->onDelete('cascade');
            $table->string("hexa_code");
            $table->string("option_answer")->nullable();
            $table->integer("obtain_marks")->nullable();
            $table->tinyInteger("status")->comment("0=>wrong,1=>right,2=>not_attempt");
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
        Schema::dropIfExists('survey_submissions');
    }
}
