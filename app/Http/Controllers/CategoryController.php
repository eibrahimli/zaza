<?php

namespace App\Http\Controllers;

use App\Category;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = Category::orderby('id','desc')->get();
        return view('backend.kateqoriyalar.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::orderby('id','desc')->get();
        return view('backend.kateqoriyalar.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'az_name' => ['required','min:2'],
            'ru_name' => ['required','min:2'],
            'top_category' => ['sometimes'],
            'icon' => ['required', 'file', 'image', 'mimes:jpeg,jpg,png,gif,svg']
        ]);

        //dd(public_path('storage'));

        $category = Category::create($data);


        if($request->has('icon')) {
            $category->update([
                'icon' => $request->icon->store('uploads','public'),
            ]);

            $image = Image::make(public_path('storage/'.$category->icon))->resize(27,28);
            $image->save();
        }

        return back()->with('status', 'Kateqoriya əlavə edildi');
    }   


    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return void
     */
    public function edit(Category $category)
    {
        
        $categories = Category::orderby('id','desc')->where('id','!=',$category->id)->get();
        return view('backend.kateqoriyalar.edit',compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, Category $category)
    {
        $oldIcon = $category->icon;
        $data = $request->validate([
            'az_name' => ['required','min:2'],
            'ru_name' => ['required','min:2'],
            'top_category' => ['sometimes'],
            'icon' => ['sometimes', 'file', 'image', 'mimes:jpeg,jpg,png,gif,svg']
        ]);

        $category->update($data);

        if($request->has('icon')) {
            Storage::delete('public/'.$oldIcon);
            $category->update([
                'icon' => $request->icon->store('uploads','public'),
            ]);

            $image = Image::make(public_path('storage/'.$category->icon))->resize(28,27);
            $image->save();
        }

        return back()->with('status', 'Kateqoriya yeniləndi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return Response
     * @throws Exception
     */
    public function destroy(Category $category)
    {
        Storage::delete('public/'.$category->icon);
        $category->delete($category);

        return back()->with('status', 'Kateqoriya uğurlu şəkildə silindi');
    }
}
