<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderRefund;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WalletController extends Controller
{
    public function index()
    {
        $order_no = '';

        $refund = OrderRefund::where('customer_id', '=', Session::get('customer')['id'])->get();
        // dd($refund);
        $transactions = Order::where('customer_id', Session::get('customer')['id'])->get();


        $wallet = Wallet::where('user_id', Session::get('customer')['id'])
            ->sum('total_amount');

        return view('Front.my-wallet', compact('refund', 'transactions', 'order_no', 'wallet'));
    }

    public function filter($order_no)
    {

        if ($order_no == 0) {
            return redirect()->route('my_wallet');
        }

        $order = Order::where('order_no', $order_no)->first();

        $refund = OrderRefund::where('order_id', $order->id)
            ->where('customer_id', '=', Session::get('customer')['id'])
            ->get();

        $transactions = Order::where('customer_id', Session::get('customer')['id'])->get();

        $wallet = Wallet::where('user_id', Session::get('customer')['id'])
            ->first();

        return view('Front.my-wallet', compact('refund', 'transactions', 'order_no', 'wallet'));
    }

    public function getCustomerWallet($id, $check)
    {

        $wallet = Wallet::where('user_id', $id)->sum('total_amount'); //get wallet from customer
        $total = cartSubTotal(sessionID()) + Session::get('shippingPrice'); //get total
        // dd($wallet);
        if ($check == "true") //if customer check the wallet
        {
            if ($wallet < $total) {

                Session::put('is_wallet', 1);
                Session::put('walletPrice', $wallet);
                Session::put('full_paid', 0);
            } else if ($wallet > $total) {
                $walletUpdate = $wallet - $total;
                $wallet = Wallet::where('user_id', $id)->first();
                $wallet->total_amount = $walletUpdate;
                Session::put('is_wallet', 1);
                Session::put('walletPrice', 0);

                Session::put('full_paid', 1);
                Session::put('is_wallet', 1);
            }
        } else if ($check == "false") // if does not customer check the wallet
        {
            Session::put('full_paid', 0);
            Session::forget('is_wallet');
            Session::forget('walletPrice');
            Session::put('is_wallet', 0);
            Session::put('walletPrice', 0);
            return response()->json([
                'status' => false,
                'wallet' => Session::get('walletPrice'),
                'sub_total' => $total
            ]);
        }


        // if(Session::get('walletPrice') != 0){
        //     if(Session::get('walletPrice') >= $total)
        //     {
        //         $total = '-Rs. '.$total . ' Pkr.';
        //     }
        //     else if(Session::get('walletPrice') < $total)
        //     {

        //         Session::put('is_wallet', 0);
        //         Session::put('walletPrice', 0);

        //         return response()->json([
        //             'status' => false,
        //             'msg' => 'Your dont have enough wallet credit for this order!'
        //         ]);

        //     }
        // }

        return response()->json([
            'status' => true,
            'wallet' => Session::get('walletPrice'),
            'sub_total' => $total,
        ]);
    }
}
