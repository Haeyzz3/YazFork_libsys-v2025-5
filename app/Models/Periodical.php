<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Periodical extends Model
{
    use hasFactory;

    protected $casts = [
        'authors' => 'array',
        'editors' => 'array',
    ];

    protected $guarded = [];

    public function record(): BelongsTo
    {
        return $this->belongsTo(Record::class);
    }
}
