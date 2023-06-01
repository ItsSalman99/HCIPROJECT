<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Province;
use App\Models\Notification;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Fortify;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Validator;
use Alert;
use App\Mail\RoamerRequestMail;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    //login page
    //admin
    public function adminindex()
    {
        return view('Admin.login');
    }
    //roamer
    public function roamerindex()
    {
        return view('Roamer.login');
    }

    //roamer signup page
    public function roamersignup()
    {
        $province = Province::all();
        $cities = City::all();
        // dd($province);
        return view('Admin.signup', compact('province', 'cities'));
    }

    //register
    public function roamersignupstore(Request $request)
    {
        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'cpassword' => 'required',
            'address' => 'required',
            'province' => 'required',
            'city' => 'required',
            'mobile_model' => 'required',
            'phone' => 'required|not_in:0|min:11|max:11',
            'policy' => 'required',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => false,
                'msg' => $validator->errors()->first()
            ]);
        }

        $province = Province::where('id', $request->province)->first();
        $city = City::where('id', $request->city)->first();

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'province' => $province->province_name,
            'city' => $city->city_name,
            'user_type' => 2,
            'nearby_market' => $request->nearby_market,
            'mobile_model' => $request->mobile_model,
            'phone' => $request->phone,
        ]);

        Notification::create([
            'title' => $user->first_name . ' ' . $user->last_name . ' Roamer has been signed up!',
            'body' => 'New roamer ' . $user->first_name . ' ' . $user->last_name . ' signed up, check roamer requests to approve or disapprove!',
            'user_id' => User::where('user_type', 1)->first()->id
        ]);

        $data = [
            'subject' => 'Your account has been created successfully',
            'message' => 'Hello, Dear ' . $user->getName() . '! Your account has been created successfully!
            Our team will respond to you as soon as possible. You will receive an email notification
            when your account has been approved.'
        ];

        Mail::to($request->email)->send(new RoamerRequestMail($data));

        return response()->json([
            'status' => true,
            'msg' => 'We have received your request to become a roamer. Our Roamer Guide will contact you soon before approval.'
        ]);
    }

    public function getProvinceCity($provinceId)
    {
        $city = City::where('province_id', '=', $provinceId)->get();
        return response()->json([
            'status' => true,
            'data' => $city
        ], 200);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $request->email)->first();
        dd($user);
        if ($user) {
            if ($user->is_active == 0) {
                return back()->withErrors([
                    'error' => 'Your profile pending for approval.',
                ]);
            }
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_active' => 1, 'user_type' => 5, 'web_login' => 1])) {
            $request->session()->regenerate();

            return redirect()->intended('home');
        }

        return back()->withErrors([
            'error' => 'The provided credentials do not match our records.',
        ]);
    }


    public function adminloginstore(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
        $user = User::where('email', $request->email)->first();

        if ($user) {
            if ($user->is_active != 1) {
                return back()->withErrors([
                    'error' => 'Your profile pending for approval!',
                ]);
            }
        } else {
            return back()->withErrors([
                'error' => 'The provided credentials do not match our records.',
            ]);
        }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_active' => 1, 'user_type' => 2])) {
            $request->session()->regenerate();
            return redirect()->intended('admin');
        } else if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_active' => 1, 'user_type' => 1])) {
            $request->session()->regenerate();

            return redirect()->intended('admin');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // public function authenticate(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'email' => ['required', 'email'],
    //         'password' => ['required'],
    //     ]);

    //     if (Auth::attempt(['email' => $request->email, 'password' => $password, 'active' => 1])) {
    //         $request->session()->regenerate();

    //         return redirect()->intended('dashboard');
    //     }

    //     return back()->withErrors([
    //         'email' => 'The provided credentials do not match our records.',
    //     ]);
    // }

   


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
