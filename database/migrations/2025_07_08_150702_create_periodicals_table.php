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
        Schema::create('periodicals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('record_id')->constrained('records')->onDelete('cascade');
            $table->string('primary_author');
            $table->year('publication_year');
            $table->string('publisher');
            $table->unsignedSmallInteger('volume_number')->nullable();
            $table->unsignedSmallInteger('issue_number')->nullable();
            $table->date('publication_date')->nullable();
            $table->string('issn', 9)->nullable(); // ISSN format: XXXX-XXXX
            $table->string('frequency', '50')->nullable();
            $table->string('format', '50')->nullable();
            $table->string('cover_sample_image')->nullable(); // Stores file path
            $table->text('summary_contents')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periodicals');
    }
};
