<?php

namespace App\Http\Controllers;

use App\Category;
use App\Elanlar;
use App\ElanlarGalery;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class SiteController extends Controller
{

    public function index()
    {
        //dd(Category::with('categories')->get());
        $vipelanlar = Elanlar::orderby('id','desc')->where('status',1)->where('type','vip')->get();
        $sonelanlar = Elanlar::orderby('id', 'desc')->where('status', 1)->where('type','adi')->take(12)->get();
        $populyarelanlar = Elanlar::orderby('seen', 'desc')->where('status', 1)->take(12)->get();        

        $categories = Category::whereNull('category_id')->with('childrenCategories')->get();

        // foreach ($cattegories as $categoryy) {
        //     echo $categoryy->id.'  <br>';
        //     foreach ($categoryy->childrenCategories as $categorrr) {
        //         echo $categorrr->id.'  ';
        //         foreach ($categorrr->childrenCategories as $cat) {
        //             echo $cat->id.'<br>';
        //         }
        //     }            
        // }

        // dd('kk');
        return view('frontend.index',compact('vipelanlar','sonelanlar','categories','populyarelanlar'));
    }

    public function show(Elanlar $elan, $slug)
    {
        if(!@$_COOKIE[$elan->id]) {
            setcookie($elan->id, true, time()+86400*30);
            $seen = $elan->seen + 1;
            $elan->update(['seen' => $seen]);
        }

        $tovsiyyeElanlar = Elanlar::where('id','!=',$elan->id)->where('category',$elan->category)->orderby('id','desc')->take(5)->get();
        return view('frontend.elanlar.show',compact('elan','tovsiyyeElanlar'));
    }

    public function elanlar()
    {
        $categories = $this->getCategories();
        $elanlar = Elanlar::where('status', 1)->orderby('id', 'desc')->paginate(18);
        return view('frontend.elanlar.index',compact('elanlar','categories'));
    }

    public function elanlarAsc() {
        $elanlar = Elanlar::where('status', 1)->orderby('id', 'asc')->paginate(18);
        $categories = $this->getCategories();
        return view('frontend.elanlar.index',compact('elanlar','categories'));
    }

    public function elanAxtar(Request $request)
    {
        $data = $request->validate([
            'title' => 'sometimes|nullable',
            'category' => 'sometimes|nullable',
            'city' => 'sometimes|nullable',
            'min' => 'sometimes|nullable',
            'max' => 'sometimes|nullable',
        ]);

        $elan = (new Elanlar())->newQuery();

        $categories = Category::orderby('id','desc')->get();

        if($request->title != null) {
            $elan->where('title', 'like', '%'.$request->title.'%');
        }
        if($request->category != null) {
            $elan->where('category',$request->category);
        }
        if($request->city != null) {
            $elan->where('city','like','%'.$request->city.'%');
        }
        if($request->min != null && $request->max != null) {
            $elan->whereBetween('price',[$request->min,$request->max]);
        }

        //dd($elan->get());

        $elanlar = $elan->where('status',1)->orderby('id','desc')->paginate(18)->appends(['title'=>$request->title]);

        return view('frontend.elanlar.search',compact('elanlar','categories','request'));

    }

    public function elanCreate()
    {
        $categories = $this->getCategories();
        return view('frontend.elanlar.create',compact('categories'));
    }

    public function elanStore(Request $request) {

        $data = $request->validate([
            'title' => ['required','min:6'],
            'category' => ['required','numeric'],
            'email' => ['required','email'],
            'price' => ['required', 'integer'],
            'info' => ['required', 'string'],
            'country' => ['required','string'],
            'city' => ['required','string'],
            'adress' => ['required','string'],
            'name' => ['required','string'],
            'tel' => ['required'],
            'kind' => ['required'],
            'photo' => ['required', 'file', 'image', 'mimes:jpeg,jpg,png,gif,svg'],
        ]);

        $data['status'] = 0;
        $data['type'] = 'adi';

        $request->validate([
            'gallery' => 'required',
            'gallery.*' => 'file|image|mimes:jpg,png,gif,svg,jpeg',
        ]);


        $elan = Elanlar::create($data);

        if($request->has('photo')):
            $elan->update([
                'photo' => $request->photo->store('uploads/elanlar','public')
            ]);
            $image = Image::make(public_path('storage/'.$elan->photo))->resize(270,204);
            $image->save();
        endif;

        $galeries = Collection::wrap($request->file('gallery'));

        $galeries->each(function ($image) use ($elan) {
            $galery = ElanlarGalery::create(['elanlar_id' => $elan->id,'photo' => '']);
            $galery->update([
                'photo' => $image->store('uploads/elanlar/gallery', 'public')
            ]);

            $image = Image::make(public_path('storage/'.$galery->photo))->resize(640,480);
            $image->save();
        });

        return redirect(url('elan/create'))->with('status', 'Elan uğurla əlavə edildi');
    }

    public function catIndex(Category $cat) {
        $categories = $this->getCategories();
        $elanlar = $cat->elan()->orderBy('id','desc')->paginate(18);
        $vipelanlar = $cat->elan()->where('type','vip')->orderBy('id','desc')->take(5)->get();
        return view('frontend.kateqoriyalar.index',compact('cat','categories','elanlar','vipelanlar'));
    }

    public function catAscIndex(Category $cat,$slug)
    {
        $categories = $this->getCategories();
        $elanlar = $cat->elan()->orderBy('id','desc')->paginate(18);
        return view('frontend.kateqoriyalar.index',compact('cat','categories','elanlar'));
    }

    public function katAxtar(Request $request,Category $cat) {
        $data = $request->validate([
            'title' => 'sometimes|nullable',
            'city' => 'sometimes|nullable',
            'min' => 'sometimes|nullable',
            'max' => 'sometimes|nullable',
        ]);

        $elan = (new Elanlar())->newQuery();

        if($request->title != null) {
            $elan->where('title', 'like', '%'.$request->title.'%');
        }
        if($request->city != null) {
            $elan->where('city','like','%'.$request->city.'%');
        }
        if($request->min != null && $request->max != null) {
            $elan->whereBetween('price',[$request->min,$request->max]);
        }

        $elanlar = $elan->where('category',$cat->id)->where('status',1)->orderBy('id','desc')->paginate(18)->appends(['title'=>$request->title]);

        return view('frontend.kateqoriyalar.search',compact('elanlar','cat','request'));
    }

    public function getSubCat(Request $request) {
        $data = $request->validate([
            'id' => 'required|integer',
        ]);

        $subcategories = Category::orderby('id','desc')->where('top_category',$request->id)->get();
        return response()->json($subcategories);
    }

    private function getCategories() {
        return Category::whereNull('category_id')->with('childrenCategories')->get();
    }



}
