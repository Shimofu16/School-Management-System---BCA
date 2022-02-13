<?php

namespace App\Http\Controllers;

use App\PhotoGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rules\Exists;

class PhotoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = PhotoGallery::all();
        return view('admin.admin-layouts.manage.photo gallery.index', compact('photos'));
    }
    public function test()
    {
        $photos = PhotoGallery::all();

        return view('admin.admin-layouts.manage.photo gallery.test', compact('photos'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if (request()->hasFile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = $request->input('title') . '.' . $extention;
            $path = 'uploads/photo gallery/';
            if (file_exists($path)) {
                $file->move($path, $filename);
                $imgPath = $path . $filename;
                PhotoGallery::create([
                    'title' => $request->input('title'),
                    'img_name' => $filename,
                    'path' => $imgPath,
                    'date' => $request->input('date')
                ]);
                return redirect()->back()->with('success','ok');
            }
            return redirect()->back()->with('error','folder');
        }
        return redirect()->back()->with('error', 'no such file');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PhotoGallery  $photoGallery
     * @return \Illuminate\Http\Response
     */
    public function show(PhotoGallery $photoGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PhotoGallery  $photoGallery
     * @return \Illuminate\Http\Response
     */
    public function edit(PhotoGallery $photoGallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PhotoGallery  $photoGallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PhotoGallery $photoGallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PhotoGallery  $photoGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(PhotoGallery $photoGallery)
    {
        //
    }
}
