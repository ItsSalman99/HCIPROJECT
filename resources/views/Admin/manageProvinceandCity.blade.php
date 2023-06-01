@extends('layouts.admin')
@section('content')
    <div class="cover-all-content">
        <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
            <div class="d-flex align-items-center flex-wrap gap-3">
                <h2 class="section-title">Manage <span class="primary-text">City & Province</span></h2>
            </div>
            <ul>
                <li><a href="{{ route('province.create') }}" class="btn btn-primary text-uppercase extra-btn-padding-20">Add
                        City</a></li>
            </ul>
        </div>
        <br>
        <br>
        <div class="col-md-4">
            <div class=" position-relative">
                <input type="search" class=" form-control searchCities" placeholder="Search here..."  name="search">
                <i class="material-icons position-absolute top-50 translate-middle-y opacity-05" style="right: 10px;">
                    search
                </i>
            </div>
        </div>
        <br>
        <br>
        <div class="cover-inner-content">
            <div class="datatable-v1 style-pagination">
                <table class="myDataTable display" data-ordering="true" style="width:100%">
                    <thead>
                        <tr>
                            <th>S.no</th>
                            <th>Province</th>
                            <th>City</th>

                        </tr>
                    </thead>
                    <tbody id="cities">
                        @foreach ($city as $d)
                            <tr>
                                <td class=" opacity-07">#{{ $d->id }}</td>
                                <td>
                                    {{ $d->province->province_name }}
                                </td>
                                <td>
                                    {{ $d->city_name }}
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
    @endsection

    @push('adminscript')
        <script>
            $('.searchCities').on('keyup', function(e) {

                e.preventDefault();

                var name = $('.searchCities').val();
                console.log(name);
                if (name == "") {
                    name = "undefined";
                }

                $.ajax({
                    url: '{{ route('admindashboad') }}' + '/cities/search/' + name,
                    type: "get",
                    success: function(response) {
                        if (response.status == 200) {

                            // console.log(response.roamer.address);

                            $('#cities').html('');
                            $.each(response.cities, function(key, value) {
                                // console.log(value.products.length);
                                $('#cities').append('<tr><td class=" opacity-07">#' + value.id +
                                    '</td>' +
                                    '<td>' + value.province.province_name + '</td>' +
                                    '<td>' + value.city_name + '</td></tr>');

                            });

                        }
                    }
                })

            });
        </script>
    @endpush
