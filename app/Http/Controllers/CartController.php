<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\Shipment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use function PHPSTORM_META\type;

class CartController extends Controller
{

    public function addToCart(Request $request)
    {
        //Get Cart By UUID
        $Cartt = Cart::where('uuid', sessionID())->first();

        //Explode variant_ID
        $variantID = explode(",", $request->variant_ID);

        if ($Cartt) { // if cart already exists

            //check cart item
            $check = CartItem::where('cart_id', $Cartt->id)
                ->where('product_id', $request->p_id)
                ->where('variant_id', $request->variant_ID)
                ->first();


            if ($check == null) { //if that item does not exist

                if ($variantID[0] != "0") { //if coming item has variant

                    //loop on variant
                    foreach ($variantID as $variant_id) {
                        $variant = ProductVariation::where('id', $variant_id)->first();
                        $Cart = Cart::where('uuid', session()->getId())->first();
                        if (!$Cart) {
                            $Cart = Cart::create([
                                'uuid' => session()->getId(),
                                'total' => $request->qty * $variant->price,
                            ]);
                        } else {
                            $Cart->total = $Cart->total + $request->qty * $variant->price;
                            $Cart->save();
                        }
                        $cart = CartItem::create([
                            'cart_id' => $Cart->id,
                            'roamer_id' => $request->roamerId,
                            'vendor_id' => $request->vendorId,
                            'product_id' => $request->p_id,
                            'qty' => $request->qty,
                            'price' => $variant->price,
                            'variant_id' => $variant->id
                        ]);
                    }
                } else {
                    $CartItem = CartItem::where('cart_id', $Cartt->id)
                    ->where('product_id', $request->p_id)->first();
                    if (!$CartItem) {
                        $cart = CartItem::create([
                            'cart_id' => $Cartt->id,
                            'roamer_id' => $request->roamerId,
                            'vendor_id' => $request->vendorId,
                            'product_id' => $request->p_id,
                            'qty' => $request->qty,
                            'price' => $request->price,
                        ]);

                        $Cartt->total += $request->qty * $request->price;
                        $Cartt->save();
                    } else {

                        $CartItem->qty += $request->qty;
                        $CartItem->save();

                        $Cartt->total += $request->qty * $request->price;
                        $Cartt->save();
                    }


                }
            } else {
                if ($variantID[0] != "0") {

                    $cartCheck = CartItem::whereIn('variant_id', $variantID)->first();

                    if ($cartCheck != null) {

                        foreach ($variantID as $variant_id) {

                            $variant = ProductVariation::where('id', $variant_id)->first();
                            $cart = CartItem::where('variant_id', $variant_id)->first();
                            $cart->qty += $request->qty;
                            $cart->price = $variant->price;
                            $cart->save();

                            $Cart = Cart::where('id', $cartCheck->cart_id)->first();

                            $Cart->total = $Cart->total + $request->qty * $variant->price;
                            $Cart->save();
                        }
                    } else {
                        foreach ($variantID as $variant_id) {
                            $variant = ProductVariation::where('id', $variant_id)->first();

                            $Cart = Cart::where('uuid', session()->getId())->first();

                            if (!$Cart) {
                                $Cart = Cart::create([
                                    'uuid' => session()->getId(),
                                    'total' => $request->qty * $variant->price,
                                ]);
                            } else {
                                $Cart->total += $request->qty * $variant->price;
                                $Cart->save();
                            }

                            $cart = CartItem::create([
                                'roamer_id' => $request->roamerId,
                                'vendor_id' => $request->vendorId,
                                'product_id' => $request->p_id,
                                'qty' => $request->qty,
                                'price' => $variant->price,
                                'variant_id' => $variant->id
                            ]);
                        }
                    }
                } else {
                    $check->qty += 1;
                    $check->price = $request->price;

                    $Cart = Cart::where('id', $check->cart_id)->first();

                    $Cart->total = $Cart->total + $request->price;

                    $Cart->save();
                    $check->save();
                }
            }

            // $check->save();
        } else {

            if ($variantID[0] != "0") {

                foreach ($variantID as $variant_id) {
                    $variant = ProductVariation::where('id', $variant_id)->first();
                    $mycart = Cart::where('uuid', session()->getId())->first();
                    if ($mycart == null) {
                        $mycart = Cart::create([
                            'uuid' => session()->getId(),
                            'total' => $request->qty * $variant->price,
                        ]);
                    } else {
                        $mycart = Cart::where('uuid', session()->getId())
                            ->first();
                        $mycart->total = $mycart->total + $request->qty * $variant->price;
                        $mycart->save();
                    }

                    $cartItem = CartItem::create([
                        'cart_id' => $mycart->id,
                        'roamer_id' => $request->roamerId,
                        'vendor_id' => $request->vendorId,
                        'product_id' => $request->p_id,
                        'qty' => $request->qty,
                        'price' => $variant->price,
                        'variant_id' => $variant->id
                    ]);
                }
            } else {

                $mycart = Cart::where('uuid', session()->getId())->first();

                if ($mycart == null) {
                    $mycart = Cart::create([
                        'uuid' => session()->getId(),
                        'total' => $request->qty * $request->price,
                    ]);
                } else {
                    $mycart = Cart::where('uuid', session()->getId())
                        ->first();
                    $mycart->total = $mycart->total + $request->qty * $request->price;
                    $mycart->save();
                }
                $cartItem = CartItem::create([
                    'cart_id' => $mycart->id,
                    'roamer_id' => $request->roamerId,
                    'vendor_id' => $request->vendorId,
                    'product_id' => $request->p_id,
                    'qty' => $request->qty,
                    'price' => $request->price,
                ]);
            }
        }


        //Shipping Charges
        $shipping = Shipment::where('id', 1)->first();

        Session::put('shipping', $shipping->name);
        Session::put('shippingPrice', $shipping->price);

        $getCart = Cart::where('uuid', session()->getId())->first();

        $roamer_count = 0;

        session()->put('roamer_in_cart', $roamer_count);

        if ($getCart != null) {
            foreach ($getCart->cart_items as $key => $cartt) {

                if ($cartt->roamer_id != $request->roamerId) {
                    $roamer_count += 1;
                    session()->put('roamer_in_cart', $roamer_count);
                    $price = intval($shipping->price) + intval($shipping->price);
                    session()->put('shippingPrice', $price);
                }
            }
        }

        session()->save();


        return response()->json([
            'status' => 200,
            'title' => 'Product has been added into your cart',
            'text' => 'Product has been added into your cart successfully!',
        ]);

        // echo json_encode($data);
    }

