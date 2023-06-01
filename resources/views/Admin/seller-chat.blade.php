@extends('layouts.admin')
@section('content')
    <div class="cover-all-content">
        <div class="d-flex align-items-center justify-content-between flex-wrap">
            <h2 class="section-title">Chat With <span class="primary-text">Admin</span></h2>
        </div>
        <br>
        <br>

        <div class="cover-inner-content">
            <div class="card">
                <div class="card-body pe-3 pe-lg-0">
                    <div class="bazaar-chating">
                        <div>
                            <div class="users-chat position-relative">
                                <div class="previewCard pt-3 d-none" id="previewCard">
                                    <div
                                        class="p-3 rounded-2 d-flex justify-content-center align-items-center position-relative mx-3 primary-bg">
                                        <a href="#" id="crossView"
                                            class="position-absolute top-50 translate-middle-y hover-opacity-06"
                                            style="left: 20px;">
                                            <i class="bi bi-x-lg font-18px text-white"></i>
                                        </a>
                                        <h6 class="m-0 text-white" id="fileUploadName"
                                            style="    max-width: 350px;-webkit-line-clamp: 1;overflow: hidden;display: -webkit-box;text-overflow: ellipsis;-webkit-box-orient: vertical;">
                                            New File Upload
                                        </h6>
                                    </div>
                                    <div class="previewContent my-5" style="height: 450px;">
                                        <img src="{{ asset('assets/images/upload.png') }}" alt="" id="upload-img"
                                            class="h-100 w-70 mx-auto" style="object-fit: contain;">
                                    </div>
                                    <div class="mx-5 px-5">
                                        <form id="chatFileForm" class="d-flex gap-2">
                                            @csrf
                                            <div class=" position-relative flex-1">
                                                <input type="hidden" hidden class="sender_id" name="sender_id"
                                                    value="{{ Auth::user()->id }}">
                                                <input type="hidden" hidden name="sender_name"
                                                    value="{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}">
                                                <input type="hidden" class="receiver_id" hidden name="receiver_id">
                                                <input type="hidden" class="receiver_name" hidden name="receiver_name">
                                                <input type="file" id="upload-myimage" accept=".png, .jpg, .jpeg" hidden
                                                    id="" name="img">
                                            </div>
                                            {{-- <input type="text" class=" form-control bg-white"
                                                placeholder="Type a Message..." id="msgInp" name="msg"
                                                style="min-height: 48px;"> --}}
                                            {{-- <button class=" btn btn-primary"><i class="bi bi-send font-20px"></i></button> --}}
                                        </form>
                                    </div>
                                </div>
                                <div class="chat-header-area pb-2 border-bottom">
                                    <h5 class="font-weight-700 text-uppercase" id="user_name">
                                        {{ App\Models\User::where('user_type', 1)->first()->first_name . ' ' . App\Models\User::where('user_type', 1)->first()->last_name }}
                                    </h5>
                                    <p class="font-weight-500 font-16px" id="type"></p>
                                </div>
                                <div class="user-chats-content" id="msgs">
                                </div>
                                <div class="user-typing-area">
                                    <input type="hidden" class="ID" name="ID"
                                        value="{{ App\Models\User::where('user_type', 1)->first()->id }}" id="">
                                    <form id="chatForm">
                                        <div class="user-typing-area">
                                            @csrf
                                            <div class=" position-relative flex-1">
                                                <input type="text" class=" form-control" placeholder="Type a message"
                                                    name="msg" id="msgInp">
                                                <input type="hidden" hidden class="sender_id" name="sender_id"
                                                    value="{{ Auth::user()->id }}">
                                                <input type="hidden" hidden name="sender_name"
                                                    value="{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}">
                                                <input type="hidden" class="receiver_id" hidden name="receiver_id"
                                                    value="{{ App\Models\User::where('user_type', 1)->first()->id }}">
                                                <input type="hidden" class="receiver_name" hidden name="receiver_name">
                                            </div>
                                            <label role="button" id="uploadfile" for="upload-file">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="19"
                                                    viewBox="0 0 17 19">
                                                    <path
                                                        d="M16.7778 6.70729C16.4827 6.40841 16.0055 6.40974 15.712 6.71021L6.65208 15.9847C5.47667 17.1815 3.56763 17.1815 2.39003 15.9831C1.21332 14.7844 1.21332 12.8406 2.39018 11.6424L11.7182 2.0948C12.4521 1.34765 13.6452 1.34765 14.3811 2.09641C15.1169 2.84554 15.1169 4.06017 14.3809 4.80951L6.65349 12.6774C6.653 12.6779 6.65258 12.6785 6.65208 12.679C6.35769 12.9771 5.88192 12.9767 5.58813 12.6775C5.29385 12.3779 5.29385 11.8923 5.58813 11.5926L9.3181 7.79404C9.61238 7.49434 9.61235 7.00844 9.31799 6.70881C9.02364 6.40917 8.54642 6.4092 8.25214 6.70891L4.52221 10.5074C3.63931 11.4064 3.63931 12.8638 4.52228 13.7628C5.4052 14.6617 6.83657 14.6617 7.71953 13.7628C7.72055 13.7617 7.72136 13.7606 7.72235 13.7595L15.4468 5.89468C16.7714 4.54599 16.7714 2.35961 15.4468 1.01092C14.122 -0.336974 11.9748 -0.336974 10.651 1.01092L1.32291 10.5586C-0.44118 12.3547 -0.44118 15.27 1.32418 17.0684C3.0907 18.8661 5.95392 18.8661 7.71939 17.0685L16.7807 7.79253C17.0742 7.49203 17.0729 7.00618 16.7778 6.70729Z" />
                                                </svg>
                                            </label>
                                            <input type="file" id="upload-file" accept=".pdf" hidden name="file">
                                            <label role="button" id="uploadimg" for="upload-image">

                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-images" viewBox="0 0 16 16">
                                                    <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                                                    <path
                                                        d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z" />
                                                </svg>

                                            </label>
                                            <input type="file" id="upload-image" accept=".png, .jpg, .jpeg" hidden
                                                name="img">
                                            <button type="submit" class="btn btn-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                                                    <path
                                                        d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- //mobile --}}
        <div class="mobile-user-chats">
            <div class="bazaar-chating">
                <div class="users-chat">
                    <div class="chat-header-area d-flex align-items-center gap-3 pb-2 border-bottom">
                        <a href="#" class=" default-black opacity-05 user-chat-remove"><i class="material-icons">
                                chevron_left
                            </i></a>
                        <div>
                            <h5 class="font-weight-700 text-uppercase">John Doe</h5>
                            <p class="font-weight-500 font-16px">Admin</p>
                            <p class="font-15px">Duis autre irure dolor in velit nulla</p>
                        </div>
                    </div>
                    <div class="user-chats-content">
                        <?php for ($i = 1; $i <= 4; $i++) { ?>
                        <div class="message user-chats-box">
                            <p>Hello Admin...<br>
                                <small>June 20, 2020</small>
                            </p>
                        </div>
                        <?php } ?>

                        <div class="message user-chats-file">
                            <div>
                                <a href="#">
                                    <div class="cover-img">
                                        <img src="{{ asset('assets/admin/images/wordfile.png') }}" alt="">
                                    </div>
                                    <p>Duis aute irure dolor in <br>
                                        <small>June 20, 2020</small>
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class="message my-chats-file">
                            <div>
                                <a href="#">
                                    <div class="cover-img">
                                        <img src="{{ asset('assets/admin/images/wordfile.png') }}" alt="">
                                    </div>
                                    <p>Duis aute irure dolor in <br>
                                        <small>June 20, 2020</small>
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class="message user-chats-box">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim id rerum minus, expedita
                                perspiciatis reprehenderit? Aliquam blanditiis voluptatum omnis repudiandae iure ab saepe
                                iste fugit id. Magnam beatae culpa atque voluptatem a neque, cupiditate porro amet nesciunt
                                minus. Sed, similique?<br>
                                <small>June 20, 2020</small>
                            </p>
                        </div>

                        <?php for ($i = 1; $i <= 3; $i++) { ?>
                        <div class="message my-chats-box">
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                pariatur. <br>
                                <small>June 20, 2020</small>
                            </p>
                        </div>
                        <?php } ?>
                        <?php for ($i = 1; $i <= 3; $i++) { ?>
                        <div class="message my-chats-box">
                            <p>Duis aute irure dolor in reprehenderit in voluptate<br>
                                <small>June 20, 2020</small>
                            </p>
                        </div>
                        <?php } ?>
                        <?php for ($i = 1; $i <= 5; $i++) { ?>
                        <div class="message my-chats-box">
                            <p>Hello...<br>
                                <small>June 20, 2020</small>
                            </p>
                        </div>
                        <?php } ?>


                    </div>
                    <div class="user-typing-area">
                        <form action="#">
                            <div class=" position-relative">
                                <input type="text" class=" form-control" placeholder="Type a message">
                                <ul class=" position-absolute top-50 translate-middle-y" style="left: 16px;">
                                    <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="22"
                                                height="22" viewBox="0 0 22 22">
                                                <g>
                                                    <path
                                                        d="M11.0196 16.7447C9.39122 16.7447 7.88488 16.0049 6.88675 14.7148L5.86719 15.5037C7.11132 17.1116 8.98927 18.0338 11.0196 18.0338C13.0499 18.0338 14.9278 17.1116 16.172 15.5037L15.1523 14.7148C14.1542 16.0049 12.6479 16.7447 11.0196 16.7447Z" />
                                                    <path
                                                        d="M18.7782 3.22182C16.7005 1.14418 13.9382 0 11 0C8.06179 0 5.29946 1.14418 3.22182 3.22182C1.14418 5.29946 0 8.06179 0 11C0 13.9382 1.14418 16.7005 3.22182 18.7782C5.29946 20.8558 8.06179 22 11 22C13.9382 22 16.7005 20.8558 18.7782 18.7782C20.8558 16.7005 22 13.9382 22 11C22 8.06179 20.8558 5.29946 18.7782 3.22182ZM17.8666 17.8666C16.0324 19.7008 13.5938 20.7108 11 20.7108C8.40616 20.7108 5.96752 19.7007 4.1334 17.8666C2.29924 16.0325 1.28912 13.5939 1.28912 11C1.28912 8.40616 2.29924 5.96752 4.13336 4.1334C5.96748 2.29928 8.40616 1.28912 11 1.28912C13.5938 1.28912 16.0325 2.29924 17.8666 4.13336C19.7007 5.96748 20.7108 8.40611 20.7108 11C20.7109 13.5939 19.7008 16.0325 17.8666 17.8666Z" />
                                                    <path
                                                        d="M6.89654 10.4923C7.59555 10.4923 8.16418 9.92367 8.16418 9.22467C8.16418 8.52566 7.59555 7.95703 6.89654 7.95703C6.19754 7.95703 5.62891 8.52566 5.62891 9.22467C5.62891 9.92367 6.19754 10.4923 6.89654 10.4923Z" />
                                                    <path
                                                        d="M15.0606 7.95703C14.3616 7.95703 13.793 8.52566 13.793 9.22467C13.793 9.92367 14.3616 10.4923 15.0606 10.4923C15.7596 10.4923 16.3282 9.92367 16.3282 9.22467C16.3282 8.52566 15.7596 7.95703 15.0606 7.95703Z" />
                                                </g>
                                            </svg></a></li>
                                </ul>
                            </div>
                        </form>
                        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="20"
                                viewBox="0 0 21 20">
                                <g>
                                    <path
                                        d="M15.4965 19.2584C15.3311 19.2584 15.1621 19.2374 14.9948 19.1936L1.45781 15.5686C0.413535 15.2805 -0.208863 14.2004 0.0642678 13.1569L1.55238 7.45031C1.64343 7.10008 2.00151 6.88738 2.35334 6.98115C2.70357 7.07219 2.91451 7.43108 2.82266 7.78211L1.33439 13.4896C1.24255 13.8415 1.45172 14.2047 1.80195 14.301L15.3311 17.9243C15.6786 18.0162 16.0375 17.8096 16.1285 17.4638L16.5906 15.5992C16.6783 15.2474 17.0336 15.0337 17.3855 15.1196C17.7375 15.2071 17.9519 15.5625 17.8652 15.9143L17.4013 17.7878C17.1675 18.6745 16.3692 19.2584 15.4965 19.2584Z" />
                                    <path
                                        d="M19.0303 14.0063H5.46181C4.37553 14.0063 3.49219 13.1229 3.49219 12.0367V1.96962C3.49219 0.883347 4.37553 0 5.46181 0H19.0303C20.1166 0 21 0.883347 21 1.96962V12.0367C21 13.1229 20.1166 14.0063 19.0303 14.0063ZM5.46181 1.31308C5.0994 1.31308 4.80527 1.60721 4.80527 1.96962V12.0367C4.80527 12.3991 5.0994 12.6932 5.46181 12.6932H19.0303C19.3928 12.6932 19.6869 12.3991 19.6869 12.0367V1.96962C19.6869 1.60721 19.3928 1.31308 19.0303 1.31308H5.46181Z" />
                                    <path
                                        d="M7.87191 6.12858C6.90634 6.12858 6.12109 5.34333 6.12109 4.37777C6.12109 3.4122 6.90634 2.62695 7.87191 2.62695C8.83747 2.62695 9.62256 3.4122 9.62256 4.37777C9.62256 5.34333 8.83747 6.12858 7.87191 6.12858ZM7.87191 3.94002C7.63019 3.94002 7.43416 4.13621 7.43416 4.37777C7.43416 4.61932 7.63019 4.81551 7.87191 4.81551C8.11346 4.81551 8.30949 4.61932 8.30949 4.37777C8.30949 4.13621 8.11346 3.94002 7.87191 3.94002Z" />
                                    <path
                                        d="M4.16403 13.1135C3.99605 13.1135 3.82791 13.0496 3.70016 12.921C3.4437 12.6646 3.4437 12.2486 3.70016 11.9922L7.65687 8.03546C8.2557 7.43662 9.22993 7.43662 9.82781 8.03546L10.8862 9.09384L14.1373 5.19131C14.4279 4.84284 14.8543 4.64152 15.3069 4.63895C15.7936 4.61187 16.1876 4.83322 16.4807 5.17736L20.8385 10.2615C21.0747 10.5364 21.0424 10.9514 20.7675 11.1877C20.4918 11.4241 20.0777 11.3917 19.8413 11.1168L15.482 6.0309C15.4241 5.96165 15.3533 5.96518 15.3138 5.95284C15.2763 5.95284 15.2035 5.96422 15.1458 6.0325L11.4342 10.4883C11.3159 10.63 11.1436 10.716 10.9598 10.7238C10.7724 10.7342 10.5956 10.6624 10.4659 10.5321L8.8991 8.96513C8.78786 8.85389 8.69601 8.85389 8.58477 8.96513L4.62807 12.921C4.50016 13.0496 4.33217 13.1135 4.16403 13.1135Z" />
                                </g>
                            </svg></a>
                        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="19"
                                viewBox="0 0 17 19">
                                <path
                                    d="M16.7778 6.70729C16.4827 6.40841 16.0055 6.40974 15.712 6.71021L6.65208 15.9847C5.47667 17.1815 3.56763 17.1815 2.39003 15.9831C1.21332 14.7844 1.21332 12.8406 2.39018 11.6424L11.7182 2.0948C12.4521 1.34765 13.6452 1.34765 14.3811 2.09641C15.1169 2.84554 15.1169 4.06017 14.3809 4.80951L6.65349 12.6774C6.653 12.6779 6.65258 12.6785 6.65208 12.679C6.35769 12.9771 5.88192 12.9767 5.58813 12.6775C5.29385 12.3779 5.29385 11.8923 5.58813 11.5926L9.3181 7.79404C9.61238 7.49434 9.61235 7.00844 9.31799 6.70881C9.02364 6.40917 8.54642 6.4092 8.25214 6.70891L4.52221 10.5074C3.63931 11.4064 3.63931 12.8638 4.52228 13.7628C5.4052 14.6617 6.83657 14.6617 7.71953 13.7628C7.72055 13.7617 7.72136 13.7606 7.72235 13.7595L15.4468 5.89468C16.7714 4.54599 16.7714 2.35961 15.4468 1.01092C14.122 -0.336974 11.9748 -0.336974 10.651 1.01092L1.32291 10.5586C-0.44118 12.3547 -0.44118 15.27 1.32418 17.0684C3.0907 18.8661 5.95392 18.8661 7.71939 17.0685L16.7807 7.79253C17.0742 7.49203 17.0729 7.00618 16.7778 6.70729Z" />
                            </svg></a>
                        <a href="#"><i class="material-icons">
                                more_vert
                            </i></a>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @push('adminscript')
        <script src="{{ asset('assets/js/firebase-keys.js') }}"></script>
        {{-- To get messages --}}
        <script>
            function updateMessages() {
                $('#msgs').html('');
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

                const database = firebase.database();


                var user = 'user-chats-box';
                var my = 'my-chats-box';
                id = $('.sender_id').val();
                Id = $('.ID').val();
                $('#msgs').html('');
                var chats = database.ref('chats');
                chats.on('value', function(snapshot) {
                    $('#msgs').html('');
                    snapshot.forEach(function(childSnapshot) {
                        var childData = childSnapshot.val();
                        console.log(id + ' - ' + childData.receiver_id);
                        if (id == childData.receiver_id) {
                            if (childData.sender_id == Id) {
                                if (childData.type == 'file') {

                                    $('#msgs').append('<div class="message user-chats-file"><a href="' +
                                        childData.msg +
                                        '"><div class="cover-img">' +
                                        '<img src="/assets/admin/images/wordfile.png" alt=""></div>' +
                                        '<p><br><small>' + childData.time +
                                        '</small></p></a></div>')
                                } else if (childData.type == 'img') {
                                    $('#msgs').append('<div class="message user-chats-file"><a href="' +
                                        childData.msg +
                                        '"><div class="cover-img">' +
                                        '<img src="' + childData.msg + '" alt=""></div>' +
                                        '<p><br><small>' + childData.time + '</small></p></a></div>'
                                    )
                                } else {
                                    $('#msgs').append('<div class="message user-chats-box" id="msg">' +
                                        '<p>' + childData.msg + '<br><small>' + childData.time +
                                        '</small></p></div>')
                                }

                            } else if (childData.sender_id == id) {
                                if (childData.type == 'file') {

                                    $('#msgs').append('<div class="message user-chats-file"><a href="' +
                                        childData.msg +
                                        '"><div class="cover-img">' +
                                        '<img src="/assets/admin/images/wordfile.png" alt=""></div>' +
                                        '<p><br><small>' + childData.time +
                                        '</small></p></a></div>')
                                } else if (childData.type == 'img') {
                                    $('#msgs').append('<div class="message user-chats-file"><a href="' +
                                        childData.msg +
                                        '"><div class="cover-img">' +
                                        '<img src="' + childData.msg + '" alt=""></div>' +
                                        '<p><br><small>' + childData.time + '</small></p></a></div>'
                                    )
                                } else {
                                    $('#msgs').append('<div class="message user-chats-box" id="msg">' +
                                        '<p>' + childData.msg + '<br><small>' + childData.time +
                                        '</small></p></div>')
                                }

                            }
                        } else if (Id == childData.receiver_id && id == childData.sender_id) {
                            if (childData.type == 'file') {

                                $('#msgs').append('<div class="message my-chats-file"><a href="' +
                                    childData.msg +
                                    '"><div class="cover-img">' +
                                    '<img src="/assets/admin/images/wordfile.png" alt=""></div>' +
                                    '<p><br><small>' + childData.time +
                                    '</small></p></a></div>')
                            } else if (childData.type == 'img') {
                                $('#msgs').append('<div class="message my-chats-file"><a href="' +
                                    childData.msg +
                                    '"><div class="cover-img">' +
                                    '<img src="' + childData.msg + '" alt=""></div>' +
                                    '<p><br><small>' + childData.time + '</small></p></a></div>'
                                )
                            } else {
                                $('#msgs').append('<div class="message my-chats-box" id="msg">' +
                                    '<p>' + childData.msg + '<br><small>' + childData.time +
                                    '</small></p></div>')
                            }
                        }

                    });
                });
            }
        </script>
        <script>
            $('#crossView').on('click', function(e) {

                $('#previewCard').addClass('d-none')
                $('#fileUploadName').html('New File Upload')
                $('#upload-image').val();

                $('#msgInp').removeClass('d-none');
                $('#uploadfile').removeClass('d-none');
                $('#uploadimg').removeClass('d-none');
            })
            $('#upload-image').on('change', function(e) {
                $('#previewCard').removeClass('d-none')
                var file = $(this)[0].files[0];
                var fr = new FileReader();
                console.log($(this)[0].files[0].name);
                $('#fileUploadName').html($(this)[0].files[0].name)
                var formData = new FormData(document.getElementById('chatFileForm'));
                formData.append('img', $(this)[0].files[0]);

                // //fr.readAsBinaryString(file); //as bit work with base64 for example upload to server
                // fr.readAsDataURL(file);
                // console.log(fr.readAsDataURL(file));
                $('#msgInp').addClass('d-none');
                $('#uploadfile').addClass('d-none');
                $('#uploadimg').addClass('d-none');
                console.log('File has uploaded');
            });
            $('#upload-file').on('change', function(e) {
                $('#previewCard').removeClass('d-none')
                var file = $(this)[0].files[0];
                var fr = new FileReader();
                console.log($(this)[0].files[0].name);
                $('#fileUploadName').html($(this)[0].files[0].name)
                var formData = new FormData(document.getElementById('chatFileForm'));
                formData.append('img', $(this)[0].files[0]);

                // //fr.readAsBinaryString(file); //as bit work with base64 for example upload to server
                // fr.readAsDataURL(file);
                // console.log(fr.readAsDataURL(file));
                $('#msgInp').addClass('d-none');
                $('#uploadfile').addClass('d-none');
                $('#uploadimg').addClass('d-none');
                console.log('File has uploaded');
            });
        </script>

        <script>
            $('#chatForm').on('submit', function(e) {
                e.preventDefault();

                var data = new FormData(this);
                console.log(data);
                Id = $('.sender_id').val();
                id = $('.receiver_id').val();
                $.ajax({
                    url: '{{ route('chats.send-message') }}',
                    method: 'POST',
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData: false,
                    data: data,
                    success: function(response) {
                        console.log('send');
                        $('#msgInp').val('');
                        $('#previewCard').addClass('d-none')
                        $('#msgInp').prop('disabled', false)
                        updateMessages();

                        // $('#msgs').append('<div class="message my-chats-box" id="msg">' +
                        //     '<p>' + response.message.msg + '<br><small>' + response.message.time +
                        //     '</small></p></div>')

                    }

                })

            })
        </script>


        <script type="text/javascript">
            $(document).ready(function() {
                updateMessages()

                $(".user-chat-list-items li a").click(function() {
                    $('.mobile-user-chats').addClass("user-chat-show");
                });
                $(".user-chat-remove").click(function() {
                    $('.mobile-user-chats').removeClass("user-chat-show");
                });
                $('.Product-Submission-table').DataTable({
                    responsive: true,
                    searching: false,
                    // pageLength: 5,

                    // "ordering": false,
                    // columnDefs: [{
                    //   width: '100',
                    //   targets: 0
                    // }],
                    columnDefs: [{
                        orderable: false,
                        className: 'select-checkbox',
                        targets: 0
                    }],
                    select: {
                        style: 'multi',
                        selector: 'td:first-child'
                    },
                    order: [
                        [1, 'asc']
                    ],
                    "pagingType": "full_numbers",
                    "language": {
                        "paginate": {
                            "first": "<i class='material-icons'>keyboard_double_arrow_left</i>",
                            "last": "<i class='material-icons'>keyboard_double_arrow_right</i>",
                            "next": "<i class='material-icons'>chevron_right</i>",
                            "previous": "<i class='material-icons'>chevron_left</i>"
                        },
                    },


                });
            });
        </script>
    @endpush
