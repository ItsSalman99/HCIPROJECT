@extends('layouts.admin')
@section('content')
    <div class="cover-all-content">
        <div class="d-flex align-items-start justify-content-between flex-wrap gap-3">
            <div>
                <h2 class="section-title mb-1">Join Campaign Promotions</h2>
            </div>
        </div>
        <br>
        <br>
        <br>

        <div class="cover-inner-content">
                <div class="row g-2">
                    <div class="col-lg-12">
                        <h2 class="section-title">Campaign <span class="primary-text">Events</span></h2>
                        <br>
                        <br>
                        <div class="card">
                            <div class="card-body blog-height">
                                @foreach ($compaign as $compaigns)
                                    <div class="blog-v1">
                                        <div class="cover-img">
                                            <img src="{{ asset('storage/compaign/' . $compaigns->banner_img1) }}"
                                                alt="">
                                        </div>
                                        <div class="blog-content">
                                            <p>{{ Carbon\Carbon::parse($compaigns->compaign_start)->format('F d, Y') }} to
                                                {{ Carbon\Carbon::parse($compaigns->compaign_end)->format('F d, Y') }}</p>
                                            <ul>
                                                <li><a href="campaign-detail.php"
                                                        class="text-truncate">{{ $compaigns->compaign_name }}</a></li>
                                            </ul>
                                            <p class=" opacity-08">Minimum Discount: {{ $compaigns->off_percent }}% on
                                                current price</p>
                                            <p>Registration Until:
                                                {{ Carbon\Carbon::parse($compaigns->registeration_end)->format('F d, Y') }}
                                            </p>
                                            <br>
                                            <ul class="d-flex align-items-center flex-wrap gap-3">
                                                <li><a href="{{ route('admin.compaign.join', $compaigns->id) }}"
                                                        class="btn btn-primary extra-btn-padding-50">Join</a></li>

                                                <li class=" opacity-04">Products: {{ count($compaigns->compaignproduct) }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
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
