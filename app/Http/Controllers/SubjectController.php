<?php

namespace App\Http\Controllers;

use App\Grade_level;
use App\Section;
use Illuminate\Http\Request;
use App\Subject;
use DB;
class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::orderBy('id', 'asc')->get();
        $sections = Section::all();
        $gradeLevels = Grade_level::all();
        return view('admin.registrar-layouts.subjects.index', compact('subjects','sections','gradeLevels'));
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
        //Get graded level id from request and store it to $gl
        $gl = $request->input('grade_level_id');
        //Get all fields of subjects table
        $subjects = Subject::all();
        //Grade level counter
        $glCount = 0;

        foreach ($subjects as $subject) {
            // check if there are same grade level in subjects table
            if ($subject->grade_level_id == $gl) {
                // If the condition is true add 1 to glCount
                $glCount++;
            }
        }
        // Check if glCount is >= 5
        // If true then redirect to subjects table in registrar with error message
        // else return wuth success message :)
        if ($glCount >= 5) {
            return redirect()->route('subject.index')->with('error', 'Overloaded.');
        }else{
            $subject = new Subject;
            $subject->subject = request()->input('subject');
            $subject->grade_level_id = request()->input('grade_level_id');
            $subject->save();
            return redirect()->route('subject.index')->with('success', 'Subject added successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $subject = Subject::findOrFail($id);
        $subject->update(
            $request->all()
        );
        if ($subject->wasChanged()) {
            return redirect()->route('subject.index')->with('success', 'Update Successfully.');
        }
        return redirect()->route('subject.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subjects = Subject::find($id);
        $subjects->delete();
        return redirect()->route('subject.index');
    }
}
