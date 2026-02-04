<?php

namespace App\Http\Controllers\Api;

use App\Models\Student;
use App\Models\Division;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Mode;
use App\Models\TimeLimit;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Laravolt\Avatar\Facade as Avatar;

class DivisionApiController extends Controller
{
    public function dashboard()
    {
        $today = Carbon::now('Asia/Jakarta')->toDateString();

        $totalStudents = Student::count();

        $presentToday = Attendance::whereDate('attendance_date', $today)
            ->whereIn('status_id', [2, 3])
            ->distinct('student_id')
            ->count('student_id');

        $modeObj = null;
        if (class_exists(Mode::class)) {
            $modeObj = Mode::first();
        }
        $mode = $modeObj?->mode_name ?? 'masuk';

        $timeLimit = null;
        if (class_exists(TimeLimit::class)) {
            $timeLimit = TimeLimit::first();
        }
        if (!$timeLimit && class_exists(TimeLimit::class)) {
            $timeLimit = TimeLimit::first();
        }

        $jamMasuk = $timeLimit?->in ?? '-';
        $jamPulang = $timeLimit?->out ?? '-';

        $start = Carbon::now('Asia/Jakarta')->subMonths(2)->startOfMonth();
        $end   = Carbon::now('Asia/Jakarta')->endOfMonth();

        $period = CarbonPeriod::create($start, $end)->filter(function ($date) {
            return $date->isSaturday();
        });

        $saturdayDates = collect($period)->map(fn($d) => $d->toDateString());

        $attendanceSaturday = Attendance::select(DB::raw('DATE(attendance_date) as tanggal'), DB::raw('COUNT(DISTINCT student_id) as total'))
            ->whereIn('status_id', [2, 3])
            ->whereBetween('attendance_date', [$start, $end])
            ->whereRaw('DAYOFWEEK(attendance_date) = 7')
            ->groupBy('tanggal')
            ->pluck('total', 'tanggal');

        $saturdayStats = $saturdayDates->map(function ($tgl) use ($attendanceSaturday) {
            return [
                'tanggal' => $tgl,
                'total'   => $attendanceSaturday[$tgl] ?? 0
            ];
        });

        $divisionStats = Division::select('division', DB::raw('count(*) as total'))
            ->groupBy('division')
            ->get();

        return response()->json([
            'totalStudents' => $totalStudents,
            'presentToday'  => $presentToday,
            'mode'          => $mode,
            'jamMasuk'      => $jamMasuk,
            'jamPulang'     => $jamPulang,
            'saturdayStats' => $saturdayStats,
            'divisionStats' => $divisionStats,
        ], 200);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with(['division', 'class'])
            ->where('role', 'student')
            ->whereHas('class', function ($query) {
                $query->where('class_name', 'like', 'X %');
            })
            ->orderBy('class_id')
            ->orderBy('absen')
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'List of students with division',
            'data' => $students
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'required|exists:users,id',
            'division' => 'required|in:Web Development,Aplikasi,SIoT,Jaringan,DKV',
        ]);

        $division = Division::updateOrCreate(
            ['student_id' => $id],
            ['division' => $request->division]
        );

        return response()->json([
            'success' => true,
            'message' => 'Division added/updated successfully',
            'data' => $division
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, $name)
    {
        $student = Student::with('class')->findOrFail($id);

        if (Str::slug($student->name) !== $name) {
            return redirect()->route('student.detail', [
                'id' => $student->id,
                'name' => Str::slug($student->name)
            ]);
        }

        $profile = Avatar::create($student->name)->setDimension(128, 128)->toBase64();
        if (Str::slug($student->name) !== $name) {
            return redirect()->route('student.detail', [
                'id' => $student->id,
                'name' => Str::slug($student->name)
            ]);
        }

        $attendances = Attendance::with('status')
            ->where('student_id', $student->id)
            ->orderBy('attendance_date', 'desc')
            ->get();

        $presentCount = Attendance::where('student_id', $student->id)->where('status_id', 2)->count();
        $lateCount = Attendance::where('student_id', $student->id)->where('status_id', 3)->count();
        $permisCount = Attendance::where('student_id', $student->id)->whereNotIn('status_id', [1, 2, 3])->count();;
        $alphaCount = Attendance::where('student_id', $student->id)->where('status_id', 1)->count();

        return response()->json([
            'success' => true,
            'message' => 'Student detail.',
            'data' => [
                'profile' => $profile,
                'student' => $student,
                'attendances' => $attendances,
                'presentCount' => $presentCount,
                'lateCount' => $lateCount,
                'permisCount' => $permisCount,
                'alphaCount' => $alphaCount
            ],
        ], 200);
    }

    public function profile()
    {
        $user = auth('sanctum')->user();
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized',
            ], 401);
        }

        return response()->json([
            'success' => true,
            'message' => 'User profile',
            'data' => $user
        ], 200);
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

            $user->fill($request->only(['name', 'email', 'telephone']));

            if ($request->hasFile('profile')) {
                if ($user->profile && Storage::disk('public')->exists($user->profile)) {
                    Storage::disk('public')->delete($user->profile);
                }

                $path = $request->file('profile')->store('profiles', 'public');
                $user->profile = $path;
            }

            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'Profil berhasil diperbarui',
                'data' => $user
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
