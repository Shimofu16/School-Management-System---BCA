<?php

namespace App\Http\Controllers;

use App\Http\Requests\newSectionRequest;
use App\Section;
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
        $sections = Section::with('students')->orderBy( 'id', 'asc' )
        ->get();
        return view('admin.registrar-layouts.section.index', compact('sections'));
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
        Section::create(
            $request->all()
        );
        return redirect()->route('section.index')->with('success', 'Section added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sections = Section::with('students')->findOrFail($id);
        return view('admin.registrar-layouts.section.show', compact('sections'));
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
        return redirect()->route('section.show', $id);
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
        $section->delete();
        return redirect()->route('section.index');
    }
}
