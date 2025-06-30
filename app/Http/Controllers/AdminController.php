<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::whereHas('role', function($query) {
            $query->whereIn('role_name', ['admin', 'super_admin']);
        })->get();

        return view('manage-admins', compact('admins'));
    }
}
