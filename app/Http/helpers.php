
<?php

use App\Models\Brand;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\City;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\Rating;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Notification;
use App\Models\OrderRefund;
use App\Models\ResponseReview;
use App\Models\Shipment;
use App\Models\SubCategory;
use App\Models\Wallet;
use App\Models\Vendor;
use App\Models\Compaign;
use App\Models\Category;
use App\Models\Chat;
use App\Models\CompaignCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

if (!function_exists('calculateTotalExpense')) {
    function calculateTotalExpense($transaction)
    {

        $total = 0;

        foreach ($transaction as $key => $value) {
            $total += $value->debit;
        }

        return $total;
    }
}

//If products is in loop calculate ratings
if (!function_exists('calculateProductRatings')) {
    function calculateProductRatings($id)
    {

        $product = Product::where('id', $id)->first();

        $max = Rating::where('product_id', $product->id)->max('rating');
        $rating = [];
        if ($max != null) {
            # code...
            $rating = range(1, $max);
        }

        return $rating;
    }
}


//Calculate Total Order Sum Finance
if (!function_exists('calculateOrderSumAmount')) {
    function calculateOrderSumAmount($id)
    {

        $total = 0;

        if ($id == 1) {
            $total = Order::sum('amount');
        } else {
            $total = OrderItem::where('roamer_id', '=', $id)->sum('price');
        }

        return $total;
    }
}

// Count Orders Count For Finance
if (!function_exists('calculateOrderCount')) {
    function calculateOrderCount($id)
    {

        $count = 0;

        if ($id == 1) {
            $count = count(Order::all());
        } else if ($id) {

            $count = count(OrderItem::where('roamer_id', $id)->get());
        }

        return $count;
    }
}

// Count Order Pending Price
if (!function_exists('calculateOrderPendingPrice')) {
    function calculateOrderPendingPrice($id)
    {

        $pending = 0;

        if ($id == 1) {

            $pending = OrderItem::where('status', '=', 'Pending')->sum('price');
        } else if ($id) {

            $pending =  OrderItem::where('status', '=', 'Pending')
                ->where('roamer_id', '=', $id)
                ->sum('price');
        }

        return $pending;
    }
}

// Count Order Pending Price Coming
if (!function_exists('calculateOrderPending')) {
    function calculateOrderPending($id)
    {

        $pending = 0;

        if ($id == 1) {

            $pending = count(OrderItem::where('status', '=', 'Pending')->get());
        } else if ($id) {

            $pending =  count(OrderItem::where('status', '=', 'Pending')
                ->where('roamer_id', '=', $id)
                ->get());
        }

        return $pending;
    }
}

// Count Order Available Price Count
if (!function_exists('calculateOrderAvailablePrice')) {
    function calculateOrderAvailablePrice($id)
    {

        $available = 0;

        if ($id == 1) {

            $available = OrderItem::where('status', '=', 'Available')->sum('price');
        } else {

            $available =  OrderItem::where('status', '=', 'Available')
                ->where('roamer_id', '=', $id)
                ->sum('price');
        }

        return $available;
    }
}

// Count Order Available Price Coming
if (!function_exists('calculateOrderAvailable')) {
    function calculateOrderAvailable($id)
    {

        $available = 0;

        if ($id == 1) {

            $available = count(OrderItem::where('status', '=', 'Available')->get());
        } else {

            $available =  count(OrderItem::where('status', '=', 'Available')
                ->where('roamer_id', '=', $id)
                ->get());
        }

        return $available;
    }
}

// Count Order Shipped Price
if (!function_exists('calculateOrderShippedPrice')) {
    function calculateOrderShippedPrice($id)
    {

        $shipped = 0;

        if ($id == 1) {


            $shipped = Order::where('order_status', '=', 'Mark As Shiped')->sum('amount');
        } else {

            $ship = OrderItem::with('order')->where('roamer_id', '=', $id)->get();
            $shipped = 0;

            foreach ($ship as $ships) {
                if ($ships->order->order_status == 'Mark As Shiped') {
                    $shipped += $ships->price;
                }
            }
        }

        return $shipped;
    }
}

// Count Order Shipped Price Coming
if (!function_exists('calculateOrderShipped')) {
    function calculateOrderShipped($id)
    {

        $shipped = 0;

        if ($id == 1) {


            $shipped = count(Order::where('order_status', '=', 'Mark As Shiped')->get());
        } else {

            $ship = OrderItem::with('order')->where('roamer_id', '=', $id)->get();
            $shipped = 0;

            foreach ($ship as $ships) {
                if ($ships->order->order_status == 'Mark As Shiped') {
                    $shipped += 1;
                }
            }
        }

        return $shipped;
    }
}


