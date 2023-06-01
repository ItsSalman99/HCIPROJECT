@extends('layouts.admin')
@section('content')
    <div class="cover-all-content">
        <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
            <div class="d-flex align-items-center justify-content-between flex-wrap">
                <h2 class="section-title">Manage <span class="primary-text">Shipment</span></h2>
            </div>
        </div>
        <br>
        <br>
        <div class="cover-inner-content">
            <div class="row g-3">
                <div class="col-lg-8">
                    <div class="card">
                        <form action="{{ route('shipment.store') }}" method="POST">
                            @csrf
                            <div class="card-body Horizontal-label">
                                <div class="d-block d-lg-flex align-items-center flex-wrap mb-3">
                                    <input type="text" hidden name="state" value="<?php if ($shipment != null) {
                                        echo 'update';
                                    } else {
                                        echo 'store';
                                    } ?>">
                                    <input name="id" type="text" hidden value="{{ $shipment->id }}">
                                    <label class="mb-3 mb-lg-0 mb-lg-0 d-flex align-items-center gap-3 col-lg-3">Shipment
                                        Name
                                        <ul>
                                            <li><a href="javascript:void(0)" class="infobar" data-bs-toggle="tooltip"
                                                    title="" data-bs-original-title="Add Shipment Name!"><i
                                                        class="material-icons">
                                                        question_mark
                                                    </i></a></li>
                                        </ul>
                                    </label>
                                    <div class="form-group m-0 col-lg-7">
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Shipment Name" value="<?php if ($shipment != null) {
                                                echo $shipment->name;
                                            } ?>">
                                    </div>
                                </div>
                                <div class="d-block d-lg-flex align-items-center flex-wrap mb-3">
                                    <label class="mb-3 mb-lg-0 mb-lg-0 d-flex align-items-center gap-3 col-lg-3">Price($)
                                        <ul>
                                            <li><a href="javascript:void(0)" class="infobar" data-bs-toggle="tooltip"
                                                    title="" data-bs-original-title="Add Shipment Price!"><i
                                                        class="material-icons">
                                                        question_mark
                                                    </i></a></li>
                                        </ul>
                                    </label>
                                    <div class="form-group m-0 col-lg-7">
                                        <input type="number" class="form-control" name="price"
                                            value="<?php if ($shipment != null) {
                                                echo $shipment->price;
                                            } ?>" placeholder="Price">
                                    </div>
                                </div>
                                <br>
                                <br>
                            </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <ul class="d-flex align-items-center justify-content-center flex-wrap gap-3">
                        <li><a href="javascript:void(0)" class="gray-btn-100 extra-btn-padding-80 text-uppercase">Cancel</a>
                        </li>
                        <li>
                            <button class="btn btn-primary extra-btn-padding-80 text-uppercase">
                                @if ($shipment != null)
                                    Update

                                @else
                                    Save
                                @endif
                            </button>
                        </li>
                    </ul>
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
