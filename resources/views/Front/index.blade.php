@extends('layouts.app')
@section('content')
    <!--########################### ###################################
                                                                                                                                                                                                                                                                                                                                                                                                                      START SLIDER
                                                                                                                                                                                                                                                                                                                                                                                            #################################################################-->
    <div class="swiper mySwiper" style="--swiper-navigation-size:100px; --swiper-navigation-color: var(--primary-clr)">
        <div class="swiper-wrapper">
            @foreach ($slider as $slider)
                <div class="swiper-slide">
                    <a href="{{ $slider->link }}">
                        <div class="slider-img">
                            <img src="{{ asset($slider->img) }}" alt="">
                        </div>
                        <div class="overlay-slider-content">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="swiper-pagination bullet-v1"></div>

    </div>

    @if (count($campaign) != 0)
        <section>
            <div class="container">
                <div class="d-flex align-items-center gap-3">
                    <h4 class="block-title m-0">Campaign <span class="text-primary">Products</span></h4>

                </div>
                <br>
                <div class="product-card-grid-5">
                    @foreach ($campaign as $campaign)
                        <div class="product-card-v1">
                            <div class="cover-img">
                                <a href="{{ route('product_detail', ['id' => $campaign->product->id]) }}"><img
                                        src="{{ asset($campaign->product->image1) }}" alt=""></a>
                            </div>
                            <div class="content">
                                <ul>
                                    <li><a
                                            href="{{ route('product_detail', ['id' => $campaign->product->id]) }}">{{ $campaign->product->name }}</a>
                                    </li>
                                </ul>
                                <div class="d-flex align-items-center gap-2">
                                    <p class="text-primary">
                                        Rs. {{ isset($campaign->compaign_price) ? $campaign->compaign_price : '' }} Pkr
                                    </p>
                                </div>
                                <ul class="product-links d-flex align-items-center gap-2 mt-4">
                                    <li>

                                        @if ($campaign->varient_attr == null)
                                            <form class="addcartbtn">
                                                @csrf
                                                <input type="text" class="product_id" name="p_id" hidden
                                                    value="{{ $campaign->product->id }}">

                                                <input type="hidden" class="roamer_id" name="roamerId"
                                                    value="{{ $campaign->product->user_id }}">
                                                <input type="text" hidden name="price"
                                                    value="{{ $campaign->compaign_price }}">
                                                <input type="text" hidden name="single" value="yes">
                                                <input type="text" hidden name="qty" value="1">
                                                <input type="hidden" class="h_varient_id"
                                                    value="{{ isset($campaign->product->varient_attr) ? $campaign->product->id : 0 }} "
                                                    name="v_id">
                                                <input type="hidden" class="h_product_type" name="p_type"
                                                    value="{{ $campaign->product->product_type }}" name="h_product_type">
                                                <input type="text" hidden name="variant_ID" class="variant_ID"
                                                    value="0">

                                                <button class="addcartbtn btn btn-secondary card-icon">
                                                    Add to cart
                                                    <img src="{{ asset('assets/images/icons/cart.svg') }}" alt=""
                                                        class="">
                                                </button>
                                            </form>
                                        @elseif($campaign->varient_attr != null)
                                            <a class="btn btn-secondary card-icon"
                                                href="{{ route('product_detail', ['id' => $campaign->product->id]) }}">
                                                Add to cart
                                                <img src="{{ asset('assets/images/icons/cart.svg') }}" alt=""
                                                    class="">
                                            </a>
                                        @endif
                                    </li>
                                    <li><a href="{{ route('product_detail', ['id' => $campaign->product->id]) }}"
                                            class="btn btn-primary">
                                            Buy Now
                                            <img src="assets/images/icons/arrow-right.svg" alt=""></a></li>
                                </ul>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif



    <section>
        <div class="container">
            <div class="d-flex align-items-center gap-3">
                <h4 class="block-title m-0">Flash <span class="text-primary">Sale</span></h4>
                <ul>
                    <li><a href="{{ route('product.flash-sale') }}" class="d-flex align-items-center gray-anchor">
                            View All
                            <i class="material-icons">
                                chevron_right
                            </i>
                        </a>
                    </li>
                </ul>
            </div>
            <br>
            <div class="cover-slider position-relative mt-4">
                <div class="swiper multiProductSlider">
                    <div class="swiper-wrapper">

                        @foreach ($flash as $flashs)
                            <div class="swiper-slide">
                                <div class="product-card-v1">
                                    <div class="cover-img">
                                        <a href="{{ route('product_detail', ['id' => $flashs->id]) }}">
                                            <img src="{{ $flashs->image1 != null ? asset($flashs->image1) : asset('images/placeholder.png') }}"
                                                alt="{{ $flashs->name }}">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            <li><a
                                                    href="{{ route('product_detail', ['id' => $flashs->id]) }}">{{ $flashs->name }}</a>
                                            </li>
                                        </ul>
                                        <div class="d-flex align-items-center gap-2">
                                            @if (isset($flashs->varients[0]->s_price) || $flashs->s_price != null)
                                                <p class="text-primary">
                                                    {{ isset($flashs->varients[0]->s_price) ? @$flashs->varients[0]->s_price : $flashs->s_price }}
                                                    PKR
                                                </p>
                                                <small class="text-muted"><del>
                                                        {{ isset($flashs->varients[0]->price) ? @$flashs->varients[0]->price : $flashs->price }}
                                                        Pkr
                                                    </del>
                                                </small>
                                            @else
                                                <p class="text-primary">
                                                    {{ isset($flashs->varients[0]->price) ? @$flashs->varients[0]->price : $flashs->price }}
                                                    PKR
                                                </p>
                                            @endif
                                        </div>
                                        <ul class="product-links d-flex align-items-center gap-2 mt-4">
                                            @if ($flashs->varient_attr == null)
                                                <li>
                                                    <form class="addcartbtn">

                                                        @csrf
                                                        <input type="text" class="product_id" name="p_id" hidden
                                                            value="{{ $flashs->id }}">

                                                        <input type="hidden" class="roamer_id" name="roamerId"
                                                            value="{{ $flashs->user_id }}">
                                                        <input type="hidden" class="vendor_id" name="vendorId"
                                                            value="{{ $flashs->vendor_id }}">
                                                        <input type="text" hidden name="price"
                                                            value="{{ $flashs->s_price != 0 || $flashs->price != null ? $flashs->s_price : $flashs->price }}">
                                                        <input type="text" hidden name="single" value="yes">
                                                        <input type="text" hidden name="qty" value="1">
                                                        <input type="hidden" class="h_varient_id"
                                                            value="{{ isset($flashs->varient_attr) ? $flashs->id : 0 }} "
                                                            name="v_id">
                                                        <input type="hidden" class="h_product_type" name="p_type"
                                                            value="{{ $flashs->product_type }}" name="h_product_type">
                                                        <input type="text" hidden name="variant_ID" class="variant_ID"
                                                            value="0">
                                                        <input type="text" hidden name="buy_now" value="0"
                                                            id="buynow">

                                                        <button class="addcartbtn btn btn-secondary card-icon">
                                                            Add to Cart
                                                            <img src="{{ asset('assets/images/icons/cart.svg') }}"
                                                                alt="" class="">
                                                        </button>
                                                </li>
                                                <li>
                                                    <button class="buyNowBtn btn btn-primary">
                                                        Buy Now
                                                        <img src="assets/images/icons/arrow-right.svg" alt="">
                                                    </button>
                                                </li>
                                                </form>
                                            @elseif($flashs->varient_attr != null)
                                                <li>
                                                    <a class="btn btn-secondary card-icon"
                                                        href="{{ route('product_detail', ['id' => $flashs->id]) }}">
                                                        Add to Cart
                                                        <img src="{{ asset('assets/images/icons/cart.svg') }}"
                                                            alt="" class="">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="btn btn-primary"
                                                        href="{{ route('product_detail', ['id' => $flashs->id]) }}">
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

                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </section>
    <!--##############################################################
                                                                                                                                                                                                                                                                                                                                                                                                                      END flash sale
                                                                                                                                                                                                                                                                                                                                                                                            #################################################################-->

    <!--##############################################################
                                                                                                                                                                                                                                                                                                                                                                                                                      START TOP SELLERS
                                                                                                                                                                                                                                                                                                                                                                   #################################################################-->
    @if (count($seller) != 0)
        <section class="bg-primary-clr-01">
            <div class="container">
                <div class="d-flex align-items-center gap-3">
                    <h4 class="block-title m-0">Top <span class="text-primary">Sellers</span></h4>
                    <ul>
                        <li><a href="{{ route('product.top-seller') }}"
                                class="d-flex align-items-center gray-anchor">View
                                All <i class="material-icons">
                                    chevron_right
                                </i></a></li>
                    </ul>
                </div>
                <br>
                <div class="product-card-grid-6">
                    @foreach ($seller as $sellers)
                        <div class="product-card-v2 d-flex align-items-center px-3 px-md-4 py-3 py-md-4 gap-4">
                            <div class="cover-img">
                                <img src="{{ $sellers->image1 != null ? asset($sellers->image1) : asset('images/placeholder.png') }}"
                                    alt="{{ $sellers->name }}">
                                <a href="{{ route('product_detail', ['id' => $sellers->id]) }}"
                                    class=" stretched-link"></a>
                            </div>
                            <div class="content">
                                <ul>
                                    <li><a href="{{ route('product_detail', ['id' => $sellers->id]) }}"
                                            style="-webkit-line-clamp: 2; overflow: hidden; display: -webkit-box; -webkit-box-orient: vertical;">{{ $sellers->name }}</a>
                                    </li>
                                </ul>
                                <p class=" opacity-05 my-1 font-weight-500">By: {{ $sellers->user->first_name }}</p>
                                <div class="d-flex align-items-center gap-2">
                                    @if (isset($sellers->varients[0]->s_price) || $sellers->s_price != null)
                                        <p class="text-primary">
                                            {{ isset($sellers->varients[0]->s_price) ? @$sellers->varients[0]->s_price : $sellers->s_price }}
                                            PKR
                                        </p>
                                        <small class="text-muted"><del>
                                                {{ isset($sellers->varients[0]->price) ? @$sellers->varients[0]->price : $sellers->price }}
                                                Pkr
                                            </del>
                                        </small>
                                    @else
                                        <p class="text-primary">
                                            {{ isset($sellers->varients[0]->price) ? @$sellers->varients[0]->price : $sellers->price }}
                                            PKR
                                        </p>
                                    @endif
                                </div>
                                <form class="addcartbtn">
                                    <ul class="product-links d-flex flex-column gap-2 mt-3 mt-lg-4">
                                        @if ($sellers->varient_attr == null)
                                            <li>

                                                @csrf
                                                <input type="text" class="product_id" name="p_id" hidden
                                                    value="{{ $sellers->id }}">

                                                <input type="hidden" class="roamer_id" name="roamerId"
                                                    value="{{ $sellers->user_id }}">
                                                <input type="hidden" class="vendor_id" name="vendorId"
                                                    value="{{ $sellers->vendor_id }}">
                                                <input type="text" hidden name="price"
                                                    value="{{ $flashs->s_price != 0 || $flashs->price != null ? $flashs->s_price : $flashs->price }}">
                                                <input type="text" hidden name="single" value="yes">
                                                <input type="text" hidden name="qty" value="1">
                                                <input type="hidden" class="h_varient_id"
                                                    value="{{ isset($sellers->varient_attr) ? $sellers->id : 0 }} "
                                                    name="v_id">
                                                <input type="hidden" class="h_product_type" name="p_type"
                                                    value="{{ $sellers->product_type }}" name="h_product_type">
                                                <input type="text" hidden name="variant_ID" class="variant_ID"
                                                    value="0">

                                                <button class="addcartbtn btn btn-secondary card-icon text-uppercase">
                                                    Add to Cart
                                                    <img src="{{ asset('assets/images/icons/cart.svg') }}" alt=""
                                                        class="">
                                                </button>

                                            </li>
                                            <li>
                                                <button class="buyNowBtn btn btn-primary text-uppercase">
                                                    Buy Now
                                                    <img src="assets/images/icons/arrow-right.svg" alt="">
                                                </button>
                                            </li>
                                        @elseif($sellers->varient_attr != null)
                                            <li>
                                                <button class="addcartbtn btn btn-secondary card-icon text-uppercase">
                                                    Add to Cart
                                                    <img src="{{ asset('assets/images/icons/cart.svg') }}" alt=""
                                                        class="">
                                                </button>
                                            </li>
                                            <li>
                                                <a href="{{ route('product_detail', ['id' => $sellers->id]) }}"
                                                    class="btn btn-primary  text-uppercase">
                                                    Buy Now
                                                    <img src="assets/images/icons/arrow-right.svg" alt=""></a>
                                            </li>
                                        @endif
                                    </ul>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>
    @endif

    <!--##############################################################
                                                                                                                                                                                                                                                                                                                                                                                                                      END  TOP SELLERS
                                                                                                                                                                                                                                                                                                                                                                                            #################################################################-->

    <!--##############################################################
                                                                                                                                                                                                                                                                                                                                                                                                                      START NEW ARRIVAL SELLERS
                                                                                                                                                                                                                                                                                                                                                                                            #################################################################-->

    @if (count($arrival) != 0)
        <section class="pb-5">
            <div class="container">
                <div class="d-flex align-items-center gap-3">
                    <h4 class="block-title m-0">New <span class="text-primary">Arrivals</span></h4>
                    <ul>
                        <li><a href="{{ route('product.new-arrivals') }}"
                                class="d-flex align-items-center gray-anchor">View All <i class="material-icons">
                                    chevron_right
                                </i></a></li>
                    </ul>
                </div>
                <br>
                <div class="product-card-grid-5">
                    @foreach ($arrival as $arrivals)
                        <div class="product-card-v1">
                            <div class="cover-img">
                                <a href="{{ route('product_detail', ['id' => $arrivals->id]) }}">
                                    <img src="{{ $arrivals->image1 != null ? asset($arrivals->image1) : asset('images/placeholder.png') }}"
                                        alt="{{ $arrivals->name }}">
                                </a>
                            </div>
                            <div class="content">
                                <ul>
                                    <li><a
                                            href="{{ route('product_detail', ['id' => $arrivals->id]) }}">{{ $arrivals->name }}</a>
                                    </li>
                                </ul>
                                <div class="d-flex align-items-center gap-2">
                                    @if (isset($arrivals->varients[0]->s_price) || $arrivals->s_price != null)
                                        <p class="text-primary">
                                            {{ isset($arrivals->varients[0]->s_price) ? @$arrivals->varients[0]->s_price : $arrivals->s_price }}
                                            PKR
                                        </p>
                                        <small class="text-muted"><del>
                                                {{ isset($arrivals->varients[0]->price) ? @$arrivals->varients[0]->price : $arrivals->price }}
                                                Pkr
                                            </del>
                                        </small>
                                    @else
                                        <p class="text-primary">
                                            {{ isset($arrivals->varients[0]->price) ? @$arrivals->varients[0]->price : $arrivals->price }}
                                            PKR
                                        </p>
                                    @endif
                                </div>

                                <ul class="product-links d-flex align-items-center gap-2 mt-4">
                                    @if ($arrivals->varient_attr == null)
                                        <li>
                                            <form class="addcartbtn">

                                                @csrf
                                                <input type="text" class="product_id" name="p_id" hidden
                                                    value="{{ $arrivals->id }}">

                                                <input type="hidden" class="roamer_id" name="roamerId"
                                                    value="{{ $arrivals->user_id }}">
                                                <input type="hidden" class="vendor_id" name="vendorId"
                                                    value="{{ $arrivals->vendor_id }}">
                                                <input type="text" hidden name="price"
                                                    value="{{ $arrivals->s_price != 0 || $arrivals->price != null ? $arrivals->s_price : $arrivals->price }}">
                                                <input type="text" hidden name="single" value="yes">
                                                <input type="text" hidden name="qty" value="1">
                                                <input type="hidden" class="h_varient_id"
                                                    value="{{ isset($arrivals->varient_attr) ? $arrivals->id : 0 }} "
                                                    name="v_id">
                                                <input type="hidden" class="h_product_type" name="p_type"
                                                    value="{{ $arrivals->product_type }}" name="h_product_type">
                                                <input type="text" hidden name="variant_ID" class="variant_ID"
                                                    value="0">

                                                <button class="addcartbtn btn btn-secondary">
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
                                    @elseif($arrivals->varient_attr != null)
                                        <li>
                                            <a class="btn btn-secondary card-icon"
                                                href="{{ route('product_detail', ['id' => $arrivals->id]) }}">
                                                Add to Cart
                                                <img src="{{ asset('assets/images/icons/cart.svg') }}" alt=""
                                                    class="">
                                            </a>
                                        </li>
                                        <li>
                                            <a class="btn btn-primary"
                                                href="{{ route('product_detail', ['id' => $arrivals->id]) }}">
                                                Buy Now
                                                <img src="assets/images/icons/arrow-right.svg" alt="">
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!--##############################################################
                                                                                                                                                                                                                                                                                                                                                                                                                      END NEW ARRIVAL SELLERS
                                                                                                                                                                                                                                                                                                                                                                                            #################################################################-->


    <!--##############################################################
                                                                                                                                                                                                                                                                                                                                                                                                                      START CATEGOREES SELLERS
                                                                                                                                                                                                                                                                                                                                                                                            #################################################################-->
    <section class="pt-0">
        <div class="container">
            <div class="d-flex align-items-center gap-3">
                <h4 class="block-title m-0">Categories</h4>
                <ul>
                    <li>
                        <a href="{{ route('categories.index') }}" class="d-flex align-items-center gray-anchor">View
                            All <i class="material-icons">
                                chevron_right
                            </i></a>
                    </li>
                </ul>
            </div>
            <div class="categories-card-v1 mt-4">
                <div class="row justify-content-center g-1 g-md-4">
                    @foreach ($sub_cat as $key => $cat)
                        <div class="box col-xl-3 col-md-4">
                            <a
                                href="{{ route('product_grid', ['slug' => $cat->category->slug, 'sub_cat' => $cat->id]) }}">
                                <img src="{{ asset($cat->image) }}" alt="">
                                <p class="text-end">{{ $cat->name }}</p>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!--##############################################################
                                                                                                                                                                                                                                                                                                                                                                                                                      END CATEGORIES SELLERS
                                                                                                                                                                                                                                                                                                                                                                                            #################################################################-->
@endsection
@push('head')
    <script type="text/javascript">
        var swiper = new Swiper(".mySwiper", {
            preloadImages: true,
            grabCursor: true,
            speed: 1500,
            autoplay: {
                delay: 5000,
            },
            pagination: {
                el: ".swiper-pagination",
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
@endpush
