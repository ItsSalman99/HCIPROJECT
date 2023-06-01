@extends('layouts.admin')
@section('content')
    <div class="cover-all-content">
        <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
            <h2 class="section-title">Manage <span class="primary-text">Order Refunds</span></h2>
        </div>
        <br>
        <br>
        <div class="cover-inner-content">
            <br>
            <div class="cover-table table-v2 overflow-hidden overflow-x-auto">
                <div class="datatable-v1 style-pagination">
                    <table class="myDataTable display" data-searching="true" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Order</th>
                                <th>Images</th>
                                <th>Customer</th>
                                <th>Item</th>
                                <th>Roamer</th>
                                <th>Vendor</th>
                                <th>Amount</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="refunds">
                            @foreach ($refunds as $key => $item)
                                <tr>
                                    <td style="    color: #0068E2;" class=" opacity-07">
                                        {{ $key + 1 }}
                                    </td>
                                    <td style="    color: #0068E2;" class=" opacity-07">
                                        {{ $item->order->id }}
                                    </td>
                                    <td style="    color: #0068E2;" class=" opacity-07">
                                        <div class="d-flex gap-2">
                                            <div>
                                                <img src="{{ $item->image1 }}" alt="">
                                            </div>
                                            <div>
                                                <img src="{{ $item->image2 }}" alt="">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="opacity-05">{{ $item->order->customer->name }}</p>
                                        <p class="opacity-03">{{ $item->order->customer->email }}</p>
                                    </td>
                                    <td style="color: #0068E2;" class=" opacity-07">
                                        {{ $item->item->name }}
                                    </td>
                                    <td style="color: #0068E2;" class=" opacity-07">
                                        {{ $item->item->product->user->getName() }}
                                    </td>

                                    <td style="color: #0068E2;" class=" opacity-07">
                                        {{ $item->item->product->vendor->name }}
                                    </td>
                                    <td style="color: #0068E2; width: 300px;" class=" opacity-07">
                                        <span id="showerror" style="font-size: 12px; color: 'red';"></span>
                                        <input type="text" hidden id="refundID" value="{{ $item->id }}">
                                        <input type="text" class="form-control" value="{{ $item->amount }}"
                                            id="refundamount" <?php if ($item->status == 1 || $item->status == 2) {
                                                echo 'readonly';
                                            } ?>>
                                    </td>
                                    <td>
                                        <div class="active-status">
                                            <p>
                                                {{ $item->type }}
                                            </p>
                                        </div>
                                    </td>
                                    <td>
                                        @if ($item->status == 0)
                                            <div class="deactive-status">
                                                <p>Pending</p>
                                            </div>
                                        @elseif($item->status == 1)
                                            <div class="active-status">
                                                <p>Approved</p>
                                            </div>
                                        @elseif($item->status == 2)
                                            <div class="deactive-status">
                                                <p>Declined</p>
                                            </div>
                                        @endif
                                    </td>

                                    @if ($item->status == 0)
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
                                                                <a href="#." class="dropdown-item" id="approveRefBtn">
                                                                    Approve Refund Request
                                                                </a>

                                                            </li>
                                                            <li>
                                                                <a href="{{ route('order-refund.disapprove', ['id' => $item->id]) }}"
                                                                    class="dropdown-item">
                                                                    Decline Refund Request
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    @else
                                        <td>
                                            <ul>
                                                <li class="dropdown position-relative">
                                                    <a href="javascript:void(0)" class="dropdown-toggle caret-none"
                                                        data-bs-toggle="dropdown" role="button" id="navbarDropdown">
                                                        @if ($item->status == 1)
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="green"
                                                                class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                            </svg>
                                                        @else
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="red" class="bi bi-x-octagon-fill"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zm-6.106 4.5L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z" />
                                                            </svg>
                                                        @endif
                                                    </a>
                                                </li>
                                            </ul>
                                        </td>
                                    @endif

                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        <br>
        <br>
    </div>

    <!-- Modal -->
@endsection
@push('adminscript')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        $('#refundamount').on('keyup', function(e) {

            var amount = $(this).val();
            var id = $('#refundID').val();
            if (amount == "") {
                amount = "undefined";
            }
            $.ajax({
                method: 'GET',
                url: '/admin/orders/change-amount/' + id + '/' + amount,
                success: function(data) {
                    if (data.status == false) {
                        $('#refundamount').css({
                            'border-color': 'red'
                        })
                        $('#showerror').html(data.message)
                        $('#approveRefBtn').attr('disabled', 'disabled');
                    } else if (data.status == true) {
                        $('#refundamount').css({
                            'border-color': '#000'
                        })
                        $('#showerror').html('')
                        $('#approveRefBtn').attr('disabled', 'false');
                    }
                }
            })


        })
    </script>

    <script>
        $('#approveRefBtn').click(function() {

            var amount = $('#refundamount').val()
            var id = $('#refundID').val();

            window.location.href = '/admin/order-refunds/approve/' + id + '/' + amount


        })
    </script>
@endpush
