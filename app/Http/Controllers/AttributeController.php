<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attribute as ModelsAttribute;
use Auth;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.manage-attributes')->with('data',ModelsAttribute::get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->edit_id){
            $attr=ModelsAttribute::find($request->edit_id);
            $attr->label=$request->edit_name;
            $attr->stock=$request->edit_stock;
            $attr->save();
        }else{
            $attr= new ModelsAttribute;
            $attr->label=$request->label;
            $attr->stock=$request->stock;
            $attr->is_active=1;
            $attr->user_id=Auth::id();
            $attr->save();
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $data=ModelsAttribute::find($id);
        if($data){
            return response()->json($data);
        }else{
            return response()->json([datafalse,false]);
        }

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attr = ModelsAttribute::where('id', $id)->first();

        $attr->delete();

        return redirect()->back()->with('success', 'Attribute has been deleted successfully!!');


    }

    public function changeStatus($id)
    {
        $attr = ModelsAttribute::where('id', $id)->first();

        if ($attr->is_active == 1) {
            $attr->is_active = 0;
        } else {
            $attr->is_active = 1;
        }

        $attr->save();


        return response()->json([
            'status' => 200,
            'title' => 'Attribute status has been  changed',
            'text' => 'Attribute status has been changed successfully!'
        ]);
    }

}
