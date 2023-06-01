<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Alert;


class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.manage-categories')->with('categories', Category::get());
    }

    //Ajax for check bottom
    public function checkBottom($id, $checkCat = NULL)
    {
        if ($id != 0) {


            $sub_cat = SubCategory::where('id', $id)->first();

            if ($sub_cat->bottom == 1) {
                $sub_cat->bottom = 0;
            } else {
                $sub_cat->bottom = 1;
            }

            $sub_cat->save();

            return response()->json([
                'status' => 200,
                'title' => 'Bottom Status Changed!'
            ]);
        } else {
            return response()->json([
                'status' => 200,
                'title' => 'Something went wrong!'
            ]);
        }
    }

    public function checkAllBottom($id)
    {
        if ($id != 0) {


            $cat = Category::where('id', $id)->first();

            foreach ($cat->subcategory as $subcategory)
            {
                if ($subcategory->bottom == 1) {
                    $subcategory->bottom = 0;
                } else {
                    $subcategory->bottom = 1;
                }

                $subcategory->save();
            }


            return response()->json([
                'status' => 200,
                'title' => 'Bottom Status Changed!'
            ]);
        } else {
            return response()->json([
                'status' => 200,
                'title' => 'Something went wrong!'
            ]);
        }
    }

    public function changeActive($id)
    {
        if ($id != 0) {

            $sub_cat = SubCategory::where('id', $id)->first();

            if ($sub_cat->active == 1) {
                $sub_cat->active = 0;
            } else {
                $sub_cat->active = 1;
            }

            $sub_cat->save();

            return response()->json([
                'status' => 200,
                'title' => 'Active Status Changed!'
            ]);
        } else {
            $sub_cats = SubCategory::all();

            foreach ($sub_cats as $key => $sub_cat) {
                # code...
                if ($sub_cat->active == 1) {
                    $sub_cat->active = 0;
                } else {
                    $sub_cat->active = 1;
                }
                $sub_cat->save();
            }


            return response()->json([
                'status' => 200,
                'title' => 'All Sub Categories Active Status Changed!'
            ]);
        }
    }


    //ajax
    public function get_subcategory($id)
    {
        $sub = SubCategory::where('category_id', $id)->get();
        $html = '';
        if ($sub) {
            foreach ($sub as $s) {
                $html .= '<option value="' . $s->id . '">' . $s->name . '</option>';
            }
            $data['success'] = true;
            $data['data'] = $html;
            return response()->json($data);
        } else {
            $data['success'] = false;
            $data['data'] = $html;
            return response()->json($data);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->sub_category)));
        $image = '';
        if ($request->file('image')) {
            $fileName = $request->name . '_logo_' . strtotime("now") . '.' . $request->image->extension();
            $file = $request->file('image');
            $destinationPath = public_path() . '/assets/images/subcategories/';
            $file->move($destinationPath, $fileName);
            $image = '/assets/images/subcategories/' . $fileName;
        }
        SubCategory::Create([
            'category_id' => @$request->category_id,
            'slug' => @$slug,
            'name' => @$request->sub_category,
            'image' => @$image,
            'active' => 1,
            'bottom' => @$request->bottom,
            'percentage' => $request->percentage
        ]);
        return redirect()->back();
    }

    public function edit($id)
    {

        $subcategory = SubCategory::where('id', $id)->with('category')->first();
        $categories = Category::all();

        return response()->json([
            'status' => true,
            'data' => $subcategory,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, $id)
    {
        $subcategory = SubCategory::where('id', $id)->first();

        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->sub_category)));
        $image = '';
        if ($request->file('image')) {
            $fileName = $request->name . '_logo_' . strtotime("now") . '.' . $request->image->extension();
            $file = $request->file('image');
            $destinationPath = public_path() . '/assets/images/subcategories/';
            $file->move($destinationPath, $fileName);
            $image = '/assets/images/subcategories/' . $fileName;
        }

        $subcategory->category_id = @$request->category_id;
        $subcategory->slug = @$slug;
        $subcategory->name = @$request->sub_category;
        $subcategory->image = @$image;
        $subcategory->active = 1;
        $subcategory->bottom = @$request->bottom;
        $subcategory->percentage = $request->percentage;

        $subcategory->save();

        Alert::success("Sub Category Updated Successfully!", "Sub-category has been updated!");

        return redirect()->back();
    }
}
