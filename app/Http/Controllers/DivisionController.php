<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Mode;
use App\Models\Student;
use App\Models\Division;
use App\Models\TimeLimit;
use App\Models\Attendance;
use Illuminate\Support\Str;
use App\Models\StudentClass;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class DivisionController extends Controller
{
    private $apiUrl = 'http://localhost:8001/api/divisions';

    public function dashboard()
    {
        $response = Http::get($this->apiUrl . '/dashboard');

        if ($response->failed()) {
            abort(500, 'Gagal mengambil data dari API');
        }

        $data = $response->json();

        return view('division.dashboard', [
            'data' => $data,
            'saturdayStats' => collect($data['saturdayStats']),
            'divisionStats' => collect($data['divisionStats']),
        ]);
    }

    public function students()
    {
        $response = Http::get($this->apiUrl);
        $students = $response->json()['data'] ?? [];

        $grouped = collect($students)->groupBy(function ($student) {
            return $student['class']['class_name'] ?? 'Tanpa Kelas';
        });

        return view('division.students', [
            'groupedStudents' => $grouped
        ]);
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'division' => 'required|in:Web Development,Aplikasi,SIoT,Jaringan,DKV',
        ]);

        $response = Http::post($this->apiUrl . '/' . $id, [
            'student_id' => $id,
            'division' => $request->division,
        ]);

        if ($response->failed()) {
            Alert::error('Error', 'Gagal menambahkan divisi! Silakan coba lagi.');
            return redirect()->back();
        }

        Alert::success('Success', 'Divisi berhasil ditambahkan / diupdate.');
        return redirect()->back();
    }

    public function show($id, $name)
    {
        $response = Http::get($this->apiUrl . '/' . $id . '/' . Str::slug($name));
        if ($response->failed()) {
            Alert::error('Error', 'Gagal mengambil data siswa!');
            return back();
        }

        $data = $response->json()['data'] ?? [];
        $student = $data['student'] ?? null;
        $profile = $data['profile'] ?? null;

        return view('division.show-student', compact('student', 'profile'));
    }

    public function profile()
    {
        try {
            $response = Http::withToken(session('api_token'))
                ->get($this->apiUrl . '/profile');

            if (!session('api_token')) {
                Alert::error('Gagal', 'Token tidak ditemukan. Silakan login ulang.');
                return redirect()->back();
            }

            $data = $response->json()['data'] ?? [];
            $user = $data;

            return view('division.profile', compact('user'));
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function updateProfile(Request $request, $id)
    {
        try {
            if (!session('api_token')) {
                Alert::error('Gagal', 'Token tidak ditemukan. Silakan login ulang.');
                return redirect()->back();
            }

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'telephone' => 'nullable|string|max:20',
                'profile' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            ]);

            $http = Http::withToken(session('api_token'))->asMultipart();

            $response = Http::withToken(session('api_token'))->asMultipart()
                ->send('POST', $this->apiUrl . '/profile/update/' . $id, [
                    'multipart' => array_values(array_filter([
                        [
                            'name' => '_method',
                            'contents' => 'PUT',
                        ],
                        [
                            'name' => 'name',
                            'contents' => $request->name,
                        ],
                        [
                            'name' => 'email',
                            'contents' => $request->email,
                        ],
                        [
                            'name' => 'telephone',
                            'contents' => $request->telephone ?? '',
                        ],
                        $request->hasFile('profile')
                            ? [
                                'name' => 'profile',
                                'contents' => fopen($request->file('profile')->getRealPath(), 'r'),
                                'filename' => $request->file('profile')->getClientOriginalName(),
                            ]
                            : null,
                    ])),
                ]);

            if ($response->failed()) {
                $body = $response->json();
                $msg = $body['message'] ?? 'Terjadi kesalahan saat memperbarui profil.';
                Alert::error('Gagal', $msg);
                return redirect()->back()->withInput();
            }

            Alert::success('Berhasil', 'Profil berhasil diperbarui!');
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
}
