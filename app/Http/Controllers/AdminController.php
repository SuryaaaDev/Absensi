<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Student;
use App\Models\Attendance;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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

        $rawStatusCounts = Status::withCount(['attendance' => function ($q) use ($today) {
            $q->whereDate('attendance_date', $today);
        }])->get();

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
        try {
            $user = User::findOrFail($id);

            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email,' . $user->id,
                'telephone' => 'nullable|string|max:20',
                'profile' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            ]);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->telephone = $request->telephone;

            if ($request->hasFile('profile')) {
                if ($user->profile && Storage::disk('public')->exists($user->profile)) {
                    Storage::disk('public')->delete($user->profile);
                }

                $path = $request->file('profile')->store('profiles', 'public');
                $user->profile = $path;
            }

            $user->save();

            Alert::success('Berhasil', 'Profil berhasil diperbarui!');
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
