<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\About;

use Illuminate\Support\Facades\Session;
use Image;


class AdminAbout extends Controller
{
    //
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {
      $about = About::first();
      return view('admin.about', compact('about'));
    }

    public function store(Request $request){
       $about = About::first();

       $this->validate($request, [
         'perusahaan' => 'required|max:50',
         'about' => 'required',
         'visi' => 'required',
         'misi' => 'required',
         'video' => 'required',
       ]);

       //handle the user upload data
       $data = $request->all();

       $about->nama = $data['perusahaan'];
       $about->tentang = $data['about'];
       $about->visi = $data['visi'];
       $about->misi = $data['misi'];
       $about->video = $data['video'];

       if($request->hasFile('logo')){
         $logo = $request->file('logo');
         $filename = 'logo' . '.' . $logo->getClientOriginalExtension();
         $path = public_path('img/' . $filename);

         Image::make($logo) ->resize(200, null, function ($constraint) {
                                $constraint->aspectRatio();
                              })
                            ->save($path);
         $about->logo = $filename;
       }

       if($request->hasFile('cover')){
         $cover = $request->file('cover');
         $filename = 'cover-video' . '.' . $cover->getClientOriginalExtension();
         $path = public_path('img/' . $filename);

         Image::make($cover)  ->resize(600,400)
                              ->save($path);

         $about->cover_video = $filename;
       }

       $about->save();

       Session::flash('pesan','Update Success');
       return redirect()->back();
     }
}
