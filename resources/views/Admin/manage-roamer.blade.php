@extends('layouts.admin')
@section('content')
    <div class="cover-all-content">
        <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
            <div class="d-flex align-items-center flex-wrap gap-3">
                <h2 class="section-title">Manage <span class="primary-text">Roamers</span></h2>
                <!--<div class=" position-relative">-->
                <!--    <input type="search" class="form-control searchRoamer" placeholder="Search">-->
                <!--    <i class="material-icons position-absolute top-50 translate-middle-y opacity-05" style="right: 10px;">-->
                <!--        search-->
                <!--    </i>-->
                <!--</div>-->
            </div>
            <ul>
                {{-- <li><a href="#" class="btn btn-primary text-uppercase extra-btn-padding-20">Add New Roamer</a></li> --}}
            </ul>
        </div>
        <br>
        <br>
        <div class="cover-inner-content">
            <div class="datatable-v1 style-pagination">
                <table class="myDataTable display" data-searching="true" data-ordering="true" style="width:100%">
                    <thead>
                        <tr>
                            <th>R_ID</th>
                            <th>Name</th>
                            <th>Profit </th>
                            <th>Contact #</th>
                            <th>WhatsApp Contact #</th>
                            <th>City</th>
                            <th>Province</th>
                            <th>Active Products</th>
                            <th>Status</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody id="roamers">
                        @foreach ($roamers as $i => $roamer)
                            <tr>
                                <td class=" opacity-07">#{{ $roamer->id }}</td>
                                <td style="color: #0068E2" class=" opacity-07">
                                    <a href="#" onclick="getRoamer({{ $roamer->id }})" data-bs-toggle="modal"
                                        data-bs-target="#roamerFilledModal">
                                        {{ $roamer->first_name . ' ' . $roamer->last_name }}
                                    </a>

                                </td>

                                <td>
                                    <p class=" opacity-04">
                                        {{ number_format(calculateOrderSumAmount($roamer->id) - calculateTransactionExpenseCount($roamer->id)) }}
                                    </p>
                                </td>
                                <td>
                                    <p class=" opacity-04">{{ $roamer->phone }}</p>
                                </td>
                                <td>
                                    <p class=" opacity-04">{{ $roamer->whatsapp_phone }}</p>
                                </td>
                                <td>
                                    <p class=" opacity-04">{{ $roamer->city }}</p>
                                </td>
                                <td>
                                    <p class=" opacity-04">{{ $roamer->province }}</p>
                                </td>
                                <td style="color: #0068E2" class=" opacity-07">
                                    {{ count($roamer->product) }}
                                </td>
                                <td>
                                    @if ($roamer->is_active)
                                        <div class="active-status">
                                            <p>Active</p>
                                        </div>
                                    @else
                                        <div class="inactive-status">
                                            <p>In-Active</p>
                                        </div>
                                    @endif

                                </td>
                                <td>
                                    <label class="cswitch">
                                        <input onchange="changeStatus({{ $roamer->id }})" class="cswitch--input"
                                            type="checkbox" <?php if ($roamer->is_active == 1) {
                                                echo 'checked';
                                            } ?> /><span
                                            class="cswitch--trigger wrapper"></span>
                                    </label>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-end">
                                        {{-- <div class="process-status">
                                            <a href="#.">
                                                <p>Roamers List</p>
                                            </a>
                                        </div> --}}

                                        <div class="cover-table-btn">
                                            <ul>
                                                <li class="dropdown position-relative">
                                                    <a href="javascript:void(0)" class="dropdown-toggle caret-none"
                                                        data-bs-toggle="dropdown" role="button" id="navbarDropdown"><i
                                                            class="material-icons">
                                                            more_vert
                                                        </i></a>
                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                        aria-labelledby="navbarDropdown">
                                                        <li>
                                                            <a class="dropdown-item"
                                                                onclick="getRoamer({{ $roamer->id }})"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#roamerFilledModal">Detail </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
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
        <div class="modal fade" id="roamerFilledModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="card-body pt-4">
                        <div class="modal-header">
                            <h5 class="card-title font-18px">Roamer <span class=" primary-text">Details</span></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body py-4">
                            <form action="">
                                <div class="row g-2">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" id="fname" class="fname form-control" placeholder=""
                                                value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" id="lname" class="lname form-control" placeholder=""
                                                value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" id="email" class="email form-control" placeholder=""
                                                value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Mobile Model.</label>
                                            <input type="text" id="mob_brand" class="mob_brand form-control"
                                                placeholder="" value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Mobile No.</label>
                                            <input type="text" id="mob_no" class="mob_no form-control"
                                                placeholder="" value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Province</label>
                                            <input type="text" id="province" class="province form-control"
                                                placeholder="" value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>City</label>
                                            <input type="text" id="city" class="city form-control"
                                                placeholder="" value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nearby Market</label>
                                            <input type="text" id="nearby_market" class="nearby_market form-control"
                                                placeholder="" value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="address" id="address" class="address form-control"
                                                placeholder="" value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>CNIC Name</label>
                                            <input type="text" id="nicName" class="nicName form-control"
                                                placeholder="" value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>CNIC Number</label>
                                            <input type="text" id="nicNumber" class="nicNumber form-control"
                                                placeholder="" value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Bank Account Title</label>
                                            <input type="text" id="acountTitle" class="acountTitle form-control"
                                                placeholder="" value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Bank Account Number</label>
                                            <input type="text" id="acountNumber" class="acountNumber form-control"
                                                placeholder="" value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Bank Name</label>
                                            <input type="text" id="bankName" class="bankName form-control"
                                                placeholder="" value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>IBAN</label>
                                            <input type="text" id="iban" class="iban form-control"
                                                placeholder="" value="" readonly>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center flex-wrap gap-2">
                                        <div class="upload-image-box-v1">
                                            <a id="pImage1Link" href="" download>
                                                <label for="productimage1">
                                                    CNIC FRONT
                                                    <img id="pImage1" alt="">
                                                </label>
                                            </a>
                                        </div>
                                        <div class="upload-image-box-v1">
                                            <a id="pImage2Link" href="" download>
                                                <label for="productimage2">
                                                    CNIC BACK
                                                    <img id="pImage2" alt="">
                                                </label>
                                            </a>
                                        </div>
                                        <div class="upload-image-box-v1">
                                            <a id="pImage3Link" href="" download>
                                                <label for="productimage3">
                                                    CHECK BOOK IMAGE
                                                    <img id="pImage3" alt="">
                                                </label>
                                            </a>
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
        <script type="text/javascript">
            // $(document).ready({
            //     $('#DataTables_Table_0_paginate').css('visibility', 'hidden');
            // });
            $('#approve_roamer').click(function(e) {
                e.preventDefault();
                var id = $(this).attr('data-id');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: 'roamer-approval/' + id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(d) {
                        $('#roamerrow' + id).remove();
                        alert(d.msg);
                        // categories_table.ajax.reload();
                    }
                })
            });
            $('#reject_roamer').click(function(e) {
                e.preventDefault();
                var id = $(this).attr('data-id');
                //
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: 'roamer-reject/' + id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(d) {
                        $('#roamerrow' + id).remove();
                        alert(d.msg);
                        // categories_table.ajax.reload();
                    }
                })
            });
            $(".toggle-password").click(function() {
                $(this).toggleClass("bi-eye bi-eye-slash-fill");
                var input = $($(this).attr("toggle"));
                if (input.attr("type") == "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });

            function getRoamer(roamerid) {
                // e.preventDefault();

                var id = roamerid;
                console.log(id);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{ route('admindashboad') }}' + '/roamer/details/' + id,
                    type: "get",
                    success: function(response) {
                        if (response.status == 200) {
                            console.log(response.roamer.address);
                            $('.roamer').html()
                            $('.fname').val(response.roamer.first_name);
                            $('.lname').val(response.roamer.last_name);
                            $('.mob_brand').val(response.roamer.mobile_model);
                            $('.mob_no').val(response.roamer.phone);
                            $('.email').val(response.roamer.email);
                            $('.products').val(response.productscount)
                            $('.province').val(response.roamer.province);
                            $('.city').val(response.roamer.city);
                            $('.address').val(response.roamer.address);
                            $('.nearby_market').val(response.roamer.nearby_market)
                            $('.nicName').val(response.roamer.cnic_name)
                            $('.nicNumber').val(response.roamer.cnic_number)
                            $('.acountTitle').val(response.roamer.account_title)
                            $('.acountNumber').val(response.roamer.account_number)
                            $('.bankName').val(response.roamer.bank_name)
                            $('.iban').val(response.roamer.IBAN)

                            $('#pImage1Link').attr('href', response.roamer.cnic_front_img)
                            $('#pImage1').attr('src', response.roamer.cnic_front_img)
                            $('#pImage2Link').attr('href', response.roamer.cnic_back_img)
                            $('#pImage2').attr('src', response.roamer.cnic_back_img)
                            $('#pImage3Link').attr('href', response.roamer.cheque_img)
                            $('#pImage3').attr('src', response.roamer.cheque_img)

                        } else {

                        }

                    }
                })
            }

            $('.searchRoamer').on('keyup', function(e) {

                e.preventDefault();

                var roamer = $('.searchRoamer').val();

                if (roamer == "") {
                    roamer = "undefined";
                }

                $.ajax({
                    url: '{{ route('admindashboad') }}' + '/roamers/search/' + roamer,
                    type: "get",
                    success: function(response) {
                        if (response.status == 200) {

                            // console.log(response.roamer.address);

                            $('#roamers').html('');
                            // if (value.is_active == 1) {
                            //     var tD = '<td><div class="active-status"><p>Active</p></div>';
                            // } else {
                            //     var tD =
                            //         '<td><div class="inactive-status"><p>In-Active</p></div></td>';
                            // }

                            // var id = value.id;

                            $('#roamers').append(
                                response.body
                            );




                        } else {

                        }

                    }
                })

            });
        </script>
        <script>
            function changeStatus(id) {
                $.ajax({
                    url: '{{ route('admindashboad') }}' + '/roamer-active/' + id,
                    method: 'GET',
                    success: function(response) {
                        $('#addsuccesstoaster').addClass('show');
                        $('#title').html("Roamer Status Has Been Changed!")

                        location.reload(true);
                    }
                })
                setTimeout(function() {
                    $('#addsuccesstoaster').removeClass('show')
                }, 1000);
            }
        </script>
    @endpush
