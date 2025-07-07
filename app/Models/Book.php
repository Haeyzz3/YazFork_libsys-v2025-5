<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function resource()
    {
        return $this->belongsTo(Record::class, 'Resource_ID', 'Resource_ID');
    }
}
