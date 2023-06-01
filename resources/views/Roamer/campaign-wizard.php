@extends('layouts.roamer')
@section('content')

<div class="cover-all-content">
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3">
        <div>
            <h2 class="section-title mb-1">Product Submission</h2>
            <div class="d-flex align-items-center flex-wrap gap-3">
                <p class=" fst-italic font-15px m-0">Lifestyle You Need - 26th March - 4th April - (All Sellers)</p>
                <div class="registeration-progress-status border-radius-50px overflow-auto">
                    <p class="px-4">Registration In Progress</p>
                </div>
            </div>
        </div>
        <div>
            <form class="d-flex align-items-center gap-1 flex-wrap">
                <div class="form-group m-0">
                    <input type="text" class=" form-control" placeholder="Seller SKU">
                </div>
                <div class="form-group m-0">
                    <input type="text" class=" form-control" placeholder="Product Name">
                </div>
                <ul>
                    <li><a href="javascript:void(0)" class="btn btn-primary"><i class="material-icons">
                                search
                            </i></a></li>
                </ul>
            </form>
        </div>
    </div>
    <br>
    <br>
    <br>

    <div class="cover-inner-content">
        <!-- Nav tabs -->
        <div class="wizard-steps">
            <ul class="nav nav-pills step-item" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                        <span>1</span>
                        <p>Select Products</p>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                        <span>2</span>
                        <p>Fill in Campaign Price</p>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages" type="button" role="tab" aria-controls="messages" aria-selected="false">
                        <span>3</span>
                        <p>Submit</p>
                    </button>
                </li>
            </ul>
        </div>


        <!-- Tab panes -->
        <br>

        <div class="tab-content">
            <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="text-end">
                    <ul>
                        <li><a href="addProduct.php" class=" btn btn-primary extra-btn-padding-30 text-uppercase">Add Product</a></li>
                    </ul>
                </div>
                <div class="datatable-v1 style-pagination">
                    <table class="Product-Submission-table" data-ordering="false" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Selected</th>
                                <th>Sku ID</th>
                                <th>Seller SKU</th>
                                <th>Product Name</th>
                                <th>Category Name</th>
                                <th>Current Price</th>
                                <th>Campaign Price</th>
                                <th>Current Stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 0; $i < 4; $i++) { ?>
                                <tr>
                                    <td></td>
                                    <td>
                                        <div class="table-product-image d-flex align-items-center gap-3">
                                            <img src="assets/images/products/1.png" alt="">
                                            <div>
                                                <p>-------</p>
                                            </div>
                                        </div>


                                    </td>
                                    <td>
                                        <p>#12345</p>
                                    </td>
                                    <td>
                                        <p>Lorem ipsum</p>
                                    </td>
                                    <td>
                                        <p>Lorem Ipsum</p>
                                    </td>
                                    <td>
                                        <p>Fashion</p>
                                    </td>
                                    <td>
                                        <p>$50.00</p>
                                    </td>
                                    <td>
                                        <p>$500.00</p>
                                    </td>
                                    <td>
                                        <p>1000</p>
                                    </td>
                                </tr>
                            <?php } ?>


                        </tbody>

                    </table>
                </div>
                <br>
                <br>
                <br>
                <div class="text-center">
                    <ul>
                        <li><a href="#" class=" btn btn-primary extra-btn-padding-80 text-uppercase">Next</a></li>
                    </ul>
                </div>

            </div>
            <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <br>
                <br>
                <div class="table-v2">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>Selected</th>
                                <th>Sku ID</th>
                                <th>Seller SKU</th>
                                <th>Product Name</th>
                                <th>Category Name</th>
                                <th>Current Price</th>
                                <th>Campaign Price</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 0; $i < 4; $i++) { ?>
                                <tr>
                                    <td>
                                        <div class="table-product-image d-flex align-items-center gap-3 ">
                                            <img src="assets/images/products/1.png" alt="">
                                            <div>
                                                <p>-------</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p>#12345</p>
                                    </td>
                                    <td>
                                        <p>Lorem ipsum</p>
                                    </td>
                                    <td>
                                        <p>Lorem Ipsum</p>
                                    </td>
                                    <td>
                                        <p>Fashion</p>
                                    </td>
                                    <td>
                                        <p>$50.00</p>
                                    </td>
                                    <td>
                                        <form action="#">
                                            <input type="number" class=" form-control bg-transparent" placeholder="$45.00" style="width: 100px;">
                                        </form>
                                    </td>

                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
                <br>
                <br>
                <div class="text-center">
                    <ul>
                        <li><a href="#" class=" btn btn-primary extra-btn-padding-80 mb-4 text-uppercase">Next</a></li>
                        <li><a href="#" class=" default-black opacity-04 primary-hover-clr">Previous</a></li>
                    </ul>
                </div>
            </div>
            <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
                <br>
                <br>
                <div class="table-v2">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>Selected</th>
                                <th>Sku ID</th>
                                <th>Seller SKU</th>
                                <th>Product Name</th>
                                <th>Category Name</th>
                                <th>Current Price</th>
                                <th>Campaign Price</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 0; $i < 4; $i++) { ?>
                                <tr>
                                    <td>
                                        <div class="table-product-image d-flex align-items-center gap-3 ">
                                            <img src="assets/images/products/1.png" alt="">
                                            <div>
                                                <p>-------</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p>#12345</p>
                                    </td>
                                    <td>
                                        <p>Lorem ipsum</p>
                                    </td>
                                    <td>
                                        <p>Lorem Ipsum</p>
                                    </td>
                                    <td>
                                        <p>Fashion</p>
                                    </td>
                                    <td>
                                        <p>$50.00</p>
                                    </td>
                                    <td>
                                        <p class=" default-anchor opacity-1 font-weight-500">$45.00</p>
                                    </td>

                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
                <br>
                <br>
                <div class="text-center">
                    <ul>
                        <li><a href="#" class=" btn btn-primary extra-btn-padding-80 mb-4 text-uppercase">Register</a></li>
                        <li><a href="#" class=" default-black opacity-04 primary-hover-clr">Previous</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

   @endsection
    <script>
        $(document).ready(function() {
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
