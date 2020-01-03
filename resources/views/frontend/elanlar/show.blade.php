@extends('frontend.layouts.app')

@section("title", $setting->title." | ".$elan->title.' başlıqlı elan')

@section('content')
    @section('breadcrumbli')

        <li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"> » <a href="{{ $elan->cat->path() }}" itemprop="url"><span itemprop="title">{{ $elan->cat->az_name }}</span></a></li>            

        <li class="last-child" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"> » <span itemprop="title">{{ $elan->title }} elanı</span></li>

    @endsection
    <div class="forcemessages-inline"></div>
    <div class="col-wrp">
        <div class="col-main">
            <div class="swiper-container gallery-top">
                <div class="swiper-wrapper picture" itemscope itemtype="http://schema.org/ImageGallery">
                    @foreach($elan->eg()->get() as $gallery)
                        <figure class="swipdis swiper-slide" itemprop="associatedMedia" itemscope
                                itemtype="http://schema.org/ImageObject">
                            <a href="{{ url('storage/'.$gallery->photo) }}" class="imgswipurl" itemprop="contentUrl"
                               data-size="640x480" data-index="1">
                                <img src="{{ url('storage/'.$gallery->photo) }}" class="imgswipdis"
                                     alt="дымососы двухстороннего всасывания ДНх2" itemprop="thumbnail">
                            </a>
                        </figure>
                    @endforeach
                </div>
                <div class="swiper-button-next swiper-button-dis"></div>
                <div class="swiper-button-prev swiper-button-dis"></div>
            </div>
            <div class="swiper-container gallery-thumbs">
                <div class="swiper-wrapper">
                    @foreach($elan->eg()->get() as $gallery)
                        <div class="swiper-slide slide_no" style="background-image:url({{ asset('storage/'.$gallery->photo) }})"></div>
                    @endforeach
                </div>
            </div>

            <div class="item-tab-control">
                <a href="#" data-tab="1" class="active">Məlumat</a>
                <a href="#" data-tab="2">Rəylər</a>
            </div>

            <div class="item-tabs">
                <div class="tab active" data-tab="1">
                    <div class="text">
                        <h3>{{ $elan->title }}</h3>
                        {{ $elan->info }}
                    </div>
                </div>
            </div>

        </div>
        <aside class="col-right">
            <div class="item-info">
                <a href="{{ $elan->cat->path() }}" class="item__cat">
                    <img src="{{ asset('storage/'.$elan->cat->icon) }}">
                </a>
                <span class="item-ins-name">{{ $elan->title }}</span>
                <span class="item-ins__date"><i class="calendar-ico"></i>мая 24, 2019</span>
                <span class="item-ins__view"><i class="view-ico"></i>{{ $elan->seen }}</span>
                <strong class="item-ins__price">{{ $elan->price }} azn</strong>
                <div id="nicedis"></div>
                <script>
                    $("#nicedis").jsSocials({
                        showLabel: false,
                        showCount: false,
                        shares: [{
                            share: "facebook",
                            logo: "shared-fc"
                        }, {
                            share: "twitter",
                            logo: "shared-tw"
                        },
                            {
                                share: "googleplus",
                                logo: "shared-g"
                            },
                            {
                                share: "linkedin",
                                logo: "shared-in"
                            }]
                    });
                </script>
            </div>

        </aside>
    </div>
    <section class="carousel-section">
        <div class="container">
            <div class="carousel-section__ins">
                <h2 class="h2-bottom-line">Tövsiyyə Elanlar</h2>
                <p class="sub-h2-text">Aşağıda tövsiyyə olunan elanlar qeyd edilmiştir.</p>
                <div class="carousel-wrp">
                    <div class="carousel owl-carousel">
                        @foreach($tovsiyyeElanlar as $tovsiyye)
                            <div class="item" id="">
                                <a href="{{ $tovsiyye->path() }}"
                                   class="item__photo"
                                   style="background-image: url({{ asset('storage/'.$tovsiyye->photo) }})">
                                </a>
                                <div class="item__ins">
                                    <div class="item__middle-desc">
                                        <a href="{{ $tovsiyye->cat->path() }}"
                                           class="item__cat">
                                            <img src="{{ asset('storage/'.$tovsiyye->cat->icon) }}">
                                        </a>
                                        <span class="item__date">июля 14, 2019</span>
                                        <a href="{{ $tovsiyye->path() }}"
                                           class="item__title">{{ strlen($tovsiyye->title)>18 ? mb_substr($tovsiyye->title,0,18).'...' : $tovsiyye->title }}</a>
                                        <div class="item__text">
                                            <div>{{ strlen($tovsiyye->info)>50 ? mb_substr($tovsiyye->info,0,50).'...' : $tovsiyye->info }}
                                            </div>
                                        </div>
                                        <strong class="item__price">{{ $tovsiyye->price }} azn</strong>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('something')
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">

            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <div class="pswp__ui pswp__ui--hidden">

                <div class="pswp__top-bar">

                    <div class="pswp__counter"></div>

                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                    <button class="pswp__button pswp__button--share" title="Share"></button>
                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>

                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                </button>

                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                </button>

                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>
        </div>
    </div>
    <script text="text/javascript">
        $(document).ready(function () {
            var galleryTop = new Swiper('.gallery-top', {
                spaceBetween: 10,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
            $(".gallery-thumbs .swiper-wrapper div:first-child").addClass("active");
            var galleryThumbs = new Swiper('.gallery-thumbs', {
                spaceBetween: 10,
                centeredSlides: false,
                slidesPerView: 5,
                touchRatio: 0.2,
                slideToClickedSlide: true,
            });
            $('.slide_no').each(function (i) {
                $(this).click(function (e) {
                    e.preventDefault();
                    var thumb = i;
                    galleryTop.slideTo(thumb, 1000, false);
                    $('.slide_no').removeClass('active');
                    $(this).addClass('active');

                });
            });
            galleryTop.controller.control = galleryThumbs;
            galleryThumbs.controller.control = galleryTop;

        });

    </script>
    <script text="text/javascript">
        (function ($) {
            var $pswp = $('.pswp')[0];
            var image = [];

            $('.picture').each(function () {
                var $pic = $(this),
                    getItems = function () {
                        var items = [];
                        $pic.find('a').each(function () {
                            var $href = $(this).attr('href'),
                                $size = $(this).data('size').split('x'),
                                $width = $size[0],
                                $height = $size[1];

                            var item = {
                                src: $href,
                                w: $width,
                                h: $height
                            }

                            items.push(item);
                        });
                        return items;
                    }

                var items = getItems();

                $.each(items, function (index, value) {
                    image[index] = new Image();
                    image[index].src = value['src'];
                });

                $pic.on('click', 'figure', function (event) {
                    event.preventDefault();

                    var $index = $(this).index();
                    var options = {
                        index: $index,
                        bgOpacity: 0.7,
                        showHideOpacity: true
                    }

                    var lightBox = new PhotoSwipe($pswp, PhotoSwipeUI_Default, items, options);
                    lightBox.listen('gettingData', function (index, item) {

                        var img = new Image();
                        img.onload = function () {
                            item.w = this.width;
                            item.h = this.height;
                            lightBox.updateSize(true);
                        };
                        img.src = item.src;

                    });
                    lightBox.init();
                });
            });
        })(jQuery);
    </script>
@endsection


@section('js')
    <script src="{{ asset('frontend/themes/violet/js/swiper.min.js') }}"></script>
    <script src="{{ asset('frontend/themes/violet/js/photoswipe.min.js') }}"></script>
    <script src="{{ asset('frontend/themes/violet/js/photoswipe-ui-default.min.js') }}"></script>
    <script src="{{ asset('frontend/themes/violet/js/jssocials.min.js') }}"></script>
@endsection

@section('css')
    <style type="text/css">#colorized, .colorized {
            background: #ff8040 !important;
        }</style>
    <style type="text/css">button, input.submit, #btn_subscribe, .searchPaginationSelected, .tag-link.active, .searchbutton, .flashmessage-warning, .flashmessage-info, .flashmessage-ok, .ui-slider-handle, .qq-upload-button, .edit-link:hover, .del-link:hover, #select-country__wrap .dropdown-wrapper, .btn-blue:hover, .lang-list__ul, .submit-search, .item__cat, .about-item__ico-wrp span, .item-inline__cat, .btn-pink, .item-tab-control a.active, .item-tab-control a:hover, .sort-btn.active {
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
@endsection
