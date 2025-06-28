<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Mode;
use App\Models\Student;
use App\Models\TimeLimit;
use App\Models\TmpRfid;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AttendanceApiController extends Controller
{
    public function handleScan()
    {
        $rfidData = TmpRfid::first();
        if (!$rfidData) {
            return response()->json(['error' => 'Tidak ada data RFID terdeteksi'], 400);
        }

        $user = Student::where('card_number', $rfidData->nokartu)->first();
        if (!$user) {
            TmpRfid::truncate();
            return response()->json(['error' => 'Kartu tidak terdaftar'], 404);
        }

        $modeSetting = Mode::first();
        if (!$modeSetting) {
            TmpRfid::truncate();
            return response()->json(['error' => 'Setting absen belum dikonfigurasi'], 400);
        }

        $currentDate = Carbon::now('Asia/Jakarta')->toDateString();
        $currentTime = Carbon::now('Asia/Jakarta')->toTimeString();
        $jamBatas = TimeLimit::first();

        $attendance = Student::where('card_number', $rfidData->nokartu)->first();

        if (!$attendance) {
            return response()->json(['error' => 'Data siswa tidak terdaftar.'], 400);
        }

        $attendance = Attendance::firstOrNew([
            'student_id' => $user->id,
            'attendance_date' => $currentDate,
        ]);

        if ($modeSetting->mode_name == "masuk" && $attendance->time_in) {
            return response()->json(['error' => 'Siswa sudah absen masuk hari ini.']);
        }

        if ($modeSetting->mode_name == "masuk") {
            $attendance->attendance_date = $currentDate;
            $attendance->time_in = $currentTime;

            $batasMasuk = $jamBatas->in;
            $jamAbsenMasuk = Carbon::parse($currentTime, 'Asia/Jakarta');

            if ($jamAbsenMasuk->greaterThan($batasMasuk)) {
                $attendance->status_id = 3;
                $message = "⚠️ *Absen Masuk - Terlambat*\n\n"
                    . "Halo *{$user->name}* 👋\n"
                    . "Kamu telah melakukan absen *MASUK*, namun sudah melewati batas waktu.\n\n"
                    . "🗓 Tanggal : {$currentDate}\n"
                    . "⏰ Jam     : {$currentTime}\n"
                    . "🚫 Status  : *Terlambat*\n\n"
                    . "Yuk, usahakan datang lebih awal agar tidak tertinggal materi yaa! 🎓💡";
            } else {
                $attendance->status_id = 2;
                $message = "🎉 *Absensi Tercatat!*\n\n"
                    . "Halo *{$user->name}* 👋\n"
                    . "Kamu baru saja absen *MASUK*.\n\n"
                    . "🗓 Tanggal : {$currentDate}\n"
                    . "⏰ Jam     : {$currentTime}\n\n"
                    . "Semoga harimu produktif dan penuh semangat! 🚀";
            }
        } else {
            if (!$attendance->time_in) {
                TmpRfid::truncate();
                return response()->json(['error' => 'Siswa belum absen masuk']);
            }

            $jamBatasPulang = $jamBatas->out;
            $jamAbsenPulang = Carbon::parse($currentTime, 'Asia/Jakarta');

            if ($jamAbsenPulang->lessThan($jamBatasPulang)) {
                TmpRfid::truncate();
                return response()->json([
                    'error' => 'Absen pulang hanya bisa dilakukan setelah jam ' . $jamBatasPulang
                ]);
            }

            $attendance->time_out = $currentTime;
            $message = "👋 *Sampai Jumpa!*\n\n"
                . "Halo *{$user->name}*,\n"
                . "Absen *PULANG* kamu sudah tercatat.\n\n"
                . "🗓 Tanggal : {$currentDate}\n"
                . "⏰ Jam     : {$currentTime}\n\n"
                . "Terima kasih sudah hadir hari ini.\n"
                . "Istirahat yang cukup dan sampai ketemu besok! 🙌";
        }

        $attendance->save();
        TmpRfid::truncate();

        // fonnte wa api
        // if ($user->telepon) {
        //     Http::withHeaders([
        //         'Authorization' => 'fhap9HxSkeENk3E9hzCw',
        //     ])->post('https://api.fonnte.com/send', [
        //         'target' => $user->telepon,
        //         'message' => $message,
        //     ]);
        // }

        return response()->json([
            'success' => 'Absen berhasil tercatat!',
            'card_number' => $rfidData->nokartu,
            'refresh' => true,
            'data' => [
                'user_id' => $attendance->user_id,
                'attendance_date' => $attendance->attendance_date,
                'time_in' => $attendance->time_in,
                'time_out' => $attendance->time_out,
                'status_id' => $attendance->status_id,
            ]
        ]);
    }
}
