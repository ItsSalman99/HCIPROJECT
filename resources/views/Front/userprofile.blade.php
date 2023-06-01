@extends('layouts.app')
@section('content')
    <section class="pt-5">
        <div class="container">
            <div>
                <h3 class="font-22px font-weight-600 m-0">Profile</h3>
            </div>
            <div class="row mt-4 mt-md-5 gx-4 gx-md-5 gy-3 gy-md-0">
                <div class="col-md-3">
                    <div class="tabs-v1">
                        <!-- Nav tabs -->
                        <ul class="nav nav-pills flex-column gap-3" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                    type="button" role="tab" aria-controls="home" aria-selected="true"><img
                                        src="assets/images/icons/user.svg" alt=""> Profile </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                    type="button" role="tab" aria-controls="profile" aria-selected="false"><img
                                        src="assets/images/icons/location2.svg" alt=""> Address</button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="cover-profile-content">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h5 class="font-16px font-weight-600">Account <span class="primary-text">Information</span>
                                </h5>
                                <br>
                                <form id="profileForm" class="mt-2">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ Session::get('customer')['id'] }}">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="form-group m-0">
                                                <input autocomplete="off" value="{{ Session::get('customer')['name'] }}"
                                                    name="name" type="text" class="form-control"
                                                    placeholder="Full Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group m-0">
                                                <input autocomplete="off" value="{{ Session::get('customer')['email'] }}"
                                                    name="email" type="email" class="form-control" placeholder="E-mail">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group m-0">
                                                <input value="{{ Session::get('customer')['phone'] }}" autocomplete="off"
                                                    name="phone" type="phone" class="form-control" placeholder="Phone">
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-6">
                                            <div class="form-group m-0">
                                                <div class="position-relative">
                                                    <input autocomplete="off" type="password" class="form-control"
                                                        placeholder="***********">
                                                    <ul>
                                                        <li><a href="#"
                                                                class="primary-anchor position-absolute top-50 translate-middle-y"
                                                                style="right: 10px;">Change Password</a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                        </div> --}}
                                        <div class="col-md-12">
                                            <div class="d-flex align-items-center gap-4 mt-3">
                                                <label for="" class="m-0">Gender:</label>
                                                <div class="d-flex align-items-center gap-5 ms-4">
                                                    <div class="form-check d-flex align-items-center gap-2 usergender">
                                                        <input
                                                            {{ Session::get('customer')['gender'] == 'Male' ? 'checked' : '' }}
                                                            value="Male" class="form-check-input mt-0" type="radio"
                                                            name="gender" id="flexRadioDefault1">
                                                        <label class="form-check-label m-0" for="flexRadioDefault1">
                                                            Male
                                                        </label>
                                                    </div>
                                                    <div class="form-check d-flex align-items-center gap-2 usergender">
                                                        <input value="Female"
                                                            {{ Session::get('customer')['gender'] == 'Female' ? 'checked' : '' }}
                                                            class="form-check-input mt-0" type="radio" name="gender"
                                                            id="flexRadioDefault2">
                                                        <label class="form-check-label m-0" for="flexRadioDefault2">
                                                            Female
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <br>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="text-center mt-4">
                                                <button id="profileBtn" type="submit"
                                                    class="btn btn-primary extra-btn-padding-70  text-uppercase">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <form id="addressForm">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ Session::get('customer')['id'] }}">
                                    <h5 class="font-16px font-weight-600">Address </h5>
                                    <br>
                                    <ul class="useraddress-list">
                                        @php
                                            $i = 0;
                                        @endphp
                                        @foreach ($customer as $customers)
                                            @php
                                                $i += 1;
                                            @endphp
                                            <li>
                                                <div class="form-check d-flex align-items-start gap-2 usergender">
                                                    <input data-id="{{ $customers->id }}"
                                                        class="form-check-input mt-0 address" type="radio"
                                                        name="active" id="address{{ $i }}"
                                                        {{ $customers->active == 1 ? 'checked' : '' }}>

                                                    <label class="form-check-label m-0" for="address{{ $i }}">
                                                        Address # {{ $i }}:
                                                        <div
                                                            class="userlocation d-flex align-items-center gap-2 gap-md-5 flex-wrap">
                                                            <p>{{ $customers->address }} ({{ $customers->zip }})</p>
                                                        </div>
                                                    </label>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <br>
                                    <br>

                                    <h5 class="font-16px font-weight-600">Add New <span
                                            class="primary-text">Address</span></h5>
                                    <br>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="form-group m-0">
                                                <div class="" style="width:100%;">
                                                    <select name="province" id="province" class="form-control">
                                                        <option value="">Select Province</option>
                                                        @foreach ($provinces as $pro)
                                                            <option value="{{ $pro->id }}" <?php if(Session::get('customer')['province'] == $pro->id){ echo 'selected'; } ?>>{{ $pro->province_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group m-0">
                                                <select name="city" id="city" class="form-control">
                                                        <option value="">Select City</option>
                                                        @foreach ($cities as $city)
                                                            <option value="{{ $city->id }}" <?php if(Session::get('customer')['city'] == $city->id){ echo 'selected'; } ?>>{{ $city->city_name }}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group m-0">
                                                <input name="address" type="text" class="form-control"
                                                    placeholder="Add new address">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group m-0">
                                                <input name="zip" type="zip" class="form-control"
                                                    placeholder="Zip">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="text-center mt-4">
                                                <button type="submit" id="addressBtn"
                                                    class="btn btn-primary extra-btn-padding-70  text-uppercase">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('js/fancybox/fancybox.umd.js') }}"></script>

    <script src="{{ asset('js/title.js/title.js') }}"></script>

    <script src="{{ asset('js/swiper-slider/swiper-bundle.js') }}"></script>

    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @stack('head')

    <script>
        $('#province').on('change', function() {

            var provinceId = $(this).val();
            $.ajax({
                url: '{{ route('front.index') }}'+ '/getProvinceCity/' + provinceId,
                type: 'GET',
                processData: false,
                contentType: false,
                success: function(res) {
                    if (res.status == true) {
                        $.each(res.data, function(index, item) {
                            $('#city').val(item.city_name);
                        })
                    }
                }
            })
        })
        $('#profileForm').on('submit', function(e) {
            e.preventDefault()
            $('#profileBtn').empty().append('Please Wait...');
            $('#profileBtn').css({
                'cursor': 'not-allowed',
                'background': 'transparent',
                'color': 'var(--primary-clr)',
                'border': '1px solid var(--primary-clr)'
            })
            $('#profileBtn').attr('disabled', true)
            var formData = new FormData(this);

            $.ajax({
                url: "{{ route('front.profile.update') }}",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                cache: false,

                success: function(res) {
                    if (res.status == true) {
                        swal(res.msg, {
                            icon: 'success'
                        })
                        $('#profileBtn').css({
                            'cursor': 'pointer',
                            'background': 'var(--primary-clr)',
                            'color': 'white',
                            'border': '1px solid var(--primary-clr)'
                        })
                        $('#profileBtn').attr('disabled', false)
                        $('#profileBtn').empty().append('Update');
                    }
                }
            })
        })
    </script>

    <script>
        $('#addressForm').on('submit', function(e) {
            e.preventDefault()
            $('#addressBtn').empty().append('Please Wait...');
            $('#addressBtn').css({
                'cursor': 'not-allowed',
                'background': 'transparent',
                'color': 'var(--primary-clr)',
                'border': '1px solid var(--primary-clr)'
            })
            $('#addressBtn').attr('disabled', true)
            var formData = new FormData(this);

            $.ajax({
                url: "{{ route('front.profile.address') }}",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                cache: false,

                success: function(res) {
                    if (res.status == true) {
                        swal(res.msg, {
                            icon: 'success'
                        }).then(() => {
                            window.location.reload()
                        })
                        $('#addressBtn').css({
                            'cursor': 'pointer',
                            'background': 'var(--primary-clr)',
                            'color': 'white',
                            'border': '1px solid var(--primary-clr)'
                        })
                        $('#addressBtn').attr('disabled', false)
                        $('#addressBtn').empty().append('Update');
                    }
                }
            })
        })
    </script>

    <script>
        var address = document.getElementsByClassName('address')
        for (let i = 0; i < address.length; i++) {
            address[i].addEventListener('click', function() {
                var address_id = this.getAttribute('data-id');
                $.ajax({
                    url: 'activeAddress/' + address_id,
                    type: 'GET',
                    processData: false,
                    contentType: false,
                    cache: false,

                    success: function(res) {
                        if (res.status == true) {
                            swal(res.msg, {
                                icon: 'success'
                            })
                        }
                    }
                })
            })
        }
    </script>
@endsection
