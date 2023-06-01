@extends('layouts.admin')
@section('content')
    <div class="cover-all-content">
        @if (checkRoamerVendors(Auth::user()->id))
            <div class="alert alert-warning p-4 alert-dismissible fade show shadow-sm d-flex gap-4" role="alert">
                <div>
                    <i class="bi bi-exclamation-square-fill" style="font-size: 40px;"></i>
                </div>
                <div>
                    <h4 class="alert-heading">Welcome {{ Auth::user()->getName() }}!</h4>
                    <p class="m-0">
                        Dear {{ Auth::user()->getName() }}! welcome to your dashboard.
                        To continue selling and access all roamer features of your Bazar dashboard,
                        please fill out your account details and add a vendor and a product first.
                    </p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
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
                            <button class="nav-link active" id="tabv1-1-tab" data-bs-toggle="tab" data-bs-target="#tabv1-1"
                                type="button" role="tab" aria-controls="tabv1-1" aria-selected="true">

                                @if (auth()->user()->user_type == 2)
                                    Roamer Account
                                @else
                                    Admin Account
                                @endif
                            </button>
                        </li>
                        @if (auth()->user()->user_type == 2)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="tabv1-2-tab" data-bs-toggle="tab" data-bs-target="#tabv1-2"
                                    type="button" role="tab" aria-controls="tabv1-2" aria-selected="false">Personal
                                    Information</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="tabv1-3-tab" data-bs-toggle="tab" data-bs-target="#tabv1-3"
                                    type="button" role="tab" aria-controls="tabv1-3" aria-selected="false">Bank
                                    Account</button>
                            </li>
                        @endif
                    </ul>
                </div>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="tabv1-1" role="tabpanel" aria-labelledby="tabv1-1-tab">
                        <div class="row g-3">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('accounts.update') }}" method="POST"
                                            enctype="multipart/form-data" class="Horizontal-label white-bg-clr-02">
                                            @csrf
                                            <div class="row justify-content-center align-items-end mb-3">
                                                <div class="col-lg-8 order-1 order-lg-0">
                                                    <div class="row align-items-center">
                                                        <div class="col-lg-3">
                                                            <label for="">Roamer ID</label>
                                                        </div>
                                                        <div class="col-lg-9">
                                                            <p class=" fst-italic m-0">{{ Auth::user()->id }}</p>
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
                                                                <div
                                                                    class="d-flex align-items-center flex-wrap flex-lg-nowrap gap-3">
                                                                    <input type="text" name="email"
                                                                        class=" form-control"
                                                                        value="{{ Auth::user()->email }}">
                                                                    <a href="javascript:void(0)"
                                                                        class=" btn btn-primary extra-btn-padding-25"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#changepasswordmodal">
                                                                        Change Password
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-lg-4 d-flex align-items-center justify-content-center justify-content-lg-end">
                                                    <div class="upload-image-box-v1">
                                                        <label for="brandLogo1" class="brandLogo bg-white"
                                                            style="width: 164px;">
                                                            <img alt="" id="brandLogoImg1"
                                                                src="{{ Auth::user()->profile_img }}" class="uploadimage">
                                                            <input type="file" id="brandLogo1" hidden name="profile_img"
                                                                onchange="document.getElementById('brandLogoImg1').src = window.URL.createObjectURL(this.files[0])">
                                                            <i class="bi bi-camera-fill font-40px opacity-05"
                                                                style="color: inherit;"></i>
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
                                                                <input type="text" class=" form-control"
                                                                    name="phone" value="{{ Auth::user()->phone }}">
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
                                                                <input type="text" class=" form-control"
                                                                    name="whatsapp_phone"
                                                                    value="{{ Auth::user()->whatsapp_phone }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                            @if (auth()->user()->user_type == 2)
                                                <div class="row align-items-center">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <div class="row align-items-center">
                                                                <div class="col-lg-4">
                                                                    <label for="">Holiday Duration</label>
                                                                </div>
                                                                <div class="col-lg-8">
                                                                    <div class="d-flex align-items-center gap-1">
                                                                        <div
                                                                            class="form-group m-0 StartEndDate-v1 holiday-date">
                                                                            <input type="text" class="reviewStartDate"
                                                                                name="holiday_start"
                                                                                value="{{ Auth::user()->holiday_start }}"
                                                                                placeholder="Start Date" />
                                                                            <span>-</span>
                                                                            <input type="text" class="reviewEndDate"
                                                                                value="{{ Auth::user()->holiday_end }}"
                                                                                name="holiday_end" placeholder="End Date" />
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
                                                                        <div
                                                                            class="form-check d-flex align-items-center gap-2 primary-checkbox">
                                                                            <input class="form-check-input mt-0"
                                                                                type="radio" name="holiday_mode"
                                                                                <?php if (Auth::user()->holiday_mode == 1) {
                                                                                    echo 'checked';
                                                                                } ?> id="flexRadioDefault1"
                                                                                value="1">
                                                                            <label class="form-check-label m-0"
                                                                                for="flexRadioDefault1">
                                                                                Yes
                                                                            </label>
                                                                        </div>
                                                                        <div
                                                                            class="form-check d-flex align-items-center gap-2 primary-checkbox">
                                                                            <input class="form-check-input mt-0"
                                                                                <?php if (Auth::user()->holiday_mode == 0) {
                                                                                    echo 'checked';
                                                                                } ?> type="radio"
                                                                                name="flexRadioDefault" id="flexRadioDefault2"
                                                                                value="0">
                                                                            <label class="form-check-label m-0"
                                                                                for="flexRadioDefault2">
                                                                                No
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            <br>
                                            <div class="text-center">
                                                <button class=" btn btn-primary extra-btn-padding-60">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body lgray-bg-1 tipcard">
                                        <h6>Tips</h6>
                                        <p class=" mb-4">Duis aute irure dolor in reprehenderit in voluptate velit esse
                                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tabv1-2" role="tabpanel" aria-labelledby="tabv1-2-tab">

                        <form action="{{ route('accounts.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
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
                                                    <input type="text" class=" form-control" name="cnic_name"
                                                        value="{{ Auth::user()->cnic_name }}">
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
                                                    <input type="text" class=" form-control" name="cnic_address"
                                                        value="{{ Auth::user()->cnic_address }}">
                                                </div>
                                            </div>
                                            <br>
                                            {{-- <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <select name="province" id="province" onchange="clickChange()"
                                                            class="province form-control">
                                                            <option value="">Select Province</option>
                                                            @foreach ($provinces as $pro)
                                                                <option value="{{ $pro->id }}">
                                                                    {{ $pro->province_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <select name="city" id="city" class="form-control">
                                                            <option value="">Select City</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="row align-items-center">
                                                        <div class="col-lg-4">
                                                            <label for="">National ID
                                                                Card Number</label>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" class=" form-control" name="cnic"
                                                                placeholder="CNIC Number"
                                                                value="{{ Auth::user()->cnic_number }}">
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
                                                                    <label for="uploadCNICFront"
                                                                        class="brandLogo bg-white" style="width: 164px;">
                                                                        <img alt="" id="CNIC-Front"
                                                                            src="{{ Auth::user()->cnic_front_img }}"
                                                                            class="uploadimage">
                                                                        <input type="file" id="uploadCNICFront" hidden
                                                                            name="cnic_front_img"
                                                                            onchange="document.getElementById('CNIC-Front').src = window.URL.createObjectURL(this.files[0])">
                                                                        <i class="bi bi-camera-fill font-40px opacity-05"
                                                                            style="color: inherit;"></i>
                                                                        <p>Upload CNIC Photo
                                                                            Front
                                                                        </p>
                                                                    </label>
                                                                </div>

                                                                <div class="upload-image-box-v1">
                                                                    <label for="uploadCNICBack" class="brandLogo bg-white"
                                                                        style="width: 164px;">
                                                                        <img alt="" id="CNIC-Back"
                                                                            src="{{ Auth::user()->cnic_back_img }}"
                                                                            class="uploadimage">
                                                                        <input type="file" id="uploadCNICBack" hidden
                                                                            name="cnic_back_img"
                                                                            onchange="document.getElementById('CNIC-Back').src = window.URL.createObjectURL(this.files[0])">
                                                                        <i class="bi bi-camera-fill font-40px opacity-05"
                                                                            style="color: inherit;"></i>
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
                                                I Acknowledge that excepteur sint occaecat cupidatat non proident, sunt in
                                                culpa
                                                qui officia deserunt mollit anim id est laborum. Duis aute irure dolor in
                                                reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla.

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
                                            <p class=" mb-4">Duis aute irure dolor in reprehenderit in voluptate velit
                                                esse
                                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                                                non
                                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="tabv1-3" role="tabpanel" aria-labelledby="tabv1-3-tab">

                        <form action="{{ route('accounts.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
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
                                                            <input type="text" class=" form-control"
                                                                placeholder="Account Title" name="account_title"
                                                                value="{{ Auth::user()->account_title }}">
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
                                                            <input type="text" class=" form-control"
                                                                placeholder="Account Number" name="account_number"
                                                                value="{{ Auth::user()->account_number }}">
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
                                                            <input type="text" class=" form-control" name="bank_name"
                                                                placeholder="Bank Name"
                                                                value="{{ Auth::user()->bank_name }}">
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
                                                            <input type="text" class=" form-control"
                                                                placeholder="Branch Code" name="branch_code"
                                                                value="{{ Auth::user()->branch_code }}">
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
                                                            <input type="text" class=" form-control"
                                                                placeholder="IBAN" name="IBAN"
                                                                value="{{ Auth::user()->IBAN }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">

                                                <div class="col-lg-8">
                                                    <div class="upload-image-box-v1">
                                                        <label for="uploadcheque_img" class="brandLogo bg-white"
                                                            style="width: 164px;">
                                                            <img alt="" id="cheque_img"
                                                                src="{{ Auth::user()->cheque_img }}" class="uploadimage">
                                                            <input type="file" id="uploadcheque_img" hidden
                                                                name="cheque_img"
                                                                onchange="document.getElementById('cheque_img').src = window.URL.createObjectURL(this.files[0])">
                                                            <i class="bi bi-camera-fill font-40px opacity-05"
                                                                style="color: inherit;"></i>
                                                            <p>
                                                                Upload Cheque Image
                                                            </p>
                                                        </label>
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

                                                I Acknowledge that excepteur sint occaecat cupidatat non proident, sunt in
                                                culpa
                                                qui officia deserunt mollit anim id est laborum. Duis aute irure dolor in
                                                reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla.
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
                                            <p class=" mb-4">Duis aute irure dolor in reprehenderit in voluptate velit
                                                esse
                                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                                                non
                                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="changepasswordmodal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="card-body pt-4">
                        <div class="modal-header">
                            <h5 class="card-title font-18px">Change <span class=" primary-text">Password</span></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body py-4">
                            <form action="{{ route('accounts.updatePassword') }}" method="POST">
                                @csrf

                                <input type="text" id="user_email" name="email" value="{{ Auth::user()->email }}"
                                    hidden>

                                <p>Your new password must be different from previous used passwords.</p>
                                <br>
                                <br>
                                <div class="form-group">
                                    <label for="" class="mb-3">Password</label>
                                    <div class=" position-relative">
                                        <input id="old_password" type="password" name="password" class="form-control"
                                            placeholder="Enter your previous password" required>
                                        <i class="toggle-password bi bi-eye position-absolute top-50 translate-middle-y font-20px opacity-06"
                                            style="right: 10px; cursor:pointer " toggle="#Cpassword-field1"></i>
                                    </div>

                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="" class="mb-3">Confirm Password</label>
                                    <div class=" position-relative mb-2">
                                        <input id="new_password" type="password" name="cpassword" class="form-control"
                                            placeholder="Enter your new password" required>
                                        <i class="toggle-password bi bi-eye position-absolute top-50 translate-middle-y font-20px opacity-06"
                                            style="right: 10px; cursor:pointer " toggle="#Cpassword-field2"></i>
                                    </div>
                                    <p id="CheckPasswordMatch"></p>
                                </div>
                                <div class="text-center mt-5">
                                    <button id="resetBtn" class="btn btn-primary extra-btn-padding-45 text-uppercase"
                                        disabled>
                                        Reset Password
                                    </button>
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
            $('#old_password').on('keyup', function(e) {
                var email = $('#user_email').val();
                $.ajax({
                    method: 'GET',
                    url: '/admin/account-settings/checkPassword/' + email + '/' + $(this).val(),
                    success: function(response) {
                        if (response.status == true) {
                            $('#resetBtn').attr('disabled', false)
                            $('#title').html('Password matched!')
                            setTimeout(function() {
                                $('#addsuccesstoaster').removeClass('show')
                            }, 3000);
                        } else if (response.status == false) {
                            $('#resetBtn').attr('disabled', true)
                            $('#addsuccesstoaster').addClass('show');
                            $('#title').html('Password does not match!')
                            setTimeout(function() {
                                $('#addsuccesstoaster').removeClass('show')
                            }, 3000);
                        }
                    }
                })
            })
        </script>
        <script>
            function clickChange() {
                var provinceId = $(this).val();
                // console.log(provinceId);
                document.getElementById('city').innerHTML = ' <option value="">Select City</option> ';
                // $.ajax({
                //     url: '/getProvinceCity/' + provinceId,
                //     type: 'GET',
                //     processData: false,
                //     contentType: false,
                //     success: function(res) {
                //         if (res.status == true) {
                //             $.each(res.data, function(index, item) {
                //                 document.getElementById('city').innerHTML +=
                //                     '<option selected value="' +
                //                     item.id + '">' + item.city_name + '</option>';
                //             })
                //         }
                //         // console.log(res);
                //     }
                // })
            }
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
