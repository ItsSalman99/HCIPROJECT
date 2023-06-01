@extends('layouts.admin')


@section('content')
    <div class="cover-all-content">
        <div class="d-flex align-items-center justify-content-between flex-wrap">
            <h2 class="section-title">Add <span class="primary-text">Products</span></h2>

        </div>
        <br>
        <br>
        <div class="cover-inner-content">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" id="productForm">
                @csrf
                <div class="row g-3">
                    <div class="col-lg-8">
                        <div class="card mb-3">
                            <div class="card-body Horizontal-label white-bg-clr-02">
                                <h4 class="card-title font-17px">Basic <span class=" primary-text">Information</span></h4>
                                <br>
                                <div class="row align-items-center g-3 mb-3">
                                    <div class="col-lg-2">
                                        <label>Product Name</label>
                                    </div>
                                    <div class="col-lg-7 position-relative">
                                        <input type="text" class="form-control" name="name"
                                            placeholder="Ex. Nikon Coolpix A300 Digital Camera" style="padding-right: 50px"
                                            required>
                                        <span
                                            class=" position-absolute top-50 translate-middle-y opacity-04 font-weight-400 user-select-none font-12px"
                                            style="right: 16px;">0/25</span>
                                    </div>
                                </div>
                                <div class="row align-items-center g-3 mb-3">
                                    <div class="col-lg-2">
                                        <label>Category</label>
                                    </div>
                                    <div class="col-lg-7">
                                        {{-- id="example-with-maxHeight" --}}
                                        <select id="sleect_category" name="category_id" class="form-control" required>
                                            <option value="">Select Category</option>
                                            @foreach ($category as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="row align-items-center g-3 mb-3">
                                    <div class="col-lg-2">
                                        <label>Sub Category</label>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="" style="width:100%;">
                                            <select class="form-control" name="subcategory_id" id="subcategory_id">

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                @if (Auth::user()->user_type == 1)
                                    <div class="row align-items-center g-3 mb-3">
                                        <div class="col-lg-2">
                                            <label>Roamer</label>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="" style="width:100%;">
                                                <select class="select-box w-100" name="roamer_id" id="roamerId" required>
                                                    <option value="">Select Roamer</option>
                                                    @foreach ($user as $users)
                                                        <option value="{{ $users->id }}">
                                                            {{ $users->first_name . ' ' . $users->last_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row align-items-center g-3 mb-3">
                                        <div class="col-lg-2">
                                            <label>Vendor</label>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="" id="" style="width:100%;">
                                                <select class="form-control" name="vendor_id" id="vendor_list">
                                                    <option value="">Select Vendor</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <ul>
                                                <li>
                                                    <a href="javascript:void(0)" onclick="clickRoamer()"
                                                        data-bs-toggle="modal" data-bs-target="#vendorModal"
                                                        class="font-12px default-anchor">
                                                        Add Vendor
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @elseif(Auth::user()->user_type == 2)
                                    <div class="row align-items-center g-3 mb-3">
                                        <div class="col-lg-2">
                                            <label>Vendor</label>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="" id="" style="width:100%;">
                                                <select class="select-box form-control" name="vendor_id" id="vendor_list"
                                                    required="">
                                                    <option value="">
                                                        Select Vendor
                                                    </option>
                                                    @foreach ($roamer_vendors as $key => $vendor)
                                                        <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <ul>
                                                <li>
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        data-bs-target="#vendorModal" class="font-12px default-anchor">
                                                        Add Vendor
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                                <div class="row align-items-center g-3 mb-3">
                                    <div class="col-lg-2">
                                        <label>Brand</label>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="" style="width:100%;">
                                            <select class="select-box w-100" name="brand_id" id="brand_id" required>
                                                <option value="">Select Brand</option>
                                                @foreach ($brand as $bd)
                                                    <option value="{{ $bd->id }}">{{ $bd->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <ul class="d-flex align-items-center gap-2">
                                            <li>
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                    data-bs-target="#brandmodal" class="font-12px default-anchor">
                                                    Add Brand
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)" onclick="noBrand()" id="removeBrand"
                                                    class="font-12px default-anchor">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="red" class="bi bi-x-circle" viewBox="0 0 16 16">
                                                        <path
                                                            d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                        <path
                                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                    </svg>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                                <div class="row align-items-center g-3 mb-3">
                                    <div class="col-lg-12">
                                        <label>Product Images</label>
                                    </div>
                                    <div class="col-lg-10 offset-md-2">
                                        <div class="d-flex align-items-center flex-wrap gap-2">
                                            <div class="upload-image-box-v1">
                                                <label for="productimage1">
                                                    <i class="material-icons">
                                                        add
                                                    </i>
                                                    <p>Select Image</p>
                                                    <img id="pImage1" alt="">
                                                    <input type="file" id="productimage1" name="productimage1" hidden
                                                        onchange="document.getElementById('pImage1').src = window.URL.createObjectURL(this.files[0])"
                                                        required>
                                                </label>
                                            </div>
                                            <div class="upload-image-box-v1">
                                                <label for="productimage2">
                                                    <i class="material-icons">
                                                        add
                                                    </i>
                                                    <p>Select Image</p>
                                                    <img id="pImage2" alt="">
                                                    <input type="file" id="productimage2" name="productimage2" hidden
                                                        onchange="document.getElementById('pImage2').src = window.URL.createObjectURL(this.files[0])"
                                                        required>
                                                </label>
                                            </div>
                                            <div class="upload-image-box-v1">
                                                <label for="productimage3">
                                                    <i class="material-icons">
                                                        add
                                                    </i>
                                                    <p>Select Image</p>
                                                    <img id="pImage3" alt="">
                                                    <input type="file" id="productimage3" name="productimage3" hidden
                                                        onchange="document.getElementById('pImage3').src = window.URL.createObjectURL(this.files[0])"
                                                        required>
                                                </label>
                                            </div>
                                            <div class="upload-image-box-v1">
                                                <label for="productimage4">
                                                    <i class="material-icons">
                                                        add
                                                    </i>
                                                    <p>Select Image</p>
                                                    <img id="pImage4" alt="">
                                                    <input type="file" id="productimage4" name="productimage4" hidden
                                                        onchange="document.getElementById('pImage4').src = window.URL.createObjectURL(this.files[0])"
                                                        required>
                                                </label>
                                            </div>
                                            <div class="upload-image-box-v1">
                                                <label for="productimage5">
                                                    <i class="material-icons">
                                                        add
                                                    </i>
                                                    <p>Select Image</p>
                                                    <img id="pImage5" alt="">
                                                    <input type="file" id="productimage5" name="productimage5" hidden
                                                        onchange="document.getElementById('pImage5').src = window.URL.createObjectURL(this.files[0])"
                                                        required>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center g-3 mb-3">
                                    <div class="col-lg-2">
                                        <label>Flash Sale</label>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="" style="width:100%;">
                                            <input type="checkbox" name="flash_sale">
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center g-3 mb-3">
                                    <div class="col-lg-2">
                                        <label>Top Seller</label>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="" style="width:100%;">
                                            <input type="checkbox" name="top_seller">
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center g-3 mb-3">
                                    <div class="col-lg-2">
                                        <label>New Arrivals</label>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="" style="width:100%;">
                                            <input type="checkbox" name="new_arrivals">
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center g-3 mb-3">
                                    <div class="col-lg-2">
                                        <label>Tags:</label>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="" style="width:100%;">
                                            <select class="select-box-tags form-control" name="tags[]" multiple>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title font-17px">Detailed <span class=" primary-text">Description</span>
                                </h4>
                                <br>
                                <div class="cover-product-description">
                                    <div class="row g-3 align-items-center mb-3">
                                        <div class="col-lg-2">
                                            <label for="" class=" font-weight-600">Short Description</label>
                                        </div>
                                        <div class="col-lg-10">
                                            <textarea class="editor" name="short_description" placeholder="Type here..." required></textarea>

                                        </div>
                                    </div>
                                    <div class="row g-3 align-items-center mb-3">
                                        <div class="col-lg-2">
                                            <label for="" class=" font-weight-600">Urdu Description</label>
                                        </div>
                                        <div class="col-lg-10">
                                            <textarea class="editor" name="urdu_description" placeholder="Type here..." required></textarea>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-items-center mb-3">
                                        <div class="col-lg-2">
                                            <label for="" class=" font-weight-600">English
                                                Description</label>
                                        </div>
                                        <div class="col-lg-10">
                                            <textarea class="editor" name="english_description" placeholder="Type here..." required=""></textarea>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-items-center">
                                        <div class="col-lg-2">
                                            <label for="" class=" font-weight-600">What's in the box
                                            </label>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class=" position-relative">
                                                <input type="text" name="box_include" class="form-control"
                                                    placeholder="" style="padding-right: 50px" required>
                                                <span
                                                    class=" position-absolute top-50 translate-middle-y opacity-04 font-weight-400 user-select-none font-12px"
                                                    style="right: 16px;">0/25</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="card position-sticky" style="top: 10px;">
                            <div class="card-body lgray-bg-1 tipcard">
                                <div class="product-wizar">
                                    <ul>
                                        <li class="active"><a href="#">Basic Information</a></li>
                                        <li><a href="#">Detailed Description</a></li>
                                        <li><a href="#">Price & Stock</a></li>
                                        <li><a href="#">Service & Delivery</a></li>
                                    </ul>
                                </div>
                                <br>
                                <h6>Tips</h6>
                                <p class=" mb-4">Please make sure the title is optimized and the category is selected
                                    correctly.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card mb-3">
                            <div class="card-body hite-bg-clr-02">
                                <h4 class="card-title font-17px">Price <span class=" primary-text">& Stock</span></h4>
                                <br>
                                <div class="d-flex align-items-center flex-wrap gap-4 mb-3">
                                    <label class="" for="form-field-6"> Product Type <span
                                            class="text-danger">*</span> </label>
                                    <div class="form-group m-0 width-100 width-md-40">
                                        <div class="form-group">

                                            <select id="product_type" onchange="check_type(this.value)"
                                                class="form-control" required="" name="product_type">
                                                <option value="0">Single
                                                    Product</option>
                                                <option value="1" @if (isset($product) && $product->product_type == 1) selected @endif>
                                                    Variable Product</option>
                                            </select>
                                            <i class="form-group__bar"></i>
                                        </div>
                                        {{-- <input type="text" class="form-control" placeholder="Please Input"> --}}
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-12">

                                </div>
                                <div id="variant_sec" class="container">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                @if (isset($product) && $product->product_type == 1)
                                                    <?php $vari_style = unserialize($product->variant_style); ?>
                                                @endif
                                                <label class="" for="form-field-6"> Products Variant <span
                                                        class="text-danger">*</span>
                                                </label>
                                                <select id="variant_select" onchange="checker(this.value)"
                                                    class="form-control select-box-tags" multiple="multiple"
                                                    name="variant_style[]">
                                                    @if (isset($attributes))
                                                        @foreach ($attributes as $key => $attri)
                                                            <option value="{{ $attri->id }}"
                                                                data-stock="{{ $attri->stock }}">
                                                                {{ $attri->label }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <i class="form-group__bar"></i>
                                                <div class="btn-demo">
                                                    <button type="button" class="btn btn-outline-primary my-4"
                                                        id="add_attribute">Clear</button>
                                                </div>
                                                <i class="form-group__bar"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="btn-demo" id="add_button">
                                                    <button type="button" class="btn btn-outline-primary"
                                                        id="addmore">Add More</button>
                                                    {{-- id="addnewrow" --}}
                                                </div>
                                            </div>
                                            <span class="text-danger pPrice_error"></span>
                                        </div>
                                    </div>
                                    <div id="new_body" class=" table-res">
                                        @if (isset($body))
                                            <?php echo html_entity_decode($body); ?>
                                        @endif
                                    </div>
                                </div>
                                <div id="single_sec" class="container">
                                    <div class="form-group">
                                        <label class="" for="form-field-6"> SKU </label>
                                        <input id="sku" type="text" class="form-control" name="sku"" />
                                        <i class="form-group__bar"></i>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="" for="form-field-6"> Price <span
                                                        class="text-danger">*</span> </label>
                                                <input id="uprice" type="number" class="form-control"
                                                    name="unit_price" onchange="validatePprice(this.value)"
                                                    required="" />
                                                <i class="form-group__bar"></i>
                                            </div>
                                            <div class="form-group">
                                                <label class="" for="form-field-6"> Special Price</label>
                                                <input type="number" id="spPrice" min="0" class="form-control"
                                                    name="unit_s_price" />
                                                <i class="form-group__bar"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="" for="form-field-6"> Procurement Price <span
                                                        class="text-danger">*</span>
                                                    <span class="text-danger pprice_error">
                                                    </span>
                                                </label>
                                                <input id="pprice" type="number" class="form-control"
                                                    name="unit_p_price" required="" />
                                                <i class="form-group__bar"></i>
                                            </div>
                                            <div class="form-group">
                                                <label class="" for="form-field-6"> Quantity <span
                                                        class="text-danger">*</span>
                                                </label>
                                                <input type="number" class="form-control" required=""
                                                    name="unit_qty" required="" />
                                                <i class="form-group__bar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body hite-bg-clr-02">
                                <h4 class="card-title font-17px">Service <span class=" primary-text">& Delivery</span>
                                </h4>
                                <br>
                                <div class="form-group">
                                    <label for="" class=" font-weight-600">Service</label>
                                    <div class="d-block d-lg-flex align-items-center flex-wrap mb-3 gap-1">
                                        <label class="mb-3 mb-lg-0 d-flex align-items-center gap-2 col-lg-3">Warranty Type
                                            <ul>
                                                <li><a href="javascript:void(0)" class="infobar" data-bs-toggle="tooltip"
                                                        title="Some tooltip text!"><i class="material-icons">
                                                            question_mark
                                                        </i></a></li>
                                            </ul>
                                        </label>
                                        <div class="form-group m-0 col-lg-7">
                                            <div class="custom-select" style="width:100%;">
                                                <select id="warranty_name" name="warranty_name" required="">
                                                    <option value="0"> Warranty Type</option>
                                                    @foreach ($warranty as $types)
                                                        <option value="{{ $types->id }}">{{ $types->warranty_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class=" font-weight-600">Delivery</label>
                                    <div class="d-block d-lg-flex align-items-center flex-wrap mb-3 gap-1">
                                        <label
                                            class="mb-3 mb-lg-0 mb-lg-0 d-flex align-items-center gap-3 col-lg-3">Package
                                            Weight (kg)<ul>
                                                <li><a href="javascript:void(0)" class="infobar" data-bs-toggle="tooltip"
                                                        title="Product Package Weight!"><i class="material-icons">
                                                            question_mark
                                                        </i></a></li>
                                            </ul></label>
                                        <div class="form-group m-0 col-lg-7">
                                            <input type="text" name="pkg_weight" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="d-block d-lg-flex align-items-center flex-wrap mb-3">
                                        <label
                                            class="mb-3 mb-lg-0 mb-lg-0 d-flex align-items-center gap-3 col-lg-3">Package
                                            Dimensions (cm)</label>
                                        <div class="form-group m-0 col-lg-7">
                                            <div class="d-flex flex-wrap gap-2">
                                                <input type="text" name="length" class="form-control"
                                                    placeholder="Length (cm)" required="">
                                                <input type="text" name="width" class="form-control"
                                                    placeholder="Width (cm)" required="">
                                                <input type="text" name="height" class="form-control"
                                                    placeholder="Height (cm)" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <ul class="d-flex align-items-center justify-content-center flex-wrap gap-3">
                            <li>
                                <button id="saveProduct" class="btn btn-primary extra-btn-padding-80 text-uppercase"
                                    type="submit" value="submit">Submit</button>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-4">
                        <div class="card position-sticky" style="top:10px">
                            <div class="card-body lgray-bg-1 tipcard">
                                <h6>Tips</h6>
                                <p>Procurement price should be exact. If procurement price is somehow found to be different
                                    than mentioned, Roamer may not only be penalized but he may lose his job as well.
                                    Character precedes everything else.</p>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="addcategorymodal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="card-body pt-4">
                        <div class="modal-header">
                            <h5 class="card-title font-18px">Add <span class=" primary-text">Category</span></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body py-4">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="" class="mb-3">Category</label>
                                    <div class=" position-relative">
                                        <input type="text" placeholder="Define Category" class=" form-control"
                                            style="padding-right: 60px;">
                                        <a href="javascript:void(0)"
                                            class=" position-absolute top-50 translate-middle-y text-decoration-underline font-10px"
                                            style="right: 15px; font-weight: 400;">View List</a>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="" class="mb-3">Sub - Category</label>
                                    <div class=" position-relative">
                                        <input type="text" placeholder="Define Category" class=" form-control"
                                            style="padding-right: 60px;">
                                        <a href="javascript:void(0)"
                                            class=" position-absolute top-50 translate-middle-y text-decoration-underline font-10px"
                                            style="right: 15px; font-weight: 400;">View List</a>
                                    </div>
                                </div>
                                <div class="text-center mt-5">
                                    <button class="btn btn-primary extra-btn-padding-45 text-uppercase">Add To
                                        list</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="brandmodal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="card-body pt-4">
                        <div class="modal-header">
                            <h5 class="card-title font-18px">Add <span class=" primary-text">New Brand</span></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body py-4">
                            <form id="addBrandForm">
                                @csrf
                                <div class="card border-0">
                                    <div class="card-body p-0 brandbanner">
                                        <div class="upload-image-box-v1">
                                            <label for="BBigImage1" class="BBigImage" style="width: 100%; height: 280px">
                                                <img alt="image" id="bigBannerImage1">
                                                <input type="file" name="cover_image" id="BBigImage1" hidden required
                                                    onchange="document.getElementById('bigBannerImage1').src = window.URL.createObjectURL(this.files[0])">
                                                <i class="bi bi-camera-fill font-40px opacity-05"
                                                    style="color: inherit;"></i>
                                                <p>Upload Your Image
                                                </p>
                                                <p class=" fst-italic">(900 x 280)</p>
                                            </label>
                                        </div>
                                        <div class="upload-image-box-v1">
                                            <label for="brandLogo1" class="brandLogo bg-white"
                                                style="width: 168px; margin-top: -92px; left: 6%;">
                                                <img alt="" id="brandLogoImg1" class="uploadimage">
                                                <input type="file" name="image" id="brandLogo1" hidden required
                                                    onchange="document.getElementById('brandLogoImg1').src = window.URL.createObjectURL(this.files[0])">
                                                <i class="bi bi-camera-fill font-40px opacity-05"
                                                    style="color: inherit;"></i>
                                                <p>Upload Your logo
                                                </p>
                                                <p class=" fst-italic"> (250 x 250)</p>
                                            </label>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>

                                    <h4 class="card-title">Define your <span class="primary-text">brand</span></h4>
                                    <br>
                                    <div class="form-group">
                                        <input type="text" class=" form-control" name="name"
                                            placeholder="Brand Name " required="">
                                    </div>
                                    <br>
                                </div>
                                <div class="text-center mt-5">
                                    <button type="submit" id="brandModalBtn"
                                        class="btn btn-primary extra-btn-padding-45 text-uppercase">
                                        Add Brand
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="vendorModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="card-body pt-4">
                        <div class="modal-header">
                            <h5 class="card-title font-18px">Vendor <span class=" primary-text">Details</span></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body py-4">
                            <form id="submitVendorForm">
                                @csrf
                                <div class="row g-2">
                                    <div class="<?php Auth::user()->user_type == 1 ? 'col-md-6' : 'col-md-12'; ?>">

                                        <div class="form-group">
                                            <label>Vendor Name</label>
                                            <input type="text" name="vendor_name" class="form-control" placeholder=""
                                                value="" required="">
                                        </div>
                                    </div>
                                    @if (Auth::user()->user_type == 1)
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Select Roamer</label>
                                                <div class="position-relative">
                                                    <select class="form-control" id="RoamerID" name="roamer_id"
                                                        required>
                                                        <option value="0">
                                                            Select Roamer
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="form-group">
                                            <input hidden value="{{ Auth::user()->id }}" name="roamer_id">
                                        </div>
                                    @endif
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Shop Name</label>
                                            <input type="text" name="shop_name" class="form-control" placeholder=""
                                                required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>Nearby Market</label>
                                            <input type="text" name="nearby_market" class="form-control"
                                                placeholder="" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Contact #01.</label>
                                            <input type="text" name="contact1" class="form-control" placeholder=""
                                                required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Contact #02.</label>
                                            <input type="text" class="form-control" name="contact2" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Contact #03.</label>
                                            <input type="text" class="form-control" placeholder="" name="contact3"
                                                required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Contact #04.</label>
                                            <input type="text" class="contact form-control" name="contact4"
                                                required="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="address" class="form-control" name="address" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Holiday Mode</label>
                                            <label class="cswitch">
                                                <input class="cswitch--input holiday" value="1" type="checkbox" />
                                                <span class="cswitch--trigger wrapper">

                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="btn btn-primary">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @push('adminscript')
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
            <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>


            <script>
                function noBrand() {
                    if($('#brand_id').is(":disabled") == true)
                    {
                        $('#brand_id').attr('disabled', false);
                    }
                    else{

                        $('#brand_id').attr('disabled', true);
                    }
                }
            </script>

            <script>
                $(document).ready({
                    $('#vendor_list').empty();
                    $.ajax({
                        type: "GET",
                        url: '/admin/vendor/getAll',
                        dataType: 'json',
                        success: function(response) {
                            $('#vendor_list').append('<option>Select Vendors</option>');
                            $.each(response.data, function(key, value) {
                                $('#vendor_list').append('<option value="' + value.id + '">' + value
                                    .name + '</option>');
                            })
                        }
                    });
                })
            </script>

            <script>
                function clickRoamer() {
                    $('#RoamerID').empty();
                    $.ajax({
                        url: '/admin/roamer/getAll',
                        method: 'GET',
                        success: function(response) {
                            $('#RoamerID').append('<option value="0">Select Roamer</option>')
                            $.each(response.data, function(key, value) {
                                $('#RoamerID').append('<option value="' + value.id + '">' + value.first_name +
                                    ' ' + value.first_name + '</option>')

                            })
                            $('#vendor_list').empty();
                            $.ajax({
                                type: "GET",
                                url: '/admin/vendor/getAll',
                                dataType: 'json',
                                success: function(response) {
                                    $('#vendor_list').append('<option selected>Select Vendor</option>');
                                    $.each(response.data, function(key, value) {
                                        $('#vendor_list').append('<option value="' + value.id +
                                            '">' + value
                                            .name + '</option>');
                                    })
                                }
                            });
                        }
                    })
                }


                $('#submitVendorForm').on('submit', function(e) {

                    e.preventDefault();

                    var formData = new FormData(this);

                    $.ajax({
                        url: '{{ route('storevendor') }}',
                        method: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            $('#vendorModalBtn').html('Submitting')
                            $('#vendorModalBtn').attr('disabled', true)
                            if (response.status == true) {
                                Swal.fire(
                                    'New Vendor Has Been Upload!',
                                    'New Vendor Has Been Upload Successfully!',
                                    'success'
                                );
                                $('#vendorModalBtn').html('Save')
                                $('#vendorModalBtn').attr('disabled', false)
                                $('#vendorModal').modal('toggle');
                                $('#vendor_list').empty();
                                $.ajax({
                                    type: "GET",
                                    url: '/admin/vendor/getAll',
                                    dataType: 'json',
                                    success: function(response) {
                                        $('#vendor_list').append('<option>Select Vendor</option>');
                                        $.each(response.data, function(key, value) {
                                            $('#vendor_list').append('<option value="' +
                                                value.id + '">' + value
                                                .name + '</option>');
                                        })
                                    }
                                });
                            } else {
                                $('#addsuccesstoaster').addClass('show')
                                $('#title').html(response.message)
                                setTimeout(function() {
                                    $('#vendorSaveBtn').html('Submit');
                                    $('#vendorSaveBtn').attr('disabled', false);
                                    $('#addsuccesstoaster').removeClass('show')
                                }, 2000);
                            }
                        }
                    });

                })

                $(document).ready(function() {
                    $('#productForm').validate({ // initialize the plugin
                        ignore: [],
                        rules: {
                            name: {
                                required: true
                            },
                            brand_id: {
                                required: true
                            }
                        },
                    });
                });
            </script>

            <script>
                $('#addBrandForm').on('submit', function(e) {
                    e.preventDefault()
                    var formData = new FormData(this);
                    $('#brandModalBtn').html('Submitting')
                    $('#brandModalBtn').attr('disabled', true)
                    $.ajax({
                        url: '{{ route('brand.storeBrand') }}',
                        method: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if (response.status == true) {
                                Swal.fire(
                                    'New Brand Has Been Added!',
                                    'New Brand Has Been Added Successfully!',
                                    'success'
                                );
                                $('#brandModalBtn').html('Save')
                                $('#brandModalBtn').attr('disabled', false)
                                $('#brandmodal').modal('toggle');
                                $('#brand_id').empty();
                                $.ajax({
                                    url: '/brand/all',
                                    method: 'GET',
                                    success: function(response) {
                                        $('#brand_id').append('<option>Select Brand</option>');
                                        $.each(response.data, function(key, value) {
                                            $('#brand_id').append('<option value="' + value
                                                .id + '">' + value.name + '</option>')
                                        });
                                    }
                                })
                            }
                        }
                    })

                });
            </script>
            <script type="text/javascript">
                $("#addmore").show();
                $("#spare").hide();
                $("#single_sec").show();
                $("#variant_sec").hide();

                function check_type(val) {
                    if (val == 1) {
                        $("#variant_sec").show();
                        $("#single_sec").hide();
                    } else {
                        $("#variant_sec").hide();
                        $("#single_sec").show();
                    }
                }

                function checker(val) {
                    var data = val;
                    $("#add_attribute").click();
                    if (data == "") {
                        $("#add_button").hide();
                        $("#new_body").html("");
                        $("#spare").html("");
                        $("#new_body").html("")
                        $("#spare").html("")
                    }
                }

                $(document).on('click', '.deleterow', function() {
                    $(this).closest('tr').remove();
                });

                $("#add_attribute").click(function() {
                    var data = $("#variant_select").val();
                    // console.log(data);
                    if (data != "") {
                        $.ajaxSetup({
                            headers: {
                                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                            },
                        });
                        $.ajax({
                            type: "post",
                            dataType: "json",
                            url: "{{ route('adminiy.get_option') }}",
                            data: {
                                data: data
                            },
                            success: function(response) {
                                var perData = $('.table new_body').html();

                                // $("#new_body").append(perData)

                                if (response != "") {
                                    $("#add_button").show();
                                    $("#new_body").html();
                                    $("#spare").html();
                                    $("#new_body").html(response.body)
                                    $("#spare").html(response.body_ad)
                                    //console.log(response)
                                }



                            },
                        });
                    } else {
                        $("#add_button").hide();
                        $("#new_body").html("");
                        $("#spare").html("");
                        $("#new_body").html("")
                        $("#spare").html("")
                    }
                })

                $("#addmore").click(function() {
                    $('#saveProduct').attr('disabled', true)
                    $('.pPrice_error').html('')
                    var body = $("#spare").html();
                    $("#tablearea").append("<tr>" + body + "</tr>");
                    $("#tablearea").append().clone()
                        .find(".uPrice").val("").end()
                        .find(".pPrice").val("").end()
                        .insertAfter("#tablearea");
                    //$("#variant_select").change();
                })

                $(document).ready(function() {
                    // $('#example-with-maxHeight').select({
                    //     maxHeight: 200
                    // });

                    $('#roamerId').on('change', function() {
                        $('#vendor_list').empty();
                        $.ajax({
                            url: '{{ route('admindashboad') }}' + '/vendor/byRoamer/' + this.value,
                            method: 'GET',
                            success: function(response) {
                                $.each(response.data, function(key, value) {
                                    $('#vendor_list').append('<option value="' + value.id +
                                        '">' + value.name + '</option>');
                                });
                            }
                        });

                    });

                    $('#sleect_category').change(function(e) {
                        $.get("/getsubcategories/" + this.value, {}, function(data, textStatus, jqXHR) {
                                if (data.success) {
                                    $('#subcategory_id').html('');
                                    $('#subcategory_id').html('<option value="0">Select Sub Category</option>');
                                    $('#subcategory_id').append(data.data);
                                } else {
                                    alert('failed');
                                }
                            },
                            "json"
                        );
                    });
                });
            </script>

            {{-- For Single --}}
            <script>
                $(document).on("keyup", "#pprice", function() {
                    // $('#pprice').on('keyup', function(e) {

                    var pprice = $(this).val();
                    // console.log(pprice);
                    var price = $('#uprice').val();
                    var id = $('#sleect_category option:selected').val();
                    var subid = $('#subcategory_id option:selected').val();
                    $('#spPrice').attr('min', pprice)
                    $('#spPrice').attr('max', price)
                    // console.log(id);
                    // console.log(price);

                    if (id == "") {
                        $('#saveProduct').attr('disabled', true)
                        $('#addsuccesstoaster').addClass('show');
                        $('#title').html("Please select a category first!!")
                        $('.pprice_error').html('')
                        $('.pprice_error').html('Select a category!')
                    } else {
                        $('.pprice_error').html();
                        $.ajax({
                            url: '{{ route('admindashboad') }}' + '/categoryByPrice/' + id + '/' + subid + '/' +
                                price + '/' +
                                pprice,
                            method: 'GET',
                            success: function(response) {
                                if (response.status == true) {
                                    $('#saveProduct').attr('disabled', false)
                                    $('.pprice_error').html('')
                                } else if (response.status == false) {
                                    $('#saveProduct').attr('disabled', true)
                                    $('.pprice_error').html('< than ' + response.p_percentage)
                                }
                            }
                        })
                    }

                    setTimeout(function() {
                        $('#addsuccesstoaster').removeClass('show')
                    }, 1000);

                })
            </script>
            <script>
                $(document).on("keyup", "#uprice", function() {
                    // $('#pprice').on('keyup', function(e) {

                    var price = $(this).val();
                    console.log(price);
                    var pprice = $('#pprice').val();
                    var id = $('#sleect_category option:selected').val();
                    var subid = $('#subcategory_id option:selected').val();
                    $('#spPrice').attr('min', pprice)
                    $('#spPrice').attr('max', price)
                    // console.log(id);
                    // console.log(price);

                    if (id == "") {
                        $('#saveProduct').attr('disabled', true)
                        $('#addsuccesstoaster').addClass('show');
                        $('#title').html("Please select a category first!!")
                        $('.pprice_error').html('')
                        $('.pprice_error').html('Select a category!')
                    } else {
                        $('.pprice_error').html();
                        $.ajax({
                            url: '{{ route('admindashboad') }}' + '/categoryByPrice/' + id + '/' + subid + '/' +
                                price + '/' +
                                pprice,
                            method: 'GET',
                            success: function(response) {
                                if (response.status == true) {
                                    $('#saveProduct').attr('disabled', false)
                                    $('.pprice_error').html('')
                                } else if (response.status == false) {
                                    $('#saveProduct').attr('disabled', true)
                                    $('.pprice_error').html('< than ' + response.p_percentage)
                                }
                            }
                        })
                    }

                    setTimeout(function() {
                        $('#addsuccesstoaster').removeClass('show')
                    }, 1000);

                })
            </script>
            {{-- For Multiple --}}
            <script>
                // $('#saveProduct').attr('disabled', true)
                // $('.pPrice_error').html('')

                function changeValidateprice(event) {
                    event.stopPropagation();
                    $('#saveProduct').attr('disabled', true)
                    $('.pPrice_error').html('')
                    $('.uPrice').each(function(i, obj) {
                        console.log(this.value);
                        var price = this.value;
                        console.log(price);
                        $('#spPrice').attr('max', this.value)

                        $('.pPrice').each(function(i, obj) {
                            var pprice = this.value;
                            var id = $('#sleect_category option:selected').val();
                            var subid = $('#subcategory_id option:selected').val();

                            $('#spPrice').attr('min', this.value)
                            // console.log(id);
                            // console.log(price);
                            if (id == "") {
                                $('#saveProduct').attr('disabled', true)
                                $('#addsuccesstoaster').addClass('show');
                                $('#title').html("Please select a category first!!")
                                $('.pPrice_error').html('')
                                $('.pPrice_error').html('Select a category!')
                            } else {
                                // $('.pPrice_error').html();
                                $.ajax({
                                    url: '{{ route('admindashboad') }}' + '/categoryByPrice/' + id + '/' +
                                        subid +
                                        '/' +
                                        price + '/' +
                                        pprice,
                                    method: 'GET',
                                    success: function(response) {
                                        if (response.status == true) {
                                            $('#saveProduct').attr('disabled', false)
                                            $('.pPrice_error').html('')
                                        } else if (response.status == false) {
                                            $('#saveProduct').attr('disabled', true)
                                            $('.pPrice_error').html('< than ' + response.p_percentage)
                                            $('#addsuccesstoaster').addClass('show');
                                            $('#title').html('< than ' + response.p_percentage)
                                        }
                                    }
                                })
                            }
                        })


                        setTimeout(function() {
                            $('#addsuccesstoaster').removeClass('show')
                        }, 1000);
                    });
                }
            </script>
        @endpush
    @endsection
