<?php

namespace App\Http\Controllers;

use App\Models\Business;

class BusinessController extends Controller
{
    public function index()
    {
        return view('business.index', ['businesses' => Business::all()]);
    }

    public function show(Business $business)
    {
        return view('business.show', ['business' => $business]);
    }
}
