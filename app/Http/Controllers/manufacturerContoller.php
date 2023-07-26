<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Manufacturer;
use Illuminate\Http\Request;


class manufacturerContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'm-name' => 'required'
            ]
            );

        $manufacturer = new Manufacturer;
        $manufacturer->name = $request['m-name'];
        $manufacturer->save();
        return response()->json(['message' => 'Form submitted successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        // $manufacturers = Manufacturer::all();
        // dd($manufacturers);
        // return view('header')->with(compact('manufacturers'));
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
