<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->id('pes_id');
            $table->string('pes_nome', 255);
            $table->date('pes_data_nascimento');
            $table->string('pes_cpf', 14);
            $table->string('pes_telefone', 14)->nullable();
            $table->unsignedBigInteger('prof_id');
            $table->text('pes_observacoes')->nullable();

            $table->foreign('prof_id')->references('prof_id')->on('profissoes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoas');
    }
}
