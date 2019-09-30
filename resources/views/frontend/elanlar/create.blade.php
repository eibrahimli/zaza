@extends('frontend.layouts.app')

@section('title',$setting->title.' | Yeni elan əlavə et')

@section('content')

    <div class="publish">
        <h2 class="h2-bottom-line">Опубликовать объявление</h2>
        <form name="item" action="https://delovoy.net/index.php" class="form-publish" method="post" enctype="multipart/form-data">
            @csrf
            <div class="inp-group">
                <h4 class="inp-group__title">Kateqoriya <span>*</span></h4>
                <div class="input-row catpub">
                    <input id="category" type="hidden" name="category" value=""/>
                    <div id="select_holder"></div>
                </div>
            </div>
            <div class="inp-group">
                <h4 class="inp-group__title">Başlıq <span>*</span></h4>
                <div class="inp-counter titledis">
                    <input id="title" type="text" name="title" value=""/> <span
                        class="inp-counter__count" data-val="70">70</span>
                </div>
            </div>
            <div class="inp-group">
                <h4 class="inp-group__title">Məlumat <span>*</span></h4>
                <div class="inp-counter titledis">
                    <textarea id="info" name="info" rows="10"></textarea> <span
                        class="inp-counter__count bottom-count" data-val="5000">5000</span>
                </div>
            </div>
            <!--  -->
            <div class="inp-group">
                <h4 class="inp-group__title">Qimyət <span>*</span></h4>
                <div class="inp-select">
                    <div class="form-group-sm">
                        <input id="price" type="text" name="price" value=""/>
                    </div>
                    <div class="select_currency">
                        <select name="currency" id="currency">
                            <option disabled value="azn">Azn</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="inp-group">
                <h4 class="inp-group__title">Ölkə</h4>
                <select name="countryId" id="countryId">
                    <option value="azərbaycan">Azərbaycan</option>
                    <option value="turkiye">Türkiyə</option>
                    <option value="rusiya">Rusya</option>
                    <option value="ukrayna">Ukrayna</option>
                </select></div>
            <div class="inp-group">
                <div class="input-row">
                    <div class="input-col">
                        <h4 class="inp-group__title">Şəhər</h4>
                        <div class="form-group-sm">
                            <input id="price" type="text" name="city" value=""/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="inp-group">
                <h4 class="inp-group__title">Adress <span>*</span></h4>
                <input id="address" type="text" name="adress" value=""/>
            </div>
            <div class="inp-group">
                <h4 class="inp-group__title">Telefon <span>*</span></h4>
                <input id="address" type="text" name="tel" value=""/>
            </div>
            <div class="inp-group">
                <h4 class="inp-group__title">Ad Soyad <span>*</span></h4>
                <input id="contactName" type="text" name="contactName" value=""/>
            </div>


            <div class="inp-group">
                <h4 class="inp-group__title">E-mail <span>*</span>
                </h4>
                    <input id="contactName" type="text" name="email" value=""/>
            </div>

            <div class="inp-group">
                <button type="submit" class="btn btn-center upcase">
                    Əlavə Et
                </button>
            </div>
        </form>
    </div>

@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('frontend/themes/violet/js/fineuploader/jquery.fineuploader.min.js') }}"></script>
@endsection
