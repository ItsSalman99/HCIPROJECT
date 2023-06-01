@extends('layouts.app')
@section('content')
    <div class="cover-all-content">
        <section>
            <div class=" width-100 width-md-40 mx-auto">
                <div class="text-center">
                    <h1 class=" font-40px font-md-80px fw-600 m-0 lh-1"
                        style=" letter-spacing: 2px; color: #3a3a3a; text-shadow: 2px 2px 1px var(--bs-primary)">
                        Thank
                        Y<span><img src="https://cdn-icons-png.flaticon.com/512/742/742751.png" alt=""
                                class=" width-10 width-md-15"></span>u !</h1>
                    <p class=" font-16px font-lg-19px my-2 my-lg-4">Thank you for your order.</p>
                    <br>
                    <p class=" font-16px font-lg-19px my-2 my-lg-4">Your order # is: {{ $myorder->order_no }}</p>
                    <br>
                    <p class=" font-16px font-lg-19px my-2 my-lg-4">
                        You will receive an order confirmation email with
                        details of your order and a link to track your process..
                    </p>
                    <a href="/"
                        class="d-inline-flex gap-3 lh-base btn btn-primary bg-gradient extra-btn-padding-35 text-uppercase fw-600 rounded-pill"><i
                            class="bi bi-shop font-20px font-lg-25px"></i> back to shopping</a>
                </div>
            </div>
        </section>
    </div>
@endsection
