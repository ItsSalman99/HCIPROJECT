@extends('layouts.roamer')
@section('content')

<div class="cover-all-content">
    <div class="d-flex align-items-center justify-content-between flex-wrap">
        <h2 class="section-title">Manage <span class="primary-text">Reviews</span></h2>
    </div>
    <br>
    <br>
    <div class="cover-inner-content">
        <div class="tabs-style-1 mt-4">
            <!-- Nav tabs -->
            <div class="tabs-links">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="tabv1-1-tab" data-bs-toggle="tab" data-bs-target="#tabv1-1" type="button" role="tab" aria-controls="tabv1-1" aria-selected="true">Product Reviews</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="tabv1-2-tab" data-bs-toggle="tab" data-bs-target="#tabv1-2" type="button" role="tab" aria-controls="tabv1-2" aria-selected="false">Roamer Reviews</button>
                    </li>
                </ul>
            </div>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="tabv1-1" role="tabpanel" aria-labelledby="tabv1-1-tab">
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
                                        <input type="radio" name="productReview" id="productreview1" checked>
                                        <label for="productreview1">All Reviews</label>
                                    </div>
                                </li>
                                <li><span class="vr"></span></li>
                                <li>
                                    <div class="checktext">
                                        <input type="radio" name="productReview" id="productreview2">
                                        <label for="productreview2">With images/videos</label>
                                    </div>
                                </li>
                                <li><span class="vr"></span></li>
                                <li>
                                    <div class="checktext">
                                        <input type="radio" name="productReview" id="productreview3">
                                        <label for="productreview3">With text</label>
                                    </div>
                                </li>
                                <li><span class="vr"></span></li>
                                <li>
                                    <div class="checktext">
                                        <input type="radio" name="productReview" id="productreview4">
                                        <label for="productreview4">Lower than 4 stars</label>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="datatable-v1 style-pagination">
                        <table class="myDataTable display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Order</th>
                                    <th>Content</th>
                                    <th>Product</th>
                                    <th>Rating</th>
                                    <th>Status</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for ($i = 0; $i < 20; $i++) { ?>
                                    <tr>
                                        <td style="    color: #0068E2;" class=" opacity-07">117302483376504</td>

                                        <td>
                                            <p class="opacity-05">Great seller</p>
                                            <p class="opacity-03">bazelqayyum (25 Mar 2021)</p>
                                        </td>
                                        <td style="color: #0068E2;" class=" opacity-07">
                                            Camel Brown Swat DMS Military boots/ shoes - High ankle
                                        </td>
                                        <td>
                                            <ul class="d-flex align-items-center">
                                                <li><i class="material-icons star-clr">
                                                        grade
                                                    </i></li>
                                                <li><i class="material-icons star-clr">
                                                        grade
                                                    </i></li>
                                                <li><i class="material-icons star-clr">
                                                        grade
                                                    </i></li>
                                                <li><i class="material-icons star-clr">
                                                        grade
                                                    </i></li>
                                                <li><i class="material-icons star-clr">
                                                        grade
                                                    </i></li>
                                            </ul>
                                        </td>
                                        <td>
                                            <p class=" opacity-04">Not replied</p>
                                        </td>

                                        <td>
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
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="    color: #0068E2;" class=" opacity-07">117302483376504</td>

                                        <td>
                                            <p class="opacity-05">best quality still pinned to my waist coat...</p>
                                            <p class="opacity-03">bazelqayyum (25 Mar 2021)</p>
                                        </td>
                                        <td style="color: #0068E2;" class=" opacity-07">
                                            Camel Brown Swat DMS Military boots/ shoes - High ankle
                                        </td>
                                        <td>
                                            <ul class="d-flex align-items-center">
                                                <li><i class="material-icons star-clr">
                                                        grade
                                                    </i></li>
                                                <li><i class="material-icons star-clr">
                                                        grade
                                                    </i></li>
                                                <li><i class="material-icons star-clr">
                                                        grade
                                                    </i></li>
                                                <li><i class="material-icons star-clr">
                                                        grade
                                                    </i></li>
                                            </ul>
                                        </td>
                                        <td>
                                            <p class=" opacity-04">Not replied</p>
                                        </td>

                                        <td>
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
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="    color: #0068E2;" class=" opacity-07">117302483376504</td>

                                        <td>
                                            <p class="opacity-05">This product is not sent but money is paid...</p>
                                            <p class="opacity-03">bazelqayyum (25 Mar 2021)</p>
                                        </td>
                                        <td style="color: #0068E2;" class=" opacity-07">
                                            Camel Brown Swat DMS Military boots/ shoes - High ankle
                                        </td>
                                        <td>
                                            <ul class="d-flex align-items-center">
                                                <li><i class="material-icons star-clr">
                                                        grade
                                                    </i></li>
                                                <li><i class="material-icons star-clr">
                                                        grade
                                                    </i></li>
                                                <li><i class="material-icons star-clr">
                                                        grade
                                                    </i></li>

                                            </ul>
                                        </td>
                                        <td>
                                            <p class=" opacity-04">Not replied</p>
                                        </td>

                                        <td>
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
                                        </td>
                                    </tr>


                                <?php } ?>


                            </tbody>

                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="tabv1-2" role="tabpanel" aria-labelledby="tabv1-2-tab">
                    <div class="reviews-top-filter d-flex flex-wrap align-items-center gap-1 mb-3">
                        <div class="form-group m-0">
                            <input type="text" class="form-control" placeholder="Order Number">
                        </div>
                        <div class="form-group m-0">
                            <div class="custom-select" style="width:100%;">
                                <select class="form-control">
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
                                        <input type="radio" name="roamerReview" id="roamerReview1" checked>
                                        <label for="roamerReview1">All Reviews</label>
                                    </div>
                                </li>
                                <li><span class="vr"></span></li>
                                <li>
                                    <div class="checktext">
                                        <input type="radio" name="roamerReview" id="roamerReview2">
                                        <label for="roamerReview2">With images/videos</label>
                                    </div>
                                </li>
                                <li><span class="vr"></span></li>
                                <li>
                                    <div class="checktext">
                                        <input type="radio" name="roamerReview" id="roamerReview3">
                                        <label for="roamerReview3">With text</label>
                                    </div>
                                </li>
                                <li><span class="vr"></span></li>
                                <li>
                                    <div class="checktext">
                                        <input type="radio" name="roamerReview" id="roamerReview4">
                                        <label for="roamerReview4">Lower than 4 stars</label>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="datatable-v1 style-pagination">
                        <table class="display roamerReviewTable" data-ordering="false" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Order</th>
                                    <th>Review</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for ($i = 0; $i < 20; $i++) { ?>
                                    <tr>
                                        <td style="color: #0068E2;" class=" opacity-07">117302483376504</td>
                                        <td>
                                            <p class="opacity-05">Great seller</p>
                                            <p class="opacity-03">bazelqayyum (25 Mar 2021)</p>
                                        </td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>



                                <?php } ?>


                            </tbody>

                        </table>
                    </div>
                </div>

            </div>
        </div>



    </div>

   @endsection
