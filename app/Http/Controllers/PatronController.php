<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PatronController extends Controller
{
    public function index()
    {
        $users = User::with('patronDetails')->get();

        // Filter users that have patron details
        $patrons = $users->filter(function ($user) {
            return $user->patronDetails !== null;
        });

        return view('patrons.index', ['patrons' => $patrons]);
    }

    public function create()
    {
        return view('patrons.create');
    }

    public function edit()
    {
        return view('patrons.edit');
    }

    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);

        return redirect()->route('dashboard');
    }
}
