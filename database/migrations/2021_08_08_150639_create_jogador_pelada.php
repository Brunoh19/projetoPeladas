<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJogadorPelada extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jogador_pelada', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jogador_id');
            $table->unsignedBigInteger('pelada_id');

            $table->foreign('jogador_id')
                    ->references('id')
                    ->on('jogadores')
                    ->onDelete('cascade');

            $table->foreign('pelada_id')
                    ->references('id')
                    ->on('peladas')
                    ->onDelete('cascade');        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jogador_pelada');
    }
}
