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
        Schema::create('digital_resources', function (Blueprint $table) {
            $table->id();

            // Foreign Keys
            $table->foreignId('record_id')->constrained('records')->onDelete('cascade');

            $table->json('authors')->nullable();
            $table->json('editors')->nullable();
            $table->year('publication_year')->nullable();
            $table->year('copyright_year')->nullable();
            $table->string('producer')->nullable();
            $table->string('language')->nullable();

            $table->enum('collection_type', ['cd', 'duplicate_copy', 'cassette', 'vhs', 'cdr'])->nullable();
            $table->string('duration')->nullable();
            $table->string('cover_image')->nullable();

            $table->string('source')->nullable();
            $table->string('donated_by')->nullable();
            $table->string('purchase_amount', 10)->nullable();
            $table->string('lot_cost', 10)->nullable();
            $table->string('supplier')->nullable();

            $table->text('overview')->nullable();

            $table->timestamps();
            $table->softDeletes();

            // indexes later for performance
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
