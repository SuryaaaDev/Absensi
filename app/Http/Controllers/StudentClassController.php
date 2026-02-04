<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class StudentClassController extends Controller
{
    private $apiBase = 'http://localhost:8001/api/classes';

    public function index()
    {
        $response = Http::get($this->apiBase);
        $classes = $response->json()['data'];

        $title = 'Hapus Data';
        $text = "Apakah anda yakin untuk menghapus data ini?";
        confirmDelete($title, $text);

        return view('classes.index', compact('classes'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'class_name' => 'regex:/^([IVXLCDM]+)[\s\S]*[A-Z]$/i'
        ]);

        $response = Http::post($this->apiBase . '/', $validated);

        if ($response->failed()) {
            Alert::error('Error', 'Gagal menambahkan kelas!');
            return back()->withInput();
        }
        Alert::success('Success', 'Kelas berhasil ditambahkan!');

        return back();
    }

    public function show($id, $slug)
    {
        $response = Http::get($this->apiBase . '/' . $id . '/' . $slug);
        if ($response->failed()) {
            abort(404);
        }
        $data = $response->json()['data'] ?? [];
        $class = $data['class'] ?? null;
        $students = $data['students'] ?? [];

        return view('classes.show', compact('class', 'students'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'class_name' => 'regex:/^([IVXLCDM]+)[\s\S]*[A-Z]$/i'
        ]);

        $response = Http::put($this->apiBase . '/' . $id, $validated);

        if ($response->failed()) {
            Alert::error('Error', 'Gagal memperbarui kelas!');
            return back()->withInput();
        }
        Alert::success('Success', 'Kelas berhasil diperbarui!');

        return back();
    }

    public function destroy($id)
    {
        $response = Http::delete($this->apiBase . '/' . $id);
        if ($response->failed()) {
            Alert::error('Error', 'Gagal menghapus kelas!');
            return back();
        }
        Alert::success('Success', 'Kelas berhasil dihapus!');

        return back();
    }
}
