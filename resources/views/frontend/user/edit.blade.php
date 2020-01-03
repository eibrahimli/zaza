@extends('frontend.layouts.app')

@section('title', $setting->title.' | '.auth()->user()->flName.' istifadəçisinə aid məlumatlar')

@section('content')
    @section('breadcrumbli')

        <li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"> » <a href="{{ route('user.index',auth()->id()) }}" itemprop="url"><span itemprop="title">Profilim</span></a></li>            

        <li class="last-child" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"> » <span itemprop="title">{{ $user->flName }} istifadəçisini redaktə et</span></li>

    @endsection
    <div class="col-wrp">
        @include('frontend.inc.colleft')
        <div class="col-main">
            @if(session('status'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                    {{!! session('status') !!}}
                </div>
            @endif
            <form action="{{ route('user.update', auth()->id()) }}" method="post" class="options-form" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <h2 class="page-title">Profili Yenilə</h2>
                <div class="inp-group">
                    <div class="input-row">
                        <div class="control-group">
                            <label class="control-label" for="password">Profil Şəkli</label>
                            <div class="controls">
                                <img class="avatar" style="border: 1px solid rgb(221, 221, 221); background: rgb(255, 255, 255) none repeat scroll 0% 0%; padding: 5px; border-radius: 4px; margin-bottom: 5px;" width="130" src="{{ asset('storage/'.$user->photo) }}">
                                <br>
                            </div>
                            <div class="controls">
                                <div id="text">
                                    <input id="pAvatar" name="photo" type="file">
                                    <span id="lblError" style="color: red;"></span>
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

                        <br><br>
                        <div class="input-col">
                            <h4 class="inp-group__title">Ad Soyad</h4>
                            <input id="s_name" type="text" required name="flName" value="{{ old('flName') ?? $user->flName }}">
                        </div>
                        @error('flName')
                            <div class="inp-group">
                                <div class="alert alert-warning">
                                    {{ $message }}
                                </div>
                            </div>
                        @enderror

                        <div class="input-col">
                            <h4 class="inp-group__title">E-mail</h4>
                            <input id="s_email" type="text" required name="email" class="form-control" value="{{ old('email') ?? $user->email }}">
                        </div>
                        @error('email')
                            <div class="inp-group">
                                <div class="alert alert-warning">
                                    {{ $message }}
                                </div>
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="inp-group">
                    <div class="input-row">
                        <div class="input-col">
                            <h4 class="inp-group__title">Login</h4>
                            <input id="s_phone_land" required min="3" type="text" name="name" value="{{ old('name') ?? $user->name }}">
                        </div>
                        @error('name')
                            <div class="inp-group">
                                <div class="alert alert-warning">
                                    {{ $message }}
                                </div>
                            </div>
                        @enderror
                        <div class="input-col">
                            <h4 class="inp-group__title">Şifrə</h4>
                            <input id="s_phone_land" type="password" name="password">
                        </div>
                        @error('password')
                        <div class="inp-group">
                            <div class="alert alert-warning">
                                {{ $message }}
                            </div>
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="inp-group">
                    <div class="input-row">
                        <div class="input-col">
                            <h4 class="inp-group__title">Tip</h4>
                            <div class="select">
                                <select name="tip" id="b_company" tabindex="-1" class="select2-hidden-accessible" aria-hidden="true">
                                    <option value="fiziki" {{ $user->tip == 'fiziki' ? 'selected' : null }}>Fiziki Şəxs</option>
                                    <option value="şirkət" {{ $user->tip == 'şirkət' ? 'selected' : null }}>Şirkət</option>
                                </select>
                            </div>
                        </div>
                        @error('tip')
                        <div class="inp-group">
                            <div class="alert alert-warning">
                                {{ $message }}
                            </div>
                        </div>
                        @enderror
                        <div class="input-col">
                            <h4 class="inp-group__title">Telefon</h4>
                            <input id="s_phone_land" type="text" name="tel" value="{{ old('tel') ?? $user->tel }}">
                        </div>
                        @error('tel')
                        <div class="inp-group">
                            <div class="alert alert-warning">
                                {{ $message }}
                            </div>
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="inp-group">
                    <h4 class="inp-group__title">Ölkə</h4>
                    <input id="s_phone_land" type="text" name="country" value="{{ old('country') ?? $user->country }}">
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
                    <input id="s_phone_land" type="text" name="city" value="{{ old('city') ?? $user->city }}">
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
                    <input id="address" type="text" name="adress" value="{{ old('adress') ?? $user->adress }}">
                </div>
                @error('adress')
                <div class="inp-group">
                    <div class="alert alert-warning">
                        {{ $message }}
                    </div>
                </div>
                @enderror
                <div class="inp-group">
                    <h4 class="inp-group__title">Məlumat</h4>
                    <textarea id="s_inforu_RU" name="info" rows="10">{{ $user->info }}</textarea>

                    <button class="btn btn-primary" type="submit">Yenilə</button>
                    <button class="btn btn-primary" type="button" onclick="event.preventDefault(); window.location.replace('{{ url('user/'.$user->id.'/sil') }}');"><i class="fa fa-close"></i> Profili Sil</button>
                </div>
                @error('info')
                <div class="inp-group">
                    <div class="alert alert-warning">
                        {{ $message }}
                    </div>
                </div>
                @enderror
            </form>
        </div>
    </div>

@endsection

@section('css')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@endsection
@section('js')
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@endsection
