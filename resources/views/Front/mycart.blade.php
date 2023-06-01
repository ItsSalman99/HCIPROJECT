@extends('layouts.app')
@section('content')
    <style>
        @media screen and (max-width: 768px) {
            .table-v1 table thead {
                display: none;
            }

            .table-v1 table tbody tr {
                position: relative;
                border: 1px solid var(--border-clr);
                margin-bottom: 10px;
                border-radius: 5px;
            }

            .table-v1 table tbody tr td:nth-last-child(2) {
                border: none;
            }

            .table-v1 table tbody tr,
            .table-v1 table tbody tr td {
                display: block;
                width: 100%;
            }

            .table-v1 table tbody tr td.removedProduct {
                position: absolute;
                top: 0;
                right: 0;
                text-align: right;
                border: none;
            }
        }
    </style>
    @php
        ShippingNull();
    @endphp

    <section class="pt-5">
        <div class="container">
            <div id="cartdeletemsg" class="m-4">
            </div>
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                <div>
                    <h3 class="font-22px font-weight-600 m-0">My <span class="text-primary">Cart</span></h3>
                    <small class=" opacity-05 font-14px" id="mycartcount">{{ CartCount(sessionID()) }} Items</small>
                </div>
                <ul>
                    <li><a href="{{ url('/') }}" class="btn white-btn"><img src="assets/images/icons/arrow-right.svg"
                                alt=""> Continue Shopping</a></li>
                </ul>
            </div>
            <br />
            <br />
            <br />
            {{-- @php
                dd(session('Discount'))
            @endphp --}}
            @if (CartCount(sessionID()))
                <div class="row align-items-start">
                    <div class="col-lg-8 bottom-line-spacing" style="--bl-spacing: 20px">

                        @if (getCart(sessionID()))
                            @foreach (getCart(sessionID()) as $item)
                                <div class=" border-start border-end rounded-2 overflow-hidden pb-0">
                                    <div
                                        class="d-flex align-items-center justify-content-between gap-3 py-3 px-4 bg-primary-clr-006 rounded-top-2">
                                        <div class="d-flex align-items-center gap-3">
                                            <i class="bi bi-shop font-20px text-primary"></i>
                                            <h5
                                                class=" font-16px font-weight-500 text-capitalize m-0 width-90 text-truncate text-primary">
                                                {{ $item->first_name }} {{ $item->last_name }}
                                            </h5>
                                        </div>
                                        <a onclick="deleteAllCartItem({{ $item->id }})" href="javscript:void(0)"
                                            data-bs-toggle="tooltip" data-bs-title="Delete ALL"><i
                                                class="bi bi-trash text-primary font-17px hover-opacity-08"></i></a>
                                    </div>
                                    <div class="table-v1 table-center">
                                        <div class="table-responsive">
                                            <table class="table m-0">
                                                <thead>
                                                    <tr>
                                                        <th class="width-40">Product</th>
                                                        <th>Quantity</th>
                                                        <th>Total Price</th>
                                                        <th>Shipping</th>
                                                        <th>&nbsp;</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($item->cart_items as $cartItem)
                                                        @if ($cartItem->cart_id == checkCart(sessionID())->id)
                                                            <tr>
                                                                <td>
                                                                    <div
                                                                        class="image-to-content text-center text-lg-start d-flex align-items-center gap-2">
                                                                        <img src="{{ asset($cartItem->product->image1) }}"
                                                                            alt="">
                                                                        <div>
                                                                            <ul>
                                                                                <li
                                                                                    class=" justify-content-center justify-content-lg-start">
                                                                                    <a href="{{ route('product_detail', ['id' => $cartItem->product->id]) }}"
                                                                                        class="dark-anchor">
                                                                                        {{ $cartItem->product->name }}
                                                                                    </a>
                                                                                    @if (isset($cartItem->variant_id))
                                                                                        <span class="opacity-05">
                                                                                            ({{ getVariatName($cartItem->variant_id) }})
                                                                                        </span>
                                                                                    @endif
                                                                                </li>
                                                                            </ul>
                                                                            <small
                                                                                class="opacity-05 d-block">{{ $cartItem->price }}
                                                                                Pkr</small>
                                                                            <small><span class="opacity-05">Estimated
                                                                                    Delivery:</span> 4-10 Days</small>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div
                                                                        class="cover-increment-number d-flex align-items-center justify-content-center">
                                                                        <div class="cartqtydec btn btn-default pull-left"
                                                                            id="{{ $cartItem->id }}">-</div>
                                                                        <input type="text" name="qty"
                                                                            id="input1_{{ $cartItem->id }}" readonly
                                                                            value="{{ $cartItem->qty }}">
                                                                        <div class="cartqtyinc btn btn-default"
                                                                            id="{{ $cartItem->id }}">+</div>

                                                                    </div>
                                                                </td>
                                                                <td>{{ $cartItem->qty * $cartItem->price }} PKr</td>
                                                                <td>(Rs. {{ ShippingAmount() }})</td>
                                                                <td class="removedProduct">
                                                                    <a href="#."
                                                                        onclick="deleteCartItem({{ $cartItem->id }})"><i
                                                                            class="material-icons text-danger">
                                                                            close
                                                                        </i></a>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
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
                            {{-- @php
                                dd(session()->get('walletPrice'))
                            @endphp --}}
                            <div class="form-group ">
                                <div class="d-flex align-items-center justify-content-between">
                                    <label for="" class=" opacity-07 font-weight-400">Order Total</label>
                                    <h5 class="font-15px opacity-07" id="cart_order_total">
                                        @if (session()->get('full_paid') == null && session()->get('full_paid') != 1)
                                            @if (session()->get('is_wallet') == 1)
                                                <input type="hidden" hidden class="sub_total"
                                                    value="{{ cartSubTotal(sessionID()) - session()->get('walletPrice') }}">
                                                Rs.{{ cartSubTotal(sessionID()) - session()->get('walletPrice') - session()->get('shippingPrice') }}
                                                {{ env('CURRENCY') }}
                                            @else
                                                <input type="hidden" hidden class="sub_total"
                                                    value="{{ cartSubTotal(sessionID()) }}">
                                                Rs.{{ cartSubTotal(sessionID()) - session()->get('shippingPrice') }}
                                                {{ env('CURRENCY') }}
                                            @endif
                                        @else
                                            <input type="hidden" hidden class="sub_total"
                                                value="{{ cartSubTotal(sessionID()) - session()->get('walletPrice') }}">
                                            (Paid By Wallet)
                                        @endif
                                    </h5>
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
                                <li>
                                    <span class=" opacity-07 font-weight-400">Coupon Applied</span> <span
                                        class="decrement-text float-end font-15px">
                                        <?php if (session('is_coupen') == 0) {
                                            echo '0.00';
                                        } else {
                                            echo '- Rs. ' . session('coupenDiscount');
                                        } ?>
                                    </span>
                                </li>
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
                                <li>
                                    <span class=" opacity-07 font-weight-400">Shipping</span> <span
                                        class="opacity-07 float-end font-15px">Rs. {{ session('shippingPrice') }}
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
                                <li><span class=" opacity-07 font-weight-600 font-15px">Subtotal</span> <span
                                        class="float-end font-19px font-weight-600" id="cart_sub_total">
                                        @if (session()->get('full_paid') == null && session()->get('full_paid') != 1)
                                            @if (session()->get('is_wallet') == 1)
                                                Rs.{{ cartSubTotal(sessionID()) - session()->get('walletPrice') }}
                                                {{ env('CURRENCY') }}
                                            @else
                                                Rs.{{ cartSubTotal(sessionID()) }}
                                                {{ env('CURRENCY') }}
                                            @endif
                                        @else
                                            <input type="hidden" hidden class="sub_total"
                                                value="{{ cartSubTotal(sessionID()) - session()->get('walletPrice') }}">
                                            (Paid By Wallet)
                                        @endif
                                    </span></li>
                            </ul>
                            <a href="{{ route('checkout') }}" class="btn btn-primary d-block w-100 mt-4">Continue</a>

                        </div>
                    </div>
                </div>
            @else
                <div class="offcanvas-body d-flex flex-column justify-content-between align-items-center">
                    <div id="cart"
                        class="cover-shopping-items fixed-height-400 h-auto mb-4 w-100 bottom-line-spacing not-last-border-line"
                        style="--bl-spacing: 25px">

                        <div class=" width-100 width-md-40 mx-auto">
                            <div class="text-center">
                                <a href="javascript:void(0)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill=""
                                        class="bi bi-bag-x" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M6.146 8.146a.5.5 0 0 1 .708 0L8 9.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 0 1 0-.708z">
                                        </path>
                                        <path
                                            d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z">
                                        </path>
                                    </svg>
                                </a>
                                <p class=" font-16px font-lg-19px my-2 my-lg-4">
                                    Your cart is empty
                                </p>
                                <a href="/"
                                    class="lh-base btn btn-primary bg-gradient extra-btn-padding-35 text-uppercase fw-600 rounded-pill">
                                    back to shoping
                                </a>
                            </div>
                        </div>

                    </div>

                </div>
            @endif
        </div>
    </section>

    @push('head')
        <script>
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
                            window.window.location.href = '/mycart';
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
        <script type="text/javascript">
            $('.cartqtyinc').on('click', function(obj) {
                var item = $(this).parent().find("input");
                var id = $(this).attr('id');
                var qty = $('#input1_' + id).val();
                var newQty = ++qty;
                $('.cartqtyinc').addClass('user-select-none pe-none');
                setTimeout(function() {
                    $('.cartqtyinc').removeClass('user-select-none pe-none');
                }, 1000);
                console.log($('#input1_' + id).val());
                $.ajax({
                    type: "GET",
                    url: "/cart-handle/" + id + "/" + newQty,
                    dataType: "json",
                    success: function(response) {
                        $('#addsuccesstoaster').addClass('show');
                        $('#title').html('Cart Updated Successfully');
                        console.log(response.data);
                    }
                })
                setTimeout(function() {
                    $('#addsuccesstoaster').removeClass('show')
                    window.location.href = '/mycart';
                }, 1000);
            });
            $('.cartqtydec').on('click', function(obj) {
                var id = $(this).attr('id');
                var item = $(this).parent().find("input");
                var qty = $('#input1_' + id).val();
                var newQty = --qty;
                $('.cartqtyinc').addClass('user-select-none pe-none');
                setTimeout(function() {
                    $('.cartqtyinc').removeClass('user-select-none pe-none');
                }, 1000);
                console.log($('#input1_' + id).val());
                $.ajax({
                    type: "GET",
                    url: "/cart-handle/" + id + "/" + newQty,
                    dataType: "json",
                    success: function(response) {
                        $('#addsuccesstoaster').addClass('show');
                        $('#title').html('Cart Updated Successfully');
                        console.log(response.data);
                    }
                })
                setTimeout(function() {
                    $('#addsuccesstoaster').removeClass('show')
                    window.location.href = '/mycart';
                }, 1000);
            });
            // $('.cartqtydec').on('click', function() {
            //     var id = $(this).data('id');
            //     var item = $(this).parent().find("input");
            //     var qty = $('#input1_' + id).val();
            //     $('.cartqtydec').addClass('user-select-none pe-none');
            //     setTimeout(function() {
            //         $('.cartqtydec').removeClass('user-select-none pe-none');
            //     }, 1000);
            //     if (qty > 1) {
            //         var id = $(this).data('id');
            //         var act = 'dec';
            //         $.get("/cartproducthangler/" + id, {
            //             act: act
            //         }, function(data, textStatus, jqXHR) {
            //             if (data.success) {
            //                 item.val(data.data.quantity);
            //                 if (data.data.quantity == 1) {
            //                     $('.cartqtydec').addClass('user-select-none pe-none');
            //                 }
            //                 $('#totalprice_' + id).html('Rs. ' + data.data.price + ' PKR');
            //                 $('#cart_order_total').html();
            //                 $('#cart_order_total').html('Rs. ' + data.data.tprice + ' PKR');
            //                 $('#cart_sub_total').html()
            //                 $('#cart_sub_total').html('Rs. ' + data.data.sub_total)
            //                 $.ajax({
            //                     url: '{{ route('cartCount') }}',
            //                     type: 'GET',
            //                     dataType: 'json',
            //                     success: function(response) {
            //                         $('#count').html('(' + response.count + ')');
            //                         $('#mycartcount').html(response.count + ' items');

            //                         // console.log("Data: " + response.data + "\nStatus: " + response.status);
            //                     }
            //                 });

            //             } else {
            //                 // $('#t_price_id').html('');
            //                 // $('#t_price_id').html('Out of Stock');
            //                 // $('#h_varient_id').val('');
            //             }
            //         }, "json");
            //     } else if (qty == 1 || qty == 0) {
            //         var id = $(this).data('id');
            //         var act = 'remove';
            //         $.get("/cartproducthangler/" + id, {
            //             act: act
            //         }, function(data, textStatus, jqXHR) {
            //             if (data.msg == 'remove') {
            //                 location.reload(true);
            //             }
            //         }, "json");
            //     }
            // });
        </script>
    @endpush
@endsection
