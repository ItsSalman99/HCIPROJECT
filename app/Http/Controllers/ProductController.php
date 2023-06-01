<?php

namespace App\Http\Controllers;

use App\Models\Attribute as ModelsAttribute;
use App\Models\AttributeOption;
use App\Models\Brand;
use App\Models\Category;
use App\Models\City;
use App\Models\Product;
use App\Models\ProductTag;
use App\Models\ProductVariation;
use App\Models\SubCategory;
use App\Models\User;
use App\Models\Vendor;
use App\Models\Warranty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Alert;
use App\Models\Notification;

class ProductController extends Controller
{
    public function index()
    {
        if (Auth::user()->user_type == 2) {

            if (checkRoamerVendors(Auth::user()->id) != false || checkRoamerVendors(Auth::user()->id) != true) {
                // dd('asdasd');
                if (checkRoamerVendors(Auth::user()->id)) {
                    return checkRoamerVendors(Auth::user()->id);
                }
            }
        }
        $roamers = User::where([['user_type', 2], ['email_verified_at', '!=', NULL]])->get();
        $vendors = [];
        if (Auth::user()->user_type == 1) {
            $product = Product::get();
            $vendors = Vendor::get();
            // dd($product);
            return view('Admin.manage-product', compact('product', 'roamers', 'vendors'));
        } else if (Auth::user()->user_type == 2) {

            $product = Product::where('user_id', '=', Auth::user()->id)->get();
            $vendors = Vendor::where('roamer_id', '=', Auth::user()->id)->get();

            return view('Admin.manage-product', compact('product', 'roamers', 'vendors'));
        }
    }

