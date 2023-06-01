<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Attribute as ModelsAttribute;
use App\Models\Brand;
use App\Models\City;
use App\Models\CompaignProduct;
use App\Models\Coupen;
use App\Models\Customer;
use App\Models\CustomerAddress;
use App\Models\Order;
use App\Models\OrderRefund;
use App\Models\Province;
use App\Models\Rating;
use App\Models\SubCategory;
use App\Models\Transaction;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;

class FrontController extends Controller
{
    public function __construct()
    {
        cache()->flush();
        Artisan::call('cache:clear');
    }

    public function product_detail($id)
    {
        // dd($id);
        $data = Product::find($id);
        $attr = [];
        // dd($data->varient_attr);
        if ($data->varient_attr) {
            $attr = ModelsAttribute::whereIn('id', json_decode($data->varient_attr))->get();
        }
        $related_products = Product::where('category_id', $data->category_id)->get();
        $like = Product::take(10)->get();
        // dd($attr);

        $max = Rating::where('product_id', $data->id)->max('rating');
        $rating = range(1, $max);

        return view('Front.product-detail', compact('data', 'attr', 'related_products', 'like', 'rating'));
    }

    public function product_grid($slug = NULL, $sub_cat = NULL)
    {
        $category = '';
        if ($slug != null) {
            $category = Category::where('slug', $slug)->first();
        }
        $sub_category = [];

        if ($sub_cat != null) {
            $sub_category = SubCategory::where('slug', $sub_cat)->first();
        }

        $cities = City::all();
        // dd($sub_category);
        if ($sub_category != null) {
            $data = Product::where('sub_category_id', $sub_category->id)->where('in_stock', 1)->paginate(9);
        } else {
            $data = Product::where('category_id', $category->id)->where('in_stock', 1)->paginate(9);
        }

        $brandId = [];
        $categoryId = [];

        foreach ($data as $product) {
            array_push($categoryId, $product->category_id);
        }
        $categories = Category::whereHas('products', function ($q) use ($categoryId) {
            $q->whereIn('category_id', $categoryId);
        })->get();

        foreach ($data as $product) {
            array_push($brandId, $product->brand_id);
        }
        $brands = Brand::whereHas('products', function ($q) use ($brandId) {
            $q->whereIn('brand_id', $brandId);
        })->get();


        return view('Front.product-grid', compact('data', 'category', 'sub_category', 'brands', 'cities', 'categories'));
    }

    public function userprofile()
    {
        $customer = CustomerAddress::where('customer_id', '=', Session::get('customer')['id'])->get();
        $provinces = Province::all();
        $cities = City::all();


        return view('Front.userprofile', compact('customer', 'provinces', 'cities'));
    }

    public function mycart()
    {
        return view('Front.mycart');
    }
    public function myorder()
    {
        $customer = Session::get('customer');

        $order = Order::where('customer_id', $customer->id)->get();
        return view('Front.myorder', compact('order'));
    }
    public function checkout()
    {
        $cart = getCart(sessionID());
        // dd($cart);
        $province = Province::all();
        $cities = City::all();

        //update session on page load
        $customer = Session::get('customer');
        if ($customer != null) {
            $customer = Customer::where('id', $customer->id)->first();
            Session::put('customer', $customer);
        }

        if ($cart != null) {
            return view('Front.checkout', compact('province', 'cities'));
        } else {
            return redirect()->route('front.index');
        }
    }


    public function shop()
    {
        $brands = Brand::all();
        $cities = City::all();
        $category = '';
        $sub_category = [];
        $categories = Category::all();
        $data = Product::paginate(9);

        return view('Front.product-grid', compact('data', 'category', 'sub_category', 'brands', 'cities', 'categories'));
    }

    public function applyCoupen(Request $request)
    {
        $coupen = Coupen::where('coupen_code', '=', $request->coupen_code)
            ->first();

        if (!empty($coupen)) {
            $dis = ($coupen->discount / 100) * $request->total;
            $result  = $request->total - $dis;
            return response()->json([
                'status' => true,
                'data' => $result,
                'data2' => $dis
            ]);
        } else {
            return response()->json([
                'status' => false,
                'msg' => 'Invalid Coupen Code'
            ]);
        }
    }

