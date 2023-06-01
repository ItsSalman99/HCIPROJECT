<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\City;
use App\Models\Province;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Alert;
use App\Models\SubCategory;

class MainCategoryController extends Controller
{
    public function catlogIndex()
    {
        $catlog = Category::orderBy('seq_no')->get();
        // dd($catlog);
        return view('Admin.maincategory', compact('catlog'));
    }

    public function searchCategory($name)
    {
        if ($name != "undefined") {
            # code...
            $categories = Category::where('name', 'like', '%' . $name . '%')->get();


            return response()->json([
                'status' => 200,
                'categories' => $categories,
            ]);
        } else if ($name == "undefined") {

            return response()->json([
                'status' => 200,
                'categories' => Category::all(),
            ]);
        }
    }

    public function createCatlog(Request $request)
    {
        $catlog = new Category;
        $catlog->name = $request->name;
        $catlog->slug = Str::slug($request->name);
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move('storage/catlog/', $filename);
            $catlog->image = $filename;
        }
        $catlog->seq_no = $request->seq_no;
        $catlog->active = $request->status == true ? 1 : 0;
        $catlog->percentage = $request->percentage;
        $catlog->save();
        return redirect()->back();
    }

    public function editCatalog($id)
    {

        $category = Category::where('id', $id)->first();

        return response()->json([
            'status' => true,
            'data' => $category
        ]);
    }

    public function updateCatalog(Request $request, $id)
    {
        // dd($request->all());
        $catlog = Category::where('id', $id)->first();

        $catlog->name = $request->name;
        $catlog->slug = Str::slug($request->name);
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move('storage/catlog/', $filename);
            $catlog->image = $filename;
        }
        $catlog->seq_no = $request->seq_no;
        $catlog->active = $request->status == true ? 1 : 0;
        $catlog->percentage = $request->percentage;
        $catlog->save();

        Alert::success("Category Updated!", "Category has been updated!");

        return redirect()->back();
    }

    public function changeActive($id)
    {
        if ($id != 0) {

            $cat = Category::where('id', $id)->first();

            if ($cat->active == 1) {
                $cat->active = 0;
            } else {
                $cat->active = 1;
            }

            $cat->save();

            return response()->json([
                'status' => 200,
                'title' => 'Active Status Changed!'
            ]);
        } else {
            return response()->json([
                'status' => 200,
                'title' => 'Something went wrong!'
            ]);
        }
    }

    public function cityIndex()
    {
        $city = City::all();
        return view('Admin.manageProvinceandCity', compact('city'));
    }

    public function cityCreate()
    {
        $Province =  Province::all();
        return view('Admin.addCity', compact('Province'));
    }

    public function cityStore(Request $request)
    {
        // dd($request->all());
        $city = new City;
        $city->province_id = $request->province_id;
        $city->city_name = $request->c_name;
        $city->save();
        return redirect()->back();
    }

    public function provinceStore(Request $request)
    {
        // dd($request->all());
        $province = new Province;
        $province->province_name = $request->p_name;
        $province->save();
        return redirect()->back();
    }

    public function searchCity($name)
    {
        if ($name != "undefined") {
            # code...
            $cities = City::where('city_name', 'like', '%' . $name . '%')->with('province')->get();


            return response()->json([
                'status' => 200,
                'cities' => $cities,
            ]);
        } else if ($name == "undefined") {

            return response()->json([
                'status' => 200,
                'cities' => City::with('province')->get(),
            ]);
        }
    }

    public function calculatePercentagePrice($id, $subid = NULL, $price = NULL, $p_price = NULL)
    {

        if ($p_price == 0) {
            return response()->json([
                'status' => false,
                'data' => $price,
                'p_price' => "",
                'p_percentage' => '0 is not allowed!'
            ]);
        }

        if ($subid == NULL || $subid == 0 || $subid == "undefined") {

            $category = Category::where('id', $id)->first();

            if ($price != 0 && $p_price != 0 && $category->percentage != null) {

                //Percentage Of P_Price
                $percentage = ($p_price / $price) * $price;

                //percentage of price
                $p_percentage = ($category->percentage / 100) * $price;

                $result = $price - $percentage;

                if ($result >= $category->percentage) {
                    return response()->json([
                        'status' => true,
                        'percentage' => $percentage,
                    ]);
                } else {

                    $should = $p_percentage - $price;

                    return response()->json([
                        'status' => false,
                        'percentage' => $percentage,
                        'p_percentage' => abs($should)
                    ]);
                }
            }


            return response()->json([
                'status' => false,
                'p_price' => "Category Has Not Percentage Set!",
                'p_percentage' => 'Category Has Not Percentage Set'
            ]);
        } else {
            $category = Category::where('id', $id)->first();

            $sub_category = SubCategory::where('id', $subid)->first();

            if ($price != 0 && $p_price != 0 && $sub_category->percentage != 0) {

                //Percentage Of P_Price
                $percentage = ($p_price / $price) * $price;

                //percentage of price
                $p_percentage = ($sub_category->percentage / 100) * $price;

                $result = $price - $percentage;

                if ($result >= $sub_category->percentage) {
                    return response()->json([
                        'status' => true,
                        'percentage' => $percentage,
                    ]);
                } else {

                    $should = $p_percentage - $price;

                    return response()->json([
                        'status' => false,
                        'percentage' => $percentage,
                        'p_percentage' => abs($should)
                    ]);
                }
            } else {
                $percentage = ($p_price / $price) * $price;

                //percentage of price
                $p_percentage = ($category->percentage / 100) * $price;

                $result = $price - $percentage;

                if ($result >= $category->percentage) {
                    return response()->json([
                        'status' => true,
                        'percentage' => $percentage,
                    ]);
                } else {

                    $should = $p_percentage - $price;

                    return response()->json([
                        'status' => false,
                        'percentage' => $percentage,
                        'p_percentage' => abs($should)
                    ]);
                }
            }


            return response()->json([
                'status' => false,
                'p_price' => "Category Has Not Percentage Set!",
                'p_percentage' => 'Category Has Not Percentage Set'
            ]);
        }
    }

    public function delete($id)
    {
        $category = Category::where('id', $id)->first();

        $category->delete();


        Alert::success("Category Deleted Successfully!", "Category has been deleted successfully!");

        return redirect()->back();
    }

    public function getAll()
    {
        $categories = Category::all();

        return response()->json([
            'status' => true,
            'data' => $categories
        ]);

    }

}
