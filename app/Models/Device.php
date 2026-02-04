<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Device extends Model
{
    /** @use HasFactory<\Database\Factories\DeviceFactory> */
    use HasFactory;

    protected $fillable = [
        'location',
        'source',
    ];

    public function tmpRfids() :HasMany
    {
        return $this->hasMany(TmpRfid::class);
    }
    
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
