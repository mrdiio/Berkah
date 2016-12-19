<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Contact;

use Illuminate\Support\Facades\Session;

class AdminContact extends Controller
{
    //
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {
      $contact = Contact::all()->first();
      return view ('admin.contact', compact('contact'));
    }

    public function store(Request $request)
    {
      $contact = Contact::first();

      $this->validate($request, [
        'alamat' => 'required',
        'email' => 'required|email',
        'telepon' => 'required|max:13',
        'bbm' => 'required',
        'facebook' => 'required',
        'twitter' => 'required',
        'gplus' => 'required',
        'youtube' => 'required',
      ]);

      $data = $request->all();

      $contact->alamat = $data['alamat'];
      $contact->email = $data['email'];
      $contact->phone = $data['telepon'];
      $contact->bbm = $data['bbm'];
      $contact->facebook = $data['facebook'];
      $contact->twitter = $data['twitter'];
      $contact->gplus = $data['gplus'];
      $contact->youtube = $data['youtube'];

      $contact->save();

      Session::flash('pesan', 'Sukses');
      return redirect()->back();
    }

}
