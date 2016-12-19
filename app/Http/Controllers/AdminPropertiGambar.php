<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

use App\Property;
use App\Gambar_Property;

class AdminPropertiGambar extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
      $gambar = Gambar_Property::all();
      return view('admin.properti-gambar', compact('gambar'));
    }

    public function store(Request $request)
    {
      $gambar = Gambar_Property::first();
      $properti = new Property;

      $this->validate($request, [
        'gambar' => 'required',
      ]);

      $data = $request->all();

      //import data to database
      if($request->hasFile('gambar')){
        $gambar = $request->file('gambar');
        $filename = time() . '.' . $gambar->getClientOriginalExtension();

        $path2 = public_path('uploads/images/blog/big/' . $filename);

        Image::make($gambar)->resize(1068, null, function ($constraint) {
                              $constraint->aspectRatio();})
                            ->save($path2);

        $gambar->gambar = $filename;
        $gambar->id_properti = $filename;
      }


      $gambar->save();

      return redirect()->back();
    }
}
