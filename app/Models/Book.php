<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'authors' => 'array', // saved as json in db
        'editors' => 'array', // saved as json in db
        'old_remarks' => 'array', // saved as json in db
    ];

    public function record(): BelongsTo
    {
        return $this->belongsTo(Record::class);
    }
}
