@extends('frontend.layouts.app')

@section('title',$setting->title.' | '.$cat->az_name.' Kateqoriyasına Aid Elanlar')

@section('content')

    <div class="col-wrp">
        <aside class="col-left">
            <form action="{{ url('kateqoriya/axtar/'.$cat->id) }}" method="post" class="l-search nocsrf" id="searchformblock" role="form">
                @csrf
                <div class="inp-group">
                    <h4 class="inp-group__title">Axtarılacaq Elan</h4>
                    <div class="input-search-wrp">
                        <input type="text" class="input" name="title" id="query" required pattern="[A-Za-z0-9ÜÇŞÖĞİƏüçşıəöğ ]{1,}" title="Başlığı doğru daxil edin" placeholder="Axtardığınız elan başlığını daxil edin.." value="{{ old('name') }}">
                    </div>
                </div>
                <div class="inp-group">
                    <h4 class="inp-group__title">Şəhər</h4>
                    <label>
                        <input type="text" class="input" id="sCity" name="city" placeholder="Şəhəri daxil edin"
                               value="{{ old('city') }}">
                    </label>
                </div>
                <div class="range">
                    <h4 class="inp-group__title">Qiymət</h4>
                    <div class="razd"></div>
                    <div class="slider"></div>
                    <div class="slider-bottom">
                        <input type="text" id="priceMin" class="input input2" name="min" placeholder="Minimum"
                               value="">
                        <input type="text" id="priceMax" class="input input3" name="max"
                               placeholder="Maksimum" value="">
                    </div>

                </div>
                <div class="inp-group">
                </div>
                <button type="submit" class="btn-full-width searchbutton upcase">Axtar</button>
            </form>
        </aside>
        <div class="col-main">
            <div class="sort-wrp">
                <div class="sort-type">
                    <a href="{{ $cat->path() }}" style="text-decoration: none" class="sort-btn all active">Bütün</a>
                    <select name="forma" onchange="location = this.value;">
                        <option {{ $cat->path() == url()->current() ? 'selected' : null }} value="{{ $cat->path() }}">
                            Yenidən köhnəyə
                        </option>
                        <option {{ $cat->path().'/asc' == url()->current() ? 'selected' : null }} value="{{ $cat->path().'/asc' }}">Köhnədən yeniyə
                        </option>
                    </select>
                </div>


                <div class="sort-view">
                    <div class="change-view">
                        <a href="javascript:void()" class="change-view__table active"></a>
                    </div>
                </div>


            </div>

            <div class="board-list board-list--ins">
                <div class="list-item">
                    <div class="list-item__table">
                        <div class="list">
                            @foreach($elanlar as $elan)
                                <div class="item-wrp">
                                    <div class="item">
                                        <a href="{{ $elan->path() }}"
                                           class="item__photo"
                                           style="background-image: url({{ asset('storage/'.$elan->photo) }})">
                                        </a>
                                        <div class="item__ins" id="normal">
                                            <div class="item__middle-desc">
                                                <a href="{{ $elan->cat->path() }}"
                                                   class="item__cat">
                                                    <img src="{{ asset('storage/'.$elan->cat->icon) }}">
                                                </a>
                                                <span class="item__date">июля 14, 2019</span>
                                                <a style="text-decoration: none" href="{{ $elan->path() }}">
                                                    {{ strlen($elan->title)>18 ? mb_substr(0,18,$elan->title).'...' : $elan->title }}</a>
                                                <div class="item__text">
                                                    <div>{{ strlen($elan->info)>50 ? mb_substr(0,50,$elan->info).'...' : $elan->info }}
                                                    </div>
                                                </div>
                                                <strong class="item__price">{{ $elan->price }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>                     <!--  -->
                </div>
            </div>
            <div class="pagination">
                {{ $elanlar->links('vendor.pagination.custom') }}
            </div>
        </div>
    </div>

@endsection

@section('css')

    <style type="text/css">
        #pagination a {
            text-decoration: none !important;
        }
    </style>
@endsection