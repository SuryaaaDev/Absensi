<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    protected $table = 'users';

    protected static function booted()
    {
        static::addGlobalScope('siswa', function ($query) {
            $query->where('role', 'student');
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

    public function division() :HasOne
    {
        return $this->hasOne(Division::class);
    }
}
