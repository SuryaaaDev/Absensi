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
use Illuminate\Support\Facades\Http;
use Laravolt\Avatar\Facade as Avatar;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    private $apiBase = 'http://localhost:8001/api/students';
    private $apiClass = 'http://localhost:8001/api/classes';
    private $apiRFID = 'http://localhost:8001/api/card';

    public function index()
    {
        $responseCard = Http::get($this->apiRFID);
        $rfidCard = $responseCard->json()['data'];

        $responseClass = Http::get($this->apiClass);
        $classes = $responseClass->json()['data'];

        $responseStudents = Http::get($this->apiBase);
        $students = $responseStudents->json()['data'];

        $title = 'Hapus Data';
        $text = "Apakah anda yakin untuk menghapus data ini?";
        confirmDelete($title, $text);

        return view('students.index', compact('rfidCard', 'classes', 'students'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'card_number' => 'required|string|max:50|unique:users,card_number',
            'profile' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'NISN' => 'required|string|max:12',
            'absen' => 'required|numeric|digits_between:1,2',
            'name' => 'required|string|max:75',
            'class_name' => 'required|exists:student_classes,id',
            'email' => 'required|email|unique:users,email',
            'telepon' => 'required|string|max:14',
            'parentPhone' => 'required|string|max:14',
            'address' => 'required|string|max:100',
            'password' => 'required|min:3',
        ]);

        $multipart = [];
        foreach ($validated as $key => $value) {
            if ($key !== 'profile') {
                $multipart[] = ['name' => $key, 'contents' => $value];
            }
        }

        if ($request->hasFile('profile')) {
            $multipart[] = [
                'name' => 'profile',
                'contents' => fopen($request->file('profile')->getPathname(), 'r'),
                'filename' => $request->file('profile')->getClientOriginalName(),
            ];
        }

        $response = Http::asMultipart()->post($this->apiBase . '/', $multipart);

        if ($response->failed()) {
            Alert::error('Error', 'Gagal menambahkan data siswa!');
            return back()->withInput();
        }

        Alert::success('Success', 'Data siswa berhasil ditambahkan!');
        return redirect()->back();
    }

    public function showStudent($id, $name)
    {
        $response = Http::get($this->apiBase . '/' . $id . '/' . Str::slug($name));
        if ($response->failed()) {
            Alert::error('Error', 'Gagal mengambil data siswa!');
            return back();
        }
        $data = $response->json()['data'] ?? [];
        $student = $data['student'] ?? null;
        $profile = $data['profile'] ?? null;
        $attendances = $data['attendances'] ?? [];
        $presentCount = $data['presentCount'] ?? 0;
        $lateCount = $data['lateCount'] ?? 0;
        $permisCount = $data['permisCount'] ?? 0;
        $alphaCount = $data['alphaCount'] ?? 0;

        return view('students.show', compact('student', 'profile', 'attendances', 'presentCount', 'lateCount', 'permisCount', 'alphaCount'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'card_number' => 'required|string|max:50|unique:users,card_number,' . $id,
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'NISN' => 'required|string|max:12',
            'absen' => 'required|numeric|digits_between:1,2',
            'name' => 'required|string|max:75',
            'class_name' => 'required|exists:student_classes,id',
            'email' => 'required|email|unique:users,email,' . $id,
            'telepon' => 'required|string|max:14',
            'parentPhone' => 'required|string|max:14',
            'address' => 'required|string|max:100',
            'password' => 'nullable|min:3',
        ]);

        $http = Http::asMultipart();

        if ($request->hasFile('profile')) {
            $http->attach(
                'profile',
                fopen($request->file('profile')->getPathname(), 'r'),
                $request->file('profile')->getClientOriginalName()
            );
        }

        $response = $http->post($this->apiBase . '/' . $id, array_merge($validated, [
            '_method' => 'PUT'
        ]));

        if ($response->failed()) {
            Alert::error('Error', 'Gagal memperbarui data siswa!');
            return back()->withInput();
        }
        Alert::success('Success', 'Data siswa berhasil diperbarui!');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $response = Http::delete($this->apiBase . '/' . $id);
        if ($response->failed()) {
            Alert::error('Error', 'Gagal menghapus data siswa!');
            return back();
        }
        Alert::success('Success', 'Data siswa berhasil dihapus!');

        return redirect()->back();
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

        return view('students.index', compact('students', 'classes'));
    }
}
