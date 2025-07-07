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
            $table->id();
            $table->string('title');
            $table->string('language'); // Dropdown: English, Filipino, Spanish, Other
            $table->string('ddc_classification'); // Dropdown: Applied Science, Arts, etc.
            $table->string('call_number')->nullable(); // Auto-suggested
            $table->string('physical_location'); // Dropdown: Circulation, Fiction, etc.
            $table->string('location_symbol')->nullable(); // Auto-generated
            $table->date('date_acquired')->nullable(); // Auto-filled
            $table->string('source')->nullable(); // Dropdown: Purchase, Donation, etc.
            $table->decimal('purchase_amount', 10, 2)->nullable(); // Conditional
            $table->string('acquisition_status'); // Dropdown: Processing, Available, etc.
            $table->text('subject_headings')->nullable(); // Text area
            $table->text('additional_notes')->nullable(); // Text area
            $table->timestamps();
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
