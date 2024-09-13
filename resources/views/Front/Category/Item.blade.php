@extends('layouts.FrontLayout')
@section('Front-container')
<section class="portfolio__details pt-120 pb-60">
    <div class="container">
          <div class="row">
             <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="portfolio__img-wrapper">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="portfolio__img mb-30 w-img wow fadeInUp" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                    <img src="/{{$item->img}}" alt="">
                                </div>
                            </div>
                            @foreach ($item->images as $item_image)
                                <div class="swiper-slide">
                                    <div class="portfolio__img mb-30 w-img wow fadeInUp" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                        <img src="/{{$item_image->img}}" alt="">
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
             </div>
             <div class="col-xl-5 col-lg-6 col-md-6 offset-xl-1">
                <div class="portfolio__details-content mt-10">
                      <h1 class="wow fadeInUp" data-wow-delay=".4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">{{config('app.locale') == 'en' ? $item->name_en :$item->name_ar}}    </h1>
                      <div class="portfolio__info mb-25 wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                         <h3>{{ __('validation.cat')}}</h3>
                         <p> {{config('app.locale') == 'en' ? $cat->name_en :$cat->name_ar}} </p>
                      </div>
                      <div class="portfolio__info mb-25 wow fadeInUp" data-wow-delay=".8s" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInUp;">
                         <h3>{{ __('validation.Price')}}: </h3>
                         <p>{{$item->price}}$</p>
                      </div>
                      <div class="portfolio__overview mt-40 wow fadeInUp" data-wow-delay="1s" style="visibility: visible; animation-delay: 1s; animation-name: fadeInUp;">
                         <h2>Project Overview</h2>
                            <p>{{config('app.locale') == 'en' ? $item->des_en :$item->des_ar}}</p>
                        </div>
                </div>
             </div>
          </div>
    </div>
 </section>
<section class="portfolio__area pb-90 pt-130">
    <div class="container">
       <div class="row align-items-end">
          <div class="col-xxl-5 col-xl-5 col-lg-6">
             <div class="section__title-wrapper section__title-wrapper-5 mb-50 wow fadeInUp" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                <h2 class="section__title-5 mb-10">{{config('app.locale') == 'en' ? $cat->name_en :$cat->name_ar}}</h2>
             </div>
          </div>
          <div class="col-xxl-7 col-xl-7 col-lg-6">
             <div class="portfolio__menu d-flex justify-content-lg-end mb-50">
                <div class="masonary-menu filter-button-group">
                   <button class="active" data-filter="*">ALL</button>
               </div>
             </div>
          </div>
       </div>
       <div class="row grid" style="position: relative; height: 1664.6px;">
            @foreach ($cat->items as $key=>$item)
            @if ($key < 6)
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 grid-item {{$cat->id}} " style="position: absolute; left: 0%; top: 0px;">
                        <div class="portfolio__item mb-30">
                            <div class="portfolio__thumb w-img">
                                <img src="/{{$item->img}}" alt="">
                                <div class="portfolio__content w-80 pb-0">
                                    <span>{{config('app.locale') == 'en' ? $item->name_en :$item->name_ar}}</span>
                                    <h3 class="portfolio__title"><a href="#">{{$item->price}}$</a></h3>
                                    <div class="text-center">
                                        <a class="w-btn w-btn-blue w-btn-blue-header"  href="{{route('front.item',$item->id)}}"> View </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            @endif
            @endforeach
       </div>
    </div>
</section>
@endsection
