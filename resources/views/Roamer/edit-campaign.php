@extends('layouts.roamer')
@section('content')

<div class="cover-all-content">
    <div class="d-flex align-items-center justify-content-between flex-wrap">
        <h2 class="section-title">Edit <span class="primary-text">Campaign</span></h2>
    </div>
    <br>
    <br>
    <div class="cover-inner-content">
        <div class="row g-3">
            <div class="col-lg-8">
                <form action="#">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row align-items-center g-0">
                                    <div class="col-lg-2 ">
                                        <label for="" class="mb-lg-0">Campaign Name</label>
                                    </div>
                                    <div class="col-lg-10 ">
                                        <input type="text" class=" form-control" placeholder="Ex. Nikon Coolpix A300 Digital Camera">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row align-items-center g-0">
                                    <div class="col-lg-2 ">
                                        <label for="" class="mb-lg-0">Campaign Date</label>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="form-group m-0 StartEndDate-v1">
                                            <input type="text" class="reviewStartDate" placeholder="Start Date" style="width: 50%;" />
                                            <input type="text" class="reviewEndDate" placeholder="- End Date" style="width: 50%;" />
                                            <i class="bi bi-calendar4"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row align-items-center g-0">
                                    <div class="col-lg-2 ">
                                        <label for="" class="mb-lg-0">Registration</label>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="form-group m-0 StartEndDate-v1">
                                            <input type="text" class="reviewStartDate" placeholder="Start Date" style="width: 50%;" />
                                            <input type="text" class="reviewStartDate" placeholder="- End Date" style="width: 50%;" />
                                            <i class="bi bi-calendar4"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="card">
                                    <div class="card-body2">
                                        <div class="row">
                                            <div class="col-lg-2 ">
                                                <label for="" class="mb-lg-0">Categories Applicable</label>
                                            </div>
                                            <div class="col-lg-10">
                                                <select class="js-example-basic-single w-100" name="states[]" multiple="multiple">
                                                    <option value="AL">Alabama</option>
                                                    ...
                                                    <option value="WY">Wyoming</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="row align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="" class="mb-lg-0">Percentage Off</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <input type="text" class=" form-control" placeholder="%">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="row align-items-center">
                                                <div class="col-lg-4 text-start text-lg-end">
                                                    <label for="" class="mb-lg-0">Fix Off</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <input type="number" class=" form-control" placeholder="Amount">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <label for="#" class="mb-4">Add Banner Image</label>
                                </div>
                                <div class="col-lg-12">
                                    <div class="d-flex align-items-center gap-2">
                                        <label for="uploadCNICFront" class="uploadimagelabel">
                                            <img alt="" id="CNIC-Front" class="uploadimage">
                                            <input type="file" id="uploadCNICFront" hidden="">
                                            <i class="bi bi-camera-fill"></i>
                                            <p>Upload Image
                                            </p>

                                        </label>
                                        <label for="uploadCNICBack" class="uploadimagelabel">
                                            <img alt="" id="CNIC-Back" class="uploadimage">
                                            <input type="file" id="uploadCNICBack" hidden="">
                                            <i class="bi bi-camera-fill"></i>
                                            <p>Upload Image
                                            </p>

                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
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

   @endsection
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
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
