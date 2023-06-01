<?php

namespace App\Http\Controllers;

use App\Mail\LostPasswordEmail;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Alert;

class ResetPasswordController extends Controller
{
    public function resetPassword(Request $request)
    {
        $customer = Customer::where('email', $request->email)->first();

        if ($customer) {
            # code...
            $otp = rand(0, 99999);

            $data = [
                'name' => $customer->name,
                'email' => $customer->email,
                'otp' => $otp
            ];

            $customer->password_otp = $otp;
            $customer->save();

            Mail::to($request->email)->send(new LostPasswordEmail($data));

            return redirect()->back();
        }
        else{
            toast("Seems like you don't have an account, Please try again!", "error");

            return redirect()->back();
        }


    }
}
