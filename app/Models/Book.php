<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'primary_author',
        'publication_year',
        'publisher',
        'place_of_publication',
        'isbn_issn',
        'series_title',
        'edition',
        'cover_type',
        'book_cover_image',
        'table_of_contents',
        'summary_abstract',
    ];

    protected $casts = [
        'additional_authors' => 'array', // saved as json in db
    ];

    public function record(): BelongsTo
    {
        return $this->belongsTo(Record::class);
    }
}
