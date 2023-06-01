@extends('layouts.roamer')
@section('content')

<div class="cover-all-content">
    <div class="d-flex align-items-center justify-content-between flex-wrap">
        <h2 class="section-title">General <span class="primary-text">Finance</span></h2>
    </div>
    <br>
    <br>
    <div class="cover-inner-content">
        <div class="row">
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
        <br>
        <br>
        <div class="row">
            <div class="col-lg-4">
                <div class="card primary-bg-clr-007 primary-border">
                    <div class="card-body2">
                        <div class="d-flex align-items-center justify-content-between">
                            <h4 class="card-title mb-1 font-20px primary-text">4738M</h4>
                            <ul>
                                <li><a href="javascript:void(0)" class="circle-chevron hover-opacity-08 d-flex align-items-center gap-2 font-12px" style="right: 10px;"><span class="primary-text opacity-05">View Details</span> <i class="material-icons primary-bg opacity-1 text-white">
                                            chevron_right
                                        </i></a></li>
                            </ul>
                        </div>
                        <p class="m-0 primary-text opacity-07">Total Profit</p>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="finance-list">
            <ul>
                <li>
                    <div class="row g-4">
                        <div class="col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body2">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h4 class="card-title mb-1 font-20px">200M</h4>
                                        <ul>
                                            <li><a href="javascript:void(0)" class="circle-chevron hover-opacity-08 d-flex align-items-center gap-2 font-12px" style="right: 10px;"><span class=" opacity-05 text-dark">View List</span> <i class="material-icons">
                                                        chevron_right
                                                    </i></a></li>
                                        </ul>
                                    </div>
                                    <p class="m-0 opacity-07">All (1K)</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body2">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h4 class="card-title mb-1 font-20px">1K</h4>
                                        <ul>
                                            <li><a href="javascript:void(0)" class="circle-chevron hover-opacity-08 d-flex align-items-center gap-2 font-12px" style="right: 10px;"><span class=" opacity-05 text-dark">View List</span> <i class="material-icons">
                                                        chevron_right
                                                    </i></a></li>
                                        </ul>
                                    </div>
                                    <p class="m-0 opacity-07">Expenditure (10)</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body2">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h4 class="card-title mb-1 font-20px">12M</h4>
                                        <ul>
                                            <li><a href="javascript:void(0)" class="circle-chevron hover-opacity-08 d-flex align-items-center gap-2 font-12px" style="right: 10px;"><span class=" opacity-05 text-dark">View List</span> <i class="material-icons">
                                                        chevron_right
                                                    </i></a></li>
                                        </ul>
                                    </div>
                                    <p class="m-0 opacity-07">Pending (87)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row g-4">
                        <div class="col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body2">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h4 class="card-title mb-1 font-20px">200M</h4>
                                        <ul>
                                            <li><a href="javascript:void(0)" class="circle-chevron hover-opacity-08 d-flex align-items-center gap-2 font-12px" style="right: 10px;"><span class=" opacity-05 text-dark">View List</span> <i class="material-icons">
                                                        chevron_right
                                                    </i></a></li>
                                        </ul>
                                    </div>
                                    <p class="m-0 opacity-07">Available (187)</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body2">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h4 class="card-title mb-1 font-20px">1K</h4>
                                        <ul>
                                            <li><a href="javascript:void(0)" class="circle-chevron hover-opacity-08 d-flex align-items-center gap-2 font-12px" style="right: 10px;"><span class=" opacity-05 text-dark">View List</span> <i class="material-icons">
                                                        chevron_right
                                                    </i></a></li>
                                        </ul>
                                    </div>
                                    <p class="m-0 opacity-07">Shipped (200)</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body2">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h4 class="card-title mb-1 font-20px">12M</h4>
                                        <ul>
                                            <li><a href="javascript:void(0)" class="circle-chevron hover-opacity-08 d-flex align-items-center gap-2 font-12px" style="right: 10px;"><span class=" opacity-05 text-dark">View List</span> <i class="material-icons">
                                                        chevron_right
                                                    </i></a></li>
                                        </ul>
                                    </div>
                                    <p class="m-0 opacity-07">Delivered (30) </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row g-4">
                        <div class="col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body2">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h4 class="card-title mb-1 font-20px">200M</h4>
                                        <ul>
                                            <li><a href="javascript:void(0)" class="circle-chevron hover-opacity-08 d-flex align-items-center gap-2 font-12px" style="right: 10px;"><span class=" opacity-05 text-dark">View List</span> <i class="material-icons">
                                                        chevron_right
                                                    </i></a></li>
                                        </ul>
                                    </div>
                                    <p class="m-0 opacity-07">Cancelled (30)</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body2">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h4 class="card-title mb-1 font-20px">1K</h4>
                                        <ul>
                                            <li><a href="javascript:void(0)" class="circle-chevron hover-opacity-08 d-flex align-items-center gap-2 font-12px" style="right: 10px;"><span class=" opacity-05 text-dark">View List</span> <i class="material-icons">
                                                        chevron_right
                                                    </i></a></li>
                                        </ul>
                                    </div>
                                    <p class="m-0 opacity-07">Returned (30)</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body2">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h4 class="card-title mb-1 font-20px">12M</h4>
                                        <ul>
                                            <li><a href="javascript:void(0)" class="circle-chevron hover-opacity-08 d-flex align-items-center gap-2 font-12px" style="right: 10px;"><span class=" opacity-05 text-dark">View List</span> <i class="material-icons">
                                                        chevron_right
                                                    </i></a></li>
                                        </ul>
                                    </div>
                                    <p class="m-0 opacity-07">Failed Deliveries (10)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row g-4">
                        <div class="col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body2">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h4 class="card-title mb-1 font-20px">200M</h4>
                                        <ul>
                                            <li><a href="javascript:void(0)" class="circle-chevron hover-opacity-08 d-flex align-items-center gap-2 font-12px" style="right: 10px;"><span class=" opacity-05 text-dark">View List</span> <i class="material-icons">
                                                        chevron_right
                                                    </i></a></li>
                                        </ul>
                                    </div>
                                    <p class="m-0 opacity-07">Received (532)</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body2">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h4 class="card-title mb-1 font-20px">1K</h4>
                                        <ul>
                                            <li><a href="javascript:void(0)" class="circle-chevron hover-opacity-08 d-flex align-items-center gap-2 font-12px" style="right: 10px;"><span class=" opacity-05 text-dark">View List</span> <i class="material-icons">
                                                        chevron_right
                                                    </i></a></li>
                                        </ul>
                                    </div>
                                    <p class="m-0 opacity-07">Penalties (87)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

    </div>

   @endsection
    <script>
        function dropdownTip(value) {
            document.getElementById("result").innerHTML = value;
        }
    </script>
