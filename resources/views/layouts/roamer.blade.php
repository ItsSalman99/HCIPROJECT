<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <meta name="robots" content="index, follow" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Gapconcepts" />
    <meta name="copyright" content="" />

    <link href="{{ asset('assets/roamer/vendor/css/bootstrap/bootstrap.min.css') }}" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <!-- data table -->
    <link rel="stylesheet" href="{{ asset('assets/roamer/vendor/css/datatable/dataTables.bootstrap5.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/roamer/vendor/css/datatable/select.bootstrap5.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/roamer/vendor/css/datatable/responsive.bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/roamer/vendor/css/datatable/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/roamer/vendor/css/multiple-select/bootstrap-multiselect.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/roamer/vendor/css/datetime/jquery.datetimepicker.min.css') }}" />
    <!-- slider -->
    <link rel="stylesheet" href="{{ asset('assets/roamer/vendor/css/swiperslider/swiper-bundle.min.css') }}">

    <!-- compulsory global.css -->
    <link rel="stylesheet" href="{{ asset('assets/roamer/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/roamer/assets/sass/utility/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/roamer/assets/css/media.css') }}">

    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- icons -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets/roamer/vendor/css/bootstrap/icons/bootstrap-icons.css')}}" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <!-- start side bar -->
    <!-- <div class="dot-overtaking"></div> -->
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <div class="logo d-none d-md-block">
                <img src="assets/images/logo.png" alt="image">
            </div>
            <nav class="sb-sidenav accordion" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="cover-nav">
                        <div class="nav">
                            <a class="nav-link sidenav-active" href="index.php">
                                <div class="side-icon"><img src="assets/images/icons/dashboard.svg" alt="image">
                                </div>
                                Dashboard
                                <b class="topRightCorner"></b>
                                <b class="bottomRightCorner"></b>
                            </a>
                            <a class="nav-link collapsed" href="javascript:void(0)" data-bs-toggle="collapse"
                                data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapsePages">
                                <div class="side-icon"><img src="assets/images/icons/vendor.svg" alt="image"></div>
                                Vendor
                                <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                                <b class="topRightCorner"></b>
                                <b class="bottomRightCorner"></b>
                            </a>
                            <div class="collapse" id="collapse1" aria-labelledby="headingTwo"
                                data-bs-parent="#sidenavAccordion">

                                <nav class="sb-sidenav-menu-nested nav accordion">
                                    <a class="nav-link" href="manage-vendor.php">

                                        <i class="material-icons">
                                            remove
                                        </i> Manage Vendors

                                    </a>
                                </nav>
                                <nav class="sb-sidenav-menu-nested nav accordion">
                                    <a class="nav-link " href="addNewVendor.php">

                                        <i class="material-icons">
                                            remove
                                        </i> Add New Vendor

                                    </a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="javascript:void(0)" data-bs-toggle="collapse"
                                data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapsePages">
                                <div class="side-icon"><img src="assets/images/icons/products.svg" alt="image"></div>
                                Products
                                <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                                <b class="topRightCorner"></b>
                                <b class="bottomRightCorner"></b>
                            </a>
                            <div class="collapse" id="collapse2" aria-labelledby="headingTwo"
                                data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion">
                                    <a class="nav-link" href="manage-product.php">

                                        <i class="material-icons">
                                            remove
                                        </i> Manage Products

                                    </a>
                                </nav>
                                <nav class="sb-sidenav-menu-nested nav accordion">
                                    <a class="nav-link " href="addProduct.php">

                                        <i class="material-icons">
                                            remove
                                        </i> Add Products
                                    </a>
                                </nav>
                                <nav class="sb-sidenav-menu-nested nav accordion">
                                    <a class="nav-link " href="media-center.php">

                                        <i class="material-icons">
                                            remove
                                        </i> Media Center
                                    </a>
                                </nav>
                                <nav class="sb-sidenav-menu-nested nav accordion">
                                    <a class="nav-link " href="manage-product-image.php">

                                        <i class="material-icons">
                                            remove
                                        </i> Manage Image
                                    </a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="javascript:void(0)" data-bs-toggle="collapse"
                                data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapsePages">
                                <div class="side-icon"><img src="assets/images/icons/brands.svg" alt="image">
                                </div>
                                Brands
                                <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                                <b class="topRightCorner"></b>
                                <b class="bottomRightCorner"></b>
                            </a>
                            <div class="collapse" id="collapse3" aria-labelledby="headingTwo"
                                data-bs-parent="#sidenavAccordion">

                                <nav class="sb-sidenav-menu-nested nav accordion">
                                    <a class="nav-link" href="manage-brand.php">

                                        <i class="material-icons">
                                            remove
                                        </i> Manage Brands

                                    </a>
                                </nav>
                                <nav class="sb-sidenav-menu-nested nav accordion">
                                    <a class="nav-link " href="addNewBrand.php">

                                        <i class="material-icons">
                                            remove
                                        </i> Add Brand
                                    </a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="javascript:void(0)" data-bs-toggle="collapse"
                                data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapsePages">
                                <div class="side-icon"><img src="assets/images/icons/order.svg" alt="image"></div>
                                Orders & Reviews
                                <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                                <b class="topRightCorner"></b>
                                <b class="bottomRightCorner"></b>
                            </a>
                            <div class="collapse" id="collapse4" aria-labelledby="headingTwo"
                                data-bs-parent="#sidenavAccordion">

                                <nav class="sb-sidenav-menu-nested nav accordion">
                                    <a class="nav-link" href="manage-order.php">
                                        <i class="material-icons">
                                            remove
                                        </i> Manage Orders
                                    </a>
                                </nav>
                                <nav class="sb-sidenav-menu-nested nav accordion">
                                    <a class="nav-link " href="manage-review.php">

                                        <i class="material-icons">
                                            remove
                                        </i> Manage Reviews
                                    </a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="javascript:void(0)" data-bs-toggle="collapse"
                                data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapsePages">
                                <div class="side-icon"><img src="assets/images/icons/promotion.svg" alt="image">
                                </div>
                                Promotions
                                <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                                <b class="topRightCorner"></b>
                                <b class="bottomRightCorner"></b>
                            </a>
                            <div class="collapse" id="collapse5" aria-labelledby="headingTwo"
                                data-bs-parent="#sidenavAccordion">

                                <nav class="sb-sidenav-menu-nested nav accordion">
                                    <a class="nav-link" href="campaign-management.php">

                                        <i class="material-icons">
                                            remove
                                        </i> Campaign Management

                                    </a>
                                </nav>
                                <nav class="sb-sidenav-menu-nested nav accordion">
                                    <a class="nav-link " href="#.">

                                        <i class="material-icons">
                                            remove
                                        </i> Add Campaign
                                    </a>
                                </nav>
                            </div>
                            <a class="nav-link" href="business-advisor.php">
                                <div class="side-icon"><img src="assets/images/icons/business.svg" alt="image">
                                </div>
                                Business Advisor
                                <b class="topRightCorner"></b>
                                <b class="bottomRightCorner"></b>
                            </a>
                            <a class="nav-link collapsed" href="javascript:void(0)" data-bs-toggle="collapse"
                                data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapsePages">
                                <div class="side-icon"><img src="assets/images/icons/finances.svg" alt="image">
                                </div>
                                Finance
                                <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                                <b class="topRightCorner"></b>
                                <b class="bottomRightCorner"></b>
                            </a>
                            <div class="collapse" id="collapse6" aria-labelledby="headingTwo"
                                data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion">
                                    <a class="nav-link" href="general-finance.php">

                                        <i class="material-icons">
                                            remove
                                        </i> General Finance
                                    </a>
                                </nav>
                                <nav class="sb-sidenav-menu-nested nav accordion">
                                    <a class="nav-link " href="expenditure.php">

                                        <i class="material-icons">
                                            remove
                                        </i> Expenditure
                                    </a>
                                </nav>
                            </div>
                            <a class="nav-link" href="help-center.php">
                                <div class="side-icon"><img src="assets/images/icons/help.svg" alt="image"></div>
                                Help Centre
                                <b class="topRightCorner"></b>
                                <b class="bottomRightCorner"></b>
                            </a>

                            <a class="nav-link" href="account-setting.php">
                                <div class="side-icon"><img src="assets/images/icons/account-setting.svg"
                                        alt="image"></div>
                                Account & Settings
                                <b class="topRightCorner"></b>
                                <b class="bottomRightCorner"></b>
                            </a>

                            <a class="nav-link" href="admin-chat.php">
                                <div class="side-icon"><img src="assets/images/icons/admin-chat.svg" alt="image">
                                </div>
                                Admin Chat
                                <b class="topRightCorner"></b>
                                <b class="bottomRightCorner"></b>
                            </a>
                        </div>
                    </div>
                </div>

            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                {{-- ROAMER SIDEBAR IN LAYOUTS FOLDER --}}
                @include('layouts.adminnavbar')
                {{-- Main Content --}}
                @yield('content')


                <div class="bubble-chat-container">
                    <div class="bubble-chat-box">
                        <div class="bubble-chat-header d-flex align-items-center justify-content-between">
                            <h6 class=" font-18px font-weight-600 m-0">Chat</h6>
                            <ul>
                                <li><a href="javascript:void(0);" class="close-bubble-container"><i
                                            class="material-icons">
                                            close
                                        </i></a></li>
                            </ul>
                        </div>
                        <div class="bubble-chat-content">
                            <div class="empty-chat">
                                <img src="assets/images/bubble-chat.svg" alt="">
                                <div>
                                    <h5 class=" font-22px font-weight-600 mb-4">Your inbox <span
                                            class="primary-text">is empty.</span></h5>
                                    <p>Once you start a conversation, you will see it here.</p>
                                </div>
                            </div>
                        </div>
                        <div class="bubble-chat-text">
                            <input type="text" class=" form-control" placeholder="Type a message">
                            <ul>
                                <li><a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="17" height="15" viewBox="0 0 17 15">
                                            <path
                                                d="M15.9876 5.81912L2.27154 0.12671C1.69371 -0.113128 1.0409 -0.00762198 0.567921 0.401916C0.0949418 0.81152 -0.102883 1.44263 0.0517114 2.04893L1.27256 6.83746H7.24999C7.52505 6.83746 7.74807 7.06049 7.74807 7.33563C7.74807 7.61074 7.52508 7.8338 7.24999 7.8338H1.27256L0.0517114 12.6223C-0.102883 13.2286 0.0949086 13.8597 0.567921 14.2693C1.04186 14.6797 1.69474 14.7839 2.27158 14.5445L15.9876 8.85214C16.6121 8.59297 17 8.01187 17 7.33563C17 6.65939 16.6121 6.07826 15.9876 5.81912Z" />
                                        </svg></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="bubble-chat-icon">
                        <a href="javascript:void(0);" class="ms-auto"><i class="bi bi-chat-fill"></i></a>
                    </div>
                </div>

                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <div class="copyright">
                    <div class="container">
                        <ul class="d-flex align-items-center justify-content-center gap-4">
                            <li><a href="help-center.php">Help Center </a></li>
                            <li><a href="roamer-support.php">Roamer Support </a></li>
                        </ul>
                    </div>
                </div>
            </main>
        </div>
    </div>


    <!-- end side bar -->

    <!-- bootstrap js file -->
    <script src="{{ asset('assets/roamer/vendor/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ asset('assets/roamer/vendor/js/zangdar.min.js')}}"></script>
    <!-- <script src="vendor/js/bootstrap/popper.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/roamer/vendor/js/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/roamer/vendor/js/fancybox/fancybox.umd.js')}}"></script>
    <script src="{{ asset('assets/roamer/vendor/js/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('assets/roamer/vendor/js/datatable/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{ asset('assets/roamer/vendor/js/datatable/dataTables.select.min.js')}}"></script>
    <script src="{{ asset('assets/roamer/vendor/js/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('assets/roamer/vendor/js/datatable/select2.min.js')}}"></script>
    <script src="{{ asset('assets/roamer/vendor/js/datatable/select2.full.min.js')}}"></script>
    <script src="{{ asset('assets/roamer/vendor/js/multiple-select/bootstrap-multiselect.js')}}"></script>
    <script src="{{ asset('assets/roamer/vendor/js/datetime/jquery.datetimepicker.full.min.js')}}"></script>
    <script src="{{ asset('assets/roamer/vendor/js/swiperslider/swiper-bundle.min.js')}}"></script>
    <script src="{{ asset('assets/roamer/vendor/js/ckeditor/ckeditor.js')}}"></script>
    <script src="{{ asset('assets/roamer/assets/js/main.js')}}"></script>

</body>

</html>
