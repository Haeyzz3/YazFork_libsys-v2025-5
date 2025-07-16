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
        Schema::create('periodicals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('record_id')->constrained('records')->onDelete('cascade');

            $table->json('authors')->nullable();
            $table->json('editors')->nullable();
            $table->year('publication_year')->nullable();
            $table->string('publication_month')->nullable();
            $table->string('publisher')->nullable();
            $table->string('volume_number')->nullable();
            $table->string('issue_number')->nullable();
            $table->string('issn')->nullable()->unique();
            $table->string('series_title')->nullable();

            $table->string('call_number')->nullable();
            $table->foreignId('ddc_class_id')->nullable()
                ->constrained('ddc_classifications')->onDelete('set null');
            $table->foreignId('lc_class_id')->nullable()
                ->constrained('lc_classifications')->onDelete('set null');

            $table->string('cover_image')->nullable();

            $table->string('source')->nullable();
            $table->string('donated_by')->nullable();
            $table->decimal('purchase_amount', 10, 2)->nullable();
            $table->decimal('lot_cost', 10, 2)->nullable();
            $table->string('supplier')->nullable();

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
        Schema::dropIfExists('periodicals');
    }
};
