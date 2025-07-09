<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Thesis;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ThesisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = Record::with('thesis')
            ->whereHas('thesis')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('records.thesis.index', ['records' => $records]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('records.thesis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'accession-number' => 'required|string|max:255|unique:records,accession_number',
            'title' => 'required|string|max:500',
            'researchers' => 'required|string|max:50',
            'academic-year' => 'required|string|max:50',
            'institution' => 'required|string|max:100',
            'college' => 'required|string|max:100',
            'language' => 'required|string|max:100',
            'adviser' => 'required|string|max:100',
            'panelist' => 'required|string|max:500',
            'degree-program' => 'required|string|max:500',
            'degree-level' => 'required|string|max:50',
            'ddc-classification' => 'required|string|in:Applied Science,Arts,Fiction,General Works,History,Language,Literature,Philosophy,Pure Science,Religion,Social Science',
            'call-number' => 'string|max:50',
            'physical-location' => 'required|string|in:Circulation,Fiction,Filipiniana,General References,Graduate School,Reserve,PCAARRD,Vertical Files',
            'location-symbol' => 'string|max:10',
            'format' => 'nullable|string|max:50',
            'number-of-pages' => 'nullable|string|max:10',
            'abstract-document' => 'nullable|file|mimes:pdf|max:2048',
            'full-text' => 'nullable|file|mimes:pdf|max:2048',
            'date-acquired' => 'required|date',
            'source' => 'required|string|in:Purchase,Donation,Exchange,Government Depository',
            'purchase-amount' => 'nullable|numeric|min:0',
            'acquisition-status' => 'required|string|in:Processing,Available,Pending Review',
            'abstract-summary' => 'nullable|string|max:1000',
            'keywords' => 'nullable|string|max:1000',
            'additional-notes' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $abstractDocumentPath = null;
            if ($request->hasFile('abstract-document')) {
                $abstractDocumentPath = $request->file('abstract-document')->store('abstract-documents', 'public');
            }

            $fullTextPath = null;
            if ($request->hasFile('full-text')) {
                $fullTextPath = $request->file('full-text')->store('full-texts', 'public');
            }

            $record = Record::create([
                'accession_number' => $request->input('accession-number'),
                'title' => $request->input('title'),
                'language' => $request->input('language'),
                'ddc_classification' => $request->input('ddc-classification'),
                'call_number' => $request->input('call-number'),
                'physical_location' => $request->input('physical-location'),
                'location_symbol' => $request->input('location-symbol'),
                'date_acquired' => $request->input('date-acquired'),
                'source' => $request->input('source'),
                'purchase_amount' => $request->input('purchase-amount'),
                'acquisition_status' => $request->input('acquisition-status'),
                'additional_notes' => $request->input('additional-notes'),
            ]);

            $record->thesis()->create([
                'researchers' => $request->input('researchers'),
                'academic_year' => $request->input('academic-year'),
                'institution' => $request->input('institution'),
                'college' => $request->input('college'),
                'adviser' => $request->input('adviser'),
                'panelist' => $request->input('panelist'),
                'degree_program' => $request->input('degree-program'),
                'degree_level' => $request->input('degree-level'),
                'format' => $request->input('format'),
                'number_of_pages' => $request->input('number-of-pages'),
                'abstract_document' => $abstractDocumentPath,
                'full_text' => $fullTextPath,
                'abstract_summary' => $request->input('abstract-summary'),
                'keywords' => $request->input('keywords'),
            ]);

            // Redirect with success message
            return redirect()->route('thesis.index')
                ->with('success', 'Thesis/dissertation "' . $record->title . '" created successfully!');

        } catch (\Exception $e) {
            $errorMessage = app()->environment('local') // will only show this in local
                ? 'Failed to create thesis/dissertation: ' . $e->getMessage()
                : 'Failed to create thesis/dissertation. Please try again.';

            return redirect()->back()
                ->with('error', $errorMessage)
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Record $record)
    {
        return view('records.thesis.show', [
            'record' => $record,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Record $record)
    {
        return view('records.thesis.edit', [
            'record' => $record,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Record $record)
    {
        $validator = Validator::make($request->all(), [
            'accession-number' => 'required|string|max:255|unique:records,accession_number',
            'title' => 'required|string|max:500',
            'researchers' => 'required|string|max:50',
            'academic-year' => 'required|string|max:50',
            'institution' => 'required|string|max:100',
            'college' => 'required|string|max:100',
            'language' => 'required|string|max:100',
            'adviser' => 'required|string|max:100',
            'panelist' => 'required|string|max:500',
            'degree-program' => 'required|string|max:500',
            'degree-level' => 'required|string|max:50',
            'ddc-classification' => 'required|string|in:Applied Science,Arts,Fiction,General Works,History,Language,Literature,Philosophy,Pure Science,Religion,Social Science',
            'call-number' => 'string|max:50',
            'physical-location' => 'required|string|in:Circulation,Fiction,Filipiniana,General References,Graduate School,Reserve,PCAARRD,Vertical Files',
            'location-symbol' => 'string|max:10',
            'format' => 'nullable|string|max:50',
            'number-of-pages' => 'nullable|string|max:10',
            'abstract-document' => 'nullable|file|mimes:pdf|max:2048',
            'full-text' => 'nullable|file|mimes:pdf|max:2048',
            'date-acquired' => 'required|date',
            'source' => 'required|string|in:Purchase,Donation,Exchange,Government Depository',
            'purchase-amount' => 'nullable|numeric|min:0',
            'acquisition-status' => 'required|string|in:Processing,Available,Pending Review',
            'abstract-summary' => 'nullable|string|max:1000',
            'keywords' => 'nullable|string|max:1000',
            'additional-notes' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $abstractDocumentPath = $record->thesis->abstract_document;
            if ($request->hasFile('abstract-document')) {

                if ($abstractDocumentPath && Storage::disk('public')->exists($abstractDocumentPath)) {
                    Storage::disk('public')->delete($abstractDocumentPath);
                }
                $abstractDocumentPath = $request->file('abstract-document')->store('abstract-documents', 'public');
            }

            $fullTextPath = $record->thesis->full_text;
            if ($request->hasFile('full-text')) {
                if ($fullTextPath && Storage::disk('public')->exists($fullTextPath)) {
                    Storage::disk('public')->delete($fullTextPath);
                }
                $fullTextPath = $request->file('full-text')->store('full-texts', 'public');
            }

            $record->update([
                'accession_number' => $request->input('accession-number'),
                'title' => $request->input('title'),
                'language' => $request->input('language'),
                'ddc_classification' => $request->input('ddc-classification'),
                'call_number' => $request->input('call-number'),
                'physical_location' => $request->input('physical-location'),
                'location_symbol' => $request->input('location-symbol'),
                'date_acquired' => $request->input('date-acquired'),
                'source' => $request->input('source'),
                'purchase_amount' => $request->input('purchase-amount'),
                'acquisition_status' => $request->input('acquisition-status'),
                'additional_notes' => $request->input('additional-notes'),
            ]);

            $record->thesis()->update([
                'researchers' => $request->input('researchers'),
                'academic_year' => $request->input('academic-year'),
                'institution' => $request->input('institution'),
                'college' => $request->input('college'),
                'adviser' => $request->input('adviser'),
                'panelist' => $request->input('panelist'),
                'degree_program' => $request->input('degree-program'),
                'degree_level' => $request->input('degree-level'),
                'format' => $request->input('format'),
                'number_of_pages' => $request->input('number-of-pages'),
                'abstract_document' => $abstractDocumentPath,
                'full_text' => $fullTextPath,
                'abstract_summary' => $request->input('abstract-summary'),
                'keywords' => $request->input('keywords'),
            ]);

            return redirect()->route('thesis.show', $record)
                ->with('success', 'Thesis/dissertation "' . $record->title . '" update successfully!');

        } catch (\Exception $e) {
            $errorMessage = app()->environment('local') // will only show this in local
                ? 'Failed to update thesis/dissertation: ' . $e->getMessage()
                : 'Failed to update thesis/dissertation. Please try again.';

            return redirect()->back()
                ->with('error', $errorMessage)
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Thesis $thesis)
    {
        //
    }
}
