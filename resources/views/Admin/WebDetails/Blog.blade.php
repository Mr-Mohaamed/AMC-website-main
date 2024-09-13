@extends('layouts.AdminLayout')
@section('Admin-Contain')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
            style="background-image:url({{ asset('newAdmin/assets') }}/img/icons/spot-illustrations/corner-4.png);">
        </div>
        <div class="card-body position-relative m-3">
            <div class="row">
                <div class="col-lg-8">
                    <h3> {{ __('validation.Blog') }} </h3>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex flex-end my-2 w-100 ">
        <div class="col-auto">
            <button class="add_country_btn btn btn-falcon-info"> {{ __('validation.add_new_section') }} </button>
        </div>
    </div>

    <div id="tableExample3" class="card  p-3">
        <div class="table-responsive scrollbar">
            <table class="table mb-0 data-table fs--1" id="myTable">
                <thead class="bg-200 text-900">
                    <tr>
                        <th>{{ __('validation.Descreption_en') }}</th>
                        <th>{{ __('validation.Descreption_ar') }}</th>
                        <th style="width: 200px">{{ __('validation.des_en') }}</th>
                        <th style="width: 200px">{{ __('validation.des_ar') }}</th>
                        <th>{{ __('validation.img') }}</th>
                        <th>{{ __('validation.type') }}</th>
                        <th>{{ __('validation.Actions') }}</th>
                    </tr>
                </thead>
                <tbody class="list country_table">

                </tbody>
            </table>

        </div>

    </div>


    <div class="modal fade" id="Add_model" tabindex="-1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg mt-6" role="document">
            <div class="modal-content border-0">
                <div class="modal-content position-relative">
                    <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                        <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="#" method="POST" id ="add_form" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body p-0">
                            <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                                <h4 class="mb-1" id="modalExampleDemoLabel"> {{ __('validation.add_new_section') }}</h4>
                            </div>
                            <div class="p-4">

                                <div class="row" style="justify-content:space-evenly">
                                    <div class="mb-3  col-lg-12 form-group">
                                        <select class="form-select col-lg-6 form-select " name="type"
                                            aria-label=".form-select-lg example">
                                            <option value="banner1">{{ __('validation.Banner_1') }}</option>
                                            <option value="banner2">{{ __('validation.Banner_2') }}</option>
                                            <option value="banner3">{{ __('validation.Banner_3') }}</option>
                                            <option value="about_header">{{ __('validation.About_Header') }}</option>
                                            <option value="mission">{{ __('validation.Mission') }}</option>
                                            <option value="who_we_serve">{{ __('validation.who_we_serve') }}</option>
                                            <option value="pricing_header">{{ __('validation.pricing_header') }}</option>
                                            <option value="support_plan">{{ __('validation.support_plan') }}</option>
                                            <option value="product_plan">{{ __('validation.product_plan') }}</option>
                                            <option value="contact_header">{{ __('validation.contact_header') }}</option>
                                            <option value="blog_recent">{{ __('validation.blog_recent') }}</option>
                                            <option value="blog_header">{{ __('validation.blog_header') }}</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-6 form-Roles mb-3">
                                        <label class="form-label">{{ __('validation.name_en') }}</label>
                                        <input type="text" class="form-control " name="name_en">
                                    </div>

                                    <div class=" col-lg-6 form-Roles mb-3">
                                        <label class="form-label"> {{ __('validation.name_ar') }}</label>
                                        <input type="text" class="form-control " name="name_ar">
                                    </div>
                                    <div class=" col-lg-6 form-Roles mb-3">
                                        <label class="form-label"> {{ __('validation.des_en') }}</label>
                                        <textarea class="form-control " name="des_en" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class=" col-lg-6 form-Roles mb-3">
                                        <label class="form-label"> {{ __('validation.des_ar') }}</label>
                                        <textarea class="form-control " name="des_ar" cols="30" rows="10"></textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class=" form-Roles mb-3">
                                            <label class="form-label" for="customFile">
                                                {{ __('validation.choose_img') }}
                                            </label>
                                            <input class="form-control" name="img" accept="image/*" type="file" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer mt-3">
                            <button class="btn btn-secondary" type="button"
                                data-bs-dismiss="modal">{{ __('validation.cancel') }} </button>
                            <button class="btn btn-primary add_country" type="submit">{{ __('validation.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="item_modal_update" tabindex="-1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg mt-6" role="document">
            <div class="modal-content border-0">
                <div class="modal-content position-relative">
                    <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                        <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="#" id="country_update_form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body p-0">
                            <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                                <h4 class="mb-1" id="modalExampleDemoLabel">{{ __('validation.update_new_section') }}
                                </h4>
                            </div>
                            <div class="p-4">

                                <div class="row align-items-end" style="justify-content:space-evenly">
                                    <div class="mb-3  col-lg-12 form-group">
                                        <select class="form-select col-lg-6 form-select " name="type"
                                            aria-label=".form-select-lg example">
                                            <option value="banner1">{{ __('validation.Banner_1') }}</option>
                                            <option value="banner2">{{ __('validation.Banner_2') }}</option>
                                            <option value="banner3">{{ __('validation.Banner_3') }}</option>
                                            <option value="about_header">{{ __('validation.About_Header') }}</option>
                                            <option value="mission">{{ __('validation.Mission') }}</option>
                                            <option value="what_we_serve">{{ __('validation.what_we_serve') }}</option>
                                            <option value="pricing_header">{{ __('validation.pricing_header') }}</option>
                                            <option value="support_plan">{{ __('validation.support_plan') }}</option>
                                            <option value="product_plan">{{ __('validation.product_plan') }}</option>
                                            <option value="contact_header">{{ __('validation.contact_header') }}</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-6 form-Roles mb-3">
                                        <label class="form-label">{{ __('validation.name_en') }}</label>
                                        <input type="text" class="form-control " id="name_en" name="name_en">
                                    </div>
                                    <input type="hidden" class="item_id" name="id">
                                    <div class=" col-lg-6 form-Roles mb-3">
                                        <label class="form-label"> {{ __('validation.name_ar') }}</label>
                                        <input type="text" class="form-control " id="name_ar" name="name_ar">
                                    </div>
                                    <div class=" col-lg-6 form-Roles mb-3">
                                        <label class="form-label"> {{ __('validation.des_en') }}</label>
                                        <textarea class="form-control " id="des_en" name="des_en" cols="30" rows="5"></textarea>
                                    </div>
                                    <div class=" col-lg-6 form-Roles mb-3">
                                        <label class="form-label"> {{ __('validation.des_ar') }}</label>
                                        <textarea class="form-control " id="des_ar" name="des_ar" cols="30" rows="5"></textarea>
                                    </div>


                                    <div class="col-lg-6 form-Roles mb-3">
                                        <div class="d-flex justify-content-center mt-3">
                                            <img src="" class="w-70 " style="width: 300px" id="img_edit"
                                                alt="">
                                        </div>
                                        <label class="form-label" for="customFile">
                                            {{ __('validation.choose_img') }}
                                        </label>
                                        <input class="form-control" name="img" accept="image/*" type="file" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button"
                                data-bs-dismiss="modal">{{ __('validation.cancel') }} </button>
                            <button class="btn btn-primary " type="submit">{{ __('validation.save') }} </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function() {

            get_data();

            function get_data() {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'GET',
                    dataType: 'json',
                    url: "/get-blog",
                    success: function(response) {
                        $('.country_table').html('');
                        $('#myTable').DataTable().destroy();
                        $('#myTable tbody').empty();
                        $.each(response, function(key, item) {
                            var country_img = item.img ? item.img :
                                '{{ asset('newAdmin/assets/logo.png') }}';
                            var name_ar = item.name_ar ?? '';
                            var name_en = item.name_en ?? '';
                            var des_ar = item.des_ar ?? '';
                            var des_en = item.des_en ?? '';
                            $('.country_table').append(
                                '<tr>\
                                                                                                                                            <td class="align-middle name text-nowrap ">\
                                                                                                                                                <h6 class="m-0 p-0">' +
                                name_en +
                                ' </h6>  \
                                                                                                                                            </td>\
                                                                                                                                            <td class="align-middle name text-nowrap ">\
                                                                                                                                                <h6 class="m-0 p-0">' +
                                name_ar +
                                ' </h6>  \
                                                                                                                                            </td>\
                                                                                                                                            <td style="width: 200px" class="align-middle ">\
                                                                                                                                                <h6 style="white-space:normal;" class="m-0 p-0">' +
                                des_en +
                                ' </h6>  \
                                                                                                                                            </td>\
                                                                                                                                            <td style="width: 200px" class="align-middle ">\
                                                                                                                                                <h6 style="white-space:normal;" class="m-0 p-0">' +
                                des_ar +
                                ' </h6>  \
                                                                                                                                            </td>\
                                                                                                                                            <td class=" text-center min-w-100 ">\
                                                                                                                                                <div class="avatar avatar-3xl">\
                                                                                                                                                        <img  src="' +
                                country_img +
                                '" alt="" />\
                                                                                                                                                    </div> \
                                                                                                                                            </td>\
                                                                                                                                            <td class="align-middle name text-center ">\
                                                                                                                                                <h6 class="m-0 p-0">' +
                                item
                                .type +
                                ' </h6>  \
                                                                                                                                            </td>\
                                                                                                                                            <td class="min-w-100 pt-3">\
                                                                                                                                                <div class="d-flex">\
                                                                                                                                                    <button class="btn btn-falcon-info   w-100 me-3 edit_item_model_btn" value="' +
                                item.id +
                                '"> {{ __('validation.update') }} </button>\
                                                                                                                                                    <button class="btn btn-falcon-danger w-100 delete_btn_item" value="' +
                                item
                                .id +
                                '"> {{ __('validation.delete') }}</button>\
                                                                                                                                                </div>\
                                                                                                                                            </td>\
                                                                                                                                        </tr>\
                                                                                                                                    '
                            )
                        });
                        let table = new DataTable('#myTable');
                    },
                });
            }

            $(document).on('click', '.add_country_btn', function(e) {
                e.preventDefault();
                $('#Add_model').modal('show');
            });

            $('#add_form').submit(function(e) {
                e.preventDefault();
                var data = new FormData(this);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "post",
                    url: "/admin-details",
                    dataType: "json",
                    data: data,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $('#Add_model').modal('hide')
                        $('#add_form').find('input').val('')
                        get_data()
                        Swal.fire({
                            icon: 'success',
                            title: response.message,
                        })

                    },
                    error: function(xhr, textStatus, errorThrown) {
                        var response = JSON.parse(xhr.responseText);
                        console.log(response);

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

            $(document).on('click', '.edit_item_model_btn', function() {
                $('#item_modal_update').modal('show');
                var country = $(this).val()
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'get',
                    dataType: 'json',
                    url: "/admin-details/" + country,
                    success: function(response) {
                        if (response.status == 404) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Sorry',
                                text: response.message,
                            })
                        } else {
                            $("#item_modal_update .form-select option").removeClass('d-none');
                            $('.user_type_response').remove();
                            $("#item_modal_update .form-select option[value=" + response.type +
                                "]").addClass('d-none');
                            $("#item_modal_update .form-select ").prepend(
                                '<option class="user_type_response" value="' + response
                                .type + '" selected>' + response.type + '</option>')


                            $('#name_en').val(response.name_en)
                            $('#name_ar').val(response.name_ar)
                            $('#des_en').text(response.des_en)
                            $('#des_ar').text(response.des_ar)
                            $('#img_edit').attr('src', response.img)
                            $('.item_id').val(response.id)
                        }

                    }
                })
            });

            $('#country_update_form').submit(function(e) {
                e.preventDefault();
                var data = new FormData(this);
                data.append('_method', 'PATCH')
                var country_id = $('.item_id').val()
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "post",
                    url: "/admin-details/" + country_id,
                    dataType: "json",
                    data: data,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $('#item_modal_update').modal('hide')
                        get_data()
                        Swal.fire({
                            icon: 'success',
                            title: response.message,
                        })
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        var response = JSON.parse(xhr.responseText);
                        console.log(response);

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

            $(document).on('click', '.delete_btn_item', function() {
                var item_id = $(this).val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'get',
                    dataType: 'json',
                    url: "/admin-details/" + item_id,
                    success: function(response) {
                        if (response.status == 404) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Sorry',
                                text: response.message,
                            })
                        } else {
                            const swalWithBootstrapButtons = Swal.mixin({
                                customClass: {
                                    confirmButton: 'btn btn-falcon-info  ',
                                    cancelButton: 'btn btn-falcon-danger'
                                },
                                buttonsStyling: false
                            })

                            swalWithBootstrapButtons.fire({
                                title: '{{ __('validation.delete') }} ' + response
                                    .name_en + ' !!?',
                                text: '{{ __('validation.revet') }}',
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonText: '{{ __('validation.yes') }}',
                                cancelButtonText: '{{ __('validation.no') }}',
                                reverseButtons: true
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    detele_item(response.id)
                                    swalWithBootstrapButtons.fire(
                                        '{{ __('validation.deleted') }}',
                                        '{{ __('validation.fileDeleted') }}',
                                        ' success'
                                    )
                                } else if (
                                    /* Read more about handling dismissals below */
                                    result.dismiss === Swal.DismissReason.cancel
                                ) {
                                    swalWithBootstrapButtons.fire(
                                        '{{ __('validation.cancelled') }}',
                                        '{{ __('validation.fileSave') }}',
                                        'error'
                                    )
                                }
                            })
                        }
                    }
                })
            });

            function detele_item(item_id) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'delete',
                    dataType: 'json',
                    url: "/admin-details/" + item_id,
                    data: {
                        id: item_id
                    },
                    success: function(response) {
                        get_data()
                    }
                })
            }
        })
    </script>
@endsection
