@extends('layouts.admin')
@section('content')
    <div class="cover-all-content">
        <div class="d-flex align-items-center justify-content-between flex-wrap">
            <h2 class="section-title">Chat With <span class="primary-text">Seller</span></h2>
        </div>
        <br>
        <br>

        <div class="cover-inner-content">
            <div class="card">
                <div class="card-body pe-3 pe-lg-0">
                    <div class="bazaar-chating d-flex">
                        <div>
                            <div class="users-chat-list">
                                <div>
                                    <div class="form-group mb-2">
                                        <div class="position-relative">
                                            <input type="text" class="form-control" placeholder="Search">
                                            <span
                                                class="position-absolute top-50 translate-middle-y opacity-04 font-weight-400 user-select-none font-12px d-flex align-items-center justify-content-center"
                                                style="right: 16px;"><i class="material-icons">
                                                    search
                                                </i></span>
                                        </div>
                                    </div>

                                </div>
                                <!-- start fitler area -->
                                <div class="chat-filter-area d-flex align-items-center justify-content-between gap-3 py-3">
                                </div>
                                <!-- end filter area -->
                                <!-- Start User list area -->
                                <div class="user-chat-list-items">
                                    <ul>
                                        @foreach ($roamer as $roamer)
                                            <li>
                                                <a href="#." class="roamer{{ $roamer->id }} raomerID"
                                                    onclick="userSelect({{ $roamer->id }}, {{ Auth::user()->id }})">
                                                    <div class="user-chat-list-box">
                                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                                            <h5 class="font-16px font-weight-600 text-uppercase">
                                                                {{ $roamer->first_name . ' ' . $roamer->last_name }}
                                                            </h5>
                                                            <span
                                                                id="isread">({{ count(getIsReadChat($roamer->id)) }})</span>
                                                        </div>
                                                        <p>Seller</p>
                                                    </div>
                                                </a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                                <!-- End User list area -->
                            </div>
                        </div>
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
                                    <h5 class="font-weight-700 text-uppercase" id="user_name"></h5>
                                    <p class="font-weight-500 font-16px" id="type"></p>
                                </div>
                                <div class="justify-content-center text-center mt-4 d-none" id="spinner">
                                    <div class="spinner-border" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                                <div class="user-chats-content" id="msgs">

                                </div>
                                <form id="chatForm" class="d-none">
                                    <div class="user-typing-area">
                                        @csrf
                                        <div class=" position-relative flex-1">
                                            <input type="text" class=" form-control" placeholder="Type a message"
                                                name="msg" id="msgInp">
                                            <input type="hidden" hidden class="sender_id" name="sender_id"
                                                value="{{ Auth::user()->id }}">
                                            <input type="hidden" hidden name="sender_name"
                                                value="{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}">
                                            <input type="hidden" class="receiver_id" hidden name="receiver_id">
                                            <input type="hidden" class="receiver_name" hidden name="receiver_name">
                                        </div>
                                        <label id="uploadfile" role="button" for="upload-file">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="19"
                                                viewBox="0 0 17 19">
                                                <path
                                                    d="M16.7778 6.70729C16.4827 6.40841 16.0055 6.40974 15.712 6.71021L6.65208 15.9847C5.47667 17.1815 3.56763 17.1815 2.39003 15.9831C1.21332 14.7844 1.21332 12.8406 2.39018 11.6424L11.7182 2.0948C12.4521 1.34765 13.6452 1.34765 14.3811 2.09641C15.1169 2.84554 15.1169 4.06017 14.3809 4.80951L6.65349 12.6774C6.653 12.6779 6.65258 12.6785 6.65208 12.679C6.35769 12.9771 5.88192 12.9767 5.58813 12.6775C5.29385 12.3779 5.29385 11.8923 5.58813 11.5926L9.3181 7.79404C9.61238 7.49434 9.61235 7.00844 9.31799 6.70881C9.02364 6.40917 8.54642 6.4092 8.25214 6.70891L4.52221 10.5074C3.63931 11.4064 3.63931 12.8638 4.52228 13.7628C5.4052 14.6617 6.83657 14.6617 7.71953 13.7628C7.72055 13.7617 7.72136 13.7606 7.72235 13.7595L15.4468 5.89468C16.7714 4.54599 16.7714 2.35961 15.4468 1.01092C14.122 -0.336974 11.9748 -0.336974 10.651 1.01092L1.32291 10.5586C-0.44118 12.3547 -0.44118 15.27 1.32418 17.0684C3.0907 18.8661 5.95392 18.8661 7.71939 17.0685L16.7807 7.79253C17.0742 7.49203 17.0729 7.00618 16.7778 6.70729Z" />
                                            </svg>
                                        </label>
                                        <input type="file" id="upload-file" accept=".pdf" hidden name="file">
                                        <label id="uploadimg" role="button" for="upload-image">

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

        {{-- //mobile --}}
        <div class="mobile-user-chats">
            <div class="bazaar-chating">
                <div class="users-chat">
                    <div class="chat-header-area d-flex align-items-center gap-3 pb-2 border-bottom">
                        <a href="#" class=" default-black opacity-05 user-chat-remove"><i class="material-icons">
                                chevron_left
                            </i></a>
                        <div>
                            <h5 class="font-weight-700 text-uppercase user_name"></h5>
                            <p class="font-weight-500 font-16px">Seller</p>
                        </div>
                    </div>
                    <div class="user-chats-content" id="mobilemsgs">

                    </div>
                    <div class="user-typing-area">
                        <form id="mobilechatForm">
                            <div class="user-typing-area">
                                @csrf
                                <div class=" position-relative flex-1">
                                    <input type="text" class=" form-control" placeholder="Type a message"
                                        name="msg" id="mobilemsgInp">
                                    <input type="hidden" hidden class="sender_id" name="sender_id"
                                        value="{{ Auth::user()->id }}">
                                    <input type="hidden" hidden name="sender_name"
                                        value="{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}">
                                    <input type="hidden" class="receiver_id" hidden name="receiver_id">
                                    <input type="hidden" class="receiver_name" hidden name="receiver_name">
                                </div>
                                <label role="button" for="upload-file">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="19"
                                        viewBox="0 0 17 19">
                                        <path
                                            d="M16.7778 6.70729C16.4827 6.40841 16.0055 6.40974 15.712 6.71021L6.65208 15.9847C5.47667 17.1815 3.56763 17.1815 2.39003 15.9831C1.21332 14.7844 1.21332 12.8406 2.39018 11.6424L11.7182 2.0948C12.4521 1.34765 13.6452 1.34765 14.3811 2.09641C15.1169 2.84554 15.1169 4.06017 14.3809 4.80951L6.65349 12.6774C6.653 12.6779 6.65258 12.6785 6.65208 12.679C6.35769 12.9771 5.88192 12.9767 5.58813 12.6775C5.29385 12.3779 5.29385 11.8923 5.58813 11.5926L9.3181 7.79404C9.61238 7.49434 9.61235 7.00844 9.31799 6.70881C9.02364 6.40917 8.54642 6.4092 8.25214 6.70891L4.52221 10.5074C3.63931 11.4064 3.63931 12.8638 4.52228 13.7628C5.4052 14.6617 6.83657 14.6617 7.71953 13.7628C7.72055 13.7617 7.72136 13.7606 7.72235 13.7595L15.4468 5.89468C16.7714 4.54599 16.7714 2.35961 15.4468 1.01092C14.122 -0.336974 11.9748 -0.336974 10.651 1.01092L1.32291 10.5586C-0.44118 12.3547 -0.44118 15.27 1.32418 17.0684C3.0907 18.8661 5.95392 18.8661 7.71939 17.0685L16.7807 7.79253C17.0742 7.49203 17.0729 7.00618 16.7778 6.70729Z" />
                                    </svg>
                                </label>
                                <input type="file" id="upload-file" accept=".pdf" hidden name="file">
                                <label role="button" for="upload-image">

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
    @endsection
    @push('adminscript')
        <script src="{{ asset('assets/js/firebase-keys.js') }}"></script>
        <script type="text/javascript">
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

            $(document).ready(function() {
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

        <script>
            $('#msgs').html('');
            $('#mobilemsgs').html('');
            $('#chatFileForm').on('submit', function(e) {
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

                        console.log(response.message.msg);
                        $('#msgInp').val('');
                        $('#mobilemsgInp').val('');
                        updateData()
                        // $('#msgs').append('<div class="message my-chats-box" id="msg">' +
                        //     '<p>' + response.message.msg + '<br><small>' + response.message.time +
                        //     '</small></p></div>')

                    }

                })
            })
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

                        console.log(response.message.msg);
                        $('#msgInp').val('');
                        $('#mobilemsgInp').val('');
                        updateData()
                        $('#previewCard').addClass('d-none')
                        $('#msgInp').prop('disabled', false)
                        // $('#msgs').append('<div class="message my-chats-box" id="msg">' +
                        //     '<p>' + response.message.msg + '<br><small>' + response.message.time +
                        //     '</small></p></div>')

                    }

                })

            })
        </script>

        <script>
            function removeActiveChatClick() {
                $('body').find('.raomerID').removeClass('active-chat-user');
            }

            function userSelect(id, Id) {
                $('#chatForm').removeClass('d-none')
                $('#spinner').removeClass('d-none')
                removeActiveChatClick();
                $('.roamer' + id).addClass('active-chat-user')
                // console.log($('#roamer'+id));
                $.ajax({
                    url: '/admin/isRead/' + id,
                    method: 'GET',
                    success: function(response) {

                    }
                })
                $.ajax({
                    url: '{{ route('front.index') }}' + '/admin/chat-room/user/' + id + '/' + Id,
                    method: 'GET',
                    success: function(response) {
                        $('#user_name').html(response.data.first_name + ' ' + response.data.last_name)
                        $('.user_name').html(response.data.first_name + ' ' + response.data.last_name)
                        $('.receiver_id').val(response.data.id)
                        $('.receiver_name').val(response.data.first_name + ' ' + response.data.last_name)
                        $('#msgs').empty();
                        $('#mobilemsgs').empty();
                        $.each(response.msgs, function(key, value) {
                            console.log(id + ' - ' + Id);
                            if (id == value.receiver_id) {
                                if (value.sender_id == Id) {
                                    if (value.type == 'file') {
                                        $('#mobilemsgs').append(
                                            '<div class="message my-chats-file"><a href="' +
                                            value.msg +
                                            '"><div class="cover-img">' +
                                            '<img src="/assets/admin/images/wordfile.png" alt=""></div>' +
                                            '<p><br><small>' + value.time +
                                            '</small></p></a></div>')
                                        $('#msgs').append('<div class="message my-chats-file"><a href="' +
                                            value.msg +
                                            '"><div class="cover-img">' +
                                            '<img src="/assets/admin/images/wordfile.png" alt=""></div>' +
                                            '<p><br><small>' + value.time +
                                            '</small></p></a></div>')
                                    } else if (value.type == 'img') {
                                        $('#mobilemsgs').append(
                                            '<div class="message my-chats-file"><a href="' +
                                            value.msg +
                                            '"><div class="cover-img">' +
                                            '<img src="' + value.msg + '" alt=""></div>' +
                                            '<p><br><small>' + value.time + '</small></p></a></div>')
                                        $('#msgs').append('<div class="message my-chats-file"><a href="' +
                                            value.msg +
                                            '"><div class="cover-img">' +
                                            '<img src="' + value.msg + '" alt=""></div>' +
                                            '<p><br><small>' + value.time + '</small></p></a></div>')
                                    } else {
                                        $('#mobilemsgs').append(
                                            '<div class="message my-chats-box" id="msg">' +
                                            '<p>' + value.msg + '<br><small>' + value.time +
                                            '</small></p></div>')
                                        $('#msgs').append('<div class="message my-chats-box" id="msg">' +
                                            '<p>' + value.msg + '<br><small>' + value.time +
                                            '</small></p></div>')
                                    }
                                } else if (value.sender_id == id) {
                                    if (value.type == 'file') {
                                        $('#mobilemsgs').append(
                                            '<div class="message user-chats-file"><a href="' +
                                            value.msg +
                                            '"><div class="cover-img">' +
                                            '<img src="/assets/admin/images/wordfile.png" alt=""></div>' +
                                            '<p><br><small>' + value.time +
                                            '</small></p></a></div>')
                                        $('#msgs').append('<div class="message user-chats-file"><a href="' +
                                            value.msg +
                                            '"><div class="cover-img">' +
                                            '<img src="/assets/admin/images/wordfile.png" alt=""></div>' +
                                            '<p><br><small>' + value.time +
                                            '</small></p></a></div>')
                                    } else if (value.type == 'img') {
                                        $('#mobilemsgs').append(
                                            '<div class="message user-chats-file"><a href="' +
                                            value.msg +
                                            '"><div class="cover-img">' +
                                            '<img src="' + value.msg + '" alt=""></div>' +
                                            '<p><br><small>' + value.time + '</small></p></a></div>')
                                        $('#msgs').append('<div class="message user-chats-file"><a href="' +
                                            value.msg +
                                            '"><div class="cover-img">' +
                                            '<img src="' + value.msg + '" alt=""></div>' +
                                            '<p><br><small>' + value.time + '</small></p></a></div>')
                                    } else {
                                        $('#mobilemsgs').append(
                                            '<div class="message user-chats-box" id="msg">' +
                                            '<p>' + value.msg + '<br><small>' + value.time +
                                            '</small></p></div>')
                                        $('#msgs').append('<div class="message user-chats-box" id="msg">' +
                                            '<p>' + value.msg + '<br><small>' + value.time +
                                            '</small></p></div>')
                                    }
                                }
                            } else if (Id == value.receiver_id && id == value.sender_id) {
                                if (value.type == 'file') {
                                    $('#mobilemsgs').append(
                                        '<div class="message user-chats-file"><a href="' +
                                        value.msg +
                                        '"><div class="cover-img">' +
                                        '<img src="/assets/admin/images/wordfile.png" alt=""></div>' +
                                        '<p><br><small>' + value.time +
                                        '</small></p></a></div>')
                                    $('#msgs').append('<div class="message user-chats-file"><a href="' +
                                        value.msg +
                                        '"><div class="cover-img">' +
                                        '<img src="/assets/admin/images/wordfile.png" alt=""></div>' +
                                        '<p><br><small>' + value.time +
                                        '</small></p></a></div>')
                                } else if (value.type == 'img') {
                                    $('#mobilemsgs').append(
                                        '<div class="message user-chats-file"><a href="' +
                                        value.msg +
                                        '"><div class="cover-img">' +
                                        '<img src="' + value.msg + '" alt=""></div>' +
                                        '<p><br><small>' + value.time + '</small></p></a></div>')
                                    $('#msgs').append('<div class="message user-chats-file"><a href="' +
                                        value.msg +
                                        '"><div class="cover-img">' +
                                        '<img src="' + value.msg + '" alt=""></div>' +
                                        '<p><br><small>' + value.time + '</small></p></a></div>')
                                } else {
                                    $('#mobilemsgs').append(
                                        '<div class="message user-chats-box" id="msg">' +
                                        '<p>' + value.msg + '<br><small>' + value.time +
                                        '</small></p></div>')
                                    $('#msgs').append('<div class="message user-chats-box" id="msg">' +
                                        '<p>' + value.msg + '<br><small>' + value.time +
                                        '</small></p></div>')
                                }
                            }
                        });
                        $('#spinner').addClass('d-none')
                    }
                })
            }
        </script>

        <script>
            function updateData() {
                var user = 'user-chats-box';
                var my = 'my-chats-box';
                var Id = $('.sender_id').val();
                var id = $('.receiver_id').val();
                const database = firebase.database();
                var chats = database.ref('chats');
                $('#msgs').html('');
                chats.on('value', function(snapshot) {
                    snapshot.forEach(function(childSnapshot) {
                        var childData = childSnapshot.val();
                        console.log(childData.msg);
                        // console.log(id + ' - ' + childData.receiver_id);
                        // console.log(Id + ' - ' + childData.sender_id);
                        if (id == childData.receiver_id) {
                            if (childData.sender_id == Id) {
                                if (childData.type == 'file') {

                                    $('#msgs').append('<div class="message my-chats-file"><a href="' + childData
                                        .msg +
                                        '"><div class="cover-img">' +
                                        '<img src="/assets/admin/images/wordfile.png" alt=""></div>' +
                                        '<p><br><small>' + childData.time +
                                        '</small></p></a></div>')
                                } else if (childData.type == 'img') {
                                    $('#msgs').append('<div class="message my-chats-file"><a href="' + childData
                                        .msg +
                                        '"><div class="cover-img">' +
                                        '<img src="' + childData.msg + '" alt=""></div>' +
                                        '<p><br><small>' + childData.time + '</small></p></a></div>')
                                } else {
                                    $('#msgs').append('<div class="message my-chats-box" id="msg">' +
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
                                        '<p><br><small>' + childData.time + '</small></p></a></div>')
                                } else {
                                    $('#msgs').append('<div class="message user-chats-box" id="msg">' +
                                        '<p>' + childData.msg + '<br><small>' + childData.time +
                                        '</small></p></div>')
                                }
                            }
                        } else if (Id == childData.receiver_id && id == childData.sender_id) {
                            if (childData.type == 'file') {

                                $('#msgs').append('<div class="message user-chats-file"><a href="' + childData
                                    .msg +
                                    '"><div class="cover-img">' +
                                    '<img src="/assets/admin/images/wordfile.png" alt=""></div>' +
                                    '<p><br><small>' + childData.time +
                                    '</small></p></a></div>')
                            } else if (childData.type == 'img') {
                                $('#msgs').append('<div class="message user-chats-file"><a href="' + childData
                                    .msg +
                                    '"><div class="cover-img">' +
                                    '<img src="' + childData.msg + '" alt=""></div>' +
                                    '<p><br><small>' + childData.time + '</small></p></a></div>')
                            } else {
                                $('#msgs').append('<div class="message user-chats-box" id="msg">' +
                                    '<p>' + childData.msg + '<br><small>' + childData.time +
                                    '</small></p></div>')
                            }
                        }
                    });
                });

            }
        </script>
    @endpush
