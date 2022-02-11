<?php

namespace App\Http\Controllers;

use App\PhotoGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
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
        return view('admin.admin-layouts.manage.photo gallery.index',compact('photos'));
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
        dd($request->hasFile('image'),$request->all(),$request->input('image'));
        /* $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png',
        ]); */
        if (request()->hasFile('image')) {
            $img = $request->file('image')->getClientOriginalName();
            $imgExtension =$request->file('image')->getClientOriginalExtension();
            $path ='/uploads/photoGallery/';
            $imgPath = $path.$img.$imgExtension;
            PhotoGallery::create([
                'title'=> $request->input('title'),
                'img_name'=> $img,
                'path'=> $imgPath,
            ]);
            return redirect()->back();
        }
        return redirect()->back()->with('error','no such file');

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
