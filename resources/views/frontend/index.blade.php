<!DOCTYPE html>
<html lang="az-Az">

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>

    <title>{{ $setting->title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
          content="{{ $setting->desc }}"/>
    <meta name="keywords"
          content="{{ $setting->keyw }}"/>
    <meta http-equiv="Cache-Control" content="no-cache"/>
    <meta http-equiv="Expires" content="Fri, Jan 01 1970 00:00:00 GMT"/>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style

        type="text/css">button, input.submit, #btn_subscribe, .searchPaginationSelected, .tag-link.active, .searchbutton, .flashmessage-warning, .flashmessage-info, .flashmessage-ok, .ui-slider-handle, .qq-upload-button, .edit-link:hover, .del-link:hover, #select-country__wrap .dropdown-wrapper, .btn-blue:hover, .lang-list__ul, .submit-search, .item__cat, .about-item__ico-wrp span, .item-inline__cat, .btn-pink, .item-tab-control a.active, .item-tab-control a:hover, .sort-btn.active {
            background-color: #7C4D9D !important;
        }


        a:hover, .item__favourites, .btn2, .breadcrumb a, .load-img-item span a, .profile-demo a, .options-form a, .modal a, .publish a {
            color: #7C4D9D !important;
        }

        .lang-list__ul, .item-tab-control a.active, .item-tab-control a:hover, .flashmessage-warning, ..edit-link:hover, .del-link:hover, .sort-btn.active {
            border-color: #7C4D9D !important;
        }

        @media only screen and (max-width: 999px) {
            nav ul {
                border-color: #7c4d9d !important;
                background-color: #7C4D9D !important;
            }
        }

        button:hover, input.submit:hover, .submit-search:hover, .qq-upload-button:hover, .ui-slider-handle:hover, #btn_subscribe:hover, .searchbutton:hover, nav ul a:hover, .btn-blue, .lang-list__ul a:hover, .item__cat:hover, .about-item__ico-wrp:hover span, .item-inline__cat:hover, .btn-pink:hover {
            background-color: #7C4D9D !important;
        }

        .btn-publish {
            background-color: #7C4D9D !important;
        }

        .btn-publish:hover {
            background-color: #34D523 !important;
        }</style>
    <link rel="stylesheet" href="{{ asset('frontend/themes/violet/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/themes/violet/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/themes/violet/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/themes/violet/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/themes/violet/css/photoswipe.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/themes/violet/css/main.css') }}">


    <meta name="generator" content="Osclass 3.8.0"/>
    <link rel="canonical" href="index.html"/>
    <style type="text/css">#colorized, .colorized {
            background: #ff8040 !important;
        }</style>
    <style
        type="text/css">button, input.submit, #btn_subscribe, .searchPaginationSelected, .tag-link.active, .searchbutton, .flashmessage-warning, .flashmessage-info, .flashmessage-ok, .ui-slider-handle, .qq-upload-button, .edit-link:hover, .del-link:hover, #select-country__wrap .dropdown-wrapper, .btn-blue:hover, .lang-list__ul, .submit-search, .item__cat, .about-item__ico-wrp span, .item-inline__cat, .btn-pink, .item-tab-control a.active, .item-tab-control a:hover, .sort-btn.active {
            background-color: #7C4D9D !important;
        }

        a:hover, .item__favourites, .btn2, .breadcrumb a, .load-img-item span a, .profile-demo a, .options-form a, .modal a, .publish a {
            color: #7C4D9D !important;
        }

        .lang-list__ul, .item-tab-control a.active, .item-tab-control a:hover, .flashmessage-warning, ..edit-link:hover, .del-link:hover, .sort-btn.active {
            border-color: #7C4D9D !important;
        }

        @media only screen and (max-width: 999px) {
            nav ul {
                border-color: #7c4d9d !important;
                background-color: #7C4D9D !important;
            }
        }

        button:hover, input.submit:hover, .submit-search:hover, .qq-upload-button:hover, .ui-slider-handle:hover, #btn_subscribe:hover, .searchbutton:hover, nav ul a:hover, .btn-blue, .lang-list__ul a:hover, .item__cat:hover, .about-item__ico-wrp:hover span, .item-inline__cat:hover, .btn-pink:hover {
            background-color: #7C4D9D !important;
        }

        .btn-publish {
            background-color: #7C4D9D !important;
        }

        .btn-publish:hover {
            background-color: #34D523 !important;
        }</style>
    <link href="{{ asset('frontend/plugins/uMessages/assets/css/materialdesignicons.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('frontend/plugins/uMessages/assets/css/widgets.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('frontend/plugins/hfield/css/style.css') }}" rel="stylesheet" type="text/css"/>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style rel="stylesheet">

        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu>.dropdown-menu {
            top: 0;
            left: 100%;
            margin-top: -6px;
            margin-left: -1px;
            -webkit-border-radius: 0 6px 6px 6px;
            -moz-border-radius: 0 6px 6px;
            border-radius: 0 6px 6px 6px;
        }

        .dropdown-submenu:hover>.dropdown-menu {
            display: block;
        }

        .dropdown-submenu>a:after {
            display: block;
            content: " ";
            float: right;
            width: 0;
            height: 0;
            border-color: transparent;
            border-style: solid;
            border-width: 5px 0 5px 5px;
            border-left-color: #ccc;
            margin-top: 5px;
            margin-right: -10px;
        }

        .dropdown-submenu:hover>a:after {
            border-left-color: #fff;
        }

        .dropdown-submenu.pull-left {
            float: none;
        }

        .dropdown-submenu.pull-left>.dropdown-menu {
            left: -100%;
            margin-left: 10px;
            -webkit-border-radius: 6px 0 6px 6px;
            -moz-border-radius: 6px 0 6px 6px;
            border-radius: 6px 0 6px 6px;
        }
    </style>
    <link href="{{ asset('frontend/plugins/rupayments/css/ultimate.css') }}" rel="stylesheet" type="text/css"/>
    <script src="{{ asset('frontend/themes/violet/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/rupayments/js/ultimate.js') }}"></script>
    <script src="https://kit.fontawesome.com/fea2465f5c.js" crossorigin="anonymous"></script>
    <script src="{{ asset('frontend/plugins/watchlist/js/watchlist.js') }}"></script>
    <script src="{{ asset('frontend/themes/violet/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('frontend/themes/violet/js/select2.min.js') }}"></script>
    <script src="{{ asset('frontend/themes/violet/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/themes/violet/js/main.js') }}"></script>
    <script src="{{ asset('frontend/themes/violet/js/date.js') }}"></script>
    <script src="{{ asset('frontend/themes/violet/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/uMessages/assets/js/widgets.js') }}"></script>
    <!-- Watchlist js -->
    <script>
        var watchlist_url = "indexa850.html?page=ajax&amp;action=custom&amp;ajaxfile=watchlist/ajax_watchlist.php";</script>
    <!-- Watchlist js end -->
    <script>

        $.datepicker.regional['custom'] = { // Default regional settings
            closeText: 'Готово', // Display text for close link
            prevText: 'Назад', // Display text for previous month link
            nextText: 'Далее', // Display text for next month link
            currentText: 'Сегодня', // Display text for current month link
            monthNames: ['января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря'], // Names of months for drop-down and formatting
            monthNamesShort: ['Янв', 'Фев', 'Мар', 'Апр', 'мая', 'Июн', 'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек'], // For formatting
            dayNames: ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятницы', 'Суббота'], // For formatting
            dayNamesShort: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'], // For formatting
            dayNamesMin: ['Вс.', 'Вт.', 'Чт.', 'Вт.', 'Чт.', 'Ср.', 'Сб'], // Column headings for days starting at Sunday
            weekHeader: 'Нед.', // Column header for week of the year
            dateFormat: 'dd/mm/yy', // See format options on parseDate
            firstDay: 0, // The first day of the week, Sun = 0, Mon = 1, ...
            isRTL: false, // True if right-to-left language, false if left-to-right
            showMonthAfterYear: false, // True if the year select precedes month, false for month then year
            yearSuffix: '' // Additional text to append to the year in the month headers
        };
    </script>
    <meta name="robots" content="index, follow"/>
    <meta name="googlebot" content="index, follow"/>
