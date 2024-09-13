@extends('layouts.AdminLayout')
@section('Admin-Contain')
<div class="card mb-3">
    <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url({{asset('newAdmin/assets')}}/img/icons/spot-illustrations/corner-4.png);">
    </div>
        <div class="card-body position-relative m-3">
            <div class="row flex-between">
                <div class="col-lg-6">
                    <h3> {{__('validation.Contact')}} </h3>
                </div>
            </div>

        </div>
</div>

<div id="tableExample3" class="card  p-3">
    <div class="table-responsive scrollbar">
      <table class="table mb-0 data-table fs--1" id="myTable">
        <thead class="bg-200 text-900">
          <tr>
            <th>{{__('validation.Product')}}</th>
            <th>{{__('validation.Budget')}}</th>
            <th>{{__('validation.name')}}</th>
            <th>{{__('validation.email')}}</th>
            <th>{{__('validation.phone')}}</th>
            <th>{{__('validation.Message')}}</th>
            <th>{{__('validation.Create_at')}} </th>
          </tr>
        </thead>
        <tbody class="list country_table">

        </tbody>
      </table>
    </div>
</div>
<div class="modal fade"  id="item_modal_update"  tabindex="-1"  tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg mt-6" role="document">
        <div class="modal-content border-0">
            <div class="modal-content position-relative">
                <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#"  id="country_update_form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-0">
                        <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                            <h4 class="mb-1" id="modalExampleDemoLabel">{{__('validation.Message')}} </h4>
                        </div>
                        <div class="p-4">

                            <div class="row" style="justify-content:space-evenly">
                                <h6 class="message"></h6>
                                <p class="content text-break"></p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">{{__('validation.cancel')}} </button>
                    </div>
            </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
            get_data()
            function get_data() {
                $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    type: 'GET',
                    dataType: 'json',
                    url: "/admin-contact",
                    success: function (response) {
                        $('.country_table').html('');
                        $('#myTable').DataTable().destroy();
                        $('#myTable tbody').empty();
                        $.each(response, function (key, item) {
                            $('.country_table').append('<tr>\
                                <td class="align-middle name text-nowrap ">\
                                    <h6 class="m-0 p-0">' + item.item.name_en + '</h6>\
                                </td>\
                                <td class="align-middle name text-nowrap ">\
                                    <h6 class="m-0 p-0">$' + item.budget + '</h6>\
                                </td>\
                                <td class="align-middle name text-nowrap ">\
                                    <h6 class="m-0 p-0">' + item.name + '</h6>\
                                </td>\
                                <td class="align-middle name text-nowrap ">\
                                    <h6 class="m-0 p-0">' + item.email + '</h6>\
                                </td>\
                                <td class="align-middle name text-nowrap ">\
                                    <h6 class="m-0 p-0">' + item.phone + '</h6>\
                                </td>\
                                <td class="align-middle name text-nowrap ">\
                                    <button class="btn btn-falcon-info   w-100 me-3 edit_item_model_btn" value="'+item.id+'"> {{__('validation.Message')}} </button>\
                                </td>\
                                <td class="align-middle name text-nowrap ">\
                                    <h6>'+moment(item.created_at).format('YYYY-MM-DD , h:mm:ss A ')+'</h6> \
                                </td>\
                            </tr>');
                        });

                        $('#myTable').DataTable();
                    }
                });
            }

            $(document).on('click','.edit_item_model_btn',function(){
                $('#item_modal_update').modal('show');
                var country = $(this).val()
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type:'get',
                    dataType: 'json',
                    url :"/admin-contact/"+country,
                    success:function(response){
                        if(response.status == 404)
                        {
                            Swal.fire({
                                    icon: 'error',
                                    title: 'Sorry',
                                    text: response.message,
                            })
                        }
                        else{
                            $('#item_modal_update .content').text(response.content)
                        }

                    }
                })
            });


    });
</script>

@endsection
