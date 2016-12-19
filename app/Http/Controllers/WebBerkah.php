<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\About;
use App\Web;
use App\Contact;
use App\Property;
use App\Team;
use App\Article;
use App\Slide;
use App\Testimonial;

class WebBerkah extends Controller
{
    //
    public function index()
    {
      $web = Web::all()->first();
      $about = About::all()->first();
      $slide = Slide::all();
      $contact = Contact::all()->first();
      $properti = Property::take(6)->orderBy('id','desc')->get();
      $team = Team::all();
      $article = Article::take(3)->orderBy('id','desc')->get();
      $testimoni = Testimonial::all();
      return view('web.home', compact('web','about','slide','contact','properti','team','article','testimoni'));
    }
}
