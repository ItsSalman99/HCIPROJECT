@extends('layouts.admin')
@section('content')
    <div class="cover-all-content">
        <div class="d-flex align-items-center justify-content-between flex-wrap">
            <h2 class="section-title">Manage <span class="primary-text">Reviews</span></h2>
        </div>
        <br>
        <br>
        <div class="cover-inner-content">
            <div class="tabs-style-1 mt-4">
                <!-- Nav tabs -->
                <div class="tabs-links">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="tabv1-1-tab" data-bs-toggle="tab" data-bs-target="#tabv1-1"
                                type="button" role="tab" aria-controls="tabv1-1" aria-selected="true">Reviews</button>
                        </li>
                    </ul>
                </div>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="tabv1-1" role="tabpanel" aria-labelledby="tabv1-1-tab">
                        <br>
                        @if (Auth::user()->user_type == 1)
                            <div class="row g-4">
                                <div class="col-lg-3">
                                    <div class="" style="width:100%;">
                                        <select class="select-box" name="roamer_id" id="roamerID">
                                            <option value="0">All Roamers</option>
                                            @foreach ($roamers as $item)
                                                <option value="{{ $item->id }}"<?php if (isset($roamerId)) {
                                                    if ($roamerId == $item->id) {
                                                        echo 'selected';
                                                    }
                                                } ?>>
                                                    {{ $item->first_name . ' ' . $item->last_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="datatable-v1 style-pagination">
                            <table class="myDataTable display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Product_Id</th>
                                        <th>Content</th>
                                        <th>Roamer</th>
                                        <th>Product</th>
                                        <th>Review</th>
                                        <th>Rating</th>
                                        <th>Response</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reviews as $item)
                                        <tr>
                                            <td style="color: #0068E2;" class=" opacity-07">
                                                {{ $item->product->id }}
                                            </td>

                                            <td>
                                                <p class="opacity-05">{{ $item->customer->name }}</p>
                                                <p class="opacity-03">{{ $item->customer->email }}
                                                    ({{ date('F, j Y', strtotime($item->customer->created_at)) }})
                                                </p>
                                            </td>
                                            <td style="color: #0068E2;" class=" opacity-07">
                                                {{ $item->product->user->getName() }}
                                            </td>
                                            <td style="color: #0068E2;" class=" opacity-07">
                                                {{ $item->product->name }}
                                            </td>
                                            <td>
                                                <p class=" opacity-04">
                                                    {{ $item->review }}
                                                </p>
                                            </td>
                                            <td>
                                                <ul class="d-flex align-items-center">
                                                    @foreach (calculateProductRatings($item->product->id) as $rating)
                                                        <li>
                                                            <i class="material-icons star-clr">
                                                                grade
                                                            </i>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td>
                                                {{ getReponse($item->id) }}
                                            </td>
                                            <td>
                                                @if (isset($item->product))
                                                    @if (Auth::user()->user_type == 2 && $item->product->user_id == Auth::user()->id)
                                                        <div class="d-flex align-items-center">
                                                            <div class="cover-table-btn">
                                                                <ul>
                                                                    <li class="dropdown position-relative">
                                                                        <a href="javascript:void(0)"
                                                                            class="dropdown-toggle caret-none"
                                                                            data-bs-toggle="dropdown" role="button"
                                                                            id="navbarDropdown"><i class="material-icons">
                                                                                more_vert
                                                                            </i></a>
                                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                                            aria-labelledby="navbarDropdown">
                                                                            @if (checkReponse(Auth::user()->id) == null)
                                                                                <li>
                                                                                    <a href="" class="dropdown-item"
                                                                                        onclick="openResponseModal({{ $item->id }})"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#responseModal">
                                                                                        Give Response
                                                                                    </a>
                                                                                </li>
                                                                            @else
                                                                                <li>
                                                                                    <a href="" class="dropdown-item"
                                                                                        onclick="ViewResponse({{ checkReponse(Auth::user()->id)->rating_id }})"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#viewresponseModal">
                                                                                        View Response
                                                                                    </a>
                                                                                </li>
                                                                            @endif
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                    @endif

                        </div>
                        @endif
                        </td>
                        </tr>
                        @endforeach

                        </tbody>

                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="tabv1-2" role="tabpanel" aria-labelledby="tabv1-2-tab">
                    <div class="reviews-top-filter d-flex flex-wrap align-items-center gap-1 mb-3">
                        <div class="form-group m-0">
                            <input type="text" class="form-control" placeholder="Order Number">
                        </div>

                        <div class="form-group m-0">
                            <div class="custom-select" style="width:100%;">
                                <select class="form-control">
                                    <option value="0">Content</option>
                                    <option value="1">Standerd</option>
                                    <option value="1">Pro</option>
                                    <option value="1">Plus</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group m-0">
                            <div class="custom-select" style="width:100%;">
                                <select>
                                    <option value="0">Status</option>
                                    <option value="1">Not replied</option>
                                    <option value="1">replied</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group m-0">
                            <div class="custom-select" style="width:100%;">
                                <select>
                                    <option value="0">Rating</option>
                                    <option value="1">up to 4</option>
                                    <option value="1">up to 3</option>
                                    <option value="1">up to 2</option>
                                    <option value="1">up to 1</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group m-0 StartEndDate-v1">
                            <input type="text" class="reviewStartDate" placeholder="Start Date" />
                            <input type="text" class="reviewEndDate" placeholder="- End Date" />
                            <i class="bi bi-calendar4"></i>
                        </div>
                        <ul>
                            <li><a href="javascript:void(0)" class="btn btn-primary"><i class="material-icons">
                                        search
                                    </i></a></li>
                        </ul>
                    </div>
                    <br>
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <div class="custom-select" style="width:100%;">
                                <select>
                                    <option value="0">Roamer wise</option>
                                    <option value="1">Standerd</option>
                                    <option value="1">Pro</option>
                                    <option value="1">Plus</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-9 d-flex align-items-center justify-content-end">
                            <ul
                                class="d-flex align-items-center flex-wrap justify-content-center justify-content-lg-end gap-3">
                                <li>
                                    <div class="checktext">
                                        <input type="radio" name="roamerReview" id="roamerReview1" checked>
                                        <label for="roamerReview1">All Reviews</label>
                                    </div>
                                </li>
                                <li><span class="vr"></span></li>
                                <li>
                                    <div class="checktext">
                                        <input type="radio" name="roamerReview" id="roamerReview2">
                                        <label for="roamerReview2">With images/videos</label>
                                    </div>
                                </li>
                                <li><span class="vr"></span></li>
                                <li>
                                    <div class="checktext">
                                        <input type="radio" name="roamerReview" id="roamerReview3">
                                        <label for="roamerReview3">With text</label>
                                    </div>
                                </li>
                                <li><span class="vr"></span></li>
                                <li>
                                    <div class="checktext">
                                        <input type="radio" name="roamerReview" id="roamerReview4">
                                        <label for="roamerReview4">Lower than 4 stars</label>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="datatable-v1 style-pagination">
                        <table class="display roamerReviewTable" data-ordering="false" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Order</th>
                                    <th>Review</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="color: #0068E2;" class=" opacity-07">117302483376504</td>
                                    <td>
                                        <p class="opacity-05">Great seller</p>
                                        <p class="opacity-03">bazelqayyum (25 Mar 2021)</p>
                                    </td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>
                                        <div class="cover-table-btn">
                                            <ul>
                                                <li class="dropdown position-relative">
                                                    <a href="javascript:void(0)" class="dropdown-toggle caret-none"
                                                        data-bs-toggle="dropdown" role="button" id="navbarDropdown"><i
                                                            class="material-icons">
                                                            more_vert
                                                        </i></a>
                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                        aria-labelledby="navbarDropdown">
                                                        <li>
                                                            <a href="#." class="dropdown-item">View Details</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0)" class="dropdown-item">Product
                                                                List</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>


                            </tbody>

                        </table>
                    </div>
                </div>

            </div>
        </div>

        <div class="modal fade" id="responseModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="card-body pt-4">
                        <div class="modal-header">
                            <h5 class="card-title font-18px">Add <span class=" primary-text">Response</span></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body py-4">
                            <form id="responseForm" method="POST">
                                @csrf
                                <div class="row g-2">
                                    <div class="col-md-12">
                                        <input hidden name="id" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="review_id" id="rev_id">
                                        <div class="form-group">
                                            <label>Response to a review:</label>
                                            <textarea class="response form-control" name="response" placeholder="Add a response"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary">
                                    Save
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="viewresponseModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="card-body pt-4">
                        <div class="modal-header">
                            <h5 class="card-title font-18px">View <span class=" primary-text">Response</span></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body py-4">
                            <form>
                                @csrf
                                <div class="row g-2">
                                    <div class="col-md-12">
                                        <input placeholder="response" class="form-control" id="viewResponse">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    @push('adminscript')
        <script>
            $('#roamerID').on('change', function() {

                var id = $(this).val();

                window.location.href = '/admin/manage-reviews/reviewByRoamer/' + id;

            });

            function openResponseModal(id) {
                console.log('ID: '+id);
                $('#rev_id').val(id)
            }
            $('#responseForm').on('submit', function() {
                $('#responseForm').attr('action', '/admin/manage-reviews/store/response')

            })
        </script>
        <script>
            function ViewResponse(id)
            {
                $.ajax({
                    method: 'GET',
                    url: '/admin/manage-reviews/viewResponse/' + id,
                    success: function(response) {
                        // console.log(response.data.response);
                        $('#viewResponse').val(response.data.response);
                    }
                });
            }
        </script>
    @endpush
@endsection
