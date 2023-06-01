@extends('layouts.app')
@section('content')
    <section class="pt-5">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                <div>
                    <h3 class="font-22px font-weight-500 m-0">My <span class="primary-text">Wallet</span></h3>
                    <small class=" opacity-05 font-14px">{{ count($refund) }} Items</small>
                </div>
                <ul>
                    <li>
                        <a href="/" class="white-btn"><img src="assets/images/icons/arrow-right.svg" alt="">
                            Continue Shopping
                        </a>
                    </li>
                </ul>
            </div>
            <br />
            <br />
            <br />
            <div class="row g-4 g-md-5">
                <div class="col-md-4">
                    <div class="wallet-info">
                        <h3 class="font-22px font-weight-600 m-0">My <span class="primary-text">Wallet</span>
                            Rs. ({{ isset($wallet) ? $wallet : '0' }} PKR)</h3>
                        <div class="row mt-4 gy-4">
                            <div class="col-6">
                                <div class="box">
                                    <p>Approve Refunds Amount</p>
                                    <h3>Rs. {{ isset($wallet) ? $wallet : '0' }} Pkr</h3>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="box">
                                    <p>Refunds</p>
                                    <h3>({{ count(getApprovedRefunds(Session('customer')['id'])) }})</h3>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="box">
                                    <p>UnApprove Refunds Amount</p>
                                    <h3>Rs. {{ getUnApprovedRefunds(Session('customer')['id'])->sum('amount') }} Pkr</h3>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="box">
                                    <p>UnApprove Refunds</p>
                                    <h3>({{ count(getUnApprovedRefunds(Session('customer')['id'])) }})</h3>
                                </div>
                            </div>
                        </div>
                        <br>
                        {{-- <ul class="wallet-links d-flex align-items-center gap-1 mt-3">
                            <li class=" flex-fill"><a href="#"
                                    class="btn btn-light w-100 justify-content-center text-uppercase">Withdraw</a></li>
                            <li class=" flex-fill"> <a href="#"
                                    class="btn btn-primary w-100 justify-content-center text-uppercase">Deposit</a></li>
                        </ul> --}}
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row gy-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="" style="width:100%;">
                                    <select class="form-control" name="transaction" id="transaction">
                                        <option value="0">All Transactions</option>
                                        @foreach ($transactions as $item)
                                            <option value="{{ $item->order_no }}" <?php if ($order_no == $item->order_no) {
                                                echo 'selected';
                                            } ?>>{{ $item->order_no }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="table-v1 ">
                                <div class="table-responsive">
                                    <table class="table align-middle wallet-table mb-0">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Order#</th>
                                                <th>Item</th>
                                                <th>Description</th>
                                                <th>Type</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($refund as $item)
                                                <tr>
                                                    <td class="opacity-08">
                                                        {{ date('F, j Y', strtotime($item->created_at)) }}
                                                    </td>
                                                    <td class="opacity-08">
                                                        {{ $item->order->order_no }}
                                                    </td>
                                                    <td class="opacity-08">
                                                        {{ $item->item->name }}
                                                    </td>
                                                    <td class="width-30">
                                                        <span class=" text-truncate opacity-06" style="width: 200px;">
                                                            {{ $item->description }}
                                                        </span>
                                                    </td>
                                                    <td class="opacity-06">{{ $item->type }}</td>
                                                    <td class="opacity-08">Pkr. {{ $item->amount }}</td>
                                                    <td>
                                                        @if ($item->status == 1)
                                                            <div class="active-status">
                                                                <p>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                        height="16" fill="currentColor"
                                                                        class="bi bi-check2" viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
                                                                    </svg>
                                                                    Success
                                                                </p>
                                                            </div>
                                                        @elseif($item->status == 0)
                                                            <div class="deactive-status">
                                                                <p>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                        height="16" fill="currentColor"
                                                                        class="bi bi-stopwatch" viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M8.5 5.6a.5.5 0 1 0-1 0v2.9h-3a.5.5 0 0 0 0 1H8a.5.5 0 0 0 .5-.5V5.6z" />
                                                                        <path
                                                                            d="M6.5 1A.5.5 0 0 1 7 .5h2a.5.5 0 0 1 0 1v.57c1.36.196 2.594.78 3.584 1.64a.715.715 0 0 1 .012-.013l.354-.354-.354-.353a.5.5 0 0 1 .707-.708l1.414 1.415a.5.5 0 1 1-.707.707l-.353-.354-.354.354a.512.512 0 0 1-.013.012A7 7 0 1 1 7 2.071V1.5a.5.5 0 0 1-.5-.5zM8 3a6 6 0 1 0 .001 12A6 6 0 0 0 8 3z" />
                                                                    </svg>
                                                                    Pending
                                                                </p>
                                                            </div>
                                                        @elseif($item->status == 2)
                                                            <div class="deactive-status">
                                                                <p>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                        height="16" fill="currentColor" class="bi bi-x"
                                                                        viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                                    </svg>
                                                                    Declined
                                                                </p>
                                                            </div>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('head')
    <script>
        $('#transaction').on('change', function() {
            var order_no = $(this).val();
            console.log('order: ' + order_no);
            window.location.href = "/my-wallet/filterBy/" + order_no;

        })
    </script>
@endpush
