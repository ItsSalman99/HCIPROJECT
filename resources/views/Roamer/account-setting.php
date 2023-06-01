@extends('layouts.roamer')
@section('content')

<div class="cover-all-content">
    <div class="d-flex align-items-center justify-content-between flex-wrap">
        <h2 class="section-title">Account & <span class="primary-text">Settings</span></h2>
    </div>
    <br>
    <br>
    <div class="cover-inner-content">
        <div class="tabs-style-1 mt-4">
            <!-- Nav tabs -->
            <div class="tabs-links">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="tabv1-1-tab" data-bs-toggle="tab" data-bs-target="#tabv1-1" type="button" role="tab" aria-controls="tabv1-1" aria-selected="true">Roamer Account</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="tabv1-2-tab" data-bs-toggle="tab" data-bs-target="#tabv1-2" type="button" role="tab" aria-controls="tabv1-2" aria-selected="false">Personal Information</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="tabv1-3-tab" data-bs-toggle="tab" data-bs-target="#tabv1-3" type="button" role="tab" aria-controls="tabv1-3" aria-selected="false">Bank Account</button>
                    </li>
                </ul>
            </div>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="tabv1-1" role="tabpanel" aria-labelledby="tabv1-1-tab">
                    <div class="row g-3">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <form class="Horizontal-label white-bg-clr-02">
                                        <div class="row justify-content-center align-items-end mb-3">
                                            <div class="col-lg-8 order-1 order-lg-0">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-3">
                                                        <label for="">Roamer ID</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <p class=" fst-italic m-0">101</p>
                                                    </div>
                                                </div>
                                                <br>
                                                <br>
                                                <div class="row align-items-center">
                                                    <div class="col-lg-3">
                                                        <label for="">Email</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="form-group m-0">
                                                            <div class="d-flex align-items-center flex-wrap flex-lg-nowrap gap-3">
                                                                <input type="text" class=" form-control">
                                                                <a href="javascript:void(0)" class=" btn btn-primary extra-btn-padding-25" data-bs-toggle="modal" data-bs-target="#changepasswordmodal">Change Password</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 d-flex align-items-center justify-content-center justify-content-lg-end">
                                                <!-- <label for="uploadlogo" class="uploadimagelabel">
                                                    <img alt="" id="brand-img-upload1" class="uploadimage">
                                                    <input type="file" id="uploadlogo" hidden="">
                                                    <i class="bi bi-camera-fill"></i>
                                                    <p>Upload Your logo
                                                    </p>
                                                    <p class=" fst-italic"> (250 x 250)</p>
                                                </label> -->
                                                <div class="upload-image-box-v1">
                                                    <label for="brandLogo1" class="brandLogo bg-white" style="width: 164px;">
                                                        <img alt="" id="brandLogoImg1" class="uploadimage">
                                                        <input type="file" id="brandLogo1" hidden onchange="document.getElementById('brandLogoImg1').src = window.URL.createObjectURL(this.files[0])">
                                                        <i class="bi bi-camera-fill font-40px opacity-05" style="color: inherit;"></i>
                                                        <p>Upload Your logo
                                                        </p>
                                                        <p class=" fst-italic"> (250 x 250)</p>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="row align-items-center">
                                                        <div class="col-lg-4">
                                                            <label for="">Contact #</label>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <input type="text" class=" form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="row align-items-center">
                                                        <div class="col-lg-4 text-start text-lg-end">
                                                            <label for="">Whatsapp #</label>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <input type="text" class=" form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="row align-items-center">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="row align-items-center">
                                                        <div class="col-lg-4">
                                                            <label for="">Holiday Duration</label>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <div class="d-flex align-items-center gap-1">
                                                                <div class="form-group m-0 StartEndDate-v1 holiday-date">
                                                                    <input type="text" class="reviewStartDate" placeholder="Start Date" />
                                                                    <span>-</span>
                                                                    <input type="text" class="reviewEndDate" placeholder="End Date" />
                                                                    <i class="bi bi-calendar4"></i>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="row align-items-center">
                                                        <div class="col-lg-4 text-start text-lg-end">
                                                            <label for="">Holiday Mode</label>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <div class="d-flex align-items-center gap-5 ms-4">
                                                                <div class="form-check d-flex align-items-center gap-2 primary-checkbox">
                                                                    <input class="form-check-input mt-0" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked="">
                                                                    <label class="form-check-label m-0" for="flexRadioDefault1">
                                                                        Yes
                                                                    </label>
                                                                </div>
                                                                <div class="form-check d-flex align-items-center gap-2 primary-checkbox">
                                                                    <input class="form-check-input mt-0" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                                                    <label class="form-check-label m-0" for="flexRadioDefault2">
                                                                        No
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="text-center">
                                <button class=" btn btn-primary extra-btn-padding-60">Submit</button>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body lgray-bg-1 tipcard">
                                    <h6>Tips</h6>
                                    <p class=" mb-4">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tabv1-2" role="tabpanel" aria-labelledby="tabv1-2-tab">
                    <div class="row g-3">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body Horizontal-label white-bg-clr-02">
                                    <div class="row align-items-center">
                                        <div class="col-lg-2">
                                            <label for="">CNIC -
                                                Complete Name</label>
                                        </div>
                                        <div class="col-lg-10">
                                            <input type="text" class=" form-control">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row align-items-center">
                                        <div class="col-lg-2">
                                            <label for="">CNIC -
                                                Permanent
                                                Address</label>
                                        </div>
                                        <div class="col-lg-10">
                                            <input type="text" class=" form-control">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="">Country/Region</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="custom-select" style="width:100%;">
                                                        <select>
                                                            <option value="0">Please select</option>
                                                            <option value="1">Standerd</option>
                                                            <option value="1">Pro</option>
                                                            <option value="1">Plus</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <br class=" d-lg-none">
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row align-items-center">
                                                <div class="col-lg-4 text-lg-end">
                                                    <label for="">State</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="custom-select" style="width:100%;">
                                                        <select>
                                                            <option value="0">Please select</option>
                                                            <option value="1">Standerd</option>
                                                            <option value="1">Pro</option>
                                                            <option value="1">Plus</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="">Location</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="custom-select" style="width:100%;">
                                                        <select>
                                                            <option value="0">Please select</option>
                                                            <option value="1">Standerd</option>
                                                            <option value="1">Pro</option>
                                                            <option value="1">Plus</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <br class=" d-lg-none">
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row align-items-center">
                                                <div class="col-lg-4 text-lg-end">
                                                    <label for="">Area</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="custom-select" style="width:100%;">
                                                        <select>
                                                            <option value="0">Please select</option>
                                                            <option value="1">Standerd</option>
                                                            <option value="1">Pro</option>
                                                            <option value="1">Plus</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="">National ID
                                                        Card Number</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <input type="text" class=" form-control" placeholder="6110-16404358-7">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="row align-items-center">

                                                <div class="col-lg-8 offset-lg-2">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <div class="upload-image-box-v1">
                                                            <label for="uploadCNICFront" class="brandLogo bg-white" style="width: 164px;">
                                                                <img alt="" id="CNIC-Front" class="uploadimage">
                                                                <input type="file" id="uploadCNICFront" hidden onchange="document.getElementById('CNIC-Front').src = window.URL.createObjectURL(this.files[0])">
                                                                <i class="bi bi-camera-fill font-40px opacity-05" style="color: inherit;"></i>
                                                                <p>Upload CNIC Photo
                                                                    Front
                                                                </p>
                                                            </label>
                                                        </div>

                                                        <div class="upload-image-box-v1">
                                                            <label for="uploadCNICBack" class="brandLogo bg-white" style="width: 164px;">
                                                                <img alt="" id="CNIC-Back" class="uploadimage">
                                                                <input type="file" id="uploadCNICBack" hidden onchange="document.getElementById('CNIC-Back').src = window.URL.createObjectURL(this.files[0])">
                                                                <i class="bi bi-camera-fill font-40px opacity-05" style="color: inherit;"></i>
                                                                <p>Upload CNIC Photo
                                                                    Back
                                                                </p>
                                                            </label>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="text-center width-100 width-lg-90 mx-auto">
                                <div class=" d-flex gap-1">
                                    <input type="checkbox" class=" form-check-input" id="info1">
                                    <label for="info1" class="text-start">
                                        I Acknowledge that excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla.

                                    </label>
                                </div>
                                <br>
                                <br>
                                <button class=" btn btn-primary extra-btn-padding-60">Submit</button>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body lgray-bg-1 tipcard">
                                    <h6>Tips</h6>
                                    <p class=" mb-4">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tabv1-3" role="tabpanel" aria-labelledby="tabv1-3-tab">
                    <div class="row g-3">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body Horizontal-label white-bg-clr-02">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="">Account Title</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <input type="text" class=" form-control">
                                                </div>
                                            </div>
                                            <br class=" d-lg-none">
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="">Account Number</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <input type="text" class=" form-control" placeholder="smk0071551@gmail.com">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="">Bank Name</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <input type="text" class=" form-control">
                                                </div>
                                            </div>
                                            <br class=" d-lg-none">
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="">Branch Code</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <input type="text" class=" form-control" placeholder="0304">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="">IBAN</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <input type="text" class=" form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="row align-items-center">
                                                <div class="col-lg-3">
                                                    <label for="">Upload Cheque
                                                        Copy</label>
                                                </div>
                                                <div class="col-lg-8 d-flex align-items-center gap-2">
                                                    <!-- <input type="file" class="form-control vendor_logo_hide border-0" name="v_logo" id='Uploadfile'> -->
                                                    <input type="file" class=" form-control">
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="text-center width-100 width-lg-90 mx-auto">
                                <div class=" d-flex gap-1">
                                    <input type="checkbox" class=" form-check-input" id="info2">
                                    <label for="info2" class="text-start">

                                        I Acknowledge that excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla.
                                    </label>
                                </div>
                                <br>
                                <br>
                                <button class=" btn btn-primary extra-btn-padding-80">Submit</button>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body lgray-bg-1 tipcard">
                                    <h6>Tips</h6>
                                    <p class=" mb-4">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="changepasswordmodal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="card-body pt-4">
                    <div class="modal-header">
                        <h5 class="card-title font-18px">Change <span class=" primary-text">Password</span></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body py-4">
                        <form action="">
                            <p>Your new password must be different from previous used passwords.</p>
                            <br>
                            <br>
                            <div class="form-group">
                                <label for="" class="mb-3">Password</label>
                                <div class=" position-relative">
                                    <input id="Cpassword-field1" type="password" name="password" class="form-control" placeholder="Enter your Password" required>
                                    <i class="toggle-password bi bi-eye position-absolute top-50 translate-middle-y font-20px opacity-06" style="right: 10px; cursor:pointer " toggle="#Cpassword-field1"></i>
                                </div>

                            </div>
                            <br>
                            <div class="form-group">
                                <label for="" class="mb-3">Confirm Password</label>
                                <div class=" position-relative mb-2">
                                    <input id="Cpassword-field2" type="password" name="cpassword" class="form-control" placeholder="Enter your Password" required>
                                    <i class="toggle-password bi bi-eye position-absolute top-50 translate-middle-y font-20px opacity-06" style="right: 10px; cursor:pointer " toggle="#Cpassword-field2"></i>
                                </div>
                                <p id="CheckPasswordMatch"></p>
                            </div>
                            <div class="text-center mt-5">
                                <button class="btn btn-primary extra-btn-padding-45 text-uppercase">Reset Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

   @endsection
    <script>
        // file upload
        $(document).ready(function() {
            // set text to select company logo
            $("#Uploadfile").after("<span class='file_placeholder'>Select Company Logo</span>");
            // on change
            $('#Uploadfile').change(function() {
                //  show file name
                if ($("#Uploadfile").val().length > 0) {
                    $(".file_placeholder").empty();
                    $('#Uploadfile').removeClass('vendor_logo_hide').addClass('vendor_logo');
                    console.log($("#Uploadfile").val());
                } else {
                    // show select company logo
                    $('#Uploadfile').removeClass('vendor_logo').addClass('vendor_logo_hide');
                    $("#Uploadfile").after("<span class='file_placeholder'>Select  Company Logo</span>");
                }

            });

        });
        // font CNIC
        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#CNIC-Front').attr('src', e.target.result);
                    $('#CNIC-Front').css('display', 'block');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#uploadCNICFront").change(function() {
            readURL1(this);
        });
        // Back CNIC
        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#CNIC-Back').attr('src', e.target.result);
                    $('#CNIC-Back').css('display', 'block');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#uploadCNICBack").change(function() {
            readURL2(this);
        });

        function readURL3(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#brand-img-upload1').attr('src', e.target.result);
                    $('#brand-img-upload1').css('display', 'block');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#uploadlogo").change(function() {
            readURL3(this);
        });


        //################# password match ##################
        function checkPasswordMatch() {
            var password = $("#Cpassword-field1").val();
            var confirmPassword = $("#Cpassword-field2").val();
            if (password != confirmPassword)
                $("#CheckPasswordMatch").html("Passwords does not match!").css('color', 'red');
            else
                $("#CheckPasswordMatch").html("Passwords Match.").css('color', 'green');

        }
        $(document).ready(function() {
            $("#Cpassword-field2").keyup(checkPasswordMatch);
        });
    </script>
