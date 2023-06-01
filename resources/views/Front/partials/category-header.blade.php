@php
    function getCategories()
    {
        $categories = App\Models\Category::where('active', 1)->orderBy('seq_no')->get();

        return $categories;
    }
@endphp

<div class="header-categories d-none d-lg-block">
    <div class="categories-row position-relative">
        <div class=" position-absolute " style="right: 2%; bottom: 10px;">
            {{-- <ul>
                <li><a data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                        aria-controls="collapseExample" class="collapsed"><i
                            class="bi bi-chevron-down d-flex rounded-circle align-items-center justify-content-center text-primary bg-primary"
                            style="width: 20px; height: 20px; --bs-bg-opacity: 0.2"></i></a></li>
            </ul> --}}
        </div>
        <div class="container">
            <ul class="d-flex align-items-center justify-content-between flex-wrap"
                style="column-gap: 3rem; row-gap: 2rem;">
                @foreach (getCategories() as $key => $cat)
                    <li class="dropdown position-static">
                        <a href="{{ route('product_grid', $cat->slug) }}"
                            class=" text-nowrap dropdown-toggle caret-none d-flex align-items-center gap-2"
                            @if (checkSubCategory($cat->id) > 0) data-bs-toggle="dropdown" @endif>
                            {{ $cat->name }}
                            @if (checkSubCategory($cat->id) > 0)
                                <i class="bi bi-chevron-down d-flex"></i>
                            @endif
                        </a>
                        @if (checkSubCategory($cat->id) > 0)
                            <div class="dropdown-menu p-3  border-0 shadow-lg mt-2"
                                style="--bs-dropdown-min-width: 70rem">
                                <div>
                                    <ul class="row row-cols-6 flex-wrap gap-5">
                                        @foreach ($cat->subcategory as $item)
                                            <li class="flex-1"><a href="{{ route('product_grid', ['slug' => $cat->slug, 'sub_cat'=> $item->slug]) }}"
                                                    class=" text-nowrap">{{ $item->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    {{-- <div class="collapsing-show collapse" id="collapseExample">
        <ul class="d-flex align-items-center flex-wrap mt-5" style="column-gap: 3rem; row-gap: 2rem;">
            <li class="dropdown ">
                <a href="product-grid.php"
                    class=" text-nowrap dropdown-toggle caret-none d-flex align-items-center gap-2"
                    data-bs-toggle="dropdown">Electronic Devices <i class="bi bi-chevron-down d-flex"></i></a>
                <div class="dropdown-menu p-4 border-0 shadow-sm mt-2" style="--bs-dropdown-min-width: 70rem">
                    <div>
                        <ul class="row row-cols-6 flex-wrap gap-5">
                            <li class=""><a href="#" class=" text-nowrap">Mobile Phones</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Smart Phones</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Tables</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Desktops</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Smart Watches</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Gaming Consoles</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Camera & Drone</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Security Cameras</a></li>

                        </ul>
                    </div>
                </div>
            </li>
            <li class="dropdown "><a href="product-grid.php"
                    class=" text-nowrap dropdown-toggle caret-none d-flex align-items-center gap-2"
                    data-bs-toggle="dropdown">Electronics Accessories <i class="bi bi-chevron-down d-flex"></i></a>
                <div class="dropdown-menu p-4 border-0 shadow-sm mt-2" style="--bs-dropdown-min-width: 70rem">
                    <div>
                        <ul class="row row-cols-6 flex-wrap gap-5">
                            <li class=""><a href="#" class=" text-nowrap">Mobile Accessories</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Smart Accessories</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Tables Accessories</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Desktops Accessories</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Watches Accessories</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Gaming Components</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Network Component</a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class=""><a href="product-grid.php"
                    class=" text-nowrap dropdown-toggle caret-none d-flex align-items-center gap-2"
                    data-bs-toggle="dropdown">TV & Home Appliances <i class="bi bi-chevron-down d-flex"></i></a>
                <div class="dropdown-menu p-4 border-0 shadow-sm mt-2" style="--bs-dropdown-min-width: 70rem">
                    <div>
                        <ul class="row row-cols-6 flex-wrap gap-5">
                            <li class=""><a href="#" class=" text-nowrap">Categories 1</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 2</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 3</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 4</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 5</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 6</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 7</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 8</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 9</a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class=""><a href="product-grid.php"
                    class=" text-nowrap dropdown-toggle caret-none d-flex align-items-center gap-2"
                    data-bs-toggle="dropdown">Health & Beauty <i class="bi bi-chevron-down d-flex"></i></a>
                <div class="dropdown-menu p-4 border-0 shadow-sm mt-2" style="--bs-dropdown-min-width: 70rem">
                    <div>
                        <ul class="row row-cols-6 flex-wrap gap-5">
                            <li class=""><a href="#" class=" text-nowrap">Categories 1</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 2</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 3</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 4</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 5</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 6</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 7</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 8</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 9</a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class=""><a href="product-grid.php"
                    class=" text-nowrap dropdown-toggle caret-none d-flex align-items-center gap-2"
                    data-bs-toggle="dropdown">Babies & Toys <i class="bi bi-chevron-down d-flex"></i></a>
                <div class="dropdown-menu p-4 border-0 shadow-sm mt-2" style="--bs-dropdown-min-width: 70rem">
                    <div>
                        <ul class="row row-cols-6 flex-wrap gap-5">
                            <li class=""><a href="#" class=" text-nowrap">Categories 1</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 2</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 3</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 4</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 5</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 6</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 7</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 8</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 9</a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class=""><a href="product-grid.php"
                    class=" text-nowrap dropdown-toggle caret-none d-flex align-items-center gap-2"
                    data-bs-toggle="dropdown">Groceries & Pets <i class="bi bi-chevron-down d-flex"></i></a>
                <div class="dropdown-menu p-4 border-0 shadow-sm mt-2" style="--bs-dropdown-min-width: 70rem">
                    <div>
                        <ul class="row row-cols-6 flex-wrap gap-5">
                            <li class=""><a href="#" class=" text-nowrap">Categories 1</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 2</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 3</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 4</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 5</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 6</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 7</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 8</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 9</a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="dropdown "><a href="product-grid.php"
                    class=" text-nowrap dropdown-toggle caret-none d-flex align-items-center gap-2"
                    data-bs-toggle="dropdown">Home & Lifestyle <i class="bi bi-chevron-down d-flex"></i></a>
                <div class="dropdown-menu p-4 border-0 shadow-sm mt-2" style="--bs-dropdown-min-width: 70rem">
                    <div>
                        <ul class="row row-cols-6 flex-wrap gap-5">
                            <li class=""><a href="#" class=" text-nowrap">Mobile Phones</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Smart Phones</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Tables</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Desktops</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Smart Watches</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Gaming Consoles</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Camera & Drone</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Security Cameras</a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="dropdown"><a href="product-grid.php"
                    class=" text-nowrap dropdown-toggle caret-none d-flex align-items-center gap-2"
                    data-bs-toggle="dropdown">Women’s Fashion <i class="bi bi-chevron-down d-flex"></i></a>
                <div class="dropdown-menu p-4 border-0 shadow-sm mt-2" style="--bs-dropdown-min-width: 70rem">
                    <div>
                        <ul class="row row-cols-6 flex-wrap gap-5">
                            <li class=""><a href="#" class=" text-nowrap">Categories 1</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 2</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 3</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 4</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 5</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 6</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 7</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 8</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 9</a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="dropdown"><a href="product-grid.php"
                    class=" text-nowrap dropdown-toggle caret-none d-flex align-items-center gap-2"
                    data-bs-toggle="dropdown"> Men’s Fashion <i class="bi bi-chevron-down d-flex"></i></a>
                <div class="dropdown-menu p-4 border-0 shadow-sm mt-2" style="--bs-dropdown-min-width: 70rem">
                    <div>
                        <ul class="row row-cols-6 flex-wrap gap-5">
                            <li class=""><a href="#" class=" text-nowrap">Categories 1</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 2</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 3</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 4</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 5</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 6</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 7</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 8</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 9</a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="dropdown"><a href="product-grid.php"
                    class=" text-nowrap dropdown-toggle caret-none d-flex align-items-center gap-2"
                    data-bs-toggle="dropdown">Watches <i class="bi bi-chevron-down d-flex"></i></a></li>
            <li class="dropdown"><a href="product-grid.php"
                    class=" text-nowrap dropdown-toggle caret-none d-flex align-items-center gap-2"
                    data-bs-toggle="dropdown"> Sports & Outdoor <i class="bi bi-chevron-down d-flex"></i></a>
                <div class="dropdown-menu p-4 border-0 shadow-sm mt-2" style="--bs-dropdown-min-width: 70rem">
                    <div>
                        <ul class="row row-cols-6 flex-wrap gap-5">
                            <li class=""><a href="#" class=" text-nowrap">Categories 1</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 2</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 3</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 4</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 5</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 6</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 7</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 8</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 9</a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="dropdown"><a href="product-grid.php"
                    class=" text-nowrap dropdown-toggle caret-none d-flex align-items-center gap-2"
                    data-bs-toggle="dropdown">Automative & Motorbike <i class="bi bi-chevron-down d-flex"></i></a>
                <div class="dropdown-menu p-4 border-0 shadow-sm mt-2" style="--bs-dropdown-min-width: 70rem">
                    <div>
                        <ul class="row row-cols-6 flex-wrap gap-5">
                            <li class=""><a href="#" class=" text-nowrap">Categories 1</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 2</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 3</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 4</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 5</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 6</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 7</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 8</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 9</a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="dropdown"><a href="product-grid.php"
                    class=" text-nowrap dropdown-toggle caret-none d-flex align-items-center gap-2"
                    data-bs-toggle="dropdown">Kids <i class="bi bi-chevron-down d-flex"></i></a>
                <div class="dropdown-menu p-4 border-0 shadow-sm mt-2" style="--bs-dropdown-min-width: 70rem">
                    <div>
                        <ul class="row row-cols-6 flex-wrap gap-5">
                            <li class=""><a href="#" class=" text-nowrap">Categories 1</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 2</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 3</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 4</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 5</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 6</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 7</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 8</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 9</a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="dropdown"><a href="product-grid.php"
                    class=" text-nowrap dropdown-toggle caret-none d-flex align-items-center gap-2"
                    data-bs-toggle="dropdown">Bags <i class="bi bi-chevron-down d-flex"></i></a>
                <div class="dropdown-menu p-4 border-0 shadow-sm mt-2" style="--bs-dropdown-min-width: 70rem">
                    <div>
                        <ul class="row row-cols-6 flex-wrap gap-5">
                            <li class=""><a href="#" class=" text-nowrap">Categories 1</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 2</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 3</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 4</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 5</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 6</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 7</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 8</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 9</a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="dropdown"><a href="product-grid.php"
                    class=" text-nowrap dropdown-toggle caret-none d-flex align-items-center gap-2"
                    data-bs-toggle="dropdown">Jewelery <i class="bi bi-chevron-down d-flex"></i></a>
                <div class="dropdown-menu p-4 border-0 shadow-sm mt-2" style="--bs-dropdown-min-width: 70rem">
                    <div>
                        <ul class="row row-cols-6 flex-wrap gap-5">
                            <li class=""><a href="#" class=" text-nowrap">Categories 1</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 2</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 3</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 4</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 5</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 6</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 7</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 8</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 9</a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="dropdown"><a href="product-grid.php"
                    class=" text-nowrap dropdown-toggle caret-none d-flex align-items-center gap-2"
                    data-bs-toggle="dropdown">Lifestyle <i class="bi bi-chevron-down d-flex"></i></a>
                <div class="dropdown-menu p-4 border-0 shadow-sm mt-2" style="--bs-dropdown-min-width: 70rem">
                    <div>
                        <ul class="row row-cols-6 flex-wrap gap-5">
                            <li class=""><a href="#" class=" text-nowrap">Categories 1</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 2</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 3</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 4</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 5</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 6</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 7</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 8</a></li>
                            <li class=""><a href="#" class=" text-nowrap">Categories 9</a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div> --}}
    {{-- <div class="categories-row">
        <div class="container">
            <ul class="d-flex align-items-center justify-content-between">
                @foreach (getCategories() as $key => $cat)
                    @if ($key > 7 && $key <= 16)
                        <li><a href="{{ route('product_grid', $cat->slug) }}">
                                {{ $cat->name }}
                            </a></li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div> --}}

</div>
