<?php

namespace App\Http\Controllers;

use App\Enrolled_Requirement;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EnrolledRequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * Store a newly created resource in Storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->input('id');
        $student = Student::find($id);
        //checl if meron na ba data or submitted na ba yung requirements sa db
        $hasFilePsa = Enrolled_Requirement::where('student_id', $id)
            ->where('filename', 'psa')
            ->where('isSubmitted', 1)
            ->firstorfail();
        $hasFileForm137 = Enrolled_Requirement::where('student_id', $id)
            ->where('filename', 'form 137')
            ->where('isSubmitted', 1)
            ->firstorfail();
        //checl if meron na ba data or submitted na ba yung requirements sa db
        if ($request->hasFile('psa')) {
            //Check if request has a psa with a extension of csv,txt,xlx,xls,pdf,jpg,jpeg,png,docx,pptx
            if ($request->validate(['psa' => 'mimes:pdf,jpg,jpeg,png|max:8192',])) {
                //get student full name for folder name
                $name = $student->first_name . ' ' . $student->middle_name . ' ' . $student->last_name;
                //add student full name to path to create specific folder for student
                $path = public_path() . '/uploads/requirements/' . $name;
                $psa = $request->file('psa');
                //get file extention
                $extention = $psa->getClientOriginalExtension();
                //rename file to psa
                $filename = 'psa' . '.' . $extention;
                //check if the file path is exist in public folder
                if (file_exists($path)) {
                    //check if file is in folder /uploads/requirements/ + student full name
                    if (file_exists($path . '/' . $filename)) {
                        //if exist return file exist
                        return redirect()->back()->with('error', ' PSA File Exist');
                    }
                    //if not exist move file with name of psa in folder /uploads/requirements/ + student full name
                    $psa->move($path, $filename);
                    //checl if meron na ba data or submitted na ba yung requirements sa db
                    if ($hasFilePsa == null) {
                        Enrolled_Requirement::create([
                            'student_id' => $id,
                            'filename' => 'psa',
                            'filepath' => $path . $filename,
                            'isSubmitted' => 1,
                        ]);
                    }
                    return redirect()->back()->with('success', 'Uploaded Successfully');
                }
                //if path is not exist create path then move file to it
                Storage::disk('local')->makeDirectory($path);
                $psa->move($path, $filename);
                //checl if meron na ba data or submitted na ba yung requirements sa db
                if ($hasFilePsa == null) {
                    Enrolled_Requirement::create([
                        'student_id' => $id,
                        'filename' => 'psa',
                        'filepath' => $path . $filename,
                        'isSubmitted' => 1,
                    ]);
                }
                return redirect()->back()->with('success', 'Uploaded Successfully');
            }
        }
        if ($request->hasFile('form_137')) {
            //Check if request has a psa with a extension of csv,txt,xlx,xls,pdf,jpg,jpeg,png,docx,pptx
            if ($request->validate(['form_137' => 'mimes:pdf,jpg,jpeg,png|max:8192',])) {
                //get student full name for folder name
                $name = $student->first_name . ' ' . $student->middle_name . ' ' . $student->last_name;
                //add student full name to path to create specific folder for student
                $path = public_path() . '/uploads/requirements/' . $name;
                $psa = $request->file('form_137');
                //get file extention
                $extention = $psa->getClientOriginalExtension();
                //rename file to psa
                $filename = 'form 137' . '.' . $extention;
                //check if the file path is exist in public folder
                if (file_exists($path)) {
                    //check if file is in folder /uploads/requirements/ + student full name
                    if (file_exists($path . '/' . $filename)) {
                        if ($hasFileForm137 == null) {
                            Enrolled_Requirement::create([
                                'student_id' => $id,
                                'filename' => 'form 137',
                                'filepath' => $path . $filename,
                                'isSubmitted' => 1,
                            ]);
                        }
                        //if exist return file exist
                        return redirect()->back()->with('error', 'File Exist');
                    }
                    //if not exist move file with name of psa in folder /uploads/requirements/ + student full name
                    $psa->move($path, $filename);
                    //checl if meron na ba data or submitted na ba yung requirements sa db
                    if ($hasFileForm137 == null) {
                        Enrolled_Requirement::create([
                            'student_id' => $id,
                            'filename' => 'form 137',
                            'filepath' => $path . $filename,
                            'isSubmitted' => 1,
                        ]);
                    }
                    return redirect()->back()->with('success', 'Uploaded Successfully');
                }
                //if path is not exist create path then move file to it
                Storage::disk('local')->makeDirectory($path);
                $psa->move($path, $filename);
                //checl if meron na ba data or submitted na ba yung requirements sa db
                if ($hasFileForm137 == null) {
                    Enrolled_Requirement::create([
                        'student_id' => $id,
                        'filename' => 'form 137',
                        'filepath' => $path . $filename,
                        'isSubmitted' => 1,
                    ]);
                }
                return redirect()->back()->with('success', 'Uploaded Successfully');
            }
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Enrolled_Requirement  $enrolled_Requirement
     * @return \Illuminate\Http\Response
     */
    public function show(Enrolled_Requirement $enrolled_Requirement)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Enrolled_Requirement  $enrolled_Requirement
     * @return \Illuminate\Http\Response
     */
    public function edit(Enrolled_Requirement $enrolled_Requirement)
    {
        //
    }

    /**
     * Update the specified resource in Storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Enrolled_Requirement  $enrolled_Requirement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enrolled_Requirement $enrolled_Requirement)
    {
        //
    }

    /**
     * Remove the specified resource from Storage.
     *
     * @param  \App\Enrolled_Requirement  $enrolled_Requirement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enrolled_Requirement $enrolled_Requirement)
    {
        //
    }
}
