<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;
use App\Models\Province;
use Illuminate\Support\Facades\Hash;

class AccountSettingController extends Controller
{
    public function index()
    {

        $provinces = Province::all();

        return view('Admin.account-setting', compact('provinces'));
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $user = User::where('id', Auth::user()->id)->first();

        if(isset($request->email))
        {
            if ($user->email != $request->email) {

                $user->email = $request->email;
            }
        }

        if ($request->hasFile('profile_img')) {
            $filename = request()->getSchemeAndHttpHost() . '/assets/admin/images/user/' . time() . '.' . $request->profile_img->extension();
            $request->profile_img->move(public_path('/assets/admin/images/user/'), $filename);

            $user->profile_img = $filename;
        }

        $user->phone = $request->phone ?? $user->phone;
        $user->whatsapp_phone = $request->whatsapp_phone ?? $user->whatsapp_phone;
        $user->holiday_start = $request->holiday_start ?? $user->holiday_start;
        $user->holiday_end = $request->holiday_end ?? $user->holiday_end;
        $user->holiday_mode = $request->holiday_mode ?? $user->holiday_mode;

        $user->cnic_name = $request->cnic_name ?? $user->cnic_name;
        $user->cnic_address = $request->cnic_address ?? $user->cnic_address;
        $user->cnic_number = $request->cnic ?? $user->cnic_number;

        if ($request->hasFile('cnic_front_img')) {
            $filename = request()->getSchemeAndHttpHost() . '/assets/admin/images/user/cnic/' . time() . '.' . $request->cnic_front_img->extension();
            $request->cnic_front_img->move(public_path('/assets/admin/images/user/cnic/'), $filename);

            $user->cnic_front_img = $filename;
        }

        if ($request->hasFile('cnic_back_img')) {
            $filename = request()->getSchemeAndHttpHost() . '/assets/admin/images/user/cnic/' . time() . '.' . $request->cnic_back_img->extension();
            $request->cnic_back_img->move(public_path('/assets/admin/images/user/cnic/'), $filename);

            $user->cnic_back_img = $filename;
        }


        $user->account_title = $request->account_title ?? $user->account_title;
        $user->account_number = $request->account_number ?? $user->account_number;
        $user->bank_name = $request->bank_name ?? $user->bank_name;
        $user->branch_code = $request->branch_code ?? $user->branch_code;
        $user->IBAN = $request->IBAN ?? $user->IBAN;

        if ($request->hasFile('cheque_img')) {
            $filename = request()->getSchemeAndHttpHost() . '/assets/admin/images/user/cheque/' . time() . '.' . $request->cheque_img->extension();
            $request->cheque_img->move(public_path('/assets/admin/images/user/cheque/'), $filename);

            $user->cheque_img = $filename;
        }



        $user->save();

        Alert::success("Information Updated!", "Information updated successfully!!");

        return redirect()->back();
    }

    public function checkPassword($email, $password)
    {

        $user = User::where('email', $email)->first();

        if ($user) {
            if (Hash::check($password, $user->password)) {
                return response()->json([
                    'status' => true,
                    'msg' => 'Password matched!'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'msg' => 'Password does not matched!'
                ]);
            }
        }

        return response()->json([
            'status' => false,
            'msg' => 'Something went wrong!'
        ]);

    }

    public function updatePassword(Request $request)
    {
        // dd(Hash::make($request->cpassword));

        $user = User::where('email', $request->email)->first();

        $user->password = Hash::make($request->cpassword);
        $user->save();

        toast('Password Has Been Updated!!', 'success');

        return redirect()->back();
    }
}
