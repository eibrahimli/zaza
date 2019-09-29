<?php

namespace App\Http\Controllers;

use App\Category;
use App\Elanlar;
use App\ElanlarGalery;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use phpDocumentor\Reflection\File;

class ElanlarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $elanlar = Elanlar::orderby('id', 'desc')->where('status', '1')->get();
        return view('backend.elanlar.index',compact('elanlar'));
    }

    public function indexP()
    {
        $elanlar = Elanlar::orderby('id','desc')->where('status',0)->get();

        return view('backend.elanlar.pIndex',compact('elanlar'));
    }

    public function elanActive(Elanlar $elan)
    {
        $elan->update(['status'=>1]);

        return back();
    }

    public function elanSil(Elanlar $elan)
    {
        $elan->delete($elan);

        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $category = Category::orderby('id','desc')->get();
        return view('backend.elanlar.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required','min:6'],
            'category' => ['required','numeric'],
            'email' => ['required','email'],
            'price' => ['required', 'integer'],
            'info' => ['required', 'string'],
            'type' => ['required','string'],
            'country' => ['required','string'],
            'city' => ['required','string'],
            'adress' => ['required','string'],
            'name' => ['required','string'],
            'status' => ['required', 'integer'],
            'tel' => ['required'],
            'photo' => ['required', 'file', 'image', 'mimes:jpeg,jpg,png,gif,svg'],
        ]);

        $request->validate([
            'galery' => 'required',
            'galery.*' => 'file|image|mimes:jpg,png,gif,svg,jpeg',
        ]);

        $elan = Elanlar::create($data);

        if($request->has('photo')):
            $elan->update([
              'photo' => $request->photo->store('uploads/elanlar','public')
            ]);
            $image = Image::make(public_path('storage/'.$elan->photo))->resize(270,204);
            $image->save();
        endif;

        $galeries = Collection::wrap($request->file('galery'));

        $galeries->each(function ($image) use ($elan) {
            $galery = ElanlarGalery::create(['elanlar_id' => $elan->id,'photo' => '']);
            $galery->update([
                'photo' => $image->store('uploads/elanlar/gallery', 'public')
            ]);

            $image = Image::make(public_path('storage/'.$galery->photo))->resize(640,480);
            $image->save();
        });

        return redirect(url('admin/elan'))->with('status', 'Elan uğurla əlavə edildi');

    }

    /**
     * Display the specified resource.
     *
     * @param Elanlar $elan
     * @return void
     */
    public function show(Elanlar $elan)
    {
        $category = Category::orderby('id', 'desc')->get();
        $photos = ElanlarGalery::orderby('id', 'desc')->where('elanlar_id',$elan->id)->paginate(4);
        return view('backend.elanlar.show',compact('elan','photos','category'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Elanlar $elanlar
     * @return void
     */
    public function update(Request $request, Elanlar $elan)
    {
        $oldPhoto = $elan->photo;
        $data = $request->validate([
            'title' => ['required','min:6'],
            'category' => ['required','numeric'],
            'email' => ['required','email'],
            'price' => ['required', 'integer'],
            'info' => ['required', 'string'],
            'type' => ['required','string'],
            'country' => ['required','string'],
            'city' => ['required','string'],
            'adress' => ['required','string'],
            'name' => ['required','string'],
            'status' => ['required', 'integer'],
            'tel' => ['required'],
            'photo' => ['sometimes', 'file', 'image', 'mimes:jpeg,jpg,png,gif,svg'],
        ]);

        $request->validate([
            'galery' => 'sometimes',
            'galery.*' => 'file|image|mimes:jpg,png,gif,svg,jpeg',
        ]);

        $elan->update($data);

        if($request->has('photo')):
            Storage::delete('public/'.$oldPhoto);
            $elan->update([
                'photo' => $request->photo->store('uploads/elanlar','public')
            ]);
            $image = Image::make(public_path('storage/'.$elan->photo))->resize(270,204);
            $image->save();
        endif;

        if($request->has('gallery')):

            $galeries = Collection::wrap($request->file('gallery'));

            $galeries->each(function ($image) use ($elan) {
                $galery = ElanlarGalery::create(['elanlar_id' => $elan->id,'photo' => '']);
                $galery->update([
                    'photo' => $image->store('uploads/elanlar/gallery', 'public')
                ]);

                $image = Image::make(public_path('storage/'.$galery->photo))->resize(640,480);
                $image->save();
            });
        endif;

        return redirect(url('admin/elan/'.$elan->id))->with('status', 'Elan uğurla yeniləndi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Elanlar $elan
     * @return void
     * @throws Exception
     */
    public function destroy(Elanlar $elan)
    {
        Storage::delete('public/'.$elan->photo);
        $galleryies = ElanlarGalery::where('elanid',$elan->id)->get();

        foreach ($galleryies as $galery):
            Storage::delete('public/'.$galery->photo);
        endforeach;

        ElanlarGalery::where('elanlar_id','5')->delete();

        $elan->delete($elan);

        return redirect(url('admin/elan'))->with('status','Elan müfəvvəqiyyətlə silindi');
    }

    public function destroyElanGallery(ElanlarGalery $photo) {
        $photo->delete($photo);

        return back();
    }
}
