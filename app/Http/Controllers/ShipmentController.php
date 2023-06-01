<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;
use Alert;

class ShipmentController extends Controller
{
    public function index()
    {
        $shipment = Shipment::where('id', 1)->first();

        return view('Admin.manage-shipment', compact('shipment'));
    }

    public function store(Request $request)
    {
        // dd($request->all());

        if ($request->state == "store") {

            $shipment = new Shipment();

            $shipment->name = $request->name;
            $shipment->price = $request->price;

            $shipment->save();

            toast("New Shipment Added!!");

            return redirect()->back();

        } else if ($request->state == "update") {

            $shipment = Shipment::where('id', $request->id)->first();

            $shipment->name = $request->name;
            $shipment->price = $request->price;

            $shipment->save();

            toast("Shipment Updated!!");

            return redirect()->back();
        }
    }
}
