@extends('layouts.roamer')
@section('content')

<div class="cover-all-content">
    <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
        <div class="d-flex align-items-center flex-wrap gap-3">
            <h2 class="section-title">Campaign <span class="primary-text">Management</span></h2>
            <div class=" position-relative">
                <input type="search" class=" form-control" placeholder="Search">
                <i class="material-icons position-absolute top-50 translate-middle-y opacity-05" style="right: 10px;">
                    search
                </i>
            </div>
        </div>
        <ul>
            <li><a href="javascript:void(0)" class="btn btn-primary text-uppercase extra-btn-padding-20">Add Campaign</a></li>
        </ul>
    </div>
    <br>
    <br>
    <div class="cover-inner-content">
        <div class="tabs-style-1">
            <!-- Nav tabs -->
            <div class="tabs-links">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="tabv1-1-tab" data-bs-toggle="tab" data-bs-target="#tabv1-1" type="button" role="tab" aria-controls="tabv1-1" aria-selected="true">Mega/A+ Campaigns</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="tabv1-2-tab" data-bs-toggle="tab" data-bs-target="#tabv1-2" type="button" role="tab" aria-controls="tabv1-2" aria-selected="false">Daily Sales</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="tabv1-3-tab" data-bs-toggle="tab" data-bs-target="#tabv1-3" type="button" role="tab" aria-controls="tabv1-3" aria-selected="false">Special Promotions</button>
                    </li>
                </ul>
            </div>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="tabv1-1" role="tabpanel" aria-labelledby="tabv1-1-tab">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="d-flex align-items-center">
                                <div class="form-group m-0">
                                    <div class="custom-select" style="width:100%;">
                                        <select>
                                            <option value="0">Available Campaign</option>
                                            <option value="1">Campaign 1</option>
                                            <option value="1">Campaign 2</option>
                                            <option value="1">Campaign 3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 d-flex align-items-center justify-content-end">
                            <ul class="d-flex align-items-center flex-wrap justify-content-center justify-content-lg-end gap-3">
                                <li>
                                    <div class="checktext">
                                        <input type="radio" name="checkcampaign" id="Allcampaign1" checked>
                                        <label for="Allcampaign1">All ( 100 )</label>
                                    </div>
                                </li>
                                <li><span class="vr"></span></li>
                                <li>
                                    <div class="checktext">
                                        <input type="radio" name="checkcampaign" id="Checkcampaign2">
                                        <label for="Checkcampaign2">Published ( 70 )</label>
                                    </div>
                                </li>
                                <li><span class="vr"></span></li>
                                <li>
                                    <div class="checktext">
                                        <input type="radio" name="checkcampaign" id="Checkcampaign3">
                                        <label for="Checkcampaign3">Unpublished ( 3 )</label>
                                    </div>
                                </li>
                                <li><span class="vr"></span></li>
                                <li>
                                    <div class="checktext">
                                        <input type="radio" name="checkcampaign" id="Checkcampaign4">
                                        <label for="Checkcampaign4">Scheduled ( 15 )</label>
                                    </div>
                                </li>
                                <li><span class="vr"></span></li>
                                <li>
                                    <div class="checktext">
                                        <input type="radio" name="checkcampaign" id="Checkcampaign5">
                                        <label for="Checkcampaign5">Drafts ( 5 )</label>
                                    </div>
                                </li>
                                <li><span class="vr"></span></li>
                                <li>
                                    <div class="checktext">
                                        <input type="radio" name="checkcampaign" id="Checkcampaign6">
                                        <label for="Checkcampaign6">Archived ( 7 )</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="blog-v1 flex-lg-nowrap">
                        <div class="cover-img">
                            <img src="assets/images/blog/1.jpg" alt="">
                        </div>
                        <div class="blog-content d-flex align-items-center flex-wrap gap-5 justify-content-between mt-3 mt-md-0">
                            <div class="flex-1">
                                <div class="d-flex align-items-center flex-wrap gap-2">
                                    <div class=" published-status">
                                        <p class="opacity-1 py-1 px-3">Published</p>
                                    </div>
                                    <p>March 25, 2021 to March 28, 2021</p>
                                </div>
                                <ul>
                                    <li><a href="campaign-detail.php" class="text-truncate">Electronics Essentials 25th to 28th March (All Sellers) </a></li>
                                </ul>
                                <p class=" opacity-08">Minimum Discount: 10% on current price</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>

                                <ul class="d-flex align-items-center flex-wrap gap-3 mt-3">
                                    <li class=" opacity-04">Seller: 525</li>
                                    <li><span class="vr"></span></li>
                                    <li class=" opacity-04">Products: 0</li>
                                </ul>
                            </div>
                            <div class=" text-lg-end">
                                <p class="mb-3">Registration Until: March 23, 2021</p>
                                <ul>
                                    <li><a href="edit-campaign.php" class=" btn btn-primary extra-btn-padding-35 text-uppercase font-weight-500">Edit</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="blog-v1 flex-lg-nowrap">
                        <div class="cover-img">
                            <img src="assets/images/blog/1.jpg" alt="">
                        </div>
                        <div class="blog-content d-flex align-items-center flex-wrap gap-5 justify-content-between mt-3 mt-md-0">
                            <div class="flex-1">
                                <div class=" d-flex align-items-center flex-wrap gap-2">
                                    <div class=" scheduled-status">
                                        <p class="opacity-1 py-1 px-3">Scheduled</p>
                                    </div>
                                    <p>March 25, 2021 to March 28, 2021</p>
                                </div>
                                <ul>
                                    <li><a href="campaign-detail.php" class="text-truncate">Electronics Essentials 25th to 28th March (All Sellers) </a></li>
                                </ul>
                                <p class=" opacity-08">Minimum Discount: 10% on current price</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>

                                <ul class="d-flex align-items-center flex-wrap gap-3 mt-3">
                                    <li class=" opacity-04">Seller: 525</li>
                                    <li><span class="vr"></span></li>
                                    <li class=" opacity-04">Products: 0</li>
                                </ul>
                            </div>
                            <div class=" text-lg-end">
                                <p class="mb-3">Registration Until: March 23, 2021</p>
                                <ul>
                                    <li><a href="javascript:void(0)" class=" btn btn-primary extra-btn-padding-35 text-uppercase font-weight-500">Edit</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="blog-v1 flex-lg-nowrap">
                        <div class="cover-img">
                            <img src="assets/images/blog/1.jpg" alt="">
                        </div>
                        <div class="blog-content d-flex align-items-center flex-wrap gap-5 justify-content-between mt-3 mt-md-0">
                            <div class="flex-1">
                                <div class=" d-flex align-items-center flex-wrap gap-2">
                                    <div class=" unpublished-status">
                                        <p class="opacity-1 py-1 px-3">Unpublished</p>
                                    </div>
                                    <p>March 25, 2021 to March 28, 2021</p>
                                </div>
                                <ul>
                                    <li><a href="campaign-detail.php" class="text-truncate">Electronics Essentials 25th to 28th March (All Sellers) </a></li>
                                </ul>
                                <p class=" opacity-08">Minimum Discount: 10% on current price</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>

                                <ul class="d-flex align-items-center flex-wrap gap-3 mt-3">
                                    <li class=" opacity-04">Seller: 525</li>
                                    <li><span class="vr"></span></li>
                                    <li class=" opacity-04">Products: 0</li>
                                </ul>
                            </div>
                            <div class="text-lg-end">
                                <p class="mb-3">Registration Until: March 23, 2021</p>
                                <ul>
                                    <li><a href="javascript:void(0)" class=" btn btn-primary extra-btn-padding-35 text-uppercase font-weight-500">Edit</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="d-flex align-items-center flex-wrap gap-3 justify-content-center justify-content-lg-between">
                        <p class=" opacity-05 m-0">6 of 480</p>
                        <div class="Cs-pagination">
                            <ul>
                                <li><a href="javascript:void(0);" class="pe-none user-select-none"><i class="material-icons">keyboard_double_arrow_left</i></a></li>
                                <li><a href="javascript:void(0);" class="pe-none user-select-none"><i class="material-icons">chevron_left</i></a></li>
                                <li><a href="javascript:void(0);" class="Cs-activepagination">1</a></li>
                                <li><a href="javascript:void(0);">2</a></li>
                                <li><a href="javascript:void(0);">3</a></li>
                                <li><a href="javascript:void(0);">4</a></li>
                                <li><a href="javascript:void(0);">5</a></li>

                                <li><a href="javascript:void(0);" class=" pe-none user-select-none">...</a></li>
                                <li><a href="javascript:void(0);">10</a></li>
                                <li><a href="javascript:void(0);"><i class="material-icons">chevron_right</i></a></li>
                                <li><a href="javascript:void(0);"><i class="material-icons">keyboard_double_arrow_right</i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tabv1-2" role="tabpanel" aria-labelledby="tabv1-2-tab">
                    <div class="blog-v1 flex-lg-nowrap">
                        <div class="cover-img">
                            <img src="assets/images/blog/1.jpg" alt="">
                        </div>
                        <div class="blog-content d-flex align-items-center flex-wrap gap-5 justify-content-between mt-3 mt-md-0">
                            <div class="flex-1">
                                <div class="d-flex align-items-center flex-wrap gap-2">
                                    <div class=" published-status">
                                        <p class="opacity-1 py-1 px-3">Published</p>
                                    </div>
                                    <p>March 25, 2021 to March 28, 2021</p>
                                </div>
                                <ul>
                                    <li><a href="campaign-detail.php" class="text-truncate">Electronics Essentials 25th to 28th March (All Sellers) </a></li>
                                </ul>
                                <p class=" opacity-08">Minimum Discount: 10% on current price</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>

                                <ul class="d-flex align-items-center flex-wrap gap-3 mt-3">
                                    <li class=" opacity-04">Seller: 525</li>
                                    <li><span class="vr"></span></li>
                                    <li class=" opacity-04">Products: 0</li>
                                </ul>
                            </div>
                            <div class=" text-lg-end">
                                <p class="mb-3">Registration Until: March 23, 2021</p>
                                <ul>
                                    <li><a href="edit-campaign.php" class=" btn btn-primary extra-btn-padding-35 text-uppercase font-weight-500">Edit</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="blog-v1 flex-lg-nowrap">
                        <div class="cover-img">
                            <img src="assets/images/blog/1.jpg" alt="">
                        </div>
                        <div class="blog-content d-flex align-items-center flex-wrap gap-5 justify-content-between mt-3 mt-md-0">
                            <div class="flex-1">
                                <div class=" d-flex align-items-center flex-wrap gap-2">
                                    <div class=" scheduled-status">
                                        <p class="opacity-1 py-1 px-3">Scheduled</p>
                                    </div>
                                    <p>March 25, 2021 to March 28, 2021</p>
                                </div>
                                <ul>
                                    <li><a href="campaign-detail.php" class="text-truncate">Electronics Essentials 25th to 28th March (All Sellers) </a></li>
                                </ul>
                                <p class=" opacity-08">Minimum Discount: 10% on current price</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>

                                <ul class="d-flex align-items-center flex-wrap gap-3 mt-3">
                                    <li class=" opacity-04">Seller: 525</li>
                                    <li><span class="vr"></span></li>
                                    <li class=" opacity-04">Products: 0</li>
                                </ul>
                            </div>
                            <div class=" text-lg-end">
                                <p class="mb-3">Registration Until: March 23, 2021</p>
                                <ul>
                                    <li><a href="javascript:void(0)" class=" btn btn-primary extra-btn-padding-35 text-uppercase font-weight-500">Edit</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="blog-v1 flex-lg-nowrap">
                        <div class="cover-img">
                            <img src="assets/images/blog/1.jpg" alt="">
                        </div>
                        <div class="blog-content d-flex align-items-center flex-wrap gap-5 justify-content-between mt-3 mt-md-0">
                            <div class="flex-1">
                                <div class=" d-flex align-items-center flex-wrap gap-2">
                                    <div class=" unpublished-status">
                                        <p class="opacity-1 py-1 px-3">Unpublished</p>
                                    </div>
                                    <p>March 25, 2021 to March 28, 2021</p>
                                </div>
                                <ul>
                                    <li><a href="campaign-detail.php" class="text-truncate">Electronics Essentials 25th to 28th March (All Sellers) </a></li>
                                </ul>
                                <p class=" opacity-08">Minimum Discount: 10% on current price</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>

                                <ul class="d-flex align-items-center flex-wrap gap-3 mt-3">
                                    <li class=" opacity-04">Seller: 525</li>
                                    <li><span class="vr"></span></li>
                                    <li class=" opacity-04">Products: 0</li>
                                </ul>
                            </div>
                            <div class="text-lg-end">
                                <p class="mb-3">Registration Until: March 23, 2021</p>
                                <ul>
                                    <li><a href="javascript:void(0)" class=" btn btn-primary extra-btn-padding-35 text-uppercase font-weight-500">Edit</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="d-flex align-items-center flex-wrap gap-3 justify-content-center justify-content-lg-between">
                        <p class=" opacity-05 m-0">6 of 480</p>
                        <div class="Cs-pagination">
                            <ul>
                                <li><a href="javascript:void(0);" class="pe-none user-select-none"><i class="material-icons">keyboard_double_arrow_left</i></a></li>
                                <li><a href="javascript:void(0);" class="pe-none user-select-none"><i class="material-icons">chevron_left</i></a></li>
                                <li><a href="javascript:void(0);" class="Cs-activepagination">1</a></li>
                                <li><a href="javascript:void(0);">2</a></li>
                                <li><a href="javascript:void(0);">3</a></li>
                                <li><a href="javascript:void(0);">4</a></li>
                                <li><a href="javascript:void(0);">5</a></li>

                                <li><a href="javascript:void(0);" class=" pe-none user-select-none">...</a></li>
                                <li><a href="javascript:void(0);">10</a></li>
                                <li><a href="javascript:void(0);"><i class="material-icons">chevron_right</i></a></li>
                                <li><a href="javascript:void(0);"><i class="material-icons">keyboard_double_arrow_right</i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tabv1-3" role="tabpanel" aria-labelledby="tabv1-3-tab">
                    <div class="blog-v1 flex-lg-nowrap">
                        <div class="cover-img">
                            <img src="assets/images/blog/1.jpg" alt="">
                        </div>
                        <div class="blog-content d-flex align-items-center flex-wrap gap-5 justify-content-between mt-3 mt-md-0">
                            <div class="flex-1">
                                <div class="d-flex align-items-center flex-wrap gap-2">
                                    <div class=" published-status">
                                        <p class="opacity-1 py-1 px-3">Published</p>
                                    </div>
                                    <p>March 25, 2021 to March 28, 2021</p>
                                </div>
                                <ul>
                                    <li><a href="campaign-detail.php" class="text-truncate">Electronics Essentials 25th to 28th March (All Sellers) </a></li>
                                </ul>
                                <p class=" opacity-08">Minimum Discount: 10% on current price</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>

                                <ul class="d-flex align-items-center flex-wrap gap-3 mt-3">
                                    <li class=" opacity-04">Seller: 525</li>
                                    <li><span class="vr"></span></li>
                                    <li class=" opacity-04">Products: 0</li>
                                </ul>
                            </div>
                            <div class=" text-lg-end">
                                <p class="mb-3">Registration Until: March 23, 2021</p>
                                <ul>
                                    <li><a href="edit-campaign.php" class=" btn btn-primary extra-btn-padding-35 text-uppercase font-weight-500">Edit</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="blog-v1 flex-lg-nowrap">
                        <div class="cover-img">
                            <img src="assets/images/blog/1.jpg" alt="">
                        </div>
                        <div class="blog-content d-flex align-items-center flex-wrap gap-5 justify-content-between mt-3 mt-md-0">
                            <div class="flex-1">
                                <div class=" d-flex align-items-center flex-wrap gap-2">
                                    <div class=" scheduled-status">
                                        <p class="opacity-1 py-1 px-3">Scheduled</p>
                                    </div>
                                    <p>March 25, 2021 to March 28, 2021</p>
                                </div>
                                <ul>
                                    <li><a href="campaign-detail.php" class="text-truncate">Electronics Essentials 25th to 28th March (All Sellers) </a></li>
                                </ul>
                                <p class=" opacity-08">Minimum Discount: 10% on current price</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>

                                <ul class="d-flex align-items-center flex-wrap gap-3 mt-3">
                                    <li class=" opacity-04">Seller: 525</li>
                                    <li><span class="vr"></span></li>
                                    <li class=" opacity-04">Products: 0</li>
                                </ul>
                            </div>
                            <div class=" text-lg-end">
                                <p class="mb-3">Registration Until: March 23, 2021</p>
                                <ul>
                                    <li><a href="javascript:void(0)" class=" btn btn-primary extra-btn-padding-35 text-uppercase font-weight-500">Edit</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="blog-v1 flex-lg-nowrap">
                        <div class="cover-img">
                            <img src="assets/images/blog/1.jpg" alt="">
                        </div>
                        <div class="blog-content d-flex align-items-center flex-wrap gap-5 justify-content-between mt-3 mt-md-0">
                            <div class="flex-1">
                                <div class=" d-flex align-items-center flex-wrap gap-2">
                                    <div class=" unpublished-status">
                                        <p class="opacity-1 py-1 px-3">Unpublished</p>
                                    </div>
                                    <p>March 25, 2021 to March 28, 2021</p>
                                </div>
                                <ul>
                                    <li><a href="campaign-detail.php" class="text-truncate">Electronics Essentials 25th to 28th March (All Sellers) </a></li>
                                </ul>
                                <p class=" opacity-08">Minimum Discount: 10% on current price</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>

                                <ul class="d-flex align-items-center flex-wrap gap-3 mt-3">
                                    <li class=" opacity-04">Seller: 525</li>
                                    <li><span class="vr"></span></li>
                                    <li class=" opacity-04">Products: 0</li>
                                </ul>
                            </div>
                            <div class="text-lg-end">
                                <p class="mb-3">Registration Until: March 23, 2021</p>
                                <ul>
                                    <li><a href="javascript:void(0)" class=" btn btn-primary extra-btn-padding-35 text-uppercase font-weight-500">Edit</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="d-flex align-items-center flex-wrap gap-3 justify-content-center justify-content-lg-between">
                        <p class=" opacity-05 m-0">6 of 480</p>
                        <div class="Cs-pagination">
                            <ul>
                                <li><a href="javascript:void(0);" class="pe-none user-select-none"><i class="material-icons">keyboard_double_arrow_left</i></a></li>
                                <li><a href="javascript:void(0);" class="pe-none user-select-none"><i class="material-icons">chevron_left</i></a></li>
                                <li><a href="javascript:void(0);" class="Cs-activepagination">1</a></li>
                                <li><a href="javascript:void(0);">2</a></li>
                                <li><a href="javascript:void(0);">3</a></li>
                                <li><a href="javascript:void(0);">4</a></li>
                                <li><a href="javascript:void(0);">5</a></li>

                                <li><a href="javascript:void(0);" class=" pe-none user-select-none">...</a></li>
                                <li><a href="javascript:void(0);">10</a></li>
                                <li><a href="javascript:void(0);"><i class="material-icons">chevron_right</i></a></li>
                                <li><a href="javascript:void(0);"><i class="material-icons">keyboard_double_arrow_right</i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

   @endsection
