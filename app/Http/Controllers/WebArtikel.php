<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\About;
use App\Web;
use App\Contact;
use App\Article;
use App\Category;
use App\Property;
use App\Type;

class WebArtikel extends Controller
{
    //
    public function index()
    {
      $web = Web::all()->first();
      $about = About::all()->first();
      $contact = Contact::all()->first();
      $artikel = Article::orderBy('id', 'desc')->paginate(6);
      $kategori = Category::all();
      $types = Type::all();
      $popular = Property::orderBy('view_count', 'desc')->take(3)->get();

      return view('web.artikel', compact('about','web','contact','artikel','kategori','types','popular'));
    }

    public function show($id)
    {
      $web = Web::all()->first();
      $about = About::all()->first();
      $contact = Contact::all()->first();
      $artikel = Article::find($id);
      $kategori = Category::all();
      $types = Type::all();
      $terkait = Article::find($id)->where('category_id', '=' , $artikel->category_id)->get();
      $popular = Property::orderBy('view_count', 'desc')->take(3)->get();

      return view('web.artikel-detail', compact('about','web','contact','artikel','kategori','terkait','types','popular'));
    }
}
