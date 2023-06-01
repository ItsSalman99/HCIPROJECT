<?php

namespace App\Http\Controllers;

use App\Mail\CustomerOtp as MailCustomerOtp;
use App\Models\Customer;
use App\Models\CustomerAddress;
use App\Models\CustomerOtp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Alert;
use App\Models\Notification;
use App\Models\User;

class RegisterController extends Controller
{
    public function userRegisteration(Request $request)
    {
        // return response()->json([
        //     'status' => false,
        //     'message' => $request->all()
        // ]);

        $validator = Validator::make($request->all(), [
            'fullname' => 'required',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'required',
            'password' => 'required',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first()
            ]);
        }

        $user = new Customer;
        $user->name = $request->fullname;
        $user->phone = $request->phone;
        $user->is_active = 0;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $otp = rand(0, 99999);

        $customer = new CustomerOtp;
        $customer->email = $request->email;
        $customer->otp = $otp;
        $customer->save();

        $data = [
            'title' => 'Hello Dear ' . $customer->name . '! Your account has been created successfully!'.
            'Your Otp is: ',
            'msg' => $otp
        ];

        Mail::to($request->email)->send(new MailCustomerOtp($data));

        Notification::create([
            'title' => $user->name . ' customer has been signed up!',
            'body' => 'New customer ' . $user->name . ' signed up!',
            'user_id' => User::where('user_type', 1)->first()->id
        ]);

        return response()->json([
            'status' => true,
            'data' => $request->email,
        ], 200);
    }

    public function userOtp(Request $request)
    {
        $customerotp =  CustomerOtp::where('email', '=', $request->email)
            ->where('otp', '=', $request->otp)
            ->first();

        if (!empty($customerotp)) {
            $user = Customer::where('email', '=', $request->email)->update([
                'is_active' => 1
            ]);

            $delotp = CustomerOtp::where('email', '=', $request->email)->delete();

            $data = Customer::where('email', '=', $request->email)->first();
            Session::put('customer', $data);
            return response()->json([
                'status' => true,
                'msg' => 'Otp confirmed successfully!'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'msg' => 'Wrong otp'
            ]);
        }
    }

    public function userLogin(Request $request)
    {
        $user = Customer::where('email', '=', $request->email)->where('is_active', '=', 1)->first();
        if (empty($user)) {
            return response()->json([
                'status' => false,
                'active' => false,
                'msg' => 'Account does not exists!'
            ]);
        } elseif (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => false,
                'active' => true,
                'msg' => 'Incorrect email or password'
            ]);
        } else {
            $data = Customer::where('email', '=', $request->email)->first();
            Session::put('customer', $data);
            return response()->json([
                'status' => true,
                'active' => true,
                'msg' => 'Login successfully!'
            ]);
        }
    }

    public function userLogout()
    {
        Session::forget('customer');
        return redirect()->back();
    }

    public function profileUpdate(Request $request)
    {
        $user =  Customer::find($request->user_id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->save();

        Session::forget('customer');
        $data = Customer::where('email', '=', $request->email)->first();
        Session::put('customer', $data);

        return response()->json([
            'status' => true,
            'msg' => 'Profile updated successfully!'
        ]);
    }

    public function addAddress(Request $request)
    {
        // dd($request->all());
        $user =  Customer::find($request->user_id);

        $user->province = $request->province;
        $user->city = $request->city;

        $user->save();

        if($request->address !== null){
            $address =  new CustomerAddress;
            $address->customer_id = $request->user_id;
            $address->address = $request->address;
            $address->zip = $request->zip;
            $address->save();
        }

        return response()->json([
            'status' => true,
            'msg' => 'Address Added successfully!'
        ]);
    }

    public function activeAddress($address_id)
    {
        $address = CustomerAddress::where('id', '=', $address_id)->update([
            'active' => 1
        ]);

        $deactive = CustomerAddress::whereNotIn('id', array($address_id))->update([
            'active' => 0
        ]);
        return response()->json([
            'status' => true,
            'msg' => 'Address activated successfully!'
        ]);
    }
}
