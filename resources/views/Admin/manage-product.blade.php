@extends('layouts.admin')
@section('content')
    <div class="cover-all-content">
        <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
            <h2 class="section-title">Manage <span class="primary-text">Products</span></h2>
            <ul>
                <li><a href="{{ route('products.create') }}" class="btn btn-primary text-uppercase extra-btn-padding-35">Add
                        New</a></li>
            </ul>
        </div>
        <br>
        <br>
        <div class="cover-inner-content">
            <div class="d-flex gap-2 flex-wrap">
                @if (Auth::user()->user_type == 1)
                    <div class="">
                        <div class="form-group m-0 flex-fill">
                            <div class="" style="width:100%;">
                                <select id="roamers" class="select-box" name="roamers">
                                    <option value="0">All Roamer</option>
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
                        </div>
                    </div>
                @endif
                <div class="">
                    <div class="form-group m-0 flex-fill">
                        <div class="" style="width:100%;">
                            <select id="vendors" class="select-box" name="vendors">
                                <option value="0">All Vendor</option>
                                @foreach ($vendors as $vendor)
                                    <option value="{{ $vendor->id }}" <?php if (isset($vendorId)) {
                                        if ($vendorId == $vendor->id) {
                                            echo 'selected';
                                        }
                                    } ?>>
                                        {{ $vendor->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <div class="row g-4">
                <div class="col-lg-3">

                </div>
            </div>

            <div class="datatable-v1 style-pagination">
                <table class="myDataTable display" data-searching="true" data-ordering="true" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Ratings</th>
                            <th>Product Name</th>
                            <th>Brand</th>
                            <th>Seller Sku</th>
                            <th>Roamer</th>
                            <th>Vendor</th>
                            <th>Price</th>
                            <th>Sale Price</th>
                            <th>Proc. Price</th>
                            <th>Total Profit</th>
                            <th>Qty</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th></th>
                            <th>Active</th>
                        </tr>
                    </thead>
                    <tbody id="products">
                        @if ($product != '')
                            @foreach ($product as $pro)
                                <tr>
                                    <td>
                                        #{{ $pro->id }}
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-1">
                                            @foreach (calculateProductRatings($pro->id) as $product)
                                                <i class="material-icons star-clr">
                                                    grade
                                                </i>
                                            @endforeach
                                        </div>
                                        <p class=" opacity-04">{{ count($pro->reviews) }} Reviews</p>
                                    </td>
                                    <td>

                                        <p class=" opacity-04">{{ $pro->name }}</p>

                                    </td>
                                    <td>

                                        <p class=" opacity-04">{{ isset($pro->brand) ? $pro->brand->name : 'No Brand' }}</p>

                                    </td>
                                    <td>
                                        <p class="opacity-04">
                                            {{ getProductSku($pro->id) }}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="opacity-04">
                                            {{ isset($pro->user) ? $pro->user->first_name . ' ' . $pro->user->last_name : '' }}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="opacity-04">
                                            {{ isset($pro->vendor) ? $pro->vendor->name : '' }}
                                        </p>
                                    </td>
                                    <td>
                                        <p class=" opacity-04">
                                            {{-- @php
                                                dd($pro->variants);
                                            @endphp --}}
                                            @if ($pro->varient_attr != null)
                                                @foreach ($pro->varients as $variant)
                                                    {{ $variant->price . ',' }}
                                                @endforeach
                                            @else
                                                {{ $pro->price }}
                                            @endif
                                        </p>
                                    </td>
                                    <td>
                                        <p class=" opacity-04">
                                            @if ($pro->varient_attr != null)
                                                @foreach ($pro->varients as $variant)
                                                    {{ $variant->s_price . ',' }}
                                                @endforeach
                                            @else
                                                {{ $pro->s_price }}
                                            @endif
                                        </p>
                                    </td>
                                    <td>
                                        <p class=" opacity-04">
                                            @if ($pro->varient_attr != null)
                                                @foreach ($pro->varients as $variant)
                                                    {{ $variant->p_price . ',' }}
                                                @endforeach
                                            @else
                                                {{ $pro->p_price }}
                                            @endif
                                        </p>
                                    </td>
                                    <td>
                                        <p class=" opacity-04">
                                            {{ ProductProfit($pro->id) }}
                                        </p>
                                    </td>
                                    <td>
                                        <p class=" opacity-04">
                                            @if ($pro->qty == null)
                                                @foreach ($pro->varients as $variant)
                                                    {{ $variant->qty . ', ' }}
                                                @endforeach
                                            @else
                                                {{ $pro->qty }}
                                            @endif
                                        </p>
                                    </td>
                                    <td>
                                        @if ($pro->in_stock == 1)
                                            <div class="active-status">
                                                <p>Active</p>
                                            </div>
                                        @else
                                            <div class="inactive-status">
                                                <p>In-active</p>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <p class="opacity-04">{{ $pro->created_at }}</p>
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                            data-bs-target="#productEditModal" onclick="editProduct({{ $pro->id }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                <path
                                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                            </svg>
                                        </a>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <label class="cswitch">
                                                <input onchange="changeStockStatus({{ $pro->id }})"
                                                    class="cswitch--input" type="checkbox"
                                                    {{ $pro->in_stock == 1 ? 'checked' : '' }} /><span
                                                    class="cswitch--trigger wrapper"></span>
                                            </label>
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
                                                                <a href="" class="dropdown-item"
                                                                    data-bs-toggle="modal"
                                                                    onclick="getProduct({{ $pro->id }})"
                                                                    data-bs-target="#vendorFilledModal">
                                                                    View Details
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('products.edit', ['product' => $pro->id]) }}"
                                                                    class="dropdown-item">
                                                                    Edit
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>
                {{-- <div class="dataTables_paginate paging_full_numbers">
                    {{ $product->links('pagination::bootstrap-4') }}
                </div> --}}
            </div>
        </div>

        <div class="modal fade" id="vendorFilledModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="card-body pt-4">
                        <div class="modal-header">
                            <h5 class="card-title font-18px">Product <span class=" primary-text">Details</span></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body py-4">
                            <form action="">
                                <div class="row g-2">
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label>Product Name</label>
                                            <input type="text" class="name form-control" placeholder=""
                                                value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Vendor</label>
                                            <input type="text" class="vendor form-control" placeholder=""
                                                value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Price</label>
                                            <input type="text" class="price form-control" placeholder=""
                                                value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>Sale Price</label>
                                            <input type="text" class="sprice form-control" placeholder=""
                                                value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input type="address" class="qty form-control" placeholder="" value=""
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <label class="cswitch">
                                                <input class="cswitch--input status" readonly disabled
                                                    type="checkbox" /><span class="cswitch--trigger wrapper"></span>
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

        <div class="modal fade" id="productEditModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="card-body pt-4">
                        <div class="modal-header">
                            <h5 class="card-title font-18px">Edit <span class=" primary-text">Product</span></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body py-4">
                            <form id="productEditForm">
                                @csrf
                                <div class="row g-2">
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label>Product Name</label>
                                            <input type="text" name="name" id="editname" class="form-control"
                                                placeholder="" value="">
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center gap-4 mb-3">
                                        <div class="">
                                            <label>Flash Sale</label>
                                            <div class="" style="width:100%;">
                                                <input type="checkbox" name="flash_sale" id="editflash">
                                            </div>
                                        </div>
                                        <div class="">
                                            <label>Top Seller</label>
                                            <div class="" style="width:100%;">
                                                <input type="checkbox" name="top_seller" id="editseller">
                                            </div>
                                        </div>
                                        <div class="">
                                            <label>New Arrivals</label>
                                            <div class="" style="width:100%;">
                                                <input type="checkbox" name="new_arrivals" id="editarrivals">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input type="text" name="qty" class="editqty form-control" id="editqty" placeholder=""
                                                value="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">Update</button>
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
            function changeStockStatus(id) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{ route('admindashboad') }}' + '/product/stock-status/' + id,
                    type: "get",
                    success: function(response) {
                        if (response.status == 200) {
                            $('#addsuccesstoaster').addClass('show');
                            $('#title').html(response.title)

                            location.reload(true);
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

            function getProduct(id) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{ route('admindashboad') }}' + '/product/get-details/' + id,
                    type: "get",
                    success: function(response) {
                        if (response.status == 200) {
                            $('.name').val(response.product.name);
                            $('.vendor').val(response.vendor.first_name + ' ' + response.vendor.last_name);
                            $('.price').val(response.product.price);
                            $('.sprice').val(response.product.s_price)
                            $('.address').val(response.product.address);
                            $('.qty').val(response.product.qty);
                            if (response.product.in_stock == 1) {
                                // console.log("open");
                                $('.status').prop("checked", true);
                            } else {
                                $('.status').prop("checked", false);
                            }


                        } else {

                        }

                    }
                })

            }

            // console.log($('#roamers'));
            $('#roamers').on('change', function() {
                // e.preventDefault()

                var roamer = $('#roamers').val();

                window.location.href = '{{ route('admindashboad') }}' + '/products/filter/roamer/' + roamer;

            });

            $('#vendors').on('change', function() {
                // e.preventDefault()

                var vendor = $(this).val();
                window.location.href = '{{ route('admindashboad') }}' + '/products/filter/vendor/' + vendor;

            });

            function editProduct(id) {
                $('#productEditForm').attr('action', '/admin/product/update/'+id);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{ route('admindashboad') }}' + '/product/get-details/' + id,
                    type: "get",
                    success: function(response) {
                        if (response.status == 200) {
                            $('#editname').val(response.product.name);
                            if (response.product.flash_sale == 1) {
                                $('#editflash').attr('checked', 'checked');
                            }
                            else{
                                $('#editflash').attr('checked', false);
                            }
                            if (response.product.new_arrivals == 1) {

                                $('#editseller').attr('checked', 'checked');
                            }
                            else{
                                $('#editseller').attr('checked', false);
                            }
                            if (response.product.top_seller == 1) {
                                $('#editarrivals').attr('checked', 'checked');
                            }
                            else{
                                $('#editarrivals').attr('checked', false);
                            }
                            $('#editqty').val(response.product.qty);
                        } else {

                        }

                    }
                })

            }
        </script>
    @endpush
