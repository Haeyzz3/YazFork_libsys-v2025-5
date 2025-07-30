<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Borrowing extends Model
{
    protected $guarded = [];

    /**
     * Get the user that borrowed the record.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the record that was borrowed.
     */
    public function record(): BelongsTo
    {
        return $this->belongsTo(Record::class);
    }
}
