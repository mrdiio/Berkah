<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Web;

use Illuminate\Support\Facades\Session;

class AdminWeb extends Controller
{
    //
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {
      $web = Web::all()->first();
      return view('admin.web-desc', compact('web'));
    }

    public function store(Request $request){
       $web = Web::first();

       $this->validate($request, [
         'webtitle' => 'required',
         'webdesc' => 'required',
         'keyword' => 'required',
       ]);

       //handle the user upload data
       $data = $request->all();

       $web->title = $data['webtitle'];
       $web->description = $data['webdesc'];
       $web->keyword = $data['keyword'];

       $web->save();

       Session::flash('pesan','Update Success');
       return redirect()->back();
     }
}
