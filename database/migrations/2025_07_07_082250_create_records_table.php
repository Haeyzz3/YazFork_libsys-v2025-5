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
        Schema::create('records', function (Blueprint $table) {
            $table->id(); // Primary key, auto-generated
            $table->string('title')->index(); // Required, indexed for search
            $table->string('language'); // Dropdown: English, Filipino, Spanish, Other
            $table->string('ddc_classification'); // Required dropdown: Applied Science, Arts, etc.
            $table->string('call_number')->unique()->nullable(); // Auto-suggested, unique
            $table->string('physical_location'); // Required dropdown: Circulation, Fiction, etc.
            $table->string('location_symbol', 10)->nullable(); // Auto-generated
            $table->date('date_acquired')->default(now()); // Auto-filled with current date
            $table->string('source'); // Dropdown: Purchase, Donation, etc.
            $table->decimal('purchase_amount', 10, 2)->nullable(); // Conditional based on source
            $table->string('acquisition_status'); // Required dropdown: Processing, Available, etc.
            $table->text('subject_headings')->nullable(); // Text area with autocomplete
            $table->text('additional_notes')->nullable(); // Text area
            $table->timestamps(); // created_at and updated_at
            $table->softDeletes(); // For soft delete functionality

            // Indexes for better performance
            $table->index(['ddc_classification', 'physical_location']);
            $table->index('acquisition_status');
            $table->index('date_acquired');
            $table->index('language');
            $table->index('source');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('records');
    }
};
