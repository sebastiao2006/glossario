<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFuncionarioFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
        public function up(): void
        {
            Schema::table('users', function (Blueprint $table) {
                $table->string('cargo')->nullable();
                $table->integer('idade')->nullable();
                $table->string('id_funcionario')->nullable();
                $table->string('numero_computador')->nullable();
                $table->string('senha_computador')->nullable();
                $table->date('fim_contrato')->nullable();
            });
        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
