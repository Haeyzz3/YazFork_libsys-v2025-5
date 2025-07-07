<?php

namespace App\Http\Controllers;

use App\Models\ECollection;
use Illuminate\Http\Request;

class ECollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('records.e-collection.index');
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
    public function show(ECollection $eCollection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ECollection $eCollection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ECollection $eCollection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ECollection $eCollection)
    {
        //
    }
}
