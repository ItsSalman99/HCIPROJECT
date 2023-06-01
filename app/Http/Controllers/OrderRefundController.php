<?php

namespace App\Http\Controllers;

use App\Models\OrderRefund;
use Illuminate\Http\Request;
use Alert;
use App\Models\OrderItem;
use App\Models\Wallet;
use Illuminate\Support\Facades\Session;

class OrderRefundController extends Controller
{

    public function index()
    {

        $refunds = OrderRefund::all();

        return view('Admin.manage-refunds', compact('refunds'));
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $filename1 = '';
        $filename2 = '';

        if ($request->file('image1')) {
            $filename1 = request()->getSchemeAndHttpHost() . '/assets/images/refunds/' . $request->image1->getClientOriginalName() . '.' . $request->image1->extension();
            $request->image1->move(public_path('/assets/images/refunds/'), $filename1);;
        }
        if ($request->file('image1')) {
            $filename2 = request()->getSchemeAndHttpHost() . '/assets/images/refunds/' . $request->image2->getClientOriginalName() . '.' . $request->image2->extension();
            $request->image2->move(public_path('/assets/images/refunds/'), $filename2);;
        }

        foreach ($request->items as $key => $item) {
            $orderItem = OrderItem::where('id', $item)->first();
            $refund = OrderRefund::where('id', $item)->exists();
            // dd($orderItem);
            if (!$refund) {
                $refund = OrderRefund::create([
                    'order_id' => $orderItem->order_id,
                    'order_item_id' => $item,
                    'customer_id' => Session::get('customer')['id'],
                    'image1' => $filename1,
                    'image2' => $filename2,
                    'amount' => $orderItem->price,
                    'type' => 'refund',
                    'description' => $request->description
                ]);
            }
        }


        toast("Order Refund Successfully Applied", 'success');

        return  redirect()->back();
    }

    public function approve($id, $amount)
    {

        $refund = OrderRefund::where('id', $id)->first();

        if($amount <= $refund->amount) {
            $refund->status = 1;
            $refund->save();

            $item = OrderItem::where('id', $refund->order_item_id)->first();

            Wallet::create([
                'user_id' => $refund->customer_id,
                'product_id' => $item->product_id,
                'total_amount' => $amount,
                'type' => $refund->type,
            ]);

            toast("Order Refund Has Been Successfully Approved!", 'success');

            return  redirect()->back();
        }
        else{

            toast("Amount should be less than or equal to ". $refund->amount. " !", 'error');

            return  redirect()->back();
        }

    }

    public function disapprove($id)
    {

        $refund = OrderRefund::where('id', $id)->first();

        $refund->status = 2;
        $refund->save();

        toast("Order Refund Has Been Successfully Declined!", 'success');

        return  redirect()->back();
    }

    public function handleAmount($id, $amount)
    {

        $refund = OrderRefund::where('id', $id)->first();

        if($amount == 0)
        {
            return response()->json([
                'status' => false,
                'message' => '0 is not allowed!'
            ]);
        }
        if($amount == "undefined")
        {
            return response()->json([
                'status' => false,
                'message' => 'Please enter amount!'
            ]);
        }
        if ($amount > $refund->amount) {

            return response()->json([
                'status' => false,
                'message' => 'It should be less than or equal to ' . $refund->amount
            ]);

        }

        return response()->json([
            'status' => true,
            'data' => $refund->amount
        ]);

    }
}
