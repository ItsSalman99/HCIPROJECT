@extends('layouts.roamer')
@section('content')

<div class="cover-all-content">
    <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
        <h2 class="section-title">Manage <span class="primary-text">Products List</span></h2>
        <ul>
            <li><a href="addProduct.php" class="btn btn-primary text-uppercase extra-btn-padding-35">Add New</a></li>
        </ul>
    </div>
    <br>
    <br>
    <div class="cover-inner-content">
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="d-flex align-items-center flex-wrap flex-lg-nowrap gap-1">
                    <input type="text" class="form-control" placeholder="Roamer ID">
                    <input type="text" class="form-control" placeholder="Roamer Name">
                    <input type="text" class="form-control" placeholder="City">
                    <ul>
                        <li><a href="javascript:void(0)" class="btn btn-primary"><i class="material-icons">
                                    search
                                </i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center justify-content-center justify-content-lg-end flex-wrap flex-lg-nowrap gap-1">
                <!-- <select name="" id="" class="form-control">
                    <option value="">Vendor wise</option>
                    <option value="">Vendor wise</option>
                    <option value="">Vendor wise</option>
                    <option value="">Vendor wise</option>
                </select> -->
                <div class="form-group">
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
                <div class="form-group">
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
                <div class="form-group">
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
        <br>
        <div class="row g-4">
            <div class="col-lg-3">
                <div class="form-group m-0 flex-fill">
                    <div class="custom-select" style="width:100%;">
                        <select>
                            <option value="0">Vendor wise</option>
                            <option value="1">Vendor 1</option>
                            <option value="1">Vendor 2</option>
                            <option value="1">Vendor 3</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 d-flex align-items-center justify-content-end">
                <ul class="d-flex align-items-center flex-wrap justify-content-center justify-content-lg-end gap-3">
                    <li>
                        <div class="checktext">
                            <input type="radio" name="vendorcheck" id="Allproduct" checked>
                            <label for="Allproduct">All (480)</label>
                        </div>
                    </li>
                    <li><span class="vr"></span></li>
                    <li>
                        <div class="checktext">
                            <input type="radio" name="vendorcheck" id="liveproduct">
                            <label for="liveproduct">Live (130)</label>
                        </div>
                    </li>
                    <li><span class="vr"></span></li>
                    <li>
                        <div class="checktext">
                            <input type="radio" name="vendorcheck" id="imagemissingproduct">
                            <label for="imagemissingproduct">Image Missing (0)</label>
                        </div>
                    </li>
                    <li><span class="vr"></span></li>
                    <li>
                        <div class="checktext">
                            <input type="radio" name="vendorcheck" id="poorqualityproduct">
                            <label for="poorqualityproduct">Poor Quality (230)</label>
                        </div>
                    </li>
                    <li><span class="vr"></span></li>
                    <li>
                        <div class="checktext">
                            <input type="radio" name="vendorcheck" id="soldoutproduct">
                            <label for="soldoutproduct">Sold Out (156)</label>
                        </div>
                    </li>
                    <li><span class="vr"></span></li>
                    <li>
                        <div class="checktext">
                            <input type="radio" name="vendorcheck" id="policyvoilationproduct">
                            <label for="policyvoilationproduct">Policy Voilation (60)</label>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="datatable-v1 style-pagination">
            <table class="myDataTable display" data-ordering="false" style="width:100%">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Seller SKU</th>
                        <th>Created</th>
                        <th>Vendor</th>
                        <th>Retail Price</th>
                        <th>Sale Price</th>
                        <th>Proc. Price</th>
                        <th>Lowest Price</th>
                        <th>Min. %</th>
                        <th>Available</th>
                        <th>Visible</th>
                        <th>Active</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < 10; $i++) { ?>
                        <tr>
                            <td>

                                <p class=" opacity-04">Black D*lta Boots
                                    (DMS)</p>

                            </td>
                            <td class="  text-uppercase">
                                <p class="opacity-04">5000</p>
                            </td>
                            <td>
                                <p class="opacity-04">2020-11-30</p>
                            </td>
                            <td>
                                <p class="opacity-04">Lorem Ipsum</p>
                            </td>
                            <td>
                                <p class=" opacity-04">$399.00</p>
                            </td>
                            <td>
                                <p class=" opacity-04">$399.00</p>
                            </td>
                            <td>
                                <p class=" opacity-04">$399.00</p>
                            </td>
                            <td>
                                <p class=" opacity-04">---</p>
                            </td>
                            <td>
                                <p class=" opacity-04">20.00%</p>
                            </td>
                            <td>
                                <p class=" opacity-04">11</p>
                            </td>
                            <td>
                                <p>
                                    <i class="material-icons close">
                                        close
                                    </i>
                                </p>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <label class="cswitch">
                                        <input class="cswitch--input" type="checkbox" checked /><span class="cswitch--trigger wrapper"></span>
                                    </label>
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
                        <tr>
                            <td>

                                <p class=" opacity-04">Black D*lta Boots
                                    (DMS)</p>

                            </td>
                            <td class="  text-uppercase">
                                <p class="opacity-04">5000</p>
                            </td>
                            <td>
                                <p class="opacity-04">2020-11-30</p>
                            </td>
                            <td>
                                <p class="opacity-04">Lorem Ipsum</p>
                            </td>
                            <td>
                                <p class=" opacity-04">$399.00</p>
                            </td>
                            <td>
                                <p class=" opacity-04">$399.00</p>
                            </td>
                            <td>
                                <p class=" opacity-04">$399.00</p>
                            </td>
                            <td>
                                <p class=" opacity-04">---</p>
                            </td>
                            <td>
                                <p class=" opacity-04">20.00%</p>
                            </td>
                            <td>
                                <p class=" opacity-04">11</p>
                            </td>
                            <td>
                                <p>
                                    <i class="material-icons done">
                                        done
                                    </i>
                                </p>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <label class="cswitch">
                                        <input class="cswitch--input" type="checkbox" /><span class="cswitch--trigger wrapper"></span>
                                    </label>
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

        <br>
        <br>
        <div class="totalrevenue">
            <div class="card width-100 width-lg-45 mx-auto">
                <div class="card-body ">
                    <div class="d-flex align-items-center flex-wrap gap-4">
                        <div class="flex-fill">
                            <h3 class="m-0 font-weight-400">472.00M</h3>
                            <p class="m-0">Revenue</p>
                            <div class="data-progressBar mt-4">
                                <small class="d-block text-end opacity-05 font-11px mb-1">20%</small>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <div class=" vr"></div>
                        <div class="flex-fill">
                            <h3 class="m-0 font-weight-400">127.00M</h3>
                            <p class="m-0">Revenue</p>
                            <div class="data-progressBar mt-4">
                                <small class="d-block text-end opacity-05 font-11px mb-1">50%</small>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

   @endsection
