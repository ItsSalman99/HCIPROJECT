<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\User;
use App\Models\ResponseReview;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Alert;


class RatingController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());


        $customer = Session::get('customer');
        // dd($customer);


        $rating = new Rating();

        $rating->product_id = $request->productid;
        $rating->customer_id = $customer->id;
        $rating->rating = $request->rating;
        $rating->review = $request->review;

        $rating->save();

        toast('Review has been submitted','success');


        return redirect()->back();

    }

    public function reviewByRoamer($id)
    {
        
        if($id == 0){
            return redirect()->route('order.reviews');
        }

        $product = Product::where('user_id', $id)->first();
        $reviews= [];
        if($product)
        {
            $reviews = Rating::where('product_id', $product->id)->get();
        }

        $roamers = User::where('user_type', 2)->get();
        $roamerId = $id;

        return view('Admin.manage-review', compact('reviews', 'roamers', 'roamerId'));

    }

    public function storeResponse(Request $request)
    {
        // dd($request->all());
        $response = ResponseReview::create([
            'user_id' => $request->id,
            'rating_id' => $request->review_id,
            'response' => $request->response
        ]);


        toast('Response has been submitted','success');


        return redirect()->back();

    }

    public function viewResponse($id)
    {
        $response = ResponseReview::where('rating_id', $id)->first();

        return response()->json([
            'status' => true,
            'data' => $response
        ]);

    }

}
