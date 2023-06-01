<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;

class BusinessAdvisorController extends Controller
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
        // $roamers = User::where([['user_type', 2], ['email_verified_at', '!=', NULL]])->get();
        $startDate = NULL;
        $endDate = NULL;
        $vendors = Vendor::all();
        $vendor = NULL;
        $day = NULL;

        return view('Admin.business-advisor', compact('startDate', 'endDate', 'vendors', 'vendor', 'day'));
    }

    public function getProduct($id)
    {
        $product = Product::where('id', $id)
        ->with(['varients', 'user', 'vendor', 'category', 'brand'])
        ->first();

        return response()->json([
            'status' => 200,
            'data' => $product
        ]);

    }

    public function filter(Request $request)
    {

        // dd($request->all());
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        $vendors = Vendor::all();
        $vendor = NULL;
        $day = $request->day;

        return view('Admin.business-advisor', compact('startDate', 'endDate', 'vendors', 'vendor', 'day'));
    }

}
