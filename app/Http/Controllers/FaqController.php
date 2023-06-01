<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;


class FaqController extends Controller
{
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

        $faqs = Faq::all();

        return view('Admin.help-center', compact('faqs'));
    }

    public function store(Request $request)
    {
        // dd($request->all());

        Faq::create([
            'title' => $request->title,
            'text' => $request->content
        ]);

        Alert::success("New Faq Added", "New faq has been added!!");

        return redirect()->back();

    }

}
