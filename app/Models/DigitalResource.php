<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DigitalResource extends Model
{
    use hasFactory;

    protected $guarded = [];

    protected $casts = [
        'authors' =>  'array',
        'editors' =>   'array',
    ];

    public function record(): BelongsTo
    {
        return $this->belongsTo(Record::class);
    }
}
