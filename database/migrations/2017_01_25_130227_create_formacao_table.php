<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formacao', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_instituicao');            
            $table->string('curso');           
            $table->boolean('cursando');
            $table->string('ano_entrada');            
            $table->string('ano_saida');       
            $table->timestamp('created_at')->nullable();    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formacao');
    }
}
