@extends('layouts.app')
@section('content')
    <section class="pt-5">
        <div class="container">
            <form id="gridFilter" method="GET" action="{{ route('filterGrid') }}">
                <div class="row">
                    <div class="col-md-4 col-lg-3 order-1 order-md-0 d-none d-md-block">
                        <div class="cover-filters">
                            <div class="brands-filter">
                                <div class="according-style-2 mt-3">
                                    <div class="accordion" id="accordionExample">
                                        @if (count($categories) != 0)
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#according-st-2-1"
                                                        aria-expanded="true">
                                                        Categories
                                                    </button>
                                                </h2>
                                                {{-- @php
                                                    dd(request()->get('category'))
                                                @endphp --}}
                                                <div id="according-st-2-1" class="accordion-collapse collapse show">
                                                    <div class="accordion-body">
                                                        <ul class="list-items">
                                                            @foreach ($categories as $categoryy)
                                                                <li>
                                                                    <div class="input-group align-items-center">
                                                                        <div class="form-check">
                                                                            <input
                                                                                class="form-check-input categorycheck{{ $categoryy->id }}"
                                                                                onclick="filter({{ $categoryy->id }})"
                                                                                id="category{{ $categoryy->id }}"
                                                                                name="category[]" type="checkbox"
                                                                                value="{{ $categoryy->id }}"
                                                                                <?php
                                                                                if (request()->get('category') != null) {
                                                                                    foreach (request()->get('category') as $key => $value) {
                                                                                        if ($value == $categoryy->id) {
                                                                                            echo 'checked';
                                                                                        }
                                                                                    }
                                                                                }
                                                                                ?>>
                                                                            <label class="form-check-label"
                                                                                for="category{{ $categoryy->id }}">
                                                                                {{ $categoryy->name }}

                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if (count($brands) != 0)
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#according-st-2-2"
                                                        aria-expanded="true">
                                                        Brand
                                                    </button>
                                                </h2>
                                                <div id="according-st-2-2" class="accordion-collapse collapse show">
                                                    <div class="accordion-body">
                                                        <ul class="list-items">
                                                            @foreach ($brands as $brand)
                                                                <li>
                                                                    <div class="input-group align-items-center">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input brandcheck"
                                                                                onclick="filter({{ $brand->id }})"
                                                                                id="brandid{{ $brand->id }}"
                                                                                name="brands[]" <?php
                                                                                if (request()->get('brands')) {
                                                                                    foreach (request()->get('brands') as $key => $value) {
                                                                                        # code...
                                                                                        if ($value == $brand->id) {
                                                                                            echo 'checked';
                                                                                        }
                                                                                    }
                                                                                }
                                                                                ?>
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
                                        @endif
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
                                                        <div
                                                            class="enterprice d-flex align-items-center justify-content-between gap-4">
                                                            <div class="d-flex align-items-center gap-2">
                                                                <input type="number" min="1" name="min_price"
                                                                    class="form-control w-50" placeholder="Min"
                                                                    value="{{ request()->min_price }}">
                                                                <input type="number" min="1" name="max_price"
                                                                    class="form-control w-50" placeholder="Max"
                                                                    value="{{ request()->max_price }}">
                                                                <ul class="ms-4">
                                                                    <li>
                                                                        <a onclick="filter(null)"
                                                                            class="text-dark opacity-07 text-decoration-underline">
                                                                            Go
                                                                        </a>
                                                                    </li>
                                                                </ul>
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
                                                                        name="rating" value="5" id="webrating5"
                                                                        onclick="filter(null)"
                                                                        @if (request()->rating == 5) {{ 'checked' }} @endif>
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
                                                                        name="rating" value="4" id="webrating4"
                                                                        onclick="filter(null)"
                                                                        @if (request()->rating == 4) {{ 'checked' }} @endif>
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
                                                                        name="rating" value="3" id="webrating3"
                                                                        onclick="filter(null)"
                                                                        @if (request()->rating == 3) {{ 'checked' }} @endif>
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
                                                                        name="rating" value="2" id="webrating2"
                                                                        onclick="filter(null)"
                                                                        @if (request()->rating == 2) {{ 'checked' }} @endif>
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
                                                                        name="rating" value="1" id="webrating1"
                                                                        onclick="filter(null)"
                                                                        @if (request()->rating == 1) {{ 'checked' }} @endif>
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
                                    </h3>
                                    <small class=" opacity-05 font-14px">{{ count($data) }} items
                                        found
                                    </small>
                                </div>
                                <div class="d-none d-md-block">
                                    <div class="d-flex align-items-center gap-3 ">
                                        <h6 class=" opacity-07 m-0">Sort By:</h6>
                                        <div class="form-group m-0">
                                            <div class="" style="min-width: 185px;">
                                                <select name="sort_by" onchange="filter(null)" class="select-box">
                                                    <option value="0"
                                                        @if (request()->sort_by == 0 || (request()->sort_by == null)) {{ 'selected' }} @endif>Sort
                                                        By</option>
                                                    <option value="1" <?php if (request()->sort_by == 1) {
                                                        echo 'selected';
                                                    } ?>>Price
                                                        low to high</option>
                                                    <option value="2" <?php if (request()->sort_by == 2) {
                                                        echo 'selected';
                                                    } ?>>Price
                                                        hight to low</option>
                                                    <option value="3" <?php if (request()->sort_by == 3) {
                                                        echo 'selected';
                                                    } ?>>New
                                                        to Old</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
            </form>
        </div>
        <div class="d-block d-md-none">
            <div class="d-flex align-items-center justify-content-between flex-wrap my-4">
                <ul>
                    <li><a href="#mobilefilter" data-bs-toggle="offcanvas" role="button"
                            aria-controls="offcanvasExample" class="white-btn d-flex align-items-center gap-2"><img
                                src="{{ asset('assets/images/icons/filter.svg') }}" alt="">
                            Filter</a></li>
                </ul>
            </div>
        </div>
        <div class="row g-2" id="gridRow">
            @if (@$data[0])
                @foreach ($data as $item)
                    <input type="text" hidden name="productID" value="{{ $item->id }}" class="productID">
                    <div class="col-6 col-md-6 col-lg-4 product{{ $item->id }}">
                        <div class="product-card-v1">
                            <div class="cover-img">
                                <a href="{{ route('product_detail', $item->id) }}">
                                    <img src="{{ asset($item->image1) }}" alt="">
                                </a>
                                {{-- <div class="off-status">
                                                    <p>50% Off</p>
                                                </div> --}}
                            </div>
                            <div class="content">
                                <input type="text" id="product_id" hidden value="{{ $item->id }}">

                                <input type="hidden" id="hidden_product_id" name="product_id"
                                    value="{{ $item->id }}">
                                <input type="hidden" id="roamer_id" value="{{ $item->user_id }}">
                                <input type="hidden" id="h_varient_id" value="0" name="h_varient_id">
                                <input type="hidden" id="h_product_type" value="{{ $item->product_type }}"
                                    name="h_product_type">
                                <ul>
                                    <li><a
                                            href="{{ route('product_detail', ['id' => $item->id]) }}">{{ $item->name }}</a>
                                    </li>
                                </ul>
                                <p class=" opacity-05 my-1 font-weight-500">By:
                                    {{ $item->user->first_name }}</p>
                                <div class="d-flex align-items-center gap-2">
                                    @if (isset($item->varients[0]->s_price) || $item->s_price != null)
                                        <p class="text-primary">
                                            {{ isset($item->varients[0]->s_price) ? @$item->varients[0]->s_price : $item->s_price }}
                                            PKR
                                        </p>
                                        <small class="text-muted"><del>
                                                {{ isset($item->varients[0]->price) ? @$item->varients[0]->price : $item->price }}
                                                Pkr
                                            </del>
                                        </small>
                                    @else
                                        <p class="text-primary">
                                            {{ isset($item->varients[0]->price) ? @$item->varients[0]->price : $item->price }}
                                            PKR
                                        </p>
                                    @endif
                                </div>
                                <ul class="product-links d-flex align-items-center gap-2 mt-4">
                                    @if ($item->varient_attr == null)
                                        <li>
                                            <form class="addcartbtn">

                                                @csrf
                                                <input type="text" class="product_id" name="p_id" hidden
                                                    value="{{ $item->id }}">

                                                <input type="hidden" class="roamer_id" name="roamerId"
                                                    value="{{ $item->user_id }}">
                                                <input type="text" hidden name="price"
                                                    value="{{ $item->s_price != 0 || $item->price != null ? $item->s_price : $item->price }}">
                                                <input type="text" hidden name="single" value="yes">
                                                <input type="text" hidden name="qty" value="1">
                                                <input type="hidden" class="h_varient_id"
                                                    value="{{ isset($item->varient_attr) ? $item->id : 0 }} "
                                                    name="v_id">
                                                <input type="hidden" class="h_product_type" name="p_type"
                                                    value="{{ $item->product_type }}" name="h_product_type">
                                                <input type="text" hidden name="variant_ID" class="variant_ID"
                                                    value="0">
                                                <input type="text" hidden name="buy_now" value="0"
                                                    id="buynow">

                                                <button class="addcartbtn btn btn-secondary card-icon">
                                                    Add to Cart
                                                    <img src="{{ asset('assets/images/icons/cart.svg') }}" alt=""
                                                        class="">
                                                </button>
                                        </li>
                                        <li>
                                            <button class="buyNowBtn btn btn-primary">
                                                Buy Now
                                                <img src="assets/images/icons/arrow-right.svg" alt="">
                                            </button>
                                        </li>
                                        </form>
                                    @elseif($item->varient_attr != null)
                                        <li>
                                            <a class="btn btn-secondary card-icon"
                                                href="{{ route('product_detail', ['id' => $item->id]) }}">
                                                Add to Cart
                                                <img src="{{ asset('assets/images/icons/cart.svg') }}" alt=""
                                                    class="">
                                            </a>
                                        </li>
                                        <li>
                                            <a class="btn btn-primary"
                                                href="{{ route('product_detail', ['id' => $item->id]) }}">
                                                Buy Now
                                                <img src="assets/images/icons/arrow-right.svg" alt="">
                                            </a>
                                        </li>
                                    @endif
                                </ul>

                            </div>

                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-center height-60vh d-flex align-items-center justify-content-center">
                    <div class="text-center">
                        <img src="https://cdn-icons-png.flaticon.com/512/42/42735.png" style="width: 55px"
                            class="mx-auto mb-4">
                        <h4 class="font-weight-600">No Products <span class="text-primary">Found</span>
                        </h4>
                        <h6 class=" opacity-05">we couldn't find what you searched for. try searching
                            again.</h6>
                    </div>
                </div>
            @endif

        </div>
        {{-- asdasda --}}
        </div>
        <br>

        {{ $data->links('pagination::bootstrap-5') }}

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
                    <form id="gridFilter" method="GET" action="{{ route('filterGrid') }}">
                        @csrf
                        <div class="according-style-2 mt-3">
                            <div class="accordion" id="accordionExample">
                                @if (count($categories) != 0)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#according-st-2-1" aria-expanded="true">
                                                Categories
                                            </button>
                                        </h2>
                                        <div id="according-st-2-1" class="accordion-collapse collapse show">
                                            <div class="accordion-body">
                                                <ul class="list-items">

                                                    @foreach ($categories as $categoryy)
                                                        <li>
                                                            <div class="input-group align-items-center">
                                                                <div class="form-check">
                                                                    <input
                                                                        class="form-check-input categorycheck{{ $categoryy->id }}"
                                                                        onclick="filter({{ $categoryy->id }})"
                                                                        id="category{{ $categoryy->id }}" name="category"
                                                                        type="checkbox" value="{{ $categoryy->id }}"
                                                                        <?php
                                                                        if (request()->get('category') == $categoryy->id) {
                                                                            echo 'checked';
                                                                        }
                                                                        ?>>
                                                                    <label class="form-check-label"
                                                                        for="category{{ $categoryy->id }}">
                                                                        {{ $categoryy->name }}

                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if (count($brands) != 0)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#according-st-2-2" aria-expanded="true">
                                                Brand
                                            </button>
                                        </h2>
                                        <div id="according-st-2-2" class="accordion-collapse collapse show">
                                            <div class="accordion-body">
                                                <ul class="list-items">
                                                    @foreach ($brands as $brand)
                                                        <li>
                                                            <div class="input-group align-items-center">
                                                                <div class="form-check">
                                                                    <input class="form-check-input brandcheck"
                                                                        onclick="filter({{ $brand->id }})"
                                                                        id="brandid{{ $brand->id }}" name="brands[]"
                                                                        <?php
                                                                        if (request()->get('brands')) {
                                                                            foreach (request()->get('brands') as $key => $value) {
                                                                                # code...
                                                                                if ($value == $brand->id) {
                                                                                    echo 'checked';
                                                                                }
                                                                            }
                                                                        }
                                                                        ?> type="checkbox"
                                                                        value="{{ $brand->id }}">

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
                                @endif
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
                                                <div
                                                    class="enterprice d-flex align-items-center justify-content-between gap-4">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <input type="number" min="1" name="min_price"
                                                            class="form-control w-50" placeholder="Min"
                                                            value="{{ request()->min_price }}">
                                                        <input type="number" min="1" name="max_price"
                                                            class="form-control w-50" placeholder="Max"
                                                            value="{{ request()->max_price }}">
                                                        <ul class="ms-4">
                                                            <li>
                                                                <a onclick="filter(null)"
                                                                    class="text-dark opacity-07 text-decoration-underline">
                                                                    Go
                                                                </a>
                                                            </li>
                                                        </ul>
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
                                                                value="5" id="webrating5" onclick="filter(null)"
                                                                @if (request()->rating == 5) {{ 'checked' }} @endif>
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
                                                                value="4" id="webrating4" onclick="filter(null)"
                                                                @if (request()->rating == 4) {{ 'checked' }} @endif>
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
                                                                value="3" id="webrating3" onclick="filter(null)"
                                                                @if (request()->rating == 3) {{ 'checked' }} @endif>
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
                                                                value="2" id="webrating2" onclick="filter(null)"
                                                                @if (request()->rating == 2) {{ 'checked' }} @endif>
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
                                                                value="1" id="webrating1" onclick="filter(null)"
                                                                @if (request()->rating == 1) {{ 'checked' }} @endif>
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
    </div>


@endsection

@push('head')
    <script src="{{ asset('js/pagination/pagination.min.js') }}"></script>
    <script>
        function filter(id) {

            if (id != null) {
                $('.categorycheck' + id).attr('checked', false);
            }

            // $('.brandcheck').attr('checked', false);

            // $('#gridFilter').submit()

        }
    </script>
@endpush
