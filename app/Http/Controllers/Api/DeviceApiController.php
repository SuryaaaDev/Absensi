<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Device;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DeviceApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $today = Carbon::today();

        $devices = Device::all()->map(function ($device) use ($today) {
            $attendanceCount = Attendance::where('device_id', $device->id)
                ->whereDate('created_at', $today)
                ->count();

            return [
                'id' => $device->id,
                'location' => $device->location,
                'source' => $device->source,
                'attendance' => $attendanceCount,
            ];
        });

        return response()->json([
            'success' => true,
            'message' => 'Devices retrieved successfully.',
            'data' => $devices
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $today = Carbon::today();

        $device = Device::with([
            'attendances' => function ($query) use ($today) {
                $query->with(['student.class', 'status'])
                    ->whereDate('created_at', $today);
            }
        ])->findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Device retrieved successfully.',
            'data' => $device
        ]);
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
