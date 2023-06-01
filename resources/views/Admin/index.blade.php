@extends('layouts.admin')
@section('content')
    <div class="cover-all-content">
        <!--@if (checkRoamerVendors(Auth::user()->id))-->
        <!--    <div class="alert alert-warning p-4 alert-dismissible fade show shadow-sm d-flex gap-4" role="alert">-->
        <!--        <div>-->
        <!--            <i class="bi bi-exclamation-square-fill" style="font-size: 40px;"></i>-->
        <!--        </div>-->
        <!--        <div>-->
        <!--            <h4 class="alert-heading">Welcome {{ Auth::user()->getName() }}!</h4>-->
        <!--            <p class="m-0">-->
        <!--                Dear {{ Auth::user()->getName() }}! welcome to your dashboard.-->
        <!--                To continue selling and access all roamer features of your Bazar dashboard,-->
        <!--                please fill out your account details and add a vendor and a product first.-->
        <!--            </p>-->
        <!--        </div>-->
        <!--        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>-->
        <!--    </div>-->
        <!--@endif-->
        <div class="d-flex align-items-center justify-content-between flex-wrap">
            <h2 class="section-title">Performance</h2>
        </div>
        <br>
        <br>
        <form action="{{ route('admindashboad.filter') }}" method="get">
            <div class="row mb-3">
                <div class="col-12 d-flex align-items-center flex-wrap gap-2">
                    @if (Auth::user()->user_type == 1)
                        <div class="form-group m-0">
                            <div class="" style="width:100%;">
                                <select class="select-box" name="roamer_id">
                                    <option value="1">Roamer wise</option>
                                    @foreach ($roamers as $roamer)
                                        <option value="{{ $roamer->id }}">
                                            {{ $roamer->first_name . ' ' . $roamer->last_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif
                    <div class="form-group m-0">
                        <select onChange="dropdownTip(this.value)" name="day" class=" form-control arrow-drop-down">
                            <option selected value="Today">Today</option>
                            <option value="This Month">This Month</option>
                            <option value="This Week">This Week</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex align-items-center flex-wrap gap-1">
                        <div class="form-group m-0 StartEndDate-v1">
                            <input type="text" class="reviewStartDate" name="start_date" placeholder="Start Date" />
                            <input type="text" class="reviewEndDate" name="end_date" placeholder="- End Date" />
                            <i class="bi bi-calendar4"></i>
                        </div>
                        <ul>
                            <li>
                                <button type="submit" class="btn btn-primary"><i class="material-icons">
                                        search
                                    </i></button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </form>
        <br>
        <br>
        <div class="cover-inner-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Order</h4>
                            <br>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body2">
                                            <div class="D-order-info">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div>
                                                        <h4 class="card-title m-0">
                                                            <?php if (totalOrders() != 0) {
                                                                echo number_format((calculateOrderShipped($id) / totalOrders()) * 100);
                                                            } ?>%
                                                        </h4>
                                                        <p class="m-0" style="color: #3FC2A3;">Shipped On Time</p>
                                                    </div>
                                                    <div class="D-icon">
                                                        <img src="{{ asset('assets/admin/images/icons/dashboard/order.svg') }}"
                                                            alt="">
                                                    </div>
                                                </div>
                                                <div class="data-progressBar mt-4">
                                                    <small class="d-block text-end opacity-05 font-11px">
                                                        {{ calculateOrderShipped($id) }} Orders
                                                    </small>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar"
                                                            style="width: <?php if (totalOrders() != 0) {
                                                                echo number_format((calculateOrderShipped($id) / totalOrders()) * 100);
                                                            } ?>%;"
                                                            aria-valuenow="<?php if (totalOrders() != 0) {
                                                                echo number_format((calculateOrderShipped($id) / totalOrders()) * 100);
                                                            } ?>" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body2">
                                            <div class="D-order-info cancell-order-info">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div>
                                                        <h4 class="card-title m-0">
                                                            <?php if (totalOrders() != 0) {
                                                                echo number_format((calculateOrderCancelled($id) / totalOrders()) * 100);
                                                            } ?>%
                                                        </h4>
                                                        <p class="m-0">Cancellation Rate</p>
                                                    </div>
                                                    <div class="D-icon Dc-icon p-3">
                                                        <img src="{{ asset('assets/admin/images/icons/dashboard/cancell.svg') }}"
                                                            alt="">
                                                    </div>
                                                </div>
                                                <div class="data-progressBar  mt-4">
                                                    <small
                                                        class="d-block text-end opacity-05 font-11px">{{ calculateOrderCancelled($id) }}
                                                        Orders</small>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar"
                                                            style="width: <?php if (totalOrders() != 0) {
                                                                echo number_format((calculateOrderCancelled($id) / totalOrders()) * 100);
                                                            } ?>%;"
                                                            aria-valuenow="<?php if (totalOrders() != 0) {
                                                                echo number_format((calculateOrderCancelled($id) / totalOrders()) * 100);
                                                            } ?>" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body2">
                                            <div class="D-order-info return-order-info">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div>
                                                        <h4 class="card-title m-0">
                                                            <?php if (totalOrders() != 0) {
                                                                echo number_format((calculateOrderDelivered($id) / totalOrders()) * 100);
                                                            } ?>%
                                                        </h4>
                                                        <p class="m-0">Delivered Orders</p>
                                                    </div>
                                                    <div class="D-icon Dr-icon p-2">
                                                        <img src="{{ asset('assets/admin/images/icons/dashboard/return.svg') }}"
                                                            alt="">
                                                    </div>
                                                </div>
                                                <div class="data-progressBar  mt-4">
                                                    <small
                                                        class="d-block text-end opacity-05 font-11px">{{ calculateOrderDelivered($id) }}
                                                        Orders</small>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar"
                                                            style="width: <?php if (totalOrders() != 0) {
                                                                echo number_format((calculateOrderDelivered($id) / totalOrders()) * 100);
                                                            } ?>%;"
                                                            aria-valuenow="<?php if (totalOrders() != 0) {
                                                                echo number_format((calculateOrderDelivered($id) / totalOrders()) * 100);
                                                            } ?>" aria-valuemin="0"
                                                            aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <h4 class="card-title m-0">Products & Users</h4>
                            <br>
                            <div class="card">
                                <div class="card-body2 lgray-bg-1">
                                    <div class="row g-2">
                                        <div class="col-md-3">
                                            <div class="card">
                                                <div class="card-body2">
                                                    <h4 class="card-title m-0 font-20px">{{ $Tproducts }}</h4>
                                                    <p class="m-0">Total Products</p>
                                                    <ul>
                                                        <li><a href="javascript:void(0)"
                                                                class="circle-chevron position-absolute top-50 translate-middle-y hover-opacity-08"
                                                                style="right: 10px;"><i class="material-icons">
                                                                    chevron_right
                                                                </i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card">
                                                <div class="card">
                                                    <div class="card-body2">
                                                        <h4 class="card-title m-0 font-20px">{{ $Tattributes }}</h4>
                                                        <p class="m-0">Total Variants </p>
                                                        <ul>
                                                            <li><a href="javascript:void(0)"
                                                                    class="circle-chevron position-absolute top-50 translate-middle-y hover-opacity-08"
                                                                    style="right: 10px;"><i class="material-icons">
                                                                        chevron_right
                                                                    </i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card">
                                                <div class="card">
                                                    <div class="card-body2">
                                                        <h4 class="card-title m-0 font-20px">{{ $active_products }}</h4>
                                                        <p class="m-0">Total Active Products</p>
                                                        <ul>
                                                            <li><a href="javascript:void(0)"
                                                                    class="circle-chevron position-absolute top-50 translate-middle-y hover-opacity-08"
                                                                    style="right: 10px;"><i class="material-icons">
                                                                        chevron_right
                                                                    </i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card">
                                                <div class="card">
                                                    <div class="card-body2">
                                                        <h4 class="card-title m-0 font-20px">{{ $Inactive_products }}</h4>
                                                        <p class="m-0">Total In-Active Products</p>
                                                        <ul>
                                                            <li><a href="javascript:void(0)"
                                                                    class="circle-chevron position-absolute top-50 translate-middle-y hover-opacity-08"
                                                                    style="right: 10px;"><i class="material-icons">
                                                                        chevron_right
                                                                    </i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="d-flex align-items-center justify-content-between flex-wrap">
                <h2 class="section-title">Operations</h2>
            </div>
            <br>
            <br>
            <div class="row g-2">
                <div class="col-md-12">
                    <div class="row g-2">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body pb-5 mb-3">
                                    <h4 class="card-title m-0">Pending <span class="primary-text">Orders</span></h4>
                                    <br>
                                    <div class="row g-2">
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-body2">
                                                    <h4 class="card-title m-0 font-20px">{{ count($pending_24) }}</h4>
                                                    <p class="m-0">Since: < 24h</p>
                                                            <ul>
                                                                <li><a href="javascript:void(0)"
                                                                        class="circle-chevron position-absolute  hover-opacity-08"
                                                                        style="right: 10px; top:1rem;"><i
                                                                            class="material-icons">
                                                                            chevron_right
                                                                        </i></a></li>
                                                            </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-body2">
                                                    <h4 class="card-title m-0 font-20px">{{ count($pending_48) }}</h4>
                                                    <p class="m-0">Since: < 24 - 48h</p>
                                                            <ul>
                                                                <li><a href="javascript:void(0)"
                                                                        class="circle-chevron position-absolute  hover-opacity-08"
                                                                        style="right: 10px; top:1rem;"><i
                                                                            class="material-icons">
                                                                            chevron_right
                                                                        </i></a></li>
                                                            </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-body2">
                                                    <h4 class="card-title m-0 font-20px">{{ count($pending_72) }}</h4>
                                                    <p class="m-0">Since: > 48h</p>
                                                    <ul>
                                                        <li><a href="javascript:void(0)"
                                                                class="circle-chevron position-absolute hover-opacity-08"
                                                                style="right: 10px; top:1rem;"><i class="material-icons">
                                                                    chevron_right
                                                                </i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
                @if (Auth::user()->user_type == 2)
                    <div class="row g-2">
                        <div class="col-lg-12">
                            <h2 class="section-title">Campaign <span class="primary-text">Events</span></h2>
                            <br>
                            <br>
                            <div class="card">
                                <div class="card-body blog-height">
                                    @foreach ($compaign as $compaigns)
                                        <div class="blog-v1">
                                            <div class="cover-img">
                                                <img src="{{ asset('storage/compaign/' . $compaigns->banner_img1) }}"
                                                    alt="">
                                            </div>
                                            <div class="blog-content">
                                                <p>{{ Carbon\Carbon::parse($compaigns->compaign_start)->format('F d, Y') }}
                                                    to
                                                    {{ Carbon\Carbon::parse($compaigns->compaign_end)->format('F d, Y') }}
                                                </p>
                                                <ul>
                                                    <li><a href="campaign-detail.php"
                                                            class="text-truncate">{{ $compaigns->compaign_name }}</a></li>
                                                </ul>
                                                <p class=" opacity-08">Minimum Discount: {{ $compaigns->off_percent }}% on
                                                    current price</p>
                                                <p>Registration Until:
                                                    {{ Carbon\Carbon::parse($compaigns->registeration_end)->format('F d, Y') }}
                                                </p>
                                                <br>
                                                <ul class="d-flex align-items-center flex-wrap gap-3">
                                                    <li><a href="{{ route('admin.compaign.join', $compaigns->id) }}"
                                                            class="btn btn-primary extra-btn-padding-50">Join</a></li>

                                                    <li class=" opacity-04">Products:
                                                        {{ count($compaigns->compaignproduct) }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
        </div>
    @endsection
    @push('adminscript')
        <script type="text/javascript">
            function dropdownTip(value) {
                document.getElementById("result").innerHTML = value;
            }
        </script>
    @endpush
