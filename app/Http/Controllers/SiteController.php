<?php

namespace App\Http\Controllers;

use App\Category;
use App\Elanlar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    private $sql;
    public function index()
    {

        $vipelanlar = Elanlar::orderby('id','desc')->where('status',1)->where('type','vip')->get();
        $sonelanlar = Elanlar::orderby('id', 'desc')->where('status', 1)->where('type','adi')->get();
        $categories = Category::orderby('id','desc')->get();
        return view('frontend.index',compact('vipelanlar','sonelanlar','categories'));
    }

    public function show(Elanlar $elan, $slug)
    {
        $tovsiyyeElanlar = Elanlar::where('id','!=',$elan->id)->where('category',$elan->category)->orderby('id','desc')->take(5)->get();
        return view('frontend.elanlar.show',compact('elan','tovsiyyeElanlar'));
    }

    public function elanlar()
    {
        $categories = Category::orderby('id','desc')->get();
        $elanlar = Elanlar::where('status', 1)->orderby('id', 'desc')->paginate(1);
        return view('frontend.elanlar.index',compact('elanlar','categories'));
    }

    public function elanAxtar(Request $request) {
        $data = $request->validate([
            'title' => 'sometimes|nullable',
            'category' => 'sometimes|nullable',
            'city' => 'sometimes|nullable',
            'min' => 'sometimes|nullable',
            'max' => 'sometimes|nullable',
        ]);

        dd($data);

        $elanlar = DB::table('elanlars')
            ->where('title', 'like', '%'.$request->title.'%')
            ->where('category',$request->category)
            ->where('city', $request->city)
            ->whereBetween('price', [$request->min, $request->max])
            ->get();

        dd($elanlar);
        ;
    }

}
