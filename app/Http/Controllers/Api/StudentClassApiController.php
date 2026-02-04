<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Str;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;

class StudentClassApiController extends Controller
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

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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

        if ($classes->isEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'No classes found.',
                'data' => []
            ], 200);
        }
        return response()->json([
            'success' => true,
            'message' => 'Classes retrieved successfully.',
            'data' => $classes
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'class_name' => 'regex:/^([IVXLCDM]+)[\s\S]*[A-Z]$/i'
        ]);

        $name = Str::upper($request->class_name);

        $class = new StudentClass();
        $class->class_name = $name;
        $class->save();

        if (!$class) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create class.'
            ], 500);
        }

        return response()->json([
            'success' => true,
            'message' => 'Class created successfully.',
            'data' => $class
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function showClass(string $id, $slug)
    {
        $class = StudentClass::findOrFail($id);

        if (Str::slug($class->class_name) !== $slug) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid slug, expected ' . Str::slug($class->class_name),
                'data' => []
            ], 400);
        }


        $students = Student::where('class_id', $class->id)
            ->orderBy('absen')
            ->get();

        if ($students->isEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'No students found in this class.',
                'data' => [
                    'class' => $class,
                    'students' => []
                ]
            ], 200);
        }

        return response()->json([
            'success' => true,
            'message' => 'Class retrieved successfully.',
            'data' => [
                'class' => $class,
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
            'class_name' => 'regex:/^([IVXLCDM]+)[\s\S]*[A-Z]$/i'
        ]);

        $name = Str::upper($request->class_name);

        $class = StudentClass::findOrFail($id);
        $class->update([
            'class_name' => $name,
        ]);

        if (!$class) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update class.'
            ], 500);
        }

        return response()->json([
            'success' => true,
            'message' => 'Class updated successfully.',
            'data' => $class
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = StudentClass::findOrFail($id);
        $user->delete();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete class.'
            ], 500);
        }

        return response()->json([
            'success' => true,
            'message' => 'Class deleted successfully.'
        ], 200);
    }
}
