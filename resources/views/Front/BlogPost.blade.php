@extends('layouts.FrontLayout')

@section('Front-container')
    <style>
        @media(max-width:768px) {
            .welcome-section {
                display: block !important;
            }

            .left {
                width: 100% !important;
                text-align: center;
                margin-bottom: 20px;
            }

            .right {
                width: 100% !important;
                text-align: center;
            }
        }
    </style>
    @if ($blog_header)
        <section class="testimonials-two"
            style="display:flex; align-items: center;min-height: 714px;overflow: visible;background-image:url({{ asset($blog_header->img) }});background-position: center bottom;background-repeat: no-repeat;background-size: cover;">
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

    <div id="post-section">
        <div class="container wow stickySlideUp">
            <div class="welcome-section">
                <div class="left">
                    <img src="{{ asset($post->img) }}" />
                </div>
                <div class="right">
                    <div class="title">
                        {{ config('app.locale') == 'en' ? $post->name_en : $post->name_ar }}
                    </div>
                    @foreach ($post->sections as $key => $section)
                        @if ($key === 0)
                            <div class="section">
                                <div class="title">
                                    {{ config('app.locale') == 'en' ? $section->des_en : $section->des_ar }}
                                </div>
                                <div class="content">
                                    {{ config('app.locale') == 'en' ? $section->content_en : $section->content_ar }}
                                </div>

                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            @foreach ($post->sections as $key => $section)
                @if ($key !== 0)
                    <div class="section d-sm-flex gap-4">
                        <div class="flex-grow-1 flex-shrink-1 " @if ($section->img) style="flex:1" @endif>
                            <div class="title">
                                {{ config('app.locale') == 'en' ? $section->des_en : $section->des_ar }}
                            </div>
                            <div class="content">
                                {{ config('app.locale') == 'en' ? $section->content_en : $section->content_ar }}
                            </div>
                        </div>
                        @if ($section->img)
                            <div class="flex-grow-1 flex-shrink-1 " style="flex:1">
                                <img src="{{ asset($section->img) }}" />
                            </div>
                        @endif
                    </div>
                @endif
            @endforeach
            <div class="date">
                {{ \Carbon\Carbon::parse($post->updated_at)->format('M d, Y') }}
            </div>
        </div>
    </div>

    <style>
        #post-section {
            background-image: url({{ asset('/Front/bg.png') }});
            background-size: cover;
            padding: 60px 0;
        }

        .welcome-section {
            display: flex;
        }

        .left,
        .right {
            width: 50%;
            padding: 0 20px;
        }

        .left img {
            width: 630px;
            border-radius: 30px;
        }

        .title {
            color: #CCFF00;
            font-size: 28px;
            margin-bottom: 17px;
        }

        .welcome-section,
        .section {
            margin-bottom: 40px;
        }

        .content {
            color: white;
            margin-bottom: 20px;
            white-space: pre-line;
        }

        .right>.title {
            color: white;
            font-size: 32px;
            margin-bottom: 20px;
            line-height: 1.25;
        }

        .date {
            font-size: 20px;
            color: #B2C4D9;
        }
    </style>


    @if ($blog_recent)
        <section class="testimonials-two" style="overflow: visible;background: #032850;">
            <div class="container wow stickySlideUp">
                <div class="row">
                    <div class="col-12">

                        <div class="section-title color-two text-left">
                            <h1 class="font-ExtraBold  text-secondry-color " style="visibility: visible;">
                                {{ config('app.locale') == 'en' ? $blog_recent->name_en : $blog_recent->name_ar }}
                            </h1>
                            <span class="text-center text-white " style="font-size:23px; visibility: visible;">
                                {{ config('app.locale') == 'en' ? $blog_recent->des_en : $blog_recent->des_ar }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    @foreach ($posts as $post)
                        <div class="col-md-4 col-lg-4 col-sm-12 mb-5">
                            <a href="/BlogPost/{{ $post->id }}" class="card"
                                style="background: white;border-radius: 30px;">
                                <img src="{{ asset($post->img) }}" style="border-radius: 26px 26px 0px 0px;" />


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
