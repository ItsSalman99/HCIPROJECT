@extends('layouts.admin')
@section('content')
    <div class="cover-all-content">
        <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
            <div class="d-flex align-items-center flex-wrap gap-3">
                <h2 class="section-title">Edit <span class="primary-text">Coupon</span></h2>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="cover-inner-content">
            <div class="container">
                <form action="{{ route('admin.coupen.update', ['id' => $coupon->id]) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="" class="mb-3">Coupon Name</label>
                        <div class=" position-relative">
                            <input type="text" placeholder="Coupon Name" name="coupen_name" class="form-control"
                                value="{{ $coupon->coupen_name }}" style="padding-right: 60px;">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="" class="mb-3">Coupon Code</label>
                        <div class=" position-relative">

                            <input type="text" placeholder="Coupon Code" name="coupen_code" class="form-control"
                                style="padding-right: 60px;" value="{{ $coupon->coupen_code }}">
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-5 mb-2">
                        <div class="form-check d-flex align-items-center gap-2 primary-checkbox">
                            <input class="form-check-input mt-0" type="radio" name="check_discount" id="cdiscount1"
                                value="1" @if ($coupon->discount != null) {{ 'checked' }} @endif>
                            <label class="form-check-label m-0" for="flexRadioDefault1">
                                Fix
                            </label>
                        </div>
                        <div class="form-check d-flex align-items-center gap-2 primary-checkbox">
                            <input class="form-check-input mt-0" type="radio" name="check_discount" id="cdiscount2"
                                value="0" @if ($coupon->discount_percentage != null) {{ 'checked' }} @endif>
                            <label class="form-check-label m-0" for="flexRadioDefault2">
                                Percentage%
                            </label>
                        </div>
                    </div>
                    <div class="form-group" id="discount">
                        @if ($coupon->discount != null)
                            <label for="" class="mb-3">Discount Amount</label>
                            <div class=" position-relative">
                                <input placeholder="Discount Fix Amount" type="text" name="discount_amount"
                                    class="form-control" required value="{{ $coupon->discount }}">
                            </div>
                        @endif
                        @if ($coupon->discount_percentage != null)
                            <label for="" class="mb-3">Discount%</label>
                            <div class=" position-relative">
                                <input placeholder="Discount %" type="text" name="discount_percentage"
                                    class="form-control" required value="{{ $coupon->discount_percentage }}">
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="" class="mb-3">Categories</label>
                        <div class=" position-relative">
                            <select name="category" id="categoryID" class="form-control" required>
                                <option value="">Select Categories</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}"
                                        @if ($item->id == $coupon->category_id) {{ 'selected' }} @endif>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="mb-3">Total Users</label>
                        <div class=" position-relative">
                            <input type="number" placeholder="Total Users" name="total_users" class="form-control"
                                style="padding-right: 60px;" value="{{ $coupon->total_users }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="mb-3">Total Uses</label>
                        <div class=" position-relative">
                            <input type="number" placeholder="Total Uses" name="total_use" class="form-control"
                                style="padding-right: 60px;" value="{{ $coupon->total_uses }}">
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-5 mb-2">
                        <div class="form-check d-flex align-items-center gap-2 primary-checkbox">
                            <input class="form-check-input mt-0" type="radio" name="expiry" id="expiry2"
                                value="0" checked>
                            <label class="form-check-label m-0" for="flexRadioDefault2">
                                Forever
                            </label>
                        </div>
                        <div class="form-check d-flex align-items-center gap-2 primary-checkbox">
                            <input class="form-check-input mt-0" type="radio" name="expiry" id="expiry1"
                                value="1" @if($coupon->expiry != null) {{ 'checked' }} @endif>
                            <label class="form-check-label m-0" for="flexRadioDefault1">
                                Have Expiry
                            </label>
                        </div>
                    </div>
                    <div class="form-group" id="expiry">
                        @if ($coupon->expiry != null)
                            <label for="" class="mb-3">Expiry Date</label>
                            <div><input type="datetime-local" name="expiry" class="form-control"
                                    placeholder="Select Expiry Date" value="{{ $coupon->expiry }}"></div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="" class="mb-3">Status</label>
                        <div class=" position-relative">
                            <select name="status" class="form-control">
                                <option value="">Select Status</option>
                                <option value="active" @if ($coupon->status == 'active') {{ 'selected' }} @endif>
                                    Active
                                </option>
                                <option value="deactive" @if ($coupon->status == 'deactive') {{ 'selected' }} @endif>
                                    Deactive
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-primary extra-btn-padding-45 text-uppercase">
                            Update
                        </button>
                    </div>
                </form>
            </div>
            <br>
            <br>
            <br>

        </div>
        <!-- Modal -->
    @endsection
    @push('adminscript')
        <script type="text/javascript">
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
        </script>
    @endpush
