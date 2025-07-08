<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DigitalResource extends Model
{
    use hasFactory;

    protected $fillable = [
        'primary_author',
        'publication_copyright_year',
        'publisher_producer',
        'additional_authors',
        'editor_producer',
        'collection_type',
        'access_method',
        'file_format',
        'duration',
        'resource_cover',
        'system_requirements',
        'summary_abstract',
    ];

    public function record(): BelongsTo
    {
        return $this->belongsTo(Record::class);
    }
}
