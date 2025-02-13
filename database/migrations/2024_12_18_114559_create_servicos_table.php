<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('servicos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('titulodaespecialidade', 60);
            $table->string('descricaodaatividade', 400);
            $table->integer('tempoexperiencia');
            $table->string('servicosfrequentes', 120);
            $table->string('valormedio', 80);
            $table->string('formadetrabalho', 80);
            $table->string('formadepagamento', 60);
            $table->string('agendadisponivel', 120);
            $table->string('contatodisponivel', 80);
            $table->string('outroscontatos', 100);
            $table->dateTime('datacadastro');
            //$table->string('portfolio')->nullable();
            $table->string('regioesatendidas', 120);
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
            $table->unsignedBigInteger('divisao_id');
            $table->foreign('divisao_id')->references('id')->on('divisoes')->onDelete('cascade');
            //$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicos');
    }
};
