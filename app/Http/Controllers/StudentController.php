<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Attendance;
use App\Models\Permission;
use App\Models\StudentClass;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function profile()
    {
        $user = Auth::guard('student')->user();
        if (!$user) {
            return redirect()->route('login');
        }

        return view('student.profile', compact('user'));
    }

    public function student()
    {
        $user = Auth::guard('student')->user();
        if (!$user) {
            return redirect()->route('login');
        }

        $attendances = Attendance::with('student')
            ->where('student_id', $user->id)
            ->get();

        $statuses = Status::all();

        return view('student.index', compact('attendances', 'statuses'));
    }

    public function history()
    {
        $user = Auth::guard('student')->user();
        if (!$user) {
            return redirect()->route('login');
        }

        $permissions = Permission::with('student')
            ->where('student_id', $user->id)
            ->get();

        $attendances = Attendance::with('student')
            ->where('student_id', $user->id)
            ->get();
        $explanation = Status::all();

        return view('student.history', compact('permissions', 'attendances', 'explanation'));
    }

    public function permission()
    {
        $user = Auth::guard('student')->user();
        if (!$user) {
            return redirect()->route('login');
        }

        $classes = StudentClass::all();
        $statuses = Status::all()->slice(3)->values();

        return view('student.permission', compact('user', 'classes', 'statuses'));
    }

    public function assistance()
    {
        return view('student.assistance');
    }
}
