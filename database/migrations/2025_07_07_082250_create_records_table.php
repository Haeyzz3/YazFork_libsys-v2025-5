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
            $table->foreignId('added_by')->nullable()
            ->constrained('users')
                ->onDelete('set null');
            $table->string('source'); // Dropdown: Purchase, Donation, etc.
            $table->string('purchase_amount', 10)->nullable(); // Conditional based on source
            $table->string('lot_cost', 10)->nullable(); // Conditional based on source
            $table->string('supplier')->nullable(); // Required dropdown: Processing, Available, etc.
            $table->string('donated_by')->nullable(); // Required dropdown: Processing, Available, etc.
            $table->string('acquisition_status'); // Required dropdown: Processing, Available, etc.
            $table->timestamps(); // created_at and updated_at
            $table->softDeletes(); // For soft delete functionality

            $table->index(['ddc_classification', 'physical_location']);
            $table->index('acquisition_status');
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
