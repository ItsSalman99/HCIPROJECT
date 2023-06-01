<?php

namespace App\Http\Controllers;

use App\Models\ApplicationSlider;
use App\Models\Category;
use App\Models\CompaignProduct;
use App\Models\Faq;
use App\Models\Product;
use App\Models\Vendor;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        Cache::flush();
    }

    public function index()
    {
        // $cart = session()->get('cart');
        // dd(session()->get('cart'));

        $vendorIds = [];
        $roamerIds = [];
        
        $vendor = Vendor::where('holiday_mode', 0)->get();
        $roamers = User::where('user_type', 2)
            ->where('is_active', 1)->get();

        // dd($vendor);
        foreach ($vendor as $vendors) {
            array_push($vendorIds, $vendors->id);
        }

        foreach ($roamers as $roamer) {
            array_push($roamerIds, $roamer->id);
        }


        $flash = Product::where('flash_sale', '=', 1)
            ->whereIn('vendor_id', $vendorIds)
            ->whereIn('user_id', $roamerIds)
            ->where('in_stock', 1)->get();

        $seller = Product::where('top_seller', '=', 1)
            ->whereIn('vendor_id', $vendorIds)
            ->whereIn('user_id', $roamerIds)
            ->where('in_stock', 1)->get();


        $arrival = Product::where('new_arrivals', '=', 1)
            ->whereIn('vendor_id', $vendorIds)
            ->whereIn('user_id', $roamerIds)
            ->where('in_stock', 1)->get();

        $sub_cat = SubCategory::where('bottom', 1)->get();
        // $categories = Category::all();
        // dd($flash);
        $slider = ApplicationSlider::orderBy('seq_no')->get();

        $campaign = CompaignProduct::where('product_status', '=', 'Approve')->get();


        return view('Front.index', compact('flash', 'seller', 'arrival', 'sub_cat', 'slider', 'campaign'));
    }

    public function privacy()
    {
        return view('Front.pages.privacy');
    }
    public function returnprivacy()
    {
        return view('Front.pages.return-policy');
    }

    public function termsconditions()
    {
        return view('Front.pages.terms');
    }

    public function about()
    {
        return view('Front.pages.about');
    }

    public function faqs()
    {
        $faqs = Faq::all();

        return view('Front.pages.faqs', compact('faqs'));
    }

    public function signupterms()
    {
        return view('Admin.terms-condition');
    }
}
