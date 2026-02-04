<?php

namespace App\Http\Controllers;

use App\Models\Mode;
use App\Models\TimeLimit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SettingController extends Controller
{
    public function settings()
    {
        $mode = Mode::first();
        $timeLimit = TimeLimit::first();

        return view('admin.settings', compact('mode', 'timeLimit'));
    }

    public function mode(Request $request)
    {
        $currentMode = Mode::first();

        if (!$currentMode) {
            $currentMode = Mode::create([
                'mode_name' => 'masuk',
                'absen_mode' => 'rfid',
            ]);
        }

        if ($request->has('toggle_mode_name')) {
            $newMode = $currentMode->mode_name === 'masuk' ? 'pulang' : 'masuk';
            $currentMode->mode_name = $newMode;
            $currentMode->save();

            Alert::success('Success', 'Mode absen berhasil diperbarui!');
        }

        if ($request->has('toggle_absen_mode')) {
            $newAbsenMode = $currentMode->absen_mode === 'rfid' ? 'manual' : 'rfid';
            $currentMode->absen_mode = $newAbsenMode;
            $currentMode->save();

            Alert::success('Success', 'Tipe absen berhasil diperbarui!');
        }

        return redirect()->route('settings');
    }

    public function time(Request $request)
    {
        $request->validate([
            'in' => 'required',
            'out' => 'required',
        ]);

        $timeLimit = TimeLimit::first();

        if (!$timeLimit) {
            $timeLimit = new TimeLimit();
        }

        $timeLimit->in = $request->in;
        $timeLimit->out = $request->out;
        $timeLimit->save();

        Alert::success('Success', 'Batas waktu berhasil diperbarui!');
        return redirect()->back()->with('success', 'Waktu berhasil disimpan.');
    }

    public function settingsDivision()
    {
        $mode = Mode::first() ?? new Mode(['mode_name' => 'masuk']);
        $timeLimit = TimeLimit::first();

        return view('division.settings', compact('mode', 'timeLimit'));
    }

    public function modeDivision(Request $request)
    {
        if (!Carbon::now('Asia/Jakarta')->isSaturday()) {
            Alert::error('Error', 'Ganti mode divisi hanya bisa dilakukan hari Sabtu!');
            return redirect()->back();
        }

        $currentMode = Mode::first();

        if (!$currentMode) {
            $currentMode = Mode::create([
                'mode_name' => 'masuk',
                'absen_mode' => 'rfid',
            ]);
        }

        if ($request->has('toggle_mode_name')) {
            $newMode = $currentMode->mode_name === 'masuk' ? 'pulang' : 'masuk';
            $currentMode->mode_name = $newMode;
            $currentMode->save();

            Alert::success('Success', 'Mode absen berhasil diperbarui!');
        }

        if ($request->has('toggle_absen_mode')) {
            $newAbsenMode = $currentMode->absen_mode === 'rfid' ? 'manual' : 'rfid';
            $currentMode->absen_mode = $newAbsenMode;
            $currentMode->save();

            Alert::success('Success', 'Tipe absen berhasil diperbarui!');
        }

        return redirect()->back();
    }

    public function timeDivision(Request $request)
    {
        if (!Carbon::now('Asia/Jakarta')->isSaturday()) {
            Alert::error('Error', 'Atur batas waktu divisi hanya bisa dilakukan hari Sabtu!');
            return redirect()->back();
        }

        $request->validate([
            'in' => 'required',
            'out' => 'required',
        ]);

        $timeLimit = TimeLimit::first();

        if (!$timeLimit) {
            $timeLimit = new TimeLimit();
        }

        $timeLimit->in = $request->in;
        $timeLimit->out = $request->out;
        $timeLimit->save();

        Alert::success('Success', 'Batas waktu divisi berhasil diperbarui!');
        return redirect()->back();
    }
}
