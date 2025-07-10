<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'author',
        'additional_authors',
        'editor',
        'publication_year',
        'publisher',
        'publication_place',
        'isbn',
    ];

    protected $casts = [
        'additional_authors' => 'array', // saved as json in db
    ];

    public function record(): BelongsTo
    {
        return $this->belongsTo(Record::class);
    }
}
