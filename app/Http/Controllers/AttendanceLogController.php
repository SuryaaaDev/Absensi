<?php

namespace App\Http\Controllers;

use App\Models\AttendanceLog;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AttendanceLogController extends Controller
{
    public function index()
    {
        return view('admin.attendance-logs');
    }

    public function json(Request $request)
    {
        $perPage = 50;

        $query = AttendanceLog::with('student')->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('date')) {
            $startOfDay = Carbon::parse($request->date, 'Asia/Jakarta')->startOfDay()->setTimezone('UTC');
            $endOfDay   = Carbon::parse($request->date, 'Asia/Jakarta')->endOfDay()->setTimezone('UTC');

            $query->whereBetween('created_at', [$startOfDay, $endOfDay]);
        }

        $logs = $query->paginate($perPage);

        return response()->json($logs);
    }

    public function delete(Request $request)
    {
        try {
            if ($request->filled('date')) {
                $startOfDay = Carbon::parse($request->date, 'Asia/Jakarta')->startOfDay()->setTimezone('UTC');
                $endOfDay   = Carbon::parse($request->date, 'Asia/Jakarta')->endOfDay()->setTimezone('UTC');

                $deleted = AttendanceLog::whereBetween('created_at', [$startOfDay, $endOfDay])
                    ->delete();

                return response()->json([
                    'success' => true,
                    'message' => "Berhasil menghapus {$deleted} log pada tanggal {$request->date}."
                ]);
            } else {
                $deleted = AttendanceLog::delete();

                return response()->json([
                    'success' => true,
                    'message' => "Semua log absensi berhasil dihapus."
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }
}
