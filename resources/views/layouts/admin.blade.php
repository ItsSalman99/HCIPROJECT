<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Admin</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="robots" content="index, follow" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Bazaar" />
    <meta name="copyright" content="" />

    <link href="{{ asset('assets/admin/vendor/css/bootstrap/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- data table -->
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/css/datatable/dataTables.bootstrap5.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/css/datatable/select.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/css/datatable/responsive.bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/css/datatable/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/css/multiple-select/bootstrap-multiselect.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/css/datetime/jquery.datetimepicker.min.css') }}" />
    <!-- slider -->
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/css/swiperslider/swiper-bundle.min.css') }}">
    {{-- <link rel="stylesheet" href="{{asset('assets/admin/vendor/select2/css/select2.min.css')}}"> --}}
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
    {{-- Select 2 --}}

    <link rel="stylesheet" href="{{ asset('assets/admin/css/select2-bootstrap-5-theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/select2-bootstrap-5-theme.min.css.map') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/select2-bootstrap-5-theme.min.scss') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/select2.min.css') }}">

    @push('extra-styles')
    @endpush

</head>

<body>
    <!-- start side bar -->
    <!-- <div class="dot-overtaking"></div> -->
    <div id="addsuccesstoaster"
        class='position-fixed toast align-items-center text-bg-primary border-0 fade p-2 primary-bg' role="alert"
        aria-live="assertive" aria-atomic="true" style='top: 40px; right: 20px; z-index: 9999'>
        <div class="d-flex">
            <div class="toast-body font-16px text-white" id="title"></div>
        </div>
    </div>
    <div id="layoutSidenav">

        @include('layouts.sidebar');
        {{-- Include Side bar --}}

        <div id="layoutSidenav_content">
            <main>
                {{-- ADMIN SIDEBAR IN LAYOUTS FOLDER --}}
                @include('layouts.navbar')
                {{-- Main Content --}}

                @yield('content')

                {{-- <div class="bubble-chat-container">
                    <div class="bubble-chat-box">
                        <div class="bubble-chat-header d-flex align-items-center justify-content-between">
                            <h6 class=" font-18px font-weight-600 m-0">Chat</h6>
                            <ul>
                                <li><a href="javascript:void(0);" class="close-bubble-container"><i
                                            class="material-icons">
                                            close
                                        </i></a></li>
                            </ul>
                        </div>
                        <div class="bubble-chat-content">
                            <div class="empty-chat">
                                <img src="{{ asset('assets/admin/images/bubble-chat.svg') }}" alt="">
                                <div>
                                    <h5 class=" font-22px font-weight-600 mb-4">Your inbox <span class="primary-text">is
                                            empty.</span></h5>
                                    <p>Once you start a conversation, you will see it here.</p>
                                </div>
                            </div>
                        </div>
                        <div class="bubble-chat-text">
                            <input type="text" class=" form-control" placeholder="Type a message">
                            <ul>
                                <li><a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="17"
                                            height="15" viewBox="0 0 17 15">
                                            <path
                                                d="M15.9876 5.81912L2.27154 0.12671C1.69371 -0.113128 1.0409 -0.00762198 0.567921 0.401916C0.0949418 0.81152 -0.102883 1.44263 0.0517114 2.04893L1.27256 6.83746H7.24999C7.52505 6.83746 7.74807 7.06049 7.74807 7.33563C7.74807 7.61074 7.52508 7.8338 7.24999 7.8338H1.27256L0.0517114 12.6223C-0.102883 13.2286 0.0949086 13.8597 0.567921 14.2693C1.04186 14.6797 1.69474 14.7839 2.27158 14.5445L15.9876 8.85214C16.6121 8.59297 17 8.01187 17 7.33563C17 6.65939 16.6121 6.07826 15.9876 5.81912Z" />
                                        </svg></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="bubble-chat-icon">
                        <a href="javascript:void(0);" class="ms-auto"><i class="bi bi-chat-fill"></i></a>
                    </div>
                </div> --}}

                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <div class="copyright">
                    <div class="container">
                        <ul class="d-flex align-items-center justify-content-center gap-4">
                            <li><a href="{{ route('help-center') }}">Help Center </a></li>
                            <li><a href="{{ route('roamer-support') }}">Roamer Support </a></li>
                        </ul>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="{{ asset('assets/admin/vendor/js/jquery-3.6.0.min.js') }}"></script>

    <!-- bootstrap js file -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="{{ asset('assets/admin/vendor/js/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/js/fancybox/fancybox.umd.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/js/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/js/datatable/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/js/datatable/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/js/datatable/dataTables.responsive.min.js') }}"></script>
    {{-- <script src="{{asset('assets/admin/vendor/select2/js/select2.full.min.js')}}"></script> --}}

    <script src="{{ asset('assets/admin/vendor/js/datatable/select2.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/js/datatable/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/js/multiple-select/bootstrap-multiselect.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/js/datetime/jquery.datetimepicker.full.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/js/swiperslider/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/js/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/admin/js/main.js ') }}"></script>
    <script src="{{ asset('assets/admin/js/select2.full.min.js') }}"></script>
    @include('sweetalert::alert')
    <script src="{{ asset('assets/js/firebase-cdn.js') }}"></script>

    @stack('extra-js')

    <script>
        if (!firebase.apps.length) {

            const FirebaseConfig = {
                apiKey: "AIzaSyBleVNwoUkydSnpNTDjFl72SlMF32MpjnM",
                authDomain: "chat-37976.firebaseapp.com",
                databaseURL: "https://chat-37976-default-rtdb.firebaseio.com",
                projectId: "chat-37976",
                storageBucket: "chat-37976.appspot.com",
                messagingSenderId: "396872413257",
                appId: "1:396872413257:web:171d762fdf4afb8dfacf98",
                measurementId: "G-Q5GDKTWTZZ"
            };

            app = firebase.initializeApp(FirebaseConfig);
        }

    </script>
    <script>
        $('.select-box').select2({
            theme: 'bootstrap-5',
            templateResult: formatState,
            templateSelection: formatState
            // dropdownParent: $(".modal")
            // allowClear: true
            // dropdownCssClass: "testing",
        });
        $(".select-box-tags").select2({
            theme: 'bootstrap-5',
            tags: true,
            // tags: ["red", "green", "blue"]
        });
        $('.select2Checkbox').select2({
            theme: 'bootstrap-5',
            templateResult: formatState,
            templateSelection: formatState,
            dropdownCssClass: "CheckboxResult",
        });
        $('.modal').on('shown.bs.modal', function(e) {
            $(this).find('.select-box').select2({
                theme: 'bootstrap-5',
                dropdownParent: $(this).find('.modal-content'),
                templateResult: formatState,
                templateSelection: formatState,
            });
            $(this).find('.select2Checkbox').select2({
                theme: 'bootstrap-5',
                dropdownParent: $(this).find('.modal-content'),
                templateResult: formatState,
                templateSelection: formatState,
                dropdownCssClass: "CheckboxResult",
            });
        })

        function formatState(opt) {
            if (!opt.id) {
                return opt.text;
            }
            var optimage = $(opt.element).attr('data-image');
            if (!optimage) {
                return opt.text;
            } else {
                var $opt = $(
                    '<span  class="d-flex align-items-center gap-2 flex-row-reverse justify-content-between" style="min-width:75px;"><img src="' +
                    optimage + '" style="width:20px" /> ' + opt.text + '</span>'
                );
                return $opt;
            }
        };
    </script>
    <script>
        function markRead(id) {
            $.ajax({
                url: '/admin/notifications/markRead/'+id,
                method: 'GET',
                success: function(response) {
                    if(response.status == 200)
                    {
                        $('#countNotification').addClass('bg-');
                        $('#countNotification').html(0)
                    }
                }
            });
        }
    </script>
    @stack('adminscript')

</body>

</html>
