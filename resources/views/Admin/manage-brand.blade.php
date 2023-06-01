@extends('layouts.admin')
@section('content')
    <div class="cover-all-content">
        <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
            <h2 class="section-title">Manage <span class="primary-text">Brands</span></h2>
            <ul>
                <li><a href="{{ route('brands.create') }}" class="btn btn-primary text-uppercase extra-btn-padding-25">Add
                        New</a>
                </li>
            </ul>
        </div>

        <br>
        <br>
        <div class="row">
            <div class="col-md-4">
                <div class="d-flex align-items-center gap-1">
                    <input type="text" class="form-control searchBrand" placeholder="Brand name">
                    <ul>
                        <li><a href="javascript:void(0)" class="btn btn-primary"><i class="material-icons">
                                    search
                                </i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="cover-inner-content">
            <div class="row g-4" id="brands">
                @foreach ($data as $i)
                    <div class="col-md-4 col-xl-3">
                        <div class="brand-box">
                            <div class="cover-img">
                                <img src="{{ asset($i->cover_image) }}" alt="image">
                                <ul class="edit-pencil">
                                    <li>
                                        <a href="{{ route('brands.edit', $i->id) }}"><img
                                                src="{{ asset('assets/admin/images/icons/pencil.svg') }}" alt="">
                                        </a>
                                    </li>

                                </ul>
                            </div>
                            <div class="content">
                                <img src="{{ asset($i->image) }}" alt="">

                                <div>
                                    <p>Created on: {{ date('F , j Y', strtotime($i->created_at)) }}</p>
                                    <ul>
                                        <li>
                                            <a href="javascript:void(0)" class=" text-truncate">{{ $i->name }}</a>
                                        </li>
                                    </ul>

                                    <p class=" opacity-04">Products: {{ count($i->products) }}</p>
                                    <a href="{{ route('brands.destroy', $i->id) }}">
                                        <i class="bi bi-trash text-danger"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
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
                        <li><a href="javascript:void(0);" class=" pe-none user-select-none">...</a></li>
                        <li><a href="javascript:void(0);">10</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">chevron_right</i></a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">keyboard_double_arrow_right</i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    @endsection

    @push('adminscript')
        <script>
            $('.searchBrand').on('keyup', function(e) {

                e.preventDefault();

                var name = $('.searchBrand').val();

                if (name == "") {
                    name = "undefined";
                }

                $.ajax({
                    url: '{{ route('admindashboad') }}' + '/brands/search/' + name,
                    type: "get",
                    success: function(response) {
                        if (response.status == 200) {

                            // console.log(response.roamer.address);

                            $('#brands').html('');
                            $.each(response.brands, function(key, value) {
                                // console.log(value.products.length);
                                $('#brands').append(
                                    '<div class="col-md-4 col-xl-3"><div class="brand-box"><div class="cover-img"><img src="{{ route('front.index') }}' +
                                    value.cover_image + '" alt="image">' +
                                    '<ul class="edit-pencil"><li><a href="{{ route('admindashboad') }}' +
                                    '/brands/' + value.id +
                                    '/edit"><img src="{{ route('front.index') }}' +
                                    '/assets/admin/images/icons/pencil.svg' +
                                    '" alt=""></a></li></ul></div>' +
                                    '<div class="content"> <img src="{{ route('front.index') }}' +
                                    value.image + '" alt=""><div><p>Created on: ' + value
                                    .created_at + '</p>' +
                                    '<ul><li><a href="javascript:void(0)" class=" text-truncate">' +
                                    value.name +
                                    '</a></li></ul><p class=" opacity-04">Products: ' + value
                                    .products.length + '</p></div></div></div></div>');

                            });



                        } else {

                        }

                    }
                })

            });
        </script>
    @endpush
