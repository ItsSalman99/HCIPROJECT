@extends('layouts.roamer')
@section('content')

<div class="cover-all-content">
    <div class="d-flex align-items-center justify-content-between flex-wrap">
        <h2 class="section-title">Performance</h2>
    </div>
    <br>
    <br>
    <div class="row mb-3">
        <div class="col-12 d-flex align-items-center flex-wrap gap-2">
            <div class="form-group m-0">
                <select onChange="dropdownTip(this.value)" name="search_type" class=" form-control arrow-drop-down">
                    <option selected value="Today">Today</option>
                    <option value="This Month">This Month</option>
                    <option value="This Week">This Week</option>
                </select>
            </div>
            <div class="form-group m-0 StartEndDate-v2">
                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-calendar4"></i>
                    <p class="mb-0 opacity-07 text-nowrap"><span id="result">Today</span> <span>-</span></p>
                </div>
                <input type="text" class="reviewStartDate" placeholder="Start Date">
                <span>-</span>
                <input type="text" class="reviewEndDate" placeholder="End Date">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex align-items-center flex-wrap gap-1">
                <div class="form-group m-0 StartEndDate-v1">
                    <input type="text" class="reviewStartDate" placeholder="Start Date" />
                    <input type="text" class="reviewEndDate" placeholder="- End Date" />
                    <i class="bi bi-calendar4"></i>
                </div>
                <ul>
                    <li><a href="javascript:void(0)" class="btn btn-primary"><i class="material-icons">
                                search
                            </i></a></li>
                </ul>
            </div>
        </div>
    </div>
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
                                                    <h4 class="card-title m-0">98%</h4>
                                                    <p class="m-0" style="color: #3FC2A3;">Shipped On Time</p>
                                                </div>
                                                <div class="D-icon">
                                                    <img src="assets/images/icons/dashboard/order.svg" alt="">
                                                </div>
                                            </div>
                                            <div class="data-progressBar mt-4">
                                                <small class="d-block text-end opacity-05 font-11px">100+ Orders</small>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="custom-select">
                                                    <select>
                                                        <option value="0">Weekly</option>
                                                        <option value="1">Week 1</option>
                                                        <option value="1">Week 2</option>
                                                        <option value="1">Week 3</option>
                                                    </select>
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
                                                    <h4 class="card-title m-0">02%</h4>
                                                    <p class="m-0">Cancellation Rate</p>
                                                </div>
                                                <div class="D-icon Dc-icon p-3">
                                                    <img src="assets/images/icons/dashboard/cancell.svg" alt="">
                                                </div>
                                            </div>
                                            <div class="data-progressBar  mt-4">
                                                <small class="d-block text-end opacity-05 font-11px">06 Orders</small>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="custom-select">
                                                <select>
                                                    <option value="0">Weekly</option>
                                                    <option value="1">Week 1</option>
                                                    <option value="1">Week 2</option>
                                                    <option value="1">Week 3</option>
                                                </select>
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
                                                    <h4 class="card-title m-0">10%</h4>
                                                    <p class="m-0">Return Rate</p>
                                                </div>
                                                <div class="D-icon Dr-icon p-2">
                                                    <img src="assets/images/icons/dashboard/return.svg" alt="">
                                                </div>
                                            </div>
                                            <div class="data-progressBar  mt-4">
                                                <small class="d-block text-end opacity-05 font-11px">20 Orders</small>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="custom-select">
                                                <select>
                                                    <option value="0">Weekly</option>
                                                    <option value="1">Week 1</option>
                                                    <option value="1">Week 2</option>
                                                    <option value="1">Week 3</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <h4 class="card-title m-0">Ratings</h4>
                        <br>
                        <div class="card">
                            <div class="card-body2 lgray-bg-1">
                                <div class="row g-2">
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-body2">
                                                <h4 class="card-title m-0 font-20px">100%</h4>
                                                <p class="m-0">Positive Seller Rating</p>
                                                <ul>
                                                    <li><a href="javascript:void(0)" class="circle-chevron position-absolute top-50 translate-middle-y hover-opacity-08" style="right: 10px;"><i class="material-icons">
                                                                chevron_right
                                                            </i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-body2">
                                                <h4 class="card-title m-0 font-20px">5.0</h4>
                                                <p class="m-0">Product Rating</p>
                                                <ul>
                                                    <li><a href="javascript:void(0)" class="circle-chevron position-absolute top-50 translate-middle-y hover-opacity-08" style="right: 10px;"><i class="material-icons">
                                                                chevron_right
                                                            </i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-body2">
                                                <h4 class="card-title m-0 font-20px">0.00%</h4>
                                                <p class="m-0">Response Rating</p>
                                                <ul>
                                                    <li><a href="javascript:void(0)" class="circle-chevron position-absolute top-50 translate-middle-y hover-opacity-08" style="right: 10px;"><i class="material-icons">
                                                                chevron_right
                                                            </i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-body2">
                                                <h4 class="card-title m-0 font-20px">20 Min</h4>
                                                <p class="m-0">Response Time (Min)</p>
                                                <ul>
                                                    <li><a href="javascript:void(0)" class="circle-chevron position-absolute top-50 translate-middle-y hover-opacity-08" style="right: 10px;"><i class="material-icons">
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
        <div class="d-flex align-items-center justify-content-between flex-wrap">
            <h2 class="section-title">Operations</h2>
        </div>
        <br>
        <br>
        <div class="row g-2">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title m-0">New <span class="primary-text">Products</span></h4>
                        <br>
                        <div class="row g-2">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body2">
                                        <h4 class="card-title m-0 font-20px">52</h4>
                                        <p class="m-0">Rejected products(Total)</p>
                                        <ul>
                                            <li><a href="javascript:void(0)" class="circle-chevron position-absolute top-50 translate-middle-y hover-opacity-08" style="right: 10px;"><i class="material-icons">
                                                        chevron_right
                                                    </i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body2">
                                        <h4 class="card-title m-0 font-20px">15</h4>
                                        <p class="m-0">Rejected products(Miss Product Image)</p>
                                        <ul>
                                            <li><a href="javascript:void(0)" class="circle-chevron position-absolute top-50 translate-middle-y hover-opacity-08" style="right: 10px;"><i class="material-icons">
                                                        chevron_right
                                                    </i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body2">
                                        <h4 class="card-title m-0 font-20px">40</h4>
                                        <p class="m-0">Approved products</p>
                                        <ul>
                                            <li><a href="javascript:void(0)" class="circle-chevron position-absolute top-50 translate-middle-y hover-opacity-08" style="right: 10px;"><i class="material-icons">
                                                        chevron_right
                                                    </i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body2">
                                        <h4 class="card-title m-0 font-20px">12</h4>
                                        <p class="m-0">Pending products</p>
                                        <ul>
                                            <li><a href="javascript:void(0)" class="circle-chevron position-absolute top-50 translate-middle-y hover-opacity-08" style="right: 10px;"><i class="material-icons">
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
            <div class="col-md-8">
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
                                                <h4 class="card-title m-0 font-20px">2</h4>
                                                <p class="m-0">Since: 12 hrs</p>
                                                <ul>
                                                    <li><a href="javascript:void(0)" class="circle-chevron position-absolute  hover-opacity-08" style="right: 10px; top:1rem;"><i class="material-icons">
                                                                chevron_right
                                                            </i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body2">
                                                <h4 class="card-title m-0 font-20px">0</h4>
                                                <p class="m-0">Since: 12-24 hrs</p>
                                                <ul>
                                                    <li><a href="javascript:void(0)" class="circle-chevron position-absolute  hover-opacity-08" style="right: 10px; top:1rem;"><i class="material-icons">
                                                                chevron_right
                                                            </i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body2">
                                                <h4 class="card-title m-0 font-20px">0</h4>
                                                <p class="m-0">Since: 24h</p>
                                                <ul>
                                                    <li><a href="javascript:void(0)" class="circle-chevron position-absolute hover-opacity-08" style="right: 10px; top:1rem;"><i class="material-icons">
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body pb-5 mb-3">
                                <h4 class="card-title m-0">Pending Return <span class="primary-text">Orders</span></h4>
                                <br>
                                <div class="row g-2">
                                    <div class="col-md-6 col-lg-4">
                                        <div class="card">
                                            <div class="card-body2">
                                                <h4 class="card-title m-0 font-20px">2</h4>
                                                <p class="m-0">Return request pending</p>
                                                <ul>
                                                    <li><a href="javascript:void(0)" class="circle-chevron position-absolute hover-opacity-08" style="right: 10px; top:1rem;"><i class="material-icons">
                                                                chevron_right
                                                            </i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="card">
                                            <div class="card-body2">
                                                <h4 class="card-title m-0 font-20px">0</h4>
                                                <p class="m-0">Return QC pending</p>
                                                <ul>
                                                    <li><a href="javascript:void(0)" class="circle-chevron position-absolute  hover-opacity-08" style="right: 10px; top:1rem;"><i class="material-icons">
                                                                chevron_right
                                                            </i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="card">
                                            <div class="card-body2">
                                                <h4 class="card-title m-0 font-20px">0</h4>
                                                <p class="m-0">Upload evidence pending</p>
                                                <ul>
                                                    <li><a href="javascript:void(0)" class="circle-chevron position-absolute  hover-opacity-08" style="right: 10px; top:1rem;"><i class="material-icons">
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
        <div class="row g-2">
            <div class="col-lg-8">
                <h2 class="section-title">Campaign <span class="primary-text">Events</span></h2>
                <br>
                <br>
                <div class="card">
                    <div class="card-body blog-height">
                        <?php for ($i = 1; $i <= 5; $i++) { ?>
                            <div class="blog-v1">
                                <div class="cover-img">
                                    <img src="assets/images/blog/1.jpg" alt="">
                                </div>
                                <div class="blog-content">
                                    <p>March 25, 2021 to March 28, 2021</p>
                                    <ul>
                                        <li><a href="campaign-detail.php" class="text-truncate">Electronics Essentials 25th to 28th March (All Sellers)</a></li>
                                    </ul>
                                    <p class=" opacity-08">Minimum Discount: 10% on current price</p>
                                    <p>Registration Until: March 23, 2021</p>
                                    <br>
                                    <ul class="d-flex align-items-center flex-wrap gap-3">
                                        <li><a href="campaign-wizard.php" class="btn btn-primary extra-btn-padding-50">Join</a></li>
                                        <li class=" opacity-04">Seller: 525</li>
                                        <li><span class="vr"></span></li>
                                        <li class=" opacity-04">Products: 0</li>
                                    </ul>
                                </div>
                            </div>
                        <?php } ?>


                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="d-flex align-items-center gap-3">
                    <h2 class="section-title">Seller <span class="primary-text">Picks</span></h2>
                    <span class=" opacity-05 font-weight-500">/</span>
                    <h2 class=" opacity-05 font-weight-500 m-0">Chat</h2>
                </div>
                <br>
                <br>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title m-0">New <span class="primary-text">Products</span></h4>
                        <br>
                        <div class="row g-2">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body2">
                                        <h4 class="card-title m-0 font-20px">0 / 0</h4>
                                        <p class="m-0">Quota Usage</p>
                                        <ul>
                                            <li><a href="javascript:void(0)" class="circle-chevron position-absolute  hover-opacity-08" style="right: 10px; top:1rem;"><i class="material-icons">
                                                        chevron_right
                                                    </i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body2">
                                        <h4 class="card-title m-0 font-20px">0</h4>
                                        <p class="m-0">Page View</p>
                                        <ul>
                                            <li><a href="javascript:void(0)" class="circle-chevron position-absolute  hover-opacity-08" style="right: 10px; top:1rem;"><i class="material-icons">
                                                        chevron_right
                                                    </i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body2">
                                        <h4 class="card-title m-0 font-20px">0</h4>
                                        <p class="m-0">Click Page View</p>
                                        <ul>
                                            <li><a href="javascript:void(0)" class="circle-chevron position-absolute  hover-opacity-08" style="right: 10px; top:1rem;"><i class="material-icons">
                                                        chevron_right
                                                    </i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body2">
                                        <h4 class="card-title m-0 font-20px">PKR 0.00</h4>
                                        <p class="m-0">Total Sales</p>
                                        <ul>
                                            <li><a href="javascript:void(0)" class="circle-chevron position-absolute  hover-opacity-08" style="right: 10px; top:1rem;"><i class="material-icons">
                                                        chevron_right
                                                    </i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body2">
                                        <p class="text-black opacity-08 mb-1 font-weight-500">Challenges</p>
                                        <p>You don't have any challenges.</p>
                                        <hr>
                                        <p class="text-black opacity-08 mb-1 font-weight-500">Advices</p>
                                        <p>You don't have any advices.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

   @endsection
    <script>
        function dropdownTip(value) {
            document.getElementById("result").innerHTML = value;
        }
    </script>
