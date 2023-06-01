@extends('layouts.admin')
@section('content')
    <div class="cover-all-content">
        <div class="d-flex align-items-center justify-content-between flex-wrap">
            <h2 class="section-title">General <span class="primary-text">Finance</span></h2>
        </div>
        <br>
        <br>
        <div class="cover-inner-content">
            <div class="row">
                <div class="col-12 d-flex align-items-center flex-wrap gap-2">
                    <div class="form-group m-0">
                        <select class="select-box" name="roamer" id="roamers" class=" form-control arrow-drop-down">
                            <option>Select Roamers</option>
                            @foreach($roamers as $roamer)
                                <option value="{{ $roamer->id }}">{{ $roamer->first_name . ' ' . $roamer->first_name  }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card primary-bg-clr-007 primary-border">
                        <div class="card-body2">
                            <div class="d-flex align-items-center justify-content-between">
                                <h4 class="card-title mb-1 font-20px primary-text">
                                    {{ number_format(calculateOrderSumAmount(isset($roamerID) ? $roamerID : Auth::user()->id) - calculateTransactionExpenseCount(isset($roamerID) ? $roamerID : Auth::user()->id)) }}

                                </h4>
                            </div>
                            <p class="m-0 primary-text opacity-07">Total Profit</p>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="finance-list">
                <ul>
                    <li>
                        <div class="row g-4">
                            <div class="col-md-6 col-lg-4">
                                <div class="card">
                                    <div class="card-body2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h4 class="card-title mb-1 font-20px">
                                                {{ number_format(calculateOrderSumAmount(isset($roamerID) ? $roamerID : Auth::user()->id)) }}</h4>
                                        </div>
                                        <p class="m-0 opacity-07">All ({{ calculateOrderCount(isset($roamerID) ? $roamerID : Auth::user()->id) }})</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="card">
                                    <div class="card-body2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h4 class="card-title mb-1 font-20px">
                                                {{ calculateTransactionExpenseCount(isset($roamerID) ? $roamerID : Auth::user()->id) ?? 0 }}</h4>
                                        </div>
                                        <p class="m-0 opacity-07">Expenditure
                                            ({{ calculateTransactionExpense(isset($roamerID) ? $roamerID : Auth::user()->id) }})</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="card">
                                    <div class="card-body2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h4 class="card-title mb-1 font-20px">
                                                {{ number_format(calculateOrderPendingPrice(isset($roamerID) ? $roamerID : Auth::user()->id)) }}</h4>
                                        </div>
                                        <p class="m-0 opacity-07">Pending ({{ calculateOrderPending(isset($roamerID) ? $roamerID : Auth::user()->id) }})
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row g-4">
                            <div class="col-md-6 col-lg-4">
                                <div class="card">
                                    <div class="card-body2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h4 class="card-title mb-1 font-20px">
                                                {{ number_format(calculateOrderAvailablePrice(isset($roamerID) ? $roamerID : Auth::user()->id)) }}</h4>
                                        </div>
                                        <p class="m-0 opacity-07">Available
                                            ({{ calculateOrderAvailable(isset($roamerID) ? $roamerID : Auth::user()->id) }})</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="card">
                                    <div class="card-body2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h4 class="card-title mb-1 font-20px">
                                                {{ number_format(calculateOrderShippedPrice(isset($roamerID) ? $roamerID : Auth::user()->id)) ?? 0 }}</h4>
                                        </div>
                                        <p class="m-0 opacity-07">Shipped ({{ calculateOrderShipped(isset($roamerID) ? $roamerID : Auth::user()->id) }})
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="card">
                                    <div class="card-body2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h4 class="card-title mb-1 font-20px">
                                                {{ calculateOrderDeliveredPrice(isset($roamerID) ? $roamerID : Auth::user()->id) }}</h4>
                                        </div>
                                        <p class="m-0 opacity-07">Delivered
                                            ({{ calculateOrderDelivered(isset($roamerID) ? $roamerID : Auth::user()->id) }}) </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row g-4">
                            <div class="col-md-6 col-lg-4">
                                <div class="card">
                                    <div class="card-body2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h4 class="card-title mb-1 font-20px">
                                                {{ calculateOrderCancelledPrice(isset($roamerID) ? $roamerID : Auth::user()->id) }}</h4>
                                        </div>
                                        <p class="m-0 opacity-07">Cancelled
                                            ({{ calculateOrderCancelled(isset($roamerID) ? $roamerID : Auth::user()->id) }})</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="card">
                                    <div class="card-body2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h4 class="card-title mb-1 font-20px">1K</h4>
                                        </div>
                                        <p class="m-0 opacity-07">Returned (30)</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="card">
                                    <div class="card-body2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h4 class="card-title mb-1 font-20px">12M</h4>
                                        </div>
                                        <p class="m-0 opacity-07">Failed Deliveries (10)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row g-4">
                            <div class="col-md-6 col-lg-4">
                                <div class="card">
                                    <div class="card-body2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h4 class="card-title mb-1 font-20px">200M</h4>
                                        </div>
                                        <p class="m-0 opacity-07">Received (532)</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="card">
                                    <div class="card-body2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h4 class="card-title mb-1 font-20px">1K</h4>
                                        </div>
                                        <p class="m-0 opacity-07">Penalties (87)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
    @endsection
    @push('adminscript')
        
        <script type="text/javascript">
            $('#roamers').on('change', function(){
                
                var roamer = $(this).val();
                
                window.location.href = '/finance/filter/' + roamer;

            });
        </script>
        
    @endpush
