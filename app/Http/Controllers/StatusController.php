<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Status;
use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class StatusController extends Controller
{
    public function statuses()
    {
        $statuses = Status::all();
        $title = 'Hapus Data';
        $text = "Apakah anda yakin untuk menghapus data ini?";
        confirmDelete($title, $text);

        return view('admin.statuses', compact('statuses'));
    }

    public function addStatus(Request $request)
    {
        $validated = $request->validate([
            'status_name' => 'required|string',
        ]);

        $name = Str::ucfirst($request->status_name);

        $status = new Status();
        $status->status_name = $name;
        $status->save();
        Alert::success('Success', 'Status berhasil ditambahkan!');

        return back();
    }

    public function editStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status_name' => 'required|string|max:20',
        ]);

        $name = Str::ucfirst($request->status_name);

        $class = Status::findOrFail($id);
        $class->update([
            'status_name' => $name,
        ]);
        Alert::success('Success', 'Status berhasil diperbarui!');

        return back();
    }

    public function destroy($id)
    {
        $user = Status::findOrFail($id);
        $user->delete();
        Alert::success('Success', 'Status berhasil dihapus!');

        return back();
    }

    public function show($name)
    {
        $status = Status::where('status_name', 'like', $name)->firstOrFail();

        $studentIds = Attendance::where('status_id', $status->id)
            ->pluck('student_id')
            ->unique();

        $students = Student::whereIn('id', $studentIds)
            ->with('class')
            ->get();

        return view('admin.show-status', compact('students', 'status'));
    }
}
