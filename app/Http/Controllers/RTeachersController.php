<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Teacher;
use App\Section;
use App\Subject;
use App\subject_teacher;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RTeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        /*  date */
        /*    dd(date('m'.'/'.'d'.'/'.'Y')); */
        /* $teachers = Teacher::with( 'subjects', 'sections' )->get();
        */
        $teachers = Teacher::orderBy('id', 'asc')->get();
        $teachers = Teacher::all();
        $sections = Section::all();
        $subjects = Subject::all();
        return view('admin.registrar-layouts.teacher.index', compact('teachers', 'subjects', 'sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('admin.registrar-layouts.teacher.create');
    }

    public function createSubject()
    {
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
            Teacher::create(
                $request->all()
            );
        return redirect()->route('teachers.index')->with('success', 'Teacher added successfully.');
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
        $teacher = Teacher::findOrFail($id);
        return view('admin.registrar-layouts.teacher.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //$article->isDirty(); // true
    //$article->isDirty('article_title'); // true
    //$article->isDirty('article_type'); // false

    //$article->isClean(); // false
    //$article->isClean('article_title'); // false
    //$article->isClean('article_type'); // true

    //$article->save();

    //$article->wasChanged('article_title'); // true
    //$article->wasChanged('article_type'); // false

    // isDirty [determines if any attributes have been changed since the model was loaded]
    //$article->isDirty(); // false

    // isClean [opposite of isDirty]
    //$article->isClean(); // true

    // wasChanged [determines if any attributes were changed when the model was last saved within the current request cycle]
    //$article->wasChanged(); // true
    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->update(
            $request->all()
        );
        if ($teacher->wasChanged()) {
            return redirect()->route('teachers.index')->with('success', 'Update Successfully.');
        }
        return redirect()->route('teachers.index');
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
