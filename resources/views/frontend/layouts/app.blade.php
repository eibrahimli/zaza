<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<!-- Mirrored from delovoy.net/user/register by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 14 Jul 2019 09:01:16 GMT -->
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache" />
    <meta http-equiv="Expires" content="Fri, Jan 01 1970 00:00:00 GMT" />
    <style type="text/css">
        button,input.submit,#btn_subscribe,.searchPaginationSelected,.tag-link.active,.searchbutton,.flashmessage-warning,.flashmessage-info, .flashmessage-ok,.ui-slider-handle,.qq-upload-button,.edit-link:hover,.del-link:hover,#select-country__wrap .dropdown-wrapper,.btn-blue:hover,.lang-list__ul,.submit-search,.item__cat,.about-item__ico-wrp span,.item-inline__cat,.btn-pink,.item-tab-control a.active,.item-tab-control a:hover,.sort-btn.active {background-color:#7C4D9D!important;}a:hover,.item__favourites,.btn2,.breadcrumb a,.load-img-item span a,.profile-demo a,.options-form a,.modal a,.publish a{color:#7C4D9D!important;}.lang-list__ul,.item-tab-control a.active,.item-tab-control a:hover,.flashmessage-warning,..edit-link:hover,.del-link:hover,.sort-btn.active {border-color:#7C4D9D!important;}@media only screen and (max-width: 999px) {nav ul {border-color:#7c4d9d!important;background-color:#7C4D9D!important;}}button:hover,input.submit:hover,.submit-search:hover,.qq-upload-button:hover,.ui-slider-handle:hover,#btn_subscribe:hover,.searchbutton:hover ,nav ul a:hover,.btn-blue,.lang-list__ul a:hover,.item__cat:hover,.about-item__ico-wrp:hover span,.item-inline__cat:hover,.btn-pink:hover{background-color: #7C4D9D!important;}.btn-publish{background-color: #7C4D9D!important;}.btn-publish:hover{background-color: #34D523!important;}
    </style>
    <link rel="stylesheet" href="{{ asset('frontend/themes/violet/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/themes/violet/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/themes/violet/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/themes/violet/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/themes/violet/css/photoswipe.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/themes/violet/css/main.css') }}">




    <meta name="generator" content="Osclass 3.8.0" />
    <link rel="canonical" href="{{ url('register') }}"/>
    <style type="text/css">#colorized,.colorized{background:#ff8040!important;}</style>
    <style type="text/css">button,input.submit,#btn_subscribe,.searchPaginationSelected,.tag-link.active,.searchbutton,.flashmessage-warning,.flashmessage-info, .flashmessage-ok,.ui-slider-handle,.qq-upload-button,.edit-link:hover,.del-link:hover,#select-country__wrap .dropdown-wrapper,.btn-blue:hover,.lang-list__ul,.submit-search,.item__cat,.about-item__ico-wrp span,.item-inline__cat,.btn-pink,.item-tab-control a.active,.item-tab-control a:hover,.sort-btn.active {background-color:#7C4D9D!important;}a:hover,.item__favourites,.btn2,.breadcrumb a,.load-img-item span a,.profile-demo a,.options-form a,.modal a,.publish a{color:#7C4D9D!important;}.lang-list__ul,.item-tab-control a.active,.item-tab-control a:hover,.flashmessage-warning,..edit-link:hover,.del-link:hover,.sort-btn.active {border-color:#7C4D9D!important;}@media only screen and (max-width: 999px) {nav ul {border-color:#7c4d9d!important;background-color:#7C4D9D!important;}}button:hover,input.submit:hover,.submit-search:hover,.qq-upload-button:hover,.ui-slider-handle:hover,#btn_subscribe:hover,.searchbutton:hover ,nav ul a:hover,.btn-blue,.lang-list__ul a:hover,.item__cat:hover,.about-item__ico-wrp:hover span,.item-inline__cat:hover,.btn-pink:hover{background-color: #7C4D9D!important;}.btn-publish{background-color: #7C4D9D!important;}.btn-publish:hover{background-color: #34D523!important;}</style><link href="../oc-content/plugins/uMessages/assets/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/plugins/uMessages/assets/css/widgets.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/plugins/hfield/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/plugins/rupayments/css/ultimate.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('frontend/themes/violet/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/rupayments/js/ultimate.js') }}"></script>
    <script src="https://kit.fontawesome.com/fea2465f5c.js" crossorigin="anonymous"></script>
    <script src="{{ asset('frontend/plugins/watchlist/js/watchlist.js') }}"></script>
    <script src="{{ asset('frontend/themes/violet/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('frontend/themes/violet/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/themes/violet/js/main.js') }}"></script>
    <script src="{{ asset('frontend/themes/violet/js/select2.min.js') }}"></script>
    <script src="{{ asset('frontend/themes/violet/js/date.js') }}"></script>
    <script src="{{ asset('frontend/themes/violet/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/uMessages/assets/js/widgets.js') }}"></script>

    <script>

        $.datepicker.regional['custom'] = { // Default regional settings
            closeText: 'Готово', // Display text for close link
            prevText: 'Назад', // Display text for previous month link
            nextText: 'Далее', // Display text for next month link
            currentText: 'Сегодня', // Display text for current month link
            monthNames: ['января','февраля','марта','апреля','мая','июня','июля','августа','сентября','октября','ноября','декабря'], // Names of months for drop-down and formatting
            monthNamesShort: ['Янв', 'Фев', 'Мар', 'Апр', 'мая', 'Июн', 'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек'], // For formatting
            dayNames: ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятницы', 'Суббота'], // For formatting
            dayNamesShort: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'], // For formatting
            dayNamesMin: ['Вс.','Вт.','Чт.','Вт.','Чт.','Ср.','Сб'], // Column headings for days starting at Sunday
            weekHeader: 'Нед.', // Column header for week of the year
            dateFormat: 'dd/mm/yy', // See format options on parseDate
            firstDay: 0, // The first day of the week, Sun = 0, Mon = 1, ...
            isRTL: false, // True if right-to-left language, false if left-to-right
            showMonthAfterYear: false, // True if the year select precedes month, false for month then year
            yearSuffix: '' // Additional text to append to the year in the month headers
        };
    </script>
    <meta name="robots" content="noindex, nofollow" />
    <meta name="googlebot" content="noindex, nofollow" />
