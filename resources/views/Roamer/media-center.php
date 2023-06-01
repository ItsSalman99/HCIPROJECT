@extends('layouts.roamer')
@section('content')

<div class="cover-all-content">
    <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
        <h2 class="section-title">Media <span class="primary-text">Center</span></h2>
        <div class="usagebar d-flex align-items-center gap-2">
            <p>Usage</p>
            <div class="progress" style="    height: 7px; width: 227px;">
                <div class="progress-bar" role="progressbar" style="width: 10%;" aria-valuenow="3" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p>10/500 MB</p>
        </div>
    </div>
    <br>
    <br>
    <div class="row g-4 g-lg-0">
        <div class="col-md-4">
            <div class="d-flex align-items-center gap-1">
                <input type="text" class="form-control" placeholder="Brand name">
                <ul class="d-flex align-items-center gap-3">
                    <li><a href="javascript:void(0)" class="btn btn-primary"><i class="material-icons">
                                search
                            </i></a></li>
                    <li><a href="javascript:void(0)" class=" default-anchor text-decoration-underline">Advanced</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-8 d-flex flex-wrap align-items-center justify-content-center justify-content-md-end">
            <ul class="d-flex align-items-center gap-1">
                <li><a href="javascript:void(0)" class="gray-btn-100 gap-2"><svg xmlns="http://www.w3.org/2000/svg" width="19" height="15" viewBox="0 0 19 15">
                            <path d="M18.7788 6.80597C18.4903 6.33256 17.9801 6.05004 17.4139 6.05004H16.0005V3.41565C16.0005 2.77977 15.4726 2.26262 14.8237 2.26262H7.90502C7.89487 2.26262 7.88806 2.25967 7.8853 2.2579L6.64707 0.498156C6.42746 0.186182 6.06535 0 5.67831 0H1.17677C0.527794 0 0 0.517304 0 1.15303V13.7908C0 14.4415 0.540695 14.971 1.20547 14.971H15.2092C15.4273 14.971 15.6158 14.843 15.707 14.6573L15.7074 14.6574L18.8455 8.25315C19.073 7.78902 19.048 7.248 18.7788 6.80597ZM1.17677 1.13123H5.67831C5.71165 1.13123 5.73426 1.14611 5.74137 1.15628L6.98149 2.91853C7.19081 3.21607 7.5361 3.39385 7.90502 3.39385H14.8237C14.8626 3.39385 14.8823 3.41241 14.8872 3.41904V6.05004H4.81305C4.18828 6.05004 3.62005 6.40783 3.36535 6.96166L1.11328 11.8588V1.15642C1.11821 1.14979 1.13792 1.13123 1.17677 1.13123ZM17.8489 7.74896L14.8645 13.8397H1.43117L4.37397 7.44067C4.44529 7.28556 4.62185 7.18128 4.81305 7.18128H17.4139C17.5917 7.18128 17.7481 7.26362 17.8322 7.40149C17.8795 7.47911 17.9206 7.6024 17.8489 7.74896Z" fill="#7B7B7B" />
                        </svg> New Folder</a></li>
                <li><a href="javascript:void(0)" class=" gray-btn-100 gap-2"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15">
                            <path d="M13.0833 0H1.91675C0.859834 0 0 0.858203 0 1.91308V13.058C0 14.1128 0.859834 14.971 1.91675 14.971H13.0833C14.1402 14.971 15 14.1128 15 13.058V1.91308C15 0.858203 14.1402 0 13.0833 0ZM14.1165 13.058C14.1165 13.6266 13.653 14.0892 13.0833 14.0892H1.91675C1.34701 14.0892 0.883506 13.6266 0.883506 13.058V11.4496L3.79137 8.9802C3.89748 8.89008 4.05229 8.88923 4.15939 8.978L5.9809 10.4876C6.15653 10.6332 6.41435 10.6212 6.57574 10.46L10.9037 6.13374C10.982 6.05552 11.0732 6.04792 11.1208 6.05035C11.1682 6.05277 11.2583 6.06967 11.3281 6.15549L14.1165 9.58217V13.058H14.1165ZM14.1165 8.18334L12.0139 5.59949C11.8054 5.34323 11.4964 5.18656 11.166 5.16963C10.8359 5.15296 10.5122 5.277 10.2785 5.51063L6.23531 9.55225L4.72389 8.29963C4.28563 7.93641 3.65271 7.94018 3.21882 8.30863L0.883506 10.2918V1.91308C0.883506 1.34444 1.34701 0.881829 1.91675 0.881829H13.0833C13.653 0.881829 14.1165 1.34444 14.1165 1.91308V8.18334Z" fill="#7B7B7B" />
                            <path d="M4.72211 1.8418C3.54742 1.8418 2.5918 2.79562 2.5918 3.96795C2.5918 5.14031 3.54745 6.0941 4.72211 6.0941C5.89676 6.0941 6.85242 5.14031 6.85242 3.96795C6.85242 2.79559 5.89679 1.8418 4.72211 1.8418ZM4.72211 5.2123C4.03461 5.2123 3.47532 4.65407 3.47532 3.96795C3.47532 3.2818 4.03461 2.7236 4.72211 2.7236C5.4096 2.7236 5.96889 3.28182 5.96889 3.96795C5.96889 4.65407 5.4096 5.2123 4.72211 5.2123Z" fill="#7B7B7B" />
                        </svg> Upload Image</a></li>
            </ul>
        </div>
    </div>
    <br />
    <br />
    <br />
    <div class="cover-inner-content">
        <div class="mediacenter d-flex align-items-center justify-content-center justify-content-md-start flex-wrap">
            <div class="mediacenter-box d-flex align-items-center gap-3">
                <img src="assets/images/products/1.png" alt="" class="small-product-image">
                <div>
                    <ul>
                        <li><a href="javascript:void(0)" class="  black-anchor text-truncate" style="width: 80px;">HTB1iutWlM...</a></li>
                    </ul>
                    <p class=" primary-text font-weight-600 m-0">650 x 891</p>
                </div>
            </div>
            <div class="mediacenter-box d-flex align-items-center gap-3">
                <img src="assets/images/products/2.png" alt="" class="small-product-image">
                <div>
                    <ul>
                        <li><a href="javascript:void(0)" class="  black-anchor text-truncate" style="width: 80px;">HTB1iutWlM...</a></li>
                    </ul>
                    <p class=" primary-text font-weight-600 m-0">650 x 891</p>
                </div>
            </div>
            <div class="mediacenter-box d-flex align-items-center gap-3">
                <img src="assets/images/products/1.png" alt="" class="small-product-image">
                <div>
                    <ul>
                        <li><a href="javascript:void(0)" class="  black-anchor text-truncate" style="width: 80px;">HTB1iutWlM...</a></li>
                    </ul>
                    <p class=" primary-text font-weight-600 m-0">650 x 891</p>
                </div>
            </div>
            <div class="mediacenter-box d-flex align-items-center gap-3">
                <img src="assets/images/products/3.png" alt="" class="small-product-image">
                <div>
                    <ul>
                        <li><a href="javascript:void(0)" class="  black-anchor text-truncate" style="width: 80px;">HTB1iutWlM...</a></li>
                    </ul>
                    <p class=" primary-text font-weight-600 m-0">650 x 891</p>
                </div>
            </div>
            <div class="mediacenter-box d-flex align-items-center gap-3">
                <img src="assets/images/products/4.png" alt="" class="small-product-image">
                <div>
                    <ul>
                        <li><a href="javascript:void(0)" class="  black-anchor text-truncate" style="width: 80px;">HTB1iutWlM...</a></li>
                    </ul>
                    <p class=" primary-text font-weight-600 m-0">650 x 891</p>
                </div>
            </div>
            <div class="mediacenter-box d-flex align-items-center gap-3">
                <img src="assets/images/products/5.png" alt="" class="small-product-image">
                <div>
                    <ul>
                        <li><a href="javascript:void(0)" class="  black-anchor text-truncate" style="width: 80px;">HTB1iutWlM...</a></li>
                    </ul>
                    <p class=" primary-text font-weight-600 m-0">650 x 891</p>
                </div>
            </div>
            <div class="mediacenter-box d-flex align-items-center gap-3">
                <img src="assets/images/products/6.png" alt="" class="small-product-image">
                <div>
                    <ul>
                        <li><a href="javascript:void(0)" class="  black-anchor text-truncate" style="width: 80px;">HTB1iutWlM...</a></li>
                    </ul>
                    <p class=" primary-text font-weight-600 m-0">650 x 891</p>
                </div>
            </div>
            <div class="mediacenter-box d-flex align-items-center gap-3">
                <img src="assets/images/products/7.png" alt="" class="small-product-image">
                <div>
                    <ul>
                        <li><a href="javascript:void(0)" class="  black-anchor text-truncate" style="width: 80px;">HTB1iutWlM...</a></li>
                    </ul>
                    <p class=" primary-text font-weight-600 m-0">650 x 891</p>
                </div>
            </div>
            <div class="mediacenter-box d-flex align-items-center gap-3">
                <img src="assets/images/products/8.png" alt="" class="small-product-image">
                <div>
                    <ul>
                        <li><a href="javascript:void(0)" class="  black-anchor text-truncate" style="width: 80px;">HTB1iutWlM...</a></li>
                    </ul>
                    <p class=" primary-text font-weight-600 m-0">650 x 891</p>
                </div>
            </div>
            <div class="mediacenter-box d-flex align-items-center gap-3">
                <img src="assets/images/products/9.png" alt="" class="small-product-image">
                <div>
                    <ul>
                        <li><a href="javascript:void(0)" class="  black-anchor text-truncate" style="width: 80px;">HTB1iutWlM...</a></li>
                    </ul>
                    <p class=" primary-text font-weight-600 m-0">650 x 891</p>
                </div>
            </div>
            <div class="mediacenter-box d-flex align-items-center gap-3">
                <img src="assets/images/products/10.png" alt="" class="small-product-image">
                <div>
                    <ul>
                        <li><a href="javascript:void(0)" class="  black-anchor text-truncate" style="width: 80px;">HTB1iutWlM...</a></li>
                    </ul>
                    <p class=" primary-text font-weight-600 m-0">650 x 891</p>
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

   @endsection
