<?php

namespace App\Http\Controllers;

use App\Mail\CustomerOtp as MailCustomerOtp;
use App\Models\Customer;
use App\Models\CustomerOtp;
use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderImage;
use App\Models\OrderItem;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Alert;
use App\Mail\OrderEmail;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\CustomerAddress;
use App\Models\CustomerCoupen;
use App\Models\Rating;
use App\Models\User;
use App\Models\Product;
use App\Models\Coupen;
use App\Models\Vendor;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Validator;


class OrderController extends Controller
{

    public function createOrder(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'contact_number' => 'required|not_in:0|min:11|max:11',
            'province' => 'required',
            'city' => 'required',
            // 'shipment_address' => 'required',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first()
            ]);
        }

        if (Session::get('customer') == null) {
            $checkCustomer = Customer::where('email', $request->email)->first();

            if ($checkCustomer) {
                return response()->json([
                    'status' => false,
                    'message' => 'Email already exists, try another one!'
                ]);
            }
        }


        if ($request->shipment_address == "" && $request->postaladdress == "") {
            return response()->json([
                'status' => false,
                'message' => 'Please provide a correct shipping address or postal address!'
            ]);
        }


        $customer = Customer::where('email', $request->email)->first();

        if (!$customer) {

            $user = new Customer();
            $user->name = $request->first_name . ' ' . $request->last_name;
            $user->phone = $request->contact_number;
            $user->is_active = 1;
            $user->email = $request->email;
            $user->province = $request->province;
            $user->city = $request->city;

            if ($request->password != null) {
                $user->password = Hash::make($request->password);
            }

            $user->save();
        } else {
            $user = $customer;
        }

        if ($request->shipment_address != "" || $request->shipment_address != null) {
            $address =  new CustomerAddress();
            $address->customer_id = $user->id;
            $address->address = $request->shipment_address;
            $address->active = 1;
            $address->save();
        }

        if ($request->postaladdress != "" || $request->postaladdress != null) {
            $address =  new CustomerAddress();
            $address->customer_id = $user->id;
            $address->address = $request->postaladdress;
            $address->active = 1;
            $address->save();
        }

        if ($request->password != null) {
            Session::put('customer', $user);
        }
        // dd(Session::get('customer')['id']);

        if ($request->password != null) {
            # code...
            $otp = rand(0, 99999);

            $customer = new CustomerOtp();
            $customer->email = $request->email;
            $customer->otp = $otp;
            $customer->save();
        }

        $cart = Cart::where('uuid', session()->getId())->first();
        $cart_items = CartItem::where('cart_id', $cart->id)->get();
        // dd($cart_items);
        $refno = generateOrderNo();

        $order = new Order;

        $address = CustomerAddress::where('customer_id', $user->id)->first();

        $order->order_no = $refno;
        $order->first_name = $request->first_name;
        $order->last_name = $request->last_name;
        $order->email = $request->email;
        $order->contact = $request->contact_number;
        if ($address) {
            $order->shipment_address = $address->address;
        }
        // $order->country = $request->country;
        $order->state = $request->province;
        $order->city = $request->city;
        $order->payment_method =  session('is_wallet') ? 'Wallet' : 'COD';
        $order->order_status = 'Pending';
        $order->payment_status = 'Unpaid';
        $order->customer_id = $user->id;
        $order->amount = $request->orderTotal;
        $order->subTotal = $request->subTotal;
        $order->shipping_method = $request->shipping_method;
        $order->shipping_price = $request->shipping_price;
        $order->discount = $request->coupenDiscount;

        $order->save();

        $data = [
            'title' => 'Your Order has been placed:',
            'msg' => 'Your order  has been placed successfully and we will let you know once your package' .
                'is on its way. Check the status of your order by log in to your account.',
            'customer' => $request->first_name . ' ' . $request->last_name,
            'total' => $order->amount,
            'shipment' => $order->shipping_price,
            'delivery_method' => session('is_wallet') ? 'Wallet' : 'COD'
        ];

        Mail::to($request->email)->send(new OrderEmail($data));

        if (Session::get('is_coupen') == 1) {

            $customer_coupen = CustomerCoupen::where('customer_id', $customer->id)
                ->where('coupen_id', $request->coupen_id)
                ->first();


            if ($customer_coupen) {
                $customer_coupen->count += 1;
                $customer_coupen->save();
            } else {
                $customer_coupen = new CustomerCoupen();
                $customer_coupen->customer_id = $request->customer_id;
                $customer_coupen->coupen_id = $request->coupen_id;
                $customer_coupen->count += 1;
                $customer_coupen->save();

                $coupen = Coupen::where('id', $request->coupen_id)->first();
                $coupen->coupen_users_used += 1;
                $coupen->save();
            }
        }


        foreach ($cart_items as $key => $value) {
            // dd($value->variant != NULL);

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $value->product->id,
                'variant_id' => $value->variant_id,
                'name' => $value->product->name,
                'image' => $value->product->image1,
                'price' => $value->price,
                'quantity' => $value->qty,
                'roamer_id' => $value->roamer_id,
                'vendor_id' => $value->vendor_id,
                'status' => 'Pending'
            ]);
            Notification::create([
                'title' => 'New Order Received',
                'body' => 'New order has been received!',
                'user_id' => $value->roamer_id
            ]);
        }


        toast("Your account is created", "success");
        toast("Your Order Placed Successfully", "success");

        $mycart = Cart::where('uuid', sessionID())->first();
        $items = CartItem::where('cart_id', $mycart->id)->delete();

        $myorder = Order::where('id', $order->id)->first();
        Session::get('is_coupen', 0);
        Session::get('coupenDiscount', 0);
        Session::forget('is_coupen');
        Session::forget('coupenDiscount');

        return response()->json([
            'status' => true,
            'data' => $myorder->order_no
        ]);
    }

    public function thankYou($order_no)
    {

        $myorder = Order::where('order_no', $order_no)->first();

        return view('Front.thank-you', compact('myorder'));
    }


    public function orderIndex()
    {
        if (Auth::user()->user_type == 2) {
            if (checkRoamerVendors() != false || checkRoamerVendors() != true) {
                checkRoamerVendors();
            }
        }

        $roamers = User::where('user_type', 2)
            ->where([['user_type', 2], ['email_verified_at', '!=', NULL]])
            ->get();

        $customers = Customer::all();

        if (Auth::user()->user_type == 1) {

            $vendors = Vendor::all();
            $order = Order::orderBy('id', 'DESC')->get();
            return view('Admin.manage-order', compact('order', 'roamers', 'customers', 'vendors'));
        } else {
            $vendors = Vendor::where('roamer_id', Auth::user()->id)->get();
            $orderitem  = OrderItem::where('roamer_id', '=', Auth::user()->id)->get();
            $orderId = [];
            foreach ($orderitem as $item) {
                array_push($orderId, $item->order_id);
            }
            $order = Order::whereIn('id', $orderId)->orderBy('id', 'DESC')->get();
            return view('Admin.manage-order', compact('order', 'roamers', 'customers', 'vendors'));
        }
    }

    public function changeOrderStatus($orderId, $status)
    {
        //specific vendor order status changed//
        $update = Order::where('id', '=', $orderId)->update([
            'order_status' => $status
        ]);

        $check = OrderItem::where('order_id', '=', $orderId)->get();
        foreach ($check as $products) {
            if ($status == 'Accepted') {
                OrderItem::where('order_id', '=', $orderId)->where('roamer_id', '=', Auth::user()->id)
                    ->update([
                        'status' => 'Available'
                    ]);
            }
        }

        //to mark as shiped and enter debit//
        if ($status == 'Mark As Shiped') {
            $order = OrderItem::where('order_id', '=', $orderId)->get();
            foreach ($order as $items) {
                if ($items->roamer_id == Auth::user()->id) {
                    foreach ($items->product->varients as $price) {
                        $roamerId = $items->roamer_id;

                        $trans = new Transaction;
                        $trans->order_id = $orderId;
                        $trans->reason = $items->name . '_' . $orderId;;
                        $trans->user_id = $roamerId;
                        $trans->debit = $price->p_price;
                        $trans->credit = 0;
                        $trans->save();
                    }
                }
            }
            OrderItem::where('order_id', '=', $orderId)->where('roamer_id', '=', Auth::user()->id)->update([
                'status' => 'Shipped'
            ]);
        }

        $order = Order::where('id', $orderId)->first();

        $data = [
            'title' => 'Your Order has been ' . $status,
            'msg' => 'We are happy to share that your order  has been ' . $status . ' successfully',
            'customer' => $order->customer->first_name . ' ' . $order->customer->last_name,
            'total' => $order->amount,
            'shipment' => $order->shipping_price,
            'delivery_method' => 'COD'
        ];

        Notification::create([
            'title' => $order->order_no . ' Order has been ' . $status,
            'body' => $order->order_no . ' Order has been ' . $status,
            'user_id' => Auth::user()->id
        ]);

        Mail::to($order->customer->email)->send(new OrderEmail($data));

        return response()->json([
            'status' => true,
            'msg' => 'Status updated successfully!'
        ]);
    }

    public function rejectOrder($orderId)
    {
        $delete = Order::where('id', '=', $orderId)->update([
            'order_status' => 'Rejected'
        ]);
        OrderItem::where('order_id', '=', $orderId)->update([
            'status' => 'Unavailable'
        ]);


        $order = Order::where('id', $orderId)->first();

        $data = [
            'title' => 'Your Order Has Been Rejected!',
            'msg' => 'We are sorry to say that your order has been rejected',
            'customer' => $order->customer->first_name . ' ' . $order->customer->last_name,
            'total' => $order->amount,
            'shipment' => $order->shipping_price,
            'delivery_method' => 'COD'
        ];

        Mail::to($order->customer->email)->send(new OrderEmail($data));

        Notification::create([
            'title' => $order->order_no . ' Order has been rejected',
            'body' => $order->order_no . ' Order has been rejected',
            'user_id' => Auth::user()->id
        ]);

        return response()->json([
            'status' => true,
            'msg' => 'Order rejected!'
        ]);
    }

    public function orderImage(Request $request)
    {
        foreach ($request->file('images') as $images) {
            $filename = $images->getClientOriginalName();
            $images->move('storage/orderimages/', $filename);
            OrderImage::create([
                'order_id' => $request->order_id,
                'images' => $filename
            ]);
        }

        return redirect()->back();
    }

    public function productStatus($productId, $status)
    {
        $update = OrderItem::where('order_id', '=', $productId)->update([
            'status' => $status
        ]);

        return response()->json([
            'status' => true,
            'msg' => 'Status updated successfully!'
        ]);
    }

    //Salman Dev
    public function ordersFilter(Request $request)
    {

        // dd($request->all());
        $roamers = User::where('user_type', 2)->get();

        $startdate = Carbon::createFromDate($request->startdate);
        $enddate = Carbon::createFromDate($request->enddate);
        // dd($startdate . ' ' . $enddate);
        $customers = Customer::all();
        $customer = Customer::where('id', $request->customer)->first();
        // dd($customer);


        if (Auth::user()->user_type == 1) {
            $roamer_id = $request->roamer_id;
            $vendor_id = $request->vendor_id;

            $vendors = Vendor::all();
            if ($request->order_status == 0) {
                if ($customer) {
                    if ($roamer_id != 0) {
                        if ($request->vendor_id != 0) {

                            $vendors = Vendor::where('roamer_id', $roamer_id)->get();
                            if ($request->startdate != null && $request->enddate != null) {
                                $order = Order::whereHas('orderitem', function ($q) use ($roamer_id) {
                                    $q->where('roamer_id', $roamer_id);
                                })->whereHas('orderitem', function ($q) use ($vendor_id) {
                                    $q->whereHas('product', function ($q) use ($vendor_id) {
                                        $q->where('vendor_id', $vendor_id);
                                    });
                                })
                                    ->where('customer_id', $customer->id)
                                    ->orWhereBetween('created_at', [$startdate, $enddate])->orderBy('id', 'DESC')->get();
                            } else {
                                $order = Order::whereHas('orderitem', function ($q) use ($roamer_id) {
                                    $q->where('roamer_id', $roamer_id);
                                })->whereHas('orderitem', function ($q) use ($vendor_id) {
                                    $q->whereHas('product', function ($q) use ($vendor_id) {
                                        $q->where('vendor_id', $vendor_id);
                                    });
                                })
                                    ->where('customer_id', $customer->id)
                                    ->orderBy('id', 'DESC')->get();
                            }
                        } else {
                            if ($request->startdate != null && $request->enddate != null) {
                                $order = Order::whereHas('orderitem', function ($q) use ($roamer_id) {
                                    $q->where('roamer_id', $roamer_id);
                                })
                                    ->where('customer_id', $customer->id)
                                    ->orWhereBetween('created_at', [$startdate, $enddate])->orderBy('id', 'DESC')->get();
                            } else {
                                $order = Order::whereHas('orderitem', function ($q) use ($roamer_id) {
                                    $q->where('roamer_id', $roamer_id);
                                })
                                    ->where('customer_id', $customer->id)
                                    ->orderBy('id', 'DESC')->get();
                            }
                        }
                    } else {
                        $order = Order::where('customer_id', $customer->id)
                            ->orderBy('id', 'DESC')->get();
                    }
                } else {
                    if ($roamer_id != 0) {
                        if ($request->vendor_id != 0) {
                            $vendors = Vendor::where('roamer_id', $roamer_id)->get();
                            if ($request->startdate != null && $request->enddate != null) {
                                $order = Order::orWhereHas('orderitem', function ($q) use ($roamer_id) {
                                    $q->where('roamer_id', $roamer_id);
                                })->orWhereHas('orderitem', function ($q) use ($vendor_id) {
                                    $q->whereHas('product', function ($q) use ($vendor_id) {
                                        $q->where('vendor_id', $vendor_id);
                                    });
                                })
                                    ->orWhereBetween('created_at', [$startdate, $enddate])->orderBy('id', 'DESC')->get();
                            } else {
                                // dd($vendor_id);
                                $order = Order::orWhereHas('orderitem', function ($q) use ($roamer_id) {
                                    $q->where('roamer_id', $roamer_id);
                                })->whereHas('orderitem', function ($q) use ($vendor_id) {
                                    $q->where('vendor_id', $vendor_id);
                                })->orderBy('id', 'DESC')->get();
                            }
                        } else {
                            if ($request->startdate != null && $request->enddate != null) {
                                $order = Order::orWhereHas('orderitem', function ($q) use ($roamer_id) {
                                    $q->where('roamer_id', $roamer_id);
                                })->orWhereBetween('created_at', [$startdate, $enddate])
                                    ->orderBy('id', 'DESC')
                                    ->get();
                            } else {
                                $order = Order::orWhereHas('orderitem', function ($q) use ($roamer_id) {
                                    $q->where('roamer_id', $roamer_id);
                                })->orderBy('id', 'DESC')->get();
                            }
                        }
                    } else {

                        $order = Order::orderBy('id', 'DESC')->get();
                    }
                }
            } else {
                if ($customer) {
                    if ($roamer_id != 0) {
                        if ($request->vendor_id != 0) {
                            $vendors = Vendor::where('roamer_id', $roamer_id)->get();
                            if ($request->startdate != null && $request->enddate != null) {
                                // dd($request->order_no);
                                if ($request->order_no) {
                                    $status = $request->order_status;
                                    $order = Order::orWhereHas('orderitem', function ($q) use ($roamer_id) {
                                        $q->where('roamer_id', $roamer_id);
                                    })
                                        ->orWhereHas('orderitem', function ($q) use ($vendor_id) {
                                            $q->whereHas('product', function ($q) use ($vendor_id) {
                                                $q->where('vendor_id', $vendor_id);
                                            });
                                        })
                                        ->where('order_no', '=', $request->order_no)
                                        ->where('order_status', '=', $request->order_status)
                                        ->orWhere('customer_id', $customer->id)
                                        ->orWhereBetween('created_at', [$startdate, $enddate])
                                        ->orderBy('id', 'DESC')->get();
                                } else {
                                    $status = $request->order_status;
                                    $order = Order::orWhereHas('orderitem', function ($q) use ($roamer_id) {
                                        $q->where('roamer_id', $roamer_id);
                                    })
                                        ->orWhereHas('orderitem', function ($q) use ($vendor_id) {
                                            $q->whereHas('product', function ($q) use ($vendor_id) {
                                                $q->where('vendor_id', $vendor_id);
                                            });
                                        })
                                        ->where('order_status', '=', $request->order_status)
                                        ->orWhere('customer_id', $customer->id)
                                        ->orWhereBetween('created_at', [$startdate, $enddate])
                                        ->orderBy('id', 'DESC')->get();
                                }
                            } else {
                                $order = Order::orWhereHas('orderitem', function ($q) use ($roamer_id) {
                                    $q->where('roamer_id', $roamer_id);
                                })->orWhereHas('orderitem', function ($q) use ($vendor_id) {
                                    $q->whereHas('product', function ($q) use ($vendor_id) {
                                        $q->where('vendor_id', $vendor_id);
                                    });
                                })->orWhere('customer_id', $customer->id)
                                    ->where('order_status', '=', $request->order_status)
                                    ->orderBy('id', 'DESC')->get();
                            }
                        } else {
                            if ($request->startdate != null && $request->enddate != null) {
                                $order = Order::orWhereHas('orderitem', function ($q) use ($roamer_id) {
                                    $q->where('roamer_id', $roamer_id);
                                })->orWhere('customer_id', $customer->id)
                                    ->orWhereBetween('created_at', [$startdate, $enddate])
                                    ->where('order_status', $request->order_status)
                                    ->orderBy('id', 'DESC')->get();
                            } else {
                                $order = Order::orWhereHas('orderitem', function ($q) use ($roamer_id) {
                                    $q->where('roamer_id', $roamer_id);
                                })->orWhere('customer_id', $customer->id)
                                    ->where('order_status', $request->order_status)
                                    ->orderBy('id', 'DESC')->get();
                            }
                        }
                    } else {
                        $order = Order::where('customer_id', $customer->id)
                            ->where('order_status', $request->order_status)
                            ->orderBy('id', 'DESC')->get();
                    }
                } else {
                    if ($roamer_id != 0) {
                        if ($request->vendor_id == 0) {
                            $vendors = Vendor::where('roamer_id', $roamer_id)->get();
                            if ($request->startdate != null && $request->enddate != null) {
                                $order = Order::orWhereHas('orderitem', function ($q) use ($roamer_id) {
                                    $q->where('roamer_id', $roamer_id);
                                })->orWhereHas('orderitem', function ($q) use ($vendor_id) {
                                    $q->whereHas('product', function ($q) use ($vendor_id) {
                                        $q->where('vendor_id', $vendor_id);
                                    });
                                })->orWhereBetween('created_at', [$startdate, $enddate])
                                    ->where('order_status', $request->order_status)
                                    ->orderBy('id', 'DESC')->get();
                            } else {
                                $order = Order::orWhereHas('orderitem', function ($q) use ($roamer_id) {
                                    $q->where('roamer_id', $roamer_id);
                                })->orWhereHas('orderitem', function ($q) use ($vendor_id) {
                                    $q->whereHas('product', function ($q) use ($vendor_id) {
                                        $q->where('vendor_id', $vendor_id);
                                    });
                                })->where('order_status', $request->order_status)
                                    ->orderBy('id', 'DESC')->get();
                            }
                        }
                    } else {

                        $order = Order::where('order_status', $request->order_status)
                            ->orderBy('id', 'DESC')->get();
                    }
                }
            }
            // dd($order);

            return view('Admin.manage-order', compact('order', 'roamers', 'customers', 'vendors'));
        } else {

            $vendors = Vendor::where('roamer_id', Auth::user()->id)->get();
            $orderitem  = OrderItem::where('roamer_id', '=', Auth::user()->id)->get();

            $orderId = [];

            foreach ($orderitem as $item) {
                array_push($orderId, $item->order_id);
            }

            if ($request->order_status == 0) {
                if ($request->order_no != null && $request->customer != null && $request->startdate != null && $request->enddate != null) {

                    $order = Order::whereIn('id', $request->orderId)->where('order_id', $request->order_no)
                        ->where('customer_id', $customer->id)->whereBetween('created_at', [$request->startdate, $request->enddate])->orderBy('id', 'DESC')->get();
                } else {
                    $order = [];
                }
            } else {
                if ($request->order_no != null && $request->customer != null && $request->startdate != null && $request->enddate != null) {

                    $order = Order::whereIn('id', $request->orderId)->where('order_id', $request->order_no)
                        ->where('customer_id', $customer->id)->whereBetween('created_at', [$request->startdate, $request->enddate])
                        ->where('order_status', $request->order_status)
                        ->orderBy('id', 'DESC')->get();
                } else {
                    $order = [];
                }
            }


            return view('Admin.manage-order', compact('order', 'roamers', 'customers', 'vendors'));
        }
    }

    public function managereview()
    {

        $reviews = [];
        if (Auth::user()->user_type == 1) {
            $reviews = Rating::all();
        } else if (Auth::user()->user_type == 2) {

            $products = Product::where('user_id', Auth::user()->id)->get();
            $ids = [];
            foreach ($products as $product) {
                array_push($ids, $product->id);
            }
            $reviews = Rating::whereIn('product_id', $ids)->get();
        }
        $roamers = User::where('user_type', 2)->get();
        // dd($reviews);

        return view('Admin.manage-review', compact('reviews', 'roamers'));
    }

    public function generatePDF($id)
    {
        $order = Order::where('id', $id)->first();
        // dd($id);
        $pdf = Pdf::loadView('Admin.invoice-pdf',  array('order' => $order));

        return $pdf->download('invoice.pdf');
    }

    public function getOrder($id)
    {
        $order = Order::where('id', $id)
            ->with('orderitem', 'orderitem.product')
            ->first();

        return response()->json([
            'status' => true,
            'data' => $order
        ]);
    }
}
