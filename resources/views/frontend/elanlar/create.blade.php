@extends('frontend.layouts.app')

@section('title',$setting->title.' | Yeni elan əlavə et')

@section('content')
    
    @section('breadcrumbli')

        <li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"> » <a href="{{ route('elanlar') }}" itemprop="url"><span itemprop="title">Bütün Elanlar</span></a></li>            
    
        <li class="last-child" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"> » <span itemprop="title">Elan Yerləşdir</span></li>

    @endsection

    @if(session('status'))
        <div class="alert alert-success" role="alert" >
            {{ session('status') }}
        </div>
    @endif

    <div class="publish">
        <h2 class="h2-bottom-line">Yeni elan əlavə et</h2>
        <form action="{{ route('elanlar.store') }}" class="form-publish" method="post" enctype="multipart/form-data">
            @csrf
            <div class="inp-group">
                <h4 class="inp-group__title">Kateqoriya</h4>
                <select name="category" id="categoryId">
                    @foreach($categories as $category)
                        <option {{ old('category') == $category->id ? 'selected' : null }} value="{{ $category->id }}">{{ $category->az_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="inp-group">
                <h4 class="inp-group__title">Başlıq <span>*</span></h4>
                <div class="inp-counter titledis">
                    <input id="title" required type="text" name="title" value="{{ old('title') }}"/> <span
                        class="inp-counter__count" data-val="70">70</span>
                </div>
            </div>
            @error('title')
                <div class="inp-group">
                    <div class="alert alert-warning">
                        {{ $message }}
                    </div>
                </div>
            @enderror
            <div class="inp-group">
                <h4 class="inp-group__title">Elanın Növü</h4>
                <select name="kind" id="kind">
                    <option selected disabled>Elan Növünü Seçin</option>
                    <option value="yeni">Yeni</option>
                    <option value="kohne">Köhnə</option>
                </select>
            </div>
            @error('kind')
                <div class="inp-group">
                    <div class="alert alert-warning">
                        {{ $message }}
                    </div>
                </div>
            @enderror
            <div class="inp-group">
                <h4 class="inp-group__title">Məlumat <span>*</span></h4>
                <div class="inp-counter titledis">
                    <textarea required id="info" name="info" rows="10">{{ old('info') }}</textarea> <span
                        class="inp-counter__count bottom-count" data-val="5000">5000</span>
                </div>
            </div>
            @error('info')
                <div class="inp-group">
                    <div class="alert alert-warning">
                        {{ $message }}
                    </div>
                </div>
            @enderror
            <div class="input-group">
                <h4 class="inp-group__title">Elan İndeks Şəkli <span>*</span></h4>
                <div class="inp-counter">
                    <input id="photo" required type="file" name="photo" value=""/>
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
            <br>

            <div class="input-group">
                <h4 class="inp-group__title">Elan Qaleriya Şəkli <span>*</span></h4>
                <input id="photo" required type="file" name="gallery[]" multiple value=""/>
            </div>

            @error('gallery')
                <div class="inp-group">
                    <div class="alert alert-warning">
                        {{ $message }}
                    </div>
                </div>
            @enderror

            <br>
            <br>
            <!--  -->
            <div class="inp-group">
                <h4 class="inp-group__title">Qiymət <span>*</span></h4>
                <div class="inp-select">
                    <div class="form-group-sm">
                        <input id="price" required type="text" name="price" value="{{ old('price') }}"/>
                    </div>
                    <div class="select_currency">
                        <select name="currency" id="currency">
                            <option selected disabled value="azn">Azn</option>
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

            <div class="inp-group">
                <h4 class="inp-group__title">Ölkə</h4>
                <input id="country" required type="text" name="country" value="{{ old('country') }}"/>
            </div>

            @error('country')
                <div class="inp-group">
                    <div class="alert alert-warning">
                        {{ $message }}
                    </div>
                </div>
            @enderror

            <div class="inp-group">
                <h4 class="inp-group__title">Şəhər <span>*</span></h4>
                <input id="address" required type="text" name="city" value="{{ old('city') }}"/>
            </div>

            @error('city')
                <div class="inp-group">
                    <div class="alert alert-warning">
                        {{ $message }}
                    </div>
                </div>
            @enderror
            <div class="inp-group">
                <h4 class="inp-group__title">Adress <span>*</span></h4>
                <input id="address" required type="text" name="adress" value="{{ old('adress') }}"/>
            </div>

            @error('adress')
                <div class="inp-group">
                    <div class="alert alert-warning">
                        {{ $message }}
                    </div>
                </div>
            @enderror

            <div class="inp-group">
                <h4 class="inp-group__title">Telefon <span>*</span></h4>
                <input id="address" required type="tel" name="tel" value="{{ old('tel') }}"/>
            </div>

            @error('tel')
                <div class="inp-group">
                    <div class="alert alert-warning">
                        {{ $message }}
                    </div>
                </div>
            @enderror

            @if(Auth::check())
                <input type="hidden" name="flName" value="{{ auth()->user()->flName }}">
                <input type="hidden" name="email" value="{{ auth()->user()->email }}">
            @else
                <div class="inp-group">
                    <h4 class="inp-group__title">Ad Soyad <span>*</span></h4>
                    <input id="contactName" required type="text" name="name" value="{{ old('name') }}"/>
                </div>

                @error('name')
                    <div class="inp-group">
                        <div class="alert alert-warning">
                            {{ $message }}
                        </div>
                    </div>
                @enderror

                <div class="inp-group">
                    <h4 class="inp-group__title">E-mail <span>*</span>
                    </h4>
                    <input id="contactName" required type="email" name="email" value="{{ old('email') }}"/>
                </div>

                @error('email')
                    <div class="inp-group">
                        <div class="alert alert-warning">
                            {{ $message }}
                        </div>
                    </div>
                @enderror

            @endif
            <div class="inp-group">
                <button type="submit" class="btn btn-center upcase">
                    Əlavə Et
                </button>
            </div>
        </form>
    </div>

@endsection

@section('js')
    <script src="{{ asset('js/dropzone.js') }}"></script>
@endsection

@section('css')
    <link href="{{ asset('css/dropzone.css') }}" rel="stylesheet">
    <link href="{{ asset('css/basic.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@endsection
