<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Auth;
use Image;

class AdminUser extends Controller
{
    //
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {
      return view('admin.user');
    }

    public function store(Request $request)
    {
      $user = Auth::user();

      $this->validate($request, [
        'Nama' => 'required|max:50',
        'Email' => 'required|email|max:255|unique:users,email,'.$user->id,
        'NewPassword' => 'min:6',
        'PasswordConfirmation' => 'required_with:NewPassword|same:NewPassword',
        'Gambar' => 'dimensions:ratio=1/1',
      ]);

      $data = $request->all();

      //import data to database
      $user->name = $data['Nama'];
      $user->email = $data['Email'];

      if($request->has('NewPassword')){
        $user->password = bcrypt($data['NewPassword']);
      } else {
        $user->password = $user->password;
      }

      if($request->hasFile('Gambar')){
        $gambar = $request->file('Gambar');
        $filename = 'admin-picture.' . $gambar->getClientOriginalExtension();
        $path = public_path('adminpage/img/' . $filename);

        Image::make($gambar)->resize(200,200)->save($path);

        $user->gambar = $filename;
      } else {
        $user->gambar = $user->gambar;
      }

      $user->save();

      Session::flash('pesan', 'Update Success');
      return redirect()->back();
    }
}
