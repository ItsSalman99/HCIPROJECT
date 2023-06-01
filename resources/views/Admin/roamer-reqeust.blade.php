@extends('layouts.admin')
@section('content')
    <div class="cover-all-content">
        <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
            <div class="d-flex align-items-center flex-wrap gap-3">
                <h2 class="section-title">Roamers <span class="primary-text">Requests</span></h2>
                {{-- <div class=" position-relative">
                    <input type="search" class="searchRoamer form-control" placeholder="Search">
                    <i class="material-icons position-absolute top-50 translate-middle-y opacity-05" style="right: 10px;">
                        search
                    </i>
                </div> --}}
            </div>
        </div>
        <br>
        <br>
        <div class="cover-inner-content">
            <div class="datatable-v1 style-pagination">
                <table class="myDataTable display" data-searching="true" data-ordering="true" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Province</th>
                            <th>Contact #</th>
                            <th>City</th>
                            <th>Status</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody id="roamers">
                        @foreach ($roamers as $r)
                            <tr id="roamerrow{{ $r->id }}">
                                <td style="color: #0068E2" class=" opacity-07">
                                    <a href="#" data-bs-toggle="modal" onclick="viewRoamer({{ $r->id }})"
                                        data-bs-target="#roamerRequestModal">{{ $r->first_name . ' ' . $r->last_name }}</a>
                                </td>
                                <td>
                                    <p class=" opacity-04">{{ $r->address }}</p>
                                </td>
                                <td>
                                    <p class=" opacity-04">{{ $r->province }}</p>
                                </td>
                                <td>
                                    <p class=" opacity-04">{{ $r->phone }}</p>
                                </td>
                                <td>
                                    <p class=" opacity-04">{{ $r->city }}</p>
                                </td>
                                <td>
                                    @if ($r->is_active == 1)
                                        <div class="active-status">
                                            <p>Active</p>
                                        </div>
                                    @else
                                        <div class="inactive-status">
                                            <p>Pending</p>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-around">
                                        <label class="cswitch">
                                            <a onclick="approveRoamer({{ $r->id }})" href="javascript:void(0)"
                                                data-id="{{ $r->id }}" style="margin-right: 10px;"
                                                id="approve_roamer" class="btn btn-primary ">Add</a>
                                            <a href="{{ route('roamer.reject', ['id' => $r->id]) }}" id="reject_roamer"
                                                class="btn btn-danger ">delete</a>
                                            {{-- <input class="cswitch--input" type="checkbox" checked/><span
                                            class="cswitch--trigger wrapper"></span> --}}
                                        </label>
                                        <div class="cover-table-btn">

                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>




        <!-- Modal -->
        <div class="modal fade" id="roamerRequestModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="card-body pt-4">
                        <div class="modal-header">
                            <h5 class="card-title font-18px">Roamer <span class=" primary-text">Form</span></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body py-4">
                            <form action="">
                                <div class="row g-2">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class=" form-control" placeholder="" id="fname"
                                                value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class=" form-control" placeholder="" id="lname"
                                                value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class=" form-control" placeholder="" value=""
                                                id="email" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Mobile Model.</label>
                                            <input type="text" class=" form-control" placeholder="" id="mobile_model"
                                                value="" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Mobile No.</label>
                                            <input type="text" class=" form-control" placeholder="" id="mobile_no"
                                                value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <br>
                                        <br>
                                        <h4 class=" card-title">Present Address</h4>
                                        <br>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nearby Market</label>
                                            <input type="text" class="nearby_market form-control" placeholder=""
                                                value="" id="nearby_market" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="address" class=" form-control" placeholder="" value=""
                                                id="address" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>City</label>
                                            <input type="text" class=" form-control" placeholder="" value=""
                                                id="city" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Province</label>
                                            <input type="text" class=" form-control" placeholder="" id="province"
                                                value="" readonly>
                                        </div>
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @push('adminscript')
        <script>
            $('.searchRoamer').on('keyup', function(e) {

                e.preventDefault();

                var roamer = $('.searchRoamer').val();
                // console.log(roamer);
                if (roamer == "") {
                    roamer = "undefined";
                }

                // console.log(roamer);

                $.ajax({
                    url: '{{ route('admindashboad') }}' + '/roamers/request/search/' + roamer,
                    type: "get",
                    success: function(response) {
                        if (response.status == 200) {

                            // console.log(response);

                            $('#roamers').html('');
                            $.each(response.roamers, function(key, value) {
                                // console.log(value.is_active);
                                if (value.is_active == 1) {
                                    var tD = '<td><div class="active-status"><p>Active</p></div>';
                                } else {
                                    var tD =
                                        '<td><div class="inactive-status"><p>In-Active</p></div></td>';
                                }
                                $('#roamers').append('<tr id="roamerrow' + value.id + '">' +
                                    '<td style="color: #0068E2" class=" opacity-07"><a href="#" data-bs-toggle="modal" onclick="viewRoamer(' +
                                    value.id + ')"' +
                                    'data-bs-target="#roamerRequestModal">' + value.first_name +
                                    ' ' + value.last_name +
                                    '</a></td><td><p class=" opacity-04">' + value.address +
                                    '</p></td>' +
                                    '<td><p class=" opacity-04">' + value.province +
                                    '</p></td><td><p class=" opacity-04">' + value.phone +
                                    '</p></td>' +
                                    '<td><p class=" opacity-04">' + value.city + '</p></td>' +
                                    tD +
                                    '<td><div class="d-flex align-items-center justify-content-around">' +
                                    '<label class="cswitch"><a href="" data-id="' + value.id +
                                    '" style="margin-right: 10px;" id="approve_roamer" class="btn btn-primary ">Add</a>' +
                                    '<a href="" data-id="' + value.id +
                                    '" id="reject_roamer" class="btn btn-danger ">delete</a></label><div class="cover-table-btn"></div></div></td></tr>'
                                    );

                            });



                        } else {

                        }

                    }
                })

            });

            function viewRoamer(id) {

                $.ajax({
                    url: '{{ route('admindashboad') }}' + '/roamer/view-modal/' + id,
                    method: 'get',
                    success: function(response) {
                        if (response.status == 200) {
                            console.log(response);
                            $('#fname').val(response.data.first_name)
                            $('#lname').val(response.data.last_name)
                            $('#mobile_model').val(response.data.mobile_model)
                            $('#mobile_no').val(response.data.phone)
                            $('#email').val(response.data.email)
                            $('#nearby_market').val(response.data.nearby_market)
                            $('#address').val(response.data.address)
                            $('#city').val(response.data.city)
                            $('#province').val(response.data.province)

                        }
                    }
                })
            }
        </script>
        <script type="text/javascript">
            $('body').on('click', '.is_activebtn', function(e) {
                var id = $(this).data('id');
                var value = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: 'roamer-approval' + id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(d) {
                        $('#roamerrow' + id).remove();
                        alert(d);
                        // categories_table.ajax.reload();
                    }
                })
            });

            function approveRoamer(id) {

                $.ajax({
                    url: 'roamer-approval/' + id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        $('#addsuccesstoaster').addClass('show');
                        $('#title').html(response.msg)
                        // categories_table.ajax.reload();
                    }
                })

                setTimeout(function() {
                    $('#addsuccesstoaster').removeClass('show');
                    window.location.href = '';
                }, 1000);
            }

            // $('#approve_roamer').click(function(e) {
            //     e.preventDefault();
            //     var id = $(this).attr('data-id');
            //     console.log(' id : '+id);

            // });

            // $('#reject_roamer').click(function(e) {
            //     e.preventDefault();
            //     var id = $(this).attr('data-id');
            //     //
            //     $.ajaxSetup({
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         }
            //     });
            //     $.ajax({
            //         url: 'roamer-reject/' + id,
            //         type: 'GET',
            //         dataType: 'json',
            //         success: function(d) {
            //             $('#roamerrow' + id).remove();
            //             alert(d.msg);
            //             // categories_table.ajax.reload();
            //         }
            //     })
            // });

            $(".toggle-password").click(function() {
                $(this).toggleClass("bi-eye bi-eye-slash-fill");
                var input = $($(this).attr("toggle"));
                if (input.attr("type") == "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });
        </script>
    @endpush
