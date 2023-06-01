@extends('layouts.admin')
@section('content')
    <div class="cover-all-content">
        <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
            <div class="d-flex align-items-center flex-wrap gap-3">
                <h2 class="section-title">Manage <span class="primary-text">Sub Categories</span></h2>
            </div>
            <ul>
                <li><a href="#." class="btn btn-primary text-uppercase extra-btn-padding-20" data-bs-toggle="modal"
                        data-bs-target="#addcategorymodal">Add Sub Category</a></li>
            </ul>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="cover-inner-content">
            <div class="custom-datatable-v1 table-align-middle">
                <div class="thead">
                    <div class="table-row">
                        <div style="flex: 0; padding:0 !important">
                            <div class="d-block" style=" width:50px; aspect-ratio:1">
                                &nbsp;
                            </div>
                        </div>
                        <div>Categories</div>
                        <div># Of Sub categories </div>
                        <div>Action</div>
                        <div>Add To Website Bottom</div>
                    </div>
                </div>
                <div class="tbody">
                    <div class="accordion Ctable-striped table-row-space">
                        @foreach ($categories as $item)
                            <div class="accordion-item">
                                <div class="accordion-header">
                                    <div class="table-row">
                                        <div style="flex: 0; padding:0 !important">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#row{{ $item->id }}" aria-expanded="false"
                                                aria-controls="row1">
                                                &nbsp;
                                            </button>
                                        </div>
                                        <div>
                                            <div class=" d-flex align-items-center gap-2">
                                                <img src="{{ asset('assets/admin/images/products/1.png') }}" alt=""
                                                    class=" border-radius-50px" style="width: 60px; aspect-ratio:1">
                                                <p>{{ $item->name }}</p>
                                            </div>
                                        </div>
                                        <div>
                                            <p>{{ $item->subcategory->count() }}</p>
                                        </div>
                                        <div>
                                            <label class="cswitch ms-0">
                                                <input class="cswitch--input" type="checkbox"><span
                                                    class="cswitch--trigger wrapper" onclick="changeActive(0)"></span>
                                            </label>
                                        </div>
                                        <div>
                                            <input type="checkbox" class=" form-check-input " onclick="checkall({{ $item->id }});">
                                        </div>
                                    </div>
                                </div>
                                @if (!$item->subcategory->isEmpty())
                                    <div id="row{{ $item->id }}" class="accordion-collapse collapse">
                                        <div class="accordion-body border-top height-370px overflow-x-hidden scroll-y-auto">
                                            <div class="table-responsive table-v2">
                                                <table class=" table ">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="3">Sub-Categories</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($item->subcategory as $sub)
                                                            <tr>
                                                                <td>
                                                                    <p class=" opacity-05 font-weight-400">
                                                                        {{ $sub->name }}
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <label class="cswitch ms-0">
                                                                        <input class="cswitch--input"
                                                                            onclick="changeActive({{ $sub->id }})"
                                                                            type="checkbox" <?php if ($sub->active == 1) {
                                                                                echo 'checked';
                                                                            } ?>>
                                                                        <span class="cswitch--trigger wrapper"></span>
                                                                    </label>
                                                                </td>
                                                                <td>
                                                                    <input onclick="checkBottom({{ $sub->id }})"
                                                                        <?php if ($sub->bottom == 1) {
                                                                            echo 'checked';
                                                                        } ?> type="checkbox"
                                                                        class=" form-check-input">
                                                                </td>
                                                                <td>
                                                                    <a href="#" class="dropdown-item">
                                                                        <i class="bi bi-trash"></i>
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <a href="#" class="dropdown-item">
                                                                        <i class="bi bi-pencil"
                                                                            onclick="editSubCat({{ $sub->id }})"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#editcategorymodal"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                @endif

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <ul class="d-flex align-items-center justify-content-center flex-wrap gap-3">
                <li><a href="javascript:void(0)" class="gray-btn-100 extra-btn-padding-80 text-uppercase">Cancel</a></li>
                <li><a href="javascript:void(0)" class="btn btn-primary extra-btn-padding-80 text-uppercase">Save</a></li>
            </ul>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="addcategorymodal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="card-body pt-4">
                        <div class="modal-header">
                            <h5 class="card-title font-18px">Add <span class=" primary-text">Sub Category</span></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body py-4">
                            <form action="{{ route('productcategories.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="mb-3">Category</label>
                                    <div class=" position-relative">
                                        <Select name="category_id" class="form-control catforpro" id="catforpro"
                                            style="padding-right: 60px;" required>
                                            <option value="">Select</option>
                                            @foreach ($categories as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </Select>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="" class="mb-3">Sub - Category</label>
                                    <div class=" position-relative">
                                        {{-- <Select name="sub_category" class=" form-control" style="padding-right: 60px;">
                                            <option value="1">asd</option>
                                        </Select> --}}
                                        <input type="text" placeholder="Define Sub Category" name="sub_category"
                                            class="form-control" style="padding-right: 60px;">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="mb-3">Image</label>
                                    <div class=" position-relative">
                                        <input type="file" class="form-control" name="image" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="mb-3">Percentage</label>
                                    <div class=" position-relative">
                                        <input type="number" placeholder="Define Percentage" name="percentage"
                                            class="form-control" style="padding-right: 60px;">
                                    </div>
                                </div>
                                <div class="text-center mt-5">
                                    <button type="submit" class="btn btn-primary extra-btn-padding-45 text-uppercase">
                                        Add To list
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="editcategorymodal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="card-body pt-4">
                        <div class="modal-header">
                            <h5 class="card-title font-18px">Edit <span class=" primary-text">Sub Category</span></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body py-4">
                            <form id="editSubCat" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="brand-box">
                                        <div class="cover-img">
                                            <img src="" class="showimg" alt="image">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="mb-3">Category</label>
                                    <div class=" position-relative">
                                        <Select name="category_id" class="form-control categories"
                                            style="padding-right: 60px;">
                                            <option value="">Select</option>
                                        </Select>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="" class="mb-3">Sub - Category</label>
                                    <div class=" position-relative">
                                        <input type="text" placeholder="Define Sub Category" name="sub_category"
                                            class="form-control editsubcat" style="padding-right: 60px;">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="mb-3">Image</label>
                                    <div class=" position-relative">
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="mb-3">Percentage</label>
                                    <div class=" position-relative">
                                        <input type="number" placeholder="Define Percentage" name="percentage"
                                            class="form-control editpercentage" style="padding-right: 60px;">
                                    </div>
                                </div>
                                <div class="text-center mt-5">
                                    <button type="submit" class="btn btn-primary extra-btn-padding-45 text-uppercase">
                                        Add To list
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
        <script type="text/javascript">
            // $(document).ready(function() {
            //     $('.catforpro').select2();
            // });

            function checkall(id) {
                $.ajax({
                    url: '{{ route('admindashboad') }}' + '/sub-category/checkall-bottom/' + id,
                    method: 'GET',
                    success: function(response) {
                        if (response.status == 200) {

                            $('#addsuccesstoaster').addClass('show');
                            $('#title').html(response.title)
                        } else {
                            $('#addsuccesstoaster').addClass('show');
                            $('#title').html('Something went wrong, Try Again!');
                        }
                    }
                })

                setTimeout(function() {
                    $('#addsuccesstoaster').removeClass('show')
                    window.location.href = '/admin/productcategories'
                }, 1000);
            }

            function checkBottom(id) {

                console.log(id);

                $.ajax({
                    url: '{{ route('admindashboad') }}' + '/sub-category/check-bottom/' + id,
                    method: 'GET',
                    success: function(response) {
                        if (response.status == 200) {

                            $('#addsuccesstoaster').addClass('show');
                            $('#title').html(response.title)

                        } else {
                            $('#addsuccesstoaster').addClass('show');
                            $('#title').html('Something went wrong, Try Again!');
                        }
                    }
                })

                setTimeout(function() {
                    $('#addsuccesstoaster').removeClass('show')
                }, 1000);
            }

            function changeActive(id) {

                console.log(id);

                $.ajax({
                    url: '{{ route('admindashboad') }}' + '/sub-category/change-status/' + id,
                    method: 'get',
                    success: function(response) {
                        if (response.status == 200) {

                            $('#addsuccesstoaster').addClass('show');
                            $('#title').html(response.title)

                        } else {
                            $('#addsuccesstoaster').addClass('show');
                            $('#title').html('Something went wrong, Try Again!');
                        }
                    }
                })
                setTimeout(function() {
                    $('#addsuccesstoaster').removeClass('show')
                }, 1000);

            }
        </script>

        <script>
            function editSubCat(id) {

                $('#editSubCat').attr('action', '{{ route('admindashboad') }}' + '/sub-category/update/' + id)

                $.ajax({
                    url: '{{ route('admindashboad') }}' + '/sub-category/edit/' + id,
                    method: 'GET',
                    success: function(response) {
                        // console.log(response.data.category);
                        $('.showimg').attr('src', '{{ route('front.index') }}' + response.data.image)
                        $.each(response.categories, function(key, value) {
                            $('.categories').append('<option value="' + value.id + '">' +
                                value.name + '</option>');
                            $('.categories option[value="' + response.data.category.id + '"]').attr('selected', true);
                        })
                        $('.editsubcat').val(response.data.name);
                        $('.editpercentage').val(response.data.percentage);
                    }
                })

            }
        </script>
    @endpush
