@extends('layouts.app')
@section('content')
    <section>
        <div class="container">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                <div>
                    <h3 class="font-22px font-weight-600 m-0">My <span class="primary-text">Orders</span></h3>
                </div>
                {{-- <ul>
                    <li><a href="{{ route('product_grid') }}" class="white-btn extra-btn-padding-25 gap-3"><img
                                src="assets/images/icons/filter.svg" alt=""> Filter Order</a></li>
                </ul> --}}
            </div>
            <br />
            <br />
            <br />

            <div class="cover-table table-v1 table-responsive">
                <table class="table align-middle" id="accordionExample" style="margin-bottom: 10px !important;">
                    <thead>
                        <tr>
                            <th style="width: 1%;">&nbsp;</th>
                            <th>Order ID</th>
                            <th>Date</th>
                            <th>Ship To</th>
                            <th>Order Total</th>
                            <th style="width: 12%;">Status</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order as $key => $orders)
                            <tr>
                                <td><a href="#." class="default-black table-row-collapse primary-bg-clr-008 collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#tablerow{{ $key }}"
                                        aria-expanded="false" aria-controls="collapseOne">&nbsp;</a></td>
                                <td>
                                    <p style="color: #3FC2A3; font-weight:500">#{{ $orders->id }}</p>
                                </td>
                                <td>
                                    {{ $orders->created_at->format('d M Y') }}
                                </td>
                                <td>
                                    {{ $orders->shipment_address }}
                                </td>
                                <td>
                                    {{ number_format($orders->amount) }} PKR
                                </td>
                                <td>
                                    @if ($orders->order_status == 'Pending')
                                        <div class="pending-status">
                                            <p>Pending</p>
                                        </div>
                                    @elseif ($orders->order_status == 'Accepted')
                                        <div class="active-status">
                                            <p>Accepted</p>
                                        </div>
                                    @elseif ($orders->order_status == 'Mark As Shiped')
                                        <div class="available-status">
                                            <p>Mark As Shiped</p>
                                        </div>
                                    @elseif($orders->order_status == 'Rejected')
                                        <div class="deactive-status">
                                            <p>Mark As Shiped</p>
                                        </div>
                                    @elseif ($orders->order_status == 'Completed')
                                        <div class="active-status">
                                            <p>Completed</p>
                                        </div>
                                    @endif
                                </td>
                                @if ($orders->order_status == 'Completed')
                                    <td>
                                        <div class="cover-table-btn">
                                            <ul>
                                                <li>
                                                    <a href="#." class="btn btn-primary" data-bs-toggle="modal"
                                                        onclick="getOrder({{ $orders->id }})"
                                                        data-bs-target="#refundModal">
                                                        Refund
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                    @else
                                    <td>
                                        <div>
                                            <p>-------------</p>
                                        </div>
                                    </td>
                                @endif
                            </tr>
                            <tr id="tablerow{{ $key }}" class="accordion-collapse collapse primary-bg-clr-003"
                                aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <td colspan="7" class="px-5">
                                    <table class="table align-middle">
                                        <thead>
                                            <tr>
                                                <th style="width: 40%;">Product</th>
                                                <th style="width: 45%;">Quantity</th>
                                                <th>Price</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders->orderitem as $items)
                                                <tr>
                                                    <td>
                                                        <div
                                                            class="image-to-content text-start d-flex align-items-center gap-2">
                                                            <img src="{{ asset($items->image) }}" alt="">
                                                            <div>
                                                                <ul>
                                                                    <li><a href="{{ route('product_detail', ['id' => $items->product->id]) }}"
                                                                            class="dark-anchor">{{ $items->name }}</a>
                                                                        {{-- <span class="opacity-05">(XL)</span> --}}
                                                                    </li>
                                                                </ul>
                                                                <small
                                                                    class="opacity-05 d-block">{{ number_format($items->price) }}
                                                                    {{ env('CURRENCY') }}</small>

                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ $items->quantity }}</td>
                                                    <td class=" opacity-07">
                                                        {{ (getVariatPrice($items->product->id) != null) ? getVariatPrice($items->product->id)->price : $items->price }}
                                                        {{ env('CURRENCY') }}</td>
                                                    <td>
                                                        @if (checkRefund($items->id))
                                                            <div class="active-status">
                                                                <p>Applied For Refund</p>
                                                            </div>
                                                        @endif
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>


    <div class="modal fade" id="refundModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="card-body pt-4">
                    <div class="modal-header">
                        <h5 class="card-title font-18px">Ask For <span class=" primary-text">Refund - </span> <span
                                class="order_no"></span></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body py-4">
                        <form action="{{ route('orders.apply_refund') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-2">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Order# <span class="order_no"></span></label>
                                    </div>
                                </div>

                                <div class="row align-items-center g-3 mb-3">
                                    <div class="col-lg-12">
                                        <label>Images</label>
                                    </div>
                                    <div class="col-lg-12 ">
                                        <div class="row ">
                                            <div class="col-md-6">
                                                <input type="file" name="image1" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="file" name="image2" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center g-3 mb-3">
                                    <div class="col-lg-12">
                                        <label>Items</label>
                                    </div>
                                    <div class="col-lg-12" id="items">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Reason:</label>
                                        <textarea name="description" class="form-control" required placeholder="Write Reason Of Refund"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Apply</button>
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
@push('head')
    <script>
        function getOrder(id) {

            $.ajax({
                type: "GET",
                url: "/getOrder/" + id,
                success: function(response) {
                    $('.order_no').html(response.data.order_no)
                    $('#items').empty();
                    $.each(response.data.orderitem, function(key, value) {

                        $('#items').append(
                            '<div class="form-group"><input type="checkbox" name="items[]" value="' +
                            value.id + '"><a href="/product-detail/'+value.id+'"><label>' + value.product.name + '</label></a></div>')

                    });

                }
            });

        }
    </script>
@endpush
