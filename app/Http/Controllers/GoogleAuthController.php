<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerOtp;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

use App\Mail\CustomerOtp as MailCustomerOtp;

class GoogleAuthController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->user();
        // dd($user->getName());

        $check = Customer::where('provider_id', $user->getId())->first();

        if ($check) {

            Session::put('customer', $check);

            toast("Logged in successfully!", "success");

            return redirect()->route('front.index');
        }


        if ($user) {

            $customer = Customer::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'provider_name' => 'Google',
                'provider_id' => $user->getId()
            ]);

            Session::put('customer', $customer);
            // dd(Session::get('customer')['id']);

            $otp = rand(0, 99999);

            $customer = new CustomerOtp();
            $customer->email = $user->getEmail();
            $customer->otp = $otp;
            $customer->save();

            $data = [
                'title' => 'Your Otp is:',
                'msg' => $otp
            ];

            Mail::to($user->getEmail())->send(new MailCustomerOtp($data));
        }

        toast("Your account is created", "success");


        return redirect()->route('front.index');
        // dd($user);
    }

    public function redirectToProviderFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallbackFacebook()
    {
        $user = Socialite::driver('facebook')->user();
        dd($user);

        $check = Customer::where('provider_id', $user->getId())->first();

        if ($check) {

            Session::put('customer', $check);

            toast("Logged in successfully!", "success");

            return redirect()->route('front.index');
        }


        if ($user) {

            $customer = Customer::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'provider_name' => 'Facebook',
                'provider_id' => $user->getId()
            ]);

            Session::put('customer', $customer);
            // dd(Session::get('customer')['id']);

            $otp = rand(0, 99999);

            $customer = new CustomerOtp();
            $customer->email = $user->getEmail();
            $customer->otp = $otp;
            $customer->save();

            $data = [
                'title' => 'Your Otp is:',
                'msg' => $otp
            ];

            Mail::to($user->getEmail())->send(new MailCustomerOtp($data));
        }

        toast("Your account is created", "success");


        return redirect()->route('front.index');
        // dd($user);
    }


}
