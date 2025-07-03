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
        Schema::create('patron_details', function (Blueprint $table) {
            $table->foreignId('user_id')->primary()->constrained('users')->onDelete('cascade');
            $table->string('school_id', 10)->unique()->nullable();
            $table->string('library_id', 10)->unique()->nullable();
            $table->enum('sex', ['male', 'female'])->nullable();
            $table->foreignId('program_id')->nullable()->constrained('programs')->onDelete('set null');
            $table->foreignId('major_id')->nullable()->constrained('majors')->onDelete('set null');
            $table->foreignId('patron_type_id')->constrained('patron_types')->onDelete('cascade');
            $table->foreignId('office_id')->nullable()->constrained('offices')->onDelete('set null');
            $table->string('address', 255)->nullable();
            $table->string('phone', 20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patron_details');
    }
};
