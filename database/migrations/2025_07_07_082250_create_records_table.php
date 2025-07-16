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
        // sources table
        Schema::create('sources', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('label');
            $table->timestamps();
        });

        DB::table('sources')->insert([
            ['key' => 'donation', 'label' => 'Donation', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'purchase', 'label' => 'Purchase', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // cover_types table
        Schema::create('cover_types', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('label');
            $table->timestamps();
        });

        DB::table('cover_types')->insert([
            ['key' => 'hard_cover', 'label' => 'Hardcover', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'paper_back', 'label' => 'Paperback', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // acquisition_statuses table
        Schema::create('acquisition_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('label');
            $table->timestamps();
        });

        DB::table('acquisition_statuses')->insert([
            ['key' => 'available', 'label' => 'Available', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'pending_review', 'label' => 'Pending Review', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'processing', 'label' => 'Processing', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // conditions table
        Schema::create('conditions', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('label');
            $table->timestamps();
        });

        DB::table('conditions')->insert([
            ['key' => 'excellent', 'label' => 'Excellent', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'good', 'label' => 'Good', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'fair', 'label' => 'Fair', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'poor', 'label' => 'Poor', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'damaged', 'label' => 'Damaged', 'created_at' => now(), 'updated_at' => now()],
        ]);

        Schema::create('records', function (Blueprint $table) {
            $table->id(); // Primary key, auto-generated

            $table->string('accession_number')->unique()->nullable();
            $table->string('title');
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
        Schema::dropIfExists('conditions');
        Schema::dropIfExists('acquisition_statuses');
        Schema::dropIfExists('cover_types');
        Schema::dropIfExists('sources');
        Schema::dropIfExists('records');
    }
};
