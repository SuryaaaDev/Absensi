<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    /** @use HasFactory<\Database\Factories\AttendanceFactory> */
    use HasFactory;
    
    protected $fillable = [
        'student_id',
        'attendance_date',
        'time_in',
        'time_out',
        'status_id',
    ];

    public function student() :BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function status() :BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
}
