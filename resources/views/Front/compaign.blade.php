@extends('layouts.app')
@section('content')
    <section class="pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-3 order-1 order-md-0 d-none d-md-block">
                    <div class="cover-filters">
                        <div class="brands-filter">
                            <form action="{{ route('filter.grid') }}" method="POST">
                                @csrf

                                <div class="according-style-2 mt-3">
                                    <div class="accordion" id="accordionExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#according-st-2-1" aria-expanded="true">
                                                    Brand
                                                </button>
                                            </h2>
                                            <div id="according-st-2-1" class="accordion-collapse collapse show">
                                                <div class="accordion-body">
                                                    <ul class="list-items">
                                                        {{-- @php
                                                            dd($brands);
                                                        @endphp --}}
                                                        @foreach ($brands as $brand)
                                                            <li>
                                                                <div class="input-group align-items-center">
                                                                    <div class="form-check">

                                                                        <input class="form-check-input"
                                                                            id="brandid{{ $brand->id }}"
                                                                            name="brand_id{{ $brand->id }}"
                                                                            type="checkbox" value="{{ $brand->id }}">
                                                                        <label class="form-check-label"
                                                                            for="brandid{{ $brand->id }}">
                                                                            {{ $brand->name }}
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endforeach

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#according-st-2-4" aria-expanded="true">
                                                    Price
                                                </button>
                                            </h2>
                                            <div id="according-st-2-4" class="accordion-collapse collapse show">
                                                <div class="accordion-body">
                                                    <div class="filter_price">
                                                        {{-- <div class="price_filter" data-min="0" data-max="12000"
                                                            data-min-value="0" data-max-value="3630" data-price-sign="$"
                                                            class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                                            <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                                            <span tabindex="0"
                                                                class="ui-slider-handle ui-corner-all ui-state-default"></span><span
                                                                tabindex="0"
                                                                class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                                        </div>
                                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                                            <div class="d-flex align-items-center flex-fill">
                                                                <p style="flex: 0.7;" class="price_first">0</p>
                                                                <p class="price_second">3630</p>
                                                            </div>
                                                            <p class="flex-fill text-end">12000</p>
                                                        </div> --}}
                                                        <div
                                                            class="enterprice d-flex align-items-center justify-content-between gap-4">
                                                            <div class="d-flex align-items-center gap-2">
                                                                <p>$</p>
                                                                <input type="number" min="1" name="min_price"
                                                                    class="form-control min" placeholder="Min">
                                                            </div>
                                                            <div class="d-flex align-items-center gap-2">
                                                                <p>-$</p>
                                                                <input type="number" min="1" name="max_price"
                                                                    class="form-control max" placeholder="Max">
                                                                {{-- <ul class="ms-4">
                                                                    <li><a href="#" onclick="clickFilter()"
                                                                            class="text-dark opacity-07 text-decoration-underline">Go</a>
                                                                    </li>
                                                                </ul> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#according-st-2-7" aria-expanded="false">
                                                    Ratings
                                                </button>
                                            </h2>
                                            <div id="according-st-2-7" class="accordion-collapse collapse show">
                                                <div class="accordion-body">
                                                    <ul class="list-items rating-filter">
                                                        <li>
                                                            <div class="input-group align-items-center">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="rating" value="5" id="webrating5">
                                                                    <label class="form-check-label" for="webrating5">
                                                                        <i class="material-icons">
                                                                            grade
                                                                        </i>
                                                                        <i class="material-icons">
                                                                            grade
                                                                        </i>
                                                                        <i class="material-icons">
                                                                            grade
                                                                        </i>
                                                                        <i class="material-icons">
                                                                            grade
                                                                        </i>
                                                                        <i class="material-icons">
                                                                            grade
                                                                        </i>
                                                                        up
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="input-group align-items-center">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="rating" value="4" id="webrating4">
                                                                    <label class="form-check-label" for="webrating4">
                                                                        <i class="material-icons">
                                                                            grade
                                                                        </i>
                                                                        <i class="material-icons">
                                                                            grade
                                                                        </i>
                                                                        <i class="material-icons">
                                                                            grade
                                                                        </i>
                                                                        <i class="material-icons">
                                                                            grade
                                                                        </i>
                                                                        <i class="material-icons noRating-star">
                                                                            grade
                                                                        </i>
                                                                        up
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="input-group align-items-center">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="rating" value="3" id="webrating3">
                                                                    <label class="form-check-label" for="webrating3">
                                                                        <i class="material-icons">
                                                                            grade
                                                                        </i>
                                                                        <i class="material-icons">
                                                                            grade
                                                                        </i>
                                                                        <i class="material-icons">
                                                                            grade
                                                                        </i>
                                                                        <i class="material-icons noRating-star">
                                                                            grade
                                                                        </i>
                                                                        <i class="material-icons noRating-star">
                                                                            grade
                                                                        </i>
                                                                        up
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="input-group align-items-center">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="rating" value="2" id="webrating2">
                                                                    <label class="form-check-label" for="webrating2">
                                                                        <i class="material-icons">
                                                                            grade
                                                                        </i>
                                                                        <i class="material-icons">
                                                                            grade
                                                                        </i>
                                                                        <i class="material-icons noRating-star">
                                                                            grade
                                                                        </i>
                                                                        <i class="material-icons noRating-star">
                                                                            grade
                                                                        </i>
                                                                        <i class="material-icons noRating-star">
                                                                            grade
                                                                        </i>
                                                                        up
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="input-group align-items-center">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="rating" value="1" id="webrating1">
                                                                    <label class="form-check-label" for="webrating1">
                                                                        <i class="material-icons">
                                                                            grade
                                                                        </i>
                                                                        <i class="material-icons noRating-star">
                                                                            grade
                                                                        </i>
                                                                        <i class="material-icons noRating-star">
                                                                            grade
                                                                        </i>
                                                                        <i class="material-icons noRating-star">
                                                                            grade
                                                                        </i>
                                                                        <i class="material-icons noRating-star">
                                                                            grade
                                                                        </i>
                                                                        up
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary  mt-4 w-100 justify-content-center py-3 gap-3">
                                    Search
                                    <i class="bi bi-search" style="font-size: 16px;"></i>
                                </button>

                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 col-lg-9">
                    <div class="shop-list">
                        <div class="d-flex align-items-center justify-content-between flex-wrap mb-4">
                            <div>
                                <h3 class="font-22px font-weight-600 m-0">
                                    @if (isset($sub_category->name))
                                        {{ $sub_category->name }}
                                    @elseif(isset($category->name))
                                        {{ $category->name }}
                                    @else
                                        {{ 'Products' }}
                                    @endif
                                    {{-- {{ isset($sub_category->name) ? $sub_category->name : 'Products' }} --}}
                                </h3>
                                <small class=" opacity-05 font-14px">{{ isset($data) ? count($data) : '0' }}</small>
                            </div>

                        </div>
                        <div class="d-block d-md-none">
                            <div class="d-flex align-items-center justify-content-between flex-wrap my-4">
                                <ul>
                                    <li><a href="#mobilefilter" data-bs-toggle="offcanvas" role="button"
                                            aria-controls="offcanvasExample"
                                            class="white-btn d-flex align-items-center gap-2"><img
                                                src="{{ asset('assets/images/icons/filter.svg') }}" alt="">
                                            Filter</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- <div class="data-container"></div>
                                                                                                                                    <div id="shop-items1"></div> -->
                        <div class="row g-2" id="gridRow">
                            @if (@$data[0])
                                @foreach ($data as $item)
                                    {{-- @php
                                    dd($data);
                                @endphp --}}
                                    <input type="text" hidden name="productID" value="{{ $item->product->id }}"
                                        class="productID">
                                    <div class="col-6 col-md-6 col-lg-4 product{{ $item->product->id }}">
                                        <div class="product-card-v1">
                                            <div class="cover-img">
                                                <a href="{{ route('product_detail', $item->product->id) }}">
                                                    <img src="{{ asset($item->product->image1) }}" alt="">
                                                </a>
                                                <div class="off-status">
                                                    <p>50% Off</p>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <input type="text" id="product_id" hidden
                                                    value="{{ $item->product->id }}">

                                                <input type="hidden" id="hidden_product_id" name="product_id"
                                                    value="{{ $item->product->id }}">
                                                <input type="hidden" id="roamer_id"
                                                    value="{{ $item->product->vendor_id }}">
                                                <input type="hidden" id="h_varient_id" value="0"
                                                    name="h_varient_id">
                                                <input type="hidden" id="h_product_type"
                                                    value="{{ $item->product->product_type }}" name="h_product_type">
                                                <ul>
                                                    <li><a href="#">{{ $item->product->name }}</a></li>
                                                </ul>
                                                <p class=" opacity-05 my-1 font-weight-500">By:
                                                    {{ $item->product->user->first_name . ' ' . $item->product->user->last_name }}
                                                </p>
                                                <div class="d-flex align-items-center gap-2">
                                                    <p class="primary-text">
                                                        {{ isset($item->product->varients[0]) ? $item->product->varients[0]->price : $item->product->price }}
                                                        {{ env('CURRENCY') }}
                                                    </p>
                                                    <small class="text-muted"><del>
                                                            {{ isset($item->product->varients[0]) ? $item->product->varients[0]->s_price . ' ' . env('CURRENCY') : $item->product->s_price }}
                                                        </del>
                                                    </small>
                                                </div>
                                                <ul class="product-links d-flex align-items-center gap-2 mt-4">
                                                    <li>
                                                        <form class="addcartbtn">
                                                            @csrf
                                                            <input type="text" class="product_id" name="p_id"
                                                                hidden value="{{ $item->product->id }}">

                                                            <input type="hidden" class="roamer_id" name="roamerId"
                                                                value="{{ $item->product->vendor_id }}">
                                                            <input type="text" hidden name="price"
                                                                value="{{ $item->product->price }}">
                                                            <input type="text" hidden name="qty" value="1">
                                                            <input type="hidden" class="h_varient_id"
                                                                value="{{ isset($item->product->varient_attr) ? $item->product->id : 0 }} "
                                                                name="v_id">
                                                            <input type="hidden" class="h_product_type" name="p_type"
                                                                value="{{ $item->product->product_type }}"
                                                                name="h_product_type">
                                                            <input type="text" hidden name="variant_ID"
                                                                class="variant_ID" value="0">

                                                            <button class="addcartbtn btn btn-secondary card-icon">
                                                                Add to cart
                                                                <img src="{{ asset('assets/images/icons/cart.svg') }}"
                                                                    alt="" class="" style="width: 17px;">
                                                            </button>
                                                        </form>
                                                    </li>
                                                    <li><a href="#" class="btn btn-primary">Buy Now
                                                            <img src="{{ asset('assets/images/icons/arrow-right.svg') }}"
                                                                alt="" style="width: 17px;"></a></li>
                                                </ul>

                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div style="height: 100%; text-align: center;">
                                    <h3 style="padding-top: 100px; padding-bottom: 300px">No Products Found</h3>
                                </div>
                            @endif

                        </div>
                        {{-- asdasda --}}
                    </div>
                    <br>
                    @if (@$data[0])
                        <div
                            class="d-flex align-items-center flex-wrap gap-3 justify-content-center justify-content-lg-between">
                            <p class=" opacity-05 m-0">6 of 480</p>
                            <div class="Cs-pagination">
                                <ul>
                                    <li><a href="javascript:void(0);" class="pe-none user-select-none"><i
                                                class="material-icons">keyboard_double_arrow_left</i></a></li>
                                    <li><a href="javascript:void(0);" class="pe-none user-select-none"><i
                                                class="material-icons">chevron_left</i></a></li>
                                    <li><a href="javascript:void(0);" class="Cs-activepagination">1</a></li>
                                    <li><a href="javascript:void(0);">2</a></li>
                                    <li><a href="javascript:void(0);">3</a></li>
                                    <li><a href="javascript:void(0);">4</a></li>
                                    <li><a href="javascript:void(0);">5</a></li>

                                    <li><a href="javascript:void(0);" class=" pe-none user-select-none">...</a></li>
                                    <li><a href="javascript:void(0);">10</a></li>
                                    <li><a href="javascript:void(0);"><i class="material-icons">chevron_right</i></a></li>
                                    <li><a href="javascript:void(0);"><i
                                                class="material-icons">keyboard_double_arrow_right</i></a></li>
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- mobile filter -->
    <div class="offcanvas offcanvas-start" tabindex="1" id="mobilefilter" aria-labelledby="offcanvasExampleLabel"
        aria-hidden="true">
        <div class="offcanvas-header align-items-start">
            <div>
                <img src="assets/images/logo.png" alt="">
                <h5 class="offcanvas-title font-weight-500" id="offcanvasExampleLabel">Product Filters</h5>
            </div>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body mobilefilter">
            <div class="cover-filters">
                <div class="brands-filter">
                    <form action="{{ route('filter.grid') }}" method="POST">
                        @csrf
                        <div class="according-style-2 mt-3">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#according-st-2-1" aria-expanded="true">
                                            Brand
                                        </button>
                                    </h2>
                                    <div id="according-st-2-1" class="accordion-collapse collapse show">
                                        <div class="accordion-body">
                                            <ul class="list-items">
                                                {{-- @php
                                                    dd($brands);
                                                @endphp --}}
                                                @foreach ($brands as $brand)
                                                    <li>
                                                        <div class="input-group align-items-center">
                                                            <div class="form-check">

                                                                <input class="form-check-input"
                                                                    name="brand_id{{ $brand->id }}" type="checkbox"
                                                                    value="{{ $brand->id }}">
                                                                <label class="form-check-label" for="webbrand1">
                                                                    {{ $brand->name }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#according-st-2-4" aria-expanded="true">
                                            Price
                                        </button>
                                    </h2>
                                    <div id="according-st-2-4" class="accordion-collapse collapse show">
                                        <div class="accordion-body">
                                            <div class="filter_price">
                                                {{-- <div class="price_filter" data-min="0" data-max="12000"
                                                    data-min-value="0" data-max-value="3630" data-price-sign="$"
                                                    class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                                    <span tabindex="0"
                                                        class="ui-slider-handle ui-corner-all ui-state-default"></span><span
                                                        tabindex="0"
                                                        class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mb-3">
                                                    <div class="d-flex align-items-center flex-fill">
                                                        <p style="flex: 0.7;" class="price_first">0</p>
                                                        <p class="price_second">3630</p>
                                                    </div>
                                                    <p class="flex-fill text-end">12000</p>
                                                </div> --}}
                                                <div
                                                    class="enterprice d-flex align-items-center justify-content-between gap-4">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <p>$</p>
                                                        <input type="number" min="1" name="min_price"
                                                            class="form-control min" placeholder="Min">
                                                    </div>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <p>-$</p>
                                                        <input type="number" min="1" name="max_price"
                                                            class="form-control max" placeholder="Max">
                                                        {{-- <ul class="ms-4">
                                                            <li><a href="#" onclick="clickFilter()"
                                                                    class="text-dark opacity-07 text-decoration-underline">Go</a>
                                                            </li>
                                                        </ul> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#according-st-2-7" aria-expanded="false">
                                            Ratings
                                        </button>
                                    </h2>
                                    <div id="according-st-2-7" class="accordion-collapse collapse show">
                                        <div class="accordion-body">
                                            <ul class="list-items rating-filter">
                                                <li>
                                                    <div class="input-group align-items-center">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="rating"
                                                                value="5" id="webrating5">
                                                            <label class="form-check-label" for="webrating5">
                                                                <i class="material-icons">
                                                                    grade
                                                                </i>
                                                                <i class="material-icons">
                                                                    grade
                                                                </i>
                                                                <i class="material-icons">
                                                                    grade
                                                                </i>
                                                                <i class="material-icons">
                                                                    grade
                                                                </i>
                                                                <i class="material-icons">
                                                                    grade
                                                                </i>
                                                                up
                                                            </label>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="input-group align-items-center">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="rating"
                                                                value="4" id="webrating4">
                                                            <label class="form-check-label" for="webrating4">
                                                                <i class="material-icons">
                                                                    grade
                                                                </i>
                                                                <i class="material-icons">
                                                                    grade
                                                                </i>
                                                                <i class="material-icons">
                                                                    grade
                                                                </i>
                                                                <i class="material-icons">
                                                                    grade
                                                                </i>
                                                                <i class="material-icons noRating-star">
                                                                    grade
                                                                </i>
                                                                up
                                                            </label>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="input-group align-items-center">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="rating"
                                                                value="3" id="webrating3">
                                                            <label class="form-check-label" for="webrating3">
                                                                <i class="material-icons">
                                                                    grade
                                                                </i>
                                                                <i class="material-icons">
                                                                    grade
                                                                </i>
                                                                <i class="material-icons">
                                                                    grade
                                                                </i>
                                                                <i class="material-icons noRating-star">
                                                                    grade
                                                                </i>
                                                                <i class="material-icons noRating-star">
                                                                    grade
                                                                </i>
                                                                up
                                                            </label>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="input-group align-items-center">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="rating"
                                                                value="2" id="webrating2">
                                                            <label class="form-check-label" for="webrating2">
                                                                <i class="material-icons">
                                                                    grade
                                                                </i>
                                                                <i class="material-icons">
                                                                    grade
                                                                </i>
                                                                <i class="material-icons noRating-star">
                                                                    grade
                                                                </i>
                                                                <i class="material-icons noRating-star">
                                                                    grade
                                                                </i>
                                                                <i class="material-icons noRating-star">
                                                                    grade
                                                                </i>
                                                                up
                                                            </label>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="input-group align-items-center">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="rating"
                                                                value="1" id="webrating1">
                                                            <label class="form-check-label" for="webrating1">
                                                                <i class="material-icons">
                                                                    grade
                                                                </i>
                                                                <i class="material-icons noRating-star">
                                                                    grade
                                                                </i>
                                                                <i class="material-icons noRating-star">
                                                                    grade
                                                                </i>
                                                                <i class="material-icons noRating-star">
                                                                    grade
                                                                </i>
                                                                <i class="material-icons noRating-star">
                                                                    grade
                                                                </i>
                                                                up
                                                            </label>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary  mt-4" style="width: 100%; text-align: center;">
                            Search
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/pagination/pagination.min.js') }}"></script>

    <script>
        // $(function() {
        //     (function(name) {
        //         var container = $("#shop-" + name);
        //         container.pagination({
        //             dataSource: "http://localhost/bazaar/productjson.json",
        //             locator: "items",
        //             // totalNumber: 120,
        //             totalNumberLocator: function(response) {
        //                 return response.items.total;
        //             },
        //             pageSize: 20,
        //             alias: {
        //                 pageNumber: 'page',
        //                 pageSize: 'limit'
        //             },
        //             showPrevious: false,
        //             showNext: false,
        //             ajax: {
        //                 beforeSend: function() {
        //                     container.prev().html("Loading data");
        //                 },
        //             },
        //             callback: function(response, pagination) {
        //                 // window.console && console.log(22, response, pagination);
        //                 var dataHtml = "<div class='row g-3'>";

        //                 $.each(response, function(index, item) {
        //                     dataHtml += `
    //             <div class="col-md-4">
    //                 <div class="product-card-v1">
    //                     <div class="cover-img">
    //                         <a href=${item.link}> <img src=${item.image} alt="image"></a>
    //                         <div class="off-status">
    //                             <p>${item.discount}</p>
    //                         </div>
    //                     </div>
    //                     <div class="content">
    //                         <ul>
    //                             <li><a href=${item.link}>${item.title}</a></li>
    //                         </ul>
    //                         <div class="d-flex align-items-center gap-2">
    //                             <p class="primary-text">${item.currentPrice}</p>
    //                             <small class="text-muted"><del>${item.actualPrice}</del></small>
    //                         </div>
    //                         <ul class="product-links d-flex align-items-center gap-2 mt-4">
    //                             <li><a href="#" class="gray-btn card-icon">Add to cart <img src="assets/images/icons/cart.svg" alt="" class=""></a></li>
    //                             <li><a href="#" class="btn btn-primary">Buy Now <img src="assets/images/icons/arrow-right.svg" alt="" style="width: 17px;"></a></li>
    //                         </ul>
    //                     </div>
    //                 </div>
    //              </div>
    //             `;
        //                 });

        //                 dataHtml += "</div>";

        //                 container.prev().html(dataHtml);
        //             },
        //         });
        //     })("items1");
        // })
    </script>
@endsection

@push('head')
    <script>
        // function clickBrand(id) {
        //     var brand_id = id;

        //     clickFilter(brand_id);

        // }

        // function clickFilter(brand_id) {

        //     var cat_id = $('.cat_for_brand').val();
        //     var brand_id = brand_id;
        //     var min = $('.min').val();
        //     var max = $('.max').val();

        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });
        //     $.ajax({
        //         url: '{{ route('front.index') }}' + '/filter/grid/',
        //         method: 'post',
        //         data: {
        //             cat_id,
        //             brand_id,
        //             min,
        //             max
        //         },
        //         success: function(response) {
        //             if (response.status == 200) {
        //                 // console.log(response.products);

        //                 $.each(response.products, function(key, value) {

        //                     $("input[class=productID]")
        //                         .each(function() {

        //                             if (this.value == value.id) {

        //                                 $(".product" + value.id).remove();
        //                                 $('#gridRow').append(
        //                                     '<div class="col-6 col-md-6 col-lg-4"><div class="product-card-v1"><div class="cover-img">' +
        //                                     '<a href="#"><img src="{{ route('front.index') }}' +
        //                                     value.image1 +
        //                                     '" alt=""></a>' +
        //                                     '<div class="off-status"><p>50% Off</p></div></div>' +
        //                                     '<div class="content"><input type="text" id="product_id" hidden value="' +
        //                                     value.id + '">' +
        //                                     '<input type="hidden" id="hidden_product_id" name="product_id" value="' +
        //                                     value.id + '">' +
        //                                     '<input type="hidden" id="roamer_id" value="' +
        //                                     value.vendor_id +
        //                                     '">' +
        //                                     '<input type="hidden" id="h_varient_id" value="0" name="h_varient_id">' +
        //                                     '<input type="hidden" id="h_product_type" value="' +
        //                                     value
        //                                     .product_type + '" name="h_product_type">' +
        //                                     '<ul><li><a href="#">' + value.name +
        //                                     '</a></li></ul>' +
        //                                     '<div class="d-flex align-items-center gap-2"><p class="primary-text">' +
        //                                     value.price + ' PKR' + '</p>' +
        //                                     '</div><ul class="product-links d-flex align-items-center gap-2 mt-4"><li>' +
        //                                     '<form class="addcartbtn"><input type="hidden" name="_token" value="5UaGEgxIg6QMjN0U2z8HuEpgP5td7nZxL06c1xl4">' +
        //                                     '<input type="text" class="product_id" name="p_id" hidden value="' +
        //                                     value.id + '">' +
        //                                     '<input type="hidden" class="roamer_id" name="roamerId" value="' +
        //                                     value.vendor_id + '">' +
        //                                     '<input type="text" hidden name="price" value="' +
        //                                     value.price +
        //                                     '">' +
        //                                     '<input type="text" hidden name="qty" value="1">' +
        //                                     '<input type="hidden" class="h_varient_id" value="' +
        //                                     value.id +
        //                                     '" name="v_id">' +
        //                                     '<input type="hidden" class="h_product_type" name="p_type" value="' +
        //                                     value.product_type + '" name="h_product_type">' +
        //                                     '<input type="text" hidden name="variant_ID" class="variant_ID" value="0">' +
        //                                     '<a class="addcartbtn gray-btn card-icon "><button style="background-color: transparent; border: 0px;">Add to cart<img src="{{ asset('assets/images/icons/cart.svg') }}"alt="" class=""></button></a></form></li>' +
        //                                     '<li><a href="#" class="btn btn-primary">Buy Now<img src="{{ asset('assets/images/icons/arrow-right.svg') }}"alt="" style="width: 17px;"></a></li></ul></div>' +
        //                                     '</div></div>');
        //                             }

        //                         });


        //                 });

        //             }
        //         }
        //     });

        // }
    </script>
@endpush
