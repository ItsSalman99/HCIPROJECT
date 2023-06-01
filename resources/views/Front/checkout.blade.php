<?php
use App\Models\CustomerAddress;

if (Session::get('customer')) {
    # code...
    function getActiveAddress()
    {
        $address = CustomerAddress::where('customer_id', '=', Session::get('customer')['id'])
            ->where('active', '=', 1)
            ->first();

        return $address;
    }
}
?>
@extends('layouts.app')
@section('content')
    <!-- start side bar -->
    <div id="preloader" class="preloader d-none position-fixed top-0 start-0 w-100 h-100"
        style="
        background-color: '#0000007a',
        z-index: 999999;
      ">
        <div class="centercontent h-100 d-flex align-items-center justify-content-center flex-column gap-4">
            <div class="d-flex justify-content-center">
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
    </div>

    @php
        $cart = getCart(sessionID());
        // dd(count($cart))
    @endphp
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-form">
                        <div class="alert alert-danger <?php if (count($cart) != 0) {
                            echo 'd-none';
                        } ?>" role="alert">
                            Please add some items to your cart to make an order!
                        </div>

                        <form class="cover-form" id="checkoutForm">
                            @csrf
                            <input type="text" hidden name="shipping_method" value="{{ Session::get('shipping') }}">
                            <input type="text" hidden name="shipping_price" value="{{ Session::get('shippingPrice') }}">
                            @if (Session::get('customer'))
                                <input type="text" hidden name="customer_id" value="{{ Session::get('customer')['id'] }}"
                                    hidden>
                            @endif
                            {{-- <input type="text" hidden name="product_id" value="{{ Session::get('customer')['id'] }}"
                                hidden> --}}
                            <input type="text" hidden name="coupen_id" value="{{ Session::get('coupen_id') }}" hidden>
                            <input type="text" hidden name="coupenCode" value="{{ Session::get('coupenCode') }}" hidden>
                            <input type="text" hidden name="coupenDiscount" value="{{ Session::get('coupenDiscount') }}"
                                hidden>
                            <input id="amount" type="hidden" name="orderTotal" value="{{ cartTotal(sessionID()) }}">

                            <input type="hidden" name="subTotal" value="{{ cartSubTotal(sessionID()) }}">

                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5 class="font-22px">Address</h5>
                                </div>
                                @if (!Session('customer'))
                                    <div>
                                        Already have an account?
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#loginmodal"
                                            aria-haspopup="true" aria-expanded="false">
                                            Login
                                        </a>
                                    </div>
                                @endif
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-floating">
                                            <input type="text" name="first_name" class="form-control" id="floatingname"
                                                placeholder="First Name"
                                                value="@if (Session::get('customer') != null) {{ SplitFirstName(Session::get('customer')['name']) }} @endif">
                                            <label for="floatingname">First Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-floating">
                                            <input type="text" name="last_name" class="form-control"
                                                id="floatinglastname" placeholder="Last Name"
                                                value="@if (Session::get('customer') != null) {{ SplitLastName(Session::get('customer')['name']) }} @endif">
                                            <label for="floatinglastname">Last Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-floating">
                                            <input type="email" name="email" class="form-control" id="floatingEmail"
                                                placeholder="Email"
                                                value="@if (Session::get('customer') != null) {{ Session::get('customer')['email'] }} @endif">
                                            <label for="floatingEmail">E-mail</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-floating">
                                            <input type="tel" name="contact_number" class="form-control"
                                                id="floatingNumber" placeholder="Phone"
                                                value="@if (Session::get('customer') != null) {{ Session::get('customer')['phone'] }} @endif">
                                            <label for="floatingNumber">Contact Number</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group align-items-center form-check mb-4">
                                        <input class="form-check-input" type="checkbox" onclick="checkPostalAddress()"
                                            id="postalAddress">
                                        <label class="form-check-label m-0 opacity-05" for="postalAddress">
                                            I have a different shipping address
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12" id="postalAddressDiv">
                                    <div class="form-group">
                                        <div class="form-floating">
                                            <input type="text" name="postaladdress" class="form-control"
                                                id="floatingname" placeholder="Postal Address"
                                                value="@if (Session::get('customer') && isset(getActiveAddress()->address)) {{ getActiveAddress()->address }} @endif">
                                            <label for="floatingname">Postal Address</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="province" id="province" class="form-control">
                                            <option value="">Select Province</option>
                                            @foreach ($province as $pro)
                                                <option value="{{ $pro->id }}" id="{{ $pro->id }}"
                                                    <?php if (Session::get('customer')) {
                                                        if ($pro->id == Session::get('customer')['province']) {
                                                            echo 'selected';
                                                        }
                                                    }
                                                    ?>>
                                                    {{ $pro->province_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="city" id="city" class="form-control">
                                            <option value="">Select City</option>
                                            @if (isset(Session::get('customer')['province']))
                                                <option value="" selected>
                                                    {{ getCity(Session::get('customer')['province']) }}</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                @if (Session::get('customer') == null)
                                    <div class="col-md-6">
                                        <div class="input-group align-items-center form-check mb-4">
                                            <input class="form-check-input" type="checkbox" onclick="createAccount()"
                                                id="accountCheck">
                                            <label class="form-check-label m-0 opacity-05" for="accountCheck">
                                                I also want to create an account
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 password d-none" id="passwordBox">
                                        <div class="form-group">
                                            <div class="form-floating">
                                                <input type="password" name="password" class="form-control pswInp"
                                                    id="passwordinput" placeholder="****">
                                                <label for="passwordinput">Password</label>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <br>
                            <div id="shippingAddress" class="d-none">
                                <h5 class="font-22px">Shipping <span class="primary-text">Address</span></h5>
                                <div class="shipping-address p-3 border border-radius-6px mt-3">
                                    <div
                                        class="d-flex align-items-end align-items-lg-center justify-content-between flex-wrap gap-2 border-bottom pb-3 mb-3 mb-lg-2">
                                        <div class="d-flex align-items-center gap-3 flex-wrap flex-lg-nowrap flex-1">
                                            <h6 class=" opacity-05">Contact</h6>
                                            <div
                                                class="usercheckoutfields-contact d-flex align-items-center w-100 flex-wrap flex-lg-nowrap gap-2">
                                                <input id="shippingPhone"
                                                    value="@if (Session::get('customer')) {{ Session::get('customer')['phone'] }} @endif"
                                                    type="tel" placeholder="#+921" value="" readonly required>
                                                <span class="d-none d-lg-block">|</span>
                                                <input id="shippingEmail"
                                                    value="@if (Session::get('customer')) {{ Session::get('customer')['email'] }} @endif"
                                                    type="email" class="w-100" placeholder="Shipping Email" readonly
                                                    required>
                                            </div>
                                        </div>
                                        <ul>
                                            <li><a href="#." id="changecontact" class="dark-anchor">Change</a></li>
                                        </ul>
                                    </div>
                                    <div
                                        class="d-flex align-items-end align-items-lg-center justify-content-between flex-wrap gap-2  ">
                                        <div class="d-flex align-items-center gap-3 flex-wrap flex-lg-nowrap flex-1">
                                            <h6 class=" opacity-05 text-nowrap">Shipment
                                                Address</h6>
                                            <div
                                                class="usercheckoutfields-address d-flex align-items-center w-100 flex-wrap flex-lg-nowrap gap-2">
                                                <input id="changeshipAddress" name="shipment_address"
                                                    value="@if (Session::get('customer') && isset(getActiveAddress()->address)) {{ getActiveAddress()->address }} @endif"
                                                    type="address" class="w-100" placeholder="Address" readonly
                                                    required>
                                            </div>
                                        </div>
                                        <ul>
                                            <li><a href="#." class="dark-anchor" id="changeAddress">Change</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <h5 class="font-17px">Shipment <span class="primary-text">Method</span></h5>
                            <div class="shipping-method p-3 border border-radius-6px mt-3">
                                <ul>
                                    <li><a href="#"
                                            class="active-method d-flex align-items-center justify-content-between">
                                            {{ Session::get('shipping') }}
                                            <span>{{ Session::get('shippingPrice') . ' ' . env('CURRENCY') }}</span></a>
                                    </li>
                                </ul>
                            </div>
                            <br>
                            <h5 class="font-22px mt-3">Payment <span class="primary-text">Method</span></h5>
                            <div class="payment-method p-3 border border-radius-6px my-3">
                                <!-- Nav tabs -->
                                <ul class="nav nav-pills payment-method gap-3 mb-4 border-bottom pb-3" id="myTab"
                                    role="tablist">
                                    <li class="nav-item " role="presentation">
                                        <button class="nav-link active" id="profile-tab" data-bs-toggle="tab"
                                            data-bs-target="#profile" type="button" role="tab"
                                            aria-controls="profile" aria-selected="true">Cash On Delivery</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="home-tab" data-bs-toggle="tab"
                                            data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                            aria-selected="false">Bank Transfer</button>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="profile" role="tabpanel"
                                        aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>
                                                    We offer Cash on Delivery all across Pakistan. Pay cash once you receive
                                                    your order from our courier partners.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>
                                                    Make your payment directly into our bank account. Please use Order ID as
                                                    your payment reference. The order won't be shipped till the time we
                                                    receive the funds in our bank account. Please email and/ or Whatsapp us
                                                    screenshot of your payment. Our bank account details are as follows:
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="d-flex align-items-center justify-content-between">
                                <li><a href="{{ route('mycart') }}" class="dark-anchor d-flex align-items-center"><i
                                            class="material-icons">
                                            navigate_before
                                        </i> Return to cart</a></li>
                                <li><button type="submit" id="place-order" <?php if (count($cart) == 0) {
                                    echo 'disabled';
                                } ?>
                                        class="btn btn-primary extra-btn-padding-60 text-uppercase <?php if ($cart == null) {
                                            echo 'd-none';
                                        } ?>">
                                        Place Order
                                    </button>
                                </li>
                            </ul>

                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="summary-card overflow-hidden mt-4 mt-md-0">
                        <div class="d-flex justify-content-between">
                            <h5 class="font-weight-600 font-22px">Order Summary</h5>
                            @if (Session('customer'))
                                @if (getWallet(Session('customer')['id']))
                                    <div class="form-check form-switch">
                                        <input value="{{ Session('customer')['id'] }}" id="customerID" hidden>
                                        <label class="form-check-label" for="flexSwitchCheckChecked">Wallet</label>
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            <?php
                                            if (Session('is_wallet') == 1) {
                                                echo 'checked';
                                            }
                                            ?> id="flexSwitchCheckChecked">
                                    </div>
                                @endif
                            @endif
                        </div>
                        <br>
                        <div class="summary-list-items">

                            @if (getCart(sessionID()))
                                @foreach (getCart(sessionID()) as $cart)
                                    @foreach ($cart->cart_items as $item)
                                        @if ($item->cart_id == checkCart(sessionID())->id)
                                            <div
                                                class="image-to-content d-flex align-items-start justify-content-between gap-2">
                                                <div class="d-flex align-items-center gap-3 w-100">
                                                    <img src="{{ asset($item->product->image1) }}" alt="">
                                                    <div class="w-100">
                                                        <ul>
                                                            <li
                                                                class="d-flex align-items-center justify-content-between flex-fill">
                                                                <a href="{{ route('product_detail', ['id' => $item->product->id]) }}"
                                                                    class="dark-anchor">{{ $item->product->name }}</a>
                                                                @if (isset($item->variant_id))
                                                                    <span class="opacity-05 me-auto">
                                                                        ({{ getVariatName($item->variant_id) }})
                                                                    </span>
                                                                @endif
                                                                <h6 class="m-0">
                                                                    Rs. {{ number_format($item->price) }}
                                                                </h6>
                                                            </li>
                                                        </ul>
                                                        <small class="opacity-05 d-block">Quantity: <span
                                                                class="font-weight-500">{{ $item->qty }}</span></small>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endforeach
                            @endif
                        </div>
                        <br><br>
                        <div class="form-group ">
                            <div class="d-flex align-items-center justify-content-between">
                                <label for="" class=" opacity-07 font-weight-400">Order Total</label>

                                @if (session()->get('full_paid') == null && session()->get('full_paid') != 1)
                                    <h5 id="subtotals" class="font-15px opacity-07">
                                        Rs. {{ cartTotal(sessionID()) }}

                                        {{ env('CURRENCY') }}
                                    </h5>
                                @else
                                    <input type="hidden" hidden class="sub_total"
                                        value="{{ cartSubTotal(sessionID()) - session()->get('walletPrice') }}">
                                    (Paid By Wallet)
                                @endif
                            </div>
                            @if (Session::get('customer'))
                                <form id="applyCoupen" class="mt-3">
                                    @csrf
                                    <div class="input-group">
                                        <input type="text" name="customer_id"
                                            value="{{ Session::get('customer')['id'] }}" hidden>
                                        <input type="text" name="code" class="form-control"
                                            value="<?php if (session('is_coupen') != 0) {
                                                echo session('coupenCode');
                                            } ?>" <?php if (session('is_coupen') != 0) {
                                                echo 'readonly';
                                            } ?> placeholder="Coupon Code">
                                        @if (session('is_coupen') != 0)
                                            <button class="btn btn-primary extra-btn-padding-25"
                                                type="submit">Remove</button>
                                        @else
                                            <button class="btn btn-primary extra-btn-padding-25"
                                                type="submit">Apply</button>
                                        @endif
                                    </div>
                                </form>
                            @endif
                        </div>
                        <ul>

                            <li><span class=" opacity-07 font-weight-400">Coupon Applied</span> <span
                                    class="decrement-text float-end font-15px" id="applied">
                                    <?php if (session('is_coupen') == 0) {
                                        echo '0.00';
                                    } else {
                                        echo '- Rs. ' . session('coupenDiscount');
                                    } ?>
                                </span></li>
                            <li id="walletDiv" class="<?php if (Session('is_wallet') == 0) {
                                echo 'd-none';
                            } ?>">
                                <span class=" opacity-07 font-weight-400">Wallet Price</span> <span
                                    class="decrement-text float-end font-15px" id="walletPrice">
                                    @if (session()->get('full_paid') == null && session()->get('full_paid') != 1)
                                        <?php if (Session('is_wallet') == 1) {
                                            echo '- ' . session('walletPrice');
                                        } else {
                                            echo '0.00';
                                        } ?>
                                    @else
                                        Paid By Wallet
                                    @endif
                                </span>
                            </li>
                            <li><span class=" opacity-07 font-weight-400">Shipping</span> <span
                                    class="opacity-07 float-end font-15px">Rs {{ Session::get('shippingPrice') }}
                                    {{ env('CURRENCY') }}</span>
                            </li>
                        </ul>
                        <div class="circle-shap">
                            <ul>
                                <script>
                                    for (a = 1; a < 50; a++) {
                                        document.write('<li></li>')
                                    }
                                </script>
                            </ul>
                        </div>
                        <ul>
                            <li><span class=" opacity-07 font-weight-600 font-15px">Subtotal</span>
                                <span id="cart_sub_total" class="float-end font-19px font-weight-600">
                                    Rs.{{ cartSubTotal(sessionID()) }}

                                    {{ env('CURRENCY') }}
                                </span>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('head')
        {{-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script> --}}
        <script>
            $('#checkoutForm').on('submit', function(e) {

                e.preventDefault();

                var formData = new FormData(this);
                $('#place-order').html('Placing your order....')

                $.ajax({
                    url: '{{ route('front.orderplaced') }}',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#preloader').addClass('d-none')
                        if (response.status == false) {
                            $('#addsuccesstoaster').addClass('show')
                            $('#title').html(response.message)
                            $('#place-order').html('PLACE ORDER')
                        } else if (response.status == true) {
                            $('#preloader').removeClass('d-none')
                            $('#addsuccesstoaster').removeClass('show')
                            $('#title').html("Order has been placed successfully!!")
                            setTimeout(function() {
                                $('#addsuccesstoaster').removeClass('show')
                                $('#preloader').addClass('d-none')
                                window.location.href = '/thank-you/' + response.data
                            }, 700);
                        }
                    }
                })
                setTimeout(function() {
                    $('#addsuccesstoaster').removeClass('show')
                    $('#preloader').addClass('d-none')
                }, 2500);
            })

            $('#applyCoupen').on('submit', function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();
                var data = new FormData(this);

                $.ajax({
                    method: 'POST',
                    url: '{{ route('coupen.apply') }}',
                    data: data,
                    contentType: false,
                    processData: false,
                    success: function(response) {

                        if (response.status == true) {
                            $('#addsuccesstoaster').addClass('show');
                            $('#title').html(response.msg);
                            window.window.location.href = '/checkout';
                        } else if (response.status == false) {
                            $('#addsuccesstoaster').addClass('show');
                            $('#title').html(response.msg);
                        }
                    }
                })
                setTimeout(function() {
                    $('#addsuccesstoaster').removeClass('show')
                }, 2000);
            });
        </script>
        <script>
            $('#flexSwitchCheckChecked').on('click', function(e) {

                var id = $('#customerID').val();

                console.log(id);

                if ($('#flexSwitchCheckChecked').is(":checked") == true) {

                    var check = true;

                    $.ajax({
                        method: 'GET',
                        url: '/my-wallet/customer/' + id + '/' +
                            $('#flexSwitchCheckChecked').is(":checked"),
                        success: function(response) {
                            if (response.status == true) {
                                $('#walletDiv').removeClass('d-none')
                                $('#walletPrice').html('- Rs.' + response.wallet)
                                $('#cart_sub_total').html('Rs. ' + response.sub_total + ' Pkr');
                                $('#cart_order_total').html('Rs. ' + response.sub_total + ' Pkr');
                                $('#title').html(response.msg);
                            } else if (response.status == false) {
                                $('#walletDiv').addClass('d-none')
                                $('#cart_sub_total').html('Rs. ' + response.sub_total + ' Pkr');
                                $('#cart_order_total').html('Rs. ' + response.sub_total + ' Pkr');
                                $('#addsuccesstoaster').addClass('show');
                                $('#title').html(response.msg);
                            }
                        }
                    })
                    setTimeout(function() {
                        $('#addsuccesstoaster').removeClass('show')
                        window.location.href = '';
                    }, 1200);

                } else {

                    var check = false;

                    $.ajax({
                        method: 'GET',
                        url: '/my-wallet/customer/' + id + '/' +
                            $('#flexSwitchCheckChecked').is(":checked"),
                        success: function(response) {
                            $('#walletDiv').addClass('d-none')
                            $('#walletPrice').html('0.00')
                            $('#cart_sub_total').html('Rs. ' + response.sub_total + ' Pkr');
                            $('#cart_order_total').html('Rs. ' + response.sub_total + ' Pkr');
                            $('#addsuccesstoaster').addClass('show');
                            $('#title').html(response.msg);
                        }
                    })
                    setTimeout(function() {
                        $('#addsuccesstoaster').removeClass('show')
                        window.location.href = '';
                    }, 1200);
                }



            })
        </script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            $('#province').on('change', function() {
                var provinceId = $(this).val();
                document.getElementById('city').innerHTML = ' <option value="" selected>Select City</option> ';

                $.ajax({
                    url: '/citiesByProvice/' + provinceId,
                    type: 'GET',
                    contentType: false,
                    processData: false,
                    success: function(res) {

                        if (res.status == true) {
                            $.each(res.data, function(index, item) {
                                document.getElementById('city').innerHTML +=
                                    '<option value="' +
                                    item.id + '">' + item.city_name + '</option>';
                            })
                        }
                    }
                })
            })
        </script>
        <script>
            function checkPostalAddress() {
                var flag = $('#postalAddress').is(':checked');
                // console.log(flag);
                if (flag == true) {
                    $('#shippingAddress').removeClass('d-none')
                    $('#passwordinput').val();
                } else {
                    $('#shippingAddress').addClass('d-none');
                    $('#passwordinput').val();
                }
            }

            function createAccount() {
                // console.log('Display');
                var flag = $('#accountCheck').is(':checked');
                console.log(flag);
                if (flag == true) {
                    $('#passwordBox').removeClass('d-none')
                    $('#passwordinput').val();
                } else {
                    $('#passwordBox').addClass('d-none');
                    $('#passwordinput').val();
                }
            }
        </script>
        <script type="text/javascript">
            $('#changecontact').click(function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();
                console.log('check' + $('#shippingPhone').is('[readonly]'));
                if ($('#shippingPhone').is('[readonly]') == true) {
                    $('#shippingPhone').prop('readonly', false);
                    // console.log('asdasd');
                    $(this).html("Done")
                } else {
                    $('#shippingPhone').prop('readonly', true);
                    $(this).html("Change")
                }
                if ($('#shippingEmail').is('[readonly]') == true) {
                    $('#shippingEmail').prop('readonly', false);
                    // console.log('asdasd');
                    $(this).html("Done")
                } else {
                    $('#shippingEmail').prop('readonly', true);
                    $(this).html("Change")
                }
            });

            $('#changeAddress').click(function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();
                console.log('check' + $('#changeshipAddress').is('[readonly]'));
                if ($('#changeshipAddress').is('[readonly]') == true) {
                    $('#changeshipAddress').prop('readonly', false);
                    // console.log('asdasd');
                    $(this).html("Done")
                } else {
                    $('#changeshipAddress').prop('readonly', true);
                    $(this).html("Change")
                }
            });

            function cc_format(value) {
                var v = value.replace(/\s+/g, '').replace(/[^0-9]/gi, '')
                var matches = v.match(/\d{4,16}/g);
                var match = matches && matches[0] || ''
                var parts = []
                for (i = 0, len = match.length; i < len; i += 4) {
                    parts.push(match.substring(i, i + 4))
                }
                if (parts.length) {
                    return parts.join('-')
                } else {
                    return value
                }
            }

            onload = function() {
                document.getElementById('floatingCardNumber').oninput = function() {
                    this.value = cc_format(this.value)
                }
            }
        </script>
        {{-- <script>
            $('#coupenForm').on('submit', function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();
                var formData = new FormData(this);
                var shpping = '{{ Session::get('shipping_price') }}'

                $.ajax({
                    url: '{{ route('front.applyCoupen') }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        if (res.status == true) {
                            var subTotal = parseInt(res.data) + parseInt(shpping);
                            $('#amount').val(subTotal);
                            document.getElementById('subtotals').innerHTML = 'Pkr.' + res.data
                                .toLocaleString('en-US') + '';
                            document.getElementById('applied').innerHTML = '' + res.data2.toLocaleString(
                                'en-US') + '';
                            document.getElementById('amount2').innerHTML = '' + subTotal.toLocaleString(
                                'en-US') + ''
                        } else {
                            $('#coupen').val('')
                            swal(res.msg, {
                                icon: 'error'
                            })
                        }
                    }
                })
            })
        </script> --}}
    @endpush
@endsection
