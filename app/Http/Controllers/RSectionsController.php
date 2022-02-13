<?php

namespace App\Http\Controllers;

use App\Grade_level;
use App\Http\Requests\newSectionRequest;
use App\Section;
use App\Teacher;
use Illuminate\Http\Request;

class RSectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::with('students')->orderBy('id', 'asc')
            ->get();
        $teachers = Teacher::all();
        $gradeLevels = Grade_level::all();
        return view('admin.registrar-layouts.section.index', compact('sections', 'teachers', 'gradeLevels'));
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
    public function store(newSectionRequest $request)
    {
        $count = Section::where('section_name', $request->input('section_name'))->count();
        $countAd = Section::where('adviser', $request->input('adviser'))->count();

        if ($count == 1) {
            return redirect()->back()->with('error', 'Section name should not the same with other section');
        } elseif ($countAd == 1) {
            return redirect()->back()->with('error', 'Adviser not Available');
        } else {
            Section::create([
                'section_name' => $request->input('section_name'),
                'adviser' => $request->input('adviser'),
                'grade_level_id' => $request->input('grade_level_id'),
            ]);
            return redirect()->back()->with('success', 'Section added successfully.');
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
        $section = Section::with('students')->findOrFail($id);
        $sections = Section::all();
        $gradeLevels = Grade_level::all();
        return view('admin.registrar-layouts.section.show', compact('sections', 'section', 'gradeLevels'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /*  $section = Section::findOrFail($id);
    return view('', compact('section')); */
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
        $section = Section::findOrFail($id);
        $section->update(
            $request->all()
        );
        if ($section->wasChanged()) {
            return redirect()->back()->with('success', 'Update Successfully.');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $section = Section::findOrFail($id);
        if ($section->students->count() == null) {
            $secName = $section->section_name;
            $section->delete();
            return redirect()->route('section.index')->with('success', 'Section ' . $secName . ' Successfully deleted');
        }
        return redirect()->route('section.index')->with('error', 'Section ' . $section->section_name . ' can`t be deleted');
    }
}
