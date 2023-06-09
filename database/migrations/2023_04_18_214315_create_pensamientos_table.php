<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePensamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pensamientos', function (Blueprint $table) {
            $table->id('id');

            $table->string('descripcion');
            $table->integer('user_id')->unsigned();
            /* $table->foreign('user_id')->references('id')->on('users'); */
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
        Schema::dropIfExists('pensamientos');
    }
}
