<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddObservacaoAndStatusToRegularizacaoEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('regularizacao_empresas', function (Blueprint $table) {
            $table->text('observacao')->nullable()->after('situacao');
            $table->string('status')->nullable()->after('observacao');
        });
    }

    public function down(): void
    {
        Schema::table('regularizacao_empresas', function (Blueprint $table) {
            $table->dropColumn(['observacao', 'status']);
        });
    }
}
