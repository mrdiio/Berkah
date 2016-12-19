<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

use App\Http\Requests;
use App\Slide;

class AdminSlide extends Controller
{
    //
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {
      $slide = Slide::all();
      return view ('admin.slide', compact('slide'));
    }

    public function update(Request $request,$id)
    {
      $slide = Slide::find($id);

      $this->validate($request, [
        'judul' => 'required|max:50',
        'header' => 'required',
        'deskripsi' => 'max:140',
        'link' => 'url',
      ]);

      $data = $request->all();

      $slide->judul = $data['judul'];
      $slide->header = $data['header'];
      $slide->deskripsi = $data['deskripsi'];
      $slide->link = $data['link'];

      if($request->hasFile('gambar')){
        $gambar = $request->file('gambar');
        $filename = 'slide'. $slide->id . '.' . $gambar->getClientOriginalExtension();
        $path = public_path('img/slide/' . $filename);

        Image::make($gambar)->resize(1920, null, function ($constraint) {
                              $constraint->aspectRatio();})
                            ->save($path);

        $slide->gambar = $filename;
      }

      $slide->save();

      return redirect()->action('AdminSlide@index')->with('update', 'Input Success');
    }

}
