@extends('layouts.FrontLayout')
@section('Front-container')
<section class="page__title-area page__title-height d-flex align-items-center fix p-relative z-index-1" data-background="{{asset('Front')}}/img/page-title/page-title.jpg" style="background-image: url(&quot;{{asset('Front')}}/img/page-title/page-title.jpg&quot;);">
    <div class="page__title-shape">
       <img class="page-title-dot-4" src="{{asset('Front')}}/img/page-title/dot-4.png" alt="">
       <img class="page-title-dot" src="{{asset('Front')}}/img/page-title/dot.png" alt="">
       <img class="page-title-dot-2" src="{{asset('Front')}}/img/page-title/dot-2.png" alt="">
       <img class="page-title-dot-3" src="{{asset('Front')}}/img/page-title/dot-3.png" alt="">
       <img class="page-title-plus" src="{{asset('Front')}}/img/page-title/plus.png" alt="">
       <img class="page-title-triangle" src="{{asset('Front')}}/img/page-title/triangle.png" alt="">
    </div>
    <div class="container">
       <div class="row">
          <div class="col-xxl-12">
             <div class="page__title-wrapper text-center">
                <h3>{{config('app.locale') == 'en' ? $cat->name_en :$cat->name_ar}} </h3>
                   <nav aria-label="breadcrumb">
                      <ol class="breadcrumb justify-content-center">
                         <li class="breadcrumb-item"><a href="{{route('front-home')}}">{{__('validation.Home')}}</a></li>
                         <li class="breadcrumb-item active" aria-current="page">{{config('app.locale') == 'en' ? $cat->name_en :$cat->name_ar}}</li>
                      </ol>
                   </nav>
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
            @endforeach
       </div>
    </div>
</section>
@endsection
