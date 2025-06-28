<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    protected $table = 'users';

    protected static function booted()
    {
        static::addGlobalScope('siswa', function ($query) {
            $query->where('is_admin', false);
        });
    }

    protected $guarded = [];

    public function class() :BelongsTo
    {
        return $this->belongsTo(StudentClass::class);
    }

    public function attendance() :HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    public function permission() :HasMany
    {
        return $this->hasMany(Permission::class);
    }
}
