<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PatronDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'patron_type_id',
        'student_id',
        'library_id',
        'program_id',
        'major_id',
        'office_id',
        'address',
    ];

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

    public function office()
    {
        return $this->belongsTo(Office::class, 'office_id');
    }

}
