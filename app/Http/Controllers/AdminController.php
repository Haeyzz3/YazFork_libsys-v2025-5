<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::with('role')
            ->whereHas('role', function ($query) {
                $query->where('role_name', 'admin');
            })
            ->paginate(10);

        return view('admins.index', ['admins' => $admins]);
    }

    public function create()
    {
        return view('admins.create');
    }

    public function edit()
    {
        return view('admins.edit');
    }
}
