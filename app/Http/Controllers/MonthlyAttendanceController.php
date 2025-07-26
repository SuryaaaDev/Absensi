<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MonthlyAttendanceController extends Controller
{
    public function index()
    {
        Carbon::setLocale('id');

        $month = now()->format('Y-m');
        $daysInMonth = now()->daysInMonth;

        $dates = collect(range(1, $daysInMonth))->map(function ($day) use ($month) {
            return Carbon::parse("$month-" . str_pad($day, 2, '0', STR_PAD_LEFT))->format('Y-m-d');
        });

        $dateHeaders = $dates->map(function ($date) {
            $carbon = Carbon::parse($date);
            return [
                'full' => $carbon->format('Y-m-d'),
                'day' => $carbon->format('d'),
                'dow' => $carbon->translatedFormat('l'),
            ];
        });

        $students = Student::with(['attendance' => function ($query) use ($month) {
            $query->where('attendance_date', 'like', "$month%");
        }, 'class'])
            ->orderBy('absen')
            ->get();

        $status = Status::where('id', '>=', 4)->get();

        return view('admin.monthly-attendance', compact('students', 'dateHeaders', 'status'));
    }
}
