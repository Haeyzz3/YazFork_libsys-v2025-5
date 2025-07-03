<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PatronDetail extends Model
{
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function patronType() : BelongsTo
    {
        return $this->belongsTo(PatronType::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

}
