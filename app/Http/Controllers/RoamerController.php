<?php

namespace App\Http\Controllers;

use App\Mail\RoamerSupport;
use App\Models\Product;
use App\Models\Rating;
use App\Models\User;
use App\Models\Notification;
use App\Models\Vendor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Alert;
use App\Mail\RoamerRequestMail;
use Illuminate\Support\Facades\Mail;

class RoamerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roamers = User::where([['user_type', 2], ['email_verified_at', '!=', NULL]])->get();
        // dd($roamers);

        return view('Admin.manage-roamer', compact('roamers'));
    }
    public function roamer_request()
    {
        $roamers = User::where('user_type', 2)->where('email_verified_at', '=', NULL)->get();
        // dd($roamers);
        return view('Admin.roamer-reqeust', compact('roamers'));
    }

    //ajax
    public function getRoamerRequest($id)
    {

        $roamer = User::where('id', $id)->first();

        return response()->json([
            'status' => 200,
            'data' => $roamer
        ]);
    }

    public function active_change($id)
    {
        $user = User::find($id);
        $user->is_active = !$user->is_active;
        $user->save();
        echo json_encode(['success' => true, 'msg' => 'Status has been updated']);
    }
    public function approve_change($id)
    {
        $user = User::find($id);
        $user->email_verified_at = Carbon::now();
        $user->is_active = 1;
        $user->save();

        Notification::create([
            'title' => $user->first_name . ' ' . $user->last_name . ' has been approved by admin!',
            'body' => 'Congrats! ' . $user->first_name . ' ' . $user->first_name . ' has been approved by admin!',
            'user_id' => $id
        ]);

        $data = [
            'subject' => 'Your account has been approved',
            'message' => 'Hello, Dear ' . $user->getName() . '! Your account has been approved successfully!
            You can now log in to your bazar account and start selling online.'
        ];

        Mail::to($user->email)->send(new RoamerRequestMail($data));

        echo json_encode(['success' => true, 'msg' => 'Roamer has been Approved']);
    }
    public function reject_change($id)
    {
        $user = User::find($id);
        $user->delete();

        Alert::success("Roamer Deleted!", "Roamer has been deleted!");

        $data = [
            'subject' => 'Your account have been rejected',
            'message' => 'Hello, Dear ' . $user->getName() . '! We are sorry to inform you that your account has been suspended and you will not be
            able to use your account. Please contact us at ' . User::where('user_type', 1)->first()->email

        ];

        Mail::to($user->email)->send(new RoamerRequestMail($data));


        return redirect()->back();
    }

    //Salman Dev
    public function roamer_products($id)
    {

        $product = Product::where('vendor_id', $id)->get();
        // dd($product);

        return view('Admin.manage-product', compact('product'));
    }

    //Get Roamer Ajax
    public function get_roamer(Request $request)
    {
        $roamer = User::where('id', $request->id)->first();



        return response()->json([
            'status' => 200,
            'roamer' => $roamer,
            'productscount' => count($roamer->product)
        ]);
    }

    public function searchRoamer($name)
    {
        $body = '';

        if ($name != "undefined") {
            # code...
            $roamers = User::where('user_type', 2)->where('is_active', '=', 1)
                ->where('first_name', '=', $name)
                ->with('product')->get();

            if ($roamers == null || $roamers == "") {

                $roamers = User::where('user_type', 2)->where('is_active', '=', 1)
                    ->where('last_name', '=', $name)->with('product')->get();

                if ($roamers == null || $roamers == "") {
                    $roamers = User::where('user_type', 2)->where('is_active', '=', 1)
                        ->where('province', '=', $name)->with('product')->get();

                    if ($roamers == null || $roamers == "") {
                        $roamers = User::where('user_type', 2)->where('is_active', '=', 1)
                            ->where('city', '=', $name)->with('product')->get();

                        if ($roamers == null || $roamers == "") {
                            $roamers = User::where('user_type', 2)->where('is_active', '=', 1)
                                ->where('phone', '=', $name)->with('product')->get();
                        }
                    }
                }
            }

            foreach ($roamers as $key => $value) {
                if ($value->is_active == 1) {
                    $tD = '<td><div class="active-status"><p>Active</p></div></td><td><label class="cswitch"><input onchange="changeStatus(' . $value->id . ')" class="cswitch--input"' .
                        'type="checkbox" checked /><span class="cswitch--trigger wrapper"></span></label></td>';
                } else {
                    $tD = '<td><div class="inactive-status"><p>In-Active</p></div></td><td><label class="cswitch"><input onchange="changeStatus(' . $value->id . ')" class="cswitch--input"' .
                        'type="checkbox" /><span class="cswitch--trigger wrapper"></span></label></td>';
                }

                $profit = calculateOrderSumAmount($value->id) - calculateTransactionExpenseCount($value->id);

                $body = $body . '<tr><td class=" opacity-07">#' . $value->id . '</td>' . '<td style="color: #0068E2" class=" opacity-07">' . $value->first_name . ' ' . $value->last_name . '</td>' .
                    '<td><p class=" opacity-04">' . number_format($profit) . '</p></td><td><p class=" opacity-04">' . $value->phone . '</p></td>' .
                    '<td><p class=" opacity-04">' . $value->city . '<td><p class=" opacity-04">' . $value->province .
                    '</p></td><td style="color: #0068E2" class=" opacity-07">' . count($value->product) . '</td>' . $tD .
                    '<td><div class="d-flex align-items-center justify-content-end"><div class="cover-table-btn"><ul><li class="dropdown position-relative"><a href="javascript:void(0)" class="dropdown-toggle caret-none"data-bs-toggle="dropdown" role="button" id="navbarDropdown"><i class="material-icons">more_vert</i></a>' .
                    '<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown"><li><a class="dropdown-item" onclick="getRoamer(' . $value->id . ')"' .
                    'data-bs-toggle="modal" data-bs-target="#roamerFilledModal">Detail </a></li></ul></li></ul></div></div></td></tr>';
            }



            return response()->json([
                'status' => 200,
                'roamers' => $roamers,
                'body' => $body
            ]);
        } else if ($name == "undefined") {

            $roamers = User::where([['user_type', 2], ['email_verified_at', '!=', NULL]])->with('product')->get();

            foreach ($roamers as $key => $value) {
                if ($value->is_active == 1) {
                    $tD = '<td><div class="active-status"><p>Active</p></div></td><td><label class="cswitch"><input onchange="changeStatus(' . $value->id . ')" class="cswitch--input"' .
                        'type="checkbox" checked /><span class="cswitch--trigger wrapper"></span></label></td>';
                } else {
                    $tD = '<td><div class="inactive-status"><p>In-Active</p></div></td><td><label class="cswitch"><input onchange="changeStatus(' . $value->id . ')" class="cswitch--input"' .
                        'type="checkbox" /><span class="cswitch--trigger wrapper"></span></label></td>';
                }
                $profit = calculateOrderSumAmount($value->id) - calculateTransactionExpenseCount($value->id);
                $body = $body . '<tr><td class=" opacity-07">#' . $value->id . '</td>' . '<td style="color: #0068E2" class=" opacity-07">' . $value->first_name . ' ' . $value->last_name . '</td>' .
                    '<td><p class=" opacity-04">' . number_format($profit) . '</p></td><td><p class=" opacity-04">' . $value->phone . '</p></td>' .
                    '<td><p class=" opacity-04">' . $value->city . '<td><p class=" opacity-04">' . $value->province .
                    '</p></td><td style="color: #0068E2" class=" opacity-07">' . count($value->product) . '</td>' . $tD .
                    '<td><div class="d-flex align-items-center justify-content-end"><div class="cover-table-btn"><ul><li class="dropdown position-relative"><a href="javascript:void(0)" class="dropdown-toggle caret-none"data-bs-toggle="dropdown" role="button" id="navbarDropdown"><i class="material-icons">more_vert</i></a>' .
                    '<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown"><li><a class="dropdown-item" onclick="getRoamer(' . $value->id . ')"
                data-bs-toggle="modal" data-bs-target="#roamerFilledModal">Detail </a></li></ul></li></ul></div></div></td></tr>';
            }

            return response()->json([
                'status' => 200,
                'roamers' => $roamers,
                'body' => $body
            ]);
        }
    }

    public function searchRoamerRequests($name)
    {

        if ($name != "undefined") {
            # code...
            $roamers = User::where('is_active', 0)->where('first_name', 'like', '%' . $name . '%')->orWhere('last_name', 'like', '%' . $name . '%')->where('user_type', 2)->get();

            return response()->json([
                'status' => 200,
                'roamers' => $roamers,
            ]);
        } else if ($name == "undefined") {

            $roamers = User::where('is_active', 0)->where('user_type', 2)->get();


            return response()->json([
                'status' => 200,
                'roamers' => $roamers,
            ]);
        }
    }

    public function roamerSupport(Request $request)
    {
        // dd($request->all());

        $data = [
            'email' => $request->email,
            'whatsapp' => $request->whatsapp,
            'phone' => $request->number,
            'msg' => $request->msg
        ];

        Mail::to($request->email)->send(new RoamerSupport($data));

        Alert::success('Your Request Send!', 'Your request has been send!!');

        return redirect()->back();
    }

    public function getAll()
    {

        $roamers = User::where('user_type', 2)->get();

        return response()->json([
            'status' => true,
            'data' => $roamers
        ]);
    }
}
