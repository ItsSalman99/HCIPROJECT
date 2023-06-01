@extends('layouts.app')
@section('content')
    <section>
        <div class="container">
            <div class="d-flex align-items-center gap-3">
                <h4 class="block-title m-0">Categories</h4>
            </div>
            <div class="categories-card-v1 mt-4">
                <div class="row justify-content-center g-1 g-md-4">
                    @foreach ($categories as $key => $cat)
                        <div class="box col-xl-3 col-md-4">
                            <a href="{{ route('product_grid', ['slug' => $cat->slug]) }}">
                                <img src="{{ asset('storage/catlog/' . $cat->image) }}" alt="">
                                <p class="text-end">{{ $cat->name }}</p>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
