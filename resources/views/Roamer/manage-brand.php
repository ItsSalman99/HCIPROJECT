@extends('layouts.roamer')
@section('content')

<div class="cover-all-content">
    <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
        <h2 class="section-title">Manage <span class="primary-text">Brands</span></h2>
        <ul>
            <li><a href="addNewBrand.php" class="btn btn-primary text-uppercase extra-btn-padding-25">Add New</a></li>
        </ul>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-md-4">
            <div class="d-flex align-items-center gap-1">
                <input type="text" class="form-control" placeholder="Brand name">
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
        <div class="row g-4">
            <?php for ($i = 0; $i < 8; $i++) { ?>
                <div class="col-md-4 col-lg-3">
                    <div class="brand-box">
                        <div class="cover-img">
                            <img src="assets/images/blog/1.jpg" alt="image">
                            <ul class="edit-pencil">
                                <li><a href="EditBrand.php"><img src="assets/images/icons/pencil.svg" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="content">
                            <img src="assets/images/blog/1.jpg" alt="">
                            <div>
                                <p>Created on: March 25, 2021</p>
                                <ul>
                                    <li><a href="javascript:void(0)" class="text-truncate">Electronics Essentials 25th to 28th March (All Sellers)</a></li>
                                </ul>
                                <p class=" opacity-04">Products: 2000</p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
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

   @endsection
