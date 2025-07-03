<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    public function patronDetails()
    {
        return $this->hasMany(PatronDetail::class);
    }
}
