<?php

namespace App\Http\Controllers\Api;

use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\TmpRfid;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Laravolt\Avatar\Facade as Avatar;

class UserApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('class')
            ->orderBy('absen', 'asc')
            ->get();

        return response()->json([
            'status' => 'success',
            'message' => 'List of all students',
            'data' => $students
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
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
            'password' => 'required|min:6',
        ]);

        $name = Str::title($request->name);

        $user = new User();
        $user->card_number = $request->card_number;
        $user->NISN = $request->NISN;
        $user->absen = $request->absen;
        $user->name = $name;
        $user->class_id = $request->class_name;
        $user->email = $request->email;
        $user->telephone = $request->telepon;
        $user->parents_phone = $request->parentPhone;
        $user->address = $request->address;
        $user->role = 'student';
        $user->password = bcrypt($request->password);

        if ($request->hasFile('profile')) {
            $path = $request->file('profile')->store('profiles', 'public');
            $user->profile = $path;
        }

        try {
            $user->save();
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create student.',
                'error' => $e->getMessage()
            ], 500);
        }

        TmpRfid::truncate();

        return response()->json([
            'success' => true,
            'message' => 'Student created successfully.',
            'data' => $user
        ], 201);
    }

    /**
     * Display the specified resource.
     */
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

        return response()->json([
            'success' => true,
            'message' => 'Student detail.',
            'data' => [
                'student' => $student,
                'profile' => $profile,
                'attendances' => $attendances,
                'presentCount' => $presentCount,
                'lateCount' => $lateCount,
                'permisCount' => $permisCount,
                'alphaCount' => $alphaCount
            ],
        ], 200);
    }

    public function show(string $id)
    {
        $student = Student::with('class')->find($id);
        if (!$student) {
            return response()->json(['success' => false, 'message' => 'Student not found.'], 404);
        }
        return response()->json([
            'success' => true,
            'data' => $student,
            'message' => 'Student retrieved successfully.'
        ], 200);
    }

    public function findByCard(string $cardNumber)
    {
        $student = Student::with('class')
            ->where('card_number', $cardNumber)
            ->first();

        if (!$student) {
            return response()->json([
                'success' => false,
                'message' => 'Student not found.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $student,
            'message' => 'Student retrieved successfully by card.'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
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

        $name = Str::title($request->name);

        $user = Student::findOrFail($id);
        $user->card_number = $request->card_number;
        $user->NISN = $request->NISN;
        $user->absen = $request->absen;
        $user->name = $name;
        $user->class_id = $request->class_name;
        $user->email = $request->email;
        $user->telephone = $request->telepon;
        $user->parents_phone = $request->parentPhone;
        $user->address = $request->address;
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        if ($request->hasFile('profile')) {
            if ($user->profile && Storage::disk('public')->exists($user->profile)) {
                Storage::disk('public')->delete($user->profile);
            }

            $file = $request->file('profile');
            $path = $file->store('profiles', 'public');
            $user->profile = $path;
        }

        $user->save();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update student.'
            ], 500);
        }

        return response()->json([
            'success' => true,
            'message' => 'Student updated successfully.',
            'data' => $user
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Student::findOrFail($id);
        $profilePath = $user->profile;
        $deleted = $user->delete();

        if ($deleted && $profilePath && Storage::disk('public')->exists($profilePath)) {
            Storage::disk('public')->delete($profilePath);
        }

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete student.'
            ], 500);
        }

        return response()->json([
            'success' => true,
            'message' => 'Student deleted successfully.'
        ], 200);
    }
}
