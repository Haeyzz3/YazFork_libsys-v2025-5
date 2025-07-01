<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function index()
    {
        return view('admins.index');
    }

    public function edit()
    {
        return view('admins.edit');
    }
}
