@extends('layouts.app')
@section('content')
    <style>
        .according-style-2 .accordion-item {
            border: 0;
            margin-bottom: 10px;
        }

        .according-style-2 .accordion-item .accordion-header {
            padding: 0;
            border: 0;
        }

        .according-style-2 .accordion-item .accordion-header button {
            background-color: #f3f3f3;
            position: relative;
            color: #151515;
            font-weight: normal;
            padding: 15px 40px 15px 15px;
            display: block;
            line-height: normal;
            font-weight: 500;
        }

        .according-style-2 .accordion-item .accordion-header button::after {
            content: "\f068";
            font-family: "FontAwesome";
            font-size: 16px;
            font-weight: normal;
            position: absolute;
            right: 15px;
            top: 50%;
            text-align: center;
            line-height: 1.25rem;
            background-image: none;
            transform: translateY(-50%);
            -webkit-transform: translateY(-50%);
            -moz-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            -o-transform: translateY(-50%);
        }

        .according-style-2 .accordion-item .accordion-header button[aria-expanded=false]::after {
            content: "\f067";
        }

        .according-style-2 .accordion-item .accordion-header button:not(.collapsed) {
            box-shadow: none;
        }

        .according-style-2 .accordion-item .accordion-header:hover button {
            color: var(--bs-primary);
        }

        .according-style-2 .accordion-item .accordion-body {
            border: 1px solid #f3f3f3;
            border-top: 0;
        }

        .according-style-2 .accordion-item .accordion-body p {
            margin-bottom: 0;
        }
    </style>
    <section style="background-image: url({{ asset('assets/images/faq.png') }}); background-size:cover; height: 50vh">
        <div class="container">
            <h1 class="font-weight-700  font-34px text-center text-white">
                FAQ
            </h1>
            <h6 class="font-weight-600 font-22px text-center mt-4">
                <span class="primary-text">Frequently Asked Questions</span>
            </h6>
        </div>
    </section>

    <section>
        <div class="container">
            <div>
                <h1>FAQ'S</h1>
            </div>
            <br>
            <br>
            <br>
            <div class="according-style-1">
                <div class="accordion" id="accordionExample">
                    @foreach ($faqs as $key => $faq)
                        <div class="accordion-item">
                            <h2 class="accordion-header position-relative" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#according-st-1-{{ $key }}"
                                    aria-expanded="false" aria-controls="collapseOne">
                                    {{ $faq->title }}
                                </button>

                            </h2>
                            <div id="according-st-1-{{ $key }}" class="accordion-collapse collapse"
                                aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>{!! $faq->text !!}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>
@endsection
@push('head')
@endpush
