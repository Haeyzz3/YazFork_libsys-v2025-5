<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DdcClassification extends Model
{
    public array $protected = [];

    protected $table = 'ddc_classifications';

    protected $guarded = [];

}
