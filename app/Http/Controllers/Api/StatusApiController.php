<?php

namespace App\Http\Controllers\Api;

use App\Models\Status;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Student;
use RealRashid\SweetAlert\Facades\Alert;

class StatusApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statuses = Status::all();

        if ($statuses->isEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'No statuses found',
                'data' => []
            ], 200);
        }

        return response()->json([
            'success' => true,
            'message' => 'Statuses retrieved successfully',
            'data' => $statuses
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'status_name' => 'required|string|max:20',
        ]);

        $name = Str::ucfirst($request->status_name);

        $status = new Status();
        $status->status_name = $name;
        $status->save();

        if (!$status) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create status',
            ], 500);
        }

        return response()->json([
            'success' => true,
            'message' => 'Status created successfully',
            'data' => $status
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $name)
    {
        $status = Status::where('status_name', 'like', $name)->firstOrFail();

        $studentId = Attendance::where('status_id', $status->id)
            ->pluck('student_id')
            ->unique();

        $students = Student::whereIn('id', $studentId)
            ->with('class')
            ->get();

        if ($students->isEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'No students found with this status',
                'data' => [
                    'status' => $status,
                    'students' => []
                ]
            ], 200);
        }

        return response()->json([
            'success' => true,
            'message' => 'Status retrieved successfully',
            'data' => [
                'status' => $status,
                'students' => $students
            ]
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'status_name' => 'required|string|max:20',
        ]);

        $name = Str::ucfirst($request->status_name);

        $class = Status::findOrFail($id);
        $class->update([
            'status_name' => $name,
        ]);

        if (!$class) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update status',
            ], 500);
        }

        return response()->json([
            'success' => true,
            'message' => 'Status updated successfully',
            'data' => $class
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Status::findOrFail($id);
        $user->delete();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete status',
            ], 500);
        }
        
        return response()->json([
            'success' => true,
            'message' => 'Status deleted successfully',
        ], 200);
    }
}
