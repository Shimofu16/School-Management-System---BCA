<?php

namespace App\Http\Controllers;

use App\Enrollee;
use App\Enrollee_Requirement;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class EnrolleeRequirementController extends Controller
{
    //get current student

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->input('id');
        $student = Enrollee::find($id);

        //checl if meron na ba data or submitted na ba yung requirements sa db
        try {
            $psaFille = Enrollee_Requirement::where('student_lrn', $student->student_lrn)
                ->where('filename', 'psa')
                ->where('isSubmitted', 1)
                ->firstorfail();
            $hasFilePsa = true;
        } catch (ModelNotFoundException $e) {
            $hasFilePsa = false;
        }
        try {
            $form137File = Enrollee_Requirement::where('student_lrn', $student->student_lrn)
                ->where('filename', 'form 137')
                ->where('isSubmitted', 1)
                ->firstorfail();
            $hasFileForm137 = true;
        } catch (ModelNotFoundException $e) {
            $hasFileForm137 = false;
        }
        try {
            $goodMoral = Enrollee_Requirement::where('student_lrn', $student->student_lrn)
                ->where('filename', 'good moral certificate')
                ->where('isSubmitted', 1)
                ->firstorfail();
            $hasFileGoodMoral = true;
        } catch (ModelNotFoundException $e) {
            $hasFileGoodMoral = false;
        }
        try {
            $studentPhoto = Enrollee_Requirement::where('student_lrn', $student->student_lrn)
                ->where('filename', 'photo')
                ->where('isSubmitted', 1)
                ->firstorfail();
            $hasFilePhoto = true;
        } catch (ModelNotFoundException $e) {
            $hasFilePhoto = false;
        }
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
                        //checl if meron na ba data or submitted na ba yung requirements sa db before bumalik
                        if ($hasFilePsa == false) {
                            Enrollee_Requirement::create([
                                'student_lrn' => $student->student_lrn,
                                'filename' => 'psa',
                                'filepath' => $path . '/' . $filename,
                                'isSubmitted' => 1,
                            ]);
                        }
                        //if exist return file exist
                        return redirect()->back()->with('error', 'File Exist');
                    }
                    //if not exist move file with name of psa in folder /uploads/requirements/ + student full name
                    $psa->move($path, $filename);
                    //checl if meron na ba data or submitted na ba yung requirements sa db
                    if ($hasFilePsa == false) {
                        Enrollee_Requirement::create([
                            'student_lrn' => $student->student_lrn,
                            'filename' => 'psa',
                            'filepath' => $path . '/' . $filename,
                            'isSubmitted' => 1,
                        ]);
                    }
                    return redirect()->back()->with('success', 'Uploaded Successfully');
                }
                //if path is not exist create path then move file to it
                Storage::disk('local')->makeDirectory($path);
                $psa->move($path, $filename);
                //checl if meron na ba data or submitted na ba yung requirements sa db
                if ($hasFilePsa == false) {
                    Enrollee_Requirement::create([
                        'student_lrn' => $student->student_lrn,
                        'filename' => 'psa',
                        'filepath' => $path . '/' . $filename,
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
                $form_137 = $request->file('form_137');
                //get file extention
                $extention = $form_137->getClientOriginalExtension();
                //rename file to psa
                $filename = 'form 137' . '.' . $extention;
                //check if the file path is exist in public folder
                if (file_exists($path)) {
                    //check if file is in folder /uploads/requirements/ + student full name
                    if (file_exists($path . '/' . $filename)) {
                        //checl if meron na ba data or submitted na ba yung requirements sa db
                        if ($hasFileForm137 == false) {
                            Enrollee_Requirement::create([
                                'student_lrn' => $student->student_lrn,
                                'filename' => 'form 137',
                                'filepath' => $path . '/' . $filename,
                                'isSubmitted' => 1,
                            ]);
                        }
                        //if exist return file exist
                        return redirect()->back()->with('error', 'File Exist');
                    }
                    //if not exist move file with name of psa in folder /uploads/requirements/ + student full name
                    $form_137->move($path, $filename);
                    //checl if meron na ba data or submitted na ba yung requirements sa db
                    if ($hasFileForm137 == false) {
                        Enrollee_Requirement::create([
                            'student_lrn' => $student->student_lrn,
                            'filename' => 'form 137',
                            'filepath' => $path . '/' . $filename,
                            'isSubmitted' => 1,
                        ]);
                    }
                    return redirect()->back()->with('success', 'Uploaded Successfully');
                }
                //if path is not exist create path then move file to it
                Storage::disk('local')->makeDirectory($path);
                $form_137->move($path, $filename);
                //checl if meron na ba data or submitted na ba yung requirements sa db
                if ($hasFileForm137 == false) {
                    Enrollee_Requirement::create([
                        'student_lrn' => $student->student_lrn,
                        'filename' => 'form 137',
                        'filepath' => $path . '/' . $filename,
                        'isSubmitted' => 1,
                    ]);
                }
                return redirect()->back()->with('success', 'Uploaded Successfully');
            }
        }
        if ($request->hasFile('good_moral')) {
            //Check if request has a psa with a extension of csv,txt,xlx,xls,pdf,jpg,jpeg,png,docx,pptx
            if ($request->validate(['good_moral' => 'mimes:pdf,jpg,jpeg,png|max:8192',])) {
                //get student full name for folder name
                $name = $student->first_name . ' ' . $student->middle_name . ' ' . $student->last_name;
                //add student full name to path to create specific folder for student
                $path = public_path() . '/uploads/requirements/' . $name;
                $good_moral = $request->file('good_moral');
                //get file extention
                $extention = $good_moral->getClientOriginalExtension();
                //rename file to psa
                $filename = 'good moral certificate' . '.' . $extention;
                //check if the file path is exist in public folder
                if (file_exists($path)) {
                    //check if file is in folder /uploads/requirements/ + student full name
                    if (file_exists($path . '/' . $filename)) {
                        //checl if meron na ba data or submitted na ba yung requirements sa db
                        if ($hasFileGoodMoral == false) {
                            Enrollee_Requirement::create([
                                'student_lrn' => $student->student_lrn,
                                'filename' => 'good moral certificate',
                                'filepath' => $path . '/' . $filename,
                                'isSubmitted' => 1,
                            ]);
                        }
                        //if exist return file exist
                        return redirect()->back()->with('error', 'File Exist');
                    }
                    //if not exist move file with name of psa in folder /uploads/requirements/ + student full name
                    $good_moral->move($path, $filename);
                    //checl if meron na ba data or submitted na ba yung requirements sa db
                    if ($hasFileGoodMoral == false) {
                        Enrollee_Requirement::create([
                            'student_lrn' => $student->student_lrn,
                            'filename' => 'good moral certificate',
                            'filepath' => $path . '/' . $filename,
                            'isSubmitted' => 1,
                        ]);
                    }
                    return redirect()->back()->with('success', 'Uploaded Successfully');
                }
                //if path is not exist create path then move file to it
                Storage::disk('local')->makeDirectory($path);
                $good_moral->move($path, $filename);
                //checl if meron na ba data or submitted na ba yung requirements sa db
                if ($hasFileGoodMoral == false) {
                    Enrollee_Requirement::create([
                        'student_lrn' => $student->student_lrn,
                        'filename' => 'good moral certificate',
                        'filepath' => $path . '/' . $filename,
                        'isSubmitted' => 1,
                    ]);
                }
                return redirect()->back()->with('success', 'Uploaded Successfully');
            }
        }
        if ($request->hasFile('photo')) {
            //Check if request has a psa with a extension of csv,txt,xlx,xls,pdf,jpg,jpeg,png,docx,pptx
            if ($request->validate(['photo' => 'mimes:pdf,jpg,jpeg,png|max:8192',])) {
                //get student full name for folder name
                $name = $student->first_name . ' ' . $student->middle_name . ' ' . $student->last_name;
                //add student full name to path to create specific folder for student
                $path = public_path() . '/uploads/requirements/' . $name;
                $photo = $request->file('photo');
                //get file extention
                $extention = $photo->getClientOriginalExtension();
                //rename file to psa
                $filename = 'photo' . '.' . $extention;
                //check if the file path is exist in public folder
                if (file_exists($path)) {
                    //check if file is in folder /uploads/requirements/ + student full name
                    if (file_exists($path . '/' . $filename)) {
                        //checl if meron na ba data or submitted na ba yung requirements sa db
                        if ($hasFilePhoto == false) {
                            Enrollee_Requirement::create([
                                'student_lrn' => $student->student_lrn,
                                'filename' => 'photo',
                                'filepath' => $path . '/' . $filename,
                                'isSubmitted' => 1,
                            ]);
                        }
                        //if exist return file exist
                        return redirect()->back()->with('error', 'File Exist');
                    }
                    //if not exist move file with name of psa in folder /uploads/requirements/ + student full name
                    $photo->move($path, $filename);
                    //checl if meron na ba data or submitted na ba yung requirements sa db
                    if ($hasFilePhoto == false) {
                        Enrollee_Requirement::create([
                            'student_lrn' => $student->student_lrn,
                            'filename' => 'photo',
                            'filepath' => $path . '/' . $filename,
                            'isSubmitted' => 1,
                        ]);
                    }
                    return redirect()->back()->with('success', 'Uploaded Successfully');
                }
                //if path is not exist create path then move file to it
                Storage::disk('local')->makeDirectory($path);
                $photo->move($path, $filename);
                //checl if meron na ba data or submitted na ba yung requirements sa db
                if ($hasFilePhoto == false) {
                    Enrollee_Requirement::create([
                        'student_lrn' => $student->student_lrn,
                        'filename' => 'photo',
                        'filepath' => $path . '/' . $filename,
                        'isSubmitted' => 1,
                    ]);
                }
                return redirect()->back()->with('success', 'Uploaded Successfully');
            }
        }
        return back();
    }
    public function download($filename)
    {
        $file = Storage::disk('public')->get($filename);
        return $file;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Enrollee_Requirement  $enrollee_Requirement
     * @return \Illuminate\Http\Response
     */
    public function show(Enrollee_Requirement $enrollee_Requirement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Enrollee_Requirement  $enrollee_Requirement
     * @return \Illuminate\Http\Response
     */
    public function edit(Enrollee_Requirement $enrollee_Requirement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Enrollee_Requirement  $enrollee_Requirement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enrollee_Requirement $enrollee_Requirement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Enrollee_Requirement  $enrollee_Requirement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enrollee_Requirement $enrollee_Requirement)
    {
        //
    }
}
