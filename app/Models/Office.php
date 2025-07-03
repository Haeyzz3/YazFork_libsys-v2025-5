<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    public function patronDetails()
    {
        return $this->hasMany(PatronDetail::class);
    }
}