// Count Order Shipped Price
if (!function_exists('calculateOrderDeliveredPrice')) {
    function calculateOrderDeliveredPrice($id)
    {

        $delivered = 0;

        if ($id == 1) {


            $delivered = Order::where('order_status', '=', 'Delivered')->sum('amount');
        } else {

            $deliver = OrderItem::with('order')->where('roamer_id', '=', $id)->get();
            $delivered = 0;

            foreach ($deliver as $delivers) {
                if ($delivers->order->order_status == 'Delivered') {
                    $delivered += $delivers->price;
                }
            }
        }

        return $delivered;
    }
}

// Count Order Shipped Price Coming
if (!function_exists('calculateOrderDelivered')) {
    function calculateOrderDelivered($id)
    {

        $delivered = 0;

        if ($id == 1) {


            $delivered = count(Order::where('order_status', '=', 'Delivered')->get());
        } else {

            $deliver = OrderItem::with('order')->where('roamer_id', '=', $id)->get();
            $delivered = 0;

            foreach ($deliver as $delivers) {
                if ($delivers->order->order_status == 'Delivered') {
                    $delivered += 1;
                }
            }
        }

        return $delivered;
    }
}

// Count Order Shipped Price
if (!function_exists('calculateOrderCancelledPrice')) {
    function calculateOrderCancelledPrice($id)
    {

        $cancelled = 0;

        if ($id == 1) {


            $cancelled = Order::where('order_status', '=', 'Cancelled')->sum('amount');
        } else {

            $cancel = OrderItem::with('order')->where('roamer_id', '=', $id)->get();
            $cancelled = 0;

            foreach ($cancel as $cancels) {
                if ($cancels->order->order_status == 'Cancelled') {
                    $cancelled += $cancels->price;
                }
            }
        }

        return $cancelled;
    }
}

// Count Order Shipped Price Coming
if (!function_exists('calculateOrderCancelled')) {
    function calculateOrderCancelled($id)
    {

        $cancelled = 0;

        if ($id == 1) {


            $cancelled = count(Order::where('order_status', '=', 'Cancelled')->get());
        } else {

            $cancel = OrderItem::with('order')->where('roamer_id', '=', $id)->get();
            $cancelled = 0;

            foreach ($cancel as $cancels) {
                if ($cancels->order->order_status == 'Cancelled') {
                    $cancelled += 1;
                }
            }
        }

        return $cancelled;
    }
}


// Count Transaction Expense Price
if (!function_exists('calculateTransactionExpenseCount')) {
    function calculateTransactionExpenseCount($id)
    {

        $expense = 0;

        if ($id == 1) {

            $expense = Transaction::sum('debit');
        } else {

            $expense = Transaction::where('user_id', '=', $id)->sum('debit');
        }

        return $expense;
    }
}

// Count Transaction Expense Coming
if (!function_exists('calculateTransactionExpense')) {
    function calculateTransactionExpense($id)
    {

        $expense = 0;

        if ($id == 1) {

            $expense = count(Transaction::all());
        } else if ($id) {

            $expense = count(Transaction::where('user_id', '=', $id)->get());
        }

        return $expense;
    }
}

// Splt Name
if (!function_exists('SplitFirstName')) {
    function SplitFirstName($name)
    {

        $name = explode(" ", $name);

        return $name[0];
    }
}

// Splt Name
if (!function_exists('SplitLastName')) {
    function SplitLastName($name)
    {
        $name = explode(" ", $name);

        return isset($name[1]) ? $name[1] : '';
    }
}


// Splt Name
if (!function_exists('getVarientPrice')) {
    function getVarientPrice($id)
    {

        $product_varient = ProductVariation::where('product_id', $id)->first();



        return ($product_varient) ?  $product_varient->price : 0;
    }
}

//
if (!function_exists('totalOrders')) {
    function totalOrders()
    {

        $orders = Order::all();



        return count($orders);
    }
}

