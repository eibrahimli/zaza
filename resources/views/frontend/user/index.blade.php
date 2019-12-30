@extends('frontend.layouts.app')

@section('title', $setting->title.' | '.ucfirst(auth()->user()->flName). ' istifadəçinin məlumatları')

@section('content')

    <div class="col-wrp">
        @include('frontend.inc.colleft')
        <div class="col-main">
            <h2 class="page-title">
                Elanlar</h2>
            <section class="board-list board-list--ins">
                <div class="list-item__inline">
                    <div class="list">
                        @if(count($elanlar))
                            @foreach($elanlar as $elan)
                                <div class="item-list-main">
                                    <div class="item-inline">
                                        <a href="{{ $elan->path() }}" class="item-inline__img-wrp" style="background-image: url({{ asset('storage/'.$elan->photo) }}); height: 204px !important;">
                                        </a>

                                        <div class="item-inline__ins">
                                            <div class="item-inline__ins__in discabinet">
                                                <div class="item-inline__desc">
                                                    <a href="{{ $elan->cat->path() }}" class="item-inline__cat">
                                                        <img src="{{ asset('storage/'.$elan->cat->icon) }}">
                                                    </a>
                                                    <a href="{{ $elan->path() }}" class="item-inline__title">
                                                        {{ strlen($elan->title) > 31 ? mb_substr($elan->title,0,28).'...' : $elan->title }}</a>
                                                    <div class="item-inline__text">
                                                        <p>{{ strlen($elan->info) > 153 ? mb_substr($elan->info,0,150).'...' : $elan->info }}</p>
                                                    </div>
                                                    <span class="item-inline__place"><i class="place-ico"></i>{{ $elan->adress }}</span>
                                                </div>
                                                <div class="item-inline__action">
                                                    <strong class="item-inline__price">{{ $elan->price }} azn</strong>
                                                    <span class="item-inline__date"><i class="calendar-ico"></i>октября 11, 2019</span>
                                                    <span class="item-inline__date">
                                                        {{ $elan->status == 1 ? 'Aktiv' : 'Passiv' }}
                                                    </span>                                                                                                											</span>
                                                    <div class="item__link-wrp">
                                                        <a href="{{ url('user/'.auth()->id().'/elanedit/'.$elan->id) }}" class="edit-link"><i class="edit-link-ico"></i>Redaktə Et</a>
                                                        <a onclick="javascript:return confirm('Elanı silməyə əminsiniz?')" href="{{ url('user/'.auth()->id().'/elansil/'.$elan->id) }}" class="del-link">
                                                            <i class="del-link-ico"></i>Sil</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="alert alert-danger" role="alert">
                                Sizə aid bir elan yoxdur...
                            </div>
                        @endif
                    </div>
                </div>
            </section>
            <div class="pagination">
                {{ $elanlar->links('vendor.pagination.custom') }}
            </div>
        </div>
    </div>

@endsection
