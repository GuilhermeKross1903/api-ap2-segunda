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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 200);
            $table->string('cpf', 15);
            $table->integer('ano_de_nascimento');
        });
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 200);
            $table->integer('preço');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
