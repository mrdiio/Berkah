<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

use App\Type;

class AdminJenis extends Controller
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
      $type = Type::orderBy('id', 'desc')->get();
      return view('admin.jenis', compact('type'));

    }

    public function store(Request $request)
    {
      $this->validate($request, [
        'jenis' => 'required',
      ]);

      $type = new Type;
      $data = $request->all();

      $type->nama = $data['jenis'];
      $type->save();

      return redirect()->action('AdminJenis@index')->with('simpan', 'Input Success');
    }

    public function update(Request $request,$id)
    {
      $this->validate($request, [
        'jenis' => 'required',
      ]);

      $type = Type::find($id);
      $data = $request->all();

      $type->nama = $data['jenis'];
      $type->save();
      return redirect()->action('AdminJenis@index')->with('simpan', 'Input Success');
    }

    public function destroy($id)
    {
      $type = Type::find($id);
      $type->delete();

      return redirect()->action('AdminJenis@index')->with('hapus', 'Delete Success');
    }

}
