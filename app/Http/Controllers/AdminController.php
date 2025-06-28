<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Mode;
use App\Models\Permission;
use App\Models\Status;
use App\Models\Student;
use App\Models\StudentClass;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $today = now()->toDateString();

        $totalStudents = Student::count();
        $presentToday = Attendance::whereDate('attendance_date', $today)->count();
        $lateToday = Attendance::whereDate('attendance_date', $today)
                                ->whereHas('status', function ($q) {
                                    $q->where('status_name', 'Terlambat');
                                })->count();

        // Chart data: attendance per day (last 7 days)
        $last7Days = collect(range(0, 6))->map(function ($i) {
            return now()->subDays($i)->format('Y-m-d');
        })->reverse();

        $attendancePerDay = $last7Days->map(function ($date) {
            return [
                'date' => $date,
                'count' => Attendance::whereDate('attendance_date', $date)->count()
            ];
        });

        // Pie chart data: status distribution
        $statusCounts = Status::withCount(['attendance' => function ($q) use ($today) {
            $q->whereDate('attendance_date', $today);
        }])->get();

        // Recent attendance records
        $recentAttendances = Attendance::with(['student', 'status'])
            ->orderByDesc('attendance_date')
            ->orderByDesc('time_in')
            ->limit(10)
            ->get();

        return view('admin.dashboard', compact(
            'totalStudents', 'presentToday', 'lateToday',
            'attendancePerDay', 'statusCounts', 'recentAttendances'
        ));
    }

    public function profileAdmin()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        return view('admin.profile', compact('user'));
    }
}
