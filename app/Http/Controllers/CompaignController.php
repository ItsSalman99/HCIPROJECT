<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Compaign;
use App\Models\CompaignCategory;
use App\Models\CompaignProduct;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompaignController extends Controller
{
    public function compaign()
    {

        $compaign = Compaign::latest()->get();
        return view('Admin.campaign-management', compact('compaign'));
    }

    public function compaignCreate()
    {
        $category = Category::latest()->get();
        return view('Admin.add-campaign', compact('category'));
    }

    public function businessAdvisor()
    {
        return view('Admin.business-advisor');
    }

    public function compaignStore(Request $request)
    {
        $compaign = new Compaign;
        $compaign->compaign_name = $request->compaign_name;
        $compaign->compaign_start = $request->compaign_start;
        $compaign->compaign_end = $request->compaign_end;
        $compaign->registeration_start = $request->registeration_start;
        $compaign->registeration_end = $request->registeration_end;
        $compaign->off_percent = $request->off_percent;
        $compaign->fix_amount = $request->fix_amount;
        if ($request->file('banner_img1')) {
            $file = $request->file('banner_img1');
            $filename = $file->getClientOriginalName();
            $file->move('storage/compaign', $filename);
            $compaign->banner_img1 = $filename;
        }

        if ($request->file('banner_img2')) {
            $file2 = $request->file('banner_img2');
            $filename2 = $file->getClientOriginalName();
            $file2->move('storage/compaign', $filename2);
            $compaign->banner_img2 = $filename2;
        }

        $compaign->save();

        if ($request->category_id) {
            foreach ($request->category_id as $key => $value) {
                CompaignCategory::create([
                    'compaign_id' => $compaign->id,
                    'category_id' => $request->category_id[$key]
                ]);
            }
        } else {
            $categories =  Category::all();
            foreach ($categories as $key => $value) {
                CompaignCategory::create([
                    'compaign_id' => $compaign->id,
                    'category_id' => $value->id
                ]);
            }
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        $category = Category::latest()->get();
        $campaign = Compaign::where('id', $id)->first();

        return view('Admin.edit-campaign', compact('campaign', 'category'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $compaign = Compaign::where('id', $id)->first();
        // dd($campaign);
        $compaign->compaign_name = $request->compaign_name;
        $compaign->compaign_start = $request->compaign_start;
        $compaign->compaign_end = $request->compaign_end;
        $compaign->registeration_start = $request->registeration_start;
        $compaign->registeration_end = $request->registeration_end;
        $compaign->off_percent = $request->off_percent;
        $compaign->fix_amount = $request->fix_amount;
        if ($request->file('banner_img1')) {
            $file = $request->file('banner_img1');
            $filename = $file->getClientOriginalName();
            $file->move('storage/compaign', $filename);
            $compaign->banner_img1 = $filename;
        }

        if ($request->file('banner_img2')) {
            $file2 = $request->file('banner_img2');
            $filename2 = $file->getClientOriginalName();
            $file2->move('storage/compaign', $filename2);
            $compaign->banner_img2 = $filename2;
        }

        $compaign->save();

        if ($request->category_id) {
            foreach ($request->category_id as $key => $value) {
                CompaignCategory::create([
                    'compaign_id' => $compaign->id,
                    'category_id' => $request->category_id[$key]
                ]);
            }
        } else {
            $categories =  Category::all();
            foreach ($categories as $key => $value) {
                CompaignCategory::create([
                    'compaign_id' => $compaign->id,
                    'category_id' => $value->id
                ]);
            }
        }
        return redirect()->back();
    }

    public function joinCompaign($id)
    {
        $compaign = Compaign::find($id);

        $catId = [];
        foreach ($compaign->compaigncategory as $cat) {
            array_push($catId, $cat->category_id);
        }
        // dd($compaign->compaigncategory);
        $product =  Product::where('user_id', '=', Auth::user()->id)
            ->whereIn('category_id', $catId)
            ->get();

        $joinproduct = CompaignProduct::where('user_id', '=', Auth::user()->id)
            ->where('compaign_id', '=', $id)
            ->get();

        return view('Admin.join-compaign', compact('compaign', 'product', 'joinproduct'));
    }

    public function joinCompaignProduct(Request $request)
    {
        if ($request->product_id) {
            foreach ($request->product_id as $key => $value) {
                CompaignProduct::create([
                    'user_id' => $request->user_id,
                    'compaign_id' => $request->compaign_id,
                    'product_id' => $request->product_id[$key],
                    'product_status' => 'Pending'
                ]);
            }
        }

        return redirect()->back();
    }

    public function updateCompaignPrice($productId, $compaignId, $compaignPrice)
    {
        $compaign = Compaign::where('id', '=', $compaignId)->first();
        $product = Product::where('id', '=', $productId)->first();
        $disPrice = ($compaign->off_percent / 100) * $product->price;
        $result = $product->price - $disPrice;
        if ($compaignPrice <= $result) {
            $update = CompaignProduct::where('product_id', '=', $productId)->update([
                'compaign_price' => $compaignPrice
            ]);
            return response()->json([
                'status' => true
            ]);
        } else {
            return response()->json([
                'status' => false,
                'msg' => 'must be less than ' . $result . ' '
            ]);
        }
    }

    public function compaignApplicant($id)
    {
        $compaigns = Compaign::find($id);
        $compaign = CompaignProduct::where('compaign_id', '=', $id)
            ->groupBy('user_id')
            ->get();

        return view('Admin.dedicated-campaign', compact('compaign', 'compaigns'));
    }

    public function approveApplicant($userId, $productId)
    {
        $update = CompaignProduct::where('user_id', '=', $userId)->update([
            'product_status' => 'Approve'
        ]);
        return response()->json([
            'status' => true
        ]);
    }

    public function filterByDate(Request $request)
    {
        // dd($request->all());

        $compaign = Compaign::whereBetween('created_at', [$request->start_date, $request->end_date])->get();


        // dd($compaign);

        return view('Admin.campaign-management', compact('compaign'));
    }


    public function search($name)
    {
        $body = '';

        if ($name != "undefined") {
            # code...
            $compaign = Compaign::where('compaign_name', 'like', '%' . $name . '%')->get();


            foreach ($compaign as $key => $value) {
                $body .= '<div class="blog-v1 flex-lg-nowrap"><div class="cover-img"><img src="' . asset('storage/compaign/' . $value->banner_img1) . '" alt=""></div>' .
                    '<div class="blog-content d-flex align-items-center flex-wrap gap-5 justify-content-between mt-3 mt-md-0">' .
                    '<div class="flex-1"><div class="d-flex align-items-center flex-wrap gap-2"><p>' .
                    Carbon::parse($value->compaign_start)->format('F d, Y') . 'to' .
                    Carbon::parse($value->compaign_end)->format('F d, Y') . '</p></div>' .
                    '<ul><li><a href="campaign-detail.php" class="text-truncate">' . $value->compaign_name . '</a></li></ul><p class=" opacity-08">Minimum Discount:' .
                    $value->off_percent . '% on current price</p>' .
                    '<ul class="d-flex align-items-center flex-wrap gap-3 mt-3"><li class=" opacity-04">Products: ' . count($value->compaignproduct) . '</li></ul></div>' .
                    '<div class=" text-lg-end"><p class="mb-3">Registration Until: ' . Carbon::parse($value->registeration_end)->format('F d, Y') . '</p>' .
                    '<ul class="d-flex aling-items-center flex-wrap gap-2">' .
                    '<li><a href="https://bazaar.codeboxsolutions.com/admin/compaign/edit/' . $value->id . '" class=" btn btn-primary extra-btn-padding-35 text-uppercase font-weight-500">Edit</a></li>' .
                    '<li><a href="https://bazaar.codeboxsolutions.com/admin/compaign/' . $value->id . '/applicant" class="btn btn-primary extra-btn-padding-35 text-uppercase font-weight-500 primary-bg-clr-02 primary-text primary-border-clr-01">Applicants</a></li></ul></div></div></div>';
            }

            return response()->json([
                'status' => 200,
                'body' => $body
            ]);
        } else if ($name == "undefined") {

            $compaign = Compaign::all();

            foreach ($compaign as $key => $value) {
                $body .= '<div class="blog-v1 flex-lg-nowrap">' .
                    '<div class="cover-img"><img src="https://bazaar.codeboxsolutions.com/storage/compaign/1673875789-bar2.jpg" alt=""></div>' .
                    '<div class="blog-content d-flex align-items-center flex-wrap gap-5 justify-content-between mt-3 mt-md-0">' .
                    '<div class="flex-1"><div class="d-flex align-items-center flex-wrap gap-2"><p>February 09, 2023 to February 20, 2023</p></div>' .
                    '<ul><li><a href="campaign-detail.php" class="text-truncate">Essential Electronicss </a></li></ul><p class=" opacity-08">Minimum Discount: 10% on current price</p>' .
                    '<ul class="d-flex align-items-center flex-wrap gap-3 mt-3"><li class=" opacity-04">Products: 1</li></ul></div>' .
                    '<div class=" text-lg-end"><p class="mb-3">Registration Until: February 13, 2023</p>' .
                    '<ul class="d-flex aling-items-center flex-wrap gap-2">' .
                    '<li><a href="https://bazaar.codeboxsolutions.com/admin/compaign/edit/1" class=" btn btn-primary extra-btn-padding-35 text-uppercase font-weight-500">Edit</a></li>' .
                    '<li><a href="https://bazaar.codeboxsolutions.com/admin/compaign/1/applicant" class="btn btn-primary extra-btn-padding-35 text-uppercase font-weight-500 primary-bg-clr-02 primary-text primary-border-clr-01">Applicants</a></li>' .
                    '</ul></div></div></div>';
            }


            return response()->json([
                'status' => 200,
                'body' => $body
            ]);
        }
    }

    public function promotion()
    {
        if (Auth::user()->user_type == 2) {

            if(checkRoamerVendors(Auth::user()->id) != false || checkRoamerVendors(Auth::user()->id) != true)
            {
                // dd('asdasd');
                if(checkRoamerVendors(Auth::user()->id))
                {
                    return checkRoamerVendors(Auth::user()->id);
                }
            }
        }
        $compaign = Compaign::latest()->get();

        return view('Admin.join-promotions', compact('compaign'));
    }
}
