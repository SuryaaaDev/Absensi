<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Permission;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PermissionController extends Controller
{
    public function storePermission(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg|max:5120',
            'explanation' => 'required|exists:statuses,id',
        ]);

        $student = Auth::user()->id;

        $imagePath = $request->file('image')->store('permission', 'public');

        $permission = new Permission();
        $permission->student_id = $student;
        $permission->image = $imagePath;
        $permission->explanation_id = $request->explanation;
        $permission->date = now()->toDateString();
        $permission->save();
        Alert::success('Success', 'Permohonan ijin berhasil dikirim!');

        return redirect()->route('permission');
    }

    public function permissions()
    {
        $permissions = Permission::all();

        return view('admin.permissions', compact('permissions'));
    }

    public function rejected($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->status = 'ditolak';
        $permission->save();
        Alert::success('Success', 'Permohonan ijin berhasil ditolak!');

        return redirect()->back();
    }

    public function accepted($id)
    {
        $permission = Permission::with('explanation')->findOrFail($id);
        $permission->status = 'diterima';
        $permission->save();

        $attendanceStatus = $permission->explanation->id;
        $today = now()->toDateString();

        $attendance = Attendance::where('student_id', $permission->student_id)
            ->whereDate('attendance_date', $today)
            ->first();

        if ($attendance) {
            $attendance->status_id = $attendanceStatus;
            $attendance->save();
        } else {
            Attendance::create([
                'student_id' => $permission->student_id,
                'attendance_date' => $today,
                'time_in' => null, 
                'time_out' => null,
                'device_id' => null,
                'status_id' => $attendanceStatus,
            ]);
        }

        Alert::success('Success', 'Permohonan ijin berhasil diterima dan status absensi diperbarui!');
        return redirect()->back();
    }
}
