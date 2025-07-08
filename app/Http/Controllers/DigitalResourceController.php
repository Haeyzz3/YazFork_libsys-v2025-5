<?php

namespace App\Http\Controllers;

use App\Models\DigitalResource;
use App\Models\Record;
use Illuminate\Http\Request;

class DigitalResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = Record::with('digitalResource')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('records.digital-resources.index', [
            'records' => $records
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('records.digital-resources.create');
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
    public function show(DigitalResource $eCollection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DigitalResource $eCollection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DigitalResource $eCollection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DigitalResource $eCollection)
    {
        //
    }
}
