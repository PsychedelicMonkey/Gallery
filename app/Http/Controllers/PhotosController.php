<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;

use Image;

class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photo::orderBy('created_at', 'desc')->paginate(20);
        return view('photos.index')->with('photos', $photos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('photos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'img' => 'required|image',
            'caption' => 'nullable|max:255',
            'location' => 'nullable|max:100'
        ]);

        $image = $request->file('img');
        [$width, $height] = getimagesize($image);
        
        $input['file'] = time() . '.' . $image->getClientOriginalExtension();
        
        $destPath = storage_path('app/public/img');
        $imgFile = Image::make($image->getRealPath());
        $imgFile->backup();

        // Thumbnail
        $imgFile->fit(500, 500)->save($destPath . '/thumb-' . $input['file']);
        $imgFile->reset();
        
        // Small
        $imgFile->resize(372, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destPath . '/sm-' . $input['file']);
        $imgFile->reset();

        // Gallery
        $imgFile->resize(456, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destPath . '/gallery-' . $input['file']);
        $imgFile->reset();

        // Medium
        $imgFile->resize(740, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destPath . '/md-' . $input['file']);
        $imgFile->reset();

        // Original
        $image->move($destPath, $input['file']);

        Photo::create([
            'img' => $input['file'],
            'caption' => $data['caption'],
            'location' => $data['location'],
            'width' => $width,
            'height' => $height
        ]);

        return redirect('/photos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $photo = Photo::findOrFail($id);
        return view('photos.show')->with('photo', $photo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $photo = Photo::findOrFail($id);
        return view('photos.edit')->with('photo', $photo);
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
        $data = $request->validate([
            'caption' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:100'
        ]);

        Photo::findOrFail($id)->update($data);

        return redirect('/photos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Photo::findOrFail($id)->delete();

        return redirect('/photos');
    }
}
