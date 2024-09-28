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
        Schema::create('solarimetria_dados', function (Blueprint $table) {
            $table->id();
            $table->timestamp('medicao');
            $table->float('velocidade');
            $table->float('temperatura');
            $table->float('umidade_relativa');
            $table->float('precipitacao');
            $table->float('irradiacao_solar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solarimetria_dados');
    }
};
