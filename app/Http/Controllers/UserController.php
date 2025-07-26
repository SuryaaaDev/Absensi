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
use Laravolt\Avatar\Facade as Avatar;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    private function romawiToInteger($romawi)
    {
        $map = ['I' => 1, 'V' => 5, 'X' => 10, 'L' => 50, 'C' => 100, 'D' => 500, 'M' => 1000];
        $result = 0;
        $prev = 0;

        foreach (str_split(strtoupper($romawi)) as $char) {
            $value = $map[$char];
            $result += ($value > $prev) ? $value - 2 * $prev : $value;
            $prev = $value;
        }

        return $result;
    }

    public function students()
    {
        $client = new Client();
        $url = "http://localhost:8001/api/kartu";
        $response = $client->request('GET', $url);
        $rfidJson = $response->getBody()->getContents();
        $rfidArray = json_decode($rfidJson, true)['data'];

        $classes = StudentClass::all();
        $classes = $classes->sort(function ($a, $b) {
            preg_match('/^([IVXLCDM]+).*?([A-Z])$/i', $a->class_name, $matchA);
            preg_match('/^([IVXLCDM]+).*?([A-Z])$/i', $b->class_name, $matchB);

            $romawiA = $matchA[1] ?? '';
            $romawiB = $matchB[1] ?? '';
            $abjadA = strtoupper($matchA[2] ?? '');
            $abjadB = strtoupper($matchB[2] ?? '');

            $numA = $this->romawiToInteger($romawiA);
            $numB = $this->romawiToInteger($romawiB);

            return $numA === $numB
                ? strcmp($abjadA, $abjadB)
                : $numA <=> $numB;
        });

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
            'email' => 'required|email|unique:users,email',
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

        // $attendance = Attendance::create([
        //     'student_id' => $user->id,
        // ]);

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

    public function showStudent($id, $name)
    {
        $student = Student::with('class')->findOrFail($id);

        $profile = Avatar::create($student->name)->setDimension(128, 128)->toBase64();
        if (Str::slug($student->name) !== $name) {
            return redirect()->route('student.detail', [
                'id' => $student->id,
                'name' => Str::slug($student->name)
            ]);
        }
        $attendances = Attendance::with('status')
            ->where('student_id', $student->id)
            ->orderBy('attendance_date', 'desc')
            ->get();

        $presentCount = Attendance::where('student_id', $student->id)->where('status_id', 2)->count();
        $lateCount = Attendance::where('student_id', $student->id)->where('status_id', 3)->count();
        $permisCount = Attendance::where('student_id', $student->id)->whereNotIn('status_id', [1, 2, 3])->count();;
        $alphaCount = Attendance::where('student_id', $student->id)->where('status_id', 1)->count();

        return view('admin.student-detail', compact('student', 'profile', 'attendances', 'presentCount', 'lateCount', 'permisCount', 'alphaCount'));
    }
}
