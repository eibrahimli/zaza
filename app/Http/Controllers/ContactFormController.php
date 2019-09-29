<?php

namespace App\Http\Controllers;

use App\Events\SendContactMailEvent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ContactFormController extends Controller
{
    public function index() {

        return view('frontend.contact');
    }

    public function create(Request $request) {

        $data = $request->validate([
            'subject' => 'required|min:3',
            'message' => 'required|min:2',
            'flName' => 'required',
            'email' => 'required|email',
        ]);

        event(new SendContactMailEvent($data));

        return redirect(url('contact'))->with('status', 'Mesajınız uğurlu şəkildə göndərildi');
    }
}
