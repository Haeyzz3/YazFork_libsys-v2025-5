<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Record extends Pivot
{
    use hasFactory;

    protected $table = 'records';
}
