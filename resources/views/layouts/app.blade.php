<?php

use App\Models\Category;
ShippingNull();
cartIfEmpty();
function getCatlog()
{
    $catlog = Category::all();
    return $catlog;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- <link rel="icon" type="image/png" sizes="64x64" href="assets/images/fav.png"> -->
    <meta name="description"
        content="A place where you can track all your important information to keep your life on track. We can track both Personal and business information in one go rather than having them separated.">

    <!-- og -->
    <meta property="og:description"
        content="A place where you can track all your important information to keep your life on track. We can track both Personal and business information in one go rather than having them separated." />
    <!-- boostrap -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap/bootstrap.min.css') }}" />

    <!-- animations -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/WOW-master/css/libs/animate.css') }}" />


    <!-- font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- icons -->

    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->


    <!--<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"-->
    <!--    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/swiper-slider/swiper-bundle.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pagination/pagination.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery-ui/jquery-ui.min.css') }}" />
    <!-- css file -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    {{--  --}}
    <link rel="stylesheet" href="{{ asset('assets/sass/utility/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/media.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/admin/css/select2-bootstrap-5-theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/select2-bootstrap-5-theme.min.css.map') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/select2-bootstrap-5-theme.min.scss') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/select2.min.css') }}">



    <title>Bazaar</title>
</head>


<body>
    <div id="addsuccesstoaster"
        class='position-fixed toast align-items-center text-bg-primary border-0 fade p-2 primary-bg' role="alert"
        aria-live="assertive" aria-atomic="true" style='top: 40px; right: 20px; z-index: 9999'>
        <div class="d-flex">
            <div class="toast-body font-16px text-white" id="title">Product Add Successfully!!</div>
        </div>
    </div>
    <div id="adderrortoaster"
        class='position-fixed toast align-items-center text-bg-primary border-0 fade p-2 bg-danger' role="alert"
        aria-live="assertive" aria-atomic="true" style='top: 40px; left: 20px; z-index: 9999'>
        <div class="d-flex">
            <div class="toast-body font-16px text-white" id="title">Product Removed Successfully!!</div>
        </div>
    </div>
    <!--########################### ###################################
                          START HEADER
#################################################################-->
    <?php
    $cart = session()->get('cart');
    // dd($cart);
    ?>
    <div class="cover-topheader py-3">
        <div class="container d-flex align-items-center w-100">
            <div class="block d-flex align-items-center gap-2">
                <!--<div class="d-lg-none">-->
                <!--    <a href="#categoriesMobile" data-bs-toggle="offcanvas" role="button"-->
                <!--        aria-controls="offcanvasExample">-->
                <!--        <i class="material-icons" style="line-height: inherit; color: var(--bs-primary);">-->
                <!--            segment-->
                <!--        </i>-->
                <!--    </a>-->
                <!--</div>-->
                <div class="cover-logo">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="image">
                    </a>
                </div>
            </div>
            <div class="block d-none d-md-block">
                <form action="{{ route('search') }}" method="GET">
                    <div class="form-group input-group m-0">
                        <input type="search" class="form-control" name="search" placeholder="Search in Bazaar">
                        <button class="btn btn-primary">
                            <i class="material-icons">
                                search
                            </i>
                        </button>
                    </div>
                </form>
            </div>
            <div class="block">
                <ul class="user-area d-flex align-items-center justify-content-end gap-2 gap-md-4">
                    @if (Session::get('customer'))
                        <li class="nav-item">
                            <a href="{{ url('/my-wallet') }}">
                                <img src="{{ asset('assets/images/icons/Wallet.svg') }}" alt="">
                                <span class="d-none d-md-block">Wallet</span></a>
                        </li>
                    @endif
                    <li class="nav-item dropdown position-relative">

                        @if (Session::has('customer'))
                            <a href="#" class="nav-link dropdown-toggle arrow-none new-arrow-down"
                                id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <img src="{{ asset('assets/images/icons/user.svg') }}" alt=""> <span
                                    class="d-none d-md-block">My Account</span></a>
                            <div class="dropdown-menu dropdown-menus" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="{{ url('/userprofile') }}">Profile </a>
                                <a class="dropdown-item" href="{{ url('/myorder') }}">My Order</a>
                                <a class="dropdown-item" href="{{ route('front.userlogout') }}">Logout</a>
                            </div>
                        @else
                            <a href="#" class="nav-link dropdown-toggle arrow-none new-arrow-down"
                                id="dropdownId" data-bs-toggle="modal" data-bs-target="#loginmodal"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="{{ asset('assets/images/icons/user.svg') }}" alt=""> <span
                                    class="d-none d-md-block">Login</span></a>
                        @endif


                    </li>
                    <li><a href="#cart-v1" data-bs-toggle="offcanvas" role="button"
                            aria-controls="offcanvasExample"><img src="{{ asset('assets/images/icons/cart.svg') }}"
                                alt="">
                            <span class="productCartCount" id="count">({{ CartCount(sessionID()) }})</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--start  categories -->
    @include('Front.partials.category-header')

    <!-- mobile categories -->
    <div class="offcanvas offcanvas-start" tabindex="1" id="categoriesMobile"
        aria-labelledby="offcanvasExampleLabel" aria-hidden="true">
        <div class="offcanvas-header align-items-start">
            <div>
                <img src="assets/images/logo.png" alt="">
                <h5 class="offcanvas-title font-weight-500" id="offcanvasExampleLabel">Categories List</h5>
            </div>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body categoriesMobile fixed-height-700">
            <div class="accordion bottom-line-spacing not-last-border-line" id="mobileAccordionExample"
                style="--bs-accordion-btn-padding-y: 0; --bs-accordion-btn-padding-x: 0; --bs-accordion-border-width: 0; --bs-accordion-active-bg: white; --bs-accordion-active-color: var(--bs-primary); --bl-spacing: 10px">
                @foreach (getCategories() as $key => $cat)
                    <div class="accordion-item">
                        <h2 class="accordion-header d-flex w-100" id="heading<?php echo $key + 1; ?>">
                            <button onclick="<?php if (checkSubCategory($cat->id) == 0) {
                                echo "window.location.href='/category/$cat->slug'";
                            } ?>"
                                class="accordion-button collapsed opacity-07 fw-600 @if (checkSubCategory($cat->id) == 0) {{ 'arrow-hide-mobile' }} @endif"
                                type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse<?php echo $key + 1; ?>" aria-expanded="false"
                                aria-controls="collapse<?php echo $key + 1; ?>">
                                {{ $cat->name }}
                            </button>
                        </h2>
                        @if (checkSubCategory($cat->id) > 0)
                            <div id="collapse<?php echo $key + 1; ?>" class="accordion-collapse collapse"
                                aria-labelledby="heading<?php echo $key + 1; ?>" data-bs-parent="#mobileAccordionExample">
                                <div class="accordion-body px-0">
                                    <ul class=" not-last-border-line bottom-line-spacing" style="--bl-spacing: 8px">
                                        @foreach ($cat->subcategory as $item)
                                            <li>
                                                <a href="{{ route('product_grid', ['slug' => $cat->slug, 'sub_cat' => $item->slug]) }}"
                                                    class=" text-dark link-primary text-capitalize font-13px">
                                                    {{ $item->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach

            </div>
        </div>
    </div>


    <!-- end catrogries -->

    <!-- start mobile Search Area -->
    <div class="offcanvas offcanvas-end" tabindex="1" id="mobilesearch" aria-labelledby="offcanvasExampleLabel"
        aria-hidden="true">
        <div class="offcanvas-header align-items-start">
            <div>
                <img src="assets/images/logo.png" alt="">
                <h5 class="offcanvas-title font-weight-500" id="offcanvasExampleLabel">Product Search</h5>
            </div>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body mobileproduct0search">
            <div class="form-group">
                <form action="{{ route('search') }}" method="GET">
                    <div class="form-group input-group m-0">
                        <input type="search" class="form-control" name="search" placeholder="Search in Bazaar">
                        <button class="btn btn-primary">
                            <i class="material-icons">
                                search
                            </i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end mobile Search Area -->


    <!-- cart area -->
    <div class="offcanvas cart-style-1 offcanvas-end" tabindex="1" id="cart-v1"
        aria-labelledby="offcanvasExampleLabel" aria-hidden="true">
        <div class="offcanvas-header align-items-start">
            <div>
                <img src="{{ asset('assets/images/logo.png') }}" alt="">
                <h5 class="offcanvas-title font-weight-500" id="offcanvasExampleLabel">Shopping Items</h5>
            </div>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-flex flex-column justify-content-between align-items-center">
            <div id="cart"
                class="cover-shopping-items fixed-height-400 h-auto mb-4 w-100 bottom-line-spacing not-last-border-line"
                style="--bl-spacing: 25px">

                @if (getCart(sessionID()))
                    @forelse (getCart(sessionID()) as $item)
                        <div class="pe-2">
                            <div
                                class="d-flex align-items-center justify-content-between gap-3 mb-4 p-3 bg-primary-clr-006 rounded-2">
                                <div class="d-flex align-items-center gap-3">
                                    {{-- <input class="form-check-input m-0" type="checkbox" value=""
                                    role="button"> --}}
                                    <i class="bi bi-shop font-17px text-primary"></i>
                                    <h5
                                        class=" font-16px font-weight-500 text-capitalize m-0 width-90 text-truncate text-primary">
                                        {{ $item->first_name . ' ' . $item->last_name }}
                                    </h5>
                                </div>
                                <a onclick="deleteAllCartItem({{ $item->id }})" href="javscript:void(0)"
                                    data-bs-toggle="tooltip" data-bs-title="Delete ALL"><i
                                        class="bi bi-trash text-primary font-17px hover-opacity-08"></i></a>
                            </div>
                            <div class="not-last-border-line bottom-line-spacing" style="--bl-spacing: 15px">
                                @foreach ($item->cart_items as $cartItem)
                                    @if ($cartItem->cart_id == checkCart(sessionID())->id)
                                        <div class="d-flex align-items-center gap-3">
                                            {{-- <input class="form-check-input m-0" type="checkbox" value=""
                                            role="button"> --}}
                                            <div class="overflow-hidden d-flex align-items-center justify-content-center flex-shrink-0 rounded-3"
                                                style="width: 70px; height: 70px; background: #f9f9f9;">
                                                <img src="{{ $cartItem->product->image1 }}" alt=""
                                                    class="h-100 object-fit-cover">
                                            </div>
                                            <div class="flex-1">
                                                <a href="{{ route('product_detail', ['id' => $cartItem->product->id]) }}"
                                                    class=" width-100 text-dark link-primary text-capitalize font-14px"
                                                    style=" display: -webkit-box; -webkit-line-clamp: 2; overflow: hidden; -webkit-box-orient: vertical;">
                                                    {{ $cartItem->product->name }}
                                                </a>
                                                <span
                                                    class=" text-muted font-12px d-block lh-lg">{{ $cartItem->product->category->name }}
                                                    @if ($cartItem->variant_id != null)
                                                        ({{ getVariatName($cartItem->variant_id) }})
                                                    @endif
                                                </span>
                                                <div class=" d-flex align-items-center">
                                                    <span class="text-muted font-12px">(x{{ $cartItem->qty }})</span>
                                                    <h6 class=" font-16px font-weight-600 mb-0 ms-2">
                                                        PKR. {{ $cartItem->price }}
                                                    </h6>
                                                    <div class="d-flex align-items-center gap-2 ms-auto">
                                                        <!-- <h6 class="p-2 rounded-1 bg-primary-clr-006 text-primary m-0 font-11px lh-1">Free Shipping</h6> -->
                                                        <a onclick="deleteCartItem({{ $cartItem->id }})"
                                                            href="javscript:void(0)" data-bs-toggle="tooltip"
                                                            data-bs-title="Delete"
                                                            class=" text-primary hover-opacity-08"><i
                                                                class="bi bi-trash text-primary font-15px"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @empty
                        <div class="offcanvas-body d-flex flex-column justify-content-between align-items-center">
                            <div id="cart"
                                class="cover-shopping-items fixed-height-400 h-auto mb-4 w-100 bottom-line-spacing not-last-border-line"
                                style="--bl-spacing: 25px">

                                <div class=" width-100 width-md-40 mx-auto">
                                    <div class="text-center">
                                        <a href="javascript:void(0)">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                fill="" class="bi bi-bag-x" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M6.146 8.146a.5.5 0 0 1 .708 0L8 9.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 0 1 0-.708z">
                                                </path>
                                                <path
                                                    d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z">
                                                </path>
                                            </svg>
                                        </a>
                                        <p class=" font-16px font-lg-19px my-2 my-lg-4">
                                            Your cart is empty
                                        </p>
                                        <a href="/"
                                            class="btn btn-primary bg-gradient  text-uppercase fw-600 rounded-pill">
                                            back to shoping
                                        </a>
                                    </div>
                                </div>

                            </div>

                        </div>
                    @endforelse
                @else
                    <div class="offcanvas-body d-flex flex-column justify-content-between align-items-center">
                        <div id="cart"
                            class="cover-shopping-items fixed-height-400 h-auto mb-4 w-100 bottom-line-spacing not-last-border-line"
                            style="--bl-spacing: 25px">

                            <div class=" width-100 width-md-40 mx-auto">
                                <div class="text-center">
                                    <a href="javascript:void(0)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                            fill="" class="bi bi-bag-x" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M6.146 8.146a.5.5 0 0 1 .708 0L8 9.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 0 1 0-.708z">
                                            </path>
                                            <path
                                                d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z">
                                            </path>
                                        </svg>
                                    </a>
                                    <p class=" font-16px font-lg-19px my-2 my-lg-4">
                                        Your cart is empty
                                    </p>
                                    <a href="/"
                                        class="btn btn-primary bg-gradient  text-uppercase fw-600 rounded-pill">
                                        back to shoping
                                    </a>
                                </div>
                            </div>

                        </div>

                    </div>
                @endif

            </div>

            @if (CartCount(sessionID()) != 0)
                <div class="cart-links">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5>Total</h5>
                        <h5 id="subtotal">Rs. {{ cartTotal(sessionID()) }} Pkr</h5>
                    </div>
                    <ul class="d-flex align-items-center justify-content-center mt-3 gap-1">
                        <li><a href="{{ route('mycart') }}" class="btn btn-primary extra-btn-padding-35 flex-fill">
                                View
                                Cart</a></li>
                        <li><a href="{{ route('checkout') }}"
                                class="btn btn-outline-primary extra-btn-padding-35 flex-fill">Checkout</a></li>
                    </ul>
                </div>
            @endif
        </div>
    </div>
    <!-- login area -->


    <!--SIGN AND SIGNUP Modal -->
    <div class="modal fade login-modal" id="loginmodal" tabindex="-1" role="dialog"
        aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        style="background-image: none;"><i class="material-icons">
                            close
                        </i></button>
                </div>
                <div class="modal-body p-0">
                    <div class="login-style-1">
                        <!-- Nav tabs -->
                        <div class="tabs-links">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item text-center flex-fill" role="presentation">
                                    <button class="nav-link w-100 active" id="login-tab" data-bs-toggle="tab"
                                        data-bs-target="#login" type="button" role="tab" aria-controls="login"
                                        aria-selected="true"> Sign <span>In</span></button>
                                </li>
                                <li class="nav-item text-center flex-fill" role="presentation">
                                    <button class="nav-link w-100" id="register-tab" data-bs-toggle="tab"
                                        data-bs-target="#register" type="button" role="tab"
                                        aria-controls="register" aria-selected="false">Sign <span>Up</span></button>
                                </li>
                            </ul>
                        </div>

                        <!-- Tab panes -->
                        <div class="tab-content width-100 width-md-80 mx-auto py-4 px-3">
                            <div class="tab-pane active" id="login" role="tabpanel" aria-labelledby="login-tab">
                                <form id="loginForm">
                                    @csrf
                                    <div class="form-group">
                                        <label for="" class="font-weight-400 opacity-05">Sign In With</label>
                                        <ul class="d-flex align-items-center gap-1 flex-wrap">
                                            <li class="flex-fill">
                                                <a href="{{ route('auth.google') }}" class="google-btn"><img
                                                        src="{{ asset('assets/images/icons/google.svg') }}"
                                                        alt="">
                                                    Google</a>
                                            </li>
                                            <li class="flex-fill"><a href="{{ route('auth.facebook') }}"
                                                    class="facebook-btn"><img
                                                        src="{{ asset('assets/images/icons/facebook-white.svg') }}"
                                                        alt="">
                                                    Facebook</a></li>
                                        </ul>
                                    </div>

                                    <div class="form-group">
                                        <div class="position-relative align-image-right">
                                            <div class="form-floating">
                                                <input required name="email" type="text" class="form-control"
                                                    id="floatingtext" placeholder="Email">
                                                <label for="floatingtext">Email</label>
                                            </div>
                                            <img src="assets/images/icons/user.svg" alt="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class=" position-relative align-image-right">
                                            <div class="form-floating">
                                                <input required name="password" type="password" class="form-control"
                                                    id="floatingpassword" placeholder="**********">
                                                <label for="floatingpassword">Password</label>
                                            </div>
                                            <img src="assets/images/icons/lock.svg" alt="">
                                        </div>

                                    </div>
                                    <div class="form-group justify-content-end input-group">
                                        <ul>
                                            <li><a href="#." data-bs-toggle="modal"
                                                    data-bs-target="#forgetpasswordmodal" aria-haspopup="true"
                                                    aria-expanded="false"
                                                    class=" opacity-05 font-weight-400 dark-anchor hover-opacity-1">Lost
                                                    Password ?</a></li>
                                        </ul>
                                    </div>
                                    <div class="text-center mt-5">
                                        <button type="submit" id="loginBtn"
                                            class="btn btn-primary w-100 font-17px justify-content-center">Sign
                                            In</button>
                                        {{-- <ul class="mt-4">
                                            <li><span class="opacity-07">Not a member?</span> <a href="#"
                                                    class="primary-anchor">Register Here</a></li>
                                        </ul> --}}
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane registerModal" id="register" role="tabpanel"
                                aria-labelledby="register-tab">
                                <form id="userRegForm">
                                    @csrf
                                    <div class="form-group mb-4">
                                        <label for="" class="font-weight-400 opacity-05">Sign Up With</label>
                                        <ul class="d-flex align-items-center gap-1 flex-wrap">
                                            <li class="flex-fill">
                                                <a href="{{ route('auth.google') }}" class="google-btn">
                                                    <img src="{{ asset('assets/images/icons/google.svg') }}"
                                                        alt="">
                                                    Google
                                                </a>
                                            </li>
                                            <li class="flex-fill"><a href="#" class="facebook-btn"><img
                                                        src="{{ asset('assets/images/icons/facebook-white.svg') }}"
                                                        alt="">
                                                    Facebook
                                                </a></li>
                                        </ul>
                                    </div>
                                    <div class="orsperators mb-4">
                                        <small class=" opacity-05">or</small>
                                    </div>

                                    <div class="form-group">
                                        <ul class="login-with-email">
                                            <li><a href="#"><img
                                                        src="{{ asset('assets/images/icons/email.svg') }}"
                                                        width="30px" alt=""> Sign Up with email</a></li>
                                        </ul>
                                    </div>
                                    <div class="form-group">
                                        <div class="position-relative align-image-right">
                                            <div class="form-floating">
                                                <input required name="fullname" type="text" class="form-control"
                                                    id="floatingRegisterdName" placeholder="Name" required>
                                                <label for="floatingRegisterdName">Full Name</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="position-relative align-image-right">

                                            <div class="form-floating">
                                                <input required name="phone" type="number" min="11"
                                                    class="form-control" id="floatingRegisterdNumber"
                                                    placeholder="phone" required>
                                                <label for="floatingRegisterdNumber">Phone Number</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="position-relative align-image-right">

                                            <div class="form-floating">
                                                <input required name="email" type="text" class="form-control"
                                                    id="floatingEmail" placeholder="E-mail" required>
                                                <label for="floatingEmail">Email</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="position-relative align-image-right">
                                            <div class="form-floating">
                                                <input required name="password" type="password" class="form-control"
                                                    id="floatingRegisterdPassword" placeholder="*******" required>
                                                <label for="floatingRegisterdPassword">Password</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center mt-5">
                                        <button type="submit" id="btnRegSubmit"
                                            class="btn btn-primary w-100 font-17px justify-content-center">
                                            Sign Up
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    {{-- OTP MODAL  --}}
    <div class="modal fade login-modal" id="otpmodal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content ">
                <div class="modal-header flex-column gap-4">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        style="background-image: none;"><i class="material-icons">
                            close
                        </i></button>
                    <h4>Enter <span class="primary-text">Your Otp</span></h4>
                </div>
                <div class="modal-body width-100 width-md-80 mx-auto py-4 px-3">
                    <form id="otpForm">
                        @csrf
                        <input type="hidden" name="email" id="email">
                        <div class="form-group">
                            <div class=" position-relative align-image-right">
                                <input name="otp" type="number" class="form-control"
                                    placeholder="Please enter your Otp">
                                <img src="{{ asset('assets/images/icons/lock.svg') }}" alt="">
                            </div>
                        </div>
                        <div class="text-center mt-5">
                            <button id="otpBtn" type="submit"
                                class="btn btn-primary w-100 font-17px justify-content-center">Submit
                            </button>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade login-modal" id="forgetpasswordmodal" tabindex="-1" role="dialog"
        aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content ">
                <div class="modal-header flex-column gap-4">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        style="background-image: none;"><i class="material-icons">
                            close
                        </i></button>
                    <h4>Forgot <span class="primary-text">Your Password?</span></h4>
                </div>
                <div class="modal-body width-100 width-md-80 mx-auto py-4 px-3">
                    <p>Enter your email address below and we’ll send you a link to reset
                        your password</p>
                    <form action="{{ route('user.reset-password') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class=" position-relative align-image-right">
                                <input type="text" class="form-control" name="email"
                                    placeholder="Please enter your email">
                                <img src="{{ asset('assets/images/icons/lock.svg') }}" alt="">
                            </div>
                        </div>
                        <div class="text-center mt-5">
                            <button type="submit" class="btn btn-primary w-100 font-17px justify-content-center">
                                Send
                                Email
                            </button>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade login-modal" id="newpasswordmodal" tabindex="-1" role="dialog"
        aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content ">
                <div class="modal-header flex-column gap-4">
                    <img src="assets/images/logo.png" alt="">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        style="background-image: none;"><i class="material-icons">
                            close
                        </i></button>
                    <h4>Enter <span class="primary-text"> New Password?</span></h4>
                </div>
                <div class="modal-body width-100 width-md-80 mx-auto py-4 px-3">
                    <p>Lorem ipsum dolor sit amet lorem ipsum dolor sit amet
                        Lorem ipsum dolor sit amet</p>
                    <form action="#">
                        <div class="form-group">
                            <div class=" position-relative align-image-right">
                                <input type="password" class="form-control" placeholder="Password">
                                <img src="assets/images/icons/lock.svg" alt="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class=" position-relative align-image-right">
                                <input type="password" class="form-control" placeholder="Confirm Password">
                                <img src="assets/images/icons/lock.svg" alt="">
                            </div>
                        </div>
                        <div class="text-center mt-5">
                            <button type="submit" class="btn btn-primary w-100 font-17px justify-content-center">Send
                                Email</button>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!--########################### ###################################
                          END HEADER
#################################################################-->

    <body>
        <main>
            @yield('content')
        </main>

        <section class="bg-primary-clr-01">
            <div class="container">
                <div class="row gy-5 gy-md-0">
                    <div class="col-md-12">
                        <div class="cover-footer-logo">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="">
                        </div>
                    </div>
                    <div class="col-md-3 mt-0">
                        <div class="footer-links">
                            <h5>About</h5>
                            <ul>
                                <li><a href="{{ route('faq') }}">FAQs</a></li>
                                <li><a href="{{ route('about-bazaar') }}">About Bazaar Online</a></li>
                                <li>Want Job - <span><a href="{{ route('admin.signup') }}"
                                            class="primary-anchor">Become a
                                            Roamer</a></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="footer-links">
                            <h5>Policies</h5>
                            <ul>
                                <li><a href="{{ route('return-privacy') }}">Return Policy</a></li>
                                <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                                <li><a href="{{ route('terms') }}">Terms & Conditions</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="footer-links">
                            <h5>Contact us</h5>
                            <ul>
                                <li><a href="#"><img src="assets/images/icons/phone.svg" alt="">
                                        +92333-3677911</a></li>
                                <li><a href="#"><img src="assets/images/icons/email.svg" alt="">
                                        info@militarystore.pk</a></li>
                                <li><a href="#"><img src="assets/images/icons/location.svg" alt=""> 20,
                                        Bella
                                        Road, G-10/3, Islamabad.</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="footer-links">
                            <h5>Social Media</h5>
                            <p>Follow us on social media to find out
                                the latest updates on our progress.</p>
                            <ul class="social-links d-flex align-items-center gap-5">
                                <li><a href=""><img src="assets/images/icons/facebook.svg" alt=""></a>
                                </li>
                                <li><a href=""><img src="assets/images/icons/twitter.svg" alt=""></a>
                                </li>
                                <li><a href=""><img src="assets/images/icons/instagram.svg"
                                            alt=""></a></li>
                                <li><a href=""><img src="assets/images/icons/youtube.svg" alt=""></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <div class="copyright bg-primary-clr-01 text-center ">
            <div class="container py-2">
                <p class="m-0">2023 <a href="{{ url('/') }}">Bazaar Online</a>. All Rights Reserverd.</p>
            </div>
        </div>


        <!-- mobile fixed bar -->
        <div class="mobile-menu d-lg-none">
            <ul class="d-flex align-items-center justify-content-between">
                <li><a href="{{ url('/') }}"><i class="bi bi-house-door"></i>Home</a></li>
                <li><a href="#categoriesMobile" data-bs-toggle="offcanvas" role="button"
                        aria-controls="offcanvasExample"><i class="bi bi-justify"></i>Category</a></li>
                <li><a href="#mobilesearch" data-bs-toggle="offcanvas" role="button"
                        aria-controls="offcanvasExample"><i class="bi bi-search"></i>Search</a></li>

                <li><a href="{{ url('/mycart') }}"><i class="bi bi-bag"></i>Cart
                        <div class=" position-absolute end-0 d-flex align-items-center justify-content-center rounded-circle bg-primary text-white lh-1"
                            style="width:14px; height:14px; font-size: 9px">{{ CartCount(sessionID()) }}</div>
                    </a> </li>
                <!--<li>-->
                <!--    <a href="{{ url('/my-wallet') }}"><img src="{{ asset('assets/images/icons/Wallet.svg') }}"-->
                <!--            alt="">-->
                <!--        Wallet</i>-->
                <!--    </a>-->
                <!--</li>-->
                <!--<li><a href="{{ route('shop') }}"><i class="bi bi-shop"></i> Shop</a></li>-->
            </ul>
        </div>


        <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('js/jquery-ui/jquery-ui.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
            integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
        </script>
        <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>

        <script src="{{ asset('js/fancybox/fancybox.umd.js') }}"></script>

        <script src="{{ asset('js/title.js/title.js') }}"></script>

        <script src="{{ asset('js/swiper-slider/swiper-bundle.js') }}"></script>


        <script src="{{ asset('assets/js/main.js') }}"></script>
        <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
        <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>


        <script src="{{ asset('js/jquery-ui/jquery-ui.min.js') }}"></script>

        @include('sweetalert::alert')

        @stack('head')

        <script>
            const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
        </script>
        <script>
            function deleteCartItem(id) {
                // e.preventDefault();

                var sub_total = 0;

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{ route('front.index') }}' + '/cart-remove/' + id,
                    method: 'get',
                    success: function(response) {
                        if (response.status == 200) {
                            $('#adderrortoaster').addClass('show');
                            $('#cartdeletemsg').html(response);
                            //Update Cart
                            $.ajax({
                                url: '{{ route('cartCount') }}',
                                type: 'GET',
                                dataType: 'json',
                                success: function(response) {
                                    $('#count').html('(' + response.count + ')');
                                    // console.log("Data: " + response.data + "\nStatus: " + response.status);
                                }
                            });

                            setTimeout(function() {
                                $('#adderrortoaster').removeClass(
                                    'show')
                            }, 1000);
                            window.location.href = ""
                        } else {
                            Swal.fire(
                                'Something wnet wrong!!',
                                'Please try again!',
                                'error'
                            )
                        }
                    }
                })
            }
        </script>
        <script>
            function deleteAllCartItem(id) {
                // e.preventDefault();
                // console.log(id);
                var sub_total = 0;

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{ route('front.index') }}' + '/cart-remove/roamer/' + id,
                    method: 'get',
                    success: function(response) {
                        if (response.status == 200) {
                            $('#adderrortoaster').addClass('show');
                            $('#cartdeletemsg').html(response);
                            //Update Cart
                            $.ajax({
                                url: '{{ route('cartCount') }}',
                                type: 'GET',
                                dataType: 'json',
                                success: function(response) {
                                    $('#count').html('(' + response.count + ')');
                                    // console.log("Data: " + response.data + "\nStatus: " + response.status);
                                }
                            });

                            setTimeout(function() {
                                $('#adderrortoaster').removeClass(
                                    'show')
                            }, 1000);
                            window.location.href = ""
                        } else {
                            Swal.fire(
                                'Something wnet wrong!!',
                                'Please try again!',
                                'error'
                            )
                        }
                    }
                })
            }
        </script>
        <script>
            var flag = 0;
            $(".buyNowBtn").click(function(e) {
                flag = 1;
                console.log(flag);
                console.log('buy Now Btn clicked');
            });
            $('.addcartbtn').on('submit', function(e) {

                e.preventDefault();

                $('#cartmsg').html();

                var qty = $('.qty').val();


                $('#qty').val(qty);

                data = new FormData(this);
                console.log(flag);
                data.append("buy_now", flag);

                var sub_total = 0;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{ route('addToCart') }}',
                    method: 'post',
                    data: data,
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        if (response.status == 200) {
                            $('#addsuccesstoaster').addClass('show');
                            //Update Cart
                            $.ajax({
                                url: '{{ route('cartCount') }}',
                                type: 'GET',
                                dataType: 'json',
                                success: function(response) {
                                    $('#count').html('(' + response.count + ')');
                                    // console.log("Data: " + response.data + "\nStatus: " + response.status);

                                }
                            });
                            $.ajax({
                                url: '{{ route('cartDetails') }}',
                                type: 'GET',
                                dataType: 'json',
                                success: function(response) {
                                    // console.log(response);
                                    $('#cart').html('');
                                    var cart1 = '';
                                    var Id = [];
                                    var i = 0;
                                    $.each(response.cart, function(key, value) {
                                        if (value.carts.length != 0) {
                                            $.each(value.carts, function(k, v) {
                                                Id.push(v.product.user_id);
                                                console.log(Id);
                                                cart1 +=
                                                    '<div class="d-flex align-items-center gap-3"><input class="form-check-input m-0" type="checkbox" value="" role="button">' +
                                                    '<div class="overflow-hidden d-flex align-items-center justify-content-center flex-shrink-0 rounded-3" style="width: 70px; height: 70px; background: #f9f9f9;">' +
                                                    '<img src="' + v.product
                                                    .image1 +
                                                    '" alt="" class="h-100 object-fit-cover"></div><div class="flex-1"><a href="#" class=" width-100 text-dark link-primary text-capitalize font-14px"' +
                                                    'style=" display: -webkit-box; -webkit-line-clamp: 2; overflow: hidden; -webkit-box-orient: vertical;">' +
                                                    v.product.name +
                                                    '</a><span class=" text-muted font-12px d-block lh-lg">' +
                                                    v.product.category.name +
                                                    '</span><div class=" d-flex align-items-center"><span class="text-muted font-12px">(x' +
                                                    v.qty + ')</span>' +
                                                    '<h6 class=" font-16px font-weight-600 mb-0 ms-2">PKR.' +
                                                    v.total + '</h6>' +
                                                    '<div class="d-flex align-items-center gap-2 ms-auto"><a href="javscript:void(0)" data-bs-toggle="tooltip" data-bs-title="Delete" class=" text-primary hover-opacity-08"><i class="bi bi-trash text-primary font-15px"></i></a>' +
                                                    '</div></div></div></div>';

                                            });
                                            $('#cart').append(
                                                '<div class="pe-2"><div class="d-flex align-items-center justify-content-between gap-3 mb-4 p-3 bg-primary-clr-006 rounded-2"><div class="d-flex align-items-center gap-3">' +
                                                '<input class="form-check-input m-0" type="checkbox" value="" role="button"><i class="bi bi-shop font-17px text-primary"></i>' +
                                                '<h5 class=" font-16px font-weight-500 text-capitalize m-0 width-90 text-truncate text-primary">' +
                                                value.first_name + ' ' + value
                                                .last_name + '</h5></div>' +
                                                '<a href="javscript:void(0)" data-bs-toggle="tooltip" data-bs-title="Delete ALL"><i class="bi bi-trash text-primary font-17px hover-opacity-08"></i></a></div>' +
                                                '<div class="not-last-border-line bottom-line-spacing" style="--bl-spacing: 15px">' +
                                                function() {
                                                    for (let i = 0; i < Id
                                                        .length; i++) {

                                                        if (value.id = Id[i]) {
                                                            return cart1;
                                                        }

                                                    }
                                                }()
                                            )
                                        }
                                    });
                                }

                            })
                            setTimeout(function() {
                                $('#addsuccesstoaster').removeClass('show')
                                console.log(flag);
                                if (flag == 1) {
                                    window.location.href = '/checkout';
                                } else {
                                    window.location.href = '';
                                }
                            }, 1000);
                        } else {}
                    }
                })

            });
        </script>

        <script type="text/javascript">
            $(".inc").click(function() {
                updateValue(this, 1);
            });
            $(".dec").click(function() {
                updateValue(this, -1);
            });

            function updateValue(obj, delta) {
                var item = $(obj).parent().find("input");
                var newValue = parseInt(item.val(), 10) + delta;
                item.val(Math.max(newValue, 0));
            };
        </script>
        <script type="text/javascript">
            var multiProductSlider = new Swiper(".multiProductSlider", {
                slidesPerView: 2,
                spaceBetween: 5,
                grabCursor: true,
                preloadImages: true,
                autoplay: {
                    delay: 5000,
                },
                breakpoints: {
                    576: {
                        slidesPerView: 2,

                    },
                    768: {
                        slidesPerView: 2.3,

                    },
                    1024: {
                        slidesPerView: 4.3,

                    },
                    1440: {
                        slidesPerView: 4.3,
                    }
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });
            var multiProductSlider2 = new Swiper(".multiProductSlider2", {
                slidesPerView: 1,
                spaceBetween: 5,
                grabCursor: true,
                autoplay: {
                    delay: 5000,
                },
                preloadImages: true,
                // preventClicksPropagation: true,
                breakpoints: {
                    576: {
                        slidesPerView: 2,

                    },
                    1024: {
                        slidesPerView: 2.3,

                    },
                    1440: {
                        slidesPerView: 3.3,
                    }
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });
        </script>

        <script type="text/javascript">
            /*===================================*
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      22. PRICE FILTER JS
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      *===================================*/
            $('.price_filter').each(function() {
                var $filter_selector = $(this);
                var a = $filter_selector.data("min-value");
                var b = $filter_selector.data("max-value");

                $filter_selector.slider({
                    range: true,
                    min: $filter_selector.data("min"),
                    max: $filter_selector.data("max"),
                    values: [a, b],
                    slide: function(event, ui) {

                        $(".price_first").html(ui.values[0]);
                        $(".price_second").html(ui.values[1]);
                    }
                });
            });
        </script>


        <script>
            $('#userRegForm').on('submit', function(e) {
                e.preventDefault()
                $('#btnRegSubmit').empty().append('Please Wait...');
                $('#btnRegSubmit').css({
                    'cursor': 'not-allowed',
                    'background': 'transparent',
                    'color': 'var(--bs-primary)',
                    'border': '1px solid var(--bs-primary)'
                })
                $('#btnRegSubmit').attr('disabled', true)
                var formData = new FormData(this);

                $.ajax({
                    url: "{{ route('front.userregisteration') }}",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(res) {

                        if (res.status == true) {
                            $('#email').val(res.data)
                            $('#btnRegSubmit').css({
                                'cursor': 'pointer',
                                'background': 'var(--bs-primary)',
                                'color': 'white',
                                'border': '1px solid var(--bs-primary)'
                            })
                            $('#btnRegSubmit').attr('disabled', false)
                            $('#btnRegSubmit').empty().append('Sign Up');

                            swal("Account created successfully", {
                                icon: 'success'
                            }).then(() => {
                                $('#loginmodal').modal('hide');
                                $('#otpmodal').modal('show');
                            })
                        } else {

                            $('#btnRegSubmit').css({
                                'cursor': 'pointer',
                                'background': 'var(--bs-primary)',
                                'color': 'white',
                                'border': '1px solid var(--bs-primary)'
                            })
                            $('#btnRegSubmit').attr('disabled', false)
                            $('#btnRegSubmit').empty().append('Sign Up');

                            swal(res.message, {
                                icon: 'error'
                            })

                        }
                    }
                })
            })
        </script>

        <script>
            $('#otpForm').on('submit', function(e) {
                e.preventDefault()
                $('#otpBtn').empty().append('Please Wait...');
                $('#otpBtn').css({
                    'cursor': 'not-allowed',
                    'background': 'transparent',
                    'color': 'var(--bs-primary)',
                    'border': '1px solid var(--bs-primary)'
                })
                $('#otpBtn').attr('disabled', true)
                var formData = new FormData(this);

                $.ajax({
                    url: "{{ route('front.userotp') }}",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false,

                    success: function(res) {
                        if (res.status == true) {
                            swal(res.msg, {
                                icon: 'success'
                            }).then(() => {
                                window.location.reload()
                            })
                            $('#otpBtn').css({
                                'cursor': 'pointer',
                                'background': 'var(--bs-primary)',
                                'color': 'white',
                                'border': '1px solid var(--bs-primary)'
                            })
                            $('#otpBtn').attr('disabled', false)
                            $('#otpBtn').empty().append('Submit');

                        } else {
                            swal(res.msg, {
                                icon: 'error'
                            })
                            $('#otpBtn').css({
                                'cursor': 'pointer',
                                'background': 'var(--bs-primary)',
                                'color': 'white',
                                'border': '1px solid var(--bs-primary)'
                            })
                            $('#otpBtn').attr('disabled', false)
                            $('#otpBtn').empty().append('Submit');
                        }
                    }
                })

            })
        </script>

        <script>
            $('#loginForm').on('submit', function(e) {
                e.preventDefault()
                $('#loginBtn').empty().append('Please Wait...');
                $('#loginBtn').css({
                    'cursor': 'not-allowed',
                    'background': 'transparent',
                    'color': 'var(--bs-primary)',
                    'border': '1px solid var(--bs-primary)'
                })
                $('#loginBtn').attr('disabled', true)
                var formData = new FormData(this);

                $.ajax({
                    url: "{{ route('front.userlogin') }}",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false,

                    success: function(res) {
                        if (res.status == true) {
                            swal(res.msg, {
                                icon: 'success'
                            }).then(() => {
                                window.location.reload()
                            })
                            $('#loginBtn').css({
                                'cursor': 'pointer',
                                'background': 'var(--bs-primary)',
                                'color': 'white',
                                'border': '1px solid var(--bs-primary)'
                            })

                            $('#loginBtn').attr('disabled', false)
                            $('#loginBtn').empty().append('Sign In');

                        } else {
                            if (res.active == false) {
                                swal(res.msg, {
                                    icon: 'error'
                                }).then(() => {})

                            } else {
                                swal(res.msg, {
                                    icon: 'error'
                                })
                            }
                            $('#loginBtn').attr('disabled', false)
                            $('#loginBtn').empty().append('Sign In');
                            $('#loginBtn').css({
                                'cursor': 'pointer',
                                'background': 'var(--bs-primary)',
                                'color': 'white',
                                'border': '1px solid var(--bs-primary)'
                            })
                        }
                    }
                })
            })
        </script>

    </body>

</html>
