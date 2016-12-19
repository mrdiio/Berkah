<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Team;

class AdminTeam extends Controller
{
    //
    public function index()
    {
      $team = Team::all();
      return view ('admin.team', compact('team'));
    }

    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'nama' => 'required',
        'jabatan' => 'required',
        'facebook' => 'required',
        'twitter' => 'required',
        'instagram' => 'required',
        'gplus' => 'required',
      ]);

      $team = Team::find($id);
      $data = $request->all();

      $team->nama = $data['nama'];
      $team->jabatan = $data['jabatan'];
      $team->facebook = $data['facebook'];
      $team->twitter = $data['twitter'];
      $team->instagram = $data['instagram'];
      $team->gplus = $data['gplus'];

      if($request->hasfile('foto')){
        $foto = $request->file('foto');
        $filename = $team->foto . '.' . $foto->getClientOriginalExtension();
        $path = public_path('img/tim/' . $filename);
        Image::make($foto)->resize(200,200)->save($path);

        $team->foto = $filename;
      }

      $team->save();

      return redirect()->action('AdminTeam@index')->with('update', 'Success');
    }
}
