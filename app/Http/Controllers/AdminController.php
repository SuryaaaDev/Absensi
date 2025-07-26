<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Student;
use App\Models\Attendance;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function dashboard()
    {
        $today = now()->toDateString();

        $totalStudents = Student::count();
        $presentToday = Attendance::whereDate('attendance_date', $today)
            ->whereHas('status', function ($q) {
                $q->where('status_name', 'Hadir');
            })->count();
        $permitToday = Attendance::whereDate('attendance_date', $today)
            ->whereHas('status', function ($q) {
                $q->whereNotIn('status_name', ['Alpha', 'Terlambat', 'Hadir']);
            })
            ->count();
        $alphaToday = Attendance::whereDate('attendance_date', $today)
            ->whereHas('status', function ($q) {
                $q->where('status_name', 'Alpha');
            })->count();

        // Chart data: attendance per day (last 7 days)
        $last7Days = collect(range(0, 6))->map(function ($i) {
            return now()->subDays($i)->format('Y-m-d');
        })->reverse();

        $attendancePerDay = $last7Days->map(function ($date) {
            return [
                'date' => $date,
                'count' => Attendance::whereDate('attendance_date', $date)
                    ->whereHas('status', function ($q) {
                        $q->where('status_name', 'Hadir');
                    })->count()
            ];
        });

        // Pie chart data: status distribution
        $rawStatusCounts = Status::withCount(['attendance' => function ($q) use ($today) {
            $q->whereDate('attendance_date', $today);
        }])->get();

        // Filter yang attendance_count > 0
        $filtered = $rawStatusCounts->filter(fn($s) => $s->attendance_count > 0)->values();

        $pieLabels = $filtered->pluck('status_name')->values();
        $pieData = $filtered->pluck('attendance_count')->values();
        $pieColors = $filtered->map(function ($s) {
            return match (Str::lower($s->status_name)) {
                'alpha' => '#ef4444',
                'hadir' => '#10b981',
                'terlambat' => '#3b82f6',
                default => '#facc15',
            };
        })->values();

        $recentAttendances = Attendance::with(['student', 'status'])
            ->orderByDesc('attendance_date')
            ->orderByDesc('time_in')
            ->limit(12)
            ->get();

        return view('admin.dashboard', compact(
            'totalStudents',
            'presentToday',
            'permitToday',
            'alphaToday',
            'attendancePerDay',
            'pieLabels',
            'pieData',
            'pieColors',
            'recentAttendances'
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

    public function updateProfile(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:75',
            'email' => 'required|email',
            'telepon' => 'required|string|max:14',
            'password' => 'nullable|min:3',
        ]);

        $name = Str::title($request->name);

        $user = User::findOrFail($id);
        $user->name = $name;
        $user->email = $request->email;
        $user->telepon = $request->telepon;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();
        Alert::success('Success', 'Profil berhasil diperbarui!');

        return redirect()->back();
    }
}