    public function countCart()
    {
        $cart = Cart::all();
        // $count = count($cart);

        $count = 0;

        foreach ($cart as $key => $item) {
            $count += $item->qty;
        }

        return response()->json([
            'status' => 200,
            'count' => $count
        ]);
    }

    public function cartDetails()
    {
        $cart = Cart::all();


        $shipping_method = session()->get('shipping_method');
        $shipping_price = session()->get('shipping_price');

        return response()->json([
            'status' => 200,
            'cart' => getCart(),
            'shipping_method' => $shipping_method,
            'shipping_price' => $shipping_price
        ]);
    }

    public function deleteAllCart($id)
    {
        // return response()->json([
        //     'status' => 200,
        //     'data' => hasDifferentRoamer()
        // ]);

        $cart = CartItem::where('roamer_id', $id)->first();
        $Cart = Cart::where('id', $cart->cart_id)->first();

        $cartItems = CartItem::where('roamer_id', $id)->delete();
        // $cartItems->delete();

        $Cart->total = $Cart->total - $cart->price * $cart->qty;
        $Cart->save();

        // $cart->delete();
        hasDifferentRoamer();

        return response()->json([
            'status' => 200,
            'title' => 'Product has been removed from your cart',
            'text' => 'Product has been removed from your cart successfully!',
        ]);
    }

    public function deleteCart($id)
    {
        $cart = CartItem::where('id', $id)->first();
        $Cart = Cart::where('id', $cart->cart_id)->first();

        $cart->delete();
        $Cart->total = $Cart->total - $cart->price * $cart->qty;
        $Cart->save();


        hasDifferentRoamer();

        return response()->json([
            'status' => 200,
            'title' => 'Product has been removed from your cart',
            'text' => 'Product has been removed from your cart successfully!',
        ]);
    }


    public function cartHandle($id, $qty)
    {

        $cartitem = CartItem::where('id', $id)->first();
        $cart = Cart::where('id', $cartitem->cart_id)->first();

        if ($qty > 0) {

            if($qty > $cartitem->qty) {

                $cartitem->qty = $qty;
                $cartitem->save();
                $cart->total = $cart->total +  $cartitem->price;
            }
            else if($qty < $cartitem->qty) {
                $cartitem->qty = $qty;
                $cartitem->save();
                $cart->total = $cart->total -  $cartitem->price;
            }




            $cart->save();
        } else if ($qty == 0) {

            $cartitem->delete();
        }

        $getCart = Cart::all();
        $shipping = Shipment::where('id', 1)->first();
        $shipping_price = session()->get('shippingPrice');
        $flag = 0;
        if ($getCart != null) {
            foreach ($getCart as $key => $cartt) {

                if (User::where('user_type', 2)->where('id', $cartt->roamer_id)->exists()) {
                    $flag += 1;
                    if ($flag < 2) {
                        $price = $shipping->price;
                        session()->put('shippingPrice', $price);
                        session()->save();
                    }
                }
            }
        } else {
            session()->unset('shippingPrice');
        }

        return response()->json([
            'status' => $flag,
            'data' => $cart,
        ]);
    }



    private function set_cart($cartData)
    {
        return session()->put('cart', $cartData);
    }
}
