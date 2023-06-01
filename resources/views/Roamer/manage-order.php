@extends('layouts.roamer')
@section('content')

<div class="cover-all-content">
    <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
        <h2 class="section-title">Manage <span class="primary-text">Orders</span></h2>
        <div class="d-flex align-items-center flex-wrap gap-1">
            <div class="form-group mb-0">
                <div class="custom-select select-icon" style="min-width:150px;     background: #f2f2f2;border: 1px solid #7b7b7b4a;">
                    <div class="icon">
                        <i class="bi bi-printer"></i>
                    </div>
                    <select>
                        <option value="0">Print</option>
                        <option value="1">Print 1</option>
                        <option value="1">Print 2</option>
                        <option value="1">Print 3</option>

                    </select>
                </div>
            </div>
            <div class="form-group mb-0">
                <div class="custom-select select-icon" style="min-width:150px;     background: #f2f2f2;border: 1px solid #7b7b7b4a;">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 13 13" fill="none">
                            <path d="M12.0943 7.24772C11.7154 7.24772 11.3804 7.49189 11.2636 7.8524C10.6319 9.80379 8.80026 11.2196 6.64107 11.2196C3.96048 11.2196 1.77955 9.03847 1.77955 6.35768C1.77955 4.20735 3.18369 2.38159 5.1231 1.74272C5.49758 1.61933 5.7513 1.2692 5.7513 0.874476C5.7513 0.594883 5.61751 0.332044 5.39159 0.16763C5.16566 0.00296444 4.87455 -0.0435049 4.60869 0.0420965C1.93814 0.902156 0 3.40524 0 6.35777C0 10.02 2.97907 12.9992 6.64105 12.9992C9.58176 12.9992 12.0764 11.0763 12.9458 8.42269C13.0352 8.14982 12.9883 7.85071 12.8198 7.61811C12.6516 7.38565 12.3819 7.24772 12.0943 7.24772Z" fill="#7B7B7B" />
                            <path d="M8.13505 1.73496C9.61129 2.21287 10.7795 3.37847 11.2609 4.85317C11.3808 5.22028 11.7227 5.46817 12.1089 5.46817H12.1273C12.4061 5.46817 12.6682 5.33482 12.8324 5.10954C12.9962 4.88427 13.0431 4.59382 12.9575 4.3284C12.3063 2.30343 10.708 0.701804 8.68471 0.0458156C8.41661 -0.041043 8.12251 0.00563205 7.89446 0.171349C7.66636 0.337295 7.53125 0.602351 7.53125 0.884458V0.903819C7.53116 1.28225 7.77528 1.6183 8.13505 1.73496Z" fill="#7B7B7B" />
                        </svg>
                    </div>
                    <select>
                        <option value="0">Set Status</option>
                        <option value="1">Set Status 1</option>
                        <option value="1">Set Status 2</option>
                        <option value="1">Set Status 3</option>

                    </select>
                </div>
            </div>
            <div class="form-group mb-0">
                <div class="custom-select select-icon" style="min-width:150px;     background: #f2f2f2;border: 1px solid #7b7b7b4a;">
                    <div class="icon">
                        <i class="bi bi-box-arrow-up"></i>
                    </div>
                    <select>
                        <option value="0">Export</option>
                        <option value="1">Export 1</option>
                        <option value="1">Export 2</option>
                        <option value="1">Export 3</option>

                    </select>
                </div>
            </div>
            <div class="form-group mb-0">
                <div class="custom-select select-icon" style="min-width:150px;     background: #f2f2f2;border: 1px solid #7b7b7b4a;">
                    <div class="icon">
                        <i class="bi bi-box-arrow-in-down"></i>
                    </div>
                    <select>
                        <option value="0">Import</option>
                        <option value="1">Import 1</option>
                        <option value="1">Import 2</option>
                        <option value="1">Import 3</option>

                    </select>
                </div>
            </div>
            <div class="form-group mb-0">
                <div class="custom-select select-icon" style="min-width:150px;     background: #f2f2f2;border: 1px solid #7b7b7b4a;">
                    <div class="icon">
                        <i class="bi bi-clock-history"></i>
                    </div>
                    <select>
                        <option value="0">View History</option>
                        <option value="1">history 1</option>
                        <option value="1">history 2</option>
                        <option value="1">history 3</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="cover-inner-content">
        <div class="reviews-top-filter d-flex flex-wrap align-items-center gap-1 mb-3">
            <div class="form-group m-0">
                <input type="text" class="form-control" placeholder="Order Number">
            </div>
            <div class="form-group m-0">
                <input type="text" class="form-control" placeholder="Product Name">
            </div>
            <div class="form-group m-0">
                <input type="text" class="form-control" placeholder="SKU">
            </div>
            <div class="form-group m-0">
                <input type="text" class="form-control" placeholder="Seller SKU">
            </div>
            <div class="form-group m-0">
                <div class="custom-select" style="width:100%;">
                    <select>
                        <option value="0">Content</option>
                        <option value="1">Standerd</option>
                        <option value="1">Pro</option>
                        <option value="1">Plus</option>
                    </select>
                </div>
            </div>

            <div class="form-group m-0">
                <div class="custom-select" style="width:100%;">
                    <select>
                        <option value="0">Status</option>
                        <option value="1">Not replied</option>
                        <option value="1">replied</option>
                    </select>
                </div>
            </div>
            <div class="form-group m-0">
                <div class="custom-select" style="width:100%;">
                    <select>
                        <option value="0">Rating</option>
                        <option value="1">up to 4</option>
                        <option value="1">up to 3</option>
                        <option value="1">up to 2</option>
                        <option value="1">up to 1</option>

                    </select>
                </div>
            </div>
            <div class="form-group m-0">
                <input type="text" class="form-control" placeholder="Delivery Option">
            </div>
            <div class="form-group m-0 StartEndDate-v1">
                <input type="text" class="reviewStartDate" placeholder="Start Date" />
                <input type="text" class="reviewEndDate" placeholder="- End Date" />
                <i class="bi bi-calendar4"></i>
            </div>
            <ul>
                <li><a href="javascript:void(0)" class="btn btn-primary"><i class="material-icons">
                            search
                        </i></a></li>
            </ul>

        </div>
        <br>
        <div class="row g-4">
            <div class="col-lg-3">
                <div class="custom-select" style="width:100%;">
                    <select>
                        <option value="0">Vendor wise</option>
                        <option value="1">Standerd</option>
                        <option value="1">Pro</option>
                        <option value="1">Plus</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-9 d-flex align-items-center justify-content-end">
                <ul class="d-flex align-items-center flex-wrap justify-content-center justify-content-lg-end gap-3">
                    <li>
                        <div class="checktext">
                            <input type="radio" name="orderchecked" id="orderfilter1" checked>
                            <label for="orderfilter1">All (480)</label>
                        </div>
                    </li>
                    <li><span class="vr"></span></li>
                    <li>
                        <div class="checktext">
                            <input type="radio" name="orderchecked" id="orderfilter2">
                            <label for="orderfilter2">Available</label>
                        </div>
                    </li>
                    <li><span class="vr"></span></li>
                    <li>
                        <div class="checktext">
                            <input type="radio" name="orderchecked" id="orderfilter3">
                            <label for="orderfilter3">Shipped</label>
                        </div>
                    </li>
                    <li><span class="vr"></span></li>
                    <li>
                        <div class="checktext">
                            <input type="radio" name="orderchecked" id="orderfilter4">
                            <label for="orderfilter4">Delivered</label>
                        </div>
                    </li>
                    <li><span class="vr"></span></li>
                    <li>
                        <div class="checktext">
                            <input type="radio" name="orderchecked" id="orderfilter5">
                            <label for="orderfilter5">Cancelled</label>
                        </div>
                    </li>
                    <li><span class="vr"></span></li>
                    <li>
                        <div class="checktext">
                            <input type="radio" name="orderchecked" id="orderfilter6">
                            <label for="orderfilter6">Failed Delivery</label>
                        </div>
                    </li>
                    <li><span class="vr"></span></li>
                    <li>
                        <div class="checktext">
                            <input type="radio" name="orderchecked" id="orderfilter7">
                            <label for="orderfilter7">Returned</label>
                        </div>
                    </li>
                    <li><span class="vr"></span></li>
                    <li>
                        <div class="checktext">
                            <input type="radio" name="orderchecked" id="orderfilter8">
                            <label for="orderfilter8">Received</label>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
        <div class="cover-table table-v2 overflow-hidden overflow-x-auto">
            <table class=" table align-middle" data-ordering="true" style="margin-bottom: 10px !important;">
                <thead>
                    <tr>
                        <th>&nbsp;</th>
                        <th style="opacity:1"><input type="checkbox" class=" form-check-input" onclick="checkall(this);"></th>
                        <th>Document</th>
                        <th>Order No.</th>
                        <th>Order date</th>
                        <th>Update Date</th>
                        <th>Vendor</th>
                        <th>Payment Method</th>
                        <th>Retail Price</th>
                        <th>Status</th>
                        <th>Printed</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($a = 0; $a < 3; $a++) { ?>
                        <tr>
                            <td><a href="#." class=" default-black table-row-collapse" data-bs-toggle="collapse" data-bs-target="#tablerow<?php echo $a ?>" aria-expanded="false" aria-controls="collapseOne">&nbsp;</a></td>
                            <td>
                                <input type="checkbox" class=" form-check-input">
                            </td>
                            <td>

                                <p class=" default-anchor opacity-1">Invoice</p>

                            </td>
                            <td>
                                <p class=" default-anchor opacity-1">343495662</p>
                            </td>
                            <td>
                                <p class="opacity-04">19 Jun 2018
                                    (17:11)</p>
                            </td>
                            <td>
                                <p class="opacity-04">19 Jun 2018
                                    (17:11)</p>
                            </td>
                            <td>
                                <p class=" opacity-04">Arsalan Khan</p>
                            </td>
                            <td>
                                <p class=" opacity-04">COD</p>
                            </td>
                            <td>
                                <p class=" opacity-04">$1029.00</p>
                            </td>
                            <td>
                                <div class="delivery-failed-status">
                                    <p>Delivery Failed</p>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <i class="material-icons close">
                                        close
                                    </i>
                                    <div class="cover-table-btn">
                                        <ul>
                                            <li class="dropdown position-relative">
                                                <a href="javascript:void(0)" class="dropdown-toggle caret-none" data-bs-toggle="dropdown" role="button" id="navbarDropdown"><i class="material-icons">
                                                        more_vert
                                                    </i></a>
                                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                                    <li>
                                                        <a href="#." class="dropdown-item">View Details</a>
                                                    </li>
                                                    <li>
                                                        <a href="manage-product-list.php" class="dropdown-item">Product List</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr id="tablerow<?php echo $a ?>" class="accordion-collapse collapse" aria-labelledby="headingOne">
                            <td colspan="11">
                                <table class="table align-middle" style="margin-top: 0 !important;">
                                    <thead>
                                        <tr>
                                            <th>Order No.</th>

                                            <th>Vendor</th>
                                            <th class=" primary-text">Retail Price</th>
                                            <th style="    width: 17%;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <p class=" default-anchor opacity-07">343495662-A</p>
                                            </td>
                                            <td>
                                                <p class=" opacity-04">Ipsum Dolar</p>
                                            </td>

                                            <td>
                                                <p class="  default-anchor opacity-07">$45.00</p>
                                            </td>
                                            <td>
                                                <div class="available-status">
                                                    <p>Available
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 8 8" fill="none" class="svg-icon">
                                                            <path d="M7.6875 4.71875C7.86009 4.71875 8 4.57884 8 4.40625V2.375C8 1.68575 7.43925 1.125 6.75 1.125H6.27561C6.14178 1.125 6.02289 1.03989 5.97977 0.913188L5.88522 0.635422C5.75584 0.255359 5.39919 0 4.99772 0H3.0013C2.60761 0 2.25325 0.248797 2.11955 0.619078L2.01137 0.918641C1.9668 1.04206 1.84869 1.125 1.71745 1.125H1.25C0.56075 1.125 0 1.68575 0 2.375V5.96875C0 6.658 0.56075 7.21875 1.25 7.21875H6.75C7.43925 7.21875 8 6.658 8 5.96875C8 5.79616 7.86009 5.65625 7.6875 5.65625C7.51491 5.65625 7.375 5.79616 7.375 5.96875C7.375 6.31337 7.09462 6.59375 6.75 6.59375H1.25C0.905375 6.59375 0.625 6.31337 0.625 5.96875V2.375C0.625 2.03038 0.905375 1.75 1.25 1.75H1.71745C2.11114 1.75 2.4655 1.5012 2.5992 1.13092L2.70738 0.831359C2.75195 0.707937 2.87006 0.625 3.0013 0.625H4.99772C5.13155 0.625 5.25042 0.710125 5.29356 0.836812L5.38811 1.11458C5.51747 1.49464 5.87413 1.75 6.27561 1.75H6.75C7.09462 1.75 7.375 2.03038 7.375 2.375V4.40625C7.375 4.57884 7.51491 4.71875 7.6875 4.71875Z" fill="white"></path>
                                                            <path d="M4.01562 2.0625C2.93867 2.0625 2.0625 2.93867 2.0625 4.01562C2.0625 5.09258 2.93867 5.96875 4.01562 5.96875C5.09258 5.96875 5.96875 5.09258 5.96875 4.01562C5.96875 2.93867 5.09258 2.0625 4.01562 2.0625ZM4.01562 5.34375C3.2833 5.34375 2.6875 4.74795 2.6875 4.01562C2.6875 3.2833 3.2833 2.6875 4.01562 2.6875C4.74795 2.6875 5.34375 3.2833 5.34375 4.01562C5.34375 4.74795 4.74795 5.34375 4.01562 5.34375Z" fill="white"></path>
                                                        </svg>
                                                    </p>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <br>
        <br>
        <br>
        <div class="d-flex align-items-center flex-wrap gap-3 justify-content-center justify-content-lg-between">
            <p class=" opacity-05 m-0">6 of 480</p>
            <div class="Cs-pagination">
                <ul>
                    <li><a href="javascript:void(0);" class="pe-none user-select-none"><i class="material-icons">keyboard_double_arrow_left</i></a></li>
                    <li><a href="javascript:void(0);" class="pe-none user-select-none"><i class="material-icons">chevron_left</i></a></li>
                    <li><a href="javascript:void(0);" class="Cs-activepagination">1</a></li>
                    <li><a href="javascript:void(0);">2</a></li>
                    <li><a href="javascript:void(0);">3</a></li>
                    <li><a href="javascript:void(0);">4</a></li>
                    <li><a href="javascript:void(0);">5</a></li>

                    <li><a href="javascript:void(0);" class=" pe-none user-select-none">...</a></li>
                    <li><a href="javascript:void(0);">10</a></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">chevron_right</i></a></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">keyboard_double_arrow_right</i></a></li>
                </ul>
            </div>
        </div>
        <!-- <div class="checkboxtable-responsive">
            <div class="datatable-v1 style-pagination ">
                <table class="orderdata-table" data-ordering="false" style="width:100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>Document</th>
                            <th>Order No.</th>
                            <th>Order date</th>
                            <th>Update Date</th>
                            <th>Vendor</th>
                            <th>Payment Method</th>
                            <th>Retail Price</th>
                            <th>Status</th>
                            <th>Printed</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 0; $i < 3; $i++) { ?>
                            <tr>
                                <td><a href="#." class=" default-black"><i class="bi bi-eye font-19px" data-bs-toggle="modal" data-bs-target="#orderDetailModalTable"></i></a></td>
                                <td></td>
                                <td>

                                    <p class=" default-anchor opacity-1">Invoice</p>

                                </td>
                                <td>
                                    <p class=" default-anchor opacity-1">343495662</p>
                                </td>
                                <td>
                                    <p class="opacity-04">19 Jun 2018
                                        (17:11)</p>
                                </td>
                                <td>
                                    <p class="opacity-04">19 Jun 2018
                                        (17:11)</p>
                                </td>
                                <td>
                                    <p class=" opacity-04">Arsalan Khan</p>
                                </td>
                                <td>
                                    <p class=" opacity-04">COD</p>
                                </td>
                                <td>
                                    <p class=" opacity-04">$1029.00</p>
                                </td>
                                <td>
                                    <div class="delivery-failed-status">
                                        <p>Delivery Failed</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <i class="material-icons close">
                                            close
                                        </i>
                                        <div class="cover-table-btn">
                                            <ul>
                                                <li class="dropdown position-relative">
                                                    <a href="javascript:void(0)" class="dropdown-toggle caret-none" data-bs-toggle="dropdown" role="button" id="navbarDropdown"><i class="material-icons">
                                                            more_vert
                                                        </i></a>
                                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                                        <li>
                                                            <a href="edit-product.php" class="dropdown-item">View Details</a>
                                                        </li>
                                                        <li>
                                                            <a href="manage-product-list.php" class="dropdown-item">Product List</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </div>
        </div> -->
    </div>

    <!-- Modal -->
    <div class="modal fade" id="orderDetailModalTable" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content ">
                <div class="card-body pt-4">
                    <div class="modal-header align-items-start">
                        <div>
                            <h5 class="card-title font-18px">Arsalan Khan</h5>
                            <h6><span class=" opacity-08">Order.</span> <span class="opacity-07 font-weight-400">343495662</span></h6>
                            <h6><span class=" opacity-08">Payment.</span> <span class="opacity-07 font-weight-400">COD</span></h6>

                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pb-4 pt-0">
                        <div class="table-v2 order-table">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th>Order No.</th>
                                        <th>Vendor</th>
                                        <th class=" primary-text opacity-1">Retail Price</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 0; $i < 15; $i++) { ?>
                                        <tr>
                                            <td>
                                                <p class=" default-anchor opacity-07">343495662-A</p>
                                            </td>
                                            <td>
                                                <p class=" opacity-04">Lorem Ipsum</p>
                                            </td>
                                            <td>
                                                <p class=" default-anchor opacity-07">$45.00</p>
                                            </td>
                                            <td>
                                                <div class="available-status">
                                                    <p>Available
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 8 8" fill="none" class="svg-icon">
                                                            <path d="M7.6875 4.71875C7.86009 4.71875 8 4.57884 8 4.40625V2.375C8 1.68575 7.43925 1.125 6.75 1.125H6.27561C6.14178 1.125 6.02289 1.03989 5.97977 0.913188L5.88522 0.635422C5.75584 0.255359 5.39919 0 4.99772 0H3.0013C2.60761 0 2.25325 0.248797 2.11955 0.619078L2.01137 0.918641C1.9668 1.04206 1.84869 1.125 1.71745 1.125H1.25C0.56075 1.125 0 1.68575 0 2.375V5.96875C0 6.658 0.56075 7.21875 1.25 7.21875H6.75C7.43925 7.21875 8 6.658 8 5.96875C8 5.79616 7.86009 5.65625 7.6875 5.65625C7.51491 5.65625 7.375 5.79616 7.375 5.96875C7.375 6.31337 7.09462 6.59375 6.75 6.59375H1.25C0.905375 6.59375 0.625 6.31337 0.625 5.96875V2.375C0.625 2.03038 0.905375 1.75 1.25 1.75H1.71745C2.11114 1.75 2.4655 1.5012 2.5992 1.13092L2.70738 0.831359C2.75195 0.707937 2.87006 0.625 3.0013 0.625H4.99772C5.13155 0.625 5.25042 0.710125 5.29356 0.836812L5.38811 1.11458C5.51747 1.49464 5.87413 1.75 6.27561 1.75H6.75C7.09462 1.75 7.375 2.03038 7.375 2.375V4.40625C7.375 4.57884 7.51491 4.71875 7.6875 4.71875Z" fill="white" />
                                                            <path d="M4.01562 2.0625C2.93867 2.0625 2.0625 2.93867 2.0625 4.01562C2.0625 5.09258 2.93867 5.96875 4.01562 5.96875C5.09258 5.96875 5.96875 5.09258 5.96875 4.01562C5.96875 2.93867 5.09258 2.0625 4.01562 2.0625ZM4.01562 5.34375C3.2833 5.34375 2.6875 4.74795 2.6875 4.01562C2.6875 3.2833 3.2833 2.6875 4.01562 2.6875C4.74795 2.6875 5.34375 3.2833 5.34375 4.01562C5.34375 4.74795 4.74795 5.34375 4.01562 5.34375Z" fill="white" />
                                                        </svg>
                                                    </p>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
   @endsection
    <script>
        function checkall(source) {
            var checkboxes = document.getElementsByClassName('form-check-input');
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i] != source)
                    checkboxes[i].checked = source.checked;
            }
        }
        $(document).ready(function() {
            $('.orderdata-table').DataTable({
                responsive: false,
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
                    targets: 1
                }],
                select: {
                    style: 'multiple',
                    selector: 'td:nth-child(2)'
                },
                order: [
                    [2, 'asc']
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
