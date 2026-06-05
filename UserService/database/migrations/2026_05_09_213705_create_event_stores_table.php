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
        Schema::create('event_stores', function (Blueprint $table) {
            $table->id();

            // Aggregate / stream identity
            $table->uuid('aggregate_id');

            // Aggregate type
            $table->string('aggregate_type');

            // Event version for concurrency control
            $table->unsignedInteger('version');

            // Event name
            $table->string('event_type');

            // Event payload
            $table->json('data');

            // Optional metadata
            $table->json('metadata')->nullable();

            // Event timestamp
            $table->timestamp('created_at');

            // Prevent duplicate versions per aggregate
            $table->unique(['aggregate_id', 'version']);

            // Faster stream loading
            $table->index('aggregate_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_stores');
    }
};
