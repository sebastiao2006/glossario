<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // funcionário
            $table->foreignId('empresa_id')->constrained()->onDelete('cascade'); // empresa

            $table->string('titulo');
            $table->text('descricao')->nullable();

            $table->date('data_inicio');
            $table->date('data_fim');

            $table->enum('status', ['pendente', 'em_progresso', 'concluida'])->default('pendente');

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
        Schema::dropIfExists('tasks');
    }
}
