<?php

namespace App\Http\Controllers;

use App\Ayarlar;
use Illuminate\Http\Request;
use App\Jobs\DownloadLogoForSite;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index() {
        $ayarlar = Ayarlar::first();
        $social = explode('|||',$ayarlar->social);
        $face = $social[0];
        $insta = $social[1];

        return  view('backend.ayarlar',compact('ayarlar','face','insta'));

    }

    public function update(Request $request,Ayarlar $ayarlar) {
        $oldLogo = $ayarlar->logo;
        $data = $request->validate([
            'face' => 'required',
            'insta' => 'required',
            'title' => 'required',
            'desc' => 'required',
            'tel' => 'required|numeric',
            'email' => 'required|email',
            'location' => 'required',
            'keyw' => 'required',
            'logo' => 'sometimes|image|mimes:jpg,jpeg,png,gif,svg'
        ],[
            'title.required' => 'Saytın başlığı boş olmamalıdır',
            'desc.required' => 'Saytın açıqlaması boş olmamalıdır',
            'tel.required' => 'Boş olmamalıdır',
            'tel.numeric' => 'Ancaq rəqəm olmalıdır',
            'email.email' => 'Ancaq email yazılmalıdır',
            'email.required' => 'Boş olmamalıdır',
            'face.required' => 'Boş olmamalıdır',
            'insta.required' => 'Boş olmamalıdır',
            'location.required' => 'Boş olmamalıdır',
            'keyw.required' => 'Boş olmamalıdır',
        ]);

        $data['social'] = $data['face'].'|||'.$data['insta'];
        array_shift($data);  array_shift($data);

        $ayarlar->update($data);
        if($request->has('logo')) {
            Storage::delete('public/'.$oldLogo);
            $ayarlar->update([
                'logo' => $request->logo->store('uploads','public'),
            ]);
            DownloadLogoForSite::dispatch($ayarlar);
        }

        return back()->with('status','Əməliyyat uğurla başa çatdı');
    }

    public function shareMenuToAllViews($view) {
        $menu = [
            "" => [
              "id" => "anasehife",
              "title" => "AnaSəhifə",
              "icon" => "ti-dashboard"
            ],
            'ayarlar' => [
              'id' => 'ayarlar',
              'title' => 'Ayarlar',
              'icon' => 'ti-settings'
            ],
            'users' => [
                'id' => 'users',
                'title' => 'İstifadəçilər',
                'icon' => 'fa fa-users',
                'submenu' => [
                    '/' => 'Bütün istifadəçilər',
                    'add' => 'Yeni istifadəçi',
                ]

            ],
            'elan' => [
                'id' => 'elanlar',
                'title' => 'Elanlar',
                'icon' =>'fas fa-ad',
                'submenu' => [
                    '/' => 'Bütün aktiv elanlar',
                    'p' => 'Bütün passiv elanlar',
                    'add' => 'Yeni elan əlavə et'
                ]
            ],
            'elankat' => [
                'id' => 'kateqoriyalar',
                'title' => 'Elan Kateqoriyaları',
                'icon' => 'fas fa-list',
                'submenu' => [
                    '/' => 'Bütün Kateqoriyalar',
                    'add' => 'Yeni Kateqoriya'
                ]
            ]

          ];
        $view->with('menu', $menu);
    }
}
