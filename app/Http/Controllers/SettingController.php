<?php

namespace App\Http\Controllers;

use App\Models\Mode;
use App\Models\TimeLimit;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SettingController extends Controller
{
    public function settings()
    {
        $mode = Mode::first();
        $modeName = ucfirst($mode->mode_name);
        $timeLimit = TimeLimit::first();

        return view('admin.settings', compact('modeName', 'timeLimit'));
    }

    public function mode(Request $request)
    {
        $currentMode = Mode::first();

        $newMode = ($currentMode && $currentMode->mode_name === 'masuk') ? 'pulang' : 'masuk';

        Mode::truncate();

        Mode::create([
            'mode_name' => $newMode,
        ]);
        Alert::success('Success', 'Mode absen berhasil diperbarui!');

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
}
