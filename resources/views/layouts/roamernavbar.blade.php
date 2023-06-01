<nav class="sb-topnav navbar navbar-expand justify-content-between ps-4">
    <a class="order-1 order-lg-0 me-4 me-lg-0 text-white" id="sidebarToggle" href="#!"><i
            class="material-icons d-lg-none">
            subject
        </i></a>
    <div class="logo-sm d-block d-lg-none">
        <img src="assets/images/logo.png" alt="image">
    </div>
    <ul class="navbar-nav ms-auto ms-lg-0 me-3 align-items-center">
        <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link">
                <img src="assets/images/icons/email.svg" alt="image">
            </a>
        </li>
        <li class="nav-item dropdown bell position-relative">
            <a href="javascript:void(0)" class="nav-link dropdown-toggle caret-none " data-bs-toggle="dropdown"
                role="button" id="navbarDropdown" aria-expanded="false"><img src="assets/images/icons/bell.svg"
                    alt="image"></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <div>
                    <div class="d-flex align-items-center gap-2">
                        <img src="assets/images/icons/email.svg" alt="image"
                            style="    filter: brightness(0) invert(1);"> Notifications
                    </div>
                    <a href="notification.php" class="hover-opacity-08">Show More</a>
                </div>
                <div class="cover-notifications">
                    <li><a href="javascript:void(0)" class="dropdown-item">
                            <div class="inner-notification ">
                                <h6>Avoid Cancellations through our guide...</h6>
                                <p>This PK Day, avoid Cancellations through our guide!</p>

                            </div>
                        </a>
                    </li>
                    <li><a href="javascript:void(0)" class="dropdown-item">
                            <div class="inner-notification ">
                                <h6>Avoid Cancellations through our guide...</h6>
                                <p>This PK Day, avoid Cancellations through our guide!</p>

                            </div>
                        </a>
                    </li>
                    <li><a href="javascript:void(0)" class="dropdown-item">
                            <div class="inner-notification ">
                                <h6>Avoid Cancellations through our guide...</h6>
                                <p>This PK Day, avoid Cancellations through our guide!</p>

                            </div>
                        </a>
                    </li>
                    <li><a href="javascript:void(0)" class="dropdown-item">
                            <div class="inner-notification ">
                                <h6>Avoid Cancellations through our guide...</h6>
                                <p>This PK Day, avoid Cancellations through our guide!</p>
                            </div>
                        </a>
                    </li>
                </div>
            </ul>
        </li>
        <li class="nav-item dropdown profile">
            <a class="nav-link dropdown-toggle caret-none d-flex align-items-center" id="navbarDropdown"
                href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <img
                    src="assets/images/user.jpg" alt="image"> <i class="material-icons">
                    arrow_drop_down
                </i></a>
            <ul class="dropdown-menu dropdown-menu-end border-0" aria-labelledby="navbarDropdown">
                <li>
                    <a class="dropdown-item pe-none user-select-none" href="javascript:void(0)">
                        <div class="cover-profile-dropdown d-flex align-items-center gap-2">
                            <img src="assets/images/user.jpg" alt="student-img">
                            <div>
                                <h6> James Alex</h6>
                                <p>Student</p>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <div class="cover-profile-dropdown d-flex align-items-center gap-2">
                            <i class="bi bi-box-arrow-left font-20px"></i>
                            <p>logout</p>
                        </div>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
        <li class="nav-item d-none d-lg-block">
            <i class="material-icons opacity-04">
                more_vert
            </i>
        </li>
    </ul>
</nav>
