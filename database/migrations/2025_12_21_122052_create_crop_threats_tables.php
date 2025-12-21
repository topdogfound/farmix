<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // crop_threats_types
        Schema::create('crop_threats_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Disease / Insect / Pest
            $table->timestamps();
        });

        // crop_threats
        Schema::create('crop_threats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cropThreatTypeId')->constrained('crop_threats_types')->cascadeOnDelete();
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();

            $table->unique(['cropThreatTypeId', 'name']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('crop_threats');
        Schema::dropIfExists('crop_threats_types');
    }
};
