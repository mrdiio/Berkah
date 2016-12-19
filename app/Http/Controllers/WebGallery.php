<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\About;
use App\Web;
use App\Contact;
use App\Gallery;
use App\Filter;

class WebGallery extends Controller
{
    //
    public function index()
    {
      $web = Web::all()->first();
      $about = About::all()->first();
      $contact = Contact::all()->first();
      $gallery = Gallery::paginate(9);
      $filter = Filter::all();
      return view('web.gallery', compact('about', 'web','contact','gallery','filter'));
    }
}