    public function create()
    {
        if (Auth::user()->user_type == 2) {

            if (checkRoamerVendors(Auth::user()->id) != false || checkRoamerVendors(Auth::user()->id) != true) {
                // dd('asdasd');
                if (checkRoamerVendors(Auth::user()->id)) {
                    return checkRoamerVendors(Auth::user()->id);
                }
            }
        }
        $user = User::where('user_type', '=', 2)->get();
        $category = Category::get();
        $attributes = ModelsAttribute::get();
        // dd($attributes);
        $subcategory = SubCategory::get();
        $brand = Brand::get();
        $warranty = Warranty::all();

        $roamer_vendors = [];

        if (Auth::user()->user_type == 2) {
            $roamer_vendors = Vendor::where('roamer_id', Auth::user()->id)->get();
        }


        return view('Admin.addProduct', compact('user', 'category', 'attributes', 'brand', 'subcategory', 'warranty', 'roamer_vendors'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // dd(count($request->tags));
        if (Auth::user()->user_type == 2) {
            $vendor = Auth::user()->id;
        }
        //Product Data
        $data = [
            'name' => $request->name,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->subcategory_id != 0 ? $request->subcategory_id : '',
            'user_id' => $request->roamer_id ?? $vendor,
            'vendor_id' => $request->vendor_id,
            'brand_id' => @$request->brand_id,
            'short_description' => @$request->short_description,
            'urdu_description' => @$request->urdu_description,
            'english_description' => @$request->english_description,
            'box_include' => @$request->box_include,
            'slug' => $this->str_slug($request->name),
            'product_type' => $request->product_type,
            'flash_sale' => $request->flash_sale == true ? 1 : 0,

            'warranty_id' => $request->warranty_name,
            'pkg_weight' => $request->pkg_weight,
            'length' => $request->length,
            'width' => $request->width,
            'height' => $request->height,

            'new_arrivals' => $request->new_arrivals == true ? 1 : 0,
            'top_seller' => $request->top_seller == true ? 1 : 0,
            'sku' => $request->sku
        ];
        // dd($data);
        // dd($request->productimage4->getClientOriginalName());
        //Porduct Images
        if ($request->file('productimage1')) {
            $fileName = $request->productimage1->getClientOriginalName() . '_product_' . strtotime("now") . '.' . $request->productimage1->extension();
            $file = $request->file('productimage1');
            $destinationPath = public_path() . '/images/product';
            $file->move($destinationPath, $fileName);
            $data['image1'] = '/images/product/' . $fileName;
        }
        if ($request->file('productimage2')) {
            $fileName = $request->productimage2->getClientOriginalName() . '_product_' . strtotime("now") . '.' . $request->productimage2->extension();
            $file = $request->file('productimage2');
            $destinationPath = public_path() . '/images/product';
            $file->move($destinationPath, $fileName);
            $data['image2'] = '/images/product/' . $fileName;
        }
        if ($request->file('productimage3')) {
            $fileName = $request->productimage3->getClientOriginalName() . '_product_' . strtotime("now") . '.' . $request->productimage3->extension();
            $file = $request->file('productimage3');
            $destinationPath = public_path() . '/images/product';
            $file->move($destinationPath, $fileName);
            $data['image3'] = '/images/product/' . $fileName;
        }
        if ($request->file('productimage4')) {
            $fileName = $request->productimage4->getClientOriginalName() . '_product_' . strtotime("now") . '.' . $request->productimage4->extension();
            $file = $request->file('productimage4');
            $destinationPath = public_path() . '/images/product';
            $file->move($destinationPath, $fileName);
            $data['image4'] = '/images/product/' . $fileName;
        }
        if ($request->file('productimage5')) {
            $fileName = $request->productimage5->getClientOriginalName() . '_product_' . strtotime("now") . '.' . $request->productimage5->extension();
            $file = $request->file('productimage5');
            $destinationPath = public_path() . '/images/product';
            $file->move($destinationPath, $fileName);
            $data['image5'] = '/images/product/' . $fileName;
        }

        // dd($data);
        //If product is Varient
        if ($request->product_type == 1) {
            $data['price'] = $request->product_price;
            $data['varient_attr'] = json_encode($request->variant_style);
            // dd($data);
            // dd(json_encode($request->variant_style));
            // dd($data['varient_attr']);
            // dd($data);
            $product = Product::create($data);
            $var_data = [];
            foreach ($request->price as $k => $p) {
                foreach ($request->variant_style as $attr_id) {
                    $arr_option[$attr_id] = $request->$attr_id[$k];
                }
                // dd($arr_option);
                $var_data[] = [
                    'product_id' => $product->id,
                    'in_stock' => 1,
                    'options' => json_encode($arr_option),
                    'price' => @$request->price[$k],
                    's_price' => @$request->s_price[$k],
                    'p_price' => @$request->p_price[$k],
                    'qty' => @$request->qty[$k],
                    'seller_sku' => @$request->sku[$k]
                ];
                // dd($var_data);
            }
            ProductVariation::insert($var_data);

            return redirect()->route('products.index');
        } else {
            $data['price'] = $request->unit_price;
            $data['s_price'] = $request->unit_s_price;
            $data['p_price'] = $request->unit_p_price;
            $data['qty'] = $request->unit_qty;
            // dd($data);
            $product = Product::create($data);
        }

        foreach ($request->tags as $key => $value) {
            // dd($value);
            $tag = ProductTag::create([
                'name' => $value,
                'product_id' => $product->id
            ]);
        }
        if (Auth::user()->user_type == 1) {

            Notification::create([
                'title' => 'New Product Has Been Created By Admin!!',
                'body' => 'New Product Has Been Created By Admin!!',
                'user_id' => Auth::user()->id
            ]);

            Notification::create([
                'title' => 'New Product Has Been Created By Admin!!',
                'body' => 'New Product Has Been Created By Admin!!',
                'user_id' => $request->roamer_id
            ]);
        } else {
            $admin = User::where('user_type', 1)->first();

            Notification::create([
                'title' => 'New Product Has Been Created!!',
                'body' => 'New Product Has Been Created!!',
                'user_id' => $admin->id
            ]);
            Notification::create([
                'title' => 'New Product Has Been Created!!',
                'body' => 'New Product Has Been Created!!',
                'user_id' => $request->roamer_id
            ]);
        }

        Alert::success('Product Created Successfully!');

        return redirect()->route('products.index');
    }

    public function change_stock_status($id)
    {
        $vendor = Product::where('id', $id)->first();
        if ($vendor->in_stock == 1) {
            $vendor->in_stock = 0;
        } else {
            $vendor->in_stock = 1;
        }

        $vendor->save();


        return response()->json([
            'status' => 200,
            'title' => 'Product status has been  changed',
            'text' => 'Product status has been changed successfully!'
        ]);
    }

    public function getDetails($id)
    {

        $product = Product::where('id', $id)->first();

        return response()->json([
            'status' => 200,
            'product' => $product,
            'vendor' => $product->user
        ]);
    }

    public function getProductsByRoamer($roamer)
    {

        $vendors = Vendor::get();

        $roamers = User::where([['user_type', 2], ['email_verified_at', '!=', NULL]])->get();
        $roamerId = $roamer;

        if ($roamer != 0) {
            # code...
            $product = Product::where('user_id', $roamer)->get();

            // dd($product);
            return view('Admin.manage-product', compact('product', 'roamers', 'vendors', 'roamerId'));
        } else if ($roamer == 0) {
            return redirect()->route('products.index');
        }
    }


    public function getProductsByVendor($vendor)
    {
        $vendors = Vendor::get();

        $roamers = User::where([['user_type', 2], ['email_verified_at', '!=', NULL]])->get();
        $vendorId = $vendor;

        if ($vendor != 0) {
            # code...
            $product = Product::where('vendor_id', $vendor)->get();

            // dd($product);
            return view('Admin.manage-product', compact('product', 'roamers', 'vendors', 'vendorId'));
        } else if ($vendor == 0) {

            return redirect()->route('products.index');
        }
    }


    public function edit($id)
    {
        $product = Product::where('id', $id)->with('tags')->first();
        $user = User::where('user_type', '=', 2)->get();
        $category = Category::get();
        $attributes = ModelsAttribute::where('is_active', 1)->get();
        $subcategory = SubCategory::get();
        $brand = Brand::get();
        $warranty = Warranty::all();

        $tags = ProductTag::where('product_id', $product->id)->get();

        $roamer_vendors = [];

        if (Auth::user()->user_type == 1) {
            $roamer_vendors = Vendor::all();
        } else if (Auth::user()->user_type == 2) {
            $roamer_vendors = Vendor::where('roamer_id', Auth::user()->id)->get();
        }

        return view('Admin.editProduct', compact('product', 'tags', 'user', 'category', 'attributes', 'subcategory', 'brand', 'warranty', 'roamer_vendors'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $product = Product::where('id', $id)->first();

        if (Auth::user()->user_type == 2) {
            $vendor = Auth::user()->id;
        }
        //Product Data
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->subcategory_id;
        $product->vendor_id = $request->vendor_id;
        $product->brand_id = @$request->brand_id;
        $product->short_description = @$request->short_description;
        $product->urdu_description = @$request->urdu_description;
        $product->english_description = @$request->english_description;
        $product->box_include = @$request->box_include;
        $product->slug = $this->str_slug($request->name);
        $product->product_type = $request->product_type;
        $product->flash_sale = $request->flash_sale == true ? 1 : 0;

        $product->warranty_id = $request->warranty_name;
        $product->pkg_weight = $request->pkg_weight;
        $product->length = $request->length;
        $product->width = $request->width;
        $product->height = $request->height;

        $product->new_arrivals = $request->new_arrivals == true ? 1 : 0;
        $product->top_seller = $request->top_seller == true ? 1 : 0;
        $product->user_id = $vendor ?? $request->roamer_id;
        $product->warranty_id = $request->warranty_name;

        //Porduct Images
        if ($request->file('productimage1')) {
            $fileName = $request->name . '_product_' . strtotime("now") . '.' . $request->productimage1->extension();
            $file = $request->file('productimage1');
            $destinationPath = public_path() . '/images/product';
            $file->move($destinationPath, $fileName);
            $data['image1'] = '/images/product/' . $fileName;
            $product->image1 = $data['image1'];
        }
        if ($request->file('productimage2')) {
            $fileName = $request->name . '_product_' . strtotime("now") . '.' . $request->productimage2->extension();
            $file = $request->file('productimage2');
            $destinationPath = public_path() . '/images/product';
            $file->move($destinationPath, $fileName);
            $data['image2'] = '/images/product/' . $fileName;
            $product->image2 = $data['image2'];
        }
        if ($request->file('productimage3')) {
            $fileName = $request->name . '_product_' . strtotime("now") . '.' . $request->productimage3->extension();
            $file = $request->file('productimage3');
            $destinationPath = public_path() . '/images/product';
            $file->move($destinationPath, $fileName);
            $data['image3'] = '/images/product/' . $fileName;
            $product->image3 = $data['image3'];
        }
        if ($request->file('productimage4')) {
            $fileName = $request->name . '_product_' . strtotime("now") . '.' . $request->productimage4->extension();
            $file = $request->file('productimage4');
            $destinationPath = public_path() . '/images/product';
            $file->move($destinationPath, $fileName);
            $data['image4'] = '/images/product/' . $fileName;
            $product->image4 = $data['image4'];
        }
        if ($request->file('productimage5')) {
            $fileName = $request->name . '_product_' . strtotime("now") . '.' . $request->productimage5->extension();
            $file = $request->file('productimage5');
            $destinationPath = public_path() . '/images/product';
            $file->move($destinationPath, $fileName);
            $data['image5'] = '/images/product/' . $fileName;
            $product->image5 = $data['image5'];
        }

        // If product is Varient
        if ($request->product_type == 1) {

            $product->price = "";
            $product->s_price = "";
            $product->p_price = "";
            $product->qty = "";

            if ($request->variant_style != null) {
                $product_variant = json_decode($product->varient_attr);

                $merge_variant = array_merge($product_variant, $request->variant_style);

                $new_variant = json_encode($merge_variant);

                $product->varient_attr = $new_variant;

                $variant = new ProductVariation();
                $variant->product_id = $id;

                if (isset($request->variant_style)) {
                    foreach ($request->variant_style as $k => $attr_id) {
                        $arr_option[$attr_id] = $request->$attr_id[$k];
                    }

                    $variant->options = json_encode($arr_option);
                }

                // dd(json_encode($arr_option));

                if (isset($request->price)) {
                    foreach ($request->price as $key => $value) {
                        // dd($value);
                        $variant->price = $value;
                    }
                }
                if (isset($request->s_price)) {
                    foreach ($request->s_price as $key => $value) {
                        $variant->s_price = $value;
                    }
                }
                if (isset($request->s_price)) {
                    foreach ($request->p_price as $key => $value) {
                        $variant->p_price = $value;
                    }
                }
                if (isset($request->qty)) {
                    foreach ($request->qty as $key => $value) {
                        $variant->qty = $value;
                    }
                }
                if (isset($request->sku)) {
                    foreach ($request->sku as $key => $value) {
                        $variant->seller_sku = $value;
                    }
                }

                $variant->save();
            }
        } else {
            $product->price = $request->unit_price;
            $product->s_price = $request->unit_s_price;
            $product->p_price = $request->unit_p_price;
            $product->qty = $request->unit_qty;

            $product->varient_attr = NULL;
            // dd($data);
            $product->save();
        }



        $product->save();

        if (isset($request->tags) && count($request->tags) != 0) {
            foreach ($request->tags as $key => $value) {
                $tag = ProductTag::create([
                    'name' => $value,
                    'product_id' => $product->id
                ]);
            }
        }

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    //Extra Functions
    public function get_attribute_option(Request $request)
    {

        $ids = $request->data;

        $body = '<table id="tbsku" class="table table-v1 align-middle" ><thead><tr>';
        $body_ad = '';
        foreach ($request->data as $key => $value) {
            $attribute = ModelsAttribute::where("id", $value)->where("is_active", 1)->first();

            $body .= '<th class="' . $attribute->label . '">' . $attribute->label . '</th>';
        }
        $body .= '<th>Price</th><th>Procurement Price</th><th>Special Price</th><th>Quantity</th><th>SellerSKU</th><th>&nbsp;</th></tr></thead><tbody id="tablearea"><tr>';

        foreach ($request->data as $key => $value) {
            $attribute = ModelsAttribute::where("id", $value)->where("is_active", 1)->first();
            $body .= '<td class="color_range"><select name="' . $attribute->id . '[]" id="" class="form-control select-box-tags" >';
            $body_ad .= '<td class="color_range"><select name="' . $attribute->id . '[]" id="" class="form-control select-box-tags" >';

            $break = explode(",", $attribute->stock);
            foreach ($break as $key => $val) {
                $body .= '<option value="' . $val . '">' . $val . '</option>';
                $body_ad .= '<option value="' . $val . '">' . $val . '</option>';
            }
            $body .= '</select></td>';
            $body_ad .= '</select></td>';
        }

        $body .= '<td><input type="text" class="form-control uPrice" id="uPrice" data-id="uPrice" onkeyup="changeValidateprice(event)" name="price[]"  placeholder="-- / --"></td>';
        $body .= '<td><input type="text" class="form-control pPrice" id="pPrice" onkeyup="changeValidateprice(event)" name="p_price[]"  placeholder="------"></td>';
        $body .= '<td><input type="text" class="form-control" name="s_price[]" id="spPrice"  placeholder="-- / --"></td>';
        $body .= '<td><input type="text" class="form-control" name="qty[]"  placeholder="------"></td>';
        $body .= '<td><input type="text" class="form-control" class="sku" name="sku[]"  placeholder="Automatic"></td></tr>';

        $body_ad .= '<td><input type="text" class="form-control uPrice" id="uPrice" onkeyup="changeValidateprice(event)" name="price[]"  placeholder="-- / --"></td>';
        $body_ad .= '<td><input type="text" class="form-control pPrice" id="pPrice" onkeyup="changeValidateprice(event)" name="p_price[]"  placeholder="------"></td>';
        $body_ad .= '<td><input type="text" class="form-control" name="s_price[]" id="spPrice"  placeholder="-- / --"></td>';
        $body_ad .= '<td><input type="text" class="form-control" name="qty[]"  placeholder="------"></td>';
        $body_ad .= '<td><input type="text" class="form-control" class="sku" name="sku[]" placeholder="Automatic"></td>';
        $body_ad .= '<td><ul><li><a href="javascript:void(0)" class="deleterow default-anchor"><i class="bi bi-trash"></i></a></li></ul></td>';

        $body .= '</tbody></table>';

        $data['body'] = $body;
        $data['body_ad'] = $body_ad;

        $data['status'] = 1;
        $data['msg'] = "Find.";

        return json_encode($data);
    }

    //helper
    public function str_slug($title, $separator = '-', $language = 'en')
    {
        return Str::slug($title, $separator, $language);
    }
    public function get_varientDetail($id, Request $request)
    {
        $op = $request->toArray();
        $vari = DB::table('product_variations')->where('product_id', $id)
            ->whereJsonContains('options', $op)->first();
        if ($vari) {
            // foreach($sub as $s){
            //     $html.='<option value="'.$s->id.'">'.$s->name.'</option>';
            // }
            $data['success'] = true;
            $data['data'] = $vari;
            return response()->json($data);
        } else {
            $data['success'] = false;
            // $data['data']=$html;
            return response()->json($data);
        }
    }

    public function search(Request $request)
    {
        $cities = City::all();


        $data = Product::where('name', "like", "%" . $request->search . "%")
            ->with('category')->paginate(9);

        if (count($data) == 0) {
            # code...
            $tag = ProductTag::where('name', "like", "%" . $request->search . "%")->first();

            if ($tag) {
                $data = Product::where('id', $tag->product_id)
                    ->with('category')->paginate(9);
            }
            // dd($tag);
        }

        // dd($data);

        $category = '';
        $sub_category = [];
        // dd($data);
        $brandId = [];
        $categoryId = [];

        foreach ($data as $product) {
            array_push($categoryId, $product->category_id);
        }
        $categories = Category::whereHas('products', function ($q) use ($categoryId) {
            $q->whereIn('category_id', $categoryId);
        })->get();

        foreach ($data as $product) {
            array_push($brandId, $product->brand_id);
        }
        $brands = Brand::whereHas('products', function ($q) use ($brandId) {
            $q->whereIn('brand_id', $brandId);
        })->get();

        // dd(count($data));
        return view('Front.product-grid', compact('data', 'brands', 'cities', 'category', 'categories', 'sub_category'));
    }

    //to get price by selected variant
    public function getPriceByVariant($id)
    {

        $variant = ProductVariation::where('id', $id)->first();

        return response()->json([
            'status' => 200,
            's_price' => $variant->s_price,
            'price' => $variant->price,
        ]);
    }

    public function getByFlashSale()
    {

        $brands = Brand::all();
        $cities = City::all();
        $categories = Category::all();
        $data = Product::where('flash_sale', 1)->with('category')->paginate(9);

        $category = [];
        $sub_category = [];

        return view('Front.product-grid', compact('data', 'brands', 'cities', 'category', 'categories', 'sub_category'));
    }

    public function getByTopSellers()
    {

        $brands = Brand::all();
        $cities = City::all();

        $categories = Category::all();

        $data = Product::where('top_seller', 1)->with('category')->paginate(9);

        $category = [];
        $sub_category = [];

        return view('Front.product-grid', compact('data', 'brands', 'cities', 'category', 'categories', 'sub_category'));
    }

    public function getByNewArrivals()
    {

        $brands = Brand::all();
        $cities = City::all();
        $categories = Category::all();

        $data = Product::where('new_arrivals', 1)->with('category')->paginate(9);

        $category = [];
        $sub_category = [];

        return view('Front.product-grid', compact('data', 'brands', 'cities', 'category', 'categories', 'sub_category'));
    }

    public function getVariant($id)
    {

        $variant = ProductVariation::where('id', $id)->first();

        return response()->json([
            'status' => true,
            'data' => $variant
        ]);
    }

    public function updateVariant(Request $request)
    {

        $variant = ProductVariation::where('id', $request->id)->first();

        $variant->price = $request->vprice;
        $variant->s_price = $request->vsprice;
        $variant->p_price = $request->vpprice;
        $variant->qty = $request->vquantity;

        $variant->save();

        return response()->json([
            'status' => true,
            'msg' => "Updated Successfully!"
        ]);
    }


    public function getVendor($id)
    {
        $vendor = Vendor::where('roamer_id', $id)->get();

        return response()->json([
            'status' => true,
            'data' => $vendor
        ]);
    }

    public function productByVendor($id)
    {
        $data = Product::where('vendor_id', $id)->with('varients')->get();

        return response()->json([
            'status' => true,
            'data' => $data
        ]);
    }

    public function editProduct(Request $request, $id)
    {
        $product = Product::where('id', $id)->first();

        $product->name = $request->name;

        if($request->flash_sale =="on")
        {
            $product->flash_sale = 1;
        }
        else{
            $product->flash_sale = 0;
        }
        if($request->top_seller =="on")
        {
            $product->top_seller = 1;
        }
        else{
            $product->top_seller = 0;
        }
        if($request->new_arrivals =="on")
        {
            $product->new_arrivals = 1;
        }
        else{
            $product->new_arrivals = 0;
        }
        $product->qty = $request->qty;

        $product->save();

        Alert::success("Product updated successfully!", 'success');

        return redirect()->back();

        // return response()->json([
        //     'status' => true,
        //     'data' => $request->all()
        // ]);

    }

}
