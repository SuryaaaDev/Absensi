<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\AuthApiController;
use App\Models\Attendance;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    protected $api;

    public function __construct(AuthApiController $api)
    {
        $this->api = $api;
    }

    public function welcome()
    {
        $response = $this->api->welcome();
        $data = $response->getData();

        return view('home.welcome', [
            'totalStudents' => $data->totalStudents,
            'totalAttendances' => $data->totalAttendances,
            'attendanceAccuracy' => $data->attendanceAccuracy,
        ]);
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3',
            'cf-turnstile-response' => 'required',
        ]);

        $verify = Http::asForm()->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
            'secret' => config('services.turnstile.secret'),
            'response' => $request->input('cf-turnstile-response'),
            'remoteip' => $request->ip(),
        ]);

        $result = $verify->json();

        if (empty($result['success']) || $result['success'] !== true) {
            toast('Verifikasi bot gagal, silakan coba lagi.', 'error')
                ->autoClose(3000)
                ->timerProgressBar()
                ->width('420px');
            return redirect()->back();
        }

        $response = $this->api->login($request);
        $data = $response->getData();

        if ($response->status() === 200 && $data->success) {
            if (isset($data->token)) {
                session(['api_token' => $data->token]);
            }

            if ($data->role === 'admin') {
                return redirect()->route('dashboard');
            } elseif ($data->role === 'educator') {
                return redirect()->route('division.dashboard');
            } elseif ($data->role === 'student') {
                return redirect()->route('student');
            }
        }

        toast($data->message, 'error')
            ->autoClose(3000)
            ->timerProgressBar()
            ->width('420px');
        return redirect()->back();
    }

    public function logout(Request $request)
    {
        $this->api->logout($request);
        return redirect()->route('login');
    }

    public function logoutStudent(Request $request)
    {
        $this->api->logout($request);
        return redirect()->route('login');
    }

    public function logoutDivision(Request $request)
    {
        $this->api->logout($request);
        return redirect()->route('login');
    }
}
