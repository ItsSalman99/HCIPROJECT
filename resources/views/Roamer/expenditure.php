@extends('layouts.roamer')
@section('content')

<div class="cover-all-content">
    <div class="d-flex align-items-center justify-content-between flex-wrap">
        <h2 class="section-title">Expenditure</h2>
    </div>
    <br>
    <br>
    <div class="cover-inner-content">
        <form action="">
            <div class="row">
                <div class="col-lg-7">
                    <div class="row g-2">
                        <div class="col-lg-4">
                            <div class="position-relative">
                                <input type="text" class=" form-control" placeholder="Roamer Number">
                                <span class=" fst-italic font-15px position-absolute top-50 translate-middle-y opacity-05" style="right: 10px;">#</span>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="position-relative">
                                <input type="text" class=" form-control" placeholder="Roamer Name">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="position-relative">
                                <input type="location" class=" form-control" placeholder="Roamer Location">
                                <span class=" fst-italic font-15px position-absolute top-50 translate-middle-y" style="right: 10px;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                        <path d="M8.0051 14.8325C4.23716 14.8325 1.17188 11.7672 1.17188 7.99924C1.17188 4.2313 4.23716 1.16602 8.0051 1.16602C11.773 1.16602 14.8383 4.2313 14.8383 7.99924C14.8383 11.7672 11.773 14.8325 8.0051 14.8325ZM8.0051 2.49933C4.97248 2.49933 2.50519 4.96662 2.50519 7.99924C2.50519 11.0319 4.97248 13.4991 8.0051 13.4991C11.0377 13.4991 13.505 11.0319 13.505 7.99924C13.505 4.96662 11.0377 2.49933 8.0051 2.49933Z" fill="#7B7B7B" />
                                        <path d="M7.99869 3.66661C7.63069 3.66661 7.33203 3.36794 7.33203 2.99995V0.666656C7.33203 0.298662 7.63069 0 7.99869 0C8.36668 0 8.66534 0.298662 8.66534 0.666656V2.99995C8.66534 3.36794 8.36668 3.66661 7.99869 3.66661Z" fill="#7B7B7B" />
                                        <path d="M15.332 8.6673H12.9987C12.6307 8.6673 12.332 8.36863 12.332 8.00064C12.332 7.63265 12.6307 7.33398 12.9987 7.33398H15.332C15.7 7.33398 15.9986 7.63265 15.9986 8.00064C15.9986 8.36863 15.7 8.6673 15.332 8.6673Z" fill="#7B7B7B" />
                                        <path d="M7.99869 16.0006C7.63069 16.0006 7.33203 15.7019 7.33203 15.3339V13.0006C7.33203 12.6326 7.63069 12.334 7.99869 12.334C8.36668 12.334 8.66534 12.6326 8.66534 13.0006V15.3339C8.66534 15.7019 8.36668 16.0006 7.99869 16.0006Z" fill="#7B7B7B" />
                                        <path d="M2.99995 8.6673H0.666656C0.298662 8.6673 0 8.36863 0 8.00064C0 7.63265 0.298662 7.33398 0.666656 7.33398H2.99995C3.36794 7.33398 3.66661 7.63265 3.66661 8.00064C3.66661 8.36863 3.36794 8.6673 2.99995 8.6673Z" fill="#7B7B7B" />
                                        <path d="M7.99997 9.99994C6.89732 9.99994 6 9.10262 6 7.99997C6 6.89732 6.89732 6 7.99997 6C9.10262 6 9.99994 6.89732 9.99994 7.99997C9.99994 9.10262 9.10262 9.99994 7.99997 9.99994ZM7.99997 7.33331C7.63264 7.33331 7.33331 7.63264 7.33331 7.99997C7.33331 8.36729 7.63264 8.66662 7.99997 8.66662C8.36729 8.66662 8.66662 8.36729 8.66662 7.99997C8.66662 7.63264 8.36729 7.33331 7.99997 7.33331Z" fill="#7B7B7B" />
                                    </svg></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <br>
        <br>
        <br>
        <div class=" padding-inline-2vw">
            <div class="Expenditure-image-area border-bottom d-flex align-items-center flex-wrap justify-content-between pb-4 mb-4 gap-4">
                <div class="d-flex align-items-center flex-wrap gap-4">
                    <img src="assets/images/user.jpg" alt="image">
                    <div>
                        <p>#123458</p>
                        <h5 class=" primary-text font-weight-700">John Doe</h5>
                        <p class="d-inline-block opacity-07">Total Expenditure </p> <span class=" font-weight-700 opacity-06 font-17px">87k</span>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2 ms-auto flex-wrap justify-content-center">
                    <div class="btn-group expenditure-btn">
                        <button type="button">Expended <i class="bi bi-chevron-down"></i></button>
                        <button type="button" class="dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end border-radius-5px">
                            <div>
                                <form action="#">
                                    <p class="mb-2 opacity-06 text-capitalize">Add amount Expenditure</p>
                                    <div class="form-group">
                                        <input type="text" class=" form-control" placeholder="Product">
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="number" class=" form-control" placeholder="14k (Expenditure)">
                                    </div>
                                    <br>
                                    <ul class=" d-flex align-items-center justify-content-end gap-3">
                                        <li><a href="#" class=" default-black opacity-04 font-12px">Cancel</a></li>
                                        <li><a href="#" class="btn btn-primary extra-btn-padding-30 py-2 font-12px">Add</a></li>
                                    </ul>
                                </form>
                            </div>
                        </ul>
                    </div>
                    <!-- <i class="material-icons opacity-04">
                        more_vert
                    </i> -->
                    <div class="btn-group topup-btn">
                        <button type="button">Topped Up <i class="bi bi-chevron-down"></i></button>
                        <button type="button" class="dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end border-radius-5px">
                            <div>
                                <form action="#">
                                    <p class="mb-2 opacity-06 text-capitalize">Add amount topped up</p>
                                    <div class="form-group">
                                        <input type="text" class=" form-control" placeholder="Product">
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="number" class=" form-control" placeholder="14k (Topped Up)">
                                    </div>
                                    <br>
                                    <ul class=" d-flex align-items-center justify-content-end gap-3">
                                        <li><a href="#" class=" default-black opacity-04 font-12px">Cancel</a></li>
                                        <li><a href="#" class="btn btn-primary extra-btn-padding-30 py-2 font-12px">Add</a></li>
                                    </ul>
                                </form>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="datatable-v1 style-pagination">
                <table class="myDataTable display" data-ordering="false" style="width:100%">
                    <thead>
                        <tr>
                            <th>Order #</th>
                            <th>Product</th>
                            <th>Date</th>
                            <th>Expended</th>
                            <th>Balance</th>
                            <th>Topped Up</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 0; $i < 10; $i++) { ?>
                            <tr>
                                <td class=" opacity-07 font-weight-500">#A123GA</td>
                                <td class=" opacity-07 font-weight-500">New Year Campaign</td>
                                <td class=" opacity-07 font-weight-400">19 Jun 2018</td>
                                <td>
                                    <p class=" opacity-07 font-weight-500 d-inline-block">24k</p>
                                    <p class="font-weight-400 d-inline-block opacity-07">(Expenditure)</p>
                                </td>
                                <td class=" opacity-07">264K</td>
                                <td>
                                    <p class=" opacity-07 font-weight-500 d-inline-block">15k</p>
                                    <p class="font-weight-400 d-inline-block opacity-07">(Topped-Up)</p>
                                </td>
                            </tr>
                        <?php } ?>


                    </tbody>

                </table>
            </div>
        </div>


    </div>

   @endsection
