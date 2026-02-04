<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Mode;
use App\Models\Status;
use App\Models\TimeLimit;
use App\Models\TmpRfid;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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

    public function manualAbsen(Request $request)
    {
        $user = auth()->user();
        $modeSetting = Mode::first();

        if ($modeSetting->absen_mode !== 'manual') {
            Alert::error('Error', 'Mode saat ini RFID, absen manual tidak tersedia.');
            return back();
        }

        $currentDate = Carbon::now('Asia/Jakarta')->toDateString();
        $currentTime = Carbon::now('Asia/Jakarta')->toTimeString();
        $jamBatas = TimeLimit::first();

        $hari = Carbon::now('Asia/Jakarta')->dayOfWeek;
        $type = ($hari == 6) ? 'divisi' : 'siswa';

        $attendance = Attendance::firstOrNew([
            'student_id' => $user->id,
            'attendance_date' => $currentDate,
            'type' => $type,
        ]);

        if ($modeSetting->mode_name == 'masuk') {
            if ($attendance->time_in) {
                Alert::error('Error', 'Kamu sudah absen masuk hari ini.');
                return back();
            }
            $attendance->time_in = $currentTime;

            $batasMasuk = Carbon::parse($jamBatas->in, 'Asia/Jakarta');
            $jamAbsenMasuk = Carbon::parse($currentTime, 'Asia/Jakarta');

            if ($jamAbsenMasuk->greaterThan($batasMasuk)) {
                $attendance->status_id = 3;
            } else {
                $attendance->status_id = 2;
            }

            $attendance->save();

            Alert::success('Success', 'Absen masuk berhasil!');
            return back();
        } else {
            if (!$attendance->time_in) {
                Alert::error('Error', 'Kamu belum absen masuk.');
                return back();
            }
            if ($attendance->time_out) {
                Alert::error('Error', 'Kamu sudah absen pulang hari ini.');
                return back();
            }

            $jamBatasPulang = Carbon::parse($jamBatas->out, 'Asia/Jakarta');
            $jamAbsenPulang = Carbon::parse($currentTime, 'Asia/Jakarta');

            if ($jamAbsenPulang->lessThan($jamBatasPulang)) {
                Alert::warning('Warning', 'Absen pulang hanya bisa dilakukan setelah jam ' . $jamBatas->out . '!');
                return back();
            }
            $attendance->time_out = $currentTime;
            $attendance->save();

            Alert::success('Success', 'Absen pulang berhasil!');
            return back();
        }
    }
}
