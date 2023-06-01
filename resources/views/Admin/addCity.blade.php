@extends('layouts.admin')
@section('content')
    <div class="cover-all-content">
        <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
            <div class="d-flex align-items-center flex-wrap gap-3">
                <h2 class="section-title">Manage <span class="primary-text">City & Province</span></h2>
            </div>
            <ul>
                <li><a href="#." class="btn btn-primary text-uppercase extra-btn-padding-20" data-bs-toggle="modal"
                        data-bs-target="#addcategorymodal">Add Provinces</a></li>
            </ul>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="cover-inner-content">
            <form action="{{ route('city.store') }}" method="POST">
                @csrf
                <div class="row g-2">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Province</label>
                            <select name="province_id" id="" class="form-control">
                                <option value="">Select Province</option>
                                @foreach ($Province as $pro)
                                    <option value="{{ $pro->id }}">{{ $pro->province_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>City Name</label>
                            <input name="c_name" type="text" class=" form-control" placeholder="Enter City">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary text-uppercase extra-btn-padding-20">Submit
                </button>
            </form>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="addcategorymodal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="card-body pt-4">
                        <div class="modal-header">
                            <h5 class="card-title font-18px">Create <span class=" primary-text">Category</span></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body py-4">
                            <form action="{{ route('province.store') }}" method="POST">
                                @csrf
                                <div class="row g-2">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>Province Name</label>
                                            <input name="p_name" type="text" class=" form-control"
                                                placeholder="Enter Province Name">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary text-uppercase extra-btn-padding-20">Submit
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
