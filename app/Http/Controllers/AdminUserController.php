<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Jobs\ResizeUsersImageJob;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = User::orderby('id', 'desc')->get();
        return view('backend.users.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.users.create');
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
            'name' => 'required|min:6',
            'flName' => 'required|min:6',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'tip' => 'required',
            'tel' => 'required',
            'country' => 'required',
            'city' => 'required',
            'adress' => 'required',
            'info' => 'required',
            'photo' => 'required|image|mimes:jpeg,jpg,png,gif,svg'
        ]);
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        if($request->has('photo')) {
            $user->update([
                'photo' => $request->photo->store('uploads/users','public'),
            ]);

            ResizeUsersImageJob::dispatch($user);
        }

        return redirect(url('admin/users'))->with('status','{ '.$user->flName. ' } ad və soyadlı istifadəçi bazaya əlavə edildi');

    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function show(User $user)
    {
        return view('backend.users.show',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return Response
     */
    public function update(Request $request, User $user)
    {
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

        return redirect(url('admin/users/'.$user->id))->with('status', '{ '.$user->flName.' } adlı istifadəçi yeniləndi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return Response
     * @throws Exception
     */
    public function destroy(User $user)
    {
        $name = $user->flName;
        Storage::delete('public/'.$user->photo);
        $user->delete($user);

        return redirect(url('admin/users'))->with('status', '{ '.$name.' } adlı istifadəçi silindi');
    }

    // public function deneme(Request $request) {
    //     return response(['tip'=>'ok']);
    // }
}
