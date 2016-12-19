<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\About;
use App\Web;
use App\Contact;
use App\Property;
use App\Category;
use App\Type;

class WebType extends Controller
{
    //
    public function show($id)
    {
      $about = About::first();
      $web = Web::first();
      $contact = Contact::first();
      $kategori = Category::all();
      $type = Type::all();

      $jenis = Type::find($id);
      $page = Property::where('type_id', $id)->paginate(6);
      return view('web.type', compact('jenis','web','contact','about','kategori','type','page'));
    }
}
