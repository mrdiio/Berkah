<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\About;
use App\Web;
use App\Contact;
use App\Category;
use App\Type;
use App\Article;
use App\Property;

class WebCategory extends Controller
{
    //
    public function show($id)
    {
      $about = About::first();
      $web = Web::first();
      $contact = Contact::first();
      $kategori = Category::all();
      $type = Type::all();
      $popular = Property::orderBy('view_count', 'desc')->take(3)->get();

      $category = Category::where('nama', '=', $id)->first();
      $page = Article::where('category_id', $category->id)->paginate(6);
      return view('web.category', compact('category','web','contact','about','kategori','type','page','popular'));
    }
}
