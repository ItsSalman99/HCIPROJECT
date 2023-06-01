@extends('layouts.admin')
@section('content')
    <div class="cover-all-content">
        <div class="d-flex align-items-start justify-content-between flex-wrap gap-3">
            <div>
                <h2 class="section-title mb-1">Product Submission</h2>
                <div class="d-flex align-items-center flex-wrap gap-3">
                    <p class=" fst-italic font-15px m-0">Lifestyle You Need -
                        {{ Carbon\Carbon::parse($compaign->compaign_start)->format('F d, Y') }} -
                        {{ Carbon\Carbon::parse($compaign->compaign_end)->format('F d, Y') }} - (All Sellers)</p>
                    <div class="registeration-progress-status border-radius-50px overflow-auto">
                        <p class="px-4">Registration In Progress</p>
                    </div>
                </div>
            </div>
            <div>
                <form class="d-flex align-items-center gap-1 flex-wrap">
                    <div class="form-group m-0">
                        <input type="text" class=" form-control" placeholder="Seller SKU">
                    </div>
                    <div class="form-group m-0">
                        <input type="text" class=" form-control" placeholder="Product Name">
                    </div>
                    <ul>
                        <li><a href="javascript:void(0)" class="btn btn-primary"><i class="material-icons">
                                    search
                                </i></a></li>
                    </ul>
                </form>
            </div>
        </div>
        <br>
        <br>
        <br>

        <div class="cover-inner-content">
            <!-- Tab panes -->
            <br>
            <div class="tab-content">
                <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="text-end">
                        <ul>
                            <li><a data-bs-toggle="modal" data-bs-target="#addcompaignproductmodal"
                                    class=" btn btn-primary extra-btn-padding-30 text-uppercase">Add Product</a></li>
                        </ul>
                    </div>
                    <div class="datatable-v1 style-pagination">
                        <table class="Product-Submission-table" data-ordering="false" style="width:100%">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Selected</th>
                                    <th>Product Name</th>
                                    <th>Category Name</th>
                                    <th>Current Price</th>
                                    <th>Campaign Price</th>
                                    <th>Current Stock</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($joinproduct as $products)
                                    <tr>
                                        <td></td>
                                        <td>
                                            <div class="table-product-image d-flex align-items-center gap-3">
                                                <img src="{{ asset($products->product->image1) }}" alt="">
                                            </div>
                                        </td>


                                        <td>
                                            <p>{{ $products->product->name }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $products->product->category->name }}</p>
                                        </td>
                                        <td>
                                            <p>${{ $products->product->price }}</p>
                                        </td>
                                        <td>
                                            <p>
                                                <input data-id="{{ $products->compaign_id }}"
                                                    value="{{ $products->compaign_price }}"
                                                    role="{{ $products->product_id }}" type="text"
                                                    class="form-control compaignPrice" name="compaign_price"
                                                    placeholder="Enter Compaign Price">
                                                <span style="color: red" class="message{{ $products->product_id }}"></span>
                                            </p>
                                        </td>
                                        <td>
                                            <p>{{ $products->product->qty ?? '-' }}</p>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <br>
                    <br>
                    {{-- <div class="text-center">
                        <ul>
                            <li><a href="#" class=" btn btn-primary extra-btn-padding-80 text-uppercase">Next</a></li>
                        </ul>
                    </div> --}}

                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="addcompaignproductmodal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="card-body pt-4">
                        <div class="modal-header">
                            <h5 class="card-title font-18px">Add <span class=" primary-text">Compaign Products</span></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body py-4">
                            <form action="{{ route('admin.compaign.product') }}" method="POST">
                                @csrf
                                <input type="hidden" name="compaign_id" value="{{ $compaign->id }}">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <div class="form-group">
                                    <label for="" class="mb-3">Product</label>
                                    <div class="position-relative">
                                        <Select name="product_id[]" class="form-control catforpro"
                                            style="padding-right: 60px;" required>
                                            <option value="">Select</option>
                                            @foreach ($product as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </Select>
                                    </div>
                                </div>
                                <br>
                                <div class="text-center mt-5">
                                    <button type="submit" class="btn btn-primary extra-btn-padding-45 text-uppercase">Add
                                        To list</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @push('adminscript')
            <script>
                $('.compaignPrice').on('keyup', function() {
                    var productId = $(this).attr('role');
                    var compaignPrice = $(this).val();
                    var compaignId = $(this).attr('data-id');
                    $('.message' + productId).empty()
                    $.ajax({
                        url: '/admin/updateCompaignPrice/' + productId + '/' + compaignId + '/' + compaignPrice,
                        type: 'GET',
                        success: function(res) {
                            if (res.status == false) {
                                $('.message' + productId).append(res.msg)
                            }
                        }
                    })
                })
            </script>
        @endpush
    @endsection
