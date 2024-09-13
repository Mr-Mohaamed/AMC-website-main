@extends('layouts.AdminLayout')
@section('Admin-Contain')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
            style="background-image:url({{ asset('newAdmin/assets') }}/img/icons/spot-illustrations/corner-4.png);">
        </div>
        <div class="card-body position-relative m-3">
            <div class="row flex-between">
                <div class="col-lg-6">
                    <h3> {{ __('validation.Subscription') }} </h3>
                </div>
            </div>

        </div>
    </div>
    <div class="d-flex flex-end my-2 w-100 ">
        <div class="col-auto">
            <button class="add_country_btn btn btn-falcon-info   "> {{ __('validation.Add_Product') }} </button>
        </div>
    </div>

    <div id="tableExample3" class="card  p-3">
        <div class="table-responsive scrollbar">
            <table class="table mb-0 data-table fs--1" id="myTable">
                <thead class="bg-200 text-900">
                    <tr>
                        <th>#</th>
                        <th>{{ __('validation.Descreption_en') }}</th>
                        <th>{{ __('validation.Descreption_ar') }}</th>
                        <th>{{ __('validation.Price') }}</th>
                        <th>{{ __('validation.discount') }}</th>
                        <th>{{ __('validation.most_popular') }}</th>
                        <th>{{ __('validation.details') }}</th>
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
                                <h4 class="mb-1" id="modalExampleDemoLabel"> {{ __('validation.Add_Product') }}</h4>
                            </div>
                            <div class="p-4">

                                <div class="row" style="justify-content:space-evenly">
                                    <div class="col-lg-6 form-Roles mb-3">
                                        <label class="form-label">{{ __('validation.header_en') }}</label>
                                        <input type="text" class="form-control " name="header_en">
                                    </div>
                                    <div class=" col-lg-6 form-Roles mb-3">
                                        <label class="form-label"> {{ __('validation.header_ar') }}</label>
                                        <input type="text" class="form-control " name="header_ar">
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
                                        <label class="form-label"> {{ __('validation.Price') }}</label>
                                        <input type="text" class="form-control " name="price">
                                    </div>
                                    <div class=" col-lg-6 form-Roles mb-3">
                                        <label class="form-label"> {{ __('validation.discount') }}</label>
                                        <input type="number" class="form-control " name="discount">
                                    </div>
                                    <div class=" col-lg-6 form-Roles mb-3">
                                        <label class="form-label"> {{ __('validation.Descreption_en') }}</label>
                                        <textarea class="form-control " name="des_en" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class=" col-lg-6 form-Roles mb-3">
                                        <label class="form-label"> {{ __('validation.Descreption_ar') }}</label>
                                        <textarea class="form-control " name="des_ar" cols="30" rows="10"></textarea>
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
                                <h4 class="mb-1" id="modalExampleDemoLabel">{{ __('validation.Update_Product') }} </h4>
                            </div>
                            <div class="p-4">

                                <div class="row" style="justify-content:space-evenly">
                                    <div class="col-lg-6 form-Roles mb-3">
                                        <label class="form-label">{{ __('validation.header_en') }}</label>
                                        <input type="text" class="form-control " id="header_en" name="header_en">
                                    </div>
                                    <input type="hidden" class="item_id" name="id">
                                    <div class=" col-lg-6 form-Roles mb-3">
                                        <label class="form-label"> {{ __('validation.header_ar') }}</label>
                                        <input type="text" class="form-control " id="header_ar" name="header_ar">
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
                                    <div class="col-lg-6 form-Roles mb-3">
                                        <label class="form-label">{{ __('validation.Price') }}</label>
                                        <input type="text" class="form-control " id="price" name="price">
                                    </div>
                                    <input type="hidden" class="item_id" name="id">
                                    <div class=" col-lg-6 form-Roles mb-3">
                                        <label class="form-label"> {{ __('validation.discount') }}</label>
                                        <input type="number" class="form-control " id="discount" name="discount">
                                    </div>
                                    <div class=" col-lg-6 form-Roles mb-3">
                                        <label class="form-label"> {{ __('validation.Descreption_en') }}</label>
                                        <textarea class="form-control " id="des_en" name="des_en" cols="30" rows="5"></textarea>
                                    </div>
                                    <div class=" col-lg-6 form-Roles mb-3">
                                        <label class="form-label"> {{ __('validation.Descreption_ar') }}</label>
                                        <textarea class="form-control " id="des_ar" name="des_ar" cols="30" rows="5"></textarea>
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

    <div class="modal fade" id="details_model" tabindex="-1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl mt-6" role="document">
            <div class="modal-content border-0">
                <div class="modal-content position-relative">
                    <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                        <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body p-0">
                        <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                            <h4 class="mb-1" id="modalExampleDemoLabel"> {{ __('validation.details') }}</h4>
                        </div>
                        <div class="p-4">
                            <form action="#" method="POST" class="mb-5" id ="add_details"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row align-items-cemter"
                                    style="justify-content:space-evenly;align-items: end;">
                                    <div class="col-lg-5 form-Roles ">
                                        <label class="form-label">{{ __('validation.Descreption_en') }}</label>
                                        <input type="text" class="form-control " name="des_en">
                                        <input type="hidden" class="form-control item_id" name="item_id">
                                    </div>
                                    <div class=" col-lg-5 form-Roles ">
                                        <label class="form-label"> {{ __('validation.Descreption_ar') }}</label>
                                        <input type="text" class="form-control " name="des_ar">
                                    </div>
                                    <div class="col-2">
                                        <button class="btn btn-primary w-100" type="submit">{{ __('validation.save') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <div id="tableExample3" class=" mt-5">
                                <div class="table-responsive scrollbar">
                                    <table class="table mb-0 data-table fs--1" id="myTable2">
                                        <thead class="bg-200 text-900">
                                            <tr>
                                                <th>{{ __('validation.Descreption_en') }}</th>
                                                <th>{{ __('validation.Descreption_ar') }}</th>
                                                <th>{{ __('validation.Actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer mt-3">
                        <button class="btn btn-secondary" type="button"
                            data-bs-dismiss="modal">{{ __('validation.cancel') }} </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" class="item_id_subscreption">
    <script>
        $(document).ready(function() {
            get_data()

            function get_data() {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'GET',
                    dataType: 'json',
                    url: "/admin-Subscription",
                    data: {
                        type: 'subscriptions'
                    },
                    success: function(response) {
                        $('.country_table').html('');
                        $('#myTable').DataTable().destroy();
                        $('#myTable tbody').empty();
                        var select_type = $('.level_select option:selected').val();
                        $.each(response, function(key, item) {
                            var name_ar = item.name_ar ?? '';
                            var name_en = item.name_en ?? '';
                            var most_popular = item.most_popular == 1 ? 'checked' : '';

                            $('.country_table').append('<tr>\
                                                <td class="pt-3 text-center"><i class="fa fa-bars "></i>\
                                                        <span class="h6">#' + item.sort + '</span>\
                                                </td>\
                                                <td class="align-middle name text-nowrap ">\
                                                    <h6 class="m-0 p-0">' + name_en + ' </h6>  \
                                                </td>\
                                                <td class="align-middle name text-nowrap ">\
                                                    <h6 class="m-0 p-0">' + name_ar + ' </h6>  \
                                                </td>\
                                                <td class="align-middle name text-nowrap ">\
                                                    <h6 class="m-0 p-0">' + item.price + ' </h6>  \
                                                </td>\
                                                <td class="align-middle name text-nowrap ">\
                                                    <h6 class="m-0 p-0">' + item.discount +
                                ' </h6>  \
                                                </td>\
                                                <td class=" text-center min-w-100 pt-3">\
                                                    <div class="form-check d-flex flex-center form-switch">\
                                                            <input class="form-check-input new_input" style="width:60px" ' +
                                most_popular + '  value="' + item.id +
                                '" data-id="most_popular"  type="checkbox"> \
                                                    </div>\
                                                </td>\
                                                <td class="min-w-100 pt-3">\
                                                    <div class="d-flex">\
                                                        <button class="btn btn-falcon-info   w-100 me-3 model_details" value="' +
                                item.id +
                                '"> {{ __('validation.details') }} </button>\
                                                    </div>\
                                                </td>\
                                                <td class="min-w-100 pt-3">\
                                                    <div class="d-flex">\
                                                        <button class="btn btn-falcon-info   w-100 me-3 edit_item_model_btn" value="' +
                                item.id +
                                '"> {{ __('validation.update') }} </button>\
                                                        <button class="btn btn-falcon-danger w-100 delete_btn_item" value="' +
                                item.id + '"> {{ __('validation.delete') }}</button>\
                                                    </div>\
                                                </td>\
                                            </tr>\
                                        ')
                            // }
                        });

                        let table = new DataTable('#myTable');
                        reacal()
                    }
                })
            }

            $(document).on('click', '.add_country_btn', function(e) {
                e.preventDefault();
                $('#Add_model').modal('show');
            });

            $('#add_form').submit(function(e) {
                e.preventDefault();
                var data = new FormData(this);
                data.append('type', 'subscriptions')
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "post",
                    url: "/admin-Subscription",
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
                            // Iterate over each field in the errors object
                            $.each(response.errors, function(fieldName, messages) {
                                // Iterate over each error message for the current field
                                $.each(messages, function(index, message) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Validation Error',
                                        text: message,
                                    });
                                });
                            });
                        } else {
                            // If there are no specific field errors, display the general error message
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
                    url: "/admin-Subscription/" + country,
                    success: function(response) {
                        if (response.status == 404) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Sorry',
                                text: response.message,
                            })
                        } else {
                            $('#name_en').val(response.name_en)
                            $('#name_ar').val(response.name_ar)
                            $('#header_en').val(response.header_en)
                            $('#header_ar').val(response.header_ar)
                            $('#des_en').text(response.des_en)
                            $('#des_ar').text(response.des_ar)
                            $('#price').val(response.price)
                            $('#discount').val(response.discount)
                            $('.item_id_subscreption').val(response.id)
                        }

                    }
                })
            });


            $('#country_update_form').submit(function(e) {
                e.preventDefault();
                var country = new FormData(this);
                country.append('_method', 'PATCH')
                var country_id = $('.item_id_subscreption').val()
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "post",
                    url: "/admin-Subscription/" + country_id,
                    dataType: "json",
                    data: country,
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
                            // Iterate over each field in the errors object
                            $.each(response.errors, function(fieldName, messages) {
                                // Iterate over each error message for the current field
                                $.each(messages, function(index, message) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Validation Error',
                                        text: message,
                                    });
                                });
                            });
                        } else {
                            // If there are no specific field errors, display the general error message
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
                    url: "/admin-Subscription/" + item_id,
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
                    url: "/admin-Subscription/" + item_id,
                    data: {
                        id: item_id
                    },
                    success: function(response) {
                        get_data()
                    }
                })
            }


            // details
            function get_details(id) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'get',
                    dataType: 'json',
                    url: "/admin-Subscription/" + id,
                    success: function(response) {
                        $('#myTable2 tbody').html('');
                        $('#myTable2').DataTable().destroy();
                        $('#myTable2 tbody').empty();
                        $('#details_model .item_id').val(response.id)
                        $.each(response.details, function(key, item) {
                            $('#myTable2 tbody').append('<tr>\
                                                <td class="align-middle name text-nowrap ">\
                                                    <input type="text" class="form-control des_en" value="' + item.des_en + '" >\
                                                </td>\
                                                <td class="align-middle name text-nowrap ">\
                                                    <input type="text" class="form-control des_ar" value="' + item.des_ar +
                                '" >\
                                                </td>\
                                                <td class="min-w-100 pt-3">\
                                                    <div class="d-flex">\
                                                        <button class="btn btn-falcon-info   w-100 me-3 update_about" value="' +
                                item.id +
                                '"> {{ __('validation.update') }} </button>\
                                                        <button class="btn btn-falcon-danger w-100 delete_details_btn_item" value="' +
                                item
                                .id + '"> {{ __('validation.delete') }}</button>\
                                                    </div>\
                                                </td>\
                                            </tr>\
                                        ')
                        });
                        let myTable2 = new DataTable('#myTable2');
                    }
                })
            }

            $(document).on('click', '.model_details', function() {
                $('#details_model').modal('show');
                var id = $(this).val()
                get_details(id)
            });


            $('#add_details').submit(function(e) {
                e.preventDefault();
                var data = new FormData(this);
                data.append('type', 'subscription')
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "post",
                    url: "/admin-about",
                    dataType: "json",
                    data: data,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $('#add_details').find('input').val('')
                        get_details(response.id)
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

            $(document).on('click', '.update_about', function() {
                var id = $(this).val();
                var row = $(this).closest('tr');
                var data = {
                    "des_en": row.find('.des_en').val(),
                    "des_ar": row.find('.des_ar').val(),
                    "id": id
                };
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'PATCH',
                    dataType: 'json',
                    url: "/admin-about/" + id,
                    data: data,
                    success: function(response) {
                        get_details(id)
                    }
                })
            });

            $(document).on('click', '.delete_details_btn_item', function() {
                var item_id = $(this).val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'get',
                    dataType: 'json',
                    url: "/admin-about/" + item_id,
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
                                    .des_en + ' !!?',
                                text: '{{ __('validation.revet') }}',
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonText: '{{ __('validation.yes') }}',
                                cancelButtonText: '{{ __('validation.no') }}',
                                reverseButtons: true
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    detele_item_details(response.id)
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

            function detele_item_details(item_id) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'delete',
                    dataType: 'json',
                    url: "/admin-about/" + item_id,
                    data: {
                        id: item_id
                    },
                    success: function(response) {
                        get_details(response.id)
                    }
                })
            }

            function change_postion(old_num, new_num) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "post",
                    url: "/change-sort-Subscription",
                    dataType: "json",
                    data: {
                        old: old_num + 1,
                        new: new_num + 1,
                        type: 'subscriptions',
                    },
                    success: function(response) {
                        if (response.status == 400) {
                            $.each(response.errors, function(key, err_values) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'the ' + key + ' is ' + err_values + '  ',
                                })
                            });
                        } else {
                            get_data()
                        }
                    }
                });
            }

            $("#myTable tbody").sortable({
                cursor: "move",
                placeholder: "sortable-placeholder",
                helper: function(e, tr) {
                    var $originals = tr.children();
                    var $helper = tr.clone();
                    $helper.children().each(function(index) {
                        $(this).width($originals.eq(index).width());
                    });
                    return $helper;
                },
                update: function(event, ui) {
                    // Get the old and new positions of the dragged row
                    var oldIndex = ui.item.data("oldIndex");
                    var newIndex = ui.item.index();
                    change_postion(oldIndex, newIndex)
                    // Update the oldIndex for the next drag event
                    ui.item.data("oldIndex", newIndex);
                },
                start: function(event, ui) {
                    // Store the initial index of the dragged row
                    ui.item.data("oldIndex", ui.item.index());
                }
            }).disableSelection();

            function reacal() {
                $('.form-check :checkbox').change(function() {
                    var status = $(this).prop('checked') == true ? 'on' : 'off'
                    var item_id = $(this).val();
                    var type = $(this).data('id');
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "post",
                        url: "/status-Subscription",
                        data: {
                            id: item_id,
                            status: status,
                            type: type
                        },
                        dataType: "json",
                        success: function(response) {
                            if (response.status == 400) {
                                $.each(response.errors, function(key, err_values) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'error for ' + key,
                                        text: err_values
                                    })
                                });
                            }

                        }
                    });
                });
            }
        });
    </script>
@endsection
