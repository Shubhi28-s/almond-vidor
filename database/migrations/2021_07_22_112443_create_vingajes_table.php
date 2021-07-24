<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVingajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vingages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string("hexa_code");
            $table->string("desktop_image")->nullable();
            $table->string("mobile_image")->nullable();
            $table->string("video_url")->nullable();
            $table->string("login_desktop_image")->nullable();
            $table->string("login_mobile_image")->nullable();
            $table->string("logo")->nullable();
            $table->string("first_popup")->nullable();
            $table->string("last_popup")->nullable();
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
        Schema::dropIfExists('vingajes');
    }
}