</head>
<body>
<!-- container -->
<section class="wrapper">
    <div class="wrapper-in">
        <header class="header-page header-page--paralax-bg"
                style="background:url({{ asset('frontend/themes/violet/img/main/business1.jpeg') }}) ; center top;">
            <div class="top-bar" style="background-color: white;">
                <div class="container">
                    <div class="top-bar__logo-wrp">
                        <a href="{{ url('/') }}">
                            <img border="0" alt="Доска объявлений Delovoy" src="frontend/themes/violet/img/logo2.jpeg"/>
                        </a>
                    </div>
                    <!-- Menu -->
                    <nav>
                        <ul class="upcase">
                            <li style="color:!important;"><a href="{{ url('/') }}"><strong>Ana Səhifə</strong></a></li>
                            <li style="color:!important;"><a href="{{ url('/elanlar') }}"><strong>Bütün Elanlar</strong></a></li>
                            @if(auth()->check())
                                <li style="color:!important;"><a href="{{ url('/user/'.auth()->user()->id) }}"><strong>Profilim</strong></a></li>
                            @endif
                            <li style="color:!important;"><a href="{{ url('contact') }}"><strong>Əlaqə</strong></a></li>

                            @if(auth()->check() == false)
                                <li style="color:!important;"><a href="{{ url('login') }}" data-fancybox="modal2"
                                                                 data-src="#insign"><strong>Giriş</strong></a></li>
                                <li style="color:!important;"><a href="{{ url('register') }}"><strong>Qeydiyyat</strong></a>
                                </li>
                            @endif
                        </ul>
                        <div class="mobile-menu-trigger">
                            <i></i>
                            <i></i>
                            <i></i>
                        </div>
                        <form class="nocsrf short-search-form" action="{{ url('axtar') }}" method="post">
                            @csrf
                            <input type="text" name="title" placeholder="Axtar" class="input-search"
                                   id="search-example">
                            <input type="submit" value="" class="submit-search">
                        </form>
                    </nav>
                    <div class="top-bar__action">
                        <a href="index.html" class="short-search-trigger"><i class="search-ico"></i></a>

                        <a href="{{ route('elanlar.create') }}" class="btn-publish upcase"><strong>Elan Yerləşdir</strong></a>
                    </div>
                </div>
            </div>
            <!--/.  Menu -->
            <div class="header__ins">
                <div class="container">
                    <form action="{{ url('axtar') }}" method="post">
                        @csrf
                        <div class="input-row">
                            <div class="input-3-col middlesearch" id="cat">
                                <select required title="Kateqoriya seç" oninvalid="this.setCustomValidity('Kateqoriya seçin')" name="category" onchange="this.setCustomValidity('')" id="category" class="form-select-2"
                                        data-placeholder="Kateqoriya Seçin...">
                                    <option value="" disabled selected>Kateqoriya Seçin...</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->{ app()->getLocale().'_name'} }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-3-col middlesearch dislast">
                                <div class="form-search-action">
                                    <input type="text" name="city" placeholder="Şəhər" class="input-search">
                                </div>
                            </div>
                            <div class="input-3-col middlesearch dislast">
                                <div class="form-search-action">
                                    <input type="text" name="title" placeholder="Elan Axtar" class="input-search">
                                    <input type="submit" value="" class="submit-search">
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="category-inline">
                        @foreach($categories as $category)
                            <a href="{{ $category->path() }}" class="category-inline-item">
                                <span class="category-inline-item__ico-wrp">
                                    <img src="{{ url('storage/'.$category->icon) }}" alt="{{ $category->az_name }}">
                                </span>
                                <span class="category-inline-item__title">{{ $category->az_name }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </header>
        <div class="forcemessages-inline">
        </div>

        <section class="carousel-section">
            <div class="container">
                <div class="carousel-section__ins">
                    <h2 class="h2-bottom-line">VİP Elanlar</h2>
                    <p class="sub-h2-text">Ən Çox Baxılan Təkliflər.</p>
                    <div class="carousel-wrp">
                        <div class="carousel owl-carousel">
                            @foreach($vipelanlar as $vipelan)
                                <div class="item">
                                <a href="{{ $vipelan->path() }}"
                                   class="item__photo"
                                   style="background-image: url({{ url('storage/'.$vipelan->photo) }})">
                                    <span class="item__favourites"><i class="mdi mdi-star-outline"></i></span>
                                </a>
                                <div class="item__ins" id="colorized">
                                    <div class="item__middle-desc">
                                        <a href="{{ $vipelan->cat->path() }}"
                                           class="item__cat">
                                            <img src="{{ url('storage/'.$vipelan->cat->icon) }}">
                                        </a>
                                        <span class="item__date">июля 4, 2019</span>
                                        <a href="{{ $vipelan->path() }}"
                                           class="item__title">{{ strlen($vipelan->title) > 20 ? mb_substr($vipelan->title,0,20)."..." : $vipelan->title}}</a>
                                        <div class="item__text">
                                            <div>
                                                {{ strlen($vipelan->info) > 68 ? mb_substr($vipelan->info,0,68)."..." : $vipelan->info}}
                                            </div>
                                        </div>
                                        <strong class="item__price">{{ $vipelan->price }} AZN</strong>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="board-list">
            <div class="container">
                <h2 class="h2-bottom-line">Son Elanlar</h2>
                <div class="list-item">
                    <div class="list-item__table active">
                        <div class="list ">

                            @foreach($sonelanlar as $sonelan)
                                <div class="item-wrp">
                                    <div class="item">
                                        <a href="{{ $sonelan->path() }}"
                                           class="item__photo"
                                           style="background-image: url({{ url('storage/'.$sonelan->photo) }})">
                                        </a>
                                        <div class="item__ins" id="normal">
                                            <div class="item__middle-desc">
                                                <a href="{{ $sonelan->cat->path() }}"
                                                   class="item__cat">
                                                    <img src="{{ url('storage/'.$sonelan->cat->icon) }}">
                                                </a>
                                                <span class="item__date">июля 12, 2019</span>
                                                <a href="{{ $sonelan->path() }}"
                                                   class="item__title">{{ strlen($sonelan->title)>18 ? mb_substr($sonelan->title,0,18).'...' : $sonelan->title }}</a>
                                                <div class="item__text">
                                                    <div>{{ strlen($sonelan->info)>68 ? mb_substr($sonelan->info,0,68).'...' : $sonelan->info }}
                                                    </div>
                                                </div>
                                                <strong class="item__price">{{ $sonelan->price }} azn</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="board-list">
            <div class="container">
                <h2 class="h2-bottom-line">Populyar Elanlar</h2>
                <div class="list-item">
                    <div class="list-item__table active">
                        <div class="list ">

                            @foreach($populyarelanlar as $populyarelan)
                                <div class="item-wrp">
                                    <div class="item">
                                        <a href="{{ $populyarelan->path() }}"
                                           class="item__photo"
                                           style="background-image: url({{ url('storage/'.$populyarelan->photo) }})">
                                        </a>
                                        <div class="item__ins" id="normal">
                                            <div class="item__middle-desc">
                                                <a href="{{ $populyarelan->cat->path() }}"
                                                   class="item__cat">
                                                    <img src="{{ url('storage/'.$populyarelan->cat->icon) }}">
                                                </a>
                                                <span class="item__date">июля 12, 2019</span>
                                                <a href="{{ $populyarelan->path() }}"
                                                   class="item__title">{{ strlen($populyarelan->title)>18 ? mb_substr($populyarelan->title,0,18).'...' : $populyarelan->title }}</a>
                                                <div class="item__text">
                                                    <div>{{ strlen($populyarelan->info)>68 ? mb_substr($populyarelan->info,0,68).'...' : $populyarelan->info }}
                                                    </div>
                                                </div>
                                                <strong class="item__price">{{ $populyarelan->price }} azn</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <a href="{{ url('elanlar') }}" class="btn-pink btn-all-items upcase"><strong>Bütün Elanlar</strong></a>
    <div class="clearfix"></div>
</section>
    <footer class="footer-page">
        <div class="footer-widgets">
            <div class="container">
                <div class="footer-widgets__ins">
                    <article class="footer-widget">
                        <h4>HAQQINDA</h4>
                        <p>
                            <!--<a title="Каталог компаний" href="biznes/kompanii/index.html" target="_blank">Каталог
                                компаний</a>-->
                        </p>
                    </article>
                    <article class="footer-widget">
                        <h4>ƏMƏKDAŞLIQ</h4>
                    </article>
                    <article class="footer-widget">
                        <h4>ƏLAVƏLƏR</h4>
                    </article>
                </div>
            </div>
        </div>
        <div class="footer-main">
            <div class="container">
                <div class="footer-main__logo">
                    <a href="{{ url('') }}"><img border="0" alt="Доска объявлений Delovoy"
                                              src="frontend/themes/violet/img/logo.jpeg"/></a>
                </div>

                <div class="footer__contacts">
                        <span><i class="place-white"></i>{{ $setting->location }}</span>
                    <span class="phone-inline"><i class="phone-ico"></i>{{ $setting->tel }}</span>
                    <a href="mailto:{{ $setting->email }}" class="mail-link"><i class="mail-ico"></i>{{ $setting->email }}</a>
                    <ul class="social-list">
                        <li><a href="{{ explode('|||',$setting->social)[0] }}" target="_blank" class="fc-link"></a></li>
                        <li style="padding-top: 5px;"><a href="{{ explode('|||',$setting->social)[1] }}" target="_blank"><i style="padding-bottom: 5px;" class="fab fa-instagram"></i> </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script>


        {{--$(document).ready(function(){--}}
        {{--    $.ajaxSetup({--}}
        {{--        headers: {--}}
        {{--            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
        {{--        }--}}
        {{--    });--}}
        {{--    $('#category').on('change',function(){--}}
        {{--        let id = $(this).val();--}}
        {{--        $.ajax({--}}
        {{--            method: 'post',--}}
        {{--            url: "{{ url('subcat') }}",--}}
        {{--            data: {'id': id},--}}
        {{--            dataType: 'json',--}}
        {{--            success: function(data) {--}}
        {{--                if(data.length > 0) {--}}
        {{--                    $('#cat').after('<div class="input-3-col middlesearch" id="data"><select name="elvir" class="form-select-2"></select></div>')--}}
        {{--                    for(var i = 0; i<data.length; i++) {--}}
        {{--                        $('#data select').append('<option>'+data[i]['az_name']+'</option>');--}}
        {{--                    }--}}
        {{--                }--}}
        {{--            }--}}
        {{--        });--}}
        {{--    })--}}
        {{--});--}}

    </script>
</body>
</html>
