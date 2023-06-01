@extends('layouts.roamer')
@section('content')

<div class="cover-all-content">
    <div class="d-flex align-items-center justify-content-between flex-wrap">
        <h2 class="section-title">Roamer <span class="primary-text">Support</span></h2>
    </div>
    <br>
    <br>
    <div class="cover-inner-content">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body p-4 p-lg-5 white-bg-clr-02">
                        <h4 class="font-18px font-weight-600 mb-4">Get In <span class=" primary-text">Touch</span></h4>
                        <br>

                        <ul class="get-in-touch">
                            <li class="d-flex align-items-start gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="17" viewBox="0 0 19 17" class=" primary-svg">
                                    <path d="M16.959 0H2.04102C0.9156 0 0 0.931561 0 2.0766V12.0443C0 13.1893 0.9156 14.1209 2.04102 14.1209H6.8472C6.90587 14.1209 6.96164 14.1495 6.99649 14.1976L8.75002 16.6164C8.92573 16.8588 9.1963 16.9986 9.49236 17H9.49681C9.79116 17 10.0612 16.8629 10.2382 16.6233L12.0315 14.1962C12.0664 14.149 12.1219 14.1208 12.1799 14.1208H16.959C18.0844 14.1208 19 13.1893 19 12.0442V2.07656C19 0.931524 18.0844 0 16.959 0ZM17.8867 12.0443C17.8867 12.1334 17.8743 12.2196 17.8514 12.3015L12.1327 7.20103L17.8867 2.34263V12.0443ZM16.959 1.13269C17.1287 1.13269 17.2878 1.17951 17.4247 1.2608L10.094 7.45041C9.75071 7.74031 9.25244 7.74031 8.90911 7.45041L1.57711 1.2597C1.71367 1.17909 1.87209 1.13269 2.04102 1.13269H16.959ZM1.14857 12.3015C1.12575 12.2196 1.11328 12.1334 1.11328 12.0443V2.33998L6.86887 7.19964L1.14857 12.3015ZM11.1417 13.5155L9.49807 15.74L7.89242 13.5253C7.64869 13.1889 7.25789 12.9881 6.84716 12.9881H2.06747L7.73638 7.93215L8.19813 8.32202C8.57579 8.64091 9.03858 8.80028 9.50156 8.80028C9.96439 8.80028 10.4274 8.64079 10.805 8.32202L11.2651 7.93351L16.9325 12.9881H12.1799C11.7738 12.9882 11.3857 13.1853 11.1417 13.5155Z" />
                                </svg>
                                <div>
                                    <h6 class=" font-weight-600 opacity-07 font-13px mb-1">Email ID:</h6>
                                    <a href="javascript:void(0)" class="text-dark opacity-07 font-13px primary-hover-clr">info@company.com</a>
                                </div>
                            </li>

                            <li class="d-flex align-items-start gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" class=" primary-svg">
                                    <path d="M14.3108 10.1337C13.9398 9.7491 13.4922 9.54346 13.0179 9.54346C12.5474 9.54346 12.096 9.7453 11.7096 10.1299L10.5008 11.3295C10.4014 11.2762 10.3019 11.2267 10.2063 11.1772C10.0686 11.1086 9.93853 11.0439 9.82759 10.9754C8.69531 10.2594 7.66631 9.32639 6.67938 8.11918C6.20122 7.51747 5.8799 7.01098 5.64656 6.49686C5.96023 6.21125 6.25095 5.9142 6.53402 5.62858C6.64113 5.52195 6.74824 5.41151 6.85535 5.30488C7.65866 4.50515 7.65866 3.46931 6.85535 2.66958L5.81104 1.62993C5.69246 1.51187 5.57005 1.39001 5.45529 1.26815C5.22578 1.03203 4.98478 0.788306 4.73614 0.559812C4.36509 0.19422 3.92135 0 3.45467 0C2.98799 0 2.5366 0.19422 2.15407 0.559812C2.15025 0.56362 2.15025 0.56362 2.14642 0.567428L0.845827 1.87366C0.356191 2.36111 0.076945 2.9552 0.0157405 3.64449C-0.0760663 4.7565 0.252908 5.79234 0.505377 6.47021C1.12507 8.13441 2.05079 9.67675 3.43172 11.3295C5.10719 13.3212 7.12312 14.894 9.42594 16.0022C10.3058 16.4173 11.4801 16.9086 12.7922 16.9924C12.8725 16.9962 12.9567 17 13.0332 17C13.9168 17 14.6589 16.6839 15.2404 16.0556C15.2442 16.0479 15.2518 16.0441 15.2557 16.0365C15.4546 15.7966 15.6841 15.5795 15.9251 15.3472C16.0896 15.1911 16.2579 15.0273 16.4224 14.856C16.8011 14.4637 17 14.0067 17 13.5383C17 13.0661 16.7973 12.6129 16.4109 12.2321L14.3108 10.1337ZM15.6803 14.1438C15.6765 14.1438 15.6765 14.1476 15.6803 14.1438C15.5311 14.3038 15.3781 14.4485 15.2136 14.6084C14.9649 14.8445 14.7125 15.0921 14.4753 15.3701C14.089 15.7814 13.6337 15.9756 13.037 15.9756C12.9796 15.9756 12.9184 15.9756 12.861 15.9718C11.7249 15.8994 10.6692 15.4577 9.87732 15.0806C7.71221 14.0372 5.81105 12.5558 4.2312 10.6783C2.92678 9.11313 2.05462 7.666 1.477 6.11223C1.12125 5.16398 0.991188 4.42518 1.04857 3.72827C1.08682 3.28271 1.25896 2.91331 1.57646 2.59722L2.88088 1.29861C3.06832 1.12343 3.26723 1.02823 3.46232 1.02823C3.70331 1.02823 3.8984 1.17294 4.02081 1.2948C4.02464 1.29861 4.02846 1.30242 4.03229 1.30623C4.26563 1.5233 4.4875 1.74798 4.72084 1.9879C4.83942 2.10977 4.96183 2.23163 5.08424 2.3573L6.12854 3.39695C6.53402 3.80063 6.53402 4.17384 6.12854 4.57751C6.01761 4.68795 5.9105 4.79839 5.79957 4.90502C5.47825 5.23253 5.17222 5.53719 4.83942 5.83423C4.83177 5.84185 4.82412 5.84565 4.8203 5.85327C4.49132 6.18078 4.55253 6.50067 4.62138 6.71774C4.62521 6.72917 4.62903 6.74059 4.63286 6.75202C4.90445 7.40703 5.28698 8.02397 5.86842 8.75896L5.87225 8.76277C6.92803 10.0576 8.04119 11.0668 9.2691 11.8398C9.42594 11.9388 9.5866 12.0188 9.73961 12.095C9.87732 12.1635 10.0074 12.2283 10.1183 12.2968C10.1336 12.3044 10.1489 12.3159 10.1642 12.3235C10.2943 12.3882 10.4167 12.4187 10.5429 12.4187C10.8604 12.4187 11.0593 12.2207 11.1244 12.1559L12.4326 10.8535C12.5627 10.724 12.7692 10.5679 13.0102 10.5679C13.2474 10.5679 13.4425 10.7164 13.5611 10.8459C13.5649 10.8497 13.5649 10.8497 13.5687 10.8535L15.6765 12.9518C16.0705 13.3403 16.0705 13.7401 15.6803 14.1438Z" />
                                </svg>
                                <div>
                                    <h6 class=" font-weight-600 opacity-07 font-13px mb-1">Mobile Number:</h6>
                                    <a href="javascript:void(0)" class="text-dark opacity-07 font-13px primary-hover-clr">+1 (619) 555-0321</a>
                                </div>
                            </li>

                            <li class="d-flex align-items-start gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" class=" primary-svg">
                                    <path d="M15.3567 2.64331C13.6522 0.938782 11.3946 0 9 0C4.04407 0 0 4.04462 0 9C0 10.4664 0.360077 11.914 1.04329 13.2009L0.0155182 17.3458C-0.0289764 17.5251 0.0237579 17.7148 0.154495 17.8455C0.284409 17.9756 0.473785 18.0293 0.654236 17.9845L4.7991 16.9566C6.08601 17.6398 7.5336 18 9 18C11.3946 18 13.6522 17.0612 15.3567 15.3567C17.0612 13.652 18 11.3946 18 9C18 6.60539 17.0612 4.34784 15.3567 2.64331ZM9 16.9453C7.64319 16.9453 6.30505 16.5961 5.12993 15.9357C5.01292 15.8699 4.87518 15.8512 4.74458 15.8835L1.24983 16.7502L2.11638 13.2553C2.14879 13.125 2.13011 12.9871 2.06433 12.8699C1.40378 11.6949 1.05469 10.3568 1.05469 9C1.05469 4.61893 4.61893 1.05469 9 1.05469C13.3811 1.05469 16.9453 4.61893 16.9453 9C16.9453 13.3811 13.3811 16.9453 9 16.9453Z" />
                                    <path d="M13.7599 10.6022C13.4104 10.2526 13.0256 9.89965 12.581 9.68528C11.9168 9.36517 11.283 9.45691 10.7963 9.9436C10.5748 10.1651 10.2701 10.6018 10.0947 10.8166C9.64233 10.7409 8.73856 9.97889 8.37972 9.62129C8.02225 9.26245 7.26077 8.35855 7.1851 7.90715C7.39864 7.73274 7.83686 7.42677 8.05824 7.20553C8.54493 6.71884 8.63667 6.08493 8.31655 5.4208C8.10218 4.97613 7.74924 4.59147 7.39988 4.24211C6.68824 3.5155 5.59057 3.46194 4.64314 4.40951C3.93507 5.11744 3.30431 6.4299 4.31945 8.66218C4.92013 9.98274 5.88816 11.1507 6.36538 11.6327L6.36909 11.6365C6.85111 12.1138 8.0191 13.0818 9.33965 13.6824C10.831 14.3607 12.4296 14.5216 13.5925 13.3588C14.5542 12.397 14.4732 11.3007 13.7599 10.6022ZM12.8466 12.613C12.1598 13.2998 11.1269 13.3366 9.77622 12.7223C8.59052 12.183 7.51688 11.2883 7.113 10.8888C6.71351 10.4848 5.81881 9.41131 5.27952 8.22561C4.66525 6.87498 4.70205 5.84199 5.38883 5.15521C5.7897 4.75435 6.25112 4.5765 6.64635 4.98011L6.65391 4.98781C7.59008 5.92398 7.52361 6.24849 7.3124 6.4597C7.12495 6.64715 6.57082 7.02343 6.39175 7.20251C5.97138 7.62274 6.04966 8.27368 6.62424 9.13707C6.96716 9.65246 7.42007 10.1526 7.63375 10.3668L7.63485 10.3681C7.84922 10.5818 8.34924 11.0347 8.86463 11.3776C9.72816 11.9522 10.379 12.0303 10.7992 11.6101C10.9784 11.4309 11.3545 10.8769 11.542 10.6894C11.6848 10.5466 11.8256 10.4921 12.1229 10.6355C12.4676 10.8016 12.8366 11.1706 13.014 11.3479L13.0217 11.3555C13.4285 11.7539 13.2476 12.212 12.8466 12.613Z" />
                                </svg>
                                <div>
                                    <h6 class=" font-weight-600 opacity-07 font-13px mb-1">Whatsapp Number:</h6>
                                    <a href="javascript:void(0)" class="text-dark opacity-07 font-13px primary-hover-clr">+1 (619) 555-0321</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body p-3 p-lg-5 white-bg-clr-02">
                        <div class="text-center">
                            <h5 class=" font-18px font-weight-600">Contact <span class="primary-text">Us</span></h5>
                            <br>
                            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea <br>
                                commodo consequat.</p>
                            <br>
                            <form action="" class="input-height-49px">
                                <div class="row gx-2">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="email" class=" form-control" placeholder="Email ID">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="number" class=" form-control" placeholder="Whatsapp Number">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="number" class=" form-control" placeholder="Mobile Number">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <textarea rows="5" class=" form-control" placeholder="Your Message"></textarea>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <br>
                                        <br>
                                        <button class=" btn btn-primary extra-btn-padding-50">Contact Us</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   @endsection
