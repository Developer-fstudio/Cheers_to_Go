<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
                $table->integer('client_id')->unsigned();
            $table->foreign('client_id')
                ->references('id')
                ->on('clients')
                ->onDelete('cascade');

                $table->integer('jogo_id')->unsigned();
            $table->foreign('jogo_id')
                ->references('id')
                ->on('jogos')
                ->onDelete('cascade');
            $table->string('code_id');

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
        Schema::dropIfExists('vendas');
    }
};
