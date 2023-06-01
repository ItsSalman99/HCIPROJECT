@extends('layouts.roamer')
@section('content')

<div class="cover-all-content">
    <div class="d-flex align-items-center justify-content-between flex-wrap">
        <h2 class="section-title">Admin <span class="primary-text">Chat</span></h2>
    </div>
    <br>
    <br>

    <div class="cover-inner-content">
        <div class="card">
            <div class="card-body pe-3 pe-lg-0 white-bg-clr-02">
                <div class="bazaar-chating d-flex">
                    <div>
                        <div class="users-chat-list">
                            <div>
                                <div class="form-group mb-2">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <span class="position-absolute top-50 translate-middle-y opacity-04 font-weight-400 user-select-none font-12px d-flex align-items-center justify-content-center" style="right: 16px;"><i class="material-icons">
                                                search
                                            </i></span>
                                    </div>
                                </div>
                                <ul>
                                    <li><a href="#" class="btn btn-primary text-uppercase text-center d-block">New Chat</a></li>
                                </ul>
                            </div>
                            <!-- start fitler area -->
                            <div class="chat-filter-area d-flex align-items-center justify-content-between gap-3 py-3">
                                <div class="d-flex align-items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="12" viewBox="0 0 23 12" fill="none">
                                        <rect width="23" height="2" fill="#888888" />
                                        <rect x="2" y="5" width="19" height="2" fill="#888888" />
                                        <rect x="5" y="10" width="13" height="2" fill="#888888" />
                                    </svg>
                                    <div class="form-group m-0">
                                        <div class="custom-select p-0 border-0 " style="width:100%;">
                                            <select>
                                                <option value="0">Recent Chats</option>
                                                <option value="1">Recent Chats</option>
                                                <option value="1">Standerd</option>
                                                <option value="1">Pro</option>
                                                <option value="1">Plus</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <a href="#" class="d-flex align-items-center gap-2 hover-opacity-08">
                                        <p class="m-0 font-16px">Filter</p>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                            <path d="M20 16.422L20 3.57797C20 1.60508 18.3949 -7.01602e-08 16.422 -1.56398e-07L3.57793 -7.17831e-07C1.60508 -8.04068e-07 -7.01602e-08 1.60508 -1.56398e-07 3.57797L-7.17831e-07 16.4221C-8.04068e-07 18.3949 1.60508 20 3.57797 20L16.422 20C18.3949 20 20 18.3949 20 16.422ZM3.57797 18.8281C2.25125 18.8281 1.17187 17.7487 1.17187 16.422L1.17187 3.57797C1.17187 2.25125 2.25125 1.17187 3.57797 1.17187L16.422 1.17187C17.7487 1.17187 18.8281 2.25125 18.8281 3.57797L18.8281 16.4221C18.8281 17.7488 17.7487 18.8281 16.422 18.8281L3.57797 18.8281Z" fill="#888888" />
                                            <path d="M15.6081 16.9088L15.6081 7.98457C16.3368 7.73922 16.8633 7.04996 16.8633 6.23957C16.8633 5.42918 16.3368 4.73992 15.6081 4.49457L15.6081 3.10156C15.6081 2.77797 15.3457 2.51562 15.0221 2.51562C14.6986 2.51562 14.4362 2.77797 14.4362 3.10156L14.4362 4.49461C13.7075 4.73996 13.181 5.42922 13.181 6.23961C13.181 7.05 13.7075 7.73926 14.4362 7.98461L14.4362 16.9089C14.4362 17.2325 14.6986 17.4948 15.0221 17.4948C15.3457 17.4948 15.6081 17.2325 15.6081 16.9088ZM14.3529 6.23957C14.3529 5.87055 14.6531 5.57031 15.0221 5.57031C15.3912 5.57031 15.6914 5.87055 15.6914 6.23957C15.6914 6.60859 15.3912 6.90883 15.0221 6.90883C14.6531 6.90883 14.3529 6.60859 14.3529 6.23957Z" fill="#888888" />
                                            <path d="M10.5846 16.9088L10.5846 15.5158C11.3134 15.2704 11.8398 14.5811 11.8398 13.7708C11.8398 12.9604 11.3134 12.2712 10.5846 12.0258L10.5846 3.10156C10.5846 2.77797 10.3223 2.51562 9.99871 2.51562C9.67512 2.51562 9.41277 2.77797 9.41277 3.10156L9.41277 12.0258C8.68406 12.2712 8.15758 12.9605 8.15758 13.7708C8.15758 14.5812 8.68406 15.2705 9.41277 15.5158L9.41277 16.9089C9.41277 17.2325 9.67512 17.4948 9.99871 17.4948C10.3223 17.4948 10.5846 17.2325 10.5846 16.9088ZM9.32945 13.7708C9.32945 13.4018 9.62969 13.1016 9.99871 13.1016C10.3677 13.1016 10.668 13.4018 10.668 13.7708C10.668 14.1398 10.3677 14.4401 9.99871 14.4401C9.62969 14.4401 9.32945 14.1398 9.32945 13.7708Z" fill="#888888" />
                                            <path d="M5.56512 16.9088L5.56512 10.495C6.29383 10.2496 6.82031 9.56039 6.82031 8.75C6.82031 7.93961 6.29383 7.25035 5.56512 7.005L5.56512 3.10156C5.56512 2.77797 5.30277 2.51562 4.97918 2.51562C4.65559 2.51562 4.39324 2.77797 4.39324 3.10156L4.39324 7.005C3.66453 7.25035 3.13805 7.93961 3.13805 8.75C3.13805 9.56039 3.66453 10.2496 4.39324 10.495L4.39324 16.9089C4.39324 17.2325 4.65559 17.4948 4.97918 17.4948C5.30277 17.4948 5.56512 17.2325 5.56512 16.9088ZM4.30988 8.75C4.30988 8.38098 4.61012 8.08074 4.97914 8.08074C5.34816 8.08074 5.6484 8.38098 5.6484 8.75C5.6484 9.11902 5.3482 9.41926 4.97918 9.41926C4.61016 9.41926 4.30988 9.11902 4.30988 8.75Z" fill="#888888" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <!-- end filter area -->
                            <!-- Start User list area -->
                            <div class="user-chat-list-items">
                                <ul>
                                    <li>
                                        <a href="#" class="active-chat-user">
                                            <div class="user-chat-list-box">
                                                <div class="d-flex align-items-center justify-content-between mb-1">
                                                    <h5 class="font-16px font-weight-600 text-uppercase">John Doe</h5>
                                                    <p class="font-weight-500">June 20, 2020</p>
                                                </div>
                                                <p>Admin</p>
                                            </div>
                                        </a>
                                    </li>
                                    <?php for ($i = 1; $i <= 10; $i++) { ?>
                                        <li>
                                            <a href="#">
                                                <div class="user-chat-list-box">
                                                    <div class="d-flex align-items-center justify-content-between mb-1">
                                                        <h5 class="font-16px font-weight-600 text-uppercase">#123ga</h5>
                                                        <p class="font-weight-500">June 20, 2020</p>
                                                    </div>
                                                    <p>Tan Ballistic Goggles 3 Lenses</p>
                                                </div>
                                            </a>
                                        </li>

                                    <?php } ?>

                                </ul>
                            </div>
                            <!-- End User list area -->
                        </div>
                    </div>
                    <div>
                        <div class="users-chat">
                            <div class="chat-header-area pb-2 border-bottom">
                                <h5 class="font-weight-700 text-uppercase">John Doe</h5>
                                <p class="font-weight-500 font-16px">Admin</p>
                                <p class="font-15px">Duis autre irure dolor in velit nulla</p>
                            </div>
                            <div class="user-chats-content">
                                <?php for ($i = 1; $i <= 4; $i++) { ?>
                                    <div class="message user-chats-box">
                                        <p>Hello Admin...<br>
                                            <small>June 20, 2020</small>
                                        </p>
                                    </div>
                                <?php } ?>

                                <div class="message user-chats-file">
                                    <div>
                                        <a href="#">
                                            <div class="cover-img">
                                                <img src="assets/images/wordfile.png" alt="">
                                            </div>
                                            <p>Duis aute irure dolor in <br>
                                                <small>June 20, 2020</small>
                                            </p>
                                        </a>
                                    </div>
                                </div>
                                <div class="message my-chats-file">
                                    <div>
                                        <a href="#">
                                            <div class="cover-img">
                                                <img src="assets/images/wordfile.png" alt="">
                                            </div>
                                            <p>Duis aute irure dolor in <br>
                                                <small>June 20, 2020</small>
                                            </p>
                                        </a>
                                    </div>
                                </div>
                                <div class="message user-chats-box">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim id rerum minus, expedita perspiciatis reprehenderit? Aliquam blanditiis voluptatum omnis repudiandae iure ab saepe iste fugit id. Magnam beatae culpa atque voluptatem a neque, cupiditate porro amet nesciunt minus. Sed, similique?<br>
                                        <small>June 20, 2020</small>
                                    </p>
                                </div>

                                <?php for ($i = 1; $i <= 3; $i++) { ?>
                                    <div class="message my-chats-box">
                                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. <br>
                                            <small>June 20, 2020</small>
                                        </p>
                                    </div>
                                <?php } ?>
                                <?php for ($i = 1; $i <= 3; $i++) { ?>
                                    <div class="message my-chats-box">
                                        <p>Duis aute irure dolor in reprehenderit in voluptate<br>
                                            <small>June 20, 2020</small>
                                        </p>
                                    </div>
                                <?php } ?>
                                <?php for ($i = 1; $i <= 5; $i++) { ?>
                                    <div class="message my-chats-box">
                                        <p>Hello...<br>
                                            <small>June 20, 2020</small>
                                        </p>
                                    </div>
                                <?php } ?>


                            </div>
                            <div class="user-typing-area">
                                <form action="#">
                                    <div class=" position-relative">
                                        <input type="text" class=" form-control" placeholder="Type a message">
                                        <ul class=" position-absolute top-50 translate-middle-y" style="left: 16px;">
                                            <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22">
                                                        <g>
                                                            <path d="M11.0196 16.7447C9.39122 16.7447 7.88488 16.0049 6.88675 14.7148L5.86719 15.5037C7.11132 17.1116 8.98927 18.0338 11.0196 18.0338C13.0499 18.0338 14.9278 17.1116 16.172 15.5037L15.1523 14.7148C14.1542 16.0049 12.6479 16.7447 11.0196 16.7447Z" />
                                                            <path d="M18.7782 3.22182C16.7005 1.14418 13.9382 0 11 0C8.06179 0 5.29946 1.14418 3.22182 3.22182C1.14418 5.29946 0 8.06179 0 11C0 13.9382 1.14418 16.7005 3.22182 18.7782C5.29946 20.8558 8.06179 22 11 22C13.9382 22 16.7005 20.8558 18.7782 18.7782C20.8558 16.7005 22 13.9382 22 11C22 8.06179 20.8558 5.29946 18.7782 3.22182ZM17.8666 17.8666C16.0324 19.7008 13.5938 20.7108 11 20.7108C8.40616 20.7108 5.96752 19.7007 4.1334 17.8666C2.29924 16.0325 1.28912 13.5939 1.28912 11C1.28912 8.40616 2.29924 5.96752 4.13336 4.1334C5.96748 2.29928 8.40616 1.28912 11 1.28912C13.5938 1.28912 16.0325 2.29924 17.8666 4.13336C19.7007 5.96748 20.7108 8.40611 20.7108 11C20.7109 13.5939 19.7008 16.0325 17.8666 17.8666Z" />
                                                            <path d="M6.89654 10.4923C7.59555 10.4923 8.16418 9.92367 8.16418 9.22467C8.16418 8.52566 7.59555 7.95703 6.89654 7.95703C6.19754 7.95703 5.62891 8.52566 5.62891 9.22467C5.62891 9.92367 6.19754 10.4923 6.89654 10.4923Z" />
                                                            <path d="M15.0606 7.95703C14.3616 7.95703 13.793 8.52566 13.793 9.22467C13.793 9.92367 14.3616 10.4923 15.0606 10.4923C15.7596 10.4923 16.3282 9.92367 16.3282 9.22467C16.3282 8.52566 15.7596 7.95703 15.0606 7.95703Z" />
                                                        </g>
                                                    </svg></a></li>
                                        </ul>
                                    </div>
                                </form>
                                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20">
                                        <g>
                                            <path d="M15.4965 19.2584C15.3311 19.2584 15.1621 19.2374 14.9948 19.1936L1.45781 15.5686C0.413535 15.2805 -0.208863 14.2004 0.0642678 13.1569L1.55238 7.45031C1.64343 7.10008 2.00151 6.88738 2.35334 6.98115C2.70357 7.07219 2.91451 7.43108 2.82266 7.78211L1.33439 13.4896C1.24255 13.8415 1.45172 14.2047 1.80195 14.301L15.3311 17.9243C15.6786 18.0162 16.0375 17.8096 16.1285 17.4638L16.5906 15.5992C16.6783 15.2474 17.0336 15.0337 17.3855 15.1196C17.7375 15.2071 17.9519 15.5625 17.8652 15.9143L17.4013 17.7878C17.1675 18.6745 16.3692 19.2584 15.4965 19.2584Z" />
                                            <path d="M19.0303 14.0063H5.46181C4.37553 14.0063 3.49219 13.1229 3.49219 12.0367V1.96962C3.49219 0.883347 4.37553 0 5.46181 0H19.0303C20.1166 0 21 0.883347 21 1.96962V12.0367C21 13.1229 20.1166 14.0063 19.0303 14.0063ZM5.46181 1.31308C5.0994 1.31308 4.80527 1.60721 4.80527 1.96962V12.0367C4.80527 12.3991 5.0994 12.6932 5.46181 12.6932H19.0303C19.3928 12.6932 19.6869 12.3991 19.6869 12.0367V1.96962C19.6869 1.60721 19.3928 1.31308 19.0303 1.31308H5.46181Z" />
                                            <path d="M7.87191 6.12858C6.90634 6.12858 6.12109 5.34333 6.12109 4.37777C6.12109 3.4122 6.90634 2.62695 7.87191 2.62695C8.83747 2.62695 9.62256 3.4122 9.62256 4.37777C9.62256 5.34333 8.83747 6.12858 7.87191 6.12858ZM7.87191 3.94002C7.63019 3.94002 7.43416 4.13621 7.43416 4.37777C7.43416 4.61932 7.63019 4.81551 7.87191 4.81551C8.11346 4.81551 8.30949 4.61932 8.30949 4.37777C8.30949 4.13621 8.11346 3.94002 7.87191 3.94002Z" />
                                            <path d="M4.16403 13.1135C3.99605 13.1135 3.82791 13.0496 3.70016 12.921C3.4437 12.6646 3.4437 12.2486 3.70016 11.9922L7.65687 8.03546C8.2557 7.43662 9.22993 7.43662 9.82781 8.03546L10.8862 9.09384L14.1373 5.19131C14.4279 4.84284 14.8543 4.64152 15.3069 4.63895C15.7936 4.61187 16.1876 4.83322 16.4807 5.17736L20.8385 10.2615C21.0747 10.5364 21.0424 10.9514 20.7675 11.1877C20.4918 11.4241 20.0777 11.3917 19.8413 11.1168L15.482 6.0309C15.4241 5.96165 15.3533 5.96518 15.3138 5.95284C15.2763 5.95284 15.2035 5.96422 15.1458 6.0325L11.4342 10.4883C11.3159 10.63 11.1436 10.716 10.9598 10.7238C10.7724 10.7342 10.5956 10.6624 10.4659 10.5321L8.8991 8.96513C8.78786 8.85389 8.69601 8.85389 8.58477 8.96513L4.62807 12.921C4.50016 13.0496 4.33217 13.1135 4.16403 13.1135Z" />
                                        </g>
                                    </svg></a>
                                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="19" viewBox="0 0 17 19">
                                        <path d="M16.7778 6.70729C16.4827 6.40841 16.0055 6.40974 15.712 6.71021L6.65208 15.9847C5.47667 17.1815 3.56763 17.1815 2.39003 15.9831C1.21332 14.7844 1.21332 12.8406 2.39018 11.6424L11.7182 2.0948C12.4521 1.34765 13.6452 1.34765 14.3811 2.09641C15.1169 2.84554 15.1169 4.06017 14.3809 4.80951L6.65349 12.6774C6.653 12.6779 6.65258 12.6785 6.65208 12.679C6.35769 12.9771 5.88192 12.9767 5.58813 12.6775C5.29385 12.3779 5.29385 11.8923 5.58813 11.5926L9.3181 7.79404C9.61238 7.49434 9.61235 7.00844 9.31799 6.70881C9.02364 6.40917 8.54642 6.4092 8.25214 6.70891L4.52221 10.5074C3.63931 11.4064 3.63931 12.8638 4.52228 13.7628C5.4052 14.6617 6.83657 14.6617 7.71953 13.7628C7.72055 13.7617 7.72136 13.7606 7.72235 13.7595L15.4468 5.89468C16.7714 4.54599 16.7714 2.35961 15.4468 1.01092C14.122 -0.336974 11.9748 -0.336974 10.651 1.01092L1.32291 10.5586C-0.44118 12.3547 -0.44118 15.27 1.32418 17.0684C3.0907 18.8661 5.95392 18.8661 7.71939 17.0685L16.7807 7.79253C17.0742 7.49203 17.0729 7.00618 16.7778 6.70729Z" />
                                    </svg></a>
                                <a href="#"><i class="material-icons">
                                        more_vert
                                    </i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--############# mobile user chats content view ###########-->
    <div class="mobile-user-chats">
        <div class="bazaar-chating">
            <div class="users-chat">
                <div class="chat-header-area d-flex align-items-center gap-3 pb-2 border-bottom">
                    <a href="#" class=" default-black opacity-05 user-chat-remove"><i class="material-icons">
                            chevron_left
                        </i></a>
                    <div>
                        <h5 class="font-weight-700 text-uppercase">John Doe</h5>
                        <p class="font-weight-500 font-16px">Admin</p>
                        <p class="font-15px">Duis autre irure dolor in velit nulla</p>
                    </div>
                </div>
                <div class="user-chats-content">
                    <?php for ($i = 1; $i <= 4; $i++) { ?>
                        <div class="message user-chats-box">
                            <p>Hello Admin...<br>
                                <small>June 20, 2020</small>
                            </p>
                        </div>
                    <?php } ?>

                    <div class="message user-chats-file">
                        <div>
                            <a href="#">
                                <div class="cover-img">
                                    <img src="assets/images/wordfile.png" alt="">
                                </div>
                                <p>Duis aute irure dolor in <br>
                                    <small>June 20, 2020</small>
                                </p>
                            </a>
                        </div>
                    </div>
                    <div class="message my-chats-file">
                        <div>
                            <a href="#">
                                <div class="cover-img">
                                    <img src="assets/images/wordfile.png" alt="">
                                </div>
                                <p>Duis aute irure dolor in <br>
                                    <small>June 20, 2020</small>
                                </p>
                            </a>
                        </div>
                    </div>
                    <div class="message user-chats-box">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim id rerum minus, expedita perspiciatis reprehenderit? Aliquam blanditiis voluptatum omnis repudiandae iure ab saepe iste fugit id. Magnam beatae culpa atque voluptatem a neque, cupiditate porro amet nesciunt minus. Sed, similique?<br>
                            <small>June 20, 2020</small>
                        </p>
                    </div>

                    <?php for ($i = 1; $i <= 3; $i++) { ?>
                        <div class="message my-chats-box">
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. <br>
                                <small>June 20, 2020</small>
                            </p>
                        </div>
                    <?php } ?>
                    <?php for ($i = 1; $i <= 3; $i++) { ?>
                        <div class="message my-chats-box">
                            <p>Duis aute irure dolor in reprehenderit in voluptate<br>
                                <small>June 20, 2020</small>
                            </p>
                        </div>
                    <?php } ?>
                    <?php for ($i = 1; $i <= 5; $i++) { ?>
                        <div class="message my-chats-box">
                            <p>Hello...<br>
                                <small>June 20, 2020</small>
                            </p>
                        </div>
                    <?php } ?>


                </div>
                <div class="user-typing-area">
                    <form action="#">
                        <div class=" position-relative">
                            <input type="text" class=" form-control" placeholder="Type a message">
                            <ul class=" position-absolute top-50 translate-middle-y" style="left: 16px;">
                                <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22">
                                            <g>
                                                <path d="M11.0196 16.7447C9.39122 16.7447 7.88488 16.0049 6.88675 14.7148L5.86719 15.5037C7.11132 17.1116 8.98927 18.0338 11.0196 18.0338C13.0499 18.0338 14.9278 17.1116 16.172 15.5037L15.1523 14.7148C14.1542 16.0049 12.6479 16.7447 11.0196 16.7447Z" />
                                                <path d="M18.7782 3.22182C16.7005 1.14418 13.9382 0 11 0C8.06179 0 5.29946 1.14418 3.22182 3.22182C1.14418 5.29946 0 8.06179 0 11C0 13.9382 1.14418 16.7005 3.22182 18.7782C5.29946 20.8558 8.06179 22 11 22C13.9382 22 16.7005 20.8558 18.7782 18.7782C20.8558 16.7005 22 13.9382 22 11C22 8.06179 20.8558 5.29946 18.7782 3.22182ZM17.8666 17.8666C16.0324 19.7008 13.5938 20.7108 11 20.7108C8.40616 20.7108 5.96752 19.7007 4.1334 17.8666C2.29924 16.0325 1.28912 13.5939 1.28912 11C1.28912 8.40616 2.29924 5.96752 4.13336 4.1334C5.96748 2.29928 8.40616 1.28912 11 1.28912C13.5938 1.28912 16.0325 2.29924 17.8666 4.13336C19.7007 5.96748 20.7108 8.40611 20.7108 11C20.7109 13.5939 19.7008 16.0325 17.8666 17.8666Z" />
                                                <path d="M6.89654 10.4923C7.59555 10.4923 8.16418 9.92367 8.16418 9.22467C8.16418 8.52566 7.59555 7.95703 6.89654 7.95703C6.19754 7.95703 5.62891 8.52566 5.62891 9.22467C5.62891 9.92367 6.19754 10.4923 6.89654 10.4923Z" />
                                                <path d="M15.0606 7.95703C14.3616 7.95703 13.793 8.52566 13.793 9.22467C13.793 9.92367 14.3616 10.4923 15.0606 10.4923C15.7596 10.4923 16.3282 9.92367 16.3282 9.22467C16.3282 8.52566 15.7596 7.95703 15.0606 7.95703Z" />
                                            </g>
                                        </svg></a></li>
                            </ul>
                        </div>
                    </form>
                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20">
                            <g>
                                <path d="M15.4965 19.2584C15.3311 19.2584 15.1621 19.2374 14.9948 19.1936L1.45781 15.5686C0.413535 15.2805 -0.208863 14.2004 0.0642678 13.1569L1.55238 7.45031C1.64343 7.10008 2.00151 6.88738 2.35334 6.98115C2.70357 7.07219 2.91451 7.43108 2.82266 7.78211L1.33439 13.4896C1.24255 13.8415 1.45172 14.2047 1.80195 14.301L15.3311 17.9243C15.6786 18.0162 16.0375 17.8096 16.1285 17.4638L16.5906 15.5992C16.6783 15.2474 17.0336 15.0337 17.3855 15.1196C17.7375 15.2071 17.9519 15.5625 17.8652 15.9143L17.4013 17.7878C17.1675 18.6745 16.3692 19.2584 15.4965 19.2584Z" />
                                <path d="M19.0303 14.0063H5.46181C4.37553 14.0063 3.49219 13.1229 3.49219 12.0367V1.96962C3.49219 0.883347 4.37553 0 5.46181 0H19.0303C20.1166 0 21 0.883347 21 1.96962V12.0367C21 13.1229 20.1166 14.0063 19.0303 14.0063ZM5.46181 1.31308C5.0994 1.31308 4.80527 1.60721 4.80527 1.96962V12.0367C4.80527 12.3991 5.0994 12.6932 5.46181 12.6932H19.0303C19.3928 12.6932 19.6869 12.3991 19.6869 12.0367V1.96962C19.6869 1.60721 19.3928 1.31308 19.0303 1.31308H5.46181Z" />
                                <path d="M7.87191 6.12858C6.90634 6.12858 6.12109 5.34333 6.12109 4.37777C6.12109 3.4122 6.90634 2.62695 7.87191 2.62695C8.83747 2.62695 9.62256 3.4122 9.62256 4.37777C9.62256 5.34333 8.83747 6.12858 7.87191 6.12858ZM7.87191 3.94002C7.63019 3.94002 7.43416 4.13621 7.43416 4.37777C7.43416 4.61932 7.63019 4.81551 7.87191 4.81551C8.11346 4.81551 8.30949 4.61932 8.30949 4.37777C8.30949 4.13621 8.11346 3.94002 7.87191 3.94002Z" />
                                <path d="M4.16403 13.1135C3.99605 13.1135 3.82791 13.0496 3.70016 12.921C3.4437 12.6646 3.4437 12.2486 3.70016 11.9922L7.65687 8.03546C8.2557 7.43662 9.22993 7.43662 9.82781 8.03546L10.8862 9.09384L14.1373 5.19131C14.4279 4.84284 14.8543 4.64152 15.3069 4.63895C15.7936 4.61187 16.1876 4.83322 16.4807 5.17736L20.8385 10.2615C21.0747 10.5364 21.0424 10.9514 20.7675 11.1877C20.4918 11.4241 20.0777 11.3917 19.8413 11.1168L15.482 6.0309C15.4241 5.96165 15.3533 5.96518 15.3138 5.95284C15.2763 5.95284 15.2035 5.96422 15.1458 6.0325L11.4342 10.4883C11.3159 10.63 11.1436 10.716 10.9598 10.7238C10.7724 10.7342 10.5956 10.6624 10.4659 10.5321L8.8991 8.96513C8.78786 8.85389 8.69601 8.85389 8.58477 8.96513L4.62807 12.921C4.50016 13.0496 4.33217 13.1135 4.16403 13.1135Z" />
                            </g>
                        </svg></a>
                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="19" viewBox="0 0 17 19">
                            <path d="M16.7778 6.70729C16.4827 6.40841 16.0055 6.40974 15.712 6.71021L6.65208 15.9847C5.47667 17.1815 3.56763 17.1815 2.39003 15.9831C1.21332 14.7844 1.21332 12.8406 2.39018 11.6424L11.7182 2.0948C12.4521 1.34765 13.6452 1.34765 14.3811 2.09641C15.1169 2.84554 15.1169 4.06017 14.3809 4.80951L6.65349 12.6774C6.653 12.6779 6.65258 12.6785 6.65208 12.679C6.35769 12.9771 5.88192 12.9767 5.58813 12.6775C5.29385 12.3779 5.29385 11.8923 5.58813 11.5926L9.3181 7.79404C9.61238 7.49434 9.61235 7.00844 9.31799 6.70881C9.02364 6.40917 8.54642 6.4092 8.25214 6.70891L4.52221 10.5074C3.63931 11.4064 3.63931 12.8638 4.52228 13.7628C5.4052 14.6617 6.83657 14.6617 7.71953 13.7628C7.72055 13.7617 7.72136 13.7606 7.72235 13.7595L15.4468 5.89468C16.7714 4.54599 16.7714 2.35961 15.4468 1.01092C14.122 -0.336974 11.9748 -0.336974 10.651 1.01092L1.32291 10.5586C-0.44118 12.3547 -0.44118 15.27 1.32418 17.0684C3.0907 18.8661 5.95392 18.8661 7.71939 17.0685L16.7807 7.79253C17.0742 7.49203 17.0729 7.00618 16.7778 6.70729Z" />
                        </svg></a>
                    <a href="#"><i class="material-icons">
                            more_vert
                        </i></a>
                </div>
            </div>
        </div>
    </div>

   @endsection
    <script>
        $(document).ready(function() {
            $(".user-chat-list-items li a").click(function() {
                $('.mobile-user-chats').addClass("user-chat-show");
            });
            $(".user-chat-remove").click(function() {
                $('.mobile-user-chats').removeClass("user-chat-show");
            });
            $('.Product-Submission-table').DataTable({
                responsive: true,
                searching: false,
                // pageLength: 5,

                // "ordering": false,
                // columnDefs: [{
                //   width: '100',
                //   targets: 0
                // }],
                columnDefs: [{
                    orderable: false,
                    className: 'select-checkbox',
                    targets: 0
                }],
                select: {
                    style: 'multi',
                    selector: 'td:first-child'
                },
                order: [
                    [1, 'asc']
                ],
                "pagingType": "full_numbers",
                "language": {
                    "paginate": {
                        "first": "<i class='material-icons'>keyboard_double_arrow_left</i>",
                        "last": "<i class='material-icons'>keyboard_double_arrow_right</i>",
                        "next": "<i class='material-icons'>chevron_right</i>",
                        "previous": "<i class='material-icons'>chevron_left</i>"
                    },
                },


            });
        });
    </script>
