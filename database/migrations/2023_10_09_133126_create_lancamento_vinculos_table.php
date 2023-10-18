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
        Schema::create('lancamento_vinculos', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_do_vinculo');
            $table->foreignId('lancamento_id')->constrained('lancamentos');
            $table->foreignId('pessoa_id')->constrained('pessoas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lancamento_vinculos');
    }
};
