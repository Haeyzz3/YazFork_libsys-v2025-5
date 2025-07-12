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
            $table->string('cover_type')->nullable();
            $table->string('ics_number', '25')->nullable();
            $table->string('ics_number_date', '25')->nullable();
            $table->string('pr_number', '25')->nullable();
            $table->string('pr_number_date', '25')->nullable();
            $table->string('po_number', '25')->nullable();
            $table->string('po_number_date', '25')->nullable();
            $table->string('cover_image')->nullable();
            $table->text('table_of_contents')->nullable();
            $table->json('subject_headings')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('publication_year');
            $table->index('publisher');
            $table->index('isbn');
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
