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

class WebProperti extends Controller
{
    //
    public function index(Request $request)
    {
      $web = Web::all()->first();
      $about = About::all()->first();
      $contact = Contact::all()->first();
      $kategori = Category::all();
      $types = Type::all();
      $popular = Property::orderBy('view_count', 'desc')->take(3)->get();
      $jenis = $request->has('jenis') ? $request->get('jenis') : [];
      $min = $request->has('min_harga') ? $request->get('min_harga') : 0;
      $max = $request->has('max_harga') == 0 ? '' : $request->get('max_harga');

      $property = Property::where(function($query) use ($request) {
        $min = $request->has('min_harga') ? $request->get('min_harga') : '0';
        $max = $request->has('max_harga') == 0 ? '99999999999999999999' : $request->get('max_harga');
        $jenis = $request->has('jenis') ? $request->get('jenis') : [];

        if (isset($min) && isset($max) && isset($jenis)) {
            foreach ($jenis as $filter) {
              # code...
              $query->Where('type_id', '=', $filter);
            }
            $query->Where('harga', '>=', $min)
                  ->Where('harga', '<=', $max);
        }
        else if (isset($min) && isset($max)) {
              # code...
              $query->Where('harga', '>=', $min)
                    ->Where('harga', '<=', $max);
        }
        else if (isset($jenis)) {
            foreach ($jenis as $filter) {
              # code...
              $query->orWhere('type_id', '=', $filter);
            }
        }
      });
      $properti = $property->orderBy('id', 'desc')->paginate(6);

      return view('web.properti', compact('about', 'web', 'contact','property','properti', 'kategori','types', 'popular', 'jenis','max','min'));
    }

    public function show($id)
    {
      $about = About::all()->first();
      $web = Web::all()->first();
      $contact = Contact::all()->first();
      $kategori = Category::all();
      $types = Type::all();
      $popular = Property::orderBy('view_count', 'desc')->take(3)->get();
      $properti = Property::where('seo_judul', '=', $id)->first();
      $terkait = Property::where('type_id', '=' , $properti->type_id)->get();
      return view('web.properti-detail', compact('properti','web','contact','about','kategori', 'terkait','types','popular'));
    }

    public function update(Request $request, $id){
      $view = Property::where('seo_judul', '=', $id)->first();

      $view->view_count = $view->increment('view_count');
      return redirect()->action('WebProperti@show', $id);
    }
}
