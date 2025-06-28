<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Client;
use App\Models\Attendance;
use App\Models\Student;
use Illuminate\Support\Str;
use App\Models\StudentClass;
use App\Models\TmpRfid;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function students()
    {
        $client = new Client();
        $url = "http://localhost:8001/api/kartu";
        $response = $client->request('GET', $url);
        $rfidJson = $response->getBody()->getContents();
        $rfidArray = json_decode($rfidJson, true)['data'];

        $classes = StudentClass::all();
        $students = Student::orderBy('absen', 'asc')->get();

        $title = 'Hapus Data';
        $text = "Apakah anda yakin untuk menghapus data ini?";
        confirmDelete($title, $text);

        return view('admin.students', compact('students', 'rfidArray', 'classes'));
    }


    public function addUser(Request $request)
    {
        $validated = $request->validate([
            'card_number' => 'required|string|max:50',
            'absen' => 'required|numeric|max:99',
            'name' => 'required|string|max:75',
            'class_name' => 'required',
            'class_name.*' => 'exists:student_classes,id',
            'email' => 'required|email',
            'telepon' => 'required|string|max:14',
            'password' => 'required|min:3',
        ]);

        $name = Str::title($request->name);

        $user = new User();
        $user->card_number = $request->card_number;
        $user->absen = $request->absen;
        $user->name = $name;
        $user->class_id = $request->class_name;
        $user->email = $request->email;
        $user->telepon = $request->telepon;
        $user->password = bcrypt($request->password);
        $user->save();

        $attendance = Attendance::create([
            'student_id' => $user->id,
        ]);

        TmpRfid::truncate();
        Alert::success('Success', 'Data siswa berhasil ditambahkan!');

        return redirect()->route('students');
    }

    public function updateUser(Request $request, $id)
    {
        $validated = $request->validate([
            'card_number' => 'required|string|max:50',
            'absen' => 'required|numeric|max:99',
            'name' => 'required|string|max:75',
            'class_name' => 'required|exists:student_classes,id',
            'email' => 'required|email',
            'telepon' => 'required|string|max:14',
            'password' => 'nullable|min:3',
        ]);

        $name = Str::title($request->name);

        $user = Student::findOrFail($id);
        $user->card_number = $request->card_number;
        $user->absen = $request->absen;
        $user->name = $name;
        $user->class_id = $request->class_name;
        $user->email = $request->email;
        $user->telepon = $request->telepon;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();
        Alert::success('Success', 'Data siswa berhasil diperbarui!');

        return redirect()->route('students');
    }

    public function destroy($id)
    {
        $user = Student::findOrFail($id);
        $user->delete();
        Alert::success('Success', 'Data siswa berhasil dihapus!');

        return redirect()->route('students');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $students = Student::query()
            ->when($query, function ($q) use ($query) {
                return $q->where('name', 'like', "%{$query}%")
                    ->orWhere('absen', 'like', "%{$query}%")
                    ->orWhere('email', 'like', "%{$query}%")
                    ->orWhere('telepon', 'like', "%{$query}%")
                    ->orWhereHas('class', function ($q) use ($query) {
                        $q->where('class_name', 'like', "%{$query}%");
                    });
            })
            ->with('class')
            ->paginate(10);
        $classes = StudentClass::all();

        return view('admin.students', compact('students', 'classes'));
    }
}
