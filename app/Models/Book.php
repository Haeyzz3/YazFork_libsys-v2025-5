<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'Publication_Year',
        'Publisher',
        'Place_of_Publication',
        'ISBN_ISSN',
        'Series_Title',
        'Edition',
        'Cover_Type',
        'Book_Cover_Image',
        'Table_of_Contents',
        'Summary_Abstract',
    ];

    public function record()
    {
        return $this->belongsTo(Record::class);
    }
}
