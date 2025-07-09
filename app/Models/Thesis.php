<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Thesis extends Model
{
    use hasFactory;

    protected $fillable = [
        'researchers',
        'academic_year',
        'institution',
        'college',
        'adviser',
        'panelist',
        'degree_program',
        'degree_level',
        'format',
        'number_of_pages',
        'abstract_document',  // nullable
        'full_text',         // nullable
        'abstract_summary',  // nullable
        'keywords',          // nullable
    ];

    public function record(): BelongsTo
    {
        return $this->belongsTo(Record::class);
    }
}
