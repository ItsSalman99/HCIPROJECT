@extends('layouts.roamer')
@section('content')

<div class="cover-all-content">
    <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
        <h2 class="section-title">Manage <span class="primary-text">Vendor</span></h2>
        <ul>
            <li><a href="addNewVendor.php" class="btn btn-primary text-uppercase extra-btn-padding-25">Add New Vendor</a></li>
        </ul>
    </div>
    <br>
    <br>
    <div class="cover-inner-content">
        <div class="row mb-3">
            <div class="col-12 d-flex align-items-center flex-wrap gap-2">
                <div class="form-group m-0">
                    <select onchange="dropdownTip(this.value)" name="search_type" class=" form-control arrow-drop-down">
                        <option selected="" value="Today">Today</option>
                        <option value="This Month">This Month</option>
                        <option value="This Week">This Week</option>
                    </select>
                </div>
                <div class="form-group m-0 StartEndDate-v2">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-calendar4"></i>
                        <p class="mb-0 opacity-07 text-nowrap"><span id="result">Today</span> <span>-</span></p>

                    </div>
                    <input type="text" class="reviewStartDate" placeholder="Start Date">
                    <span>-</span>
                    <input type="text" class="reviewEndDate" placeholder="End Date">
                </div>
            </div>
        </div>
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
            <div class="col-lg-6 d-flex align-items-center justify-content-center justify-content-lg-end">
                <ul class="d-flex align-items-center flex-wrap justify-content-center justify-content-lg-end gap-3">
                    <li>
                        <div class="checktext">
                            <input type="radio" name="vendorcheck" id="Allvendor" checked>
                            <label for="Allvendor">All (480)</label>
                        </div>
                    </li>
                    <li><span class="vr"></span></li>
                    <li>
                        <div class="checktext">
                            <input type="radio" name="vendorcheck" id="goodvendor">
                            <label for="goodvendor">Good (400)</label>
                        </div>
                    </li>
                    <li><span class="vr"></span></li>
                    <li>
                        <div class="checktext">
                            <input type="radio" name="vendorcheck" id="badvendor">
                            <label for="badvendor">Bad (50)</label>
                        </div>
                    </li>
                    <li><span class="vr"></span></li>
                    <li>
                        <div class="checktext">
                            <input type="radio" name="vendorcheck" id="livevendor">
                            <label for="livevendor">Live (390)</label>
                        </div>
                    </li>
                    <li><span class="vr"></span></li>
                    <li>
                        <div class="checktext">
                            <input type="radio" name="vendorcheck" id="inactivevendor">
                            <label for="inactivevendor">Inactive (90)</label>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="datatable-v1 style-pagination">
            <table class="myDataTable display" data-ordering="true" style="width:100%">
                <thead>
                    <tr>
                        <th>Ratings</th>
                        <th>Vendor ID</th>
                        <th>Name</th>
                        <th>Nearby Market</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Profits</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < 50; $i++) { ?>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    <i class="material-icons star-clr">
                                        grade
                                    </i>
                                    <p class="opacity-07">5.0</p>
                                </div>
                                <p class=" opacity-04">100 Reviews</p>

                            </td>
                            <td class="  text-uppercase">
                                <p class="opacity-04">#a1234ga</p>
                            </td>
                            <td style="color: #0068E2">John Doe</td>
                            <td style="color: #0068E2">Lorem Ipsum Dolor Sit Amet</td>
                            <td>
                                <p class=" opacity-04">Shop # 123, Building Lorem Ipsum,
                                    Islamabad, Pakistan</p>
                            </td>
                            <td>
                                <p class=" opacity-04">Islamabad</p>
                            </td>
                            <td>
                                <p class=" opacity-04">12K</p>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="process-status">
                                        <p>Products List</p>
                                    </div>
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
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    <i class="material-icons star-clr">
                                        grade
                                    </i>
                                    <p class="opacity-07">3.9</p>
                                </div>
                                <p class=" opacity-04">100 Reviews</p>
                            </td>
                            <td class="  text-uppercase">
                                <p class="opacity-04">#a1234ga</p>
                            </td>
                            <td style="color: #0068E2">John Doe</td>
                            <td style="color: #0068E2">Lorem Ipsum Dolor Sit Amet</td>
                            <td>
                                <p class=" opacity-04">Shop # 123, Building Lorem Ipsum,
                                    Islamabad, Pakistan</p>
                            </td>
                            <td>
                                <p class=" opacity-04">Islamabad</p>
                            </td>
                            <td>
                                <p class=" opacity-04">12K</p>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="process-status">
                                        <p>Products List</p>
                                    </div>
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
                    <?php } ?>


                </tbody>

            </table>
        </div>


    </div>

   @endsection
    <script>
        function dropdownTip(value) {
            document.getElementById("result").innerHTML = value;
        }
    </script>
