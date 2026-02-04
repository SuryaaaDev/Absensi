<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DeviceController extends Controller
{
    private $apiBase = 'http://localhost:8001/api/devices';

    public function index()
    {
        $response = Http::get($this->apiBase);
        if ($response->failed()) {
            abort(500, 'Gagal mengambil data dari API');
        }

        $devices = $response->json()['data'] ?? [];

        return view('rooms.index', compact('devices'));
    }

    public function show($id)
    {
        $response = Http::get($this->apiBase . '/' . $id);

        if ($response->failed()) {
            abort(404, 'Device tidak ditemukan');
        }

        $device = $response->json()['data'] ?? null;

        return view('rooms.show', compact('device'));
    }
}