if (!function_exists('bestRoamers')) {
    function bestRoamers($startDate = NULL, $endDate = NULL, $day = NULL)
    {
        if ($startDate == NULL || $endDate == NULL || $day == NULL) {
            $roamers = User::where('user_type', 2)->withCount('product')->get();
        } else if ($startDate != NULL && $endDate != NULL && $vendor == NULL) {
            $roamers = User::where('user_type', 2)
                ->WhereBetween('created_at', [$startDate, $endDate])
                ->withCount('product')->get();
        }
        else if ($startDate == NULL && $endDate == NULL && $day != 'today') {
            $roamers = User::where('user_type', 2)
                ->whereDate('created_at', '=', \Carbon\Carbon::today())
                ->withCount('product')->get();
        }


        return $roamers;
    }
}

if (!function_exists('productsByOrders')) {
    function productsByOrders($startDate = NULL, $endDate = NULL)
    {
        if ($startDate == NULL || $endDate == NULL) {
            $products = Product::withCount('order_items')->get();
        } else {

            $products = Product::WhereBetween('created_at', [$startDate, $endDate])
                ->withCount('order_items')->get();
        }


        return $products;
    }
}

if (!function_exists('productsByQuantity')) {
    function productsByQuantity($startDate = NULL, $endDate = NULL)
    {
        if ($startDate == NULL || $endDate == NULL) {
            $products = Product::orderBy('qty', 'ASC')->get();
        } else {

            $products = Product::WhereBetween('created_at', [$startDate, $endDate])
                ->orderBy('qty', 'ASC')->get();
        }


        return $products;
    }
}

if (!function_exists('productPricePercentage')) {
    function productPricePercentage($id)
    {

        $product = Product::where('id', $id)->first();

        $percentage = 0;

        if ($product->varients) {
            $percentage = ($product->varients[0]->s_price / 100) * $product->varients[0]->price;
        } else if ($product->s_price != null) {
            $percentage = ($product->s_price / 100) * $product->price;
        }

        return $percentage;
    }
}

//For Count
if (!function_exists('CartCount')) {
    function CartCount($id)
    {

        $cart = Cart::where('uuid', $id)->first();

        $count = 0;

        if ($cart) {
            foreach ($cart->cart_items as $key => $item) {
                $count += $item->qty;
            }
        }

        return $count;
    }
}

//For Product Detail
if (!function_exists('getCartCount')) {
    function getCartCount($id)
    {

        $cart = Cart::where('uuid', $id)->count();

        return 1;
    }
}

//For Product Detail
if (!function_exists('ShippingNull')) {
    function ShippingNull()
    {

        $cart = Cart::where('uuid', sessionID())->first();
        // dd($cart->cart_items);
        if ($cart) {
            if (count($cart->cart_items) == 0) {
                session()->put('shipping_method', '');
                session()->put('shipping_price', 0);
                session()->put('is_coupen', 0);
                session()->put('coupen_id', null);
                session()->put('coupenDiscount', null);
            }
        } else {
            session()->put('shipping_method', '');
            session()->put('shipping_price', 0);
            session()->put('is_coupen', 0);
            session()->put('coupen_id', null);
            session()->put('coupenDiscount', null);
        }
    }
}

//For Product Profit (price - procrumentprice * sold orders)
if (!function_exists('ProductProfit')) {
    function ProductProfit($id)
    {
        // $product = Product::where('id', $id)->first();

        $orders = OrderItem::where('product_id', $id)->get();
        $profit = 0;
        foreach ($orders as $item) {
            if (isset($item->variants) == 0) {
                $profit = $profit + $item->product->price - $item->product->p_price;
            } else {

                $profit = $profit + $item->variants->price - $item->variants->p_price;
            }
        }

        return $profit;
    }
}

if (!function_exists('getNotifications')) {
    function getNotifications()
    {
        $notification = Notification::orderBy('created_at', 'desc')->get();

        return $notification;
    }
}

if (!function_exists('countNotifications')) {
    function countNotifications($id)
    {
        $notification = Notification::where('user_id', $id)
            ->where('is_read', 0)
            ->get();

        return count($notification);
    }
}

if (!function_exists('Cart')) {
    function Cart()
    {
        $cart = Cart::all();
        if (count($cart) == 0) {
            session()->put('shipping', 0);
            session()->put('shippingPrice', 0);
            session()->save();
        }


        return $cart;
    }
}

if (!function_exists('getCart')) {
    function getCart($id)
    {
        $Cart = Cart::where('uuid', session()->getId())->first();

        $cart = [];

        if ($Cart) {
            $cartID = $Cart->id;
            $cart = User::where([['user_type', 2], ['email_verified_at', '!=', NULL]])
                ->whereHas('cart_items', function ($q) use ($cartID) {
                    $q->where('cart_id', $cartID);
                })
                ->with('cart_items', 'cart_items.product', 'cart_items.product.category')->get();
        }

        return $cart;
    }
}

