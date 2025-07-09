<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;

class PeriodicalController extends Controller
{
    public function index()
    {
        $records = Record::with('digitalResource')
            ->whereHas('digitalResource')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('records.periodicals.index', [
            'records' => $records,
        ]);
    }

    public function create()
    {
        return view('records.periodicals.create');
    }
}
