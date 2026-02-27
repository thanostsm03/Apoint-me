<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyBusinessesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (! Auth::user()->owner) {
            return redirect()->route('owner.create');
        }

        return view('my-businesses.index', ['businesses' => Auth::user()->owner->businesses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('my-businesses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:60|string',
            'description' => 'string|max:500|nullable',
            'category' => 'required|string',
            'subcategory' => 'required|string',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'zip' => 'required|string|max:60',
            'address' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:businesses,email',
            'phone' => 'required|string|max:30|unique:businesses,phone',
            'website' => 'nullable|string|max:255',
        ]);

        $business = Business::create(array_merge($validated, [
            'slug' => \Illuminate\Support\Str::slug($validated['name']),
            'owner_id' => Auth::user()->owner->id,
            'isVerified' => true,
            'isActive' => true,
        ]));

        return redirect()->route('my_businesses.show', $business)->with('success', 'Business successfully added');

    }

    /**
     * Display the specified resource.
     */
    public function show($my_business)
    {
        $business = Business::where('slug', $my_business)->firstOrFail();

        return view('my-businesses.show', ['business' => $business]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($myBusiness)
    {
        $business = Business::where('slug', $myBusiness)->firstOrFail();

        return view('my-businesses.edit', ['business' => $business]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $myBusiness)
    {
        $business = Business::where('slug', $myBusiness)->firstOrFail();
        $validated = $request->validate([
            'name' => 'required|max:60|string',
            'description' => 'string|max:500|nullable',
            'category' => 'required|string',
            'subcategory' => 'required|string',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'zip' => 'required|string|max:60',
            'address' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:businesses,email,'.$business->id,
            'phone' => 'required|string|max:30|unique:businesses,phone,'.$business->id,
            'website' => 'nullable|string|max:255',
        ]);

        $business->fill($validated);
        $business->slug = \Illuminate\Support\Str::slug($validated['name']);
        $business->save();

        return redirect()->route('my_businesses.show', $business)->with('success', 'Business updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
