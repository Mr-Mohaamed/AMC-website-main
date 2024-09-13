@extends('layouts.FrontLayout')
@section('Front-container')
    <style>
        .who-we-serve {
            font-size: 24px
        }

        @media(max-width:768px) {
            .who-we-serve {
                font-size: 20px
            }
        }

        @media(max-width:570px) {
            .about-image {
                border-radius: 0px !important;
            }
        }
    </style>
    <div class="background-dark-main-color">

        @if ($about_header)
            <section class="testimonials-two pb-0 about-header" {{-- max-height: 100vh;  --}}
                style="
                    overflow:visible;
                    background-image:url({{ asset('Front/media/NewBanners/hero-section-2.png') }});
                    background-position: center bottom;
                    background-repeat: no-repeat;
                    background-size: cover;">
                <div class="container">
                    <div class="section-title color-two text-start wow stickySlideDown" style="margin-top: 5vh">
                        <h1 class=" font-Regular  text-secondry-color "
                            style="visibility: visible; animation-name: pixFadeUp;">
                            {{ config('app.locale') == 'en' ? $about_header->name_en : $about_header->name_ar }}
                        </h1>
                        <span class=" text-start font-Regular text-white"
                            style="visibility: visible; animation-name: pixFadeUp;">
                            {{ config('app.locale') == 'en' ? $about_header->des_en : $about_header->des_ar }}
                        </span>
                    </div>
                    <div class=" row flex-center">
                        <img src="{{ $about_header->img }}" alt="mpckup" class="about-image"
                            style="    border-radius: 40px;z-index: 10;position: relative ; top: 4vh">
                    </div>
                </div>
            </section>
        @endif

        @if ($services->count() > 0)
            <section class="featured  "
                style="overflow: visible;padding-top: 10vh;background-image:url({{ asset('Front/media/NewBanners/services1.png') }});background-position: center bottom;background-repeat: no-repeat;background-size: cover;">
                <div class="container py-5">
                    <h1 class="text-center font-Regular text-secondry-color text-main-color">
                        {{ __('validation.Services.text') }}
                    </h1>
                    <h6 class="text-center font-Regular text-dark my-3 "> {{ __('validation.Services.text2') }}</h6>
                    <div class="swiper-container service-swiper swiper-container-initialized swiper-container-horizontal"
                        id="testimonial-two" data-speed="700" data-autoplay="5000" data-perpage="4" data-space="50"
                        data-breakpoints="{&quot;991&quot;: {&quot;slidesPerView&quot;: 1}}">
                        <div class="swiper-wrapper"
                            style="transform: translate3d(-2950px, 0px, 0px); transition-duration: 0ms;">
                            @foreach ($services as $item)
                                <div class="swiper-slide swiper-slide-duplicate-active" data-swiper-slide-index="0"
                                    style="width: 540px; margin-right: 50px;">
                                    <div class="saaspik-icon-box-wrapper style-one wow stickySlideUp "
                                        data-wow-delay="0.3s">
                                        <div class="saaspik-icon-box-wrapper style-one wow stickySlideUp"
                                            data-wow-delay="0.3s">
                                            <div class="text-center my-1 ">
                                                <img src="{{ $item->img }}" width="30%" alt="">
                                            </div>
                                            <div class="px-3 wow stickySlideUp">
                                                <h2 class=" font-SemiBold text-center text-main-color wow stickySlideUp "
                                                    style="font-size: 17px;">
                                                    {{ config('app.locale') == 'en' ? $item->name_en : $item->name_ar }}
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <span class="swiper-notification wow stickySlideUp" aria-live="assertive" aria-atomic="true"></span>
                    </div>


                    <div class="row flex-center my-2 wow stickySlideUp">
                        <div class="col-8">
                            <h5 class="text-center">
                                {{ __('validation.Services.about') }}
                            </h5>
                        </div>

                    </div>
                </div>
            </section>
        @endif

        @if ($mission)
            <section class="testimonials-two mt-5 "
                style="overflow: visible;background-image:url({{ $mission->img }});background-position: center bottom;background-repeat: no-repeat;background-size: cover;">
                <div class="container">
                    <div class="section-title color-two text-start">
                        <h1 class=" wow slideInLeft font-ExtraBold  text-secondry-color "
                            style="visibility: visible; animation-name: pixFadeUp;">
                            {{ config('app.locale') == 'en' ? $mission->name_en : $mission->name_ar }}
                        </h1>
                        <span class=" wow slideInLeft text-start text-white row col-12 col-lg-6"
                            style="visibility: visible; animation-name: pixFadeUp;">
                            {{ config('app.locale') == 'en' ? $mission->des_en : $mission->des_ar }}
                        </span>
                    </div>
                </div>
            </section>
        @endif
        <section class="testimonials-two pt-5">
            <div class="container">
                <div class="section-title color-two text-center">
                    <h2 class=" wow pixFadeUp font-ExtraBold pb-2 text-white"
                        style="visibility: visible; animation-name: pixFadeUp;">
                        <span class="text-secondry-color">
                            << </span>
                                {{ __('validation.technologies') }}
                                <span class="text-secondry-color">>></span>
                    </h2>
                    <div class="swiper-container service-swiper swiper-container-initialized swiper-container-horizontal"
                        id="testimonial-two" data-speed="700" data-autoplay="5000" data-perpage="4" data-space="50"
                        style="    padding: 0 20px 40px;"
                        data-breakpoints="{&quot;991&quot;: {&quot;slidesPerView&quot;: 1}}">
                        <div class="swiper-wrapper"
                            style="transform: translate3d(-2950px, 0px, 0px); transition-duration: 0ms;">
                            @foreach ($technologies as $item)
                                <div class="swiper-slide swiper-slide-duplicate-active" data-swiper-slide-index="0"
                                    style="width: 540px; margin-right: 50px;">
                                    <div class="saaspik-icon-box-wrapper style-one wow pixFadeLeft  " data-wow-delay="0.3s">
                                        <div class="saaspik-icon-box-wrapper style-one wow pixFadeLeft "
                                            data-wow-delay="0.3s">
                                            <div class="tech_box">
                                                <div class="row flex-center align-items-center">
                                                    <img src="{{ $item->img }}" class="wow pixFadeRight " width="30%"
                                                        data-wow-delay="0.3s" alt="feature-image">
                                                    <h6 class="m-0 wow pixFadeUp font-Light text-main-color"
                                                        style="visibility: visible; animation-name: pixFadeUp;">
                                                        {{ config('app.locale') == 'en' ? $item->name_en : $item->name_ar }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                    </div>
                    <h2 class=" wow pixFadeUp font-ExtraBold pb-2 text-white mt-3 "
                        style="visibility: visible; animation-name: pixFadeUp;">
                        <span class="text-secondry-color">
                            << </span>
                                {{ __('validation.Integrations') }}
                                <span class="text-secondry-color">>></span>
                    </h2>

                    <div class="swiper-container service-swiper swiper-container-initialized swiper-container-horizontal"
                        id="testimonial-two" data-speed="700" data-autoplay="5000" data-perpage="4" data-space="50"
                        style="    padding: 0 20px 40px;"
                        data-breakpoints="{&quot;991&quot;: {&quot;slidesPerView&quot;: 1}}">
                        <div class="swiper-wrapper"
                            style="transform: translate3d(-2950px, 0px, 0px); transition-duration: 0ms;">
                            @foreach ($Integrations as $item)
                                <div class="swiper-slide swiper-slide-duplicate-active" data-swiper-slide-index="0"
                                    style="width: 540px; margin-right: 50px;">
                                    <div class="saaspik-icon-box-wrapper style-one wow pixFadeLeft  "
                                        data-wow-delay="0.3s">
                                        <div class="saaspik-icon-box-wrapper style-one wow pixFadeLeft "
                                            data-wow-delay="0.3s">
                                            <div class="tech_box">
                                                <div class="row flex-center align-items-center">
                                                    <img src="{{ $item->img }}" class="wow pixFadeRight "
                                                        width="30%" data-wow-delay="0.3s" alt="feature-image">
                                                    <h6 class="m-0 wow pixFadeUp font-Light text-main-color"
                                                        style="visibility: visible; animation-name: pixFadeUp;">
                                                        {{ config('app.locale') == 'en' ? $item->name_en : $item->name_ar }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                    </div>
                </div>
        </section>

        @if ($who_we_serve)
            <section class="testimonials-two"
                style="background-image:url({{ $who_we_serve->img }});background-position: center bottom;background-repeat: no-repeat;background-size: cover;">
                <div class="container text-center">
                    <div class="section-title color-two text-center">
                        <h1 class="wow stickySlideUp font-Regular text-secondry-color"
                            style="visibility: visible; animation-name: pixFadeUp;">
                            {{ config('app.locale') == 'en' ? $who_we_serve->name_en : $who_we_serve->name_ar }}
                        </h1>
                        <span class="wow stickySlideUp text-center font-Regular text-white my-3 who-we-serve">
                            {{ config('app.locale') == 'en' ? $who_we_serve->des_en : $who_we_serve->des_ar }}

                        </span>

                    </div>

                </div>
            </section>
        @endif


        <section class="featured">
            <div class="container">
                <h1 class="wow stickySlideUp text-start font-Regular text-secondry-color">
                    {{ __('validation.q_and_a.text') }} </h1>
                <span class="wow stickySlideUp text-start font-Regular my-3 text-white row col-12 col-md-8">
                    {{ __('validation.q_and_a.text2') }}
                </span>
                <div id="accordionsing" class="faq  pixFade">
                    <div class="row mt-5">
                        @foreach ($q_and_a as $key => $item)
                            <div class="col-md-4">
                                <div class="saaspik-icon-box-wrapper style-one px-2 " data-wow-delay="0.3s">
                                    <div class="text-start my-1 lactic_color font-Regular">
                                        <img src="{{ $item->img }}" width="15%" alt="">
                                    </div>
                                    <div class="py-3">
                                        <h2 class=" font-Regular text-white  text-start" style="font-size: 17px;">
                                            {{ config('app.locale') == 'en' ? $item->name_en : $item->name_ar }}
                                        </h2>
                                        <span class="font-Light text-white text-start " style="font-size: 17px;">
                                            {{ config('app.locale') == 'en' ? $item->des_en : $item->des_ar }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
