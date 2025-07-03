<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Office;
use App\Models\PatronType;
use App\Models\Program;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $patron_types = PatronType::all();
        $programs = Program::all();
        $majors = Major::all();
        $offices = Office::all();

        return view('patrons.create', [
            'patron_types' => $patron_types,
            'programs' => $programs,
            'majors' => $majors,
            'offices' => $offices
        ]);
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'first-name' => 'required|string|max:50',
            'last-name' => 'required|string|max:50',
            'middle-name' => 'required|string|max:50',
            'birth-date' => 'required|date|before:today',
            'username' => 'required|string|max:20|unique:users,username',
            'email' => 'required|string|email|max:50|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'patron-type-id' => 'required|exists:patron_types,id',
            'student-id' => 'required|string|max:10|unique:users,student_id',
            'library-id' => 'nullable|string|max:10|unique:users,library_id',
            'sex' => 'required|in:male,female',
            'program-id' => 'required|exists:programs,id',
            'major-id' => 'required|exists:majors,id',
            'office-id' => 'required|exists:offices,id',
        ]);

        if ($validator->fails()) {
            dd($validator->errors());
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
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