if (!function_exists('cartTotal')) {
    function cartTotal($id)
    {
        $cart = Cart::where('uuid', $id)->sum('total');

        return $cart;
    }
}

if (!function_exists('cartSubTotal')) {
    function cartSubTotal($id)
    {
        $shipping = Session::get('shippingPrice');
        $coupen = Session::get('is_coupen');
        $cart = Cart::where('uuid', $id)->sum('total');
        $coupenPrice = Session::get('Discount');
        // dd($coupenPrice);

        if ($coupen != 0) {
            if ($coupenPrice >= $cart) {
                $cart = $coupenPrice - Cart::where('uuid', $id)->sum('total') + $shipping;
            } else if ($coupenPrice < $cart) {
                $cart = Cart::where('uuid', $id)->sum('total') + $shipping - $coupenPrice;
            }
        } else {
            $cart = Cart::where('uuid', $id)->sum('total') + $shipping;
        }

        // dd($cart);

        return $cart;
    }
}

if (!function_exists('getVariatName')) {
    function getVariatName($id)
    {
        $variant = ProductVariation::where('id', $id)->first();
        // $option = json_decode($variant->options, '""');
        $option = explode('"', $variant->options);

        return $option[3];
    }
}

if (!function_exists('getVariatPrice')) {
    function getVariatPrice($id)
    {
        // dd($id);
        $variant = ProductVariation::where('product_id', $id)->first();
        if ($variant) {
            return $variant;
        }

        return null;
    }
}


if (!function_exists('checkReponse')) {
    function checkReponse($id)
    {

        $response = ResponseReview::where('user_id', $id)->first();

        return $response;
    }
}

if (!function_exists('getReponse')) {
    function getReponse($id)
    {

        $response = ResponseReview::where('rating_id', $id)->first();

        return ($response) ? $response->response : 'No response';
    }
}

if (!function_exists('checkCustomerOrder')) {
    function checkCustomerOrder($id, $productID)
    {

        $order = Order::where('customer_id', $id)
            ->whereHas('orderitem', function ($q) use ($productID) {
                $q->where('product_id', $productID);
            })->first();

        return $order;
    }
}

if (!function_exists('checkAttribute')) {
    function checkAttribute($option)
    {
        $opt = json_decode($option, '""');

        $a = [];

        return key($opt);
    }
}

if (!function_exists('sessionID')) {
    function sessionID()
    {

        $id = session()->getId();

        return $id;
    }
}


if (!function_exists('checkCart')) {
    function checkCart($id)
    {

        $cart = Cart::where('uuid', $id)->first();

        return $cart;
    }
}


if (!function_exists('checkRefund')) {
    function checkRefund($id)
    {

        $check = OrderRefund::where('order_item_id', $id)->exists();

        return $check;
    }
}

if (!function_exists('getApprovedRefunds')) {
    function getApprovedRefunds($id)
    {

        $refunds = OrderRefund::where('customer_id', $id)
            ->where('status', 1)->get();

        return $refunds;
    }
}

if (!function_exists('getUnApprovedRefunds')) {
    function getUnApprovedRefunds($id)
    {

        $refunds = OrderRefund::where('customer_id', $id)
            ->where('status', 0)->get();

        return $refunds;
    }
}

if (!function_exists('generateOrderNo')) {
    function generateOrderNo()
    {
        $date = date('Ymd');
        $reference_number = 'ORDER-' . $date . time();


        return $reference_number;
    }
}

if (!function_exists('hasDifferentRoamer')) {
    function hasDifferentRoamer()
    {
        $cart = getCart(sessionID());

        $flag = 0;

        $shipping = Shipment::where('id', 1)->first();
        // dd($cart);
        if (count($cart) == 0) {
            session()->put('shippingPrice', 0);
            session()->save();
        } else {
            foreach ($cart as $key => $cartt) {
                $user = User::where('id', $cartt->id)->exists();
                if ($user) {
                    $flag += 1;
                    if ($flag <= 2) {
                        session()->put('shippingPrice', $shipping->price);
                        session()->save();
                    } else  if ($flag >= 2) {
                        session()->put('shippingPrice', $shipping->price + $shipping->price);
                        session()->save();
                    }
                } else {
                    session()->put('shippingPrice', 0);
                    session()->save();
                }
            }
        }
        // return $flag;
    }
}

