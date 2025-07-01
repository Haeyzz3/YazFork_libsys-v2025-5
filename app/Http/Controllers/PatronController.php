<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PatronController extends Controller
{
    public function index()
    {
        $this->authorize('view-section-manage-patrons');

        return view('patrons.index');
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
