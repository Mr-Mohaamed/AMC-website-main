@extends('layouts.FrontLayout')
@section('Front-container')
    @if ($contact_header)
        <section class="testimonials-two  "
            style="overflow: visible;background-image:url({{ $contact_header->img }});background-position: center bottom;background-repeat: no-repeat;background-size: cover;">
            <div class="container">
                <div class="row flex-center">
                    <div class="col-8">

                        <div class="section-title color-two text-center wow stickySlideUp">
                            <h1 class="font-ExtraBold  text-secondry-color " style="visibility: visible">
                                {{ config('app.locale') == 'en' ? $contact_header->name_en : $contact_header->name_ar }}
                            </h1>
                            <span class="text-center text-white " style="visibility: visible">
                                {{ config('app.locale') == 'en' ? $contact_header->des_en : $contact_header->des_ar }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <section class="testimonials-two  "
        style="overflow: visible;background-image:url({{ asset('Front/media/NewBanners/contact1.png') }});background-position: center bottom;background-repeat: no-repeat;background-size: cover;">
        <div class="container">
            <div class="row flex-between">
                <div class="col-md-4 order-md-0 order-1 wow slideInLeft mb-5">
                    <h3 class="text-main-color font-ExtraBold text-start" style="visibility: visible">
                        {{ __('validation.Contact_Information') }}
                    </h3>
                    <ul class="pl-3" style="list-style: none">
                        <li class="my-4  ">
                            <div class="row align-items-center">
                                <div class="soical_icon2 ">
                                    <i class="fa-solid fa-location-dot"></i>
                                </div>
                                <div class="ml-2">
                                    <h6 style="font-size: 10px; " class="m-0 p-0 text-muted">{{ __('validation.address') }}
                                    </h6>
                                    <span class="text-dark">
                                        {{ @$web->address }}
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="my-4  ">
                            <div class="row align-items-center">
                                <div class="soical_icon2 ">
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                                <div class="ml-2">
                                    <h6 style="font-size: 10px; " class="m-0 p-0 text-muted">{{ __('validation.phone') }}
                                    </h6>
                                    <span class="text-dark">
                                        {{ @$web->phone1 }} , {{ @$web->phone2 }}
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="my-4  ">
                            <div class="row align-items-center">
                                <div class="soical_icon2 ">
                                    <i class="fa-solid fa-message"></i>
                                </div>
                                <div class="ml-2">
                                    <h6 style="font-size: 10px; " class="m-0 p-0 text-muted">{{ __('validation.email') }}
                                    </h6>
                                    <span class="text-dark">
                                        {{ @$web->email }}
                                    </span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 wow slideInRight">
                    <form action="#" method="POST" id ="add_form" class="contact-form" data-pixsaas="contact-froms">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label class="text-main-color"> First Name*</label>
                                <input type="text" name="name" placeholder="First Name" required="">
                            </div>

                            <div class="col-md-12">
                                <label class="text-main-color">Email Address* </label>
                                <input type="email" name="email" required="" placeholder="Email Address">
                            </div>

                            <div class="col-md-12">
                                <label class="text-main-color">Phone Number* </label>
                                <input type="number" name="phone" placeholder="Phone Number">
                            </div>
                            <div class="col-md-6">
                                <label class="text-main-color w-100">Product Type* </label>
                                <select class="form-select  form-select " name="product_type"
                                    aria-label=".form-select-lg example">
                                    @foreach ($products as $key => $item)
                                        <option value={{ $item->id }}>
                                            {{ config('app.locale') == 'en' ? $item->name_en : $item->name_ar }} </option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="text-main-color">Budget Range* </label>
                                <input type="number" placeholder="$" name="budget">
                            </div>

                            <div class="col-md-12">
                                <label class="text-main-color">Message </label>
                                <textarea name="content" required="" placeholder="Message"></textarea>
                            </div>
                        </div>

                        <div class="row flex-end">
                            <button type="submit" style="border:none" class="new_btn my-3 wow pixFadeUp   text-end">
                                <span class="btn-text">Send Your Massage</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(function() {
            $('#add_form').submit(function(e) {
                e.preventDefault();
                var data = new FormData(this);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "post",
                    url: "/user-content",
                    dataType: "json",
                    data: data,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $('#add_form').find('input').val('')
                        Swal.fire({
                            icon: 'success',
                            title: response.message,
                        })
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        var response = JSON.parse(xhr.responseText);
                        if (response.errors) {
                            $.each(response.errors, function(fieldName, messages) {
                                $.each(messages, function(index, message) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Validation Error',
                                        text: message,
                                    });
                                });
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Validation Error',
                                text: response.message || 'Validation error occurred.',
                            });
                        }
                    }
                });
            });

        })
    </script>
@endsection
