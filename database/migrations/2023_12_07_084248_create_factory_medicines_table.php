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
        Schema::create('factory_medicines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('factory_id')->constrained('factories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('catigorie_id')->constrained('catigories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('medicine_id')->constrained('medicines')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('scientific_name');
            $table->string('commercial_name');
            $table->string('catigorie');
            $table->string('man_company');
            $table->date('exp_day');
            $table->integer('price');
            $table->integer('amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factory_medicines');
    }
};
