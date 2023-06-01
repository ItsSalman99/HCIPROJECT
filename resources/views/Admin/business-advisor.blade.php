@extends('layouts.admin')
@section('content')
    <div class="cover-all-content">
        <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
            <h2 class="section-title mb-2 m-lg-0">Business <span class="primary-text">Advisor</span></h2>
        </div>
        <br>
        <br>
        <div class="cover-inner-content">
            <div class="tabs-style-1">
                <!-- Nav tabs -->
                <div class="tabs-links">
                    <ul class="nav nav-tabs align-items-center" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="tabv1-1-tab" data-bs-toggle="tab" data-bs-target="#tabv1-1"
                                type="button" role="tab" aria-controls="tabv1-1" aria-selected="true">
                                Dashboard
                            </button>
                        </li>
                        <li class="nav-item ms-auto d-none d-md-block" role="presentation">
                            <div class="d-flex align-items-center gap-3">
                                <p class="mb-0">Time Zone: GMT +5</p>
                                <div class="vr" style="height: 5px; margin-block: auto;"></div>
                                <p class="mb-0">Currency: PKR (PKR)</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="tabv1-1" role="tabpanel" aria-labelledby="tabv1-1-tab">
                        <div class="row g-2">
                            <div class="col-lg-6">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <p class=" opacity-07 font-weight-600">Announcement</p>
                                        <p class="m-0">Attention Sellers! You can now check your overall performance
                                            including the number of orders and income generated. Familiarize yourself with
                                            Business Advisor through the FAQ section.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <p class=" opacity-07 font-weight-600">Tips and Tricks</p>
                                        <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                            veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <form action="{{ route('admin.business.filter') }}" method="GET">
                                    <div class="d-flex align-items-center flex-wrap gap-2">
                                        <div class="form-group m-0">
                                            <select class="select-box" name="day" class=" form-control arrow-drop-down">-->
                                                <option value="">Select Day</option>
                                                <option value="today" <?php if(request()->day == "today") {echo 'selected';}  ?>>Today</option>
                                                <option value="week" <?php if(request()->day == "week") {echo 'selected';}  ?>>This Week</option>
                                                <option value="month" <?php if(request()->day == "month") {echo 'selected';}  ?>>This Month</option>
                                            </select>
                                        </div>
                                        <!--<div class="form-group m-0">-->
                                        <!--    <select class="select-box" name="vendor"-->
                                        <!--        class=" form-control arrow-drop-down">-->
                                        <!--        <option value="">Select Vendor</option>-->
                                        <!--        @foreach ($vendors as $item)-->
                                        <!--        <option value="{{ $item->id }}">{{ $item->name }}</option>-->
                                        <!--        @endforeach-->
                                        <!--    </select>-->
                                        <!--</div>-->
                                        <div class="form-group m-0 StartEndDate-v2">
                                            <div class="d-flex align-items-center gap-2">
                                                <i class="bi bi-calendar4"></i>
                                                <p class="mb-0 opacity-07 text-nowrap"><span>Date Wise</span>
                                                    <span>-</span>
                                                </p>

                                            </div>

                                            <input type="text" class="reviewStartDate" name="start_date"
                                                placeholder="Start Date">
                                            <span>-</span>
                                            <input type="text" class="reviewEndDate" name="end_date"
                                                placeholder="End Date">
                                            <button type="submit" class="btn btn-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                    <path
                                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class=" font-15px font-weight-500 mb-4">Best Performing <span
                                        class=" primary-text">Roamers</span></h4>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="vendor-performing-table">
                                            <table class=" table ">
                                                <thead>
                                                    <tr>
                                                        <th class=" font-weight-600 opacity-08">Products ranked by Price
                                                        </th>
                                                        <th># Of Products</th>
                                                        <th class="text-end">Total Profit</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach (bestRoamers($startDate, $endDate, $day) as $roamer)
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center flex-wrap gap-4">
                                                                    <div>
                                                                        <img src="{{ asset('assets/admin/images/user.jpg') }}"
                                                                            alt="user image" class=" border-radius-50px "
                                                                            style="width: 50px; aspect-ratio: 1/1; object-fit: cover;">
                                                                    </div>
                                                                    <div>
                                                                        <h6
                                                                            class=" primary-text opacity-1 font-weight-500 m-0 text-capitalize <?php if (Auth::user()->id == $roamer->id) {
                                                                                echo 'text-decoration-underline';
                                                                            } ?>">
                                                                            {{ $roamer->first_name . ' ' . $roamer->last_name }}
                                                                        </h6>
                                                                        <p>Since:{{ date('F, j Y', strtotime($roamer->created_at)) }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class=" opacity-06">{{ $roamer->product_count }}</td>
                                                            <td class="text-end opacity-06">
                                                                {{ number_format(calculateOrderSumAmount($roamer->id) - calculateTransactionExpenseCount($roamer->id)) }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <h4 class=" font-15px font-weight-500 mb-4">Product <span class=" primary-text">Board</span></h4>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row g-5">
                                            <div class="col-md-6">
                                                <div class="product-board-card">
                                                    <div
                                                        class="d-flex align-items-center justify-content-between border-bottom pb-4">
                                                        <p class=" opacity-07 font-weight-600 m-0">Products ranked by
                                                            Orders</p>
                                                        <p class="m-0">Orders</p>
                                                    </div>
                                                    <ul>
                                                        @foreach (productsByOrders($startDate, $endDate) as $item)
                                                            <li>
                                                                <div
                                                                    class=" d-flex align-items-start gap-5 justify-content-between">
                                                                    <div
                                                                        class="d-flex align-items-center flex-wrap flex-lg-nowrap gap-2">
                                                                        <img src="{{ asset($item->image1) }}"
                                                                            alt="">
                                                                        <a href="javascript:void(0)"
                                                                            onclick="getProduct({{ $item->id }})"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#viewProductModal"
                                                                            class=" default-anchor">{{ $item->name }}</a>
                                                                    </div>
                                                                    <p class="m-0">{{ $item->order_items_count }}</p>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="product-board-card">
                                                    <div
                                                        class="d-flex align-items-center justify-content-between border-bottom pb-4">
                                                        <p class=" opacity-07 font-weight-600 m-0">Products ranked by
                                                            Quantity </p>
                                                        <p class="m-0">Quantity</p>
                                                    </div>
                                                    <ul>
                                                        @foreach (productsByQuantity($startDate, $endDate) as $item)
                                                            <li>
                                                                <div
                                                                    class=" d-flex align-items-start gap-5 justify-content-between">
                                                                    <div
                                                                        class="d-flex align-items-center flex-wrap flex-lg-nowrap gap-2">
                                                                        <img src="{{ asset($item->image1) }}"
                                                                            alt="">
                                                                        <a href="javascript:void(0)"
                                                                            onclick="getProduct({{ $item->id }})"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#viewProductModal"
                                                                            class=" default-anchor">{{ $item->name }}</a>
                                                                    </div>
                                                                    <p class="m-0">
                                                                        {{ isset($item->varients) ? $item->varients->sum('qty') : $item->qty }}
                                                                    </p>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane " id="tabv1-3" role="tabpanel" aria-labelledby="tabv1-3-tab">
                        <div class="width-100 width-lg-70 mx-auto">
                            <h5 class=" font-15px">Frequently Asked <span class=" primary-text">Questions</span></h5>
                            <br>
                            <div class="according-style-1">
                                <div class="accordion" id="accordionExample">
                                    <?php for ($i = 1; $i <= 6; $i++) { ?>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header position-relative" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#according-st-2-<?php echo $i; ?>" aria-expanded="false"
                                                aria-controls="collapseOne">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit?
                                            </button>
                                            <ul class=" position-absolute top-50 translate-middle-y edit-pencil"
                                                style="right: 40px; z-index:10">
                                                <li><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#EditFaqModal">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" viewBox="0 0 16 16" fill="none">
                                                            <path
                                                                d="M15.0624 0.937688C14.4577 0.333 13.6538 0 12.7987 0C11.9436 0 11.1397 0.333 10.535 0.937656L1.58831 9.88441C1.51218 9.96053 1.45702 10.055 1.42815 10.1587L0.0228984 15.2074C-0.0376954 15.4252 0.0239608 15.6587 0.184242 15.8181C0.302992 15.9362 0.462117 16 0.625055 16C0.681992 16 0.73943 15.9922 0.795774 15.9762L5.84443 14.5421C6.05743 14.4816 6.22256 14.3129 6.27843 14.0986C6.33431 13.8843 6.27262 13.6565 6.11628 13.4996L2.9334 10.3071L10.3495 2.89097L13.1076 5.64903L7.43025 11.3109C7.18584 11.5546 7.18531 11.9503 7.42906 12.1947C7.67278 12.4392 8.06856 12.4397 8.31293 12.196L15.0623 5.46497C15.667 4.86031 16 4.05641 16 3.20131C16 2.34622 15.667 1.54231 15.0624 0.937688ZM4.48109 13.6299L1.52584 14.4694L2.35349 11.4959L4.48109 13.6299ZM14.1791 4.58047L13.9927 4.76638L11.2334 2.00709L11.419 1.82153C11.7875 1.45297 12.2775 1.25 12.7987 1.25C13.3199 1.25 13.8099 1.45297 14.1785 1.82156C14.547 2.19009 14.75 2.68009 14.75 3.20131C14.75 3.72253 14.547 4.21253 14.1791 4.58047Z"
                                                                fill="#E46C3F" />
                                                        </svg>
                                                    </a></li>
                                            </ul>
                                        </h2>
                                        <div id="according-st-2-<?php echo $i; ?>" class="accordion-collapse collapse"
                                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cupiditate
                                                    dolores excepturi perspiciatis? Earum dolorem amet dolorum explicabo
                                                    enim, id sapiente nulla, eius vero fuga molestiae ab libero repellendus,
                                                    unde suscipit!</p>
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

        </div>
        <!-- Modal -->
        <div class="modal fade" id="viewProductModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="card-body pt-4">
                        <div class="modal-header">
                            <h5 class="card-title font-18px">Product <span class=" primary-text">Details</span></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body py-4">
                            <form action="">
                                <div class="row align-items-center g-3 mb-3">
                                    <div class="col-lg-12">
                                        <label>Product Images</label>
                                    </div>
                                    <div class="col-lg-10 offset-md-2">
                                        <div class="d-flex align-items-center flex-wrap gap-2">
                                            <div class="upload-image-box-v1">
                                                <label for="productimage1">
                                                    <img id="pImage1" alt="">
                                                </label>
                                            </div>
                                            <div class="upload-image-box-v1">
                                                <label for="productimage2">
                                                    <img id="pImage2" alt="">
                                                </label>
                                            </div>
                                            <div class="upload-image-box-v1">
                                                <label for="productimage3">
                                                    <img id="pImage3" alt="">
                                                </label>
                                            </div>
                                            <div class="upload-image-box-v1">
                                                <label for="productimage4">
                                                    <img id="pImage4" alt="">
                                                </label>
                                            </div>
                                            <div class="upload-image-box-v1">
                                                <label for="productimage5">
                                                    <img id="pImage5" alt="">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="" class="mb-3">Product</label>
                                            <div class=" position-relative">
                                                <input type="text" class="productName form-control"
                                                    style="padding-right: 60px;" readonly>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" class="mb-3">Category</label>
                                            <div class=" position-relative">
                                                <input type="text" class="categoryName form-control"
                                                    style="padding-right: 60px;" readonly>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" class="mb-3">Brand</label>
                                            <div class=" position-relative">
                                                <input type="text" class="brandName form-control"
                                                    style="padding-right: 60px;" readonly>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" class="mb-3">Roamer</label>
                                            <div class=" position-relative">
                                                <input type="text" class="roamerName form-control"
                                                    style="padding-right: 60px;" readonly>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" class="mb-3">Vendor</label>
                                            <div class=" position-relative">
                                                <input type="text" class="vendorName form-control"
                                                    style="padding-right: 60px;" readonly>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="" class="mb-3">Prices</label>
                                            <div class=" position-relative" id="pricing">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @push('adminscript')
        <script>
            function getProduct(id) {
                $.ajax({
                    url: '/admin/business/getProduct/' + id,
                    method: 'GET',
                    success: function(response) {
                        $('#pImage1').attr('src', response.data.image1)
                        $('#pImage2').attr('src', response.data.image2)
                        $('#pImage3').attr('src', response.data.image3)
                        $('#pImage4').attr('src', response.data.image4)

                        $('.productName').val(response.data.name)
                        $('.categoryName').val(response.data.category.name)
                        $('.brandName').val(response.data.brand.name)
                        $('.roamerName').val(response.data.user.first_name + ' ' + response.data.user.last_name)
                        $('.vendorName').val(response.data.vendor.name)

                        $('#pricing').empty();
                        console.log(response.data.price);
                        if (response.data.price == "" || response.data.price == null) {
                            $.each(response.data.varients, function(key, value) {
                                console.log(value);
                                $('#pricing').append('<span class="badge rounded-pill text-bg-primary">' +
                                    value.price + '</span> ')
                            })
                        } else {
                            $('#pricing').append('<span class="badge rounded-pill text-bg-primary">' + response.data
                                .price + '</span> ')
                        }
                    }
                })
            }
        </script>
        <script type="text/javascript">
            var allEditors = document.querySelectorAll('.editor');
            for (var i = 0; i < allEditors.length; ++i) {
                ClassicEditor.create(allEditors[i]);

            }
            $('.Diagnosis-table').DataTable({
                responsive: true,
                searching: false,


                "ordering": false,

                "pagingType": "full_numbers",
                "language": {
                    "paginate": {
                        "first": "<i class='material-icons'>keyboard_double_arrow_left</i>",
                        "last": "<i class='material-icons'>keyboard_double_arrow_right</i>",
                        "next": "<i class='material-icons'>chevron_right</i>",
                        "previous": "<i class='material-icons'>chevron_left</i>"
                    },
                },
                "oLanguage": {
                    "sEmptyTable": "<div class='d-flex align-items-center justify-content-center gap-3'><i class='bi bi-info-circle opacity-02 font-30px'></i> Good job! No Product in this diagnosis.</div>"
                },
            })
        </script>
    @endpush
