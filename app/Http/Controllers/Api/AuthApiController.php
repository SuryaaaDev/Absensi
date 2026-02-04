<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthApiController extends Controller
{
    public function welcome()
    {
        $totalStudents = Student::count();
        $totalAttendances = Attendance::count();

        $totalHadir = Attendance::where('status_id', 2)->count();
        $attendanceAccuracy = $totalAttendances > 0
            ? round(($totalHadir / $totalAttendances) * 100, 2)
            : 0;

        return response()->json([
            'totalStudents' => $totalStudents,
            'totalAttendances' => $totalAttendances,
            'attendanceAccuracy' => $attendanceAccuracy,
        ]);
    }

    public function login(Request $request)
    {
        $data = $request->only('email', 'password');

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3',
        ]);

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Email atau password salah',
            ], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Login berhasil',
            'role' => $user->role,
            'token' => $token
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Logout berhasil',
        ]);
    }
}
