<?php

namespace App\Http\Controllers;

use App\Models\cagory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('category');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(cagory $cagory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cagory $cagory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cagory $cagory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cagory $cagory)
    {
        //
    }
}
