@extends('layouts.roamer')
@section('content')

<div class="cover-all-content">
    <div class="d-flex align-items-center justify-content-between flex-wrap">
        <h2 class="section-title">Add <span class="primary-text">New Vendor</span></h2>

    </div>
    <br>
    <br>
    <div class="cover-inner-content">
        <div class="row g-3">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body Horizontal-label white-bg-clr-02">
                        <div class="row gy-4">
                            <div class="col-lg-6">
                                <div class="row align-items-center gx-4">
                                    <label for="" class="col-4">Vendor Name</label>
                                    <div class="col-8">
                                        <input type="text" class="form-control" placeholder="John Doe">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row align-items-center gx-4">
                                    <label for="" class="col-4 text-start text-lg-end">Shop Name</label>
                                    <div class="col-8">
                                        <input type="text" class="form-control" placeholder="Bazaar shop">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row align-items-center gx-4">
                                    <label for="" class="col-4 col-lg-2">Address</label>
                                    <div class="col-8 col-lg-10">
                                        <input type="text" class="form-control" placeholder="Shop # 123, Building Lorem ipsum dolor sit amet...">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row align-items-center gx-4">
                                    <label for="" class="col-4">Nearby Market</label>
                                    <div class="col-8">
                                        <input type="text" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row align-items-center gx-4">
                                    <label for="" class="col-4 text-start text-lg-end">Profits</label>
                                    <div class="col-8">
                                        <input type="text" class="form-control" placeholder="5000">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row align-items-center gx-4">
                                    <label for="" class="col-4">Contact # 1*</label>
                                    <div class="col-8">
                                        <input type="text" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row align-items-center gx-4">
                                    <label for="" class="col-4 text-start text-lg-end">Contact # 2</label>
                                    <div class="col-8">
                                        <input type="text" class="form-control" placeholder="5000">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row align-items-center gx-4">
                                    <label for="" class="col-4">Contact # 3</label>
                                    <div class="col-8">
                                        <input type="text" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row align-items-center gx-4">
                                    <label for="" class="col-4 text-stat text-lg-end">Contact # 4</label>
                                    <div class="col-8">
                                        <input type="text" class="form-control" placeholder="5000">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row align-items-center gx-4">
                                    <label for="" class="col-4">Holiday Mode</label>
                                    <div class="col-8">
                                        <label class="cswitch">
                                            <input class="cswitch--input" type="checkbox"><span class="cswitch--trigger wrapper"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="text-center">
                            <button class="btn btn-primary extra-btn-padding-35 text-uppercase">Add Products</button>
                        </div>
                        <br>
                        <br>


                    </div>
                </div>
                <br>
                <br>
                <br>
                <ul class="d-flex align-items-center justify-content-center flex-wrap gap-3">
                    <li><a href="javascript:void(0)" class="gray-btn-100 extra-btn-padding-80 text-uppercase">Save Draft</a></li>
                    <li><a href="javascript:void(0)" class="btn btn-primary extra-btn-padding-80 text-uppercase">Submit</a></li>
                </ul>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body lgray-bg-1 tipcard">
                        <h6>Tips</h6>
                        <p class=" mb-4">1. Please add correct details of vendors without ambiguities. Addition of wrong data may lead to deactivation of your account and loss of job.</p>
                        <p class="mb-4">2. Addition of vendor(s) is important because every product you add has to
                            be associated with its actual vendor.</p>
                        <p class="mb-4">3. Try to add more and more vendors. More vendors mean more products which inturn means more orders. Fulfilling more orders will get you your bonus with your pay."</p>
                    </div>
                </div>
            </div>
        </div>


    </div>

   @endsection