    public function getCompaignProducts($id)
    {
        $data = CompaignProduct::where('compaign_id', '=', $id)
            ->where('product_status', '=', 'Approve')
            ->get();

        // return $data;

        $brands = Brand::all();
        $cities = City::all();


        return view('Front.compaign', compact('data', 'brands', 'cities'));
    }


    public function getCities($id)
    {
        $city = City::where('province_id', '=', $id)->get();

        return response()->json([
            'status' => true,
            'data' => $city
        ], 200);
    }

    //Filter product grid
    public function filterGrid(Request $request)
    {
        $slug = NULL;
        $sub_cat = NULL;
        $category = '';
        $categories = Category::all();

        $sub_category = [];


        $cities = City::all();
        // dd($slug);
        $min_price = $request->min_price;
        $max_price = $request->max_price;

        $orderBy = 'Asc';
        $data = Product::paginate(9);

        if ($request->sort_by == 1) {
            $orderBy = 'ASC';
        } else if ($request->sort_by == 2) {
            $orderBy = 'DESC';
        }

        $rating = $request->rating;

        if ($request->category) { //if category is in request
            if ($request->brands) { //if brand is in request
                if ($request->min_price != null && $request->max_price != null) { //if min_price and max_price is in request
                    if ($request->rating) { //if rating is in request
                        $rating = $request->rating;
                        $brand = $request->brands;
                        if ($request->sort_by == 3) {
                            $data = Product::whereIn('category_id', $request->category)
                                ->whereHas('brand', function ($q) use ($brand) {
                                    $q->whereIn('id', $brand);
                                })
                                ->whereBetween('price', [$request->min_price, $request->max_price])
                                ->orWhereHas('varients', function ($q) use ($min_price, $max_price) {
                                    $q->whereBetween('price', [$min_price, $max_price]);
                                })
                                ->whereHas('reviews', function ($q) use ($rating) {
                                    $q->where('rating', $rating);
                                })
                                ->orderBy('created_at', 'asc')
                                ->paginate(9);
                        } else {
                            $data = Product::whereIn('category_id', $request->category)
                                ->whereHas('brand', function ($q) use ($brand) {
                                    $q->whereIn('id', $brand);
                                })
                                ->whereBetween('price', [$request->min_price, $request->max_price])
                                ->orWhereHas('varients', function ($q) use ($min_price, $max_price) {
                                    $q->whereBetween('price', [$min_price, $max_price]);
                                })
                                ->whereHas('reviews', function ($q) use ($rating) {
                                    $q->where('rating', $rating);
                                })
                                ->orderBy('price', $orderBy)
                                ->paginate(9);
                        }
                    } else {
                        $brand = $request->brands;
                        if ($request->sort_by == 3) {

                            $data = Product::whereIn('category_id', $request->category)
                                ->whereHas('brand', function ($q) use ($brand) {
                                    $q->whereIn('id', $brand);
                                })
                                ->whereBetween('price', [$request->min_price, $request->max_price])
                                ->orWhereHas('varients', function ($q) use ($min_price, $max_price) {
                                    $q->whereBetween('price', [$min_price, $max_price]);
                                })
                                ->orderBy('created_at', 'asc')
                                ->paginate(9);
                        } else {
                            $data = Product::whereIn('category_id', $request->category)
                                ->whereHas('brand', function ($q) use ($brand) {
                                    $q->whereIn('id', $brand);
                                })
                                ->whereBetween('price', [$request->min_price, $request->max_price])
                                ->orWhereHas('varients', function ($q) use ($min_price, $max_price) {
                                    $q->whereBetween('price', [$min_price, $max_price]);
                                })
                                ->orderBy('price', $orderBy)
                                ->paginate(9);
                        }
                    }
                } else { //if brand is not in request
                    if ($request->rating) { //if rating is in request
                        $brand = $request->brands;
                        if ($request->sort_by == 3) {
                            $data = Product::whereIn('category_id', $request->category)
                                ->whereHas('brand', function ($q) use ($brand) {
                                    $q->whereIn('id', $brand);
                                })
                                ->whereHas('reviews', function ($q) use ($rating) {
                                    $q->where('rating', $rating);
                                })
                                ->orderBy('created_at', 'asc')
                                ->paginate(9);
                        } else {
                            $data = Product::whereIn('category_id', $request->category)
                                ->whereHas('brand', function ($q) use ($brand) {
                                    $q->whereIn('id', $brand);
                                })
                                ->whereHas('reviews', function ($q) use ($rating) {
                                    $q->where('rating', $rating);
                                })
                                ->orderBy('price', $orderBy)
                                ->paginate(9);
                        }
                    } else { //if rating is not in request
                        $brand = $request->brands;
                        if ($request->sort_by == 3) {
                            $data = Product::whereIn('category_id', $request->category)
                                ->whereHas('brand', function ($q) use ($brand) {
                                    $q->whereIn('id', $brand);
                                })
                                ->orderBy('created_at', 'asc')
                                ->paginate(9);
                        } else {
                            $data = Product::whereIn('category_id', $request->category)
                                ->whereHas('brand', function ($q) use ($brand) {
                                    $q->whereIn('id', $brand);
                                })
                                ->orderBy('price', $orderBy)
                                ->paginate(9);
                        }
                    }
                }
            } else { //if category is in request
                if ($request->rating) {
                    if ($request->min_price != null && $request->max_price != null) { //if min_price and max_price is in request
                        if ($request->sort_by == 3) {
                            $data = Product::whereIn('category_id', $request->category)
                                ->whereBetween('price', [$request->min_price, $request->max_price])
                                ->orWhereHas('varients', function ($q) use ($min_price, $max_price) {
                                    $q->whereBetween('price', [$min_price, $max_price]);
                                })
                                ->whereHas('reviews', function ($q) use ($rating) {
                                    $q->where('rating', $rating);
                                })
                                ->orderBy('created_at', 'asc')
                                ->paginate(9);
                        } else {
                            $data = Product::whereIn('category_id', $request->category)
                                ->whereBetween('price', [$request->min_price, $request->max_price])
                                ->orWhereHas('varients', function ($q) use ($min_price, $max_price) {
                                    $q->whereBetween('price', [$min_price, $max_price]);
                                })
                                ->whereHas('reviews', function ($q) use ($rating) {
                                    $q->where('rating', $rating);
                                })
                                ->orderBy('price', $orderBy)
                                ->paginate(9);
                        }
                    } else {
                        if ($request->sort_by == 3) {
                            $data = Product::whereIn('category_id', $request->category)
                                ->orderBy('created_at', 'asc')
                                ->whereHas('reviews', function ($q) use ($rating) {
                                    $q->where('rating', $rating);
                                })
                                ->paginate(9);
                        } else {

                            $data = Product::whereIn('category_id', $request->category)
                                ->orderBy('price', $orderBy)
                                ->whereHas('reviews', function ($q) use ($rating) {
                                    $q->where('rating', $rating);
                                })
                                ->paginate(9);
                            // dd($data);
                        }
                    }
                } else {
                    if ($request->min_price != null && $request->max_price != null) { //if min_price and max_price is in request
                        if ($request->sort_by == 3) {
                            $data = Product::whereIn('category_id', $request->category)
                                ->whereBetween('price', [$request->min_price, $request->max_price])
                                ->orWhereHas('varients', function ($q) use ($min_price, $max_price) {
                                    $q->whereBetween('price', [$min_price, $max_price]);
                                })
                                ->orderBy('created_at', 'asc')
                                ->paginate(9);
                        } else {
                            // dd('asddas');

                            $data = Product::whereIn('category_id', $request->category)
                                ->whereBetween('price', [$request->min_price, $request->max_price])
                                ->orWhereHas('varients', function ($q) use ($min_price, $max_price) {
                                    $q->whereBetween('price', [$min_price, $max_price]);
                                })
                                ->orderBy('price', $orderBy)
                                ->paginate(9);
                        }
                    } else {
                        if ($request->sort_by == 3) {
                            $data = Product::whereIn('category_id', $request->category)
                                ->orderBy('created_at', 'asc')
                                ->paginate(9);
                        } else {

                            $data = Product::whereIn('category_id', $request->category)
                                ->orderBy('price', $orderBy)
                                ->paginate(9);
                        }
                    }
                }
            }
        } else { //if category is not in request
            if ($request->brands) { //brand is in request
                if ($request->min_price != null && $request->max_price != null) { //if min_price and max_price is in request
                    if ($request->rating) { //if rating is in request
                        $rating = $request->rating;
                        $brand = $request->brands;
                        if ($request->sort_by == 3) {
                            $data = Product::whereIn('category_id', $request->category)
                                ->whereHas('brand', function ($q) use ($brand) {
                                    $q->whereIn('id', $brand);
                                })
                                ->whereBetween('price', [$request->min_price, $request->max_price])
                                ->orWhereHas('varients', function ($q) use ($min_price, $max_price) {
                                    $q->whereBetween('price', [$min_price, $max_price]);
                                })
                                ->whereHas('reviews', function ($q) use ($rating) {
                                    $q->where('rating', $rating);
                                })
                                ->orderBy('created_at', 'asc')
                                ->paginate(9);
                        } else {
                            $data = Product::whereIn('category_id', $request->category)
                                ->whereHas('brand', function ($q) use ($brand) {
                                    $q->whereIn('id', $brand);
                                })
                                ->whereBetween('price', [$request->min_price, $request->max_price])
                                ->orWhereHas('varients', function ($q) use ($min_price, $max_price) {
                                    $q->whereBetween('price', [$min_price, $max_price]);
                                })
                                ->whereHas('reviews', function ($q) use ($rating) {
                                    $q->where('rating', $rating);
                                })
                                ->orderBy('price', $orderBy)
                                ->paginate(9);
                        }
                    } else { //if rating is not in request
                        $brand = $request->brands;
                        if ($request->orderBy == 3) {
                            $data = Product::whereHas('brand', function ($q) use ($brand) {
                                $q->whereIn('id', $brand);
                            })
                                ->whereBetween('price', [$request->min_price, $request->max_price])
                                ->orWhereHas('varients', function ($q) use ($min_price, $max_price) {
                                    $q->whereBetween('price', [$min_price, $max_price]);
                                })
                                ->orderBy('created_at', 'asc')
                                ->paginate(9);
                        } else {
                            $data = Product::whereHas('brand', function ($q) use ($brand) {
                                $q->whereIn('id', $brand);
                            })
                                ->whereBetween('price', [$request->min_price, $request->max_price])
                                ->orWhereHas('varients', function ($q) use ($min_price, $max_price) {
                                    $q->whereBetween('price', [$min_price, $max_price]);
                                })
                                ->orderBy('price', $orderBy)
                                ->paginate(9);
                        }
                    }
                } else { //if min_price and max_price is not in request
                    if ($request->rating) { //if rating is in request
                        $rating = $request->rating;
                        $brand = $request->brands;
                        if ($request->orderBy == 3) {
                            $data = Product::whereIn('category_id', $request->category)
                                ->whereHas('brand', function ($q) use ($brand) {
                                    $q->whereIn('id', $brand);
                                })
                                ->whereHas('reviews', function ($q) use ($rating) {
                                    $q->where('rating', $rating);
                                })
                                ->orderBy('created_at', 'asc')
                                ->paginate(9);
                        } else {
                            $data = Product::whereIn('category_id', $request->category)
                                ->whereHas('brand', function ($q) use ($brand) {
                                    $q->whereIn('id', $brand);
                                })
                                ->whereHas('reviews', function ($q) use ($rating) {
                                    $q->where('rating', $rating);
                                })
                                ->orderBy('price', $orderBy)
                                ->paginate(9);
                        }
                    } else { //if only brand is in request
                        $brand = $request->brands;
                        if ($request->orderBy == 3) {
                            $data = Product::whereHas('brand', function ($q) use ($brand) {
                                $q->whereIn('id', $brand);
                            })
                                ->orderBy('created_at', 'asc')
                                ->paginate(9);
                        } else {
                            $data = Product::whereHas('brand', function ($q) use ($brand) {
                                $q->whereIn('id', $brand);
                            })
                                ->orderBy('price', $orderBy)
                                ->paginate(9);
                        }
                    }
                }
            } else {
                if ($request->min_price != null && $request->max_price != null) { //if min_price and max_price is in request
                    if ($request->rating) { //if rating is in request
                        $rating = $request->rating;
                        if ($request->orderBy == 3) {
                            $data = Product::whereBetween('price', [$request->min_price, $request->max_price])
                                ->orWhereHas('varients', function ($q) use ($min_price, $max_price) {
                                    $q->whereBetween('price', [$min_price, $max_price]);
                                })
                                ->whereHas('reviews', function ($q) use ($rating) {
                                    $q->where('rating', $rating);
                                })
                                ->orderBy('created_at', 'asc')
                                ->paginate(9);
                        } else {
                            $data = Product::whereBetween('price', [$request->min_price, $request->max_price])
                                ->orWhereHas('varients', function ($q) use ($min_price, $max_price) {
                                    $q->whereBetween('price', [$min_price, $max_price]);
                                })
                                ->whereHas('reviews', function ($q) use ($rating) {
                                    $q->where('rating', $rating);
                                })
                                ->orderBy('price', $orderBy)
                                ->paginate(9);
                        }
                    } else {

                        if ($request->orderBy == 3) {
                            $data = Product::whereBetween('price', [$request->min_price, $request->max_price])
                                ->orWhereHas('varients', function ($q) use ($min_price, $max_price) {
                                    $q->whereBetween('price', [$min_price, $max_price]);
                                })
                                ->orderBy('created_at', 'asc')
                                ->paginate(9);
                        } else {
                            $data = Product::whereBetween('price', [$request->min_price, $request->max_price])
                                ->orWhereHas('varients', function ($q) use ($min_price, $max_price) {
                                    $q->whereBetween('price', [$min_price, $max_price]);
                                })
                                ->orderBy('price', $orderBy)
                                ->paginate(9);
                        }
                    }
                } else {

                    if ($request->rating) {
                        $rating = $request->rating;
                        if ($request->orderBy == 3) {
                            $data = Product::whereHas('reviews', function ($q) use ($rating) {
                                $q->where('rating', $rating);
                            })->orderBy('created_at', 'Asc')
                                ->paginate(9);
                        } else {
                            $data = Product::whereHas('reviews', function ($q) use ($rating) {
                                $q->where('rating', $rating);
                            })->orderBy('price', $orderBy)
                                ->paginate(9);
                        }
                    } else {
                        if ($request->sort_by == 1) {
                            $data = Product::orderBy('price', $orderBy)
                                ->paginate(9);
                        } else if ($request->sort_by == 2) {
                            $data = Product::orderBy('price', $orderBy)
                                ->paginate(9);
                        } else if ($request->sort_by == 3) {
                            $data = Product::orderBy('created_at', 'Asc')
                                ->paginate(9);
                        } else {
                            $data = Product::orderBy('price', $orderBy)
                                ->paginate(9);
                        }
                    }
                }
            }
        }
        $brandId = [];
        $categoryId = [];

        foreach ($data as $product) {
            array_push($categoryId, $product->category_id);
        }
        $categories = Category::whereHas('products', function ($q) use ($categoryId) {
            $q->whereIn('category_id', $categoryId);
        })->get();

        foreach ($data as $product) {
            array_push($brandId, $product->brand_id);
        }
        $brands = Brand::whereHas('products', function ($q) use ($brandId) {
            $q->whereIn('brand_id', $brandId);
        })->get();


        return view('Front.product-grid', compact('data', 'category', 'sub_category', 'brands', 'cities', 'categories'));
    }

    public function mainCategories()
    {
        $categories = Category::all();

        return view('Front.categories', compact('categories'));
    }
}
