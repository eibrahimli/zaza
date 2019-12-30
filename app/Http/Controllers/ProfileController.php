<?php

namespace App\Http\Controllers;

use App\Elanlar;
use App\ElanlarGalery;
use App\Jobs\ResizeUsersImageJob;
use App\User;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        if(\auth()->id() == $user->id):
            $elanlar = Elanlar::where('email',$user->email)->orderBy('id','desc')->paginate(10);
            return view('frontend.user.index',compact('user','elanlar'));
        endif;

        return redirect(url('/'));
    }

    public function edit(User $user)
    {

        return view('frontend.user.edit',compact('user'));
    }

    public function update(User $user, Request $request) {
        $oldPhoto = $user->photo;
        $data = $request->validate([
            'name' => 'required|min:6',
            'flName' => 'required|min:6',
            'email' => 'required|email',
            'password' => 'sometimes',
            'tip' => 'required',
            'tel' => 'required',
            'country' => 'required',
            'city' => 'required',
            'adress' => 'required',
            'info' => 'required',
            'kind' => ['required'],
            'photo' => 'sometimes|image|mimes:jpg,jpeg,png,gif,svg'
        ]);
        if(empty($data['password'])):
            $data['password'] = $user->password;
        else:
            $data['password'] = Hash::make($data['password']);
        endif;

        $user->update($data);

        if($request->has('photo')):
            Storage::delete('public/'.$oldPhoto);
            $user->update([
                'photo' => $request->photo->store('uploads/users','public'),
            ]);
            ResizeUsersImageJob::dispatch($user);
        endif;

        return redirect(route('user.edit',$user->id))->with('status', "{ <b>".$user->flName."</b> } adlı istifadəçi yeniləndi");
    }

    public function destroy(User $user) {
        Storage::delete('public/'.$user->photo);
        $user->delete();
        Auth::logout();
        return redirect(url(''));
    }

    public function elanedit(User $user,Elanlar $elan)
    {
        $categories = Category::orderby('id','desc')->get();
        return view('frontend.user.elanedit',compact('user','categories','elan'));
    }

    public function elanSil(User $user, Elanlar $elan)
    {
        foreach ($elan->eg as $elangallery):
            Storage::delete('public/'.$elangallery->photo);
        endforeach;

        $elan->eg()->delete();

        Storage::delete('public/'.$elan->photo);

        $elan->delete();

        return back()->with('status', 'Elan uğurla silindi');
    }

    public function elanUpdate(User $user,Elanlar $elan,Request $request)
    {
        if(auth()->id() == $user->id):
            $oldPhoto = $elan->photo;
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
                'photo' => ['sometimes', 'file', 'image', 'mimes:jpeg,jpg,png,gif,svg'],
            ]);

            $request->validate([
                'gallery' => 'sometimes',
                'gallery.*' => 'file|image|mimes:jpg,png,gif,svg,jpeg',
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

            return back()->with('status', 'Elan uğurla yeniləndi');
        endif;

        dd('Hacking?');
    }

    public function elangallerysil(User $user, ElanlarGalery $elan)
    {
        if($user->id == auth()->id()):
            Storage::delete('public/'.$elan->photo);
            $elan->delete();
        return back();
        endif;

        dd('Hacking?');
    }

}
