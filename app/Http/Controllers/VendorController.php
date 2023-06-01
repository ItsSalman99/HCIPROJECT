<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use App\Models\Vendor;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VendorController extends Controller
{
    public function index()
    {
        $roamers = User::where('user_type', 2)->where('is_active', 1)->get();

        $data = [];

        if (Auth::user()->user_type == 1) {
            $data = Vendor::get();
        } else {
            $data = Vendor::where('roamer_id', Auth::user()->id)->get();
        }


        return view('Admin.manage-vendor', compact('data', 'roamers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roamers = User::where('user_type', 2)->where('is_active', 1)->get();

        return view('Admin.addNewVendor', compact('roamers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'shop_name' => 'required',
            'address' => 'required',
            'roamer_id' => 'required|not_in:0',
            'nearby_market' => 'required',
            'contact1' => 'required|not_in:0|min:11|max:11',
            'contact2' => 'required|not_in:0|min:11|max:11',
            'contact3' => 'required|not_in:0|min:11|max:11',
            'contact4' => 'required|not_in:0|min:11|max:11',
            'holiday_mode' => 'nullable',
        ], [
            'roamer_id.required' => 'Please select a roamer',
            'roamer_id.not_in:0' => 'Please select a roamer'
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first()
            ]);
        }


        $vendor = Vendor::create([
            'name' => $request->name,
            'shop_name' => $request->shop_name,
            'address' => $request->address,
            'roamer_id' => $request->roamer_id,
            'nearby_market' => $request->nearby_market,
            // 'profits' => $request->profits,
            'contact1' => $request->contact1,
            'contact2' => $request->contact2,
            'contact3' => $request->contact3,
            'contact4' => $request->contact4,
            'holiday_mode' => (isset($request->holiday_mode)) ? $request->holiday_mode : 0
        ]);

        $admin = User::where('user_type', 1)->first();

        $roamer = User::where('id', $request->roamer_id)->first();

        if (Auth::user()->user_type == 1) {

            Notification::create([
                'title' => 'New Vendor' . $vendor->name . ' Created By Admin',
                'body' => 'New Vendor ' . $vendor->name . ' Created By Admin',
                'user_id' => Auth::user()->id
            ]);

            Notification::create([
                'title' => 'New Vendor Created By Admin',
                'body' => 'New Vendor Created By Admin!',
                'user_id' => $roamer->id
            ]);
        } else {
            Notification::create([
                'title' => 'New Vendor Created',
                'body' => 'New Vendor Created',
                'user_id' => Auth::user()->id
            ]);

            Notification::create([
                'title' => 'New Vendor Created By ' . $roamer->getName(),
                'body' => 'New Vendor Created By ' . $roamer->getName(),
                'user_id' => $admin->getName()
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Vender Added Successfully!!'
        ]);
    }


    //Salman Dev
    public function get_vendor($id)
    {
        $vendor = Vendor::where('id', $id)->first();

        return response()->json([
            'status' => 200,
            'vendor' => $vendor
        ]);
    }

    public function holiday_status($id)
    {
        $vendor = Vendor::where('id', $id)->first();
        if ($vendor->holiday_mode == 1) {
            $vendor->holiday_mode = 0;
        } else {
            $vendor->holiday_mode = 1;
        }

        $vendor->save();


        return response()->json([
            'status' => 200,
            'title' => 'Holiday status has been  changed',
            'text' => 'Holiday status has been changed successfully!'
        ]);
    }

    public function searchVendor($name)
    {

        if ($name != "undefined") {
            # code...
            $vendors = Vendor::where('name', 'like', '%' . $name . '%')->get();

            return response()->json([
                'status' => 200,
                'vendors' => $vendors,
            ]);
        } else if ($name == "undefined") {

            $vendors = Vendor::all();

            return response()->json([
                'status' => 200,
                'vendors' => $vendors,
            ]);
        }
    }

    public function byRoamerWise($roamerId)
    {
        if ($roamerId == 0) {
            return redirect()->route('vendors.index');
        }

        $data = Vendor::where('roamer_id', $roamerId)->get();

        $roamers = User::where('user_type', 2)->where('is_active', 1)->get();



        return view('Admin.manage-vendor', compact('data', 'roamers', 'roamerId'));
    }

    public function storeVendor(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'vendor_name' => 'required',
            'shop_name' => 'required',
            'address' => 'required',
            'roamer_id' => 'required|not_in:0',
            'nearby_market' => 'required',
            'contact1' => 'required|not_in:0|min:11|max:11',
            'contact2' => 'required|not_in:0|min:11|max:11',
            'contact3' => 'required|not_in:0|min:11|max:11',
            'contact4' => 'required|not_in:0|min:11|max:11',
            'holiday_mode' => 'nullable',
        ], [
            'roamer_id.required' => 'Please select a roamer',
            'roamer_id.not_in:0' => 'Please select a roamer'
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first()
            ]);
        }

        $vendor = Vendor::create([
            'name' => $request->vendor_name,
            'roamer_id' => $request->roamer_id,
            'shop_name' => $request->shop_name,
            'nearby_market' => $request->nearby_market,
            'contact1' => $request->contact1,
            'contact2' => $request->contact2,
            'contact3' => $request->contact3,
            'contact4' => $request->contact4,
            'address' => $request->address,
            'profits' => $request->profits,
            'holiday_mode' => (isset($request->holiday_mode)) ? $request->holiday_mode : 0
        ]);

        return response()->json([
            'status' => true,
            'msg' => 'Vendor has been created!'
        ]);
    }

    public function getAll()
    {
        $vendors = [];

        if (Auth::user()->user_type == 1) {

            $vendors = Vendor::all();
        } else {
            $vendors = Vendor::where('roamer_id', Auth::user()->id)->get();
        }

        return response()->json([
            'status' => true,
            'data' => $vendors
        ]);
    }

    public function getVendorByRoamer($id)
    {
        $vendors = Vendor::where('roamer_id', $id)->get();


        return response()->json([
            'status' => true,
            'data' => $vendors
        ]);
    }
}