if (!function_exists('getCity')) {
    function getCity($id)
    {
        $city = City::where('province_id', $id)->first();

        return $city->city_name;
    }
}

// Create a function for converting the amount in words
if (!function_exists('AmountInWords')) {
    function AmountInWords(float $amount)
    {
        $amount_after_decimal = round($amount - ($num = floor($amount)), 2) * 100;
        // Check if there is any number after decimal
        $amt_hundred = null;
        $count_length = strlen($num);
        $x = 0;
        $string = array();
        $change_words = array(
            0 => '', 1 => 'One', 2 => 'Two',
            3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
            7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
            10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
            13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
            16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
            19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
            40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
            70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety'
        );
        $here_digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
        while ($x < $count_length) {
            $get_divider = ($x == 2) ? 10 : 100;
            $amount = floor($num % $get_divider);
            $num = floor($num / $get_divider);
            $x += $get_divider == 10 ? 1 : 2;
            if ($amount) {
                $add_plural = (($counter = count($string)) && $amount > 9) ? 's' : null;
                $amt_hundred = ($counter == 1 && $string[0]) ? ' and ' : null;
                $string[] = ($amount < 21) ? $change_words[$amount] . ' ' . $here_digits[$counter] . $add_plural . '
           ' . $amt_hundred : $change_words[floor($amount / 10) * 10] . ' ' . $change_words[$amount % 10] . '
           ' . $here_digits[$counter] . $add_plural . ' ' . $amt_hundred;
            } else $string[] = null;
        }
        $implode_to_Rupees = implode('', array_reverse($string));
        $get_paise = ($amount_after_decimal > 0) ? "And " . ($change_words[$amount_after_decimal / 10] . "
       " . $change_words[$amount_after_decimal % 10]) . ' Paise' : '';
        return ($implode_to_Rupees ? $implode_to_Rupees . 'Rupees ' : '') . $get_paise;
    }
}

if (!function_exists('getWallet')) {
    function getWallet($id)
    {
        $wallet = Wallet::where('user_id', $id)->sum('total_amount');

        return $wallet;
    }
}

if (!function_exists('cartIfEmpty')) {
    function cartIfEmpty()
    {
        $cart = Cart::where('uuid', sessionID())->first();

        if ($cart) {
            $items = CartItem::where('cart_id', $cart->id)->get();

            if (count($items) == 0) {
                Session::put('is_coupen', 0);
                $cart->total = 0;
                $cart->save();
            }
        } else {

            Session::put('is_coupen', 0);
        }
    }
}


if (!function_exists('ShippingAmount')) {
    function ShippingAmount()
    {
        $shipping = Shipment::first();

        return $shipping->price;
    }
}

if (!function_exists('checkSubCategory')) {
    function checkSubCategory($id)
    {
        $subcategory = SubCategory::where('category_id', $id)->where('active', 1)->get();

        return count($subcategory);
    }
}

if (!function_exists('getProductSku')) {
    function getProductSku($id)
    {
        $product = Product::where('id', $id)->first();
        $sku = '';
        if (count($product->varients) != 0) {
            foreach ($product->varients as $varient) {
                $sku = $sku . $varient->seller_sku . ', ';
            }
            return $sku;
        } else {
            return $product->sku;
        }
    }
}

if (!function_exists('checkCampaignCategory')) {
    function checkCampaignCategory($id, $catId)
    {
        $compaign = CompaignCategory::where('compaign_id', $id)->first();

        if ($compaign) {
            if ($compaign->category_id == $catId) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}


if (!function_exists('getIsReadChat')) {
    function getIsReadChat($id)
    {
        $chat = Chat::where('sender_id', $id)->where('is_read', 0)->get();

        return $chat;
    }
}

//if roamer has not any vendors
if (!function_exists('checkRoamerVendors')) {
    function checkRoamerVendors()
    {
        if (Auth::user()->user_type == 2) {
            $roamer = User::where('id', Auth::user()->id)->first();
            // dd(count($roamer->vendors));
            if ($roamer->cnic_number == null || $roamer->cnic_front_img == null || $roamer->cnic_back_img == null || $roamer->account_title == null || $roamer->account_number == null || $roamer->bank_name == null || $roamer->IBAN == null) {

                return redirect(route('accounts.index'));
            } else if (count($roamer->vendors) == 0) {
                return redirect(route('vendors.index'));
            }
        }
    }
}
