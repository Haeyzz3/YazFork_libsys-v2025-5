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
        Schema::create('e_collections', function (Blueprint $table) {
            $table->id();

            // Foreign Keys
            $table->foreignId('record_id') // Foreign key to resources table
            ->constrained('records')
                ->onDelete('cascade');

            $table->string('primary_author');

            // Required Fields
            $table->year('publication_copyright_year');
            $table->string('publisher_producer');
            $table->enum('collection_type', ['E-books', 'Audiobooks', 'Digital Magazines', 'Online Databases', 'Streaming Media']);
            $table->enum('access_method', ['Online', 'CD/DVD', 'USB', 'Network Access']);

            // Optional Fields
            $table->enum('file_format', ['PDF', 'EPUB', 'MOBI', 'MP3', 'MP4', 'HTML', 'XML'])->nullable();
            $table->string('duration')->nullable(); // For audiobooks/videos
            $table->text('system_requirements')->nullable();
            $table->string('resource_cover_thumbnail')->nullable(); // Store file path
            $table->text('license_access_rights')->nullable();
            $table->text('summary_abstract')->nullable();

            // Indexes for better performance
            $table->index('record_id');
            $table->index('collection_type');
            $table->index('publication_copyright_year');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('e_collections');
    }
};
