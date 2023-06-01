@extends('layouts.admin')
@section('content')
    <div class="cover-all-content">
        <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
            <div class="d-flex align-items-center flex-wrap gap-3">
                <h2 class="section-title">Manage <span class="primary-text">Coupon</span></h2>
            </div>
            <ul>
                <li><a href="#." class="btn btn-primary text-uppercase extra-btn-padding-20" data-bs-toggle="modal"
                        data-bs-target="#addcoupenmodal" onclick="getCat()">Add Coupon</a></li>
            </ul>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="cover-inner-content">
            <div class="datatable-v1 style-pagination">
                <table class="myDataTable display" data-searching="true" data-ordering="true" style="width:100%">
                    <thead>
                        <th>#</th>
                        <th>Coupon Name</th>
                        <th>Coupon Code </th>
                        <th>Category On</th>
                        <th>Discount</th>
                        <th>Total Users</th>
                        <th>Total Users Used</th>
                        <th>Total Uses</th>
                        <th>Expiry</th>
                        <th>Status</th>
                        <th>Action</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($coupen as $key => $coupens)
                            <tr>
                                <td>
                                    <div>
                                        <p>#{{ $key + 1 }}</p>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <div class="d-flex align-items-center gap-2">
                                            <p>{{ $coupens->coupen_name }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <p>{{ $coupens->coupen_code }}</p>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <p>{{ $coupens->category->name }}</p>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <p>
                                            @if ($coupens->discount != '')
                                                {{ $coupens->discount }} Rs
                                            @else
                                                {{ $coupens->discount_percentage }} %
                                            @endif
                                        </p>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <p>{{ $coupens->total_users }}</p>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        @if ($coupens->coupen_users_used == 0 || $coupens->coupen_users_used == null)
                                            <p>0</p>
                                        @else
                                            <p>{{ $coupens->coupen_users_used }}</p>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <p>{{ $coupens->total_uses }}</p>
                                    </div>
                                </td>
                                <td>
                                    @if ($coupens->expiry != 0)
                                        <div>
                                            <p>
                                                {{ $coupens->expiry }}
                                            </p>
                                        </div>
                                    @else
                                        <div>
                                            <p>
                                                Forever
                                            </p>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div>
                                        <label class="cswitch">
                                            <input onchange="changeStatus({{ $coupens->id }})" class="cswitch--input"
                                                type="checkbox" {{ $coupens->status == 'active' ? 'checked' : '' }} /><span
                                                class="cswitch--trigger wrapper"></span>
                                        </label>
                                    </div>
                                </td>
                                <td>
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
                                                        <a href="{{ route('admin.coupen.edit', ['id' => $coupens->id]) }}"
                                                            class="dropdown-item">
                                                            Edit
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('admin.coupen.delete', ['id' => $coupens->id]) }}"
                                                            class="dropdown-item">
                                                            Delete
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br><br><br><br><br><br><br>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="addcoupenmodal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="card-body pt-4">
                        <div class="modal-header">
                            <h5 class="card-title font-18px">Add <span class=" primary-text">Coupon</span></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body py-4">
                            <form action="{{ route('admin.coupen.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="mb-3">Coupon Name</label>
                                    <div class=" position-relative">
                                        <input type="text" placeholder="Coupon Name" name="coupen_name"
                                            class="form-control" style="padding-right: 60px;">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="" class="mb-3">Coupon Code</label>
                                    <div class=" position-relative">

                                        <input type="text" placeholder="Coupon Code" name="coupen_code"
                                            class="form-control" style="padding-right: 60px;">
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-5 mb-2">
                                    <div class="form-check d-flex align-items-center gap-2 primary-checkbox">
                                        <input class="form-check-input mt-0" type="radio" name="check_discount"
                                            id="cdiscount1" value="1">
                                        <label class="form-check-label m-0" for="flexRadioDefault1">
                                            Fix
                                        </label>
                                    </div>
                                    <div class="form-check d-flex align-items-center gap-2 primary-checkbox">
                                        <input class="form-check-input mt-0" type="radio" name="check_discount"
                                            id="cdiscount2" value="0">
                                        <label class="form-check-label m-0" for="flexRadioDefault2">
                                            Percentage%
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group" id="discount">

                                </div>
                                <div class="form-group">
                                    <label for="" class="mb-3">Categories</label>
                                    <div class=" position-relative">
                                        <select name="category" id="categoryID" class="form-control" required>
                                            <option value="">Select Categories</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="mb-3">Total Users</label>
                                    <div class=" position-relative">
                                        <input type="number" placeholder="Total Users" name="total_users"
                                            class="form-control" style="padding-right: 60px;">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="mb-3">Total Uses</label>
                                    <div class=" position-relative">
                                        <input type="number" placeholder="Total Uses" name="total_use"
                                            class="form-control" style="padding-right: 60px;">
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-5 mb-2">
                                    <div class="form-check d-flex align-items-center gap-2 primary-checkbox">
                                        <input class="form-check-input mt-0" type="radio" name="expiry"
                                            id="expiry2" value="0" checked>
                                        <label class="form-check-label m-0" for="flexRadioDefault2">
                                            Forever
                                        </label>
                                    </div>
                                    <div class="form-check d-flex align-items-center gap-2 primary-checkbox">
                                        <input class="form-check-input mt-0" type="radio" name="expiry"
                                            id="expiry1" value="1">
                                        <label class="form-check-label m-0" for="flexRadioDefault1">
                                            Have Expiry
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group" id="expiry">
                                    {{-- <div>
                                        <input type="datetime-local" name="expiry" class="form-control" placeholder="Select Expiry Date">
                                    </div> --}}
                                </div>
                                <div class="form-group">
                                    <label for="" class="mb-3">Status</label>
                                    <div class=" position-relative">
                                        <select name="status" class="form-control">
                                            <option value="">Select Status</option>
                                            <option value="active">Active</option>
                                            <option value="deactive">Deactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="text-center mt-5">
                                    <button type="submit" class="btn btn-primary extra-btn-padding-45 text-uppercase">
                                        Add To list
                                    </button>
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
            //Discounts Check
            $('#cdiscount1').on('click', function() {
                $('#discount').html('');
                $('#discount').append(
                    '<label for="" class="mb-3">Discount Amount</label><div class=" position-relative">' +
                    '<input placeholder="Discount Fix Amount" type="text" name="discount_amount" class="form-control" required></div>'
                )
            });
            $('#cdiscount2').on('click', function() {
                $('#discount').html('');
                $('#discount').append('<label for="" class="mb-3">Discount%</label><div class=" position-relative">' +
                    '<input placeholder="Discount %" type="text" name="discount_percentage" class="form-control" required></div>'
                )
            });

            //Expiry Check
            $('#expiry1').on('click', function() {
                $('#expiry').html('');
                $('#expiry').append(
                    '<div><input type="datetime-local" name="expiry" class="form-control" placeholder="Select Expiry Date"></div>'
                )
            });
            $('#expiry2').on('click', function() {
                $('#expiry').html('');

            });


            function getCat() {
                $.ajax({
                    url: '{{ route('catlog.getAll') }}',
                    method: 'GET',
                    success: function(response) {
                        $.each(response.data, function(key, value) {
                            $('#categoryID').append('<option value="' + value.id + '">' + value.name +
                                '</option>')
                        })
                    }
                })
            }

            function changeStatus(id) {
                window.location.href = '/admin/coupen/changeStatus/' + id;
            }
        </script>
    @endpush
