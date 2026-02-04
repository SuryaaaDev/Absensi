<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class StatusController extends Controller
{
    private $apiBase = 'http://localhost:8001/api/statuses';

    public function index()
    {
        $response = Http::get($this->apiBase . '/');
        $statuses = $response->json()['data'] ?? [];

        $title = 'Hapus Data';
        $text = "Apakah anda yakin untuk menghapus data ini?";
        confirmDelete($title, $text);

        return view('statuses.index', compact('statuses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'status_name' => 'required|string|max:20',
        ]);

        $response = Http::post($this->apiBase . '/', $validated);

        if ($response->failed()) {
            Alert::error('Error', 'Gagal menambahkan status!');
            return back()->withInput();
        }
        Alert::success('Success', 'Status berhasil ditambahkan!');

        return back();
    }

    public function show($name)
    {
        $response = Http::get($this->apiBase . '/' . $name);
        if ($response->failed()) {
            abort(404);
        }
        $data = $response->json()['data'] ?? [];
        $status = $data['status'] ?? null;
        $students = $data['students'] ?? [];

        return view('statuses.show', compact('students', 'status'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'status_name' => 'required|string|max:20',
        ]);

        $response = Http::put($this->apiBase . '/' . $id, $validated);
        
        if ($response->failed()) {
            Alert::error('Error', 'Gagal memperbarui status!');
            return back()->withInput();
        }
        Alert::success('Success', 'Status berhasil diperbarui!');

        return back();
    }

    public function destroy($id)
    {
        $response = Http::delete($this->apiBase . '/' . $id);
        if ($response->failed()) {
            Alert::error('Error', 'Gagal menghapus status!');
            return back();
        }
        Alert::success('Success', 'Status berhasil dihapus!');

        return back();
    }
}
