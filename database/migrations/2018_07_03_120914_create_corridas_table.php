<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorridasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //'origem', 'destino', 'data', 'hora', 'volume', 'peso', 'fragil'
        Schema::create('corridas', function (Blueprint $table) {
            
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
            $table->string('origem');
            $table->string('destino');
            $table->date('data');
            $table->time('hora');
            $table->double('volume', 8, 2);
            $table->double('peso', 8, 2);
            $table->boolean('fragil');
            $table->unsignedInteger('motorista_id')->nullable();
            $table->unsignedInteger('passageiro_id');
            $table->foreign('passageiro_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('motorista_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('corridas');
    }
}
