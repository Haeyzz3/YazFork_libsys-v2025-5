<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Remark extends Model
{
    protected $guarded = [];

    public function record(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Record::class);
    }
}
