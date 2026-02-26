<?php

namespace App\Http\Controllers;

use App\Models\Business;

class BusinessController extends Controller
{
    public function index()
    {
        $businesses = Business::query();

        $businesses->when(request('search'), function ($query) {
            $query->where(function ($query) {
                $query->where('name', 'like', '%'.request('search').'%')
                    ->orWhere('description', 'like', '%'.request('search').'%')
                    ->orWhere('subcategory', 'like', '%'.request('search').'%');
            });
        })->when(request('category'), function ($query) {
            $query->where('category', request('category'));
        })->when(request('location'), function ($query) {
            $query->where('city', request('location'));
        });

        return view('business.index', ['businesses' => $businesses->get()]);
    }

    public function show(Business $business)
    {
        return view('business.show', ['business' => $business]);
    }
}
