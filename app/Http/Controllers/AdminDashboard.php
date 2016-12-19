<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;
use App\Article;
use App\Gallery;

class AdminDashboard extends Controller
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
      $properti = Property::all();
      $artikel = Article::all();
      $galeri = Gallery::all();
      $property = Property::orderBy('id','desc')->take(5)->get();
      $article = Article::orderBy('id','desc')->take(5)->get();
      $gallery = Gallery::orderBy('id','desc')->take(5)->get();
      return view('admin.dashboard', compact('property','article','gallery','properti','artikel','galeri'));
    }
}
