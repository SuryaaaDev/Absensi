<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Status;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AttendanceController extends Controller
{
    public function attendances()
    {
        $attendances = Attendance::select('attendances.*')
            ->join('users', 'attendances.student_id', '=', 'users.id')
            ->orderBy('users.absen', 'asc')
            ->with('student')
            ->get();
        $statuses = Status::all();

        return view('admin.attendance', compact('attendances', 'statuses'));
    }

    public function attendanceTable()
    {
        $attendances = Attendance::select('attendances.*')
            ->join('users', 'attendances.student_id', '=', 'users.id')
            ->orderBy('users.absen', 'asc')
            ->with('student')
            ->get();
        $statuses = Status::all();

        return view('admin.attendance-table', compact('attendances', 'statuses'));
    }

    public function updateStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|exists:statuses,id',
        ]);

        $status = Attendance::findOrFail($id);
        
        $status->status_id = $request->status;
        $status->save();
        Alert::success('Success', 'Data status kehadiran siswa berhasil diperbarui!');

        return redirect()->back();
    }
}
