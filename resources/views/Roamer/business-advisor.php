@extends('layouts.roamer')
@section('content')

<div class="cover-all-content">
    <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
        <h2 class="section-title mb-2 m-lg-0">Business <span class="primary-text">Advisor</span></h2>
    </div>
    <br>
    <br>
    <div class="cover-inner-content">
        <div class="tabs-style-1">
            <!-- Nav tabs -->
            <div class="tabs-links">
                <ul class="nav nav-tabs align-items-center" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="tabv1-1-tab" data-bs-toggle="tab" data-bs-target="#tabv1-1" type="button" role="tab" aria-controls="tabv1-1" aria-selected="true">Dashboard</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link " id="tabv1-2-tab" data-bs-toggle="tab" data-bs-target="#tabv1-2" type="button" role="tab" aria-controls="tabv1-2" aria-selected="false">Product</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link " id="tabv1-3-tab" data-bs-toggle="tab" data-bs-target="#tabv1-3" type="button" role="tab" aria-controls="tabv1-3" aria-selected="false">FAQ’s</button>
                    </li>
                    <li class="nav-item ms-auto d-none d-md-block" role="presentation">
                        <div class="d-flex align-items-center gap-3">
                            <p class="mb-0">Time Zone: GMT +5</p>
                            <div class="vr" style="height: 5px; margin-block: auto;"></div>
                            <p class="mb-0">Currency: PKR ($.)</p>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="tabv1-1" role="tabpanel" aria-labelledby="tabv1-1-tab">
                    <div class="row g-2">
                        <div class="col-lg-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <p class=" opacity-07 font-weight-600">Announcement</p>
                                    <p class="m-0">Attention Sellers! You can now check your overall performance including the number of orders and income generated. Familiarize yourself with Business Advisor through the FAQ section.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <p class=" opacity-07 font-weight-600">Tips and Tricks</p>
                                    <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row g-2">
                        <div class="col-md-3">
                            <div class="form-group m-0">
                                <div class="custom-select" style="width:100%;">
                                    <select>
                                        <option value="0">Vendor wise</option>
                                        <option value="1">Standerd</option>
                                        <option value="1">Pro</option>
                                        <option value="1">Plus</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
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
                    <div class="row">
                        <div class="col-lg-5">
                            <h4 class=" font-15px font-weight-500 mb-4">Key <span class=" primary-text">Metrics</span></h4>
                            <div class="card">
                                <div class="card-body p-4 p-md-5">
                                    <p class=" opacity-07 font-weight-500 mb-2">Chat</p>
                                    <div class="p-3 border border-radius-5px white-bg-clr-02">
                                        <div class="d-flex align-items-center flex-wrap gap-4">
                                            <div class="flex-fill">
                                                <p class="mb-2" style="font-size: 12px;">Response Time</p>
                                                <h3 class="m-0 font-weight-400">100.00%</h3>
                                            </div>
                                            <div class=" vr"></div>
                                            <div class="flex-fill">
                                                <p class="mb-2" style="font-size: 12px;">Response Rate</p>
                                                <h3 class="m-0 font-weight-400">0.00</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="revenue-list">
                                        <ul>
                                            <li>
                                                <div class="revenue-box p-3 border-radius-5px white-bg-clr-02 revenue-active">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <p class="mb-2 opacity-07 font-weight-500">Revenue</p>
                                                    </div>
                                                    <h3 class="mb-3 font-weight-400">0.00</h3>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <small class=" opacity-05">vs Previous Days</small>
                                                                <small class=" opacity-05">-</small>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <small class=" opacity-05">Week over Week</small>
                                                                <small class=" opacity-05">-</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="revenue-box p-3 border-radius-5px white-bg-clr-02">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <p class="mb-2 opacity-07 font-weight-500">Profit</p>
                                                    </div>
                                                    <h3 class="mb-3 font-weight-400">21.92%</h3>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <small class=" opacity-05">vs Previous Days</small>
                                                                <small class=" opacity-05">-</small>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <small class=" opacity-05">Week over Week</small>
                                                                <small class=" opacity-05">-</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="revenue-box p-3 border-radius-5px white-bg-clr-02">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <p class="mb-2 opacity-07 font-weight-500">Conversion Rate</p>
                                                    </div>
                                                    <h3 class="mb-3 font-weight-400">1.92%</h3>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <small class=" opacity-05">vs Previous Days</small>
                                                                <small class=" opacity-05">-</small>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <small class=" opacity-05">Week over Week</small>
                                                                <small class=" opacity-05">-</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <h4 class=" font-15px font-weight-500 mb-4">Best Performing <span class=" primary-text">Vendors</span></h4>
                            <div class="card">
                                <div class="card-body">
                                    <div class="vendor-performing-table">
                                        <table class=" table ">
                                            <thead>
                                                <tr>
                                                    <th class=" font-weight-600 opacity-08">Products ranked by Price</th>
                                                    <th># Of Products</th>
                                                    <th class="text-end">Revenue</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center flex-wrap gap-4">
                                                            <img src="assets/images/user.jpg" alt="user image" class=" border-radius-50px " style="width: 50px; aspect-ratio: 1/1; object-fit: cover;">
                                                            <div>
                                                                <h6 class=" primary-text opacity-1 font-weight-500 m-0 text-capitalize">John Doe</h6>
                                                                <p>Lorem ipsum dolor sit amet</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class=" opacity-06">2357</td>
                                                    <td class="text-end opacity-06">24</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center flex-wrap gap-4">
                                                            <img src="assets/images/user.jpg" alt="user image" class=" border-radius-50px " style="width: 50px; aspect-ratio: 1/1; object-fit: cover;">
                                                            <div>
                                                                <h6 class=" primary-text opacity-1 font-weight-500 m-0 text-capitalize">John Doe</h6>
                                                                <p>Lorem ipsum dolor sit amet</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class=" opacity-06">2357</td>
                                                    <td class="text-end opacity-06">24</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center flex-wrap gap-4">
                                                            <img src="assets/images/user.jpg" alt="user image" class=" border-radius-50px " style="width: 50px; aspect-ratio: 1/1; object-fit: cover;">
                                                            <div>
                                                                <h6 class=" primary-text opacity-1 font-weight-500 m-0 text-capitalize">John Doe</h6>
                                                                <p>Lorem ipsum dolor sit amet</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class=" opacity-06">2357</td>
                                                    <td class="text-end opacity-06">24</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center flex-wrap gap-4">
                                                            <img src="assets/images/user.jpg" alt="user image" class=" border-radius-50px " style="width: 50px; aspect-ratio: 1/1; object-fit: cover;">
                                                            <div>
                                                                <h6 class=" primary-text opacity-1 font-weight-500 m-0 text-capitalize">John Doe</h6>
                                                                <p>Lorem ipsum dolor sit amet</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class=" opacity-06">2357</td>
                                                    <td class="text-end opacity-06">24</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center flex-wrap gap-4">
                                                            <img src="assets/images/user.jpg" alt="user image" class=" border-radius-50px " style="width: 50px; aspect-ratio: 1/1; object-fit: cover;">
                                                            <div>
                                                                <h6 class=" primary-text opacity-1 font-weight-500 m-0 text-capitalize">John Doe</h6>
                                                                <p>Lorem ipsum dolor sit amet</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class=" opacity-06">2357</td>
                                                    <td class="text-end opacity-06">24</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center flex-wrap gap-4">
                                                            <img src="assets/images/user2.jpg" alt="user image" class=" border-radius-50px " style="width: 50px; aspect-ratio: 1/1; object-fit: cover;">
                                                            <div>
                                                                <h6 class=" primary-text opacity-1 font-weight-500 m-0 text-capitalize">John Doe</h6>
                                                                <p>Lorem ipsum dolor sit amet</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class=" opacity-06">2357</td>
                                                    <td class="text-end opacity-06">24</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center flex-wrap gap-4">
                                                            <img src="assets/images/user2.jpg" alt="user image" class=" border-radius-50px " style="width: 50px; aspect-ratio: 1/1; object-fit: cover;">
                                                            <div>
                                                                <h6 class=" primary-text opacity-1 font-weight-500 m-0 text-capitalize">John Doe</h6>
                                                                <p>Lorem ipsum dolor sit amet</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class=" opacity-06">2357</td>
                                                    <td class="text-end opacity-06">24</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center flex-wrap gap-4">
                                                            <img src="assets/images/user2.jpg" alt="user image" class=" border-radius-50px " style="width: 50px; aspect-ratio: 1/1; object-fit: cover;">
                                                            <div>
                                                                <h6 class=" primary-text opacity-1 font-weight-500 m-0 text-capitalize">John Doe</h6>
                                                                <p>Lorem ipsum dolor sit amet</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class=" opacity-06">2357</td>
                                                    <td class="text-end opacity-06">24</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center flex-wrap gap-4">
                                                            <img src="assets/images/user2.jpg" alt="user image" class=" border-radius-50px " style="width: 50px; aspect-ratio: 1/1; object-fit: cover;">
                                                            <div>
                                                                <h6 class=" primary-text opacity-1 font-weight-500 m-0 text-capitalize">John Doe</h6>
                                                                <p>Lorem ipsum dolor sit amet</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class=" opacity-06">2357</td>
                                                    <td class="text-end opacity-06">24</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <h4 class=" font-15px font-weight-500 mb-4">Product <span class=" primary-text">Board</span></h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row g-5">
                                        <div class="col-md-6 col-lg-4">
                                            <div class="product-board-card">
                                                <div class="d-flex align-items-center justify-content-between border-bottom pb-4">
                                                    <p class=" opacity-07 font-weight-600 m-0">Products ranked by Profit</p>
                                                    <p class="m-0">Profit</p>
                                                </div>
                                                <ul>
                                                    <li>
                                                        <div class=" d-flex align-items-start gap-5 justify-content-between">
                                                            <div class="d-flex align-items-center flex-wrap flex-lg-nowrap gap-2">
                                                                <img src="assets/images/products/1.png" alt="">
                                                                <a href="javascript:void(0)" class=" default-anchor">Black Pakistan A*my Cotton/ Polyester T-Shirt</a>
                                                            </div>
                                                            <p class="m-0">24</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class=" d-flex align-items-start gap-5 justify-content-between">
                                                            <div class="d-flex align-items-center flex-wrap flex-lg-nowrap gap-2">
                                                                <img src="assets/images/products/1.png" alt="">
                                                                <a href="javascript:void(0)" class=" default-anchor">Black Pakistan A*my Cotton/ Polyester T-Shirt</a>
                                                            </div>
                                                            <p class="m-0">24</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class=" d-flex align-items-start gap-5 justify-content-between">
                                                            <div class="d-flex align-items-center flex-wrap flex-lg-nowrap gap-2">
                                                                <img src="assets/images/products/1.png" alt="">
                                                                <a href="javascript:void(0)" class=" default-anchor">Black Pakistan A*my Cotton/ Polyester T-Shirt</a>
                                                            </div>
                                                            <p class="m-0">24</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class=" d-flex align-items-start gap-5 justify-content-between">
                                                            <div class="d-flex align-items-center flex-wrap flex-lg-nowrap gap-2">
                                                                <img src="assets/images/products/1.png" alt="">
                                                                <a href="javascript:void(0)" class=" default-anchor">Black Pakistan A*my Cotton/ Polyester T-Shirt</a>
                                                            </div>
                                                            <p class="m-0">24</p>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <div class="product-board-card">
                                                <div class="d-flex align-items-center justify-content-between border-bottom pb-4">
                                                    <p class=" opacity-07 font-weight-600 m-0">Products ranked by Quantity </p>
                                                    <p class="m-0">Quantity</p>
                                                </div>
                                                <ul>
                                                    <li>
                                                        <div class=" d-flex align-items-start gap-5 justify-content-between">
                                                            <div class="d-flex align-items-center flex-wrap flex-lg-nowrap gap-2">
                                                                <img src="assets/images/products/1.png" alt="">
                                                                <a href="javascript:void(0)" class=" default-anchor">Black Pakistan A*my Cotton/ Polyester T-Shirt</a>
                                                            </div>
                                                            <p class="m-0">24</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class=" d-flex align-items-start gap-5 justify-content-between">
                                                            <div class="d-flex align-items-center flex-wrap flex-lg-nowrap gap-2">
                                                                <img src="assets/images/products/1.png" alt="">
                                                                <a href="javascript:void(0)" class=" default-anchor">Black Pakistan A*my Cotton/ Polyester T-Shirt</a>
                                                            </div>
                                                            <p class="m-0">24</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class=" d-flex align-items-start gap-5 justify-content-between">
                                                            <div class="d-flex align-items-center flex-wrap flex-lg-nowrap gap-2">
                                                                <img src="assets/images/products/1.png" alt="">
                                                                <a href="javascript:void(0)" class=" default-anchor">Black Pakistan A*my Cotton/ Polyester T-Shirt</a>
                                                            </div>
                                                            <p class="m-0">24</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class=" d-flex align-items-start gap-5 justify-content-between">
                                                            <div class="d-flex align-items-center flex-wrap flex-lg-nowrap gap-2">
                                                                <img src="assets/images/products/1.png" alt="">
                                                                <a href="javascript:void(0)" class=" default-anchor">Black Pakistan A*my Cotton/ Polyester T-Shirt</a>
                                                            </div>
                                                            <p class="m-0">24</p>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <div class="product-board-card">
                                                <div class="d-flex align-items-center justify-content-between border-bottom pb-4">
                                                    <p class=" opacity-07 font-weight-600 m-0">Products ranked by Revenue </p>
                                                    <p class="m-0">Revenue</p>
                                                </div>
                                                <ul>
                                                    <li>
                                                        <div class=" d-flex align-items-start gap-5 justify-content-between">
                                                            <div class="d-flex align-items-center flex-wrap flex-lg-nowrap gap-2">
                                                                <img src="assets/images/products/1.png" alt="">
                                                                <a href="javascript:void(0)" class=" default-anchor">Black Pakistan A*my Cotton/ Polyester T-Shirt</a>
                                                            </div>
                                                            <p class="m-0">24</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class=" d-flex align-items-start gap-5 justify-content-between">
                                                            <div class="d-flex align-items-center flex-wrap flex-lg-nowrap gap-2">
                                                                <img src="assets/images/products/1.png" alt="">
                                                                <a href="javascript:void(0)" class=" default-anchor">Black Pakistan A*my Cotton/ Polyester T-Shirt</a>
                                                            </div>
                                                            <p class="m-0">24</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class=" d-flex align-items-start gap-5 justify-content-between">
                                                            <div class="d-flex align-items-center flex-wrap flex-lg-nowrap gap-2">
                                                                <img src="assets/images/products/1.png" alt="">
                                                                <a href="javascript:void(0)" class=" default-anchor">Black Pakistan A*my Cotton/ Polyester T-Shirt</a>
                                                            </div>
                                                            <p class="m-0">24</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class=" d-flex align-items-start gap-5 justify-content-between">
                                                            <div class="d-flex align-items-center flex-wrap flex-lg-nowrap gap-2">
                                                                <img src="assets/images/products/1.png" alt="">
                                                                <a href="javascript:void(0)" class=" default-anchor">Black Pakistan A*my Cotton/ Polyester T-Shirt</a>
                                                            </div>
                                                            <p class="m-0">24</p>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tabv1-2" role="tabpanel" aria-labelledby="tabv1-2-tab">
                    <div class="tabs-style-2 d-flex align-items-start flex-wrap flex-lg-nowrap">
                        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <p>Product</p>
                            <button class="nav-link active" id="tabv2-1-tab" data-bs-toggle="tab" data-bs-target="#tabv2-1" type="button" role="tab" aria-controls="tabv2-1" aria-selected="false">Performance</button>
                            <button class="nav-link" id="tabv2-2-tab" data-bs-toggle="tab" data-bs-target="#tabv2-2" type="button" role="tab" aria-controls="tabv2-2" aria-selected="false">Diagnosis</button>
                        </div>
                        <div class="tab-content pt-0">
                            <div class="tab-pane fade show active" id="tabv2-1" role="tabpanel" aria-labelledby="tabv2-1-tab">
                                <div class="row">
                                    <div class="col-md-6">
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
                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                    <h5 class=" font-15px font-weight-500 m-0">Performance </h5>
                                    <div>
                                        <form action="" class="d-flex align-items-cener flex-wrap gap-1">
                                            <div class="form-group m-0">
                                                <div class="custom-select" style="width:100%;">
                                                    <select>
                                                        <option value="0">All categories</option>
                                                        <option value="1">Standerd</option>
                                                        <option value="1">Pro</option>
                                                        <option value="1">Plus</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group m-0">
                                                <div class="custom-select" style="width:100%;">
                                                    <select>
                                                        <option value="0">All Brands</option>
                                                        <option value="1">Standerd</option>
                                                        <option value="1">Pro</option>
                                                        <option value="1">Plus</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group m-0">
                                                <div class="input-group">
                                                    <input type="search" placeholder="Search product name" class=" form-control">
                                                    <ul>
                                                        <li><a href="javascript:void(0)" class="btn btn-primary"><i class="material-icons">
                                                                    search
                                                                </i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="form-group m-0">
                                                <ul>
                                                    <li><a href="javascript:void(0)" class="d-flex gray-btn-100"><i class="bi bi-box-arrow-in-down"></i> Download</a></li>
                                                </ul>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <br>
                                <div class="card">
                                    <div class="card-body">
                                        <p class=" opacity-07 font-weight-600">Traffic</p>
                                        <ul class="d-flex align-items-center flex-wrap gap-3 gap-md-5">
                                            <li>
                                                <div class="input-group align-items-center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="Visitors">
                                                        <label class="form-check-label" for="Visitors">
                                                            Visitors
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="input-group align-items-center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="Buyers">
                                                        <label class="form-check-label" for="Buyers">
                                                            Buyers
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="input-group align-items-center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="Orders">
                                                        <label class="form-check-label" for="Orders">
                                                            Orders
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="input-group align-items-center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="Units-Sold">
                                                        <label class="form-check-label" for="Units-Sold">
                                                            Units Sold
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="input-group align-items-center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="Revenue">
                                                        <label class="form-check-label" for="Revenue">
                                                            Revenue
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="input-group align-items-center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="Conversion">
                                                        <label class="form-check-label" for="Conversion">
                                                            Conversion Rate
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <br>
                                <div class="datatable-v1 style-pagination">
                                    <table class="myDataTable display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Product Name</th>
                                                <th>Visitors</th>
                                                <th>Buyers</th>
                                                <th>Orders</th>
                                                <th>Profit</th>
                                                <th>Revenue</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php for ($i = 1; $i < 15; $i++) { ?>
                                                <tr>
                                                    <td class="opacity-04"><?php echo $i ?></td>
                                                    <td>
                                                        <div class="d-flex align-items-center flex-wrap flex-lg-nowrap gap-2">
                                                            <img src="assets/images/products/<?php echo $i ?>.png" alt="" class="border border-radius-5px bg-white p-1" style="width:50px; aspect-ratio: 1/1; object-fit: contain;">
                                                            <div>
                                                                <a href="javascript:void(0)" class="text-dark opacity-05 primary-hover-clr">Anti Noise EarMuffs</a>
                                                                <small class=" opacity-05 d-block">148392353</small>
                                                            </div>
                                                        </div>

                                                    </td>
                                                    <td class="  text-uppercase">
                                                        <p class="opacity-04">1</p>
                                                    </td>
                                                    <td>
                                                        <p class="opacity-04">1</p>
                                                    </td>
                                                    <td>
                                                        <p class="opacity-04">1</p>
                                                    </td>
                                                    <td>
                                                        <p class=" opacity-04">500</p>
                                                    </td>
                                                    <td>
                                                        <p class=" opacity-04">1,500</p>
                                                    </td>

                                                </tr>


                                            <?php } ?>


                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tabv2-2" role="tabpanel" aria-labelledby="tabv2-2-tab">
                                <br>
                                <div class="d-flex align-items-center justify-content-between gap-3">
                                    <h5 class=" font-15px font-weight-500 m-0">Performance </h5>
                                    <ul class="d-flex align-items-center flex-wrap justify-content-center justify-content-lg-end gap-3">
                                        <li>
                                            <div class="checktext">
                                                <input type="radio" name="vendorcheck" id="Allproduct" checked="">
                                                <label for="Allproduct">Short of Stock ( 0 )</label>
                                            </div>
                                        </li>
                                        <li><span class="vr"></span></li>
                                        <li>
                                            <div class="checktext">
                                                <input type="radio" name="vendorcheck" id="liveproduct">
                                                <label for="liveproduct">Low Conversion Rate ( 0 )</label>
                                            </div>
                                        </li>
                                        <li><span class="vr"></span></li>
                                        <li>
                                            <div class="checktext">
                                                <input type="radio" name="vendorcheck" id="imagemissingproduct">
                                                <label for="imagemissingproduct">Revenue Dropping ( 0 )</label>
                                            </div>
                                        </li>
                                        <li><span class="vr"></span></li>
                                        <li>
                                            <div class="checktext">
                                                <input type="radio" name="vendorcheck" id="poorqualityproduct">
                                                <label for="poorqualityproduct">Not Selling ( 0 )</label>
                                            </div>
                                        </li>
                                        <li><span class="vr"></span></li>
                                        <li>
                                            <div class="checktext">
                                                <input type="radio" name="vendorcheck" id="soldoutproduct">
                                                <label for="soldoutproduct">High Revenue Loss ( 3 )</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <br>
                                <div class="diagnosis-card">
                                    <div class="card white-bg-clr-03">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center gap-4">
                                                <i class="bi bi-info-circle opacity-01 font-30px"></i>
                                                <div>
                                                    <p class=" opacity-06 mb-1 font-weight-600">Short of Stock</p>
                                                    <div class="d-flex align-items-center flex-wrap gap-5">
                                                        <p class="m-0">Product is estimated to be out of stock within 7 days.</p>
                                                        <p class="m-0">Tip: Restock soon to prevent further revenue loss.</p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="datatable-v1 style-pagination">
                                    <table class="display Diagnosis-table" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Product Name</th>
                                                <th>Days to Out of Stock</th>
                                                <th>Stock Yesterday</th>
                                                <th>Avg Units Sold L30D</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="tab-pane " id="tabv1-3" role="tabpanel" aria-labelledby="tabv1-3-tab">
                    <div class="width-100 width-lg-70 mx-auto">
                        <h5 class=" font-15px">Frequently Asked <span class=" primary-text">Questions</span></h5>
                        <br>
                        <div class="according-style-1">
                            <div class="accordion" id="accordionExample">
                                <?php for ($i = 1; $i <= 6; $i++) { ?>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#according-st-2-<?php echo $i ?>" aria-expanded="false" aria-controls="collapseOne">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit?
                                            </button>
                                        </h2>
                                        <div id="according-st-2-<?php echo $i ?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cupiditate dolores excepturi perspiciatis? Earum dolorem amet dolorum explicabo enim, id sapiente nulla, eius vero fuga molestiae ab libero repellendus, unde suscipit!</p>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>

                        </div>
                    </div>

                </div>



            </div>
        </div>

    </div>

   @endsection
    <script>
        $('.Diagnosis-table').DataTable({
            responsive: true,
            searching: false,


            "ordering": false,

            "pagingType": "full_numbers",
            "language": {
                "paginate": {
                    "first": "<i class='material-icons'>keyboard_double_arrow_left</i>",
                    "last": "<i class='material-icons'>keyboard_double_arrow_right</i>",
                    "next": "<i class='material-icons'>chevron_right</i>",
                    "previous": "<i class='material-icons'>chevron_left</i>"
                },
            },
            "oLanguage": {
                "sEmptyTable": "<div class='d-flex align-items-center justify-content-center gap-3'><i class='bi bi-info-circle opacity-02 font-30px'></i> Good job! No Product in this diagnosis.</div>"
            },
        })
    </script>
