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
        $photos = Photo::orderBy('created_at', 'desc')->get();
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
            'caption' => 'nullable',
            'location' => 'nullable'
        ]);

        $image = $request->file('img');
        [$width, $height] = getimagesize($image);
        
        $input['file'] = time() . '.' . $image->getClientOriginalExtension();
        $destPath = storage_path('app/public/sm-img');
        
        $imgFile = Image::make($image->getRealPath());
        $imgFile->resize(456, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destPath . '/' . $input['file']);

        $destPath = storage_path('app/public/img');
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
            'caption' => 'nullable',
            'location' => 'nullable'
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
