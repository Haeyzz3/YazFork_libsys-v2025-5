<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Office;
use App\Models\PatronType;
use App\Models\Program;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        $patron_role = Role::where('name', 'patron')->firstOrFail();

        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'first-name' => 'required|string|max:50',
            'last-name' => 'required|string|max:50',
            'middle-name' => 'required|string|max:50',
            'birth-date' => 'required|date|before:today',
            'username' => 'required|string|max:20|unique:users,username',
            'contact-number' => 'nullable|string|max:20',
            'email' => 'required|string|email|max:50|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'patron-type-id' => 'required|exists:patron_types,id',
            'student-id' => 'required|string|max:10|unique:patron_details,student_id',
            'library-id' => 'nullable|string|max:10|unique:patron_details,library_id',
            'sex' => 'required|in:male,female',
            'program-id' => 'required|exists:programs,id',
            'major-id' => 'required|exists:majors,id',
            'office-id' => 'required|exists:offices,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Create the admin
            User::create([
                'first_name' => $request->input('first-name'),
                'last_name' => $request->input('last-name'),
                'middle_name' => $request->input('middle-name'),
                'birth_date' => $request->input('birth-date'),
                'username' => $request->input('username'),
                'contact_number' => $request->input('contact-number'),
                'email' => $request->input('email'),
                'role_id' => $patron_role->id,
                'password' => Hash::make($request->input('password')),
            ])
                ->patronDetails()->create([
                'patron_type_id' => $request->input('patron-type-id'),
                'student_id' => $request->input('student-id'),
                'library_id' => $request->input('library-id'),
                'sex' => $request->input('sex'),
                'program_id' => $request->input('program-id'),
                'major_id' => $request->input('major-id'),
                'office_id' => $request->input('office-id'),
            ]);

            // Redirect with success message
            return redirect()->route('patrons.index')
                ->with('success', 'Patron created successfully!');

        } catch (\Exception $e) {
            // Handle any errors during creation
            return redirect()->back()
                ->with('error', 'Failed to create patron. Please try again.')
                ->withInput();
        }
    }

    public function show(User $patron)
    {
        return view('patrons.show', ['patron' => $patron]);
    }

    public function edit(User $patron)
    {
        $patron_types = PatronType::all();
        $programs = Program::all();
        $majors = Major::all();
        $offices = Office::all();

        return view('patrons.edit', [
            'patron_types' => $patron_types,
            'programs' => $programs,
            'majors' => $majors,
            'offices' => $offices,
            'patron' => $patron
        ]);
    }

    public function update(Request $request, User $patron)
    {
        $validator = Validator::make($request->all(), [
            'first-name' => 'required|string|max:50',
            'last-name' => 'required|string|max:50',
            'middle-name' => 'required|string|max:50',
            'birth-date' => 'required|date|before:today',
            'username' => 'required|string|max:20|unique:users,username,' . $patron->username . ',username',
            'contact-number' => 'nullable|string|max:20',
            'email' => 'required|string|email|max:50|unique:users,email,' . $patron->email . ',email',
            'password' => 'nullable|string|min:8|confirmed',
            'patron-type-id' => 'required|exists:patron_types,id',
            'student-id' => 'required|string|max:10|unique:patron_details,student_id,' . $patron->patronDetails->student_id . ',student_id',
            'library-id' => 'nullable|string|max:10|unique:patron_details,library_id,' . $patron->patronDetails->library_id . ',library_id',
            'sex' => 'required|in:male,female',
            'program-id' => 'required|exists:programs,id',
            'major-id' => 'required|exists:majors,id',
            'office-id' => 'required|exists:offices,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Prepare update data
            $updateData = [
                'first_name' => $request->input('first-name'),
                'last_name' => $request->input('last-name'),
                'middle_name' => $request->input('middle-name'),
                'birth_date' => $request->input('birth-date'),
                'username' => $request->input('username'),
                'contact_number' => $request->input('contact-number'),
                'email' => $request->input('email'),
            ];

            // Update the user
            $patron->update($updateData);

            // Update patron details
            $patron->patronDetails()->update([
                'patron_type_id' => $request->input('patron-type-id'),
                'student_id' => $request->input('student-id'),
                'library_id' => $request->input('library-id'),
                'sex' => $request->input('sex'),
                'program_id' => $request->input('program-id'),
                'major_id' => $request->input('major-id'),
                'office_id' => $request->input('office-id'),
            ]);

            return redirect()->route('patrons.show', $patron)
                ->with('success', 'Patron updated successfully!');

        } catch (\Exception $e) {
            // Handle any errors during update
            return redirect()->back()
                ->with('error', 'Failed to update patron. Please try again.')
                ->withInput();
        }
    }
}
