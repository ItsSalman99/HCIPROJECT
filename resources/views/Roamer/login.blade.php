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

    <link href="{{ asset('assets/admin/vendor/css/bootstrap/bootstrap.min.css')}}" rel="stylesheet"  />

    <!-- compulsory global.css -->
    <link rel="stylesheet" href="{{ asset('assets/admin/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/sass/utility/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/media.css') }}">

    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- icons -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/css/bootstrap/icons/bootstrap-icons.css') }}" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="login-register-body">
    <div class="login-register-topbar">
        <div class="container">
            <ul>
                <li><a href="{{ route('front.index') }}"><svg xmlns="http://www.w3.org/2000/svg" width="19" height="10" viewBox="0 0 19 10">
                            <path d="M0.217693 5.96061C0.217916 5.96083 0.218102 5.96109 0.218361 5.96131L4.09644 9.78583C4.38697 10.0723 4.85688 10.0713 5.14608 9.78333C5.43523 9.49542 5.43412 9.02975 5.14359 8.74321L2.53985 6.17548H18.2578C18.6677 6.17548 19 5.84621 19 5.44C19 5.03379 18.6677 4.70452 18.2578 4.70452H2.53988L5.14355 2.13679C5.43408 1.85025 5.43519 1.38458 5.14604 1.09667C4.85684 0.808693 4.38689 0.807701 4.0964 1.09417L0.218325 4.91869C0.218102 4.91891 0.217915 4.91917 0.217655 4.91939C-0.0730228 5.20689 -0.072094 5.67407 0.217693 5.96061Z" fill="white" />
                        </svg> Back To Home</a></li>
            </ul>
        </div>
    </div>
    @error('notverified')
        <p>Your Profile is pending for apporoval. Our Roamer Guide will contact you soon before approval.</p>
    @enderror
    <div class="login-register-outer">
        <div class="login-register-inner">
            <img src="{{asset('assets/admin/images/logo-dark.png')}}" alt="">
            <div class="form-area">
                <div class="card">
                    <div class="card-body">
                        <h4 class=" card-title text-center">Sign in</h4>
                        <br>
                        <br>
                        <form action="{{ route('admin.loginpost') }}" id="roamersignup" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" placeholder="Enter email or phone number">
                            </div>
                            <div class="form-group">
                                <div class=" position-relative">
                                    <input id="password-field" type="password" name="password" class="form-control" placeholder="Enter your Password" required>
                                    <i class="toggle-password bi bi-eye position-absolute top-50 translate-middle-y font-20px opacity-06" style="right: 10px; cursor:pointer " toggle="#password-field"></i>
                                </div>
                            </div>
                            <div class="text-end">
                                <ul>
                                    <li><a href="javascript:void(0)" class=" black-anchor opacity-07 font-weight-400 hover-opacity-09">Recovery Password</a></li>
                                </ul>
                            </div>
                            <br>
                            <br>
                            <!-- <button class="btn btn-primary d-block w-100 text-uppercase font-weight-600 py-3" type="submit">Sign In</button> -->
                            <div class="text-center">
                                <button type="submit" name="submit" class="btn btn-primary d-block w-100 text-uppercase font-weight-600 py-3">Sign In</button>
                            </div>
                            <br>
                            <br>
                            <ul class=" text-center">
                                <li><span class=" opacity-07 font-weight-400">If you don’t have an account, </span><a href="{{ route('admin.signup')}}" class=" primary-anchor text-uppercase">BECOME a Seller</a></li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <ul class="d-flex align-items-center justify-content-center gap-4">
                <li><a href="help-center.php">Help Center </a></li>
                <li><a href="roamer-support.php">Roamer Support </a></li>
            </ul>
        </div>
    </div>

    <!-- bootstrap js file -->
    <script src="{{ asset('assets/admin/vendor/js/jquery-3.6.0.min.js') }}"></script>
    <!-- <script src="vendor/js/bootstrap/popper.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/admin/vendor/js/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/main.js') }}"></script>


    <script>
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
