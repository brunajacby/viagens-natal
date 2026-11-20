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
        // cria a tabela das paragens
        Schema::create('stops', function (Blueprint $table) {
            $table->id();
            $table->string('city');
            // caminho da foto (pode ficar vazio)
            $table->string('photo')->nullable();
            $table->date('visit_date');
            // liga a paragem à viagem
            $table->foreignId('trip_id')->constrained('trips');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stops');
    }
};