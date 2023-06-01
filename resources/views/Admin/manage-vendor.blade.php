@extends('layouts.admin')
@section('content')
    <div class="cover-all-content">
        @if (checkRoamerVendors(Auth::user()->id))
            <div class="alert alert-warning p-4 alert-dismissible fade show shadow-sm d-flex gap-4" role="alert">
                <div>
                    <i class="bi bi-exclamation-square-fill" style="font-size: 40px;"></i>
                </div>
                <div>
                    <h4 class="alert-heading">Welcome {{ Auth::user()->getName() }}!</h4>
                    <p class="m-0">
                        Dear {{ Auth::user()->getName() }}! welcome to your dashboard.
                        To continue selling and access all roamer features of your Bazar dashboard,
                        please fill out your account details and add a vendor and a product first.
                    </p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
            <div class="d-flex align-items-center flex-wrap gap-3">
                <h2 class="section-title">Manage <span class="primary-text">Vendors</span></h2>

                @if (Auth::user()->user_type == 1)
                    <div class=" position-relative">
                        <select class="select-box" id="roamerID" name="roamer_id">
                            <option value="0">All Vendor</option>
                            @foreach ($roamers as $roamer)
                                <option value="{{ $roamer->id }}" <?php if (isset($roamerId)) {
                                    if ($roamerId == $roamer->id) {
                                        echo 'selected';
                                    }
                                } ?>>
                                    {{ $roamer->first_name . ' ' . $roamer->last_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endif
            </div>
        </div>
        <br>
        <br>
        <div class="cover-inner-content">
            <div class="row g-4">

            </div>

            <div class="datatable-v1 style-pagination">
                <table class="myDataTable display" data-searching="true" data-ordering="true" style="width:100%">
                    <thead>
                        <tr>
                            <th>V_ID</th>
                            <th>Name</th>
                            <th>Contact #</th>
                            <th>Address</th>
                            <th>Holiday Mode</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody id="vendors">
                        @foreach ($data as $vendor)
                            <tr>
                                <td class=" opacity-07">#{{ $vendor->id }}</td>

                                <td style="color: #0068E2" class=" opacity-07">
                                    <a href="javascript:void(0)" onclick="getVendor({{ $vendor->id }})"
                                        data-bs-toggle="modal" data-bs-target="#vendorFilledModal">
                                        {{ $vendor->name }}
                                    </a>
                                </td>
                                <td>
                                    <p class=" opacity-04">{{ $vendor->contact1 }}</p>
                                </td>

                                <td style="color: #0068E2" class=" opacity-07">
                                    {{ $vendor->address }}
                                </td>
                                <td>
                                    <label class="cswitch">
                                        <input onchange="changeHolidayStatus({{ $vendor->id }})" class="cswitch--input"
                                            type="checkbox" <?php if ($vendor->holiday_mode == 1) {
                                                echo 'checked';
                                            } ?> /><span
                                            class="cswitch--trigger wrapper"></span>
                                    </label>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-end">
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
                                                            <a href="javascript:void(0)" class="dropdown-item"
                                                                onclick="getProduct({{ $vendor->id }})"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#productDetailModal">Products Detail </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0)" class="dropdown-item"
                                                                onclick="getVendor({{ $vendor->id }})"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#vendorFilledModal">Detail </a>
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
        <div class="modal fade" id="vendorFilledModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="card-body pt-4">
                        <div class="modal-header">
                            <h5 class="card-title font-18px">Vendor <span class=" primary-text">Details</span></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body py-4">
                            <form action="">
                                <div class="row g-2">
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label>Vendor Name</label>
                                            <input type="text" class="name form-control" placeholder="" value=""
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Shop Name</label>
                                            <input type="text" class="shop form-control" placeholder="" value=""
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Mobile No.</label>
                                            <input type="text" class="contact form-control" placeholder=""
                                                value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>Nearby Market</label>
                                            <input type="text" class="market form-control" placeholder=""
                                                value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="address" class="address form-control" placeholder=""
                                                value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Contact#1</label>
                                            <input type="text" class="con1 form-control" placeholder=""
                                                value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Contact#2</label>
                                            <input type="text" class="con2 form-control" placeholder=""
                                                value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Contact#3</label>
                                            <input type="text" class="con3 form-control" placeholder=""
                                                value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Contact#4</label>
                                            <input type="text" class="con4 form-control" placeholder=""
                                                value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Holiday Mode</label>
                                            <label class="cswitch">
                                                <input class="cswitch--input holiday" readonly type="checkbox" /><span
                                                    class="cswitch--trigger wrapper"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="productDetailModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="card-body pt-4">
                        <div class="modal-header">
                            <h5 class="card-title font-18px">Vendor <span class=" primary-text">Product Details</span>
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body py-4">
                            <table class=" table ">
                                <thead>
                                    <tr>
                                        <th class=" font-weight-600 opacity-08">Name</th>
                                        <th>Price</th>
                                        <th>Variant</th>
                                    </tr>
                                </thead>
                                <tbody id="appendProducts">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection


    @push('adminscript')
        <script>
            function changeHolidayStatus(id) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{ route('admindashboad') }}' + '/vendor/holiday-status/' + id,
                    type: "get",
                    success: function(response) {
                        if (response.status == 200) {
                            $('#addsuccesstoaster').addClass('show');
                            $('#title').html("Holiday Status has been changed!")

                        } else {
                            $('#addsuccesstoaster').addClass('show');
                            $('#title').html("Something went wrong!")
                        }

                    }

                })
                setTimeout(function() {
                    $('#addsuccesstoaster').removeClass('show')
                }, 1000);

            }

            function getVendor(id) {

                console.log(id);


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{ route('admindashboad') }}' + '/vendor/details/' + id,
                    type: "get",
                    success: function(response) {
                        if (response.status == 200) {
                            $('.name').val(response.vendor.name);
                            $('.shop').val(response.vendor.shop_name);
                            $('.contact').val(response.vendor.contact1);
                            $('.profits').val(response.vendor.profits);
                            $('.market').val(response.vendor.nearby_market)
                            $('.address').val(response.vendor.address);
                            $('.con1').val(response.vendor.contact1);
                            $('.con2').val(response.vendor.contact2);
                            $('.con3').val(response.vendor.contact3);
                            $('.con4').val(response.vendor.contact4);
                            if (response.vendor.holiday_mode == 1) {
                                // console.log("open");
                                $('.holiday').prop("checked", true);
                            } else {
                                $('.holiday').prop("checked", false);
                            }


                        } else {

                        }

                    }
                })

            }

            $('.searchVendor').on('keyup', function(e) {

                e.preventDefault();

                var vendor = $('.searchVendor').val();

                if (vendor == "") {
                    vendor = "undefined";
                }

                $.ajax({
                    url: '{{ route('admindashboad') }}' + '/vendors/search/' + vendor,
                    type: "get",
                    success: function(response) {
                        if (response.status == 200) {

                            // console.log(response.roamer.address);

                            $('#vendors').html('');
                            $.each(response.vendors, function(key, value) {
                                // console.log(value.id);
                                if (value.holiday_mode == 1) {
                                    var check = 'checked';
                                } else {
                                    var check = '';
                                }
                                $('#vendors').append('<tr><td class=" opacity-07">#' + value.id +
                                    '</td>' +
                                    '<td style="color: #0068E2" class=" opacity-07">' + value
                                    .name + '</td>' +
                                    '<td><p class=" opacity-04">' + value.contact1 +
                                    '</p></td><td style="color: #0068E2" class=" opacity-07">' +
                                    value.address + '</td>' +
                                    '<td><label class="cswitch"><input onchange="changeHolidayStatus(' +
                                    value.id + ')" class="cswitch--input" type="checkbox"' +
                                    check +
                                    '/><span class="cswitch--trigger wrapper"></span></label></td>' +
                                    '<td><div class="d-flex align-items-center justify-content-end"><div class="cover-table-btn"><ul><li class="dropdown position-relative"><a href="javascript:void(0)" class="dropdown-toggle caret-none" data-bs-toggle="dropdown" role="button" id="navbarDropdown"><i class="material-icons">more_vert</i></a>' +
                                    '<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown"><li><a href="javascript:void(0)" class="dropdown-item" data-bs-toggle="modal" onclick="getVendor(' +
                                    value.id +
                                    ')" data-bs-target="#vendorFilledModal">Detail </a> </li></ul>' +
                                    '</li></ul></div></div></td></tr>');

                            });



                        } else {

                        }

                    }
                })

            });
        </script>
        <script>
            $('#roamerID').on('change', function(e) {

                var id = $('#roamerID option:selected').val();

                console.log(id);

                window.location.href = '{{ route('admindashboad') }}' + '/vendors/by-roamer/' + id

            })
        </script>
        <script>
            function getProduct(id) {
                var price = [];
                $.ajax({
                    url: '/vendor/getProducts/' + id,
                    method: 'GET',
                    success: function(response) {
                        $('#appendProducts').empty();
                        $.each(response.data, function(key, value) {
                            if (value.varients.length > 0) {
                                $.each(value.varients, function(k, v) {
                                    price += v.price + ', ';
                                })
                            } else {
                                price += value.price
                            }

                            $('#appendProducts').append(
                                '<tr><td><h6 class=" primary-text opacity-1 font-weight-500 m-0 text-capitalize">' +
                                value.name + '</h6></td>' +
                                '<td class=" opacity-06">' + price + '</td>' +
                                '<td class=" opacity-06">' + value.varients.length + '</td></tr>');
                            price = []
                        });
                    }
                })
            }
        </script>
    @endpush
