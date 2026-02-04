<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceLog extends Model
{
    /** @use HasFactory<\Database\Factories\AttendanceLogFactory> */
    use HasFactory;
    
    protected $fillable = [
        'student_id',
        'card_number',
        'status',
        'message',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
