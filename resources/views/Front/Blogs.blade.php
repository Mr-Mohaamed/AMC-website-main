@extends('layouts.FrontLayout')

@section('Front-container')

    @if ($blog_header)
        <section class="testimonials-two"
            style="display:flex; align-items: center;min-height: 714px;overflow: visible;background-image:url({{ $blog_header->img }});background-position: center bottom;background-repeat: no-repeat;background-size: cover;">
            <div class="container">
                <div class="row flex-center">
                    <div class="col-8">

                        <div class="section-title color-two text-center">
                            <h1 class=" wow pixFadeUp font-ExtraBold  text-secondry-color "
                                style=" visibility: visible; animation-name: pixFadeUp;">
                                {{ config('app.locale') == 'en' ? $blog_header->name_en : $blog_header->name_ar }}
                            </h1>
                            <span class=" wow pixFadeUp text-center text-white "
                                style="font-size: 32px;visibility: visible;line-height: 1.5;margin-top: 31px;display: inline-block;font-weight: 300;">
                                {{ config('app.locale') == 'en' ? $blog_header->des_en : $blog_header->des_ar }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if ($blog_recent)
        <section class="testimonials-two  " style="overflow: visible;background: #032850;">
            <div class="container">
                <div class="row flex-center">
                    <div class="col-8">

                        <div class="section-title color-two text-center wow stickySlideDown">
                            <h1 class="font-ExtraBold  text-secondry-color " style="visibility: visible;">
                                {{ config('app.locale') == 'en' ? $blog_recent->name_en : $blog_recent->name_ar }}
                            </h1>
                            <span class="text-center text-white " style="font-size:23px; visibility: visible;">
                                {{ config('app.locale') == 'en' ? $blog_recent->des_en : $blog_recent->des_ar }}
                            </span>
                        </div>
                    </div>
                </div>
                {{--
                <div class="row align-items-center wow stickySlideUp">
                    @foreach ($posts as $post)
                        <div class="col-md-4 col-lg-4 col-sm-12 mb-5">
                            <a href="/BlogPost/{{ $post->id }}" class="card"
                                style="background: white;border-radius: 30px;">
                                <img src="{{ $post->img }}" style="border-radius: 26px 26px 0px 0px;" /> --}}

                <div class="row wow stickySlideUp">
                    @foreach ($posts as $post)
                        <div class="col-md-4 col-lg-4 col-sm-12 mb-5">
                            <a href="/BlogPost/{{ $post->id }}" class="card"
                                style="background: white;border-radius: 30px; height:100%;">
                                <img src="{{ $post->img }}"
                                    style="border-radius: 26px 26px 0px 0px; aspect-ratio: 16 / 10;" />


                                <div class="my-3 px-2">
                                    <p class="text-start my-2 px-3" style="color: #5A6570;">
                                        {{ \Carbon\Carbon::parse($post->updated_at)->format('M d, Y') }}</p>

                                    <h6 class="text-start my-2 font-Bold px-3">
                                        {{ config('app.locale') == 'en' ? $post->name_en : $post->name_ar }}
                                    </h6>
                                    <h6 class="text-start my-2 font-Light px-3">
                                        {{ config('app.locale') == 'en' ? $post->des_en : $post->des_ar }}
                                    </h6>
                                </div>


                                <div class="mb-3 px-2">
                                    @foreach ($post->sections as $detail)
                                        <h6 class="text-start font-Light px-3 py-2">
                                            <i class="fa-solid fa-circle-check " style="color: #6F71FC"></i>
                                            {{ config('app.locale') == 'en' ? $detail->des_en : $detail->des_ar }}
                                        </h6>
                                    @endforeach
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

@endsection
