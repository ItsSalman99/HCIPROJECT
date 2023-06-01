<?php

namespace App\Http\Controllers;

use App\Models\AttributeOption;
use App\Models\Compaign;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->user_type == 2) {

            if(checkRoamerVendors(Auth::user()->id) != false || checkRoamerVendors(Auth::user()->id) != true)
            {
                // dd('asdasd');
                if(checkRoamerVendors(Auth::user()->id))
                {
                    return checkRoamerVendors(Auth::user()->id);
                }
            }
        }
        $Tattributes = count(AttributeOption::all());
        if(Auth::user()->user_type == 1)
        {
            $Tproducts = count(Product::all());


            $Inactive_products = count(Product::where('in_stock', 0)->get());
            $active_products = count(Product::where('in_stock', 1)->get());

        }
        else{

            $Tproducts = count(Product::where('user_id', Auth::user()->id)->get());


            $Inactive_products = count(Product::where('user_id', Auth::user()->id)->where('in_stock', 0)->get());
            $active_products = count(Product::where('user_id', Auth::user()->id)->where('in_stock', 1)->get());
        }

        $roamers = User::where('user_type', 2)->get();

        $pending_24 = Order::where('order_status', 'Pending')->where('created_at', '<', Carbon::now()->subDay())->get();

        $pending_48 = Order::where('order_status', 'Pending')->where('created_at', '<', Carbon::now()->subDay(2))->get();

        $pending_72 = Order::where('order_status', 'Pending')->where('created_at', '>', Carbon::now()->subDay(2))->get();


        $accepted_24 = Order::where('order_status', 'Accepted')->where('created_at', '>=', Carbon::now()->subDay())->get();

        $accepted_48 = Order::where('order_status', 'Accepted')->where('created_at', '>=', Carbon::now()->subDay(2))->get();

        $accepted_72 = Order::where('order_status', 'Accepted')->where('created_at', '>=', Carbon::now()->subDay(3))->get();


        $id = Auth::user()->id;
        $compaign = Compaign::latest()->get();

        return view('Admin.index', compact('id','Tproducts', 'Tattributes', 'Inactive_products', 'active_products', 'roamers', 'pending_24', 'pending_48', 'pending_72', 'compaign'));
    }

    public function filter(Request $request)
    {
        // dd($request->all());
        $Tproducts = count(Product::all());
        $Tattributes = count(AttributeOption::all());
        $Inactive_products = count(Product::where('in_stock', 0)->get());
        $active_products = count(Product::where('in_stock', 1)->get());

        $roamers = User::where('user_type', 2)->get();

        $pending_24 = Order::where('order_status', 'Pending')->where('created_at', '>=', Carbon::now()->subDay())->get();

        $pending_48 = Order::where('order_status', 'Pending')->where('created_at', '>=', Carbon::now()->subDay(2))->get();

        $pending_72 = Order::where('order_status', 'Pending')->where('created_at', '>=', Carbon::now()->subDay(3))->get();


        $accepted_24 = Order::where('order_status', 'Accepted')->where('created_at', '>=', Carbon::now()->subDay())->get();

        $accepted_48 = Order::where('order_status', 'Accepted')->where('created_at', '>=', Carbon::now()->subDay(2))->get();

        $accepted_72 = Order::where('order_status', 'Accepted')->where('created_at', '>=', Carbon::now()->subDay(3))->get();

        $id = $request->roamer_id;

        $compaign = Compaign::latest()->get();

        return view('Admin.index', compact('id', 'Tproducts', 'Tattributes', 'Inactive_products', 'active_products', 'roamers', 'pending_24', 'pending_48', 'pending_72', 'compaign'));

    }

    public function roamersupport()
   {
        return view('Admin.roamer-support');
    }


}
