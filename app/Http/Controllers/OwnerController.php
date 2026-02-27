<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    public function create()
    {
        return view('owner.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'phone' => 'required|string|max:15|unique:owners',
        ]);

        Owner::create([
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'user_id' => Auth::id(),
            'phone' => $validated['phone'],
        ]);

        Auth::user()->load('owner');

        return redirect()->route('my-businesses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
