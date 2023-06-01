<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <meta name="robots" content="index, follow" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Gapconcepts" />
    <meta name="copyright" content="" />

    <link href="{{ asset('assets/admin/vendor/css/bootstrap/bootstrap.min.css') }}" rel="stylesheet" />
    {{-- <link href="vendor/css/bootstrap/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" /> --}}
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/css/intel/intlTelInput.min.css') }}">
    <!-- compulsory global.css -->
    <link rel="stylesheet" href="{{ asset('assets/admin/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/sass/utility/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/media.css') }}">

    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- icons -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/css/bootstrap/icons/bootstrap-icons.css') }}" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="login-register-body">
    <div id="adderrortoaster"
        class='position-fixed toast align-items-center text-bg-primary border-0 fade p-2 bg-danger' role="alert"
        aria-live="assertive" aria-atomic="true" style='top: 40px; left: 20px; z-index: 9999'>
        <div class="d-flex">
            <div class="toast-body font-16px text-white" id="title">Something went wrong!</div>
        </div>
    </div>
    <div class="login-register-topbar">
        <div class="container">
            <ul>
                <li><a href="{{ route('front.index') }}"><svg xmlns="http://www.w3.org/2000/svg" width="19"
                            height="10" viewBox="0 0 19 10">
                            <path
                                d="M0.217693 5.96061C0.217916 5.96083 0.218102 5.96109 0.218361 5.96131L4.09644 9.78583C4.38697 10.0723 4.85688 10.0713 5.14608 9.78333C5.43523 9.49542 5.43412 9.02975 5.14359 8.74321L2.53985 6.17548H18.2578C18.6677 6.17548 19 5.84621 19 5.44C19 5.03379 18.6677 4.70452 18.2578 4.70452H2.53988L5.14355 2.13679C5.43408 1.85025 5.43519 1.38458 5.14604 1.09667C4.85684 0.808693 4.38689 0.807701 4.0964 1.09417L0.218325 4.91869C0.218102 4.91891 0.217915 4.91917 0.217655 4.91939C-0.0730228 5.20689 -0.072094 5.67407 0.217693 5.96061Z"
                                fill="white" />
                        </svg> Back To Home</a></li>
            </ul>
        </div>
    </div>
    <div class="login-register-outer register-width">
        <div class="login-register-inner">
            <img src="{{ asset('assets/admin/images/logo-dark.png') }}" alt="">
            <div class="form-area">
                <div class="card">
                    <div class="card-body">
                        <h4 class=" card-title text-center">Sign up</h4>
                        <br>
                        @if (Session::has('msg'))
                            <div>
                                <p class="alert alert-danger">{{ Session('msg') }}</p>
                            </div>
                        @endif
                        <br>
                        <p class="text-center fst-italic">Individual will need Personal Identity card and at least 18
                            years old in order to sell as <br> Individual on BazaarOnline</p>
                        <br>
                        <br>
                        <form id="signUpForm">
                            @csrf
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="first_name" class=" form-control"
                                            placeholder="First Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="last_name" class=" form-control"
                                            placeholder="Last Name" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="email" name="email" class=" form-control" placeholder="Email"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class=" position-relative">
                                            <input id="password-field1" type="password" name="password"
                                                class="form-control" placeholder="Password">
                                            <i class="toggle-password bi bi-eye position-absolute top-50 translate-middle-y font-20px opacity-06"
                                                style="right: 10px; cursor:pointer " toggle="#password-field1"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class=" position-relative">
                                            <input id="password-field2" type="password" name="cpassword"
                                                class="form-control" placeholder="Confirmed Password">
                                            <i class="toggle-password bi bi-eye position-absolute top-50 translate-middle-y font-20px opacity-06"
                                                style="right: 10px; cursor:pointer " toggle="#password-field2"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <br>
                                    <br>
                                    <h4 class=" card-title">Present Address</h4>
                                    <br>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="address" name="address" class="form-control"
                                            placeholder="Street Address" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="nearby_market" class="form-control"
                                            placeholder="Nearby Market" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="province" id="province" class="form-control" required>
                                            <option value="">Select Province</option>
                                            @foreach ($province as $pro)
                                                <option value="{{ $pro->id }}">{{ $pro->province_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="city" id="city" class="form-control" required>
                                            <option value="">Select City</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class=" form-control" name="mobile_model"
                                            placeholder="Enter Name of Smartphone Mobile Model You Have" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <br>
                                    <br>
                                    <h4 class=" card-title">Verify Number</h4>
                                    <br>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="number" id="verifyphone" name="phone"
                                            class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="text-center">
                                <label for="policy" class="font-weight-500">
                                    <input type="checkbox" name="policy" class="form-check-input me-1"
                                        id="policy" required>
                                    I agree to the <a href="{{ route('terms') }}" class=" primary-anchor">Terms</a>
                                    and
                                    <a href="{{ route('privacy') }}" class=" primary-anchor"> Privacy Policy</a>.
                                </label>
                            </div>
                            <br>
                            <br>
                            <div class="text-center">
                                <button id="submit_button"
                                    class="btn btn-primary width-100 width-md-50 justify-content-center text-uppercase font-weight-600 py-3"
                                    type="submit" value="Submit">Sign up</button>
                            </div>
                            <br>
                            <br>
                            <ul class=" text-center">
                                <li><span class=" opacity-07 font-weight-400">If you have an account, </span><a
                                        href="{{ route('roamer.login') }}" class="primary-anchor text-uppercase">SIGN
                                        IN</a></li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="requestAccountModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content border-radius-15px">

                <div class="card-body p-3 p-md-5 text-center">
                    <h3 class=" font-weight-600">Request For <span class=" primary-text">Account</span></h3>
                    <br>

                    <p>We have received your request to become a roamer. Our Roamer Guide will contact you soon before
                        approval.</p>
                    <br>
                    <br>
                    <!-- <button type="button" class=" btn btn-primary extra-btn-padding-40" data-bs-dismiss="modal">OK</button> -->
                    <a href="{{ route('home') }}" class="btn btn-primary extra-btn-padding-40">OK</a>
                </div>

            </div>
        </div>
    </div>


    <!-- bootstrap js file -->
    <script src="{{ asset('assets/admin/vendor/js/jquery-3.6.0.min.js') }}"></script>
    <!-- <script src="vendor/js/bootstrap/popper.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="{{ asset('assets/admin/vendor/js/intel/intlTelInput.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/js/intel/utils.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/js/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/main.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#signUpForm').validate({ // initialize the plugin
                rules: {
                    phone: {
                        required: true,
                    },
                    password: {
                        minlength: 5,
                    },
                    cpassword: {
                        minlength: 5,
                        equalTo: "#password-field1"
                    }
                },
            });
        });

        $('#signUpForm').on('submit', function(e) {

            e.preventDefault();

            var formData = new FormData(this);
            $('#submit_button').css({
                'cursor': 'not-allowed',
                'background': 'transparent',
                'color': 'var(--bs-primary)',
                'border': '1px solid var(--bs-primary)'
            })
            $('#submit_button').html('SIGNING UP ...');

            $.ajax({
                url: '/signup',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {
                    if (response.status == true) {
                        $('#submit_button').css({
                            'cursor': 'pointer',
                            'background': 'var(--primary-clr)',
                            'color': 'white',
                            'border': '1px solid var(--primary-clr)'
                        })
                        $('#submit_button').html('SIGN UP');
                        $('#requestAccountModal').modal('show');
                    } else {

                        $('#adderrortoaster').addClass('show');
                        $('#title').html(response.msg);

                        $('#submit_button').css({
                            'cursor': 'pointer',
                            'background': 'var(--primary-clr)',
                            'color': 'white',
                            'border': '1px solid var(--primary-clr)'
                        })
                        $('#submit_button').html('SIGN UP');
                    }
                }
            })

            setTimeout(function() {
                $('#adderrortoaster').removeClass('show')
            }, 200);
        })
    </script>

    <script>
        $('#province').on('change', function() {
            var provinceId = $(this).val();
            document.getElementById('city').innerHTML = ' <option value="">Select City</option> ';
            $.ajax({
                url: '/getProvinceCity/' + provinceId,
                type: 'GET',
                processData: false,
                contentType: false,
                success: function(res) {
                    if (res.status == true) {
                        $.each(res.data, function(index, item) {
                            document.getElementById('city').innerHTML +=
                                '<option value="' +
                                item.id + '">' + item.city_name + '</option>';
                        })
                    }
                    console.log(res);
                }
            })
        })
    </script>


    <script>
        // $("#roamersignup").submit(function(e) {
        //     e.preventDefault();
        //     $('#submit_button').prop('disabled', true);
        //     if ($("#password-field1").val() != $("#password-field2").val()) {
        //         alert("Password doesn't match");
        //         $('#submit_button').prop('disabled', false);
        //     } else {
        //         if ($('#province').val() == "") {
        //             alert('Please Select Province');
        //             $('#submit_button').prop('disabled', false);
        //         } else {
        //             if ($('#city').val() == "") {
        //                 alert('Please Select City');
        //                 $('#submit_button').prop('disabled', false);
        //             } else {
        //                 var data = $('#roamersignup').serialize();
        //                 $.post("/signup", data,
        //                     function(data, textStatus, jqXHR) {
        //                         if (data.success) {
        //                             $('#requestAccountModal').modal('show');
        //                         } else {
        //                             alert('something wen wrong. Please try again later.');
        //                             $('#submit_button').prop('disabled', false);
        //                         }
        //                     },
        //                     "json"
        //                 );
        //             }
        //         }
        //     }
        // });

        var input = document.querySelector("#verifyphone");
        window.intlTelInput(input, {
            onlyCountries: ['pk']
        });
        $(".toggle-password").click(function() {
            $(this).toggleClass("bi-eye bi-eye-slash-fill");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>


</body>

</html>
