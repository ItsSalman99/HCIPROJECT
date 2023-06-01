@extends('layouts.admin')
@section('content')
    <div class="cover-all-content">
        <div class="d-flex align-items-center justify-content-between flex-wrap">
            <h2 class="section-title">Add <span class="primary-text">Campaign</span></h2>
        </div>
        <br>
        <br>
        <div class="cover-inner-content">
            <div class="row g-3">
                <div class="col-lg-8">
                    <form action="{{ route('admin.compaign.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row align-items-center g-0">
                                        <div class="col-lg-2 ">
                                            <label for="" class="mb-lg-0">Campaign Name</label>
                                        </div>
                                        <div class="col-lg-10 ">
                                            <input name="compaign_name" type="text" class=" form-control"
                                                placeholder="Ex. Electronics Essentials 25th To 28th March (All Sellers)"
                                                required>
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
                                                <input name="compaign_start" type="text" class="reviewStartDate"
                                                    placeholder="Start Date" style="width: 50%;" required />
                                                <input name="compaign_end" type="text" class="reviewEndDate"
                                                    placeholder="- End Date" style="width: 50%;" required />
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
                                                <input name="registeration_start" type="text" class="reviewStartDate"
                                                    placeholder="Start Date" style="width: 50%;" required />
                                                <input name="registeration_end" type="text" class="reviewStartDate"
                                                    placeholder="- End Date" style="width: 50%;" required />
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
                                                    <select class="js-example-basic-single w-100" name="category_id[]"
                                                        multiple="multiple">
                                                        @foreach ($category as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-5 mb-2">
                                    <div class="form-check d-flex align-items-center gap-2 primary-checkbox">
                                        <input class="form-check-input mt-0" type="radio" name="check_amount"
                                            id="check1" value="1">
                                        <label class="form-check-label m-0" for="flexRadioDefault1">
                                            Percentage%
                                        </label>
                                    </div>
                                    <div class="form-check d-flex align-items-center gap-2 primary-checkbox">
                                        <input class="form-check-input mt-0" type="radio" name="check_amount"
                                            id="check2" value="0">
                                        <label class="form-check-label m-0" for="flexRadioDefault2">
                                            Fix Off
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group" id="check">

                                </div>
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <label for="#" class="mb-4">Add Banner Image</label>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="upload-image-box-v1">
                                                <label for="brandLogo1" class="brandLogo bg-white" style="width: 168px;">
                                                    <img alt="" id="brandLogoImg1" class="uploadimage">
                                                    <input name="banner_img1" type="file" id="brandLogo1"
                                                        hidden=""
                                                        onchange="document.getElementById('brandLogoImg1').src = window.URL.createObjectURL(this.files[0])">
                                                    <i class="bi bi-camera-fill font-40px opacity-05"
                                                        style="color: inherit;"></i>
                                                    <p>Upload Your logo
                                                    </p>
                                                    <p class=" fst-italic"> (250 x 250)</p>
                                                </label>
                                            </div>
                                            <div class="upload-image-box-v1">
                                                <label for="brandLogo2" class="brandLogo bg-white" style="width: 168px;">
                                                    <img alt="" id="brandLogoImg2" class="uploadimage">
                                                    <input name="banner_img2" type="file" id="brandLogo2"
                                                        hidden=""
                                                        onchange="document.getElementById('brandLogoImg2').src = window.URL.createObjectURL(this.files[0])">
                                                    <i class="bi bi-camera-fill font-40px opacity-05"
                                                        style="color: inherit;"></i>
                                                    <p>Upload Your logo
                                                    </p>
                                                    <p class=" fst-italic"> (250 x 250)</p>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><br>
                        <ul class="d-flex align-items-center justify-content-center flex-wrap gap-3">
                            <li>
                                <button class="btn btn-primary extra-btn-padding-80 text-uppercase" type="submit"
                                    value="submit">Submit</button>
                            </li>
                        </ul>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body lgray-bg-1 tipcard">
                            <h6>Tips</h6>
                            <p class=" mb-4">
                                Registration Closing date must be before Campaign starting date. Set the minimum criteria of
                                percentage off or fix amount off or both.
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @push('adminscript')
        <script type="text/javascript">
            $('#check1').on('click', function() {
                $('#check').html('');
                $('#check').append(
                    '<div class="row align-items-center"><div class="col-lg-12"><div class="form-group">' +
                    '<div class="row align-items-center"><div class="col-lg-4"><label for="" class="mb-lg-0">Percentage Off</label></div>'+
                    '<div class="col-lg-8"><input name="off_percent" type="text" class=" form-control" placeholder="%" required></div></div></div></div>'
                )
            });
            $('#check2').on('click', function() {
                $('#check').html('');
                $('#check').append('<div class="row align-items-center"><div class="col-lg-12"><div class="form-group">'+
                '<div class="row align-items-center"><div class="col-lg-4 text-start text-lg-end"><label for="" class="mb-lg-0">Fix Off</label></div><div class="col-lg-8">' +
                '<input name="fix_amount" type="number" class=" form-control" placeholder="Amount" required> </div> </div> </div> </div></div>'
                )
            });
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
    @endpush
