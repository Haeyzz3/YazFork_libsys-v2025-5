<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    public $table = 'roles';

    public $fillable = [
        'role_name',
    ];

    public function users() : HasMany
    {
        return $this->hasMany(User::class);
    }

    public function permissions() : BelongsToMany
    {
        return $this->belongsToMany(Permission::class);
    }
}
