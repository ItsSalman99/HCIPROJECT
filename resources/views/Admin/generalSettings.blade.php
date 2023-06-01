@extends('layouts.admin')
@section('content')
    <div class="cover-all-content">
        <div class="d-flex align-items-center justify-content-between flex-wrap">
            <h2 class="section-title">Slider<span class="primary-text"> Settings</span></h2>
        </div>
        <br>
        <br>
        <div class="cover-inner-content">
            <div class="row g-3">
                <div class="col-lg-8">
                    <form action="{{ route('settings.slider.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (Auth::user()->user_type == 2)
                            <input type="hidden" name="roamer_id" value="{{ Auth::user()->id }}">
                        @endif
                        <div class="card border-0">
                            <div class="card-body p-0 brandbanner">
                                <form action="" method="post">
                                    <div class="swiper mySwiper"
                                        style="--swiper-navigation-size:30px; --swiper-navigation-color: var(--primary-clr)">
                                        <div class="swiper-wrapper">
                                            @forelse ($slider as $key => $slider)
                                                <div class="swiper-slide">
                                                    <div class="upload-image-box-v1">
                                                        <label for="BBigImage<?php echo $key; ?>" class="BBigImage"
                                                            style="width: 100%; height: 280px">
                                                            <img alt="image" src="{{ asset($slider->img) }}"
                                                                id="bigBannerImage<?php echo $key; ?>">
                                                            <div class="d-flex gap-4">
                                                                <a
                                                                    href="{{ route('settings.slider.delete', ['id' => $slider->id]) }}">
                                                                    <i class="bi bi-trash text-danger font-40px opacity-05 "
                                                                        style="color: #000;" style="color: inherit;">
                                                                    </i>
                                                                </a>
                                                                <a href="#." data-bs-toggle="modal"
                                                                    data-bs-target="#sliderModal"
                                                                    onclick="getSlider({{ $slider->id }})">
                                                                    <i class="bi bi-pencil text-danger font-40px opacity-05 "
                                                                        style="color: #000;" style="color: inherit;">
                                                                    </i>
                                                                </a>
                                                            </div>
                                                            <p>
                                                            </p>
                                                        </label>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="my-4">
                                                    <h2>No Slider Image Uploaded Yet!</h2>
                                                </div>
                                            @endforelse
                                        </div>
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                    </div>
                                    <div class="my-4" id="sliderDiv">
                                        <div class="from-group">
                                            <div class="d-flex gap-4">
                                                <div style="">
                                                    <label for="Image">Image</label>
                                                    <input type="file" name="imgs[]" class="form-control" required>
                                                </div>
                                                <div>
                                                    <label for="Link">Link</label>
                                                    <input type="text" name="links[]"
                                                        placeholder="Redirect Link" class="form-control">
                                                </div>
                                                <div>
                                                    <label for="Link">Slider Sequence Number</label>
                                                    <input type="text" name="sequence[]"
                                                        placeholder="Sequence Number" class="form-control">
                                                </div>
                                                <div>
                                                    <button style="transform: translateY(60%)" class="btn btn-primary"
                                                        type="button" onclick="cloneDiv()" id="addDiv">+</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="newsliderDiv">

                                    </div>

                                    <div class="form-group my-4">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                    </div>

                                </form>
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br class="d-none d-lg-block">
                            <br class="d-none d-lg-block">
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body lgray-bg-1 tipcard">
                            <h6>Tips</h6>
                            <p class=" mb-4">Keep your title concise but clear. Provide necessary details such as brand,
                                model, color. Do not add repetitive words. Please note that product names must be in Title
                                Case and should not contain any special characters (# ! ?) except if it's a part of a trade
                                name. Click here to learn more about setting the right product titles.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="sliderModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="card-body pt-4">
                        <div class="modal-header">
                            <h5 class="card-title font-18px">Update <span class=" primary-text">Slider Image</span></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body py-4">
                            <form id="sliderUpdate" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card border-0">
                                    <div class="card-body p-0 brandbanner">
                                        <div class="upload-image-box-v1">
                                            <label for="BBigImage2" class="BBigImage" style="width: 100%; height: 280px">
                                                <img alt="image" id="bigBannerImage2">
                                                <input type="file" name="img" id="BBigImage2" hidden
                                                    onchange="document.getElementById('bigBannerImage2').src = window.URL.createObjectURL(this.files[0])">
                                                <i class="bi bi-camera-fill font-40px opacity-05"
                                                    style="color: inherit;"></i>
                                                <p>
                                                    Upload Your Image
                                                </p>
                                                {{-- <p class=" fst-italic">(900 x 280)</p> --}}
                                            </label>
                                        </div>
                                        <div class="form-group mt-4">
                                            <label>Link:</label>
                                            <input placeholder="Link" class="form-control" name="link" id="link" />
                                        </div>
                                        <div class="form-group mt-4">
                                            <label>Sequence Number</label>
                                            <input placeholder="Sequence Number" class="form-control" name="sequence" id="sqno" />
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                </div>
                                <div class="text-center mt-5">
                                    <button type="submit" id="slideModalBtn"
                                        class="btn btn-primary extra-btn-padding-45 text-uppercase">
                                        Update
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
            function getSlider(id) {

                $('#sliderUpdate').attr('action', '/admin/general-settings/slider/update/' + id)

                $.ajax({
                    url: '/admin/general-settings/edit/' + id,
                    method: 'get',
                    success: function(response) {
                        $('#bigBannerImage2').attr('src', '/' + response.data.img)
                        $('#link').val(response.data.link)
                        $('#sqno').val(response.data.seq_no)
                    }
                });

            }

        </script>
        <script>
            function cloneDiv() {
                $('#sliderDiv').clone().appendTo('#newsliderDiv');
            }
        </script>
        <script>
            var swiper = new Swiper(".mySwiper", {
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });
        </script>
    @endpush