</head>
<body>
<script>
    $(document).ready(function(){
        // Code for form validation
        $("form[name=register]").validate({
            rules: {
                s_name: {
                    required: true
                },
                s_email: {
                    required: true,
                    email: true
                },
                s_password: {
                    required: true,
                    minlength: 5
                },
                s_password2: {
                    required: true,
                    minlength: 5,
                    equalTo: "#s_password"
                }
            },
            messages: {
                s_name: {
                    required: "Başlıq: bu sahə boş ola bilməz."
                },
                s_email: {
                    required: "E-mail: bu sahə boş ola bilməz.",
                    email: "Yanlış e-mail adresi."
                },
                s_password: {
                    required: "Şifrə: bu sahə boş ola bilməz.",
                    minlength: "Şifrə: şifrə 5 simvoldan az ola bilməz."
                },
                s_password2: {
                    required: "Şifrəni təkrar daxil et: bu sahə boş ola bilməz.",
                    minlength: "Şifrə  təkrar daxil et: şifrə 5 simvoldan az ola bilməz.",
                    equalTo: "Şifrələr uyğun deyil."
                }
            },
            errorLabelContainer: "#error_list",
            wrapper: "li",
            invalidHandler: function(form, validator) {
                $('html,body').animate({ scrollTop: $('h1').offset().top }, { duration: 250, easing: 'swing'});
            },
            submitHandler: function(form){
                $('button[type=submit], input[type=submit]').attr('disabled', 'disabled');
                form.submit();
            }
        });
    });
</script>
<!-- container -->
<div class="wrapper">
    <div class="wrapper-in">
        <header class="header-page header-page--ins">
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
                            <li style="color:!important;"><a href="{{ url('contact') }}"><strong>Əlaqə</strong></a></li>

                            <li style="color:!important;"><a href="{{ url('login') }}" data-fancybox="modal2"
                                                             data-src="#insign"><strong>Giriş</strong></a></li>
                            <li style="color:!important;"><a href="{{ url('register') }}"><strong>Qeydiyyat</strong></a>
                            </li>
                        </ul>
                        <div class="mobile-menu-trigger">
                            <i></i>
                            <i></i>
                            <i></i>
                        </div>
                        <form class="nocsrf short-search-form" action="{{ url('/') }}" method="post">
                            @csrf
                            <input type="hidden" name="page" value="search"/>
                            <input type="text" name="text" placeholder="Axtar" class="input-search"
                                   id="search-example">
                            <input type="submit" value="" class="submit-search">
                        </form>
                    </nav>
                    <div class="top-bar__action">
                        <a href="index.html" class="short-search-trigger"><i class="search-ico"></i></a>

                        <a href="item/new.html" class="btn-publish upcase"><strong>Elan Yerləşdir</strong></a>
                    </div>
                </div>
            </div>
            <!--/.  Menu -->
        </header>
        <div class="container">

            <!--<ul class="breadcrumb">
                <li class="first-child" itemscope itemtype="http://data-vocabulary.org/Breadcrumb" ><a href="{{ url('/') }}" itemprop="url"><span itemprop="title">Zaza.az - Elan Saytı</span></a></li>

                <li class="last-child" itemscope itemtype="http://data-vocabulary.org/Breadcrumb" > &raquo; <span itemprop="title">Yeni İstifadəçi Yarat</span></li>
            </ul>
            -->
            <div class="container">
                <div class="forcemessages-inline">
                </div>
                <!-- content -->
                @yield('content')
            </div>
            <!-- content -->
        </div>
    </div>
</div>
    <footer class="footer-page">
    <div class="footer-widgets">
        <div class="container">
            <div class="footer-widgets__ins">
                <article class="footer-widget">
                    <h4>HAQQINDA</h4>
                    <p>
                        <a title="Каталог компаний" href="biznes/kompanii/index.html" target="_blank">Каталог
                            компаний</a>
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
                <a href="index.html"><img border="0" alt="Доска объявлений Delovoy"
                                          src="frontend/themes/violet/img/logo.jpeg"/></a>
            </div>

            <div class="footer__contacts">
                <span><i class="place-white"></i>{{ $setting->location }}</span>
                <span class="phone-inline"><i class="phone-ico"></i>{{ $setting->tel }}</span>
                <a href="mailto:info@delovoy.net" class="mail-link"><i class="mail-ico"></i>{{ $setting->email }}</a>
                <ul class="social-list">
                    <li><a href="{{ explode('|||',$setting->social)[0] }}" target="_blank" class="fc-link"></a></li>
                    <li style="padding-top: 5px;"><a href="{{ explode('|||',$setting->social)[1] }}" target="_blank"><i style="padding-bottom: 5px;" class="fab fa-instagram"></i> </a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
</body>

</html>
