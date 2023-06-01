@extends('layouts.admin')
@section('content')
    <div class="cover-all-content">
        <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
            <h2 class="section-title">Manage <span class="primary-text">Orders</span></h2>
        </div>
        <br>
        <br>
        <div class="cover-inner-content">
            <form action="{{ route('order.filter') }}" method="GET">

                <div class="reviews-top-filter d-flex flex-wrap align-items-center gap-1 mb-3">
                    @if (Auth::user()->user_type == 1)
                        <div class="form-group m-0">
                            <select class="select-box" name="roamer_id" id="roamer_id">
                                <option value="0">Select Roamer</option>
                                @foreach ($roamers as $roamer)
                                    <option value="{{ $roamer->id }}" <?php if (request()->roamer_id == $roamer->id) {
                                        echo 'selected';
                                    } ?>>
                                        {{ $roamer->first_name . ' ' . $roamer->last_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group m-0">
                            <select id="vendor_id" class="select-box" name="vendor_id">
                                <option value="0">Select Vendor</option>
                                @if (request()->vendor_id != null)
                                    @foreach ($vendors as $item)
                                        <option value="{{ $item->id }}" <?php if ($item->id == request()->vendor_id) {
                                            echo 'selected';
                                        } ?>>
                                            {{$item->name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    @endif
                    <div class="form-group m-0">
                        <div class="form-group m-0">
                            <select id="" class="select-box" name="customer">
                                <option value="0">Select Customer</option>
                                @foreach ($customers as $item)
                                    <option value="{{ $item->id }}" <?php if (request()->customer == $item->id) {
                                        echo 'selected';
                                    } ?>>{{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group w-25 m-0">
                        <input type="text" name="order_no" class="form-control" placeholder="Order Number" value="{{ request()->order_no }}">
                    </div>
                    <div class="form-group m-0 StartEndDate-v1">
                        <input type="text" class="reviewStartDate" name="startdate" placeholder="Start Date" value="{{ request()->startdate }}" />
                        <input type="text" class="reviewEndDate" name="enddate" placeholder="- End Date" value="{{ request()->enddate }}" />
                        <i class="bi bi-calendar4"></i>
                    </div>
                    <div class="form-group m-0">
                        <select id="" class="form-control" name="order_status">
                            <option value="0">Select Status</option>
                            <option value="Pending" <?php if (request()->order_status == 'Pending') {
                                echo 'selected';
                            } ?>>Pending</option>
                            <option value="Accepted" <?php if (request()->order_status == 'Accepted') {
                                echo 'selected';
                            } ?>>Accepted</option>
                            <option value="Rejected" <?php if (request()->order_status == 'Rejected') {
                                echo 'selected';
                            } ?>>Rejected</option>
                            <option value="Mark As Shiped" <?php if (request()->order_status == 'Mark As Shiped') {
                                echo 'selected';
                            } ?>>Mark As Shiped</option>
                            <option value="Delivered" <?php if (request()->order_status == 'Delivered') {
                                echo 'selected';
                            } ?>>Delivered</option>
                        </select>
                    </div>
                    <ul>
                        <li>
                            <button type="submit" class="btn btn-primary">
                                <i class="material-icons">
                                    search
                                </i>
                            </button>
                        </li>
                    </ul>

                </div>
            </form>
            <br>
            <div class="cover-table table-v2 overflow-hidden overflow-x-auto">
                <div class="datatable-v1 style-pagination">
                    <table class="myDataTable display" data-searching="true" data-ordering="true" style="width:100%">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                {{-- <th style="opacity:1"><input type="checkbox" class=" form-check-input"
                                    onclick="checkall(this);"></th> --}}
                                <th>Document</th>
                                <th>Order No.</th>
                                <th>Order Date </th>
                                <th>Customer</th>
                                <th>Update Date </th>
                                <th>Payment Method </th>
                                <th>Shipment Method </th>
                                <th>Shipment Price </th>
                                <th>Retail Price</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $key => $orders)
                                <tr>
                                    <td><a href="#." class=" default-black table-row-collapse"
                                            data-bs-toggle="collapse" data-bs-target="#tablerow{{ $key }}"
                                            aria-expanded="false" aria-controls="collapseOne">&nbsp;</a></td>
                                    {{-- <td>
                                    <input type="checkbox" class=" form-check-input">
                                </td> --}}
                                    <td>
                                        <a href="{{ route('generatePDF', ['id' => $orders->id]) }}">
                                            <p class=" default-anchor opacity-1">Invoice</p>
                                        </a>
                                    </td>
                                    <td>
                                        <p class=" default-anchor opacity-1">{{ $orders->order_no }}</p>
                                    </td>
                                    <td>
                                        <p class="opacity-04">{{ $orders->created_at->format('d M Y') }}
                                            ({{ $orders->created_at->format('h:i') }})
                                        </p>
                                    </td>
                                    <td>
                                        <p class="opacity-04">
                                            {{ $orders->customer->name }}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="opacity-04">{{ $orders->updated_at->format('d M Y') }}
                                            ({{ $orders->updated_at->format('h:i') }})</p>
                                    </td>

                                    <td>
                                        <p class=" opacity-04">
                                            {{ $orders->payment_method }}
                                        </p>
                                    </td>
                                    <td>
                                        <p class=" opacity-04">{{ $orders->shipping_method }}</p>
                                    </td>
                                    <td>
                                        <p class=" opacity-04">Rs. {{ $orders->shipping_price }} {{ env('CURRENCY') }}</p>
                                    </td>
                                    <td>
                                        <p class=" opacity-04">${{ $orders->amount }}</p>
                                    </td>
                                    <td>
                                        @if ($orders->order_status == 'Pending')
                                            <div class="pending-status">
                                                <p>
                                                    <a class="changeStatus" data-id="{{ $orders->id }}"
                                                        data-status="Accepted" href="#" style="color: inherit"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-title="Accept">
                                                        Pending
                                                    </a>
                                                </p>
                                            </div>
                                        @elseif($orders->order_status == 'Accepted')
                                            <div class="active-status">
                                                <p>
                                                    <a href="#" class="changeStatus" data-id="{{ $orders->id }}"
                                                        data-status="Mark As Shiped" style="color: inherit"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-title="Mark As Shiped">
                                                        Accepted
                                                    </a>
                                                </p>
                                            </div>
                                        @elseif ($orders->order_status == 'Mark As Shiped')
                                            <div class="available-status">
                                                <p>
                                                    <a href="#" class="changeStatus" data-id="{{ $orders->id }}"
                                                        data-status="Completed" style="color: inherit"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-title="Completed">
                                                        Mark As Shiped
                                                    </a>
                                                    <a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#uploadPic{{ $orders->id }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 8 8"
                                                            fill="none" class="svg-icon">
                                                            <path
                                                                d="M7.6875 4.71875C7.86009 4.71875 8 4.57884 8 4.40625V2.375C8 1.68575 7.43925 1.125 6.75 1.125H6.27561C6.14178 1.125 6.02289 1.03989 5.97977 0.913188L5.88522 0.635422C5.75584 0.255359 5.39919 0 4.99772 0H3.0013C2.60761 0 2.25325 0.248797 2.11955 0.619078L2.01137 0.918641C1.9668 1.04206 1.84869 1.125 1.71745 1.125H1.25C0.56075 1.125 0 1.68575 0 2.375V5.96875C0 6.658 0.56075 7.21875 1.25 7.21875H6.75C7.43925 7.21875 8 6.658 8 5.96875C8 5.79616 7.86009 5.65625 7.6875 5.65625C7.51491 5.65625 7.375 5.79616 7.375 5.96875C7.375 6.31337 7.09462 6.59375 6.75 6.59375H1.25C0.905375 6.59375 0.625 6.31337 0.625 5.96875V2.375C0.625 2.03038 0.905375 1.75 1.25 1.75H1.71745C2.11114 1.75 2.4655 1.5012 2.5992 1.13092L2.70738 0.831359C2.75195 0.707937 2.87006 0.625 3.0013 0.625H4.99772C5.13155 0.625 5.25042 0.710125 5.29356 0.836812L5.38811 1.11458C5.51747 1.49464 5.87413 1.75 6.27561 1.75H6.75C7.09462 1.75 7.375 2.03038 7.375 2.375V4.40625C7.375 4.57884 7.51491 4.71875 7.6875 4.71875Z"
                                                                fill="white"></path>
                                                            <path
                                                                d="M4.01562 2.0625C2.93867 2.0625 2.0625 2.93867 2.0625 4.01562C2.0625 5.09258 2.93867 5.96875 4.01562 5.96875C5.09258 5.96875 5.96875 5.09258 5.96875 4.01562C5.96875 2.93867 5.09258 2.0625 4.01562 2.0625ZM4.01562 5.34375C3.2833 5.34375 2.6875 4.74795 2.6875 4.01562C2.6875 3.2833 3.2833 2.6875 4.01562 2.6875C4.74795 2.6875 5.34375 3.2833 5.34375 4.01562C5.34375 4.74795 4.74795 5.34375 4.01562 5.34375Z"
                                                                fill="white"></path>
                                                        </svg>
                                                    </a>

                                                </p>
                                            </div>
                                        @elseif($orders->order_status == 'Rejected')
                                            <div class="deactive-status">
                                                <p>
                                                    <a href="#" style="color: inherit">
                                                        Rejected
                                                    </a>
                                                </p>
                                            </div>
                                        @elseif($orders->order_status == 'Completed')
                                            <div class="active-status">
                                                <p>
                                                    <a href="#" style="color: inherit">
                                                        Completed
                                                    </a>
                                                </p>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($orders->order_status != 'Rejected')
                                            <div class="d-flex align-items-center gap-3">
                                                <a href="#" data-id="{{ $orders->id }}" class="deleteOrder">
                                                    <i class="material-icons close">
                                                        close
                                                    </i>
                                                </a>

                                            </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr id="tablerow{{ $key }}" class="accordion-collapse collapse"
                                    aria-labelledby="headingOne">
                                    <td colspan="11">
                                        <table class="table align-middle" style="margin-top: 0 !important;">
                                            <thead>
                                                <tr>
                                                    <th>Order No.</th>
                                                    <th>Product ID</th>
                                                    <th>Product Name</th>
                                                    <th>Roamer</th>
                                                    <th>Price</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orders->orderitem as $items)
                                                    @if (Auth::user()->user_type == 2)
                                                        @if (Auth::user()->id == $items->roamer_id)
                                                            <tr>
                                                                <td>
                                                                    <p class=" default-anchor opacity-07">
                                                                        {{ $items->id }}
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p class=" opacity-04">{{ $items->product_id }}</p>
                                                                </td>
                                                                <td>
                                                                    <p class=" opacity-04">{{ $items->name }}</p>
                                                                </td>
                                                                @php
                                                                    $vendor = App\Models\User::where('id', '=', $items->roamer_id)->get();
                                                                @endphp
                                                                <td>
                                                                    <p class=" opacity-04">
                                                                        {{ $items->roamer->getName() }}
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p class="default-anchor opacity-07">
                                                                        {{ $orders->price }}
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    @if ($items->status == 'Pending')
                                                                        <div class="pending-status">
                                                                            <p>
                                                                                <a href="#" style="color: inherit">
                                                                                    Pending
                                                                                </a>
                                                                            </p>
                                                                        </div>
                                                                    @elseif($items->status == 'Available')
                                                                        <div class="available-status">
                                                                            <p>
                                                                                <a class="prodcutStatus"
                                                                                    data-id="{{ $items->id }}"
                                                                                    data-status="Unavailable"
                                                                                    href="#" style="color: inherit"
                                                                                    data-bs-toggle="tooltip"
                                                                                    data-bs-placement="top"
                                                                                    data-bs-title="Unavailable">
                                                                                    Available
                                                                                </a>
                                                                            </p>
                                                                        </div>
                                                                    @elseif($items->status == 'Unavailable')
                                                                        <div class="deactive-status">
                                                                            <p>
                                                                                <a style="color: inherit">
                                                                                    Unavailable
                                                                                </a>
                                                                            </p>
                                                                        </div>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @else
                                                        <tr>
                                                            <td>
                                                                <p class=" default-anchor opacity-07">{{ $items->id }}
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p class=" opacity-04">{{ $items->product_id }}</p>
                                                            </td>
                                                            <td>
                                                                <p class=" opacity-04">{{ $items->name }}</p>
                                                            </td>
                                                            @php
                                                                $vendor = App\Models\User::where('id', '=', $items->roamer_id)->get();
                                                            @endphp
                                                            <td>
                                                                <p class=" opacity-04">
                                                                    @foreach ($vendor as $vendors)
                                                                        {{ $vendors->first_name . ' ' . $vendors->last_name ?? '' }}
                                                                    @endforeach
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p class="default-anchor opacity-07">Rs.
                                                                    {{ $items->price }} {{ env('CURRENCY') }}</p>
                                                            </td>
                                                            <td>
                                                                @if ($items->status == 'Pending')
                                                                    <div class="pending-status">
                                                                        <p>
                                                                            <a href="#" style="color: inherit">
                                                                                Pending
                                                                            </a>
                                                                        </p>
                                                                    </div>
                                                                @elseif($items->status == 'Available')
                                                                    <div class="available-status">
                                                                        <p>
                                                                            <a class="prodcutStatus"
                                                                                data-id="{{ $items->id }}"
                                                                                data-status="Unavailable" href="#"
                                                                                style="color: inherit"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                data-bs-title="Unavailable">
                                                                                Available
                                                                            </a>
                                                                        </p>
                                                                    </div>
                                                                @elseif($items->status == 'Unavailable')
                                                                    <div class="deactive-status">
                                                                        <p>
                                                                            <a style="color: inherit">
                                                                                Unavailable
                                                                            </a>
                                                                        </p>
                                                                    </div>
                                                                @elseif($items->status == 'Shipped')
                                                                    <div class="available-status">
                                                                        <p>
                                                                            <a style="color: inherit">
                                                                                Shipped
                                                                            </a>
                                                                        </p>
                                                                    </div>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <div class="modal fade" id="uploadPic{{ $orders->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                                        <div class="modal-content ">
                                            <div class="card-body pt-4">
                                                <div class="modal-header align-items-start">
                                                    <div>
                                                        <h5 class="card-title font-18px">Upload Picture
                                                        </h5>
                                                    </div>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body pb-4 pt-0">
                                                    <div class="table-v2 order-table">
                                                        <form action="{{ route('order.orderimage') }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" value="{{ $orders->id }}"
                                                                name="order_id">
                                                            <div class="d-flex align-items-center flex-wrap gap-2 mt-4">
                                                                @for ($i = 1; $i <= 4; $i++)
                                                                    <div class="upload-image-box-v1">
                                                                        <label for="productimage{{ $i }}"
                                                                            style="width: auto;">
                                                                            <i class="material-icons">
                                                                                add
                                                                            </i>
                                                                            <p>Select Image</p>
                                                                            <img id="pImage{{ $i }}"
                                                                                alt="">
                                                                            <input type="file"
                                                                                id="productimage{{ $i }}"
                                                                                name="images[]" hidden
                                                                                onchange="document.getElementById('pImage{{ $i }}').src = window.URL.createObjectURL(this.files[0])">
                                                                        </label>
                                                                    </div>
                                                                @endfor

                                                            </div>
                                                            <button type="submit"
                                                                class="btn btn-primary extra-btn-padding-60 text-uppercase mt-3">Place
                                                                Order</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
    <script type="text/javascript">
        function checkall(source) {
            var checkboxes = document.getElementsByClassName('form-check-input');
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i] != source)
                    checkboxes[i].checked = source.checked;
            }
        }
    </script>
    <script>
        var changeStatus = document.getElementsByClassName('changeStatus');
        for (let i = 0; i < changeStatus.length; i++) {
            changeStatus[i].addEventListener('click', function() {
                var orderId = this.getAttribute('data-id');
                var status = this.getAttribute('data-status');
                console.log(orderId + ' ' + status);
                $(document.body).css({
                    'cursor': 'wait'
                });
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: 'changeOrderStatus/' + orderId + '/' + status,
                    type: 'GET',
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        if (res.status == true) {
                            $(document.body).css({
                                'cursor': 'default'
                            });
                            swal(res.msg, {
                                icon: 'success'
                            }).then(() => {
                                window.location.reload()
                            })
                        }
                    }
                })
            })
        }
    </script>
    <script>
        var deleteOrder = document.getElementsByClassName('deleteOrder');
        for (let i = 0; i < deleteOrder.length; i++) {
            deleteOrder[i].addEventListener('click', function() {
                var orderId = this.getAttribute('data-id');
                console.log(orderId + ' ' + status);
                swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this Order!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {

                            $.ajax({
                                url: 'deleteOrder/' + orderId,
                                type: 'GET',
                                cache: false,
                                processData: false,
                                contentType: false,
                                success: function(res) {
                                    if (res.status == true) {
                                        swal(res.msg, {
                                            icon: 'success'
                                        }).then(() => {
                                            window.location.reload()
                                        })
                                    }
                                }
                            })
                        }
                    });
            })
        }
    </script>
    <script>
        var prodcutStatus = document.getElementsByClassName('prodcutStatus');
        for (let i = 0; i < prodcutStatus.length; i++) {
            prodcutStatus[i].addEventListener('click', function() {
                var productId = this.getAttribute('data-id');
                var status = this.getAttribute('data-status');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: 'productStatus/' + productId + '/' + status,
                    type: 'GET',
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        if (res.status == true) {
                            swal(res.msg, {
                                icon: 'success'
                            }).then(() => {
                                window.location.reload()
                            })
                        }
                    }
                })
            })
        }

        $('#roamer_id').on('change', function(e) {

            var id = $(this).val();
            console.log(id);
            $.ajax({
                url: '/admin/vendor/roamer/' + id,
                method: 'GET',
                success: function(response) {
                    $('#vendor_id').empty();
                    $('#vendor_id').append('<option value="0">Select Vendor</option>');
                    $.each(response.data, function(k, v) {
                        $('#vendor_id').append('<option value="' + v.id + '">' + v.name +
                            '</option>')
                    });
                }
            })
        })
    </script>
@endpush
