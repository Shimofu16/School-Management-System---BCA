<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;
use App\Student;
use App\Enrollee;
use App\Year_level;
use App\Account_student;
use App\Enrolled_Requirement;
use App\Enrolled_Student_Family;
use App\Family;
use App\Grade_level;
use App\Guardian;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EnrolledStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $students = Student::with('section', 'gradeLevel')->orderBy('id', 'asc')
            ->get();
        $gradeLevels = Grade_level::all();
        $sections = Section::all();
        return view('admin.registrar-layouts.students.Enrolled.index', compact('students', 'gradeLevels', 'sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $sections = Section::all();
        $gradelevels = Grade_level::all();
        return view('admin.registrar-layouts.students.create', compact('sections', 'gradelevels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        Student::create(
            $request->all()
        );
        return redirect()->route('enrolled.index')->with('success', 'Student Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $student = Student::with('gradeLevel')->findOrFail($id);
        //get student full name for folder name
        $name = $student->first_name . ' ' . $student->middle_name . ' ' . $student->last_name;
        $fileTypes = [
            'jpg',
            'pdf',
            'jpeg',
            'png',
        ];
        try {
            $psaFille = Enrolled_Requirement::where('student_lrn', $student->student_lrn)
                ->where('filename', 'psa')
                ->where('isSubmitted', 1)
                ->firstorfail();
            $hasFilePsa = true;
        } catch (ModelNotFoundException $e) {
            $filePath = public_path() . '/uploads/requirements/' . $name . '/psa.';
            foreach ($fileTypes as $fileType) {
                $filePath = $filePath . $fileType;
                $extension = pathinfo($filePath, PATHINFO_EXTENSION);
                if ($extension !== null) {
                    if (file_exists($filePath)) {
                        Enrolled_Requirement::create([
                            'student_lrn' => $student->student_lrn,
                            'filename' => 'psa',
                            'filepath' => $filePath,
                            'isSubmitted' => 1,
                        ]);
                        $hasFilePsa = true;
                        break;
                    }
                    $hasFilePsa = false;
                    break;
                }
            }
        }
        try {
            $form137File = Enrolled_Requirement::where('student_lrn', $student->student_lrn)
                ->where('filename', 'form 137')
                ->where('isSubmitted', 1)
                ->firstorfail();
            $hasFileForm137 = true;
        } catch (ModelNotFoundException $e) {
            $filePath = public_path() . '/uploads/requirements/' . $name . '/form 137.';
            foreach ($fileTypes as $fileType) {
                $filePath = $filePath . $fileType;
                $extension = pathinfo($filePath, PATHINFO_EXTENSION);
                if ($extension !== null) {
                    if (file_exists($filePath)) {
                        Enrolled_Requirement::create([
                            'student_lrn' => $student->student_lrn,
                            'filename' => 'form 137',
                            'filepath' => $filePath,
                            'isSubmitted' => 1,
                        ]);
                        $hasFileForm137 = true;
                        break;
                    }
                    $hasFileForm137 = false;
                    break;
                }
            }
        }
        try {
            $goodMoral = Enrolled_Requirement::where('student_lrn', $student->student_lrn)
                ->where('filename', 'good moral certificate')
                ->where('isSubmitted', 1)
                ->firstorfail();
            $hasFileGoodMoral = true;
        } catch (ModelNotFoundException $e) {
            $filePath = public_path() . '/uploads/requirements/' . $name . '/good moral certificate.';
            foreach ($fileTypes as $fileType) {
                $filePath = $filePath . $fileType;
                $extension = pathinfo($filePath, PATHINFO_EXTENSION);
                if ($extension !== null) {
                    if (file_exists($filePath)) {
                        Enrolled_Requirement::create([
                            'student_lrn' => $student->student_lrn,
                            'filename' => 'good moral certificate',
                            'filepath' => $filePath,
                            'isSubmitted' => 1,
                        ]);
                        $hasFileGoodMoral = true;
                        break;
                    }
                    $hasFileGoodMoral = false;
                    break;
                }
            }
        }
        try {
            $studentPhoto = Enrolled_Requirement::where('student_lrn', $student->student_lrn)
                ->where('filename', 'photo')
                ->where('isSubmitted', 1)
                ->firstorfail();
            $hasFilePhoto = true;
        } catch (ModelNotFoundException $e) {
            $filePath = public_path() . '/uploads/requirements/' . $name . '/photo.';
            foreach ($fileTypes as $fileType) {
                $filePath = $filePath . $fileType;
                $extension = pathinfo($filePath, PATHINFO_EXTENSION);
                if ($extension !== null) {
                    if (file_exists($filePath)) {
                        Enrolled_Requirement::create([
                            'student_lrn' => $student->student_lrn,
                            'filename' => 'photo',
                            'filepath' => $filePath,
                            'isSubmitted' => 1,
                        ]);
                        $hasFilePhoto = true;
                        break;
                    }
                    $hasFilePhoto = false;
                    break;
                }
            }
        }


        $father = Enrolled_Student_Family::where('student_lrn', $student->student_lrn)
            ->where('relationship', 'Father')
            ->firstorfail();
        $mother = Enrolled_Student_Family::where('student_lrn', $student->student_lrn)
            ->where('relationship', 'Mother')
            ->firstorfail();
        $guardian = Enrolled_Student_Family::where('student_lrn', $student->student_lrn)
            ->where('relationship', 'Guardian')
            ->firstorfail();
        $sections = Section::all();
        $gradeLevels = Grade_level::all();
        return view('admin.registrar-layouts.students.enrolled.show', compact('student', 'sections', 'gradeLevels', 'hasFilePsa', 'hasFileForm137', 'hasFileGoodMoral', 'hasFilePhoto', 'father', 'mother', 'guardian'));
    }
    public function showRequirements($id){

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->student_lrn = request()->input('student_lrn');
        $student->first_name = request()->input('first_name');
        $student->middle_name = request()->input('middle_name');
        $student->last_name = request()->input('last_name');
        $student->gender = request()->input('gender');
        $student->age = request()->input('age');
        $student->email = request()->input('email');
        $student->birthdate = request()->input('birthdate');
        $student->birthplace = request()->input('birthplace');
        $student->address = request()->input('address');
        $student->section_id = request()->input('section_id');
        $student->grade_level_id = request()->input('grade_level_id');
        $student->update();
        if ($student->wasChanged()) {
            return redirect()->route('enrolled.index')->with('success','Update Successfully');
        }
        return redirect()->route('enrolled.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        //
    }
}
