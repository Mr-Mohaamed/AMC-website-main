@extends('layouts.FrontLayout')
@section('Front-container')
    @if ($pricing_header)
        <section class="testimonials-two  "
            style="overflow: visible;background-image:url({{ $pricing_header->img }});background-position: center bottom;background-repeat: no-repeat;background-size: cover;">
            <div class="container">
                <div class="row flex-center wow stickySlideUp">
                    <div class="col-8">

                        <div class="section-title color-two text-center">
                            <h1 class="font-ExtraBold  text-secondry-color " style="visibility: visible;">
                                {{ config('app.locale') == 'en' ? $pricing_header->name_en : $pricing_header->name_ar }}
                            </h1>
                            <span class="text-center text-white " style="visibility: visible;">
                                {{ config('app.locale') == 'en' ? $pricing_header->des_en : $pricing_header->des_ar }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if ($support_plan)
        <section class="testimonials-two  "
            style="overflow: visible;background-image:url({{ $support_plan->img }});background-position: center bottom;background-repeat: no-repeat;background-size: cover;">
            <div class="container wow stickySlideUp">
                <div class="row flex-center">
                    <div class="col-8">

                        <div class="section-title color-two text-center">
                            <h1 class="font-ExtraBold  text-secondry-color " style="visibility: visible">
                                {{ config('app.locale') == 'en' ? $support_plan->name_en : $support_plan->name_ar }}
                            </h1>
                            <span class="text-center text-white " style="visibility: visible">
                                {{ config('app.locale') == 'en' ? $support_plan->des_en : $support_plan->des_ar }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row px-3">
                    @foreach ($subscriptions as $item)
                        <div @if (!$item->most_popular) style="scale:0.95" @endif
                            class="col-md-4 col-lg-4 col-sm-12 my-3 d-flex">
                            <div class="card justify-content-between" style="flex:1;background: white;border-radius: 30px;">
                                <div>
                                    @if ($item->most_popular)
                                        <img class="subscrebtion_img"
                                            src="{{ asset('Front/media/NewBanners/Vector_270.png') }}" alt="">
                                    @endif
                                    <h5 @if ($item->most_popular) class="text-center my-3 mt-5 pt-4 text-main-dark-color font-Light" @endif
                                        class="text-center my-3 mt-5 text-main-dark-color font-Light">
                                        {{ config('app.locale') == 'en' ? $item->header_en : $item->header_ar }}
                                    </h5>
                                    @if ($item->price == 'Custom' || $item->price == 'Free')
                                        <div class="row flex-center align-items-end">
                                            <h3 class="text-center my-2 ml-2 font-Regular  text-white-secondry-color">
                                                {{ $item->price }}
                                            </h3>
                                        </div>
                                    @elseif ($item->price > 0)
                                        <div class="row flex-center align-items-end">
                                            @if ($item->discount > 0)
                                                <del class="text-center my-2 text-muted  font-Regular ">
                                                    ${{ $item->discount }}
                                                </del>
                                            @endif
                                            <h3 class="text-center my-2 ml-2 font-Regular  text-white-secondry-color">
                                                ${{ $item->price }}<span style="font-size: 15px">/mo</span>
                                            </h3>
                                        </div>
                                    @endif
                                    <h6 class="text-center my-2 font-Bold">
                                        {{ config('app.locale') == 'en' ? $item->name_en : $item->name_ar }}
                                    </h6>
                                    <h6 class="text-center my-2 font-Light px-3">
                                        {{ config('app.locale') == 'en' ? $item->des_en : $item->des_ar }}
                                    </h6>
                                    <div class="d-flex flex-center">
                                        <div class="col-11">
                                            <hr class="px-3 my-3 font-Light purple_color "
                                                style="background: #6F71FC ;align-items: center; padding: 1px; ">
                                        </div>
                                    </div>

                                    <div class="mx-3">
                                        @foreach ($item->details as $detail)
                                            <h6 class="text-start font-Light px-3 py-2">
                                                <i class="fa-solid fa-circle-check " style="color: #6F71FC"></i>
                                                {{ config('app.locale') == 'en' ? $detail->des_en : $detail->des_ar }}
                                            </h6>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="my-3 px-3">
                                    <div class="d-flex flex-center my-5">

                                        <a href="{{ route('front.contact') }}"
                                            class=" btn3 @if ($item->most_popular) active @endif wow pixFadeUp px-3 text-center font-Medium"
                                            style="width: 90%; visibility: visible; animation-delay: 0.6s; animation-name: pixFadeUp;"
                                            data-wow-delay="0.6s">
                                            {{ __('validation.Header.btn2') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if ($product_plan)
        <section class="testimonials-two  "
            style="overflow: visible;background-image:url({{ $product_plan->img }});background-position: center bottom;background-repeat: no-repeat;background-size: cover;">
            <div class="container wow stickySlideUp">
                <div class="row flex-center">
                    <div class="col-8">

                        <div class="section-title color-two text-center">
                            <h1 class="font-ExtraBold  text-secondry-color " style="visibility: visible">
                                {{ config('app.locale') == 'en' ? $product_plan->name_en : $product_plan->name_ar }}
                            </h1>
                            <span class="text-center text-white " style="visibility: visible">
                                {{ config('app.locale') == 'en' ? $product_plan->des_en : $product_plan->des_ar }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    @foreach ($products as $item)
                        <div @if (!$item->most_popular) style="scale:0.95" @endif
                            class="col-md-4 col-lg-4 col-sm-12 my-3 d-flex">
                            <div class="card justify-content-between" style="flex:1;background: white;border-radius: 30px;">
                                <div>
                                    @if ($item->most_popular)
                                        <img class="subscrebtion_img"
                                            src="{{ asset('Front/media/NewBanners/Vector_270.png') }}" alt="">
                                    @endif
                                    <h5 class="text-center my-3 mt-5 pt-4 text-main-dark-color font-Light">
                                        {{ config('app.locale') == 'en' ? $item->header_en : $item->header_ar }}
                                    </h5>
                                    @if ($item->price > 0)
                                        <div class="row flex-center align-items-end">
                                            @if ($item->discount > 0)
                                                <del class="text-center my-2 text-muted  font-Regular ">
                                                    ${{ $item->discount }}
                                                </del>
                                            @endif
                                            <h3 class="text-center my-2 ml-2 font-Regular  text-white-secondry-color">
                                                ${{ $item->price }}<span style="font-size: 15px">/mo</span>
                                            </h3>
                                        </div>
                                    @endif
                                    <h6 class="text-center my-2 font-Bold">
                                        {{ config('app.locale') == 'en' ? $item->name_en : $item->name_ar }}
                                    </h6>
                                    <h6 class="text-center my-2 font-Light px-3">
                                        {{ config('app.locale') == 'en' ? $item->des_en : $item->des_ar }}
                                    </h6>
                                    <div class="d-flex flex-center">
                                        <div class="col-11">
                                            <hr class="px-3 my-3 font-Light purple_color "
                                                style="background: #6F71FC ;align-items: center; padding: 1px; ">
                                        </div>
                                    </div>
                                    <div>
                                        @foreach ($item->details as $detail)
                                            <h6 class="text-start font-Light px-3 py-2">
                                                <i class="fa-solid fa-circle-check " style="color: #6F71FC"></i>
                                                {{ config('app.locale') == 'en' ? $detail->des_en : $detail->des_ar }}
                                            </h6>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="my-3 px-3">

                                    <div class="d-flex flex-center my-5">

                                        <a href="{{ route('front.contact') }}"
                                            class=" btn3 @if ($item->most_popular) active @endif wow pixFadeUp px-3 text-center font-Medium"
                                            style="width: 90%; visibility: visible; animation-delay: 0.6s; animation-name: pixFadeUp;"
                                            data-wow-delay="0.6s">
                                            {{ __('validation.Header.btn2') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

@endsection
