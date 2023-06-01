@extends('layouts.admin')
@section('content')
    <div class="cover-all-content">
        <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
            <div class="d-flex align-items-center flex-wrap gap-3">
                <h2 class="section-title">Campaign <span class="primary-text">Management</span></h2>
                <div class=" position-relative">
                    <input type="search" id="searchCampaign" class=" form-control" placeholder="Search">
                    <i class="material-icons position-absolute top-50 translate-middle-y opacity-05" style="right: 10px;">
                        search
                    </i>
                </div>
            </div>
            <ul>
                <li><a href="{{ route('admin.compaign.create') }}"
                        class="btn btn-primary text-uppercase extra-btn-padding-20">Add Campaign</a></li>
            </ul>
        </div>
        <br>
        <br>
        <div class="cover-inner-content">
            <div class="tabs-style-1">
                <!-- Nav tabs -->
                {{-- <div class="tabs-links">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="tabv1-1-tab" data-bs-toggle="tab" data-bs-target="#tabv1-1" type="button" role="tab" aria-controls="tabv1-1" aria-selected="true">Mega/A+ Campaigns</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="tabv1-2-tab" data-bs-toggle="tab" data-bs-target="#tabv1-2" type="button" role="tab" aria-controls="tabv1-2" aria-selected="false">Daily Sales</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="tabv1-3-tab" data-bs-toggle="tab" data-bs-target="#tabv1-3" type="button" role="tab" aria-controls="tabv1-3" aria-selected="false">Special Promotions</button>
                    </li>
                </ul>
            </div> --}}
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="tabv1-1" role="tabpanel" aria-labelledby="tabv1-1-tab">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="d-flex align-items-center flex-wrap gap-2">
                                    <form action="{{ route('campaign.filterByDate') }}" method="GET">
                                        <div class="form-group m-0 StartEndDate-v2">
                                            <div class="d-flex align-items-center gap-2">
                                                <i class="bi bi-calendar4"></i>
                                                <p class="mb-0 opacity-07 text-nowrap"><span>
                                                    Filter By Dates
                                                </span> <span>-</span></p>
                                            </div>
                                            <input type="text" name="start_date" class="reviewStartDate" placeholder="Start Date">
                                            <span>-</span>
                                            <input type="text" name="end_date" class="reviewEndDate" placeholder="End Date">
                                            <button type="submit" class="btn btn-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div id="appendCampaign">
                            @foreach ($compaign as $compaigns)
                                <div class="blog-v1 flex-lg-nowrap">
                                    <div class="cover-img">
                                        <img src="{{ asset('storage/compaign/' . $compaigns->banner_img1) }}" alt="">
                                    </div>
                                    <div
                                        class="blog-content d-flex align-items-center flex-wrap gap-5 justify-content-between mt-3 mt-md-0">
                                        <div class="flex-1">
                                            <div class="d-flex align-items-center flex-wrap gap-2">
                                                <p>{{ Carbon\Carbon::parse($compaigns->compaign_start)->format('F d, Y') }} to
                                                    {{ Carbon\Carbon::parse($compaigns->compaign_end)->format('F d, Y') }}</p>
                                            </div>
                                            <ul>
                                                <li><a href="campaign-detail.php"
                                                        class="text-truncate">{{ $compaigns->compaign_name }} </a></li>
                                            </ul>
                                            <p class=" opacity-08">Minimum Discount: {{ $compaigns->off_percent != null ? $compaigns->off_percent . '%' : $compaigns->fix_amount . 'Pkr' }} on current
                                                price</p>
                                            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p> --}}

                                            <ul class="d-flex align-items-center flex-wrap gap-3 mt-3">
                                                <li class=" opacity-04">Products: {{ count($compaigns->compaignproduct) }}</li>
                                            </ul>
                                        </div>
                                        <div class=" text-lg-end">
                                            <p class="mb-3">Registration Until:
                                                {{ Carbon\Carbon::parse($compaigns->registeration_end)->format('F d, Y') }}</p>
                                            <ul class="d-flex aling-items-center flex-wrap gap-2">
                                                <li><a href="{{route('admin.compaign.edit', $compaigns->id)}}"
                                                        class=" btn btn-primary extra-btn-padding-35 text-uppercase font-weight-500">Edit</a>
                                                </li>
                                                <li><a href="{{ route('admin.compaign.applicant', $compaigns->id) }}"
                                                        class="btn btn-primary extra-btn-padding-35 text-uppercase font-weight-500 primary-bg-clr-02 primary-text primary-border-clr-01">Applicants</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                            @endforeach
                        </div>
                        <br>
                        <div
                            class="d-flex align-items-center flex-wrap gap-3 justify-content-center justify-content-lg-between">
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
                                    <li><a href="javascript:void(0);"><i
                                                class="material-icons">keyboard_double_arrow_right</i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    @push('adminscript')

    <script>
        $('#searchCampaign').on('keyup', function(key,value){
           var name = $(this).val();
           $('#appendCampaign').empty();
            $.ajax({
                url: '/admin/campaign/search/'+name,
                method: 'GET',
                success: function(response){
                    $('#appendCampaign').html('');
                    $('#appendCampaign').append(response.body)
                }
            });
        });
    </script>


    @endpush
    @endsection



