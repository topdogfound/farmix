<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // crop_categories
        Schema::create('crop_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->string('slug')->unique();
            $table->timestamps();
        });

        // crops
        Schema::create('crops', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cropCategoryId')
                ->constrained('crop_categories')
                ->cascadeOnDelete();

            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();

            $table->unique(['cropCategoryId', 'name']);
            $table->timestamps();
        });

        // stages
        Schema::create('stages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->unsignedSmallInteger('sequence');
            $table->text('description')->nullable();

            $table->timestamps();
        });

        DB::statement("
                    ALTER TABLE stages
                    ADD CONSTRAINT stages_sequence_check
                    CHECK (sequence > 0)
                ");

        // crop_stages (pivot)
        Schema::create('crop_stages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cropId')
                ->constrained('crops')
                ->cascadeOnDelete();

            $table->foreignId('stageId')
                ->constrained('stages')
                ->cascadeOnDelete();

            $table->unique(['cropId', 'stageId']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('crop_stages');
        Schema::dropIfExists('stages');
        Schema::dropIfExists('crops');
        Schema::dropIfExists('crop_categories');
    }
};
