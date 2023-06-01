<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Alert;
use App\Models\User;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        return view('Admin.manage-brand')->with('data', Brand::get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        return view('Admin.addNewBrand');
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
        $data['name'] = $request->name;
        if ($request->file('cover_image')) {
            $fileName = $request->name . '_cover_' . strtotime("now") . '.' . $request->cover_image->extension();
            $file = $request->file('cover_image');
            $destinationPath = public_path() . '/images/brand';
            $file->move($destinationPath, $fileName);
            $data['cover_image'] = '/images/brand/' . $fileName;
        }
        if ($request->file('image')) {
            $fileName = $request->name . '_logo_' . strtotime("now") . '.' . $request->image->extension();
            $file = $request->file('image');
            $destinationPath = public_path() . '/images/brand';
            $file->move($destinationPath, $fileName);
            $data['image'] = '/images/brand/' . $fileName;
        }
        Brand::create($data);

        foreach(User::all() as $users)
        {
            Notification::create([
                'title' => $request->name . ' brand has been added!',
                'body' =>  $request->name . ' brand has been added!',
                'user_id' => $users->id
            ]);
        }

        Alert::success('New Brand Added Successfully!', "New brand has been added successfully!");

        return redirect()->route('brands.index');
    }

    public function getBrands()
    {
        $brand = Brand::all();

        return response()->json([
            'status' => true,
            'data' => $brand
        ]);
    }

    public function storeBrand(Request $request)
    {
        $data['name'] = $request->name;
        if ($request->file('cover_image')) {
            $fileName = $request->name . '_cover_' . strtotime("now") . '.' . $request->cover_image->extension();
            $file = $request->file('cover_image');
            $destinationPath = public_path() . '/images/brand';
            $file->move($destinationPath, $fileName);
            $data['cover_image'] = '/images/brand/' . $fileName;
        }
        if ($request->file('image')) {
            $fileName = $request->name . '_logo_' . strtotime("now") . '.' . $request->image->extension();
            $file = $request->file('image');
            $destinationPath = public_path() . '/images/brand';
            $file->move($destinationPath, $fileName);
            $data['image'] = '/images/brand/' . $fileName;
        }

        $brand = Brand::create($data);

        return response()->json([
            'status' => true,
            'msg' => 'New Brand Created!!',
            'data' => $brand
        ]);
    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Admin.EditBrand')->with('data', Brand::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Brand::find($id);
        if ($data) {
            if ($request->file('cover_image')) {
                File::delete(public_path() . $data->cover_image);
                $fileName = $request->name . '_cover_' . strtotime("now") . '.' . $request->cover_image->extension();
                $file = $request->file('cover_image');
                $destinationPath = public_path() . '/images/brand';
                $file->move($destinationPath, $fileName);
                $data->cover_image = '/images/brand/' . $fileName;
            }
            if ($request->file('image')) {
                File::delete(public_path() . $data->image);
                $fileName = $request->name . '_logo_' . strtotime("now") . '.' . $request->image->extension();
                $file = $request->file('image');
                $destinationPath = public_path() . '/images/brand';
                $file->move($destinationPath, $fileName);
                $data->image = '/images/brand/' . $fileName;
            }
            $data->name = $request->name;
            $data->save();
        }
        return redirect()->route('brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::where('id', $id)->first();
        // dd($brand);

        $brand->delete();

        return redirect()->route('brands.index');
    }

    public function search($name)
    {

        if ($name != "undefined") {
            # code...
            $brands = Brand::where('name', 'like', '%' . $name . '%')->with('products')->get();


            return response()->json([
                'status' => 200,
                'brands' => $brands,
            ]);
        } else if ($name == "undefined") {

            return response()->json([
                'status' => 200,
                'brands' => Brand::with('products')->get(),
            ]);
        }
    }
}
