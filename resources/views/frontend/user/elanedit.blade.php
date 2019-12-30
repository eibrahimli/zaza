@extends('frontend.layouts.app')

@section('title', $setting->title.' | '.$elan->title.' başlıqlı elanı yenilə')

@section('content')

    <div class="publish">
        <h2 class="h2-bottom-line"><i><b>{{ ucfirst($elan->title) }}</b></i> Başlıqlı Elanı Yenilə</h2>


        <form action="{{ route('user.elanUpdate',[auth()->id(),$elan->id]) }}" class="form-publish" method="post"
              enctype="multipart/form-data">
            @if(session('status'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <a href="#" class="close" data-dismiss="alert" style="margin-top: -5px" aria-label="close"
                       title="close">×</a>
                    {{!! session('status') !!}}
                </div>
            @endif
            @csrf
            @method('patch')
            <div class="inp-group">
                <h4 class="inp-group__title">Kateqoriya <span>*</span></h4>
                <div class="inp-counter titledis">
                    <select id="select_1" name="category" depth="1">
                        @foreach ($categories as $category)
                            <option
                                {{ $category->id == $elan->category ? 'selected' : null }} value="{{ $category->id }}">{{ app()->getLocale() == 'az' ? $category->az_name : $category->ru_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @error('category')
            <div class="inp-group">
                <div class="alert alert-warning">
                    {{ $message }}
                </div>
            </div>
            @enderror
            <div class="inp-group">
                <h4 class="inp-group__title">Elan Növü <span>*</span></h4>
                <div class="inp-counter titledis">
                    <select id="select_1" name="kind" depth="1">
                        <option value="yeni" {{ $elan->kind == 'yeni' ? 'selected': null }}>Yeni</option>
                        <option value="kohne" {{ $elan->kind == 'kohne' ? 'selected': null }}>Köhnə</option>
                    </select>
                </div>
            </div>
            @error('kind')
                <div class="inp-group">
                    <div class="alert alert-warning">
                        {{ $message }}
                    </div>
                </div>
            @enderror
            <div class="inp-group">
                <h4 class="inp-group__title">Başlıq <span>*</span></h4>
                <div class="inp-counter titledis">
                    <input required min="3" max="70" id="title" type="text" name="title"
                           value="{{ old('title') ?? $elan->title }}">
                    <span class="inp-counter__count" data-val="70">70</span>
                </div>
            </div>
            @error('title')
            <div class="inp-group">
                <div class="alert alert-warning">
                    {{ $message }}
                </div>
            </div>
            @enderror

            <div class="input-group">
                <div class="control-group">
                    <h4 class="inp-group__title">Elan indeks şəkli <span>*</span></h4>
                    <div class="controls">
                        <img class="avatar"
                             style="border: 1px solid rgb(221, 221, 221); background: rgb(255, 255, 255) none repeat scroll 0% 0%; padding: 5px; border-radius: 4px; margin-bottom: 5px;"
                             width="130"
                             src="http://localhost:8000/storage/uploads/users/gt6t0dpTc2IUJ785poNPhTQQgFRi85qMfnFcepg8.jpeg">
                        <br>
                    </div>
                    <div class="controls">
                        <div id="text">
                            <input id="pAvatar" name="photo" type="file">
                            <span id="lblError" style="color: red;"></span>
                        </div>
                    </div>
                </div>
            </div>
            @error('photo')
            <div class="inp-group">
                <div class="alert alert-warning">
                    {{ $message }}
                </div>
            </div>
            @enderror
            <br>
            <div class="input-group">
                <div class="control-group">
                    <h4 class="inp-group__title">Elan post şəkli <span>*</span></h4>
                    <div class="controls">
                        <ul class="qq-upload-list">
                            @foreach($elan->eg as $gallery)
                                <li class="qq-upload-success">
                                    <a class="qq-upload-delete btn btn-danger"
                                       style="display: inline; color: white !important; margin-bottom: 20px;"
                                       href="{{ route('user.elangallerysil',[auth()->id(),$gallery->id]) }}">Sil</a>
                                    <div class="ajax_preview_img">
                                        <img src="{{ asset('storage/'.$gallery->photo) }}"
                                             alt="{{ explode('/',$gallery->photo)[3] }}">
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <br>
                    </div>
                    <div class="controls">
                        <div id="text">
                            <input id="pAvatar" multiple name="gallery[]" type="file">
                            <span id="lblError" style="color: red;"></span>
                        </div>
                    </div>
                </div>
            </div>
            @error('gallery')
            <div class="inp-group">
                <div class="alert alert-warning">
                    {{ $message }}
                </div>
            </div>
            @enderror
            <br>

            <div class="inp-group">
                <h4 class="inp-group__title">Məlumat <span>*</span></h4>
                <div class="inp-counter titledis">
                    <textarea required id="description" name="info"
                              rows="10">{{ old('info') ?? $elan->info }}</textarea>
                    <span class="inp-counter__count bottom-count" data-val="5000">5000</span>
                </div>
            </div>
            @error('info')
            <div class="inp-group">
                <div class="alert alert-warning">
                    {{ $message }}
                </div>
            </div>
            @enderror
            <div class="inp-group">
                <h4 class="inp-group__title">Qiymət</h4>
                <div class="inp-select">
                    <div class="form-group-sm">
                        <input required id="price" type="text" name="price" value="{{ $elan->price }}">
                    </div>
                    <div class="select_currency">
                        <select id="currency" tabindex="-1" class="select2-hidden-accessible" aria-hidden="true">
                            <option value="azn">Azn</option>
                        </select>
                    </div>
                </div>
            </div>
            @error('price')
            <div class="inp-group">
                <div class="alert alert-warning">
                    {{ $message }}
                </div>
            </div>
            @enderror
            <input type="hidden" name="name" value="{{ $user->flName }}">
            <input type="hidden" name="email" value="{{ $user->email }}">

            <div class="inp-group">
                <h4 class="inp-group__title">Ölkə</h4>
                <input required name="country" type="text" value="{{ old('country') ?? $elan->country }}">
            </div>
            @error('country')
            <div class="inp-group">
                <div class="alert alert-warning">
                    {{ $message }}
                </div>
            </div>
            @enderror
            <div class="inp-group">
                <h4 class="inp-group__title">Şəhər</h4>
                <input required id="cityArea" type="text" name="city" value="{{ old('city') ?? $elan->city }}">
            </div>
            @error('city')
            <div class="inp-group">
                <div class="alert alert-warning">
                    {{ $message }}
                </div>
            </div>
            @enderror
            <div class="inp-group">
                <h4 class="inp-group__title">Adress</h4>
                <input required id="address" type="text" name="adress" value="{{ old('adress') ?? $elan->adress }}">
            </div>
            @error('adress')
            <div class="inp-group">
                <div class="alert alert-warning">
                    {{ $message }}
                </div>
            </div>
            @enderror
            <div class="inp-group">
                <h4 class="inp-group__title">Mobil Telefon</h4>
                <input required id="address" type="text" name="tel" value="{{ old('tel') ?? $elan->tel }}">
            </div>
            @error('tel')
            <div class="inp-group">
                <div class="alert alert-warning">
                    {{ $message }}
                </div>
            </div>
            @enderror
            <div class="inp-group">
                <button type="submit" class="btn btn-center upcase">Yenilə</button>
            </div>
        </form>
    </div>

@endsection
@section('css')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@endsection
@section('js')
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
@endsection



