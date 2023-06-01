@extends('layouts.roamer')
@section('content')

<div class="cover-all-content">
    <div class="d-flex align-items-center justify-content-between flex-wrap">
        <h2 class="section-title">Add <span class="primary-text">Products</span></h2>

    </div>
    <br>
    <br>
    <div class="cover-inner-content">
        <form action="">
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
                                    <input type="text" class="form-control" placeholder="Ex. Nikon Coolpix A300 Digital Camera" style="padding-right: 50px">
                                    <span class=" position-absolute top-50 translate-middle-y opacity-04 font-weight-400 user-select-none font-12px" style="right: 16px;">0/25</span>
                                </div>
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="javascript:void(0)" class="font-12px default-anchor">Add multi-languages</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row align-items-center g-3 mb-3">
                                <div class="col-lg-2">
                                    <label>Category</label>
                                </div>
                                <div class="col-lg-7">
                                    <select id="example-with-maxHeight" multiple="multiple">
                                        <option value="1">Cameras </option>
                                        <option value="2">DSLR </option>
                                        <option value="3">Sets</option>
                                    </select>

                                </div>
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addcategorymodal" class="font-12px default-anchor">Add Category/Sub Category</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row align-items-center g-3 mb-3">
                                <div class="col-lg-2">
                                    <label>Sub Category</label>
                                </div>
                                <div class="col-lg-7">
                                    <div class="custom-select" style="width:100%;">
                                        <select>
                                            <option value="0">Select Subcategories</option>
                                            <option value="1">DSLR</option>
                                            <option value="1">Mobile</option>
                                            <option value="1">Games</option>
                                        </select>
                                    </div>

                                </div>

                            </div>
                            <div class="row align-items-center g-3 mb-3">
                                <div class="col-lg-2">
                                    <label>Vendor</label>
                                </div>
                                <div class="col-lg-7">
                                    <div class="custom-select" style="width:100%;">
                                        <select>
                                            <option value="0">Select Vendor</option>
                                            <option value="1">Kashif</option>
                                            <option value="1">Aslam</option>
                                            <option value="1">Faizan</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="javascript:void(0)" class="font-12px default-anchor">Add Vendor</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row align-items-center g-3 mb-3">
                                <div class="col-lg-2">
                                    <label>Brand</label>
                                </div>
                                <div class="col-lg-7">
                                    <div class="custom-select" style="width:100%;">
                                        <select>
                                            <option value="0">Select Brands</option>
                                            <option value="1">Brands 1</option>
                                            <option value="1">Brands 2</option>
                                            <option value="1">Brands 3</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="javascript:void(0)" class="font-12px default-anchor">Add Brand</a></li>
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
                                                <input type="file" id="productimage1" hidden onchange="document.getElementById('pImage1').src = window.URL.createObjectURL(this.files[0])">
                                            </label>
                                        </div>
                                        <div class="upload-image-box-v1">
                                            <label for="productimage2">
                                                <i class="material-icons">
                                                    add
                                                </i>
                                                <p>Select Image</p>
                                                <img id="pImage2" alt="">
                                                <input type="file" id="productimage2" hidden onchange="document.getElementById('pImage2').src = window.URL.createObjectURL(this.files[0])">
                                            </label>
                                        </div>
                                        <div class="upload-image-box-v1">
                                            <label for="productimage3">
                                                <i class="material-icons">
                                                    add
                                                </i>
                                                <p>Select Image</p>
                                                <img id="pImage3" alt="">
                                                <input type="file" id="productimage3" hidden onchange="document.getElementById('pImage3').src = window.URL.createObjectURL(this.files[0])">
                                            </label>
                                        </div>
                                        <div class="upload-image-box-v1">
                                            <label for="productimage4">
                                                <i class="material-icons">
                                                    add
                                                </i>
                                                <p>Select Image</p>
                                                <img id="pImage4" alt="">
                                                <input type="file" id="productimage4" hidden onchange="document.getElementById('pImage4').src = window.URL.createObjectURL(this.files[0])">
                                            </label>
                                        </div>
                                        <div class="upload-image-box-v1">
                                            <label for="productimage5">
                                                <i class="material-icons">
                                                    add
                                                </i>
                                                <p>Select Image</p>
                                                <img id="pImage5" alt="">
                                                <input type="file" id="productimage5" hidden onchange="document.getElementById('pImage5').src = window.URL.createObjectURL(this.files[0])">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title font-17px">Detailed <span class=" primary-text">Description</span></h4>
                            <br>
                            <div class="cover-product-description">
                                <div class="row g-3 align-items-center mb-3">
                                    <div class="col-lg-2">
                                        <label for="" class=" font-weight-600">Short Description</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <textarea class="editor" placeholder="Type here..."></textarea>

                                    </div>
                                </div>
                                <div class="row g-3 align-items-center mb-3">
                                    <div class="col-lg-2">
                                        <label for="" class=" font-weight-600">Urdu Description</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <textarea class="editor" placeholder="Type here..."></textarea>
                                    </div>
                                </div>
                                <div class="row g-3 align-items-center mb-3">
                                    <div class="col-lg-2">
                                        <label for="" class=" font-weight-600">English
                                            Description</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <textarea class="editor" placeholder="Type here..."></textarea>
                                    </div>
                                </div>
                                <div class="row g-3 align-items-center">
                                    <div class="col-lg-2">
                                        <label for="" class=" font-weight-600">What's in the box
                                        </label>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class=" position-relative">
                                            <input type="text" class="form-control" placeholder="" style="padding-right: 50px">
                                            <span class=" position-absolute top-50 translate-middle-y opacity-04 font-weight-400 user-select-none font-12px" style="right: 16px;">0/25</span>
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
                            <p class=" mb-4">Please make sure the title is optimized and the category is selected correctly.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-3">
                        <div class="card-body hite-bg-clr-02">
                            <h4 class="card-title font-17px">Price <span class=" primary-text">& Stock</span></h4>
                            <br>
                            <div class="d-flex align-items-center flex-wrap gap-4 mb-3">
                                <label class="m-0 d-flex align-items-center gap-3">Color Family <ul>
                                        <li><a href="javascript:void(0)" class="infobar" data-bs-toggle="tooltip" title="Some tooltip text!"><i class="material-icons">
                                                    question_mark
                                                </i></a></li>
                                    </ul></label>
                                <div class="form-group m-0 width-100 width-md-40">
                                    <input type="text" class="form-control" placeholder="Please Input">
                                </div>
                            </div>
                            <div class="d-flex align-items-center flex-wrap gap-4 mb-4">
                                <label class="m-0 d-flex align-items-center gap-3">Variation Information <ul>
                                        <li><a href="javascript:void(0)" class="infobar" data-bs-toggle="tooltip" title="Some tooltip text!"><i class="material-icons">
                                                    question_mark
                                                </i></a></li>
                                    </ul></label>
                                <ul>
                                    <li><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#skumodal" class=" gray-btn-200 extra-btn-padding-25"><i class="material-icons">
                                                add
                                            </i> Add a new SKU</a></li>
                                </ul>
                            </div>
                            <ul class="d-flex align-items-center flex-wrap gap-3 copylinks">
                                <li><a href="javascript:void(0)"><i class="material-icons">
                                            attach_file
                                        </i> <label for="">Copy the first to the rest</label></a></li>
                                <li><a href="javascript:void(0)"><i class="material-icons">
                                            attach_file
                                        </i> <label for="">Copy the first stock to the rest only</label></a></li>
                                <li><a href="javascript:void(0)"><i class="material-icons">
                                            attach_file
                                        </i> <label for="">Copy the first price to the rest only</label></a></li>
                            </ul>
                            <!-- TABLE -->
                            <br>
                            <div class="table-res">
                                <table class="table table-v1 align-middle">
                                    <thead>
                                        <tr>
                                            <th>Availability</th>
                                            <th>Color Family</th>
                                            <th>Price</th>
                                            <th>Special Price</th>
                                            <th>Procurement Price</th>
                                            <th>Quantity</th>
                                            <th>SellerSKU</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <label class="cswitch">
                                                    <input class="cswitch--input" type="checkbox" checked /><span class="cswitch--trigger wrapper"></span>
                                                </label>
                                            </td>
                                            <td>

                                                <select class="default-select w-auto">
                                                    <option value="0">Select</option>
                                                    <option value="1">Standerd</option>
                                                    <option value="1">Pro</option>
                                                    <option value="1">Plus</option>
                                                </select>

                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="-- / --">
                                            </td>
                                            <td>
                                                <ul>
                                                    <li><a href="javascript:void(0)" class=" default-anchor"><i class="bi bi-pencil-square"></i></a></li>
                                                </ul>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="------">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="------">
                                            </td>

                                            <td>
                                                <input type="text" class="form-control" placeholder="Automatic">
                                            </td>
                                            <td>
                                                <ul>
                                                    <li><a href="javascript:void(0)" class=" default-anchor"><i class="bi bi-trash"></i></a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="cswitch">
                                                    <input class="cswitch--input" type="checkbox" checked /><span class="cswitch--trigger wrapper"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <select class="default-select w-auto">
                                                    <option value="0">Select</option>
                                                    <option value="1">Standerd</option>
                                                    <option value="1">Pro</option>
                                                    <option value="1">Plus</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="-- / --">
                                            </td>
                                            <td>
                                                <ul>
                                                    <li><a href="javascript:void(0)" class=" default-anchor"><i class="bi bi-pencil-square"></i></a></li>
                                                </ul>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="------">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="------">
                                            </td>

                                            <td>
                                                <input type="text" class="form-control" placeholder="Automatic">
                                            </td>
                                            <td>
                                                <ul>
                                                    <li><a href="javascript:void(0)" class=" default-anchor"><i class="bi bi-trash"></i></a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body hite-bg-clr-02">
                            <h4 class="card-title font-17px">Service <span class=" primary-text">& Delivery</span></h4>
                            <br>
                            <div class="form-group">
                                <label for="" class=" font-weight-600">Service</label>
                                <div class="d-block d-lg-flex align-items-center flex-wrap mb-3 gap-1">
                                    <label class="mb-3 mb-lg-0 d-flex align-items-center gap-2 col-lg-3">Warranty Type <ul>
                                            <li><a href="javascript:void(0)" class="infobar" data-bs-toggle="tooltip" title="Some tooltip text!"><i class="material-icons">
                                                        question_mark
                                                    </i></a></li>
                                        </ul></label>
                                    <div class="form-group m-0 col-lg-7">
                                        <div class="custom-select" style="width:100%;">
                                            <select>
                                                <option value="0">Select</option>
                                                <option value="1">Standerd</option>
                                                <option value="1">Pro</option>
                                                <option value="1">Plus</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" id="showdelivery1">
                                    <div class="d-block d-lg-flex align-items-center flex-wrap mb-3 gap-1">
                                        <label class="mb-3 mb-lg-0 d-flex align-items-center gap-2 col-lg-3">Warranty Type 2<ul>
                                                <li><a href="javascript:void(0)" class="infobar" data-bs-toggle="tooltip" title="Some tooltip text!"><i class="material-icons">
                                                            question_mark
                                                        </i></a></li>
                                            </ul></label>
                                        <div class="form-group m-0 col-lg-7">
                                            <div class="custom-select" style="width:100%;">
                                                <select>
                                                    <option value="0">Select</option>
                                                    <option value="1">Standerd</option>
                                                    <option value="1">Pro</option>
                                                    <option value="1">Plus</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-block d-lg-flex align-items-center flex-wrap mb-3 gap-1">
                                        <label class="mb-3 mb-lg-0 mb-lg-0 d-flex align-items-center gap-2 col-lg-3">Warranty Type 3<ul>
                                                <li><a href="javascript:void(0)" class="infobar" data-bs-toggle="tooltip" title="Some tooltip text!"><i class="material-icons">
                                                            question_mark
                                                        </i></a></li>
                                            </ul></label>
                                        <div class="form-group m-0 col-lg-7">
                                            <div class="custom-select" style="width:100%;">
                                                <select>
                                                    <option value="0">Select</option>
                                                    <option value="1">Standerd</option>
                                                    <option value="1">Pro</option>
                                                    <option value="1">Plus</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <ul>
                                    <li><a data-bs-toggle="collapse" href="#." data-bs-target="#showdelivery1" role="button" aria-expanded="false" aria-controls="showdelivery1" class=" gray-btn-100 d-block text-center">More</a></li>
                                </ul>
                            </div>
                            <div class="form-group">
                                <label for="" class=" font-weight-600">Delivery</label>
                                <div class="d-block d-lg-flex align-items-center flex-wrap mb-3 gap-1">
                                    <label class="mb-3 mb-lg-0 mb-lg-0 d-flex align-items-center gap-3 col-lg-3">Package Weight (kg)<ul>
                                            <li><a href="javascript:void(0)" class="infobar" data-bs-toggle="tooltip" title="Some tooltip text!"><i class="material-icons">
                                                        question_mark
                                                    </i></a></li>
                                        </ul></label>
                                    <div class="form-group m-0 col-lg-7">
                                        <div class="custom-select" style="width:100%;">
                                            <select>
                                                <option value="0">Select</option>
                                                <option value="1">Standerd</option>
                                                <option value="1">Pro</option>
                                                <option value="1">Plus</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-block d-lg-flex align-items-center flex-wrap mb-3">
                                    <label class="mb-3 mb-lg-0 mb-lg-0 d-flex align-items-center gap-3 col-lg-3">Package Dimensions (cm)</label>
                                    <div class="form-group m-0 col-lg-7">
                                        <div class="d-flex flex-wrap gap-2">
                                            <input type="text" class="form-control" placeholder="Length (cm)">
                                            <input type="text" class="form-control" placeholder="Width (cm)">
                                            <input type="text" class="form-control" placeholder="Height (cm)">
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" id="showdelivery2">

                                    <div class="d-block d-lg-flex align-items-center flex-wrap mb-3">
                                        <label class="mb-3 mb-lg-0 mb-lg-0 d-flex align-items-center gap-3 col-lg-3">Package Weight (kg)<ul>
                                                <li><a href="javascript:void(0)" class="infobar" data-bs-toggle="tooltip" title="Some tooltip text!"><i class="material-icons">
                                                            question_mark
                                                        </i></a></li>
                                            </ul></label>
                                        <div class="form-group m-0 col-lg-7">
                                            <div class="custom-select" style="width:100%;">
                                                <select>
                                                    <option value="0">Select</option>
                                                    <option value="1">Standerd</option>
                                                    <option value="1">Pro</option>
                                                    <option value="1">Plus</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <ul>
                                    <li><a data-bs-toggle="collapse" href="#." data-bs-target="#showdelivery2" role="button" aria-expanded="false" aria-controls="showdelivery2" class=" gray-btn-100 d-block text-center">More</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <ul class="d-flex align-items-center justify-content-center flex-wrap gap-3">
                        <li><a href="javascript:void(0)" class="gray-btn-100 extra-btn-padding-80 text-uppercase">Save Draft</a></li>
                        <li><a href="javascript:void(0)" class="btn btn-primary extra-btn-padding-80 text-uppercase">Submit</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <div class="card position-sticky" style="top:10px">
                        <div class="card-body lgray-bg-1 tipcard">
                            <h6>Tips</h6>
                            <p>Procurement price should be exact. If procurement price is somehow found to be different than mentioned, Roamer may not only be penalized but he may lose his job as well. Character precedes everything else.</p>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="addcategorymodal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="card-body pt-4">
                    <div class="modal-header">
                        <h5 class="card-title font-18px">Add <span class=" primary-text">Category</span></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body py-4">
                        <form action="">
                            <div class="form-group">
                                <label for="" class="mb-3">Category</label>
                                <div class=" position-relative">
                                    <input type="text" placeholder="Define Category" class=" form-control" style="padding-right: 60px;">
                                    <a href="javascript:void(0)" class=" position-absolute top-50 translate-middle-y text-decoration-underline font-10px" style="right: 15px; font-weight: 400;">View List</a>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="" class="mb-3">Sub - Category</label>
                                <div class=" position-relative">
                                    <input type="text" placeholder="Define Category" class=" form-control" style="padding-right: 60px;">
                                    <a href="javascript:void(0)" class=" position-absolute top-50 translate-middle-y text-decoration-underline font-10px" style="right: 15px; font-weight: 400;">View List</a>
                                </div>
                            </div>
                            <div class="text-center mt-5">
                                <button class="btn btn-primary extra-btn-padding-45 text-uppercase">Add To list</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="skumodal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="card-body pt-4">
                    <div class="modal-header">
                        <h5 class="card-title font-18px">Add <span class=" primary-text">New SKU</span></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body py-4">
                        <form action="">
                            <div class="form-group">
                                <label for="" class="mb-3">Select Attribute</label>
                                <div class=" position-relative">
                                    <div class="custom-select custom-select-caret-none" style="width:100%;">
                                        <select>
                                            <option value="0">Select</option>
                                            <option value="1">Standerd</option>
                                            <option value="1">Pro</option>
                                            <option value="1">Plus</option>
                                        </select>
                                    </div>
                                    <a href="javascript:void(0)" class=" position-absolute top-50 translate-middle-y text-decoration-underline font-10px" style="right: 15px; font-weight: 400;">View List</a>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="" class="mb-3">Add Value</label>
                                <div class=" position-relative">
                                    <input type="text" placeholder="Define Category" class=" form-control" style="padding-right: 60px;" value="Value">
                                </div>
                            </div>
                            <div class="text-center mt-5">
                                <button class="btn btn-primary extra-btn-padding-45 text-uppercase">Add SKU</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
   @endsection
    <script>
        $(document).ready(function() {
            $('#example-with-maxHeight').multiselect({
                maxHeight: 200
            });
        });
    </script>
