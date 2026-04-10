<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegularizacaoEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regularizacao_empresas', function (Blueprint $table) {
    $table->id();
    $table->foreignId('empresa_id');
    $table->foreignId('user_id');
    $table->text('situacao');
    $table->json('checklist')->nullable();
    $table->json('documentos')->nullable();
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
        Schema::dropIfExists('regularizacao_empresas');
    }
}
