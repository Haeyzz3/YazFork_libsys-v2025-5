<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PatronController extends Controller
{
    public function index()
    {
        $this->authorize('view-section-manage-patrons');

        return view('manage-patrons');
    }
}
