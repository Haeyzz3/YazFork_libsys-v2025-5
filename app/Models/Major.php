<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $guarded = [];

    public function patronDetails()
    {
        return $this->hasMany(PatronDetail::class);
    }
}
