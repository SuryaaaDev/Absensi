<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TmpRfid extends Model
{
    /** @use HasFactory<\Database\Factories\TmpRfidFactory> */
    use HasFactory;
    protected $fillable = ['nokartu', 'device_id'];

    public function device() :BelongsTo
    {
        return $this->belongsTo(Device::class);
    }
}
