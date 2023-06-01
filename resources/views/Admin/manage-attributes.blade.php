@extends('layouts.admin')
@section('content')
    <div class="cover-all-content">
        <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
            <div class="d-flex align-items-center flex-wrap gap-3">
                <h2 class="section-title">Manage <span class="primary-text">Attributes</span></h2>
                {{-- <div class=" position-relative">
                    <input type="search" class=" form-control" placeholder="Search">
                    <i class="material-icons position-absolute top-50 translate-middle-y opacity-05" style="right: 10px;">
                        search
                    </i>
                </div> --}}
            </div>
        </div>
        <br>
        <br>
        <div class="cover-inner-content">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="row g-4">

                <div class="col-lg-6 offset-lg-6 d-flex align-items-center justify-content-center justify-content-lg-end">
                    <button href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addattrModal"
                        class="btn btn btn-primary">Add New</button>
                    {{-- <ul class="d-flex align-items-center flex-wrap gap-3">
                        <li>
                            <div class="checktext">
                                <input type="radio" name="vendorcheck" id="Allvendor" checked>
                                <label for="Allvendor">All (480)</label>
                            </div>
                        </li>
                        <li><span class="vr"></span></li>
                        <li>
                            <div class="checktext">
                                <input type="radio" name="vendorcheck" id="goodvendor">
                                <label for="goodvendor">Good (400)</label>
                            </div>
                        </li>
                        <li><span class="vr"></span></li>
                        <li>
                            <div class="checktext">
                                <input type="radio" name="vendorcheck" id="badvendor">
                                <label for="badvendor">Bad (50)</label>
                            </div>
                        </li>
                        <li><span class="vr"></span></li>
                        <li>
                            <div class="checktext">
                                <input type="radio" name="vendorcheck" id="livevendor">
                                <label for="livevendor">Live (390)</label>
                            </div>
                        </li>
                        <li><span class="vr"></span></li>
                        <li>
                            <div class="checktext">
                                <input type="radio" name="vendorcheck" id="inactivevendor">
                                <label for="inactivevendor">Inactive (90)</label>
                            </div>
                        </li>
                    </ul> --}}
                </div>
            </div>

            <div class="datatable-v1 style-pagination">
                <table class="myDataTable display" data-ordering="true" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Label</th>
                            <th>Active</th>
                            <th>Stock </th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                            <tr>
                                <td class=" opacity-07">#{{ $d->id }}</td>


                                <td style="color: #0068E2" class=" opacity-07">{{ $d->label }}</td>
                                <td>
                                    <label class="cswitch">
                                        <input class="cswitch--input" onchange="changeStatus({{ $d->id }})" type="checkbox"
                                            {{ $d->is_active ? '' : 'checked' }} /><span
                                            class="cswitch--trigger wrapper"></span>
                                    </label>
                                </td>

                                <td>
                                    <p class=" opacity-04">{{ $d->is_active }}</p>
                                </td>

                                <td style="color: #0068E2" class=" opacity-07">
                                    {{ $d->stock }}
                                </td>
                                <td><a data-id="{{ $d->id }}" data-label="{{ $d->label }}"
                                        data-active="{{ $d->is_active }}" data-stock="{{ $d->stock }}"
                                        class="editattr btn btn-primary">edit</a> <a class="btn btn-danger"
                                        href="{{ route('attributes.destroy', ['attribute' => $d->id]) }}">delete</a> </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Add Modal -->
        <div class="modal " id="addattrModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog modal modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="card-body pt-4">
                        <div class="modal-header">
                            <h5 class="card-title font-18px">Add <span class=" primary-text">Attribute</span></h5>
                            <button type="button" class="btn-close" data-bs-target="#addattrModal" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body py-4">
                            <form action="{{ route('attributes.store') }}" method="POST">
                                @csrf
                                <div class="row g-2">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Label</label>
                                            <input type="text" name="label" class="form-control"
                                                placeholder="EX: Color" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Stock (add comma saperated values)</label>
                                            <input type="text" name="stock" class="form-control"
                                                placeholder="Ex: Red,Yellow,Green,Blue" value="" required>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary text-center justify-content-center">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Edit Modal -->
        <div class="modal" id="editattrModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog modal modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="card-body pt-4">
                        <div class="modal-header">
                            <h5 class="card-title font-18px">Edit <span class=" primary-text">Attribute</span></h5>
                            <button type="button" class="btn-close" data-bs-target="#editattrModal" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body py-4">
                            <form action="{{ route('attributes.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="edit_id" id="edit_id">
                                <div class="row g-2">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Label</label>
                                            <input type="text" name="edit_name" id="edit_name" class=" form-control"
                                                placeholder="EX: Color" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Stock (add comma saperated values)</label>
                                            <input type="text" name="edit_stock" id="edit_stock"
                                                class=" form-control" placeholder="Ex: Red,Yellow,Green,Blue"
                                                value="" required>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @push('adminscript')
            <script>
                function changeStatus(id) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: '{{ route('admindashboad') }}' + '/attributes/changeStatus/' + id,
                        type: "get",
                        success: function(response) {
                            if (response.status == 200) {
                                $('#addsuccesstoaster').addClass('show');
                                $('#title').html(response.title)

                            } else {
                                $('#addsuccesstoaster').addClass('show');
                                $('#title').html("Something went wrong!")
                            }

                        }

                    })
                    setTimeout(function() {
                        $('#addsuccesstoaster').removeClass('show')
                    }, 1000);
                }
            </script>
            <script type="text/javascript">
                $('td .editattr').on('click', function() {
                    var id = $(this).data("id");
                    var label = $(this).data("label");
                    // var active=$(this).data("active");
                    var stock = $(this).data("stock");

                    $('#edit_id').val(id);
                    $('#edit_name').val(label);
                    $('#edit_stock').val(stock);
                    $('#editattrModal').modal('show');
                    // $.get("attributes/" + id +"/edit", {}, function(data, textStatus, jqXHR) {
                    //     if(textStatus=='success'){
                    //         alert('success');
                    //     }else{
                    //         alert('failed');
                    //     }
                    //     console.log(data);
                    //     console.log('----------------');
                    //     console.log(textStatus);

                    //     // if (data.success) {
                    //     //     // $('#subcategory_id').html('');
                    //     //     // $('#subcategory_id').append(data.data);
                    //     // } else {
                    //     //     alert('failed');
                    //     // }
                    // },"json");
                });
            </script>
        @endpush
    @endsection
