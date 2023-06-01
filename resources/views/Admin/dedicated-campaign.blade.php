@extends('layouts.admin')
@section('content')
    <div class="cover-all-content">
        <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
            <div class="d-flex align-items-center flex-wrap gap-3">
                <h2 class="section-title">{{ $compaigns->compaign_name }} <span
                        class="primary-text">{{ Carbon\Carbon::parse($compaigns->compaign_start)->format('F d, Y') }} to
                        {{ Carbon\Carbon::parse($compaigns->compaign_end)->format('F d, Y') }} (All
                        Sellers)</span></h2>
            </div>
        </div>

        <br>
        <br>
        <div class="cover-inner-content table-v2">

            <div class="custom-datatable-v1 table-align-middle">
                <div class="thead">
                    <div class="table-row">
                        <div style="flex: 0; padding:0 !important">
                            <div class="d-block" style=" width:50px; aspect-ratio:1">
                                &nbsp;
                            </div>
                        </div>
                        <div style="flex: 0; flex-basis: 9%;">Roamer #</div>
                        <div>Roamer Name</div>
                        <div>Apply Date</div>
                        <div># Of Products</div>
                        <div>Action</div>
                    </div>
                </div>
                <div class="tbody">
                    <div class="accordion Ctable-striped table-row-space" id="accordionExample">
                        @foreach ($compaign as $key => $compaigns)
                            <div class="accordion-item">
                                <div class="accordion-header">
                                    <div class="table-row">
                                        <div style="flex: 0; padding:0 !important">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#row{{ $key }}" aria-expanded="false"
                                                aria-controls="row1">
                                                &nbsp;
                                            </button>
                                        </div>
                                        <div style="flex: 0; flex-basis: 9%;">
                                            <p>{{ $compaigns->user_id }}</p>
                                        </div>
                                        <div>
                                            <div class=" d-flex align-items-center gap-2">
                                                <div>
                                                    <p class=" opacity-09">
                                                        {{ $compaigns->user->first_name . ' ' . $compaigns->user->last_name }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <p>{{ Carbon\Carbon::parse($compaigns->created_at)->format('F d, Y') }}</p>
                                        </div>
                                        @php
                                            $count = App\Models\CompaignProduct::where('user_id', '=', $compaigns->user_id)->count();
                                            $product = App\Models\CompaignProduct::where('user_id', '=', $compaigns->user_id)->get();
                                        @endphp
                                        <div>
                                            <p>{{ $count }}</p>
                                        </div>
                                        <div>
                                            <ul class=" d-flex align-items-center gap-2">
                                                <li>
                                                    <a data-product="{{ $compaigns->product_id }}"
                                                        data-id="{{ $compaigns->user_id }}" href="#"
                                                        class="btn btn-primary approve">
                                                        Approve
                                                    </a>
                                                </li>
                                                <li><a href="#" class=" white-btn">Disapprove</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div id="row{{ $key }}" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body border-top height-370px overflow-auto">
                                        <div class=" table-v2">
                                            <table class="table">
                                                <thead>
                                                    <tr>

                                                        <th>Product</th>
                                                        <th>Category</th>
                                                        <th>Current Price</th>
                                                        <th>Current Stock</th>
                                                        <th class=" primary-text">Campaign Price</th>
                                                        {{-- <th>&nbsp;</th> --}}
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($product as $products)
                                                        <tr>
                                                            <td>
                                                                <p class=" opacity-05">{{ $products->product->name }}</p>
                                                            </td>

                                                            <td>
                                                                <p class=" opacity-05">
                                                                    {{ $products->product->category->name }}</p>
                                                            </td>
                                                            <td>
                                                                <p class=" opacity-05">${{ $products->product->price }}</p>
                                                            </td>
                                                            <td>
                                                                <p class=" opacity-05">{{ $products->product->qty ?? '-' }}
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p class=" opacity-05">
                                                                    ${{ number_format($products->compaign_price) }}
                                                                </p>
                                                            </td>
                                                            {{-- <td>
                                                                <ul class=" d-flex align-items-center gap-2">
                                                                    <li><a href="#"
                                                                            class=" btn btn-primary">Approve</a></li>
                                                                    <li><a href="#" class=" white-btn">Disapprove</a>
                                                                    </li>
                                                                </ul>
                                                            </td> --}}
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <div class="d-flex align-items-center flex-wrap gap-3 justify-content-center justify-content-lg-between">
                <p class=" opacity-05 m-0">6 of 480</p>
                <div class="Cs-pagination">
                    <ul>
                        <li><a href="javascript:void(0);" class="pe-none user-select-none"><i
                                    class="material-icons">keyboard_double_arrow_left</i></a></li>
                        <li><a href="javascript:void(0);" class="pe-none user-select-none"><i
                                    class="material-icons">chevron_left</i></a></li>
                        <li><a href="javascript:void(0);" class="Cs-activepagination">1</a></li>
                        <li><a href="javascript:void(0);">2</a></li>
                        <li><a href="javascript:void(0);">3</a></li>
                        <li><a href="javascript:void(0);">4</a></li>
                        <li><a href="javascript:void(0);">5</a></li>

                        <li><a href="javascript:void(0);">...</a></li>
                        <li><a href="javascript:void(0);">10</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">chevron_right</i></a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">keyboard_double_arrow_right</i></a></li>
                    </ul>
                </div>
            </div>
        </div>

        @push('adminscript')
            <script>
                $('.approve').on('click', function() {
                    var userId = $(this).attr('data-id');
                    var productId = $(this).attr('data-product');
                    $.ajax({
                        url: '/admin/approveApplicant/' + userId + '/' + productId,
                        type: 'GET',
                        success: function(res) {
                            if (res.status == true) {
                                window.location.reload()
                            }
                        }
                    })
                });
            </script>
        @endpush
    @endsection
