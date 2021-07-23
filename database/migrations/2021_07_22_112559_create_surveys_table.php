<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('vingaje_id')->unsigned();
            $table->foreign('vingaje_id')->references('id')->on('vingajes')->onDelete('cascade');
            $table->string("hexa_code");
            $table->string("question");
            $table->string("answer")->nullable();
            $table->string("option_1")->nullable();
            $table->string("option_2")->nullable();
            $table->string("option_3")->nullable();
            $table->string("option_4")->nullable();
            $table->integer('question_time')->nullable();
            $table->integer("time")->nullable();
            $table->float('marks')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('surveys');
    }
}
