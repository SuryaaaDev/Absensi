<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Support\Str;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class StudentClassController extends Controller
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

    public function classes()
    {
        $title = 'Hapus Data';
        $text = "Apakah anda yakin untuk menghapus data ini?";
        confirmDelete($title, $text);

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

        return view('admin.classes', compact('classes'));
    }


    public function addClass(Request $request)
    {
        $validated = $request->validate([
            'class_name' => 'regex:/^([IVXLCDM]+)[\s\S]*[A-Z]$/i'
        ]);

        $name = Str::upper($request->class_name);

        $class = new StudentClass();
        $class->class_name = $name;
        $class->save();
        Alert::success('Success', 'Kelas berhasil ditambahkan!');

        return back();
    }

    public function editClass(Request $request, $id)
    {
        $validated = $request->validate([
            'class_name' => 'regex:/^([IVXLCDM]+)[\s\S]*[A-Z]$/i'
        ]);

        $name = Str::upper($request->class_name);

        $class = StudentClass::findOrFail($id);
        $class->update([
            'class_name' => $name,
        ]);
        Alert::success('Success', 'Kelas berhasil diperbarui!');

        return back();
    }

    public function destroy($id)
    {
        $user = StudentClass::findOrFail($id);
        $user->delete();
        Alert::success('Success', 'Kelas berhasil dihapus!');

        return back();
    }

    public function show($id, $slug)
    {
        $class = StudentClass::findOrFail($id);

        if (Str::slug($class->class_name) !== $slug) {
            return redirect()->route('show.class', [
                'id' => $class->id,
                'slug' => Str::slug($class->class_name),
            ]);
        }

        $students = Student::where('class_id', $class->id)
            ->orderBy('absen')
            ->get();

        return view('admin.show-class', compact('class', 'students'));
    }
}
