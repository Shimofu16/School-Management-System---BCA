<?php

namespace App\Http\Controllers;

use App\Enrolled_Requirement;
use App\Enrolled_Student_Family;
use Illuminate\Http\Request;
use App\Section;
use App\Student;
use App\Enrollee;
use App\Enrollee_Requirement;
use App\Enrollee_Student_Family;
use App\Grade_level;
use App\Mail\acceptedMessage;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class EnrolleesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $students = Enrollee::with('gradeLevel')->orderBy('id', 'asc')
            ->get();
        $sections = Section::all();
        $requirements = Enrollee_Requirement::all();
        $gradeLevels = Grade_level::all();
        return view('admin.registrar-layouts.students.enrollees.index', compact('students', 'sections', 'gradeLevels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $student_lrn = $request->input('student_lrn');
        try {
            $psa = Enrollee_Requirement::where('student_lrn', $student_lrn)
                ->where('filename', 'psa')
                ->where('isSubmitted', 1)
                ->first();
            $hasFilePsa = true;
        } catch (ModelNotFoundException $e) {
            $hasFilePsa = false;
        }
        try {
            $form137 = Enrollee_Requirement::where('student_lrn', $student_lrn)
                ->where('filename', 'form 137')
                ->where('isSubmitted', 1)
                ->first();
            $hasFileForm137 = true;
        } catch (ModelNotFoundException $e) {
            $hasFileForm137 = false;
        }

        $father = Enrollee_Student_Family::where('student_lrn', $student_lrn)
            ->where('relationship', 'Father')
            ->firstorfail();
        $mother = Enrollee_Student_Family::where('student_lrn', $student_lrn)
            ->where('relationship', 'Mother')
            ->firstorfail();
        $guardian = Enrollee_Student_Family::where('student_lrn', $student_lrn)
            ->where('relationship', 'Guardian')
            ->firstorfail();
        if ($hasFileForm137 == false && $hasFilePsa == false) {
            $student = new Student;
            $student->student_lrn = $student_lrn;
            $student->first_name = $request->input('first_name');
            $student->middle_name = $request->input('middle_name');
            $student->last_name = $request->input('last_name');
            $student->ext_name = $request->input('ext_name');
            $student->gender = $request->input('gender');
            $student->age = $request->input('age');
            $student->email = $request->input('email');
            $student->birthdate = $request->input('birthdate');
            $student->birthplace = $request->input('birthplace');
            $student->address = $request->input('address');
            $student->section_id = $request->input('section_id');
            $student->grade_level_id = $request->input('grade_level_id');
            $student->sy_id = 1;



            $families = [
                [
                    'student_lrn' => $student_lrn,
                    'name' => $father->name,
                    'birthdate' => $father->birthdate,
                    'email' => $father->email,
                    'landline' => $father->landline,
                    'contact_no' => $father->contact_no,
                    'occupation' => $father->occupation,
                    'office_address' => $father->office_address,
                    'office_contact_no' => $father->office_contact_no,
                    'relationship' => 'Father',
                ], [
                    'student_lrn' => $student_lrn,
                    'name' => $mother->name,
                    'birthdate' => $mother->birthdate,
                    'email' => $mother->email,
                    'landline' => $mother->landline,
                    'contact_no' => $mother->contact_no,
                    'occupation' => $mother->occupation,
                    'office_address' => $mother->office_address,
                    'office_contact_no' => $mother->office_contact_no,
                    'relationship' => 'Mother',
                ], [
                    'student_lrn' => $student_lrn,
                    'name' => $guardian->name,
                    'contact_no' => $guardian->contact_no,
                    'relationship' => $guardian->relationship,
                ]
            ];

            $requirements = [
                [
                    'student_lrn' => $student_lrn,
                    'filename' => $psa->filename,
                    'filepath' => $psa->filepath,
                    'isSubmitted' => $psa->isSubmitted,
                ],
                [
                    'student_lrn' => $student_lrn,
                    'filename' => $form137->filename,
                    'filepath' => $form137->filepath,
                    'isSubmitted' => $form137->isSubmitted,
                ],
            ];
            foreach ($requirements as $requirement) {
                Enrolled_Requirement::create($requirement);
            }
            foreach ($families as $family) {
                Enrolled_Student_Family::create($family);
            }
            $student->save();
            $id = $request->input('id');
            $enrollee = Enrollee::findOrFail($id);
            $enrollee->delete();
            $fam = Enrollee_Student_Family::findOrFail($id);
            $fam->delete();
            $req = Enrollee_Requirement::findOrFail($id);
            $req->delete();
            $details =[
                'text'=>'hoy panget',
            ];
            $details =[
                'to'=>$request->input('email'),
                'text'=>'Accepted',
            ];
            Mail::send('emails.acceptedMessage',$details,function($message) use ($details){
                $message->to($details['to'])->subject('Message from BCA');
            });
            return redirect()->route('enrolled.index')->with('success', 'Student ' . $request->input('first_name') . ' ' . $request->input('last_name'));
        }
        return redirect()->back()->with('error', 'Requirements are emprty');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $student = Enrollee::with('gradeLevel')->findOrFail($id);
        //get student full name for folder name
        $name = $student->first_name . ' ' . $student->middle_name . ' ' . $student->last_name;
        $fileTypes = [
            'jpg',
            'pdf',
            'jpeg',
            'png',
        ];
        try {
            $psaFille = Enrollee_Requirement::where('student_lrn', $student->student_lrn)
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
                        Enrollee_Requirement::create([
                            'student_lrn' => $student->student_lrn,
                            'filename' => 'psa',
                            'filepath' => $filePath,
                            'isSubmitted' => 1,
                        ]);
                    }
                    break;
                }
            }
            $hasFilePsa = false;
        }
        try {
            $form137File = Enrollee_Requirement::where('student_lrn', $student->student_lrn)
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
                        Enrollee_Requirement::create([
                            'student_lrn' => $student->student_lrn,
                            'filename' => 'form 137',
                            'filepath' => $filePath,
                            'isSubmitted' => 1,
                        ]);
                    }
                    break;
                }
            }
            $hasFileForm137 = false;
        }
        try {
            $goodMoral = Enrollee_Requirement::where('student_lrn', $student->student_lrn)
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
                        Enrollee_Requirement::create([
                            'student_lrn' => $student->student_lrn,
                            'filename' => 'good moral certificate',
                            'filepath' => $filePath,
                            'isSubmitted' => 1,
                        ]);
                    }
                    break;
                }
            }
            $hasFileGoodMoral = false;
        }
        try {
            $studentPhoto = Enrollee_Requirement::where('student_lrn', $student->student_lrn)
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
                        Enrollee_Requirement::create([
                            'student_lrn' => $student->student_lrn,
                            'filename' => 'photo',
                            'filepath' => $filePath,
                            'isSubmitted' => 1,
                        ]);
                    }
                    break;
                }
            }
            $hasFilePhoto = false;
        }


        $father = Enrollee_Student_Family::where('student_lrn', $student->student_lrn)
            ->where('relationship', 'Father')
            ->firstorfail();
        $mother = Enrollee_Student_Family::where('student_lrn', $student->student_lrn)
            ->where('relationship', 'Mother')
            ->firstorfail();
        $guardian = Enrollee_Student_Family::where('student_lrn', $student->student_lrn)
            ->where('relationship', 'Guardian')
            ->firstorfail();
        $sections = Section::all();
        $gradeLevels = Grade_level::all();
        return view('admin.registrar-layouts.students.enrollees.show', compact('student', 'sections', 'gradeLevels', 'hasFilePsa', 'hasFileForm137', 'hasFileGoodMoral', 'hasFilePhoto', 'father', 'mother', 'guardian'));
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
        //
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
