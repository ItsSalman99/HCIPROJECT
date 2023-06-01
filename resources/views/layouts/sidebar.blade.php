<div id="layoutSidenav_nav">
    <div class="logo d-none d-md-block">
        <a href="{{ route('admindashboad') }}">
            <img src="{{ asset('assets/admin/images/logo.png') }}" alt="image" class="mx-auto">
        </a>
    </div>
    <nav class="sb-sidenav accordion" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="cover-nav">
                <div class="nav">
                    <a class="nav-link {{ request()->is('admin') ? 'sidenav-active' : '' }}"
                        href="{{ route('admindashboad') }}">
                        <div class="side-icon"><img src="{{ asset('assets/admin/images/icons/dashboard.svg') }}"
                                alt="image">
                        </div>
                        Dashboard
                        <b class="topRightCorner"></b>
                        <b class="bottomRightCorner"></b>
                    </a>
                    @if (Auth::user()->user_type == 1)
                        <a class="nav-link collapsed {{ request()->is('admin/roamers') || request()->is('admin/roamers-request') ? 'sidenav-active' : '' }}"
                            href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#collapse1"
                            aria-expanded="false" aria-controls="collapsePages">
                            <div class="side-icon"><img src="{{ asset('assets/admin/images/icons/roamer.svg') }}"
                                    alt="image"></div>
                            Roamers
                            <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                            <b class="topRightCorner"></b>
                            <b class="bottomRightCorner"></b>
                        </a>
                        <div class="collapse" id="collapse1" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion">
                                <a class="nav-link" href="{{ route('roamers.index') }}">
                                    <i class="material-icons">
                                        remove
                                    </i> Manage Roamers
                                </a>
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav accordion">
                                <a class="nav-link " href="{{ route('roamers.request') }}">
                                    <i class="material-icons">
                                        remove
                                    </i> Roamer Requests
                                </a>
                            </nav>
                        </div>
                    @endif
                    <a class="nav-link collapsed {{ request()->is('admin/vendors') || request()->is('admin/vendors/create') ? 'sidenav-active' : '' }}"
                        href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#collapse121"
                        aria-expanded="false" aria-controls="collapsePages">
                        <div class="side-icon"><img src="{{ asset('assets/admin/images/icons/vendor.svg') }}"
                                alt="image"></div>
                        Vendor
                        <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                        <b class="topRightCorner"></b>
                        <b class="bottomRightCorner"></b>
                    </a>
                    <div class="collapse" id="collapse121" aria-labelledby="headingTwo"
                        data-bs-parent="#sidenavAccordion">

                        <nav class="sb-sidenav-menu-nested nav accordion">
                            <a class="nav-link" href="{{ route('vendors.index') }}">

                                <i class="material-icons">
                                    remove
                                </i> Manage Vendors

                            </a>
                        </nav>
                        <nav class="sb-sidenav-menu-nested nav accordion">
                            <a class="nav-link " href="{{ route('vendors.create') }}">

                                <i class="material-icons">
                                    remove
                                </i> Add New Vendor

                            </a>
                        </nav>
                    </div>

                    <a class="nav-link collapsed {{ request()->is('admin/products') || request()->is('admin/attributes') || request()->is('admin/products/create') ? 'sidenav-active' : '' }}"
                        href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#collapse6"
                        aria-expanded="false" aria-controls="collapsePages">
                        <div class="side-icon"><img src="{{ asset('assets/admin/images/icons/products.svg') }}"
                                alt="image">
                        </div>
                        Products
                        <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                        <b class="topRightCorner"></b>
                        <b class="bottomRightCorner"></b>
                    </a>
                    <div class="collapse" id="collapse6" aria-labelledby="headingTwo"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion">
                            <a class="nav-link" href="{{ route('products.index') }}">

                                <i class="material-icons">
                                    remove
                                </i> Manage Products

                            </a>
                        </nav>
                        <nav class="sb-sidenav-menu-nested nav accordion">
                            <a class="nav-link" href="{{ route('attributes.index') }}">

                                <i class="material-icons">
                                    remove
                                </i> Manage Attributes

                            </a>
                        </nav>
                        <nav class="sb-sidenav-menu-nested nav accordion">
                            <a class="nav-link " href="{{ route('products.create') }}">

                                <i class="material-icons">
                                    remove
                                </i> Add Products
                            </a>
                        </nav>
                        {{-- <nav class="sb-sidenav-menu-nested nav accordion">
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
                        </nav> --}}
                    </div>

                    <a class="nav-link collapsed {{ request()->is('admin/brands') || request()->is('admin/brands/create') ? 'sidenav-active' : '' }}"
                        href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#collapse112"
                        aria-expanded="false" aria-controls="collapsePages">
                        <div class="side-icon"><img src="{{ asset('assets/admin/images/icons/order.svg') }}"
                                alt="image"></div>
                        Brands
                        <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                        <b class="topRightCorner"></b>
                        <b class="bottomRightCorner"></b>
                    </a>

                    <div class="collapse" id="collapse112" aria-labelledby="headingTwo"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion">
                            <a class="nav-link" href="{{ route('brands.create') }}">
                                <i class="material-icons">
                                    remove
                                </i> Add New Brand
                            </a>
                        </nav>
                        <nav class="sb-sidenav-menu-nested nav accordion">
                            <a class="nav-link " href="{{ route('brands.index') }}">
                                <i class="material-icons">
                                    remove
                                </i> Manage Brands
                            </a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed {{ request()->is('admin/order') || request()->is('admin/manage-reviews') || request()->is('admin/order-refunds') ? 'sidenav-active' : '' }}"
                        href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#collapse2"
                        aria-expanded="false" aria-controls="collapsePages">
                        <div class="side-icon"><img src="{{ asset('assets/admin/images/icons/order.svg') }}"
                                alt="image"></div>
                        Orders & Reviews
                        <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                        <b class="topRightCorner"></b>
                        <b class="bottomRightCorner"></b>
                    </a>

                    <div class="collapse" id="collapse2" aria-labelledby="headingTwo"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion">
                            <a class="nav-link" href="{{ route('order.index') }}">
                                <i class="material-icons">
                                    remove
                                </i> Manage Orders
                            </a>
                        </nav>
                        <nav class="sb-sidenav-menu-nested nav accordion">
                            <a class="nav-link " href="{{ route('order-refund.index') }}">
                                <i class="material-icons">
                                    remove
                                </i> Manage Refunds
                            </a>
                        </nav>
                        <nav class="sb-sidenav-menu-nested nav accordion">
                            <a class="nav-link " href="{{ route('order.reviews') }}">
                                <i class="material-icons">
                                    remove
                                </i> Manage Reviews
                            </a>
                        </nav>
                    </div>
                    @if (Auth::user()->user_type == 1)
                        <a class="nav-link collapsed {{ request()->is('admin/compaign') || request()->is('admin/compaign/create') ? 'sidenav-active' : '' }}"
                            href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#collapse3"
                            aria-expanded="false" aria-controls="collapsePages">
                            <div class="side-icon"><img src="{{ asset('assets/admin/images/icons/promotion.svg') }}"
                                    alt="image">
                            </div>
                            Promotions
                            <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                            <b class="topRightCorner"></b>
                            <b class="bottomRightCorner"></b>
                        </a>
                        <div class="collapse" id="collapse3" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion">
                                <a class="nav-link" href="{{ route('admin.compaign.index') }}">
                                    <i class="material-icons">
                                        remove
                                    </i> Campaign Management
                                </a>
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav accordion">
                                <a class="nav-link " href="{{ route('admin.compaign.create') }}">
                                    <i class="material-icons">
                                        remove
                                    </i> Add Campaign
                                </a>
                            </nav>
                        </div>
                    @endif
                    @if (Auth::user()->user_type == 2)
                        <a class="nav-link {{ request()->is('admin/promotion/campaign/join') ? 'sidenav-active' : '' }}"
                            href="{{ route('campaign.joinpromotion') }}">
                            <div class="side-icon"><img src="{{ asset('assets/admin/images/icons/promotion.svg') }}"
                                    alt="image">
                            </div>
                            Promotion
                            <b class="topRightCorner"></b>
                            <b class="bottomRightCorner"></b>
                        </a>
                    @endif
                    <a class="nav-link {{ request()->is('admin/business') ? 'sidenav-active' : '' }}"
                        href="{{ route('admin.business.index') }}">
                        <div class="side-icon"><img src="{{ asset('assets/admin/images/icons/business.svg') }}"
                                alt="image">
                        </div>
                        Business Advisor
                        <b class="topRightCorner"></b>
                        <b class="bottomRightCorner"></b>
                    </a>
                    <a class="nav-link collapsed {{ request()->is('finance') || request()->is('expense') ? 'sidenav-active' : '' }}"
                        href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#collapse4"
                        aria-expanded="false" aria-controls="collapsePages">
                        <div class="side-icon"><img src="{{ asset('assets/admin/images/icons/finances.svg') }}"
                                alt="image">
                        </div>
                        Finance
                        <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                        <b class="topRightCorner"></b>
                        <b class="bottomRightCorner"></b>
                    </a>
                    <div class="collapse" id="collapse4" aria-labelledby="headingTwo"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion">
                            <a class="nav-link" href="{{ route('admin.finance.index') }}">
                                <i class="material-icons">
                                    remove
                                </i> General Finance
                            </a>
                        </nav>
                        <nav class="sb-sidenav-menu-nested nav accordion">
                            <a class="nav-link " href="{{ route('admin.expense.index') }}">
                                <i class="material-icons">
                                    remove
                                </i> Expenditure
                            </a>
                        </nav>
                    </div>

                    <a class="nav-link collapsed {{ request()->is('admin/help-center') || request()->is('admin/roamer-support') ? 'sidenav-active' : '' }}"
                        href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#collapse55"
                        aria-expanded="false" aria-controls="collapsePages">
                        <div class="side-icon"><img src="{{ asset('assets/admin/images/icons/finances.svg') }}"
                                alt="image">
                        </div>
                        Help Center
                        <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                        <b class="topRightCorner"></b>
                        <b class="bottomRightCorner"></b>
                    </a>
                    <div class="collapse" id="collapse55" aria-labelledby="headingTwo"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion">
                            <a class="nav-link " href="{{ route('roamer-support') }}">
                                <i class="material-icons">
                                    remove
                                </i> Roamer Support
                            </a>
                        </nav>
                        <nav class="sb-sidenav-menu-nested nav accordion">
                            <a class="nav-link" href="{{ route('help-center') }}">
                                <i class="material-icons">
                                    remove
                                </i> Help Center
                            </a>
                        </nav>
                    </div>

                    <a class="nav-link {{ request()->is('admin/account-settings') ? 'sidenav-active' : '' }}"
                        href="{{ route('accounts.index') }}">
                        <div class="side-icon"><img
                                src="{{ asset('assets/admin/images/icons/account-setting.svg') }}" alt="image">
                        </div>
                        Account &amp; Settings
                        <b class="topRightCorner"></b>
                        <b class="bottomRightCorner"></b>
                    </a>

                    @if (auth()->user()->user_type == 1)
                        <a class="nav-link collapsed {{ request()->is('admin/general-settings') || request()->is('admin/productcategories') || request()->is('admin/catlog') || request()->is('admin/coupen') || request()->is('admin/manage-shipment') ? 'sidenav-active' : '' }}"
                            href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#collapse5"
                            aria-expanded="false" aria-controls="collapsePages">
                            <div class="side-icon"><img
                                    src="{{ asset('assets/admin/images/icons/account-setting.svg') }}"
                                    alt="image">
                            </div>
                            Website Settings
                            <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                            <b class="topRightCorner"></b>
                            <b class="bottomRightCorner"></b>
                        </a>
                        <div class="collapse" id="collapse5" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion">
                                <a class="nav-link" href="{{ route('settings.index') }}">
                                    <i class="material-icons">
                                        remove
                                    </i> General Information
                                </a>
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav accordion">
                                <a class="nav-link" href="{{ route('province.index') }}">
                                    <i class="material-icons">
                                        remove
                                    </i> Manage Provinces & City
                                </a>
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav accordion">
                                <a class="nav-link " href="{{ route('productcategories.index') }}">
                                    <i class="material-icons">
                                        remove
                                    </i> Manage Sub-Categories
                                </a>
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav accordion">
                                <a class="nav-link " href="{{ route('catlog.index') }}">
                                    <i class="material-icons">
                                        remove
                                    </i> Manage Categories
                                </a>
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav accordion">
                                <a class="nav-link " href="{{ route('admin.coupen.index') }}">
                                    <i class="material-icons">
                                        remove
                                    </i> Manage Coupens
                                </a>
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav accordion">
                                <a class="nav-link " href="{{ route('shipment.index') }}">
                                    <i class="material-icons">
                                        remove
                                    </i> Manage Shipment
                                </a>
                            </nav>
                        </div>
                    @endif
                    @if (Auth::user()->user_type == 1)
                        <a class="nav-link {{ request()->is('admin/chat-room') ? 'sidenav-active' : '' }}"
                            href="{{ route('chats.index') }}">
                            <div class="side-icon"><img src="{{ asset('assets/admin/images/icons/admin-chat.svg') }}"
                                    alt="image">
                            </div>
                            Chat With Seller
                            <b class="topRightCorner"></b>
                            <b class="bottomRightCorner"></b>
                        </a>
                    @else
                        <a class="nav-link {{ request()->is('admin/chat-room/seller') ? 'sidenav-active' : '' }}"
                            href="{{ route('seller-chats.index') }}">
                            <div class="side-icon"><img src="{{ asset('assets/admin/images/icons/admin-chat.svg') }}"
                                    alt="image">
                            </div>
                            Chat With Admin
                            <b class="topRightCorner"></b>
                            <b class="bottomRightCorner"></b>
                        </a>
                    @endif

                </div>
            </div>
        </div>

    </nav>
</div>
