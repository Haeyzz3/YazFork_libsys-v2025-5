<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Periodical extends Model
{
    use hasFactory;

    protected $fillable = [
        'primary_author',
        'publication_year',
        'publisher',
        'volume_number',
        'issue_number',
        'publication_date',
        'issn',
        'frequency',
        'format',
        'cover_sample_image',
        'summary_contents',
    ];

    public function record(): BelongsTo
    {
        return $this->belongsTo(Record::class);
    }
}
