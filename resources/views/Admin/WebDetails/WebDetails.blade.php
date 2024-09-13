@extends('layouts.AdminLayout')
@section('Admin-Contain')
<div class="card mb-3">
    <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url({{asset('newAdmin/assets')}}/img/icons/spot-illustrations/corner-4.png);">
    </div>
        <div class="card-body position-relative m-2">
            <div class="row">
                <div class="col-lg-8">
                    <h3>{{__('validation.Web_details')}}</h3>
                </div>
            </div>
        </div>
</div>
<div class="card mt-5 p-3">
    <div class="row page-titles mx-0 ">
        <div class="row page-titles mx-0">
            <form action="#" method="POST" id ="add_form" enctype="multipart/form-data" >
                @csrf
                <div class="d-flex justify-content-end col-12">
                    <button class="btn col-lg-3 btn-success" type="submit">{{__('validation.update')}}   </button>
                </div>
                <div class="table-responsive mt-3 scrollbar">
                    <table class="table table-bordered table-striped fs--1 mb-0">
                        <thead class="bg-200 text-900">
                            <tr>
                                <th scope="col">{{__('validation.setting')}}  </th>
                                <th scope="col">{{__('validation.Actions')}} </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> {{__('validation.name')}} </td>
                                <td>
                                    <input type="text" name="name_en" class="form-control name_en">
                                    <input type="hidden" name="id" class="form-control item_id">
                                </td>
                            </tr>
                            <tr>
                                <td>{{__('validation.phone1')}} </td>
                                <td>
                                    <input type="text" name="phone1" class="form-control phone1">
                                </td>
                            </tr>
                            <tr>
                                <td>{{__('validation.phone2')}}  </td>
                                <td>
                                    <input type="text" name="phone2" class="form-control phone2">
                                </td>
                            </tr>
                            <tr>
                                <td>{{__('validation.address')}}  </td>
                                <td>
                                    <input type="text" name="address" class="form-control address">
                                </td>
                            </tr>
                            <tr>
                                <td>{{__('validation.email')}}  </td>
                                <td>
                                    <input type="email" name="email" class="form-control email">
                                </td>
                            </tr>
                            <tr>
                                <td>{{__('validation.whats_app')}}   </td>
                                <td>
                                    <input type="text" name="whatsapp" class="form-control whatsapp">
                                </td>
                            </tr>
                            <tr>
                                <td> {{__('validation.facebook_link')}} </td>
                                <td>
                                    <input type="text" name="facebook" class="form-control facebook">
                                </td>
                            </tr>
                            <tr>
                                <td>{{__('validation.twitter_link')}}  </td>
                                <td>
                                    <input type="text" name="youtube" class="form-control youtube">
                                </td>
                            </tr>
                            <tr>
                                <td>{{__('validation.instagram_link')}}  </td>
                                <td>
                                    <input type="text" name="instagram" class="form-control instagram">
                                </td>
                            </tr>
                            <tr>
                                <td>{{__('validation.Linkedin_link')}}  </td>
                                <td>
                                    <input type="text" name="linked_in" class="form-control linked_in">
                                </td>
                            </tr>
                            <tr>
                                <td>{{__('validation.Header_logo')}}  </td>
                                <td>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-center mt-3">
                                            <img src="" class="w-70 " style="width: 300px" id="img_edit" alt="">
                                        </div>
                                        <label class="form-label" for="customFile">
                                            {{__('validation.choose_img')}}
                                        </label>
                                        <input class="form-control" id="customFile" name="img" type="file" />
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td>{{__('validation.Footer_logo')}}  </td>
                                <td>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-center mt-3">
                                            <img src="" class="w-70 " style="width: 300px" id="img_edit2" alt="">
                                        </div>
                                        <label class="form-label" for="customFile">
                                            {{__('validation.choose_img')}}
                                        </label>
                                        <input class="form-control" id="customFile" name="img2" type="file" />
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td>{{__('validation.Mini_logo')}}  </td>
                                <td>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-center mt-3">
                                            <img src="" class="w-70 " style="width: 300px" id="img_edit3" alt="">
                                        </div>
                                        <label class="form-label" for="customFile">
                                            {{__('validation.choose_img')}}
                                        </label>
                                        <input class="form-control" id="customFile" name="img3" type="file" />
                                    </div>

                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(function(){
        get_data();
        function get_data() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'GET',
                dataType: 'json',
                url: "/admin-details",
                data: {
                    type: 'web'
                },
                success: function(response) {
                    if (response) {
                        $('.name_en').val(response.name_en)
                        $('.phone1').val(response.phone1)
                        $('.phone2').val(response.phone2)
                        $('.address').val(response.address)
                        $('.email').val(response.email)
                        $('.whatsapp').val(response.whatsapp)
                        $('.facebook').val(response.facebook)
                        $('.youtube').val(response.youtube)
                        $('.instagram').val(response.instagram)
                        $('.linked_in').val(response.linked_in)
                        $('#img_edit').attr('src', response.img)
                        $('#img_edit2').attr('src', response.img2)
                        $('#img_edit3').attr('src', response.img3)
                        $('.item_id').val(response.id)
                    }
                },

            });
        }

        $('#add_form').submit(function(e){
                e.preventDefault();
                var level = new FormData(this);
                level.append('type','web')
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type :"post",
                    url :"/admin-details",
                    dataType :"json",
                    data : level,
                    contentType : false,
                    processData :false,
                    success:function(response){
                        $('#add_form').find('input').val('')
                        get_data()
                        Swal.fire({
                            icon: 'success',
                            title: response.message,
                        })

                    },
                    error: function(xhr, textStatus, errorThrown){
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
