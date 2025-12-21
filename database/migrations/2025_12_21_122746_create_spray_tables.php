<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // spray_schedules
        Schema::create('spray_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cropId')->constrained('crops')->cascadeOnDelete();
            $table->foreignId('organizationId')->constrained('organizations')->cascadeOnDelete();
            $table->year('year');
            $table->string('sourcePdfPath');
            $table->string('version')->nullable();
            $table->boolean('isActive')->default(true);
            $table->timestamps();
        });

        // spray_schedule_items
        Schema::create('spray_schedule_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sprayScheduleId')->constrained('spray_schedules')->cascadeOnDelete();
            $table->foreignId('cropStageId')->constrained('crop_stages')->cascadeOnDelete();
            $table->text('remarks')->nullable();
            $table->timestamps();
        });

        // spray_controls
        Schema::create('spray_controls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sprayScheduleItemId')->constrained('spray_schedule_items')->cascadeOnDelete();
            $table->foreignId('cropThreatId')->constrained('crop_threats')->cascadeOnDelete();
            $table->foreignId('chemicalId')->constrained('chemicals')->cascadeOnDelete();
            $table->decimal('quantity', 10, 2);
            $table->string('unit', 20);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('spray_controls');
        Schema::dropIfExists('spray_schedule_items');
        Schema::dropIfExists('spray_schedules');
    }
};