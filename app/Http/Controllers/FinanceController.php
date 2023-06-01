<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;

class FinanceController extends Controller
{
    public function finance()
    {
        if (Auth::user()->user_type == 2) {

            if (checkRoamerVendors(Auth::user()->id) != false || checkRoamerVendors(Auth::user()->id) != true) {
                // dd('asdasd');
                if (checkRoamerVendors(Auth::user()->id)) {
                    return checkRoamerVendors(Auth::user()->id);
                }
            }
        }
        $roamers = User::where('user_type', 2)
            ->where('email_verified_at', '!=', NULL)->get();

        return view('Admin.general-finance', compact('roamers'));
    }

    public function filterFinance($id)
    {

        $roamers = User::where('user_type', 2)
            ->where('email_verified_at', '!=', NULL)->get();

        $roamerID = $id;

        return view('Admin.general-finance', compact('roamers', 'roamerID'));
    }


    public function expense()
    {
        if (Auth::user()->user_type == 2) {

            if (checkRoamerVendors(Auth::user()->id) != false || checkRoamerVendors(Auth::user()->id) != true) {
                // dd('asdasd');
                if (checkRoamerVendors(Auth::user()->id)) {
                    return checkRoamerVendors(Auth::user()->id);
                }
            }
        }
        $roamerID = null;

        $vendor = User::all();

        $order = Order::all();

        $roamers = User::where([['user_type', 2], ['email_verified_at', '!=', NULL]])->get();

        if (Auth::user()->user_type == 1) {
            // $transaction = Transaction::all();
            $transaction = [];
            $roamer = [];
        } else {
            $roamerID = Auth::user()->id;
            $transaction = Transaction::where('user_id', '=', Auth::user()->id)->get();
            // dd($transaction);
            // $roamer = User::where('id', $transaction->user_id)->first();
            // dd($roamer);
            $roamer = [];
        }


        $orders = Order::whereHas('orderitem', function ($q) use ($roamerID) {
            $q->where('roamer_id', $roamerID);
        })->get();

        // dd($transaction);
        return view('Admin.expenditure', compact('vendor', 'order', 'transaction', 'roamers', 'roamer', 'roamerID', 'orders'));
    }

    public function addExpense(Request $request)
    {
        $expense = new Transaction;
        $expense->order_id = $request->order_id;
        $expense->user_id = $request->roamer_id;
        $expense->reason = $request->reason;
        $expense->debit = $request->debit;
        $expense->credit = $request->credit ?? 0;
        $expense->save();

        Alert::success("Expense Added Successfully!", "Expense has been added successfully!!");

        return redirect()->back();

        // return response()->json([
        //     'status' => true,
        //     'msg' => 'Expense Added Successfully!'
        // ], 200);
    }

    public function addToppped(Request $request)
    {
        // dd($request->all());

        $expense = new Transaction;
        $expense->order_id = $request->order_id;
        $expense->user_id = $request->roamer_id;
        $expense->reason = $request->reason;
        $expense->debit = 0;
        $expense->credit = $request->credit;
        $expense->save();

        Alert::success("Expense Added Successfully!", "Expense has been added successfully!!");

        return redirect()->back();

        // return response()->json([
        //     'status' => true,
        //     'msg' => 'Expense Added Successfully!'
        // ], 200);
    }


    //Salman Dev
    public function expenseFilter(Request $request)
    {
        // dd($request->all());
        $roamerID = $request->roamers;
        $vendor = User::all();

        $order = Order::whereHas('orderitem', function ($q) use ($roamerID) {
            $q->where('roamer_id', $roamerID);
        })->get();

        $roamers = User::where([['user_type', 2], ['email_verified_at', '!=', NULL]])->get();

        $transaction = Transaction::where('user_id', $request->roamers)->get();
        // dd($transaction);
        $user = User::where('id', $request->roamers)->first();
        // dd($roamer);

        $roamerID = $user->id;

        $orders = Order::whereHas('orderitem', function ($q) use ($roamerID) {
            $q->where('roamer_id', $roamerID);
        })->get();


        return view('Admin.expenditure', compact('vendor', 'order', 'transaction', 'roamers', 'user', 'roamerID', 'orders'));
    }
}
