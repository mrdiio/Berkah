<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

use App\Property;
use App\Type;
use App\Gambar_Property;

class AdminProperti extends Controller
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
      $properti = Property::orderBy('id', 'desc')->get();
      return view('admin.properti', compact('properti'));
    }

    public function create()
    {
      $type = Type::all();
      return view('admin.properti-tambah', compact('type'));
    }

    public function store(Request $request)
    {
      $this->validate($request, [
        'judul' => 'required|unique:properties,judul',
        'jenis' => 'required',
        'harga' => 'required|numeric',
        'luas'=> 'required|numeric',
        'alamat' => 'required',
        'lat' => 'required',
        'lng' => 'required',
        'sertifikat' => 'required',
        'deskripsi' => 'required',
        'gambar' => 'required',
      ]);

      $property = new Property;
      $data = $request->all();

      $property->judul = $data['judul'];
      $property->type_id = $data['jenis'];
      $property->harga = $data['harga'];
      $property->sertifikat = $data['sertifikat'];
      $property->luas = $data['luas'] ;
      $property->luas_bangunan = $request->has('luas_bangunan') ? $data['luas_bangunan'] : 0;
      $property->lantai = $request->has('lantai') ? $data['lantai'] : 0;
      $property->kamar_tidur = $request->has('kamar_tidur') ? $data['kamar_tidur'] : 0;
      $property->kamar_mandi = $request->has('kamar_mandi') ? $data['kamar_mandi'] : 0;
      $property->watt = $request->has('daya') ? $data['daya'] : 0;
      $property->alamat = $data['alamat'];
      $property->lat = $data['lat'];
      $property->lng = $data['lng'];
      $property->deskripsi = $data['deskripsi'];
      if ($request->has('seo')){
        $property->seo_judul = str_slug($data['seo']);
      } else {
        $property->seo_judul = str_slug($data['judul']);
      }

      if($request->hasFile('gambar')){
        $gambar = $request->file('gambar');
        $filename = time() . '.' . $gambar->getClientOriginalExtension();
        $path1 = public_path('img/properti/big/' . $filename);
        $path2 = public_path('img/properti/small/' . $filename);

        Image::make($gambar)->resize(1920, null, function ($constraint) {
                              $constraint->aspectRatio();})
                            ->save($path1);
        Image::make($gambar)->fit(750, 500)->save($path2);

        $property->gambar = $filename;
      }

      $property->save();

      return redirect()->action('AdminProperti@index')->with('pesan', 'Input Success');
    }

    public function edit($id)
    {
      $properti = Property::find($id);
      $type = Type::all();
      return view('admin.properti-edit', compact('properti', 'type'));
    }

    public function update(Request $request,$id)
    {
      $this->validate($request, [
        'judul' => 'required',
        'jenis' => 'required',
        'harga' => 'required|numeric',
        'luas'=> 'required|numeric',
        'alamat' => 'required',
        'lat' => 'required',
        'lng' => 'required',
        'sertifikat' => 'required',
        'deskripsi' => 'required',
        'seo' => 'required',
      ]);

      $property = Property::find($id);
      $data = $request->all();

      $property->judul = $data['judul'];
      $property->type_id = $data['jenis'];
      $property->harga = $data['harga'];
      $property->luas = $data['luas'];
      $property->luas_bangunan = $request->has('luas_bangunan') ? $data['luas_bangunan'] : 0;
      $property->lantai = $request->has('lantai') ? $data['lantai'] : 0;
      $property->kamar_tidur = $request->has('kamar_tidur') ? $data['kamar_tidur'] : 0;
      $property->kamar_mandi = $request->has('kamar_mandi') ? $data['kamar_mandi'] : 0;
      $property->watt = $request->has('daya') ? $data['daya'] : 0;
      $property->alamat = $data['alamat'];
      $property->lat = $data['lat'];
      $property->lng = $data['lng'];
      $property->sertifikat = $data['sertifikat'];
      $property->deskripsi = $data['deskripsi'];
      $property->seo_judul = str_slug($data['seo']);

      if($request->hasFile('gambar')){
        $gambar = $request->file('gambar');
        $filename = $property->gambar . '.' . $gambar->getClientOriginalExtension();
        $path1 = public_path('img/properti/big/' . $filename);
        $path2 = public_path('img/properti/small/' . $filename);

        Image::make($gambar)->resize(1920, null, function ($constraint) {
                              $constraint->aspectRatio();})
                            ->save($path1);
        Image::make($gambar)->fit(750, 500)->save($path2);

        $property->gambar = $filename;
      }

      $property->save();

      return redirect()->action('AdminProperti@index')->with('pesan', 'Input Success');
    }

    public function destroy($id)
    {
      $properti = Property::find($id);
      $properti->delete();

      return redirect()->action('AdminProperti@index')->with('hapus', 'Delete Success');
    }

}
