<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Permission extends Model
{
    /** @use HasFactory<\Database\Factories\PermissionFactory> */
    use HasFactory;

    protected $fillable = [
        'student_id',
        'image'
    ];

    public function student() :BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function explanation() :BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
}
