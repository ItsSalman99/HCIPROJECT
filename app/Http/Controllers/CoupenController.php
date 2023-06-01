<?php

namespace App\Http\Controllers;

use App\Models\Coupen;
use Illuminate\Http\Request;
use Alert;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\CustomerCoupen;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class CoupenController extends Controller
{
    public function index()
    {
        $coupen = Coupen::latest()->get();
        return view('Admin.manage-coupen', compact('coupen'));
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $coupen = new Coupen;
        $coupen->coupen_name = $request->coupen_name;
        $coupen->coupen_code = $request->coupen_code;
        if ($request->discount_percentage != null) {
            $coupen->discount_percentage = $request->discount_percentage;
        } else if ($request->discount_amount != null) {
            $coupen->discount = $request->discount_amount;
        }
        $coupen->category_id = $request->category;
        $coupen->total_users = $request->total_users;
        $coupen->total_uses = $request->total_use;

        if ($request->expiry) {
            $coupen->expiry = Carbon::create($request->expiry);
        }

        $coupen->status = $request->status;
        $coupen->save();
        return redirect()->back();
    }

    public function edit($id)
    {
        $categories = Category::all();
        $coupon = Coupen::where('id', $id)->first();
        // dd($coupon);
        return view('Admin.edit-coupen', compact('coupon', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());

        $coupon = Coupen::where('id', $id)->first();

        $coupon->coupen_name = $request->coupen_name;
        $coupon->coupen_code = $request->coupen_code;
        if ($request->discount_percentage != null) {
            $coupon->discount_percentage = $request->discount_percentage;
        } else if ($request->discount_amount != null) {
            $coupon->discount = $request->discount_amount;
        }
        $coupon->category_id = $request->category;
        $coupon->total_uses = $request->total_use;
        if ($request->expiry != null || $request->expiry != 0) {
            $coupon->expiry = $request->expiry;
        } else {
            $coupon->expiry = NULL;
        }
        $coupon->status = $request->status;
        $coupon->save();

        toast('Coupen updated successfully!', 'success');

        return redirect()->route('admin.coupen.index');
    }

    public function changeStatus($id)
    {

        $coupen = Coupen::where('id', $id)->first();

        if ($coupen->status == 'active') {
            $coupen->status = 'deactive';
        } else {
            $coupen->status = 'active';
        }

        $coupen->save();

        toast("Status has been changed", "success");

        return redirect()->back();
    }

    public function apply(Request $request)
    {

        if (Session::get('is_coupen') != 0) {

            Session::put('is_coupen', 0);
            Session::put('coupenCode', '');
            Session::put('coupen_id', '');
            Session::put('coupenDiscount', '');

            return response()->json([
                'status' => true,
                'msg' => 'Coupon Removed Successfully!'
            ]);
        }

        $coupen = Coupen::where('coupen_code', $request->code)->first();

        if (!$coupen) {
            return response()->json([
                'status' => false,
                'msg' => 'Invalid Coupon!'
            ]);
        }

        if ($coupen->status == 'deactive') {
            return response()->json([
                'status' => false,
                'msg' => 'Coupon Expired!'
            ]);
        }
        if ($coupen->total_users == $coupen->coupen_users_used) {
            return response()->json([
                'status' => false,
                'msg' => 'Coupon Expired!'
            ]);
        }
        if ($coupen->expiry != null) {

            if (Carbon::create($coupen->expiry) <= Carbon::now()) {
                return response()->json([
                    'status' => false,
                    'msg' => 'Coupon Expired!'
                ]);
            }
        }

        $cart = Cart::where('uuid', SessionID())->first();

        foreach ($cart->cart_items as $key => $item) {

            if ($item->product->category->id == $coupen->category_id) {

                if (Session::get('is_coupen') == 0) {
                    if ($coupen->discount != '' || $coupen->discount != NULL) {

                        $customerCoupen = CustomerCoupen::where('customer_id', $request->customer_id)
                            ->where('coupen_id', $coupen->id)
                            ->first();

                        if ($customerCoupen) {
                            if ($customerCoupen->count == $coupen->total_uses) {
                                return response()->json([
                                    'status' => false,
                                    'msg' => 'You have already used this coupon!!'
                                ]);
                            }
                        }

                        Session::put('is_coupen', 1);
                        Session::put('coupenCode', $coupen->coupen_code);
                        Session::put('coupen_id', $coupen->id);
                        Session::put('coupenDiscount', $coupen->discount);

                        $Tproduct = $item->qty * $item->price;

                        if ($Tproduct >= $coupen->discount) {
                            $discount = $Tproduct - $coupen->discount;
                            Session::put('Discount', $coupen->discount);
                        } else if ($Tproduct < $coupen->discount) {
                            $discount = $Tproduct;
                            Session::put('Discount', $discount);
                        }

                        return response()->json([
                            'status' => true,
                            'msg' => 'Coupon Applied Successfully!'
                        ]);
                    }
                    if ($coupen->discount_percentage != '' || $coupen->discount_percentage != NULL) {

                        $customerCoupen = CustomerCoupen::where('customer_id', $request->customer_id)
                            ->where('coupen_id', $coupen->id)
                            ->first();

                        if ($customerCoupen) {
                            return response()->json([
                                'status' => false,
                                'msg' => 'You have already used this coupon!!'
                            ]);
                        }

                        $Tproduct = $item->qty * $item->price;

                        //% of coupen
                        $percentage = $coupen->discount_percentage / 100;
                        $percentage_of = $percentage * $Tproduct;

                        Session::put('is_coupen', 1);
                        Session::put('coupenCode', $coupen->coupen_code);
                        Session::put('coupen_id', $coupen->id);
                        Session::put('coupenDiscount', $percentage_of);

                        if ($Tproduct >= $percentage_of) {

                            $discount = $Tproduct - $percentage_of;
                            Session::put('Discount', $percentage_of);
                        } else if ($Tproduct < $percentage_of) {

                            $discount = $Tproduct;
                            Session::put('Discount', $discount);
                        }


                        return response()->json([
                            'status' => true,
                            'msg' => ' Coupon Applied Successfully!'
                        ]);
                    }
                } else {
                    return response()->json([
                        'status' => false,
                        'msg' => 'You have used a coupon already!'
                    ]);
                }
            }
        }


        return response()->json([
            'status' => false,
            'msg' => 'Coupon could not applied any of this category!'
        ]);
    }


    public function delete($id)
    {
        $coupen = Coupen::find($id);
        $coupen->delete();

        toast('Coupen deleted successfully!', 'success');

        return redirect()->back();
    }
}
