@extends('frontend.layouts.app')
@section('title', $setting->title.' | Giriş  Səhifəsi')

@section('content')

    <div class="publish">
        <h2 class="h2-bottom-line">Sayta Giriş</h2>
        <form action="{{ route('login') }}" method="post" class="form-publish">
            @csrf
            @error('email')
            <div class="inp-group">
                <div class="alert alert-warning">
                    <p>* {{ $message }}</p>
                </div>
            </div>
            @enderror
            <div class="inp-group">
                <input type="email" name="email" id="email" class="input @error('password') is-invalid @enderror" placeholder="E-mail">
            </div>
            <div class="inp-group">
                <input type="password" name="password" id="password" class="input @error('password') is-invalid @enderror" placeholder="Parol">
            </div>
            @error('password')
                <div class="alert alert-warning">
                    {{ $message }}
                </div>
            @enderror
            <button class="btn btn-primary btn-center" type="submit">Giriş Et</button>
            <a href="{{ url('register') }}" class="help__link">Qeydiyyat</a>
            <a href="{{ url('') }}" class="help__link">Şifrəmi Unutdum ?</a>

        </form>
    </div>

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

@endsection
