@extends('layouts.app')
@section('content')
    <!--##############################################################
                                                                                                                                                                                                                                                                                                                              sTART product detail
                                                                                                                                                                                                                                                                                                    #################################################################-->
    <section>
        <div class="SideWithPadding">
            <div id="cartmsg" class="m-4">
            </div>
            <div class="row">
                <div class="col-md-5 order-2 order-md-0" id="productdiv">
                    <div class="d-flex align-items-center justify-content-between">
                        <h6 class=" opacity-05">{{ $data->category->name }}</h6>
                        <ul class="d-flex align-items-center rating-size <?php if (count(calculateProductRatings($data->id)) > 0) {
                            echo 'rating-clr';
                        } ?>">
                            @forelse (calculateProductRatings($data->id) as $item)
                                <li>
                                    <i class="material-icons">
                                        grade
                                    </i>
                                </li>
                            @empty
                                <li>
                                    <i class="bi bi-star"></i>
                                </li>
                                <li>
                                    <i class="bi bi-star"></i>
                                </li>
                                <li>
                                    <i class="bi bi-star"></i>
                                </li>
                                <li>
                                    <i class="bi bi-star"></i>
                                </li>
                                <li>
                                    <i class="bi bi-star"></i>
                                </li>
                            @endforelse
                        </ul>
                    </div>
                    <h1 class="font-weight-900 product-single-title font-30px font-md-47px">{{ $data->name }} </h1>
                    <h5 class="text-primary font-22px font-md-30px my-4" id="t_price_id">
                        Rs.
                        {{ isset($data->varients[0]->price) ? @$data->varients[0]->price : $data->price }}
                        {{ env('CURRENCY') }}
                    </h5>
                    <p>{!! $data->english_description !!}</p>
                    <br>


                    {{-- @php
                        $var = App\Models\ProductVariation::where('product_id', 3)->first();
                        dd(json_decode($var->options));
                    @endphp --}}


                    <div class="product-detail-links mt-3">
                        <form class="addcartbtn">
                            @csrf
                            @foreach ($attr as $a)
                                <div class="size-varients">
                                    <h6 class="font-weight-600">Select {{ $a->label }}</h6>
                                    <div class="checkbox-btn mt-3">
                                        <ul>
                                            @foreach ($data->varients as $k => $v)
                                                @php

                                                    $opt = json_decode($v->options, '""');
                                                    $var = json_decode($data->varient_attr);
                                                    $option = implode(' ', $opt);
                                                    // dd(checkAttribute($v->options));
                                                @endphp

                                                @if (checkAttribute($v->options) == $a->id)
                                                    <li class="li{{ $v->id }}">
                                                        <input type="radio" name="variants_{{ $a->id }}"
                                                            class="vId" onclick="checkVariant({{ $v->id }}, this)"
                                                            value="{{ $v->id }}" id="{{ $a->slug . $v->id }}">
                                                        <label for="{{ $a->slug . $v->id }}">{{ $option }}</label>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <br>
                            @endforeach

                            <div class="product-increment my-4">
                                <div class="cover-increment-number d-flex align-items-center justify-content-center">
                                    <div class="dec btn btn-default pull-left">-</div>
                                    <input type="text" name="qty" class="qty" disabled id="input1"
                                        min="1" value="{{ getCartCount($data->id) }}">
                                    <div class="inc btn btn-default">+</div>

                                </div>
                            </div>

                            <ul class="d-flex align-items-center gap-1 flex-wrap">
                                <li class="flex-fill">
                                    @if(count($data->varients) == 0)
                                        <button class="addcartbtn btn btn-primary">Buy Now <img
                                                src="{{ asset('assets/images/icons/arrow-right.svg') }}" alt="">
                                        </button>
                                    @else
                                        <button class="addcartbtn btn btn-primary pe-none user-select-none opacity-07">Buy Now <img
                                                src="{{ asset('assets/images/icons/arrow-right.svg') }}" alt="">
                                        </button>
                                    @endif
                                </li>
                                <li class="flex-fill">

                                    <input type="text" class="product_id" name="p_id" hidden
                                        value="{{ $data->id }}">

                                    <input type="hidden" class="roamer_id" name="roamerId" value="{{ $data->user_id }}">
                                    <input type="hidden" class="h_varient_id"
                                        value="{{ isset($data->varient_attr) ? $data->id : 0 }} " name="v_id">
                                    <input type="text" hidden name="price" value="{{ $data->price }}" id="">
                                    <input type="text" hidden name="qty" id="qty" value="1"
                                        id="">
                                    <input type="text" hidden name="variant_ID" class="variant_ID" value="0">

                                    <input type="hidden" class="h_product_type" name="p_type"
                                        value="{{ $data->product_type }}" name="h_product_type">

                                    @if(count($data->varients) == 0)
                                        <button class="addcartbtn btn btn-secondary card-icon">
                                            Add to Cart
                                            <img src="{{ asset('assets/images/icons/cart.svg') }}" alt=""
                                                class="">
                                        </button>
                                    @else
                                    <button class="addcartbtn btn btn-secondary card-icon pe-none user-select-none opacity-07">
                                        Add to Cart
                                        <img src="{{ asset('assets/images/icons/cart.svg') }}" alt=""
                                            class="">
                                    </button>
                                    @endif


                                </li>
                            </ul>
                        </form>
                    </div>
                    <br>
                    <div class="according-style-2 mt-3">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#according-st-2-1" aria-expanded="true" aria-controls="collapseOne">
                                        Short Description
                                    </button>
                                </h2>
                                <div id="according-st-2-1" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {!! $data->short_description !!}
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#according-st-2-2" aria-expanded="false"
                                        aria-controls="collapseOne">
                                        Description
                                    </button>
                                </h2>
                                <div id="according-st-2-2" class="accordion-collapse collapse"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {!! $data->english_description !!}
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#according-st-2-3" aria-expanded="false"
                                        aria-controls="collapseOne">
                                        Reviews
                                    </button>
                                </h2>
                                <div id="according-st-2-3" class="accordion-collapse collapse"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="d-flex align-items-center">
                                            <ul class="d-flex align-items-center rating-size rating-clr">
                                                @foreach (calculateProductRatings($data->id) as $item)
                                                    <li><i class="material-icons">
                                                            grade
                                                        </i></li>
                                                @endforeach
                                            </ul>
                                            <h6 class="opacity-05 font-weight-400">({{ count($data->reviews) }} customer
                                                reviews)</h6>
                                        </div>
                                        <div
                                            class="d-flex align-items-center justify-content-between flex-wrap my-2 border-bottom pb-3">
                                            <h6 class="font-weight-600 m-0">
                                                {{ count(calculateProductRatings($data->id)) }} out of 5 Stars</h6>
                                            <ul>
                                                <li><a href="#." data-bs-toggle="modal"
                                                        data-bs-target="#leavecomment"
                                                        class="primary-anchor text-decoration-underline">Leave a review</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div
                                            class="d-flex align-items-center justify-content-between flex-wrap my-4 border-bottom pb-4 gap-2">
                                            <h6 class="font-weight-600 m-0">Customer Reviews</h6>
                                            <div class="d-flex align-items-center gap-3">
                                            </div>
                                        </div>
                                        <div class="comment-area">
                                            <ul class="fixed-height-400">
                                                @foreach ($data->reviews as $reviews)
                                                    <li>
                                                        <div class="comment-box">
                                                            <div class="d-flex align-items-start gap-3">
                                                                <h4 class="shorrname flex-shrink-0">USER</h4>
                                                                <div>
                                                                    <h6 class=" font-weight-700 m-0"></h6>
                                                                    <small class="opacity-05 fst-italic"
                                                                        style="font-weight: bold;">
                                                                        {{ $reviews->customer->name }}
                                                                    </small>
                                                                    <br>
                                                                    <small class=" opacity-05 fst-italic">
                                                                        {{ date('F, j Y', strtotime($reviews->created_at)) }}
                                                                    </small>
                                                                    <ul
                                                                        class="d-flex align-items-center rating-size rating-clr">
                                                                        @foreach (calculateProductRatings($data->id) as $rating)
                                                                            <li>
                                                                                <i class="material-icons">
                                                                                    grade
                                                                                </i>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                    <p>
                                                                        {{ $reviews->review }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @foreach ($reviews->response as $response)
                                                        <li style="padding-left: 70px;">
                                                            <div class="comment-box">
                                                                <div class="d-flex align-items-start gap-3">
                                                                    <h4 class="shorrname flex-shrink-0"
                                                                        style="width: 35px; height: 35px; font-size: 10px">
                                                                        USER</h4>
                                                                    <div>
                                                                        <h6 class=" font-weight-700 m-0"></h6>
                                                                        <small class="opacity-05 fst-italic"
                                                                            style="font-weight: bold;">
                                                                            {{ $response->user->first_name }}
                                                                        </small>
                                                                        <br>
                                                                        <small class=" opacity-05 fst-italic">
                                                                            {{ date('F, j Y', strtotime($response->created_at)) }}
                                                                        </small>
                                                                        <p>
                                                                            {{ $response->response }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-7">
                    <div class="cover-slider portfolio-slider mb-4">
                        <div class="swiper slidepreview">
                            <div class="swiper-wrapper">
                                @if ($data->image1)
                                    <div class="swiper-slide">
                                        <img src="{{ $data->image1 }}" />
                                    </div>
                                @endif
                                @if ($data->image2)
                                    <div class="swiper-slide">
                                        <img src="{{ $data->image2 }}" />
                                    </div>
                                @endif
                                @if ($data->image3)
                                    <div class="swiper-slide">
                                        <img src="{{ $data->image3 }}" />
                                    </div>
                                @endif
                                @if ($data->image4)
                                    <div class="swiper-slide">
                                        <img src="{{ $data->image4 }}" />
                                    </div>
                                @endif
                                @if ($data->image5)
                                    <div class="swiper-slide">
                                        <img src="{{ $data->image5 }}" />
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div thumbsSlider="" class="swiper thumb-preview">
                            <div class="swiper-wrapper">
                                @if ($data->image1)
                                    <div class="swiper-slide">
                                        <img src="{{ $data->image1 }}" />
                                    </div>
                                @endif
                                @if ($data->image2)
                                    <div class="swiper-slide">
                                        <img src="{{ $data->image2 }}" />
                                    </div>
                                @endif
                                @if ($data->image3)
                                    <div class="swiper-slide">
                                        <img src="{{ $data->image3 }}" />
                                    </div>
                                @endif
                                @if ($data->image4)
                                    <div class="swiper-slide">
                                        <img src="{{ $data->image4 }}" />
                                    </div>
                                @endif
                                @if ($data->image5)
                                    <div class="swiper-slide">
                                        <img src="{{ $data->image5 }}" />
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!--##############################################################
                                                                                                                                                                                                                                                                                                                                END product detail
                                                                                                                                                                                                                                                                                                    #################################################################-->

    <!--##############################################################
                                                                                                                                                                                                                                                                                                                                start You Might Also Like
                                                                                                                                                                                                                                                                                                    #################################################################-->
    <section class="pb-5">
        <div class="SideWithPadding">
            <div class="d-flex align-items-center gap-3">
                <h4 class="block-title m-0">Related <span class="text-primary">Products</span></h4>
                <ul>
                    <li><a href="{{ route('shop') }}" class="d-flex align-items-center gray-anchor">View All <i
                                class="material-icons">
                                chevron_right
                            </i></a></li>
                </ul>
            </div>
            <div class="cover-slider mt-4">
                <div class="swiper multiProductSlider">
                    <div class="swiper-wrapper">
                        @foreach ($related_products as $item)
                            <div class="swiper-slide">
                                <div class="product-card-v1">
                                    <div class="cover-img">
                                        <a href="{{ route('product_detail', ['id' => $item->id]) }}"><img
                                                src="{{ asset($item->image1) }}" alt=""></a>
                                        <div class="off-status">
                                            <p>50% Off</p>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            <li><a
                                                    href="{{ route('product_detail', ['id' => $item->id]) }}">{{ $item->name }}</a>
                                            </li>
                                        </ul>
                                        <div class="d-flex align-items-center gap-2">
                                            <p class="text-primary">
                                                {{ isset($item->varients[0]->price) ? @$item->varients[0]->price : $item->price }}
                                                PKR</p>
                                            <small
                                                class="text-muted"><del>{{ isset($item->varients[0]->p_price) ? @$item->varients[0]->p_price . ' PKR' : $item->p_price . ' PKR' }}</del></small>
                                        </div>
                                        <ul class="product-links d-flex align-items-center gap-2 mt-4">
                                            <li>

                                                @if ($item->varient_attr == null)
                                                    <form class="addcartbtn">
                                                        @csrf
                                                        <input type="text" class="product_id" name="p_id" hidden
                                                            value="{{ $item->id }}">

                                                        <input type="hidden" class="roamer_id" name="roamerId"
                                                            value="{{ $item->user_id }}">
                                                        <input type="text" hidden name="price"
                                                            value="{{ $item->price }}">
                                                        <input type="text" hidden name="qty" value="1">
                                                        <input type="hidden" class="h_varient_id"
                                                            value="{{ isset($item->varient_attr) ? $item->id : 0 }} "
                                                            name="v_id">
                                                        <input type="hidden" class="h_product_type" name="p_type"
                                                            value="{{ $item->product_type }}" name="h_product_type">
                                                        <input type="text" hidden name="variant_ID" class="variant_ID"
                                                            value="0">

                                                        <button class="addcartbtn btn btn-secondary card-icon">
                                                            Add to Cart
                                                            <img src="{{ asset('assets/images/icons/cart.svg') }}"
                                                                alt="" class="">
                                                        </button>
                                                    </form>
                                                @elseif($item->varient_attr != null)
                                                    <a class="btn btn-secondary card-icon"
                                                        href="{{ route('product_detail', ['id' => $item->id]) }}">
                                                        Add to Cart
                                                        <img src="{{ asset('assets/images/icons/cart.svg') }}"
                                                            alt="" class="">
                                                    </a>
                                                @endif
                                            </li>
                                            <li><a href="{{ route('product_detail', ['id' => $item->id]) }}"
                                                    class="btn btn-primary">
                                                    Buy Now
                                                    <img src="{{ asset('assets/images/icons/arrow-right.svg') }}"
                                                        alt=""></a></li>
                                        </ul>

                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </section>

    <!--##############################################################
                                                                                                                                                                                                                                                                                                                                END You Might Also Like
                                                                                                                                                                                                                                                                                                    #################################################################-->

    <!--##############################################################
                                                                                                                                                                                                                                                                                                                                STRAT Related Products
                                                                                                                                                                                                                                                                                                    #################################################################-->
    <section class="pt-0">
        <div class="SideWithPadding">
            <div class="d-flex align-items-center gap-3">
                <h4 class="block-title m-0">You <span class="text-primary">Might Also Like</span></h4>
                <ul>
                    <li><a href="{{ route('shop') }}" class="d-flex align-items-center gray-anchor">View All <i
                                class="material-icons">
                                chevron_right
                            </i></a></li>
                </ul>
            </div>
            <div class="cover-slider mt-4">
                <div class="swiper multiProductSlider">
                    <div class="swiper-wrapper">
                        @foreach ($like as $item)
                            <div class="swiper-slide">
                                <div class="product-card-v1">
                                    <div class="cover-img">
                                        <a href="{{ route('product_detail', ['id' => $item->id]) }}"><img
                                                src="{{ asset($item->image1) }}" alt=""></a>
                                        <div class="off-status">
                                            <p>50% Off</p>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            <li><a
                                                    href="{{ route('product_detail', ['id' => $item->id]) }}">{{ $item->name }}</a>
                                            </li>
                                        </ul>
                                        <div class="d-flex align-items-center gap-2">
                                            <p class="text-primary">
                                                {{ isset($item->varients[0]->price) ? @$item->varients[0]->price : $item->price }}
                                                PKR</p>
                                            <small
                                                class="text-muted"><del>{{ isset($item->varients[0]->p_price) ? @$item->varients[0]->p_price . ' PKR' : $item->p_price . ' PKR' }}</del></small>
                                        </div>
                                        <ul class="product-links d-flex align-items-center gap-2 mt-4">
                                            <li>

                                                @if ($item->varient_attr == null)
                                                    <form class="addcartbtn">
                                                        @csrf
                                                        <input type="text" class="product_id" name="p_id" hidden
                                                            value="{{ $item->id }}">

                                                        <input type="hidden" class="roamer_id" name="roamerId"
                                                            value="{{ $item->user_id }}">
                                                        <input type="text" hidden name="price"
                                                            value="{{ $item->price }}">
                                                        <input type="text" hidden name="qty" value="1">
                                                        <input type="hidden" class="h_varient_id"
                                                            value="{{ isset($item->varient_attr) ? $item->id : 0 }} "
                                                            name="v_id">
                                                        <input type="hidden" class="h_product_type" name="p_type"
                                                            value="{{ $item->product_type }}" name="h_product_type">
                                                        <input type="text" hidden name="variant_ID" class="variant_ID"
                                                            value="0">

                                                        <button class="addcartbtn btn btn-secondary card-icon"
                                                            data-bs-toggle="tooltip"
                                                            data-bs-title="Select Variant First!">
                                                            Add to Cart
                                                            <img src="{{ asset('assets/images/icons/cart.svg') }}"
                                                                alt="" class="">
                                                        </button>
                                                    </form>
                                                @elseif($item->varient_attr != null)
                                                    <a class="btn btn-secondary card-icon"
                                                        href="{{ route('product_detail', ['id' => $item->id]) }}">
                                                        Add to Cart
                                                        <img src="{{ asset('assets/images/icons/cart.svg') }}"
                                                            alt="" class="">
                                                    </a>
                                                @endif
                                            </li>
                                            <li><a href="{{ route('product_detail', ['id' => $item->id]) }}"
                                                    class="btn btn-primary">
                                                    Buy Now
                                                    <img src="{{ asset('assets/images/icons/arrow-right.svg') }}"
                                                        alt=""></a></li>
                                        </ul>

                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </section>
    <!--##############################################################
                                                                                                                                                                                                                                                                                                                                END Related Products
                                                                                                                                                                                                                                                                                                    #################################################################-->
    <!-- modal -->

    <div class="modal fade" id="leavecomment" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header p-4 p-md-5">
                    <div>
                        <h3 class="modal-title font-weight-600">Rate <span class="primary-text">& Review</span></h3>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4 p-md-5">
                    <div class="comment-box mt-0">
                        <form action="{{ route('rating.store') }}" method="POST">
                            @csrf
                            <div class="d-flex align-items-start gap-3">
                                @php
                                    $customer = Session::get('customer');
                                @endphp
                                @if ($customer != null)
                                    <h4 class="shorrname flex-shrink-0">U</h4>
                                @endif
                                <div class="w-100">
                                    @if ($customer != null)
                                        <h6 class=" font-weight-700 m-0">{{ $customer->name }}</h6>
                                    @else
                                        <h6 class=" font-weight-700 m-0">Please login to post a review</h6>
                                    @endif
                                    <small class=" opacity-05 fst-italic">Your review will be posted publicly on the web.
                                        <a href="#">Learn More</a></small>
                                    <input type="text" name="productid" value="{{ $data->id }}" hidden>
                                    <div class="cover-rating">
                                        <fieldset class="rating my-4">
                                            <input type="radio" id="star5" name="rating" value="5"><label
                                                class="full star5" for="star5" title="Awesome - 5 stars"
                                                data-star="5"></label>

                                            <input type="radio" id="star4" name="rating" value="4"><label
                                                class="full star4" for="star4" title="Pretty good - 4 stars"
                                                data-star="4"></label>

                                            <input type="radio" id="star3" name="rating" value="3"><label
                                                class="full star3" for="star3" title="Meh - 3 stars"
                                                data-star="3"></label>

                                            <input type="radio" id="star2" name="rating" value="2"><label
                                                class="full star2" for="star2" title="Kinda bad - 2 stars"
                                                data-star="2"></label>

                                            <input type="radio" id="star1" name="rating" value="1"><label
                                                class="full star1" for="star1" title="Sucks big time - 1 star"
                                                data-star="1"></label>

                                        </fieldset>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="review" required rows="5" class="form-control placeholder-italic"
                                            placeholder="Write your review..." style="max-height: 135px;"></textarea>
                                    </div>
                                    <ul class="d-flex align-items-center justify-content-end gap-3 mt-5">
                                        <li>
                                            <button <?php if ($customer != null) {
                                                if (checkCustomerOrder($customer->id, $data->id) == null) {
                                                    echo 'disabled';
                                                }
                                            } ?>
                                                class="btn btn-primary extra-btn-padding-40 text-uppercase"
                                                type="submit">
                                                Post
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @push('head')
        <script type="text/javascript">
            $('.radiobutton').on('click', function() {
                if ($('#h_product_type').val() == 1) {
                    var names = {};
                    $('#productdiv input:radio').each(function() { // find unique names
                        names[$(this).attr('name')] = $("input[name='" + $(this).attr('name') + "']:checked")
                            .val();
                        //
                    });
                    var count = 0;
                    $.each(names, function() { // then count them
                        count++;
                    });
                    if ($('#productdiv input:radio:checked').length == count) {
                        // ajax to get price;
                        p_id = $('#hidden_product_id').val();
                        $.get("/getselectedprice/" + p_id, names, function(data, textStatus, jqXHR) {
                            if (data.success) {
                                $('#t_price_id').html('');
                                $('#t_price_id').html(data.data.price);
                                $('#h_varient_id').val(data.data.id);
                                $('#input1').val();
                            } else {
                                $('#t_price_id').html('');
                                $('#t_price_id').html('Out of Stock');
                                $('#h_varient_id').val('');
                            }
                        }, "json");

                    }
                }
            });


            var swiper = new Swiper(".thumb-preview", {
                loop: false,
                spaceBetween: 10,
                slidesPerView: 3.5,
                freeMode: true,
                watchSlidesProgress: true,
            });
            var swiper2 = new Swiper(".slidepreview", {
                loop: false,
                spaceBetween: 10,
                speed: 1500,
                autoplay: {
                    delay: 5000,
                },
                // navigation: {
                //     nextEl: ".swiper-button-next",
                //     prevEl: ".swiper-button-prev",
                // },
                thumbs: {
                    swiper: swiper,
                },
            });
        </script>
        <script>
            var variants = [];

            function checkVariantInput() {
                var radios = document.getElementsByClassName('vId');
                variants = [];
                for (var i = 0; i < radios.length; i++) {
                    if (radios[i].type === 'radio' && radios[i].checked) {
                        // get value, set checked flag or do whatever you need to
                        // console.log(radios[i].value);
                        variants.push(radios[i].value);
                    }
                }
            }

            // $('.addcartbtn').attr('disabled', true);

            function checkVariant(id, input) {
                checkVariantInput();
                console.log(variants);
                // console.log(id);
                // console.log($('.vId').val() + ' - ' + id);
                $("input[class=vId]")
                    .each(function() {

                        if (this.value == id) {
                            $("input[value=" + id + "]").attr("checked", true);

                            // console.log($("input[value=" + id + "]"));
                        } else {

                            $("input[id=" + this.id + "]").attr("checked", false);

                            // variants.push(id);
                            // console.log($("input[id=" + this.id + "]"));
                        }

                    });
                console.log(variants);
                $('.variant_ID').val(variants);
                $.ajax({
                    url: '{{ route('front.index') }}' + '/getPriceByVariant/' + id,
                    method: 'get',
                    success: function(response) {
                        if (response.status == 200) {
                            $('#t_price_id').html('');
                            $('#t_price_id').html('Rs. ' + response.price + ' {{ env('CURRENCY') }}');
                        }
                        $('.addcartbtn').removeClass('pe-none user-select-none opacity-07');
                    }
                })

            }
        </script>
    @endpush
@endsection
