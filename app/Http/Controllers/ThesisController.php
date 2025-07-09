<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Thesis;
use Illuminate\Http\Request;

class ThesisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = Record::with('thesis')
            ->whereHas('thesis')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('records.thesis.index', ['records' => $records]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('records.thesis.create');
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
    public function show(Thesis $thesis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Thesis $thesis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Thesis $thesis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Thesis $thesis)
    {
        //
    }
}
