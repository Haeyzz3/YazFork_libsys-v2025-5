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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('record_id') // Foreign key to resources table
            ->constrained('records')
                ->onDelete('cascade');
            $table->string('author', '100')->nullable();
            $table->json('additional_authors')->nullable();
            $table->string('editor','100')->nullable();
            $table->year('publication_year'); // Required
            $table->string('publisher', '100'); // Required
            $table->string('publication_place', '200'); // Required
            $table->string('isbn', '25');

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
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
//        Schema::dropIfExists('authors');
        Schema::dropIfExists('author_record');
    }
};
