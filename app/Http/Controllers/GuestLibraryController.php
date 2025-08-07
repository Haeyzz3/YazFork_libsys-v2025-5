<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestLibraryController extends Controller
{
    public function index()
    {
        return view('guest.dashboard');
    }
}
