<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // chemical_types
        Schema::create('chemical_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // e.g., Herbicide, Fungicide, Insecticide
            $table->timestamps();
        });

        // chemicals
        Schema::create('chemicals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chemicalTypeId')->constrained('chemical_types')->cascadeOnDelete();
            $table->string('title');
            $table->string('brandNames')->nullable();
            $table->text('description')->nullable();
            $table->string('toxicityLevel')->nullable();
            $table->unsignedSmallInteger('waitingPeriodDays')->default(0);
            $table->boolean('organic')->default(false);
            $table->boolean('banned')->default(false);
            $table->timestamps();

            $table->unique(['chemicalTypeId', 'title']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chemicals');
        Schema::dropIfExists('chemical_types');
    }
};
