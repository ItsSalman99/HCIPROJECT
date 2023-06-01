<?php

namespace App\Http\Controllers;

use App\Models\ApplicationSlider;
use App\Models\Product;
use Illuminate\Http\Request;
use Alert;

class GeneralSettingController extends Controller
{
    public function index()
    {
        $slider = ApplicationSlider::orderBy('seq_no')->get();

        return view('Admin.generalSettings', compact('slider'));
    }

    public function store(Request $request)
    {
        // dd($request->imgs);
        
        $data = [];

        foreach ($request->imgs as $key => $img) {
            
            
            $slider = new ApplicationSlider();
            
            $filename = $img->getClientOriginalName() . '.' . $img->extension();
            // array_push($data, $img->getClientOriginalName());

            $image = $img->move('assets/images/slider/uploads/', $filename);

            $slider->img = $image;
            
            $slider->link = $request->links[$key];
            
            $slider->seq_no = $request->sequence[$key];
    
            $slider->save();
        }

        // dd($data);


        Alert::success("Slider Image Uploaded Successfully!", "Slider image has been uploaded successfully!");

        return redirect()->back();


    }

    public function edit($id)
    {
        $slider = ApplicationSlider::where('id', $id)->first();

        return response()->json([
            'status' => true,
            'data' => $slider
        ]);

    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $slider = ApplicationSlider::where('id', $id)->first();

        if ($request->hasFile('img')) {

            $filename = time() . '.' . $request->img->extension();

            $image = $request->img->move('assets/images/slider/uploads/', $filename);

            $slider->img = $image;
        }
        
        $slider->link = $request->link;
        $slider->seq_no = $request->sequence;

        $slider->save();

        toast("Slider Image Updated Successfully!", "Slider image has been updated successfully!");

        return redirect()->back();
    }

    public function delete($id)
    {

        $slider = ApplicationSlider::where('id', $id)->first();

        $slider->delete();

        Alert::success("Slider Deleted Successfully!", "Slider image has been deleted successfully!");

        return redirect()->back();


    }

}
