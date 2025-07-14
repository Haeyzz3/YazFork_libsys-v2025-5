<?php

use Carbon\Carbon;
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

        // Library of Congress Classification table
        $now = Carbon::now();

        Schema::create('physical_locations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('symbol', 5)->unique();     // LC codes can be 1-5 characters (e.g., "A", "QA76")
            $table->timestamps();
        });

        DB::table('physical_locations')->insert([
            ['symbol' => 'CIR', 'name' => 'Circulation', 'created_at' => $now, 'updated_at' => $now],
            ['symbol' => 'RES', 'name' => 'Reserved', 'created_at' => $now, 'updated_at' => $now],
            ['symbol' => 'F', 'name' => 'Fiction', 'created_at' => $now, 'updated_at' => $now],
            ['symbol' => 'Fil', 'name' => 'Filipiñana', 'created_at' => $now, 'updated_at' => $now],
        ]);

        Schema::create('records', function (Blueprint $table) {
            $table->id(); // Primary key, auto-generated

            $table->string('title');
            $table->string('accession_number')->unique()->nullable();
            $table->enum('acquisition_status', ['available', 'pending_review', 'processing']);
            $table->enum('condition', ['excellent', 'good', 'fair', 'poor', 'damaged']);
            $table->json('subject_headings');

            $table->foreignId('added_by')->nullable()
            ->constrained('users')
                ->onDelete('set null');
            $table->timestamps(); // created_at and updated_at
            $table->softDeletes(); // For soft delete functionality

            // make idex here for performance in searching
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
