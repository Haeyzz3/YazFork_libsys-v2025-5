<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Record extends Model
{
    use hasFactory;

    protected $table = 'records';

    protected $fillable = [
        'accession_number',
        'title',
        'language',
        // Classification & Location fields
        'ddc_classification',
        'call_number',
        'physical_location',
        'location_symbol',
        // Other fields
        'date_acquired',
        'source',
        'purchase_amount',
        'acquisition_status',
        'additional_notes',
    ];

    public function book(): HasOne
    {
        return $this->hasOne(Book::class);
    }
}
