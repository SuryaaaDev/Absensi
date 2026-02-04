<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Student;
use App\Models\StudentClass;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Colors\Rgb\Channels\Red;

class MonthlyAttendanceController extends Controller
{
    public function indexStudent()
    {
        Carbon::setLocale('id');

        $month = now()->format('Y-m');
        $daysInMonth = now()->daysInMonth;

        // Buat daftar tanggal dalam bulan ini
        $dates = collect(range(1, $daysInMonth))->map(function ($day) use ($month) {
            return Carbon::parse("$month-" . str_pad($day, 2, '0', STR_PAD_LEFT))->format('Y-m-d');
        });

        // Header tanggal untuk tabel
        $dateHeaders = $dates->map(function ($date) {
            $carbon = Carbon::parse($date);
            return [
                'full' => $carbon->format('Y-m-d'),
                'day'  => $carbon->format('d'),
                'dow'  => $carbon->translatedFormat('l'),
                'is_sunday' => $carbon->isSunday(),
            ];
        });

        // Ambil data siswa + absensi bulan ini
        $students = Student::with(['attendance' => function ($query) use ($month) {
            $query->where('attendance_date', 'like', "$month%")
                ->where('type', 'siswa');
        }, 'class'])
            ->orderBy('absen')
            ->get();

        // Format absensi per siswa
        $students = $students->map(function ($student) use ($dateHeaders) {
            $attendanceData = [];
            foreach ($dateHeaders as $header) {
                $record = $student->attendance->firstWhere('attendance_date', $header['full']);

                if ($header['is_sunday']) {
                    $attendanceData[$header['full']] = [
                        'type' => 'holiday',
                        'label' => 'LIBUR',
                    ];
                } elseif ($record) {
                    // Tentukan default tampilan
                    $display = null;

                    if (in_array($record->status_id, [1, 2, 3])) {
                        $display = [
                            'time_in'  => $record->time_in ? Carbon::parse($record->time_in)->format('H:i') : '-',
                            'time_out' => $record->time_out ? Carbon::parse($record->time_out)->format('H:i') : null,
                        ];
                    } else {
                        // Ambil huruf depan status_name
                        $statusName = $record->status?->status_name ?? '';
                        $display = [
                            'abbr' => $statusName ? strtoupper(mb_substr($statusName, 0, 1)) : '-',
                        ];
                    }

                    $attendanceData[$header['full']] = [
                        'type'    => 'record',
                        'display' => $display,
                        'bgClass' => match ($record->status_id) {
                            1 => 'bg-red-200 text-red-700',        // Alpha
                            2 => 'bg-emerald-200 text-emerald-700', // Hadir
                            3 => 'bg-blue-200 text-blue-700',      // Terlambat
                            default => 'bg-amber-200 text-yellow-700',
                        },
                    ];
                } else {
                    $attendanceData[$header['full']] = [
                        'type' => 'empty',
                        'label' => '-',
                    ];
                }
            }

            $student->attendanceData = $attendanceData;
            return $student;
        });

        $status = Status::where('id', '>=', 4)->get();

        return view('admin.monthly-attendance', compact('students', 'dateHeaders', 'status'));
    }

    public function indexDivisi(Request $request)
    {
        Carbon::setLocale('id');

        // Ambil bulan dari request (default bulan ini)
        $currentMonth = $request->get('month', now()->format('Y-m'));
        $daysInMonth = Carbon::parse($currentMonth . '-01')->daysInMonth;

        // Daftar tanggal bulan terpilih
        $dates = collect(range(1, $daysInMonth))->map(function ($day) use ($currentMonth) {
            return Carbon::parse("$currentMonth-" . str_pad($day, 2, '0', STR_PAD_LEFT))->format('Y-m-d');
        });

        // Header tanggal hanya untuk Sabtu
        $dateHeaders = $dates->map(function ($date) {
            $carbon = Carbon::parse($date);
            return [
                'full' => $carbon->format('Y-m-d'),
                'day'  => $carbon->format('d'),
                'dow'  => $carbon->translatedFormat('l'),
                'is_saturday' => $carbon->isSaturday(),
            ];
        });

        // Ambil hanya kelas X SIJA A dan X SIJA B
        $classes = StudentClass::where('class_name', 'like', 'X %')
            ->orderBy('class_name')
            ->get();

        // Ambil data siswa + absensi bulan terpilih
        $students = Student::with(['attendance' => function ($query) use ($currentMonth) {
            $query->where('attendance_date', 'like', "$currentMonth%")
                ->where('type', 'divisi');
        }, 'class', 'division'])
            ->whereHas('class', function ($q) {
                $q->where('class_name', 'like', 'X %');
            })
            ->orderBy('absen')
            ->get();


        // Format absensi per siswa
        $students = $students->map(function ($student) use ($dateHeaders) {
            $attendanceData = [];
            foreach ($dateHeaders as $header) {
                if ($header['is_saturday']) {
                    $record = $student->attendance->firstWhere('attendance_date', $header['full']);
                    if ($record) {
                        if (in_array($record->status_id, [1, 2, 3])) {
                            $display = [
                                'time_in'  => $record->time_in ? Carbon::parse($record->time_in)->format('H:i') : '-',
                                'time_out' => $record->time_out ? Carbon::parse($record->time_out)->format('H:i') : null,
                            ];
                        } else {
                            $statusName = $record->status?->status_name ?? '';
                            $display = [
                                'abbr' => $statusName ? strtoupper(mb_substr($statusName, 0, 1)) : '-',
                            ];
                        }

                        $attendanceData[$header['full']] = [
                            'type'    => 'record',
                            'display' => $display,
                            'bgClass' => match ($record->status_id) {
                                1 => 'bg-red-200 text-red-700',        // Alpha
                                2 => 'bg-emerald-200 text-emerald-700', // Hadir
                                3 => 'bg-blue-200 text-blue-700',      // Terlambat
                                default => 'bg-amber-200 text-yellow-700',
                            },
                        ];
                    } else {
                        $attendanceData[$header['full']] = [
                            'type' => 'empty',
                            'label' => '-',
                        ];
                    }
                }
            }
            $student->attendanceData = $attendanceData;
            return $student;
        });

        // Buat daftar bulan tersedia (misal mundur 6 bulan)
        $availableMonths = collect(range(0, 11))->map(function ($i) {
            $date = now()->subMonths($i);
            return [
                'value' => $date->format('Y-m'),
                'label' => $date->translatedFormat('F Y'),
            ];
        })->reverse();

        $status = Status::where('id', '>=', 4)->get();

        return view('division.attendance', compact('students', 'dateHeaders', 'classes', 'status', 'availableMonths', 'currentMonth'));
    }
}
