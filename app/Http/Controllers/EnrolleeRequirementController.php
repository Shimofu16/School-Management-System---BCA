<?php

namespace App\Http\Controllers;

use App\Enrollee;
use App\Enrollee_Requirement;
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
        $select = Enrollee_Requirement::find($id);
        $requirement = new Enrollee_Requirement;

            //Check if request has a psa with a extension of csv,txt,xlx,xls,pdf,jpg,jpeg,png,docx,pptx
          /*   if ($request->validate(['psa' => 'required|mimes:csv,txt,xlx,xls,pdf,jpg,jpeg,png,docx,pptx|max:8192',])) { */
                if ($request->hasFile('psa')) {
                    $name = $student->first_name . ' ' . $student->middle_name . ' ' . $student->last_name;
                    $path = public_path() . '/uploads/requirements/' . $name;
                    $psa = $request->file('psa');
                    $extenstion = $psa->getClientOriginalExtension();
                    $filename = 'psa' . '.' . $extenstion;
                    if (!file_exists($path)) {
                        Storage::disk('local')->makeDirectory($path);
                        $psa->move($path, $filename);
                        $requirement->student_id = $id;
                        $requirement->filename = 'psa';
                        $requirement->filepath = $path . $filename;
                        $requirement->isSubmitted = 1;
                        $requirement->save();
                        return redirect()->back()->with('success', 'Uploaded Successfully');
                    } else {
                        if (!file_exists($path . $filename)) {
                            return redirect()->back()->with('error', 'File exist');
                        } else {
                            $psa->move($path, $filename);
                            $requirement->filename = 'psa';
                            $requirement->filepath = $path . $filename;
                            $requirement->isSubmitted = 1;
                            $requirement->save();
                            return redirect()->back()->with('success', 'Uploaded Successfully');
                        }
                    }
                }
           /*  } */


        /* if ($request->validate(['form_137' => 'required|mimes:csv,txt,xlx,xls,pdf,jpg,jpeg,png,docx,pptx|max:8192',])) { */
            if ($request->hasFile('form_137')) {
                $name = $student->first_name . ' ' . $student->middle_name . ' ' . $student->last_name;
                $path = public_path() . '/uploads/requirements/' . $name;
                $form137 = $request->file('form_137');
                $extenstion = $form137->getClientOriginalExtension();
                $filename = 'form_137' . '.' . $extenstion;
                if (!file_exists($path)) {
                    Storage::disk('local')->makeDirectory($path);
                    $form137->move($path, $filename);
                    $requirement->student_id = $id;
                    $requirement->filename = 'form_137';
                    $requirement->filepath = $path . $filename;
                    $requirement->isSubmitted = 1;
                    $requirement->save();
                    return redirect()->back()->with('success', 'Uploaded Successfully');
                } else {
                    if (!file_exists($path . $filename)) {
                        return redirect()->back()->with('error', 'File exist');
                    } else {
                        $form137->move($path, $filename);
                        $requirement->student_id = $id;
                        $requirement->filename = 'form_137';
                        $requirement->filepath = $path . $filename;
                        $requirement->isSubmitted = 1;
                        $requirement->save();
                        return redirect()->back()->with('success', 'Uploaded Successfully');
                    }
                }
            }
       /*  } */


        /*
        if ($validated) {
            if ($request->file()) {
                $id = $request->input('id');
                $student = Enrollee::find($id);
                $requirement = Enrollee_Requirement::find($id);
                $name = $student->first_name . ' ' . $student->middle_name . ' ' . $student->last_name;
                $path ='/uploads/requirements/' . $name;
                Storage::makeDirectory($path);
                $extenstion = $request->file('file')->getClientOriginalExtension();
                $filename = 'psa' . '.' . $extenstion;
                $filePath = $request->file('file')->storeAs($path, $filename, 'public');
            }
            return redirect()->back();
        } */
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
