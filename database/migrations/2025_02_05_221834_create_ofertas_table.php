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
        Schema::create('ofertas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('titulodaoferta', 60);
            $table->string('descricaodaoferta', 400);
            $table->enum('urgencia', ['Alta', 'Média', 'Baixa'])->default('Alta');
            $table->decimal('valorestimado', 8,2);
            $table->dateTime('datapublicacao');
            $table->dateTime('datalimite');
            $table->enum('status', ['Aberta', 'Em Andamento', 'Concluída'])->default('Aberta');
            $table->string('localizacao', 80);
            $table->string('contatodisponivel', 80);
            $table->json('anexo')->nullable();
            $table->enum('frequencia', ['Única', 'Semanal', 'Mensal'])->default('Única');
            $table->string('disponibilidadecliente', 60);
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('users');
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categorias');
            //$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ofertas');
    }
};
