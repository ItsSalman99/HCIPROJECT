@extends('layouts.roamer')
@section('content')

<div class="cover-all-content">
    <div class="d-flex align-items-center justify-content-between flex-wrap">
        <h2 class="section-title">Help <span class="primary-text">Centre</span></h2>
    </div>
    <br>
    <br>
    <div class="cover-inner-content">
        <div class="row">
            <div class="col-lg-6">
                <h6 class=" font-15px">Hi, how can <span class=" primary-text">we help?</span></h6>
                <div class=" position-relative">
                    <input type="search" placeholder="Search here..." class=" form-control">
                    <i class="material-icons position-absolute top-50 translate-middle-y opacity-04" style="right: 10px;">
                        search
                    </i>
                </div>
            </div>
        </div>
        <br>
        <br>
        <h5 class=" font-18px font-weight-600">Some New <span class=" primary-text">Tips</span></h5>

        <div class="row g-2">
            <div class="col-lg-6">
                <div class="row g-2">
                    <div class="col-lg-12">
                        <div class="according-style-1">
                            <div class="accordion" id="accordionExample">
                                <?php for ($i = 1; $i <= 6; $i++) { ?>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#according-st-1-<?php echo $i ?>" aria-expanded="false" aria-controls="collapseOne">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit?
                                            </button>
                                        </h2>
                                        <div id="according-st-1-<?php echo $i ?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cupiditate dolores excepturi perspiciatis? Earum dolorem amet dolorum explicabo enim, id sapiente nulla, eius vero fuga molestiae ab libero repellendus, unde suscipit!</p>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row g-2">
                    <div class="col-lg-12">
                        <div class="according-style-1">
                            <div class="accordion" id="accordionExample">
                                <?php for ($i = 1; $i <= 6; $i++) { ?>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#according-st-2-<?php echo $i ?>" aria-expanded="false" aria-controls="collapseOne">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit?
                                            </button>
                                        </h2>
                                        <div id="according-st-2-<?php echo $i ?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cupiditate dolores excepturi perspiciatis? Earum dolorem amet dolorum explicabo enim, id sapiente nulla, eius vero fuga molestiae ab libero repellendus, unde suscipit!</p>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="primary-bg py-4 py-md-5 border-radius-5px ">
            <div class="d-flex align-items-center justify-content-between gap-4 gap-lg-0 flex-wrap">
                <div class="padding-inline-5vw flex-1 ">
                    <div class=" d-flex align-items-center gap-3 position-relative">
                        <div class="svg-icon bg-white border-radius-50px d-flex align-items-center justify-content-center" style="width:46px; aspect-ratio: 1/1;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="27" viewBox="0 0 25 27" class="primary-svg ">
                                <path d="M8.48326 5.02539H3.92072C3.49847 5.02539 3.15625 5.36761 3.15625 5.78986C3.15625 6.21211 3.49847 6.55433 3.92072 6.55433H8.48326C8.90531 6.55433 9.24773 6.21211 9.24773 5.78986C9.24773 5.36761 8.90531 5.02539 8.48326 5.02539Z" />
                                <path d="M8.48326 8.08203H3.92072C3.49847 8.08203 3.15625 8.42425 3.15625 8.8465C3.15625 9.26875 3.49847 9.61097 3.92072 9.61097H8.48326C8.90531 9.61097 9.24773 9.26875 9.24773 8.8465C9.24773 8.42425 8.90531 8.08203 8.48326 8.08203Z" />
                                <path d="M8.48326 11.1484H3.92072C3.49847 11.1484 3.15625 11.4907 3.15625 11.9129C3.15625 12.3352 3.49847 12.6774 3.92072 12.6774H8.48326C8.90531 12.6774 9.24773 12.3352 9.24773 11.9129C9.24773 11.4907 8.90531 11.1484 8.48326 11.1484Z" />
                                <path d="M8.48326 14.1973H3.92072C3.49847 14.1973 3.15625 14.5395 3.15625 14.9617C3.15625 15.384 3.49847 15.7262 3.92072 15.7262H8.48326C8.90531 15.7262 9.24773 15.384 9.24773 14.9617C9.24773 14.5395 8.90531 14.1973 8.48326 14.1973Z" />
                                <path d="M8.48326 17.3086H3.92072C3.49847 17.3086 3.15625 17.651 3.15625 18.0731C3.15625 18.4953 3.49847 18.8375 3.92072 18.8375H8.48326C8.90531 18.8375 9.24773 18.4953 9.24773 18.0731C9.24773 17.651 8.90531 17.3086 8.48326 17.3086Z" />
                                <path d="M11.0496 6.55433H15.6122C16.0344 6.55433 16.3766 6.21211 16.3766 5.78986C16.3766 5.36761 16.0344 5.02539 15.6122 5.02539H11.0496C10.6276 5.02539 10.2852 5.36761 10.2852 5.78986C10.2852 6.21211 10.6276 6.55433 11.0496 6.55433Z" />
                                <path d="M11.0496 9.61097H15.6122C16.0344 9.61097 16.3766 9.26875 16.3766 8.8465C16.3766 8.42425 16.0344 8.08203 15.6122 8.08203H11.0496C10.6276 8.08203 10.2852 8.42425 10.2852 8.8465C10.2852 9.26875 10.6276 9.61097 11.0496 9.61097Z" />
                                <path d="M14.0116 11.9129C14.0116 11.4907 13.6693 11.1484 13.2471 11.1484H11.0496C10.6276 11.1484 10.2852 11.4907 10.2852 11.9129C10.2852 12.3352 10.6276 12.6774 11.0496 12.6774H13.2471C13.6693 12.6774 14.0116 12.3352 14.0116 11.9129Z" />
                                <path d="M21.249 17.6291C20.9197 17.365 20.4388 17.4177 20.1744 17.747L18.2055 20.2017L16.9865 19.3185C16.6447 19.0707 16.1665 19.1471 15.9188 19.489C15.6712 19.831 15.7476 20.309 16.0894 20.5566L17.8977 21.8668C18.0331 21.9647 18.1899 22.0123 18.3458 22.0123C18.5702 22.0123 18.792 21.9138 18.9425 21.726L21.3671 18.7038C21.6313 18.3745 21.5785 17.8933 21.249 17.6291Z" />
                                <path d="M23.178 15.2864C22.1822 14.2731 20.9027 13.6345 19.5163 13.4463V3.07879C19.5163 1.38122 18.1351 0 16.4375 0H3.07899C1.38122 0 0 1.38122 0 3.07879V20.7876C0 22.4854 1.38122 23.8666 3.07879 23.8666H13.823C15.032 25.2869 16.7704 26.0939 18.6511 26.0939C22.1519 26.0939 25 23.2439 25 19.7407C25 18.0636 24.353 16.4817 23.178 15.2864ZM1.52894 20.7876V3.07879C1.52894 2.22433 2.22433 1.52894 3.07899 1.52894H16.4375C17.2922 1.52894 17.9874 2.22433 17.9874 3.07879V13.422C14.7973 13.7551 12.3022 16.4616 12.3022 19.7407C12.3022 20.6495 12.4917 21.5282 12.8553 22.3375H3.07899C2.22433 22.3375 1.52894 21.6423 1.52894 20.7876ZM18.6511 24.565C17.1244 24.565 15.7208 23.864 14.8001 22.6421C14.1662 21.8006 13.831 20.7974 13.831 19.7407C13.831 17.0806 15.9934 14.9163 18.6511 14.9163C18.6762 14.9163 18.7015 14.9167 18.7266 14.9171L18.7383 14.9173C20.007 14.9398 21.1966 15.4515 22.0876 16.3581C22.9797 17.2657 23.4711 18.4672 23.4711 19.7407C23.4711 22.4008 21.3088 24.565 18.6511 24.565Z" />
                            </svg>
                        </div>
                        <div>
                            <a href="terms-condition.php" class=" font-weight-600 text-white hover-opacity-08 d-block">Terms And Conditions</a>
                            <small class=" text-white opacity-08 m-0">Last Updated: 12 August, 2021</small>
                        </div>
                        <ul>
                            <li><a href="terms-condition.php" class="circle-chevron position-absolute top-50 translate-middle-y hover-opacity-08" style="right: 10px"><i class="material-icons primary-text" style="font-size: 27px; width:25px; height:25px">
                                        chevron_right
                                    </i></a></li>
                        </ul>
                    </div>

                </div>
                <div class="d-none d-md-flex" style="height: 60px;">
                    <div class="vr bg-white opacity-07"></div>
                </div>
                <div class="padding-inline-5vw flex-1">
                    <div class=" d-flex align-items-center gap-3  position-relative">
                        <div class="svg-icon bg-white border-radius-50px d-flex align-items-center justify-content-center" style="width:46px; aspect-ratio: 1/1;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="31" height="27" viewBox="0 0 31 27" class=" primary-svg">
                                <path d="M17.448 23.685H17.0129V22.5027C17.0129 21.8981 16.521 21.4062 15.9164 21.4062H4.75303C4.14842 21.4062 3.65657 21.8981 3.65657 22.5027V23.685H3.22146C2.61685 23.685 2.125 24.1769 2.125 24.7815V25.8125C2.125 26.4171 2.61685 26.909 3.22146 26.909H5.92307C6.17311 26.909 6.37574 26.7063 6.37574 26.4562C6.37574 26.2062 6.17305 26.0035 5.92307 26.0035H3.22146C3.11609 26.0035 3.0304 25.9178 3.0304 25.8124V24.7814C3.0304 24.6761 3.11609 24.5904 3.22146 24.5904H17.4479C17.5533 24.5904 17.639 24.6761 17.639 24.7814V25.8124C17.639 25.9178 17.5533 26.0035 17.4479 26.0035H8.00705C7.75701 26.0035 7.55432 26.2062 7.55432 26.4562C7.55432 26.7063 7.75701 26.909 8.00705 26.909H17.4479C18.0525 26.909 18.5444 26.4171 18.5444 25.8125V24.7815C18.5444 24.177 18.0525 23.685 17.448 23.685ZM16.1075 23.685H4.56197V22.5027C4.56197 22.3973 4.64766 22.3117 4.75303 22.3117H15.9163C16.0217 22.3117 16.1074 22.3973 16.1074 22.5027V23.685H16.1075Z" />
                                <path d="M30.6007 22.6461C30.1043 22.1497 29.3187 22.1158 28.7819 22.5428L16.2776 10.0386C16.4385 9.77329 16.4499 9.44228 16.3122 9.16734L18.4793 7.0003L18.4953 7.01629C18.6654 7.18646 18.8916 7.28015 19.1322 7.28015C19.3729 7.28015 19.5991 7.18646 19.7692 7.01629L20.5795 6.20607C20.7496 6.03596 20.8433 5.80972 20.8433 5.56912C20.8433 5.32851 20.7496 5.10227 20.5795 4.93216L15.9112 0.263855C15.741 0.0936847 15.5148 0 15.2741 0C15.0335 0 14.8073 0.0936847 14.6372 0.263855L13.827 1.07401C13.6568 1.24418 13.5631 1.47037 13.5631 1.71103C13.5631 1.95163 13.6568 2.17788 13.827 2.34799L13.843 2.36398L11.6759 4.53101C11.3384 4.362 10.9163 4.41747 10.6352 4.69864L8.79204 6.54175C8.51087 6.82293 8.45546 7.24502 8.62442 7.58246L6.45738 9.74949L6.44133 9.73345C6.09015 9.38233 5.51865 9.38227 5.16741 9.73345L4.35714 10.5437C4.00595 10.8949 4.00595 11.4664 4.35714 11.8176L9.0255 16.486C9.20112 16.6616 9.43173 16.7494 9.66246 16.7494C9.89312 16.7494 10.1239 16.6616 10.2995 16.4859L11.1097 15.6757C11.4609 15.3245 11.4609 14.753 11.1097 14.4017L11.0936 14.3857L13.2607 12.2187C13.3874 12.2821 13.5257 12.3145 13.6644 12.3144C13.8265 12.3144 13.9882 12.2701 14.1313 12.1834L26.6361 24.6883C26.4437 24.9295 26.3386 25.2262 26.3386 25.5393C26.3386 25.9049 26.4809 26.2486 26.7394 26.5071C27.0063 26.7739 27.3568 26.9073 27.7072 26.9073C28.0577 26.9073 28.4082 26.7739 28.675 26.5071L30.6006 24.5816C30.8591 24.3231 31.0014 23.9794 31.0014 23.6138C31.0014 23.2482 30.8591 22.9046 30.6007 22.6461ZM15.2741 0.907293L19.936 5.56918L19.1323 6.37291L14.4705 1.71103L15.2741 0.907293ZM14.4832 3.0042L16.1611 4.68217L17.8391 6.36014L15.7048 8.49429L12.349 5.13842L14.4832 3.0042ZM9.66252 15.8426L5.00063 11.1807L5.80437 10.377L10.4663 15.0389L9.66252 15.8426ZM13.6645 11.4078L11.9679 9.7111C11.7911 9.53433 11.5044 9.53433 11.3276 9.7111C11.1508 9.88787 11.1508 10.1746 11.3276 10.3513L12.5878 11.6114L10.4535 13.7457L7.09761 10.3898L9.23182 8.25557L9.83226 8.85601C10.009 9.03278 10.2957 9.03278 10.4725 8.85601C10.6493 8.67924 10.6493 8.39255 10.4725 8.21578L9.43554 7.17877L11.2722 5.34214L15.5011 9.57115L13.6645 11.4078ZM14.7905 11.5623L15.6557 10.6971L28.1349 23.1763L27.7023 23.6089L27.2696 24.0415L14.7905 11.5623ZM29.9605 23.9415L28.0349 25.867C27.8543 26.0476 27.5604 26.0476 27.3797 25.867C27.2922 25.7795 27.244 25.6632 27.244 25.5394C27.244 25.4157 27.2922 25.2994 27.3797 25.2119L29.3053 23.2863C29.3956 23.196 29.5142 23.1509 29.6328 23.1509C29.7515 23.1509 29.8701 23.196 29.9604 23.2863C30.141 23.467 30.141 23.7609 29.9605 23.9415Z" />
                                <path d="M3.25097 9.27205C3.33938 9.36046 3.45523 9.40467 3.57108 9.40467C3.68693 9.40467 3.80277 9.36046 3.89119 9.27205C4.06802 9.09528 4.06802 8.8086 3.89119 8.63183L2.69081 7.43145C2.51404 7.25462 2.22742 7.25462 2.05059 7.43145C1.87376 7.60822 1.87376 7.89484 2.05059 8.07167L3.25097 9.27205Z" />
                                <path d="M2.55918 11.014C2.60945 10.7691 2.45169 10.5298 2.20674 10.4796L0.543818 10.1383C0.299103 10.0879 0.059597 10.2458 0.00933392 10.4907C-0.0409291 10.7356 0.116824 10.9749 0.361781 11.0252L2.0247 11.3665C2.0554 11.3728 2.08599 11.3758 2.1162 11.3758C2.3267 11.3758 2.51528 11.2282 2.55918 11.014Z" />
                                <path d="M5.10845 7.5798C5.15241 7.79405 5.34093 7.94157 5.55143 7.94157C5.58159 7.94157 5.61223 7.93854 5.64293 7.93225C5.88783 7.88198 6.04564 7.64272 5.99538 7.39776L5.65407 5.73484C5.60387 5.48995 5.36443 5.33207 5.11959 5.3824C4.87469 5.43266 4.71688 5.67192 4.76714 5.91682L5.10845 7.5798Z" />
                            </svg>
                        </div>
                        <div>
                            <a href="privacy-policy.php" class=" font-weight-600 text-white hover-opacity-08 d-block">Privacy Policies</a>
                            <small class=" text-white opacity-08 m-0">Last Updated: 12 August, 2021</small>
                        </div>
                        <ul>
                            <li><a href="privacy-policy.php" class="circle-chevron position-absolute top-50 translate-middle-y hover-opacity-08" style="right: 10px;"><i class="material-icons primary-text" style="font-size: 27px; width:25px; height:25px">
                                        chevron_right
                                    </i></a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="text-center">
            <h5 class=" font-18px font-weight-600">Still Nedd <span class=" primary-text">Help?</span></h5>
            <br>
            <ul>
                <li><a href="roamer-support.php" class=" btn btn-primary extra-btn-padding-50">Contact Us</a></li>
            </ul>
        </div>
    </div>

   @endsection
