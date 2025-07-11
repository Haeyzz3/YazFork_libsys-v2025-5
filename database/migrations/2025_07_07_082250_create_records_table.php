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
            $table->string('accession_number', 10);
            $table->string('title')->index();
            $table->string('ddc_classification')->nullable();
            $table->string('lc_classification')->nullable();
            $table->string('call_number')->unique()->nullable();
            $table->string('physical_location')->nullable();
            $table->string('location_symbol', 50)->nullable();

//            $table->date('date_acquired')->default(now()); // Auto-filled with current date
//            $table->string('source'); // Dropdown: Purchase, Donation, etc.
//            $table->decimal('purchase_amount', 10, 2)->nullable(); // Conditional based on source
//            $table->string('acquisition_status'); // Required dropdown: Processing, Available, etc.
//            $table->text('additional_notes')->nullable(); // Text area
            $table->timestamps(); // created_at and updated_at
            $table->softDeletes(); // For soft delete functionality
//
//            // Indexes for better performance
//            $table->index(['ddc_classification', 'physical_location']);
//            $table->index('acquisition_status');
//            $table->index('date_acquired');
//            $table->index('source');
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
