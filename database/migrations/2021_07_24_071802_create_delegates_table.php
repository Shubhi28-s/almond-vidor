<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDelegatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delegates', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('vingage_id')->unsigned()->nullable();
            $table->foreign('vingage_id')->references('id')->on('vingages')->onDelete('cascade');
            $table->string('hexa_code')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->bigInteger('number')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('country_code')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('designation')->nullable();
            $table->string('organization')->nullable();
            $table->string('language')->nullable();
            $table->string('source')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('last_login')->nullable();
            $table->string('status')->nullable();
            $table->SoftDeletes();
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
        Schema::dropIfExists('delegates');
    }
}
