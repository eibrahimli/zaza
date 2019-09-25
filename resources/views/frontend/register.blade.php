@extends('frontend.layouts.app')

@section('title', 'Qeydiyyatdan keç | '.$setting->title)

@section('content')

    <div class="publish">
        <h2 class="h2-bottom-line">Qeydiyyat</h2>
        <form id="register" class="form-publish" action="{{ route('register') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="inp-group">
                <input id="s_name" type="text" name="name" value="{{ old('name') }}" placeholder="Login *" class="input">
            </div>
            @error('name')
                <div class="inp-group">
                    <p>* {{ $message }}</p>
                </div>
            @enderror
            <div class="inp-group">
                <input id="s_name" type="text" name="flName" value="{{ old('flName') }}" placeholder="Ad Soyad*" class="input">
            </div>
            @error('flName')
            <div class="inp-group">
                <p>* {{ $message }}</p>
            </div>
            @enderror

            <div class="inp-group">
                <input id="s_password" type="password" name="password" value="" placeholder="Şifrə *" class="input">
            </div>
            @error('password')
                <div class="inp-group">
                    <p>* {{ $message }}</p>
                </div>
            @enderror
            <div class="inp-group">
                <input id="s_password2" type="password" name="password_confirmation" value="" placeholder="Şifrəni təkrar daxil et *" class="input">
            </div>
            @error('password_confirmation')
                <div class="inp-group">
                    <p>* {{ $message }}</p>
                </div>
            @enderror
            <!-- <p id="password-error" style="display:none;">
                Şifrələr uyğun deyil.
            </p> -->
            <div class="inp-group">
                <input id="s_email" type="email" name="email" value="" placeholder="E-mail *" class="input">
            </div>
            @error('email')
                <div class="inp-group">
                    <p>* {{ $message }}</p>
                </div>
            @enderror
            <div class="inp-group">
                <input id="s_phone_mobile" type="text" name="tel" value="" placeholder="Mobil telefon" class="input">
            </div>
            @error('tel')
                <div class="inp-group">
                    <p>* {{ $message }}</p>
                </div>
            @enderror
            <div class="inp-group">
                <select name="tip" id="b_company" class="form-select-2">
                    <option value="fiziki">Fiziki şəxs</option>
                    <option value="şirkət">Şirkət</option>
                </select>
            </div>
            @error('tip')
                <div class="inp-group">
                    <p>* {{ $message }}</p>
                </div>
            @enderror

            <div class="control-group">
                <label class="control-label" for="password">Avatar</label>
                <div class="controls">
                    <img class="avatar no-avatar" style="border: 1px solid rgb(221, 221, 221); background: rgb(255, 255, 255) none repeat scroll 0% 0%; padding: 5px; border-radius: 4px; margin-bottom: 5px;" width="130" class="img-thumbnail"  src="{{ asset('frontend/plugins/avatar_free/no-avatar.jpg') }}" />
                    <br />
                </div>
                <div class="controls">
                    <div id="text">
                        <input id="pAvatar"  name="photo" type="file" />
                        <span id="lblError" style="color: red;"></span>
                    </div>

                </div>
            </div>
            @error('photo')
                <div class="inp-group">
                    <p>* {{ $message }}</p>
                </div>
            @enderror

            <style type="text/css">
                label.error {
                    color:#ff0000;
                    display: block;
                }
            </style>
            <hr>
            <div class="text-center" style="margin: 20px 0 10px 0;"><button class="btn btn-primary btn-center" type="submit">Qeydiyyat</button></div>
            
            <style type="text/css">
                .usl-buttons {
                    margin: 15px auto;
                    font-size: 0.85em;
                    text-align: center;
                }

                .usl-buttons a:first-child {
                    margin-left: 5px;
                }

                .usl-buttons a {
                    margin: 0 2px;
                    display: inline-block;
                }

                .usl-buttons a img {
                    width: 40px;
                }

            </style>
        </form>
    </div>

@endsection
