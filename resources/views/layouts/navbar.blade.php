    <nav class="sb-topnav navbar navbar-expand justify-content-between ps-4">
        <a class="order-1 order-lg-0 me-4 me-lg-0 text-white" id="sidebarToggle" href="#!"><i
                class="material-icons d-lg-none">
                subject
            </i></a>
        <div class="logo-sm d-block d-lg-none">
            <img src="{{ asset('assets/admin/images/logo.png') }}" alt="image">
        </div>
        <ul class="navbar-nav ms-auto ms-lg-0 me-3 align-items-center">
            <li class="nav-item dropdown bell position-relative me-4">
                <a href="javascript:void(0)" onclick="markRead({{ Auth::user()->id }})"
                    class="nav-link dropdown-toggle caret-none notification" data-bs-toggle="dropdown" role="button"
                    id="navbarDropdown" aria-expanded="false">
                    <span id="countNotification"
                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ countNotifications(Auth::user()->id) }}
                    </span>
                    <img src="{{ asset('assets/admin/images/icons/bell.svg') }}" alt="image">
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <div>
                        <div class="d-flex align-items-center gap-2">
                            <img src="{{ asset('assets/admin/images/icons/email.svg') }}" alt="image"
                                style="    filter: brightness(0) invert(1);">
                            Notifications
                        </div>
                        <a href="{{ route('admin.notifications') }}" class="hover-opacity-08">Show More</a>
                    </div>
                    <div class="cover-notifications">
                        @forelse(getNotifications() as $notification)
                            @if (Auth::user()->user_type == 1 && $notification->user_id == Auth::user()->id)
                                <li style="{{ $notification->is_read == 0 ? 'background-color: #ffeae2;' : '#fff' }}">
                                    <a href="javascript:void(0)" class="dropdown-item">
                                        <div class="inner-notification ">
                                            <h6>{{ $notification->title }}</h6>
                                            <p>{{ $notification->body }}</p>
                                            <p>{{ date('F, j Y', strtotime($notification->created_at)) }}</p>
                                        </div>
                                    </a>
                                </li>
                            @elseif(Auth::user()->user_type != 1 && $notification->user_id == Auth::user()->id)
                                <li>
                                    <a href="javascript:void(0)" class="dropdown-item">
                                        <div class="inner-notification ">
                                            <h6>{{ $notification->title }}</h6>
                                            <p>{{ $notification->body }}</p>
                                            <p>{{ date('F, j Y', strtotime($notification->created_at)) }}</p>
                                        </div>
                                    </a>
                                </li>
                            @endif
                        @empty
                            <li>
                                <a href="javascript:void(0)" class="dropdown-item">
                                    <div class="inner-notification ">
                                        <h6>No Notification Available!</h6>
                                    </div>
                                </a>
                            </li>
                        @endforelse
                    </div>
                </ul>
            </li>
            <li class="nav-item dropdown profile">
                <a class="nav-link dropdown-toggle caret-none d-flex align-items-center" id="navbarDropdown"
                    href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    @if (Auth::user()->profile_img != null)
                        <img src="{{ asset(Auth::user()->profile_img) }}" alt="student-img">
                    @else
                        <img src="{{ asset('assets/admin/images/user.jpg') }}" alt="student-img">
                    @endif
                    <i class="material-icons">
                        arrow_drop_down
                    </i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end border-0" aria-labelledby="navbarDropdown">
                    <li>
                        <a class="dropdown-item pe-none user-select-none" href="javascript:void(0)">
                            <div class="cover-profile-dropdown d-flex align-items-center gap-2">
                                @if (Auth::user()->profile_img != null)
                                    <img src="{{ asset(Auth::user()->profile_img) }}" alt="student-img">
                                @else
                                    <img src="{{ asset('assets/admin/images/user.jpg') }}" alt="student-img">
                                @endif
                                <div>
                                    <h6> {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }} </h6>
                                    <p>{{ Auth::user()->user_type == 1 ? 'admin' : 'Roamer' }}</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#."
                            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <div class="cover-profile-dropdown d-flex align-items-center gap-2">
                                <i class="bi bi-box-arrow-left font-20px"></i>
                                <p>logout</p>
                            </div>
                        </a>
                        <form id="logout-form" action="{{ route('front.adminLogout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
