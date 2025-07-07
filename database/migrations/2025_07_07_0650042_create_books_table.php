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

        Schema::create('authors', function (Blueprint $table) {
            $table->id(); // Primary key, auto-generated
            $table->string('name');
            $table->timestamps(); // created_at and updated_at
            $table->softDeletes(); // For soft delete functionality

            // Indexes for better performance
            $table->index('name');
        });

        Schema::create('books', function (Blueprint $table) {
            $table->foreignId('record_id') // Foreign key to resources table
            ->constrained('records')
                ->onDelete('cascade');
            $table->foreignId('primary_author_id') // Foreign key to authors table
            ->nullable()
                ->constrained('authors')
                ->onDelete('set null');
            $table->year('publication_year'); // Required
            $table->string('publisher'); // Required
            $table->string('place_of_publication'); // Required
            $table->string('isbn_issn', 20)->nullable()->unique(); // ISBN or ISSN
            $table->string('series_title')->nullable();
            $table->string('edition')->nullable();
            $table->string('cover_type')->nullable(); // Dropdown: Hardcover, Paperback, etc.
            $table->string('book_cover_image')->nullable(); // File path for uploaded image
            $table->text('table_of_contents')->nullable(); // Text area
            $table->text('summary_abstract')->nullable(); // Text area
            $table->timestamps();
            $table->softDeletes();

            // Indexes for better performance
            $table->index('publication_year');
            $table->index('publisher');
            $table->index('isbn_issn');
            $table->index('cover_type');
            $table->index(['primary_author_id', 'publication_year']);
        });

        Schema::create('author_record', function (Blueprint $table) {
            $table->id();
            $table->foreignId('record_id')
                ->constrained('records')
                ->onDelete('cascade');
            $table->foreignId('author_id')
                ->constrained('authors')
                ->onDelete('cascade');
            $table->timestamps();

            // Composite unique constraint
            $table->unique(['record_id', 'author_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
