@extends('layouts.admin')
@section('content')
    <div class="cover-all-content">
        <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
            <div class="d-flex align-items-center flex-wrap gap-3">
                <h2 class="section-title">Manage <span class="primary-text">Categories</span></h2>
            </div>
            <ul>
                <li><a href="#." class="btn btn-primary text-uppercase extra-btn-padding-20" data-bs-toggle="modal"
                        data-bs-target="#addcategorymodal">Add Category</a></li>
            </ul>
        </div>
        <br>
        <br>
        <div class="col-md-4">
            <div class=" position-relative">
                <input type="search" class="searchCategory form-control" placeholder="Search here...">
                <i class="material-icons position-absolute top-50 translate-middle-y opacity-05" style="right: 10px;">
                    search
                </i>
            </div>
        </div>
        <br>
        <br>
        <div class="cover-inner-content">
            <div class="datatable-v1 style-pagination">
                <table class="myDataTable display" data-searching="true" data-ordering="false" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>seq_no</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>%</th>
                            <th>Status</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody id="cat">
                        @foreach ($catlog as $d)
                            <tr>
                                <td class=" opacity-07">#{{ $d->id }}</td>
                                <td class=" opacity-07">{{ $d->seq_no }}</td>
                                <td>
                                    {{ $d->name }}
                                </td>
                                <td>
                                    <img style="width: 85px;height: 72px;" src="{{ asset('storage/catlog/' . $d->image) }}"
                                        alt="">
                                </td>
                                <td>
                                    {{ isset($d->percentage) ? $d->percentage : '0' }}%
                                </td>
                                <td>
                                    <label class="cswitch">
                                        <input class="cswitch--input" onclick="changeStatus({{ $d->id }})"
                                            type="checkbox" <?php if($d->active == 1){ echo 'checked'; }?> /><span class="cswitch--trigger wrapper"></span>
                                    </label>
                                </td>
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
                                                        <a onclick="editCatalog({{ $d->id }})" data-bs-toggle="modal" data-bs-target="#editcategorymodal"
                                                            class="dropdown-item">Edit</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('maincategory.delete', ['id' => $d->id]) }}"
                                                            class="dropdown-item">
                                                            Delete
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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
                            <form action="{{ route('catlog.create') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-2">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>Category</label>
                                            <input name="name" type="text" class=" form-control"
                                                placeholder="Enter Category">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input name="image" type="file" class=" form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>Min. Profit Price</label>
                                            <input name="percentage" type="text" class=" form-control"
                                                placeholder="Enter Percentage Price">
                                        </div>
                                    </div>
                                     <div class="col-md-6">

                                        <div class="form-group">
                                            <label>Sequence Number</label>
                                            <input name="seq_no" type="number" min="1" class=" form-control"
                                                placeholder="Enter Sequence Number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <label class="cswitch">
                                                <input name="status" class="cswitch--input" type="checkbox" /><span
                                                    class="cswitch--trigger wrapper"></span>
                                            </label>
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
        <!-- Modal -->
        <div class="modal fade" id="editcategorymodal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="card-body pt-4">
                        <div class="modal-header">
                            <h5 class="card-title font-18px">Edit <span class=" primary-text">Category</span></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body py-4">
                            <form id="updateCatalogForm" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-2">
                                    <div class="col-md-12">
                                        <div class="brand-box">
                                            <div class="cover-img">
                                                <img src="" class="showimg" alt="image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>Sequence Number</label>
                                            <input name="seq_no" id="seq" type="number" min="1"class=" form-control"
                                                placeholder="Enter Sequence Number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>Category</label>
                                            <input name="name" type="text" class="editcatname form-control"
                                                placeholder="Enter Category">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input name="image" type="file" class="editimagename form-control"
                                                placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>Min. Profit Price</label>
                                            <input name="percentage" type="text" class="editpercentage form-control"
                                                placeholder="Enter Percentage Price">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary text-uppercase extra-btn-padding-20">
                                    Update
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @push('adminscript')
        <script>
            function changeStatus(id) {

                $.ajax({
                    url: '{{ route('admindashboad') }}' + '/main-category/change-status/' + id,
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
            $('.searchCategory').on('keyup', function(e) {

                e.preventDefault();

                var name = $('.searchCategory').val();
                // console.log(name);
                if (name == "") {
                    name = "undefined";
                }

                $.ajax({
                    url: '{{ route('admindashboad') }}' + '/searchCategory/' + name,
                    type: "get",
                    success: function(response) {
                        if (response.status == 200) {

                            console.log(response.categories);

                            $('#cat').html('');
                            $.each(response.categories, function(key, value) {
                                var percentage = 0;
                                if (value.percentage != null) {
                                    percentage = value.percentage;
                                }
                                $('#cat').append('<tr><td class=" opacity-07">#' +
                                    value.id + '</td><td>' + value.name + '</td>' +
                                    '<td><img style="width: 85px;height: 72px;" src="{{ route('front.index') }}/storage/catlog/' +
                                    value.image + '" alt=""></td>' +
                                    '<td>' + percentage + '%</td>' +
                                    '<td><label class="cswitch"><input class="cswitch--input" type="checkbox" onclick="changeStatus(' +
                                    value.id + ')" checked />' +
                                    '<span class="cswitch--trigger wrapper"></span></label></td></tr>'
                                );

                            });

                        }
                    }
                })

            });
        </script>
        <script>
            function editCatalog(id) {

                $('#updateCatalogForm').attr('action', '{{ route('admindashboad') }}'+ '/main-category/update/'+id )

                $.ajax({
                    url: '{{ route('admindashboad') }}' + '/main-category/edit/' + id,
                    method: 'GET',
                    success: function(response) {
                        // console.log(response.data.name);
                        $('.editcatname').val(response.data.name);
                        $('.showimg').attr('src', '{{ route('front.index') }}/storage/catlog/'+ response.data.image);
                        $('.editpercentage').val(response.data.percentage);
                        $('#seq').val(response.data.seq_no);
                    }
                })

            }
        </script>
    @endpush
