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
        Schema::create('theses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('record_id')->constrained('records')->onDelete('cascade');
            $table->string('researchers'); // You can change this to text or json if multiple names
            $table->string('academic_year');
            $table->string('institution');
            $table->string('department'); // or 'school' or 'college'
            $table->string('adviser')->nullable();
            $table->string('panelist')->nullable(); // also consider json if multiple
            $table->string('degree_program');
            $table->string('degree_level'); // e.g., Bachelor's, Master's, PhD
            $table->string('format'); // e.g., Print, Digital, etc.
            $table->integer('number_of_pages')->nullable();
            $table->string('abstract_document')->nullable(); // store file path
            $table->string('full_text')->nullable(); // store file path
            $table->text('abstract_summary')->nullable();
            $table->text('keywords')->nullable();
            $table->text('additional_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('theses');
    }
};
