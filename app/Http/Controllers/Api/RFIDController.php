<?php

namespace App\Http\Controllers\Api;

use App\Models\TmpRfid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\User;

class RFIDController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rfid = TmpRfid::all();

        return response()->json([
            'message' => 'No Kartu',
            'data' => $rfid
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nokartu = $request->query('nokartu');
        $source  = $request->query('source');
         
        if (!$nokartu || !$source) {
            return response()->json(['message' => 'No kartu atau source tidak ditemukan'], 400);
        }

        $device = Device::where('source', $source)->first();

        if (!$device) {
            return response()->json(['message' => 'Device tidak ditemukan'], 404);
        }

        TmpRfid::where('device_id', $device->id)->delete();

        $inserted = TmpRfid::create([
            'nokartu'   => $nokartu,
            'device_id' => $device->id
        ]);

        if ($inserted) {
            return response()->json([
                'message' => 'Berhasil',
                'data'    => $inserted,
            ], 200);
        } else {
            return response()->json(['message' => 'Gagal menyimpan'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
