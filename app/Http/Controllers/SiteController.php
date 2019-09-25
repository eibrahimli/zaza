<?php

namespace App\Http\Controllers;

use App\Category;
use App\Elanlar;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index() {

        $vipelanlar = Elanlar::orderby('id','desc')->where('status',1)->where('type','vip')->get();
        $sonelanlar = Elanlar::orderby('id', 'desc')->where('status', 1)->where('type','adi')->get();
        $categories = Category::orderby('id','desc')->get();

        return view('frontend.index',compact('vipelanlar','sonelanlar','categories'));
    }


}
