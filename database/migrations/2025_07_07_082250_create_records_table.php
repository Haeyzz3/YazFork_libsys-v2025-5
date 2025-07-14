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
        Schema::create('lc_classes', function (Blueprint $table) {
            $table->id();
            $table->string('code', 5)->unique();     // LC codes can be 1-5 characters (e.g., "A", "QA76")
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('physical_locations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('symbol', 5)->unique();     // LC codes can be 1-5 characters (e.g., "A", "QA76")
            $table->timestamps();
        });

        // Insert LC main classes (actual Library of Congress classifications)
        DB::table('lc_classes')->insert([
            ['code' => 'A', 'name' => 'General Works', 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'B', 'name' => 'Philosophy, Psychology, Religion', 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'C', 'name' => 'Auxiliary Sciences of History', 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'D', 'name' => 'World History and History of Europe, Asia, Africa, Australia, New Zealand, etc.', 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'E', 'name' => 'History of the Americas', 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'F', 'name' => 'History of the Americas', 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'G', 'name' => 'Geography, Anthropology, Recreation', 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'H', 'name' => 'Social Sciences', 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'J', 'name' => 'Political Science', 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'K', 'name' => 'Law', 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'L', 'name' => 'Education', 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'M', 'name' => 'Music and Books on Music', 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'N', 'name' => 'Fine Arts', 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'P', 'name' => 'Language and Literature', 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'Q', 'name' => 'Science', 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'R', 'name' => 'Medicine', 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'S', 'name' => 'Agriculture', 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'T', 'name' => 'Technology', 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'U', 'name' => 'Military Science', 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'V', 'name' => 'Naval Science', 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'Z', 'name' => 'Bibliography, Library Science, Information Resources', 'created_at' => $now, 'updated_at' => $now],
        ]);

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
        Schema::dropIfExists('lc_classes');
        Schema::dropIfExists('records');
    }
};
