@extends('layouts.admin')
@section('content')
    <div class="cover-all-content">
        <div class="d-flex align-items-center justify-content-between flex-wrap">
            <h2 class="section-title">Add New <span class="primary-text">Brands</span></h2>
        </div>
        <br>
        <br>
        <div class="cover-inner-content">
            <div class="row g-3">
                <div class="col-lg-8">
                    <form action="{{ route('brands.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input value="PATCH" type="hidden" name="_method">
                        <div class="card border-0">
                            <div class="card-body p-0 brandbanner">
                                <div class="upload-image-box-v1">
                                    <label for="BBigImage1" class="BBigImage" style="width: 100%; height: 280px">
                                        <img alt="image" id="bigBannerImage1" src="{{$data->cover_image}}">
                                        <input type="file" name="cover_image" id="BBigImage1" hidden
                                            onchange="document.getElementById('bigBannerImage1').src = window.URL.createObjectURL(this.files[0])">
                                        <i class="bi bi-camera-fill font-40px opacity-05" style="color: inherit;"></i>
                                        <p>Upload Your Image
                                        </p>
                                        <p class=" fst-italic">(900 x 280)</p>
                                    </label>
                                </div>
                                <div class="upload-image-box-v1">
                                    <label for="brandLogo1" class="brandLogo bg-white"
                                        style="width: 168px; margin-top: -92px; left: 6%;">
                                        <img alt="" id="brandLogoImg1" class="uploadimage" src="{{$data->image}}">
                                        <input type="file" name="image" id="brandLogo1" hidden
                                            onchange="document.getElementById('brandLogoImg1').src = window.URL.createObjectURL(this.files[0])">
                                        <i class="bi bi-camera-fill font-40px opacity-05" style="color: inherit;"></i>
                                        <p>Upload Your logo
                                        </p>
                                        <p class=" fst-italic"> (250 x 250)</p>
                                    </label>
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>

                            <h4 class="card-title">Define your <span class="primary-text">brand</span></h4>
                            <br>
                            <div class="form-group">
                                <input type="text" class=" form-control" value="{{$data->name}}" name="name" placeholder="Lorem Ipsum dolor ">
                            </div>
                            <br>

                            <br class="d-none d-lg-block">
                            <br class="d-none d-lg-block">
                            <ul class="d-flex align-items-center justify-content-center flex-wrap gap-3">
                                <li><a href="javascript:void(0)"
                                        class="gray-btn-100 extra-btn-padding-80 text-uppercase">Cancel</a></li>
                                <li><button class="btn btn-primary extra-btn-padding-80 text-uppercase">Save Brand</button></li>
                            </ul>
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
    @endsection
