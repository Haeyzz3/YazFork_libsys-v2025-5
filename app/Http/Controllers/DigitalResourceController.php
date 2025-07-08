<?php

namespace App\Http\Controllers;

use App\Models\DigitalResource;
use App\Models\Record;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DigitalResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = Record::with('digitalResource')
            ->whereHas('digitalResource')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('records.digital.index', [
            'records' => $records
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('records.digital.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'accession-number' => 'required|string|max:255|unique:records,accession_number',
            'title' => 'required|string|max:500',
            'language' => 'required|string|max:100',
            'ddc-classification' => 'required|string|in:Applied Science,Arts,Fiction,General Works,History,Language,Literature,Philosophy,Pure Science,Religion,Social Science',
            'date-acquired' => 'required|date',
            'source' => 'required|string|in:Purchase,Donation,Exchange,Government Depository',
            'purchase-amount' => 'nullable|numeric|min:0',
            'acquisition-status' => 'required|string|in:Processing,Available,Pending Review',
            'additional-notes' => 'nullable|string|max:1000',
            // Digital resource specific fields
            'primary-author' => 'required|string|max:50',
            'publication-copyright-year' => 'required|integer|min:1000|max:' . (date('Y') + 10),
            'publisher-producer' => 'required|string|max:255',
            'additional-authors' => 'nullable|string|max:500',
            'editor-producer' => 'nullable|string|max:255',
            'collection-type' => 'required|string|in:Databases,E-books,Audiobooks,Multimedia,Digital Archives,Software',
            'access-method' => 'required|string|in:Online,Local Server,Cloud Storage,Physical Media',
            'file_format' => 'required|string|in:PDF,EPUB,MP4,MP3,Other',
            'duration' => 'nullable|string|max:255',
            'resource-cover-thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'system_requirements' => 'nullable|string|max:1000',
            'summary-abstract' => 'nullable|string|max:1000',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Handle file upload if present
            $coverImagePath = null;
            if ($request->hasFile('resource_cover')) {
                $coverImagePath = $request->file('resource_cover')->store('resource-cover-thumbnails', 'public');
            }

            // Create the record
            $record = Record::create([
                'accession_number' => $request->input('accession-number'),
                'title' => $request->input('title'),
                'language' => $request->input('language'),
                'ddc_classification' => $request->input('ddc-classification'),
                'date_acquired' => $request->input('date-acquired'),
                'source' => $request->input('source'),
                'purchase_amount' => $request->input('purchase-amount'),
                'acquisition_status' => $request->input('acquisition-status'),
                'additional_notes' => $request->input('additional-notes'),
            ]);

            // Create the associated digital resource
            $record->digitalResource()->create([
                'primary_author' => $request->input('primary-author'),
                'publication_copyright_year' => $request->input('publication-copyright-year'),
                'publisher_producer' => $request->input('publisher-producer'),
                'editor_producer' => $request->input('editor-producer'),
                'collection_type' => $request->input('collection-type'),
                'access_method' => $request->input('access-method'),
                'file_format' => $request->input('file_format'),
                'duration' => $request->input('duration'),
                'resource_cover_thumbnail' => $coverImagePath,
                'system_requirements' => $request->input('system_requirements'),
                'summary_abstract' => $request->input('summary-abstract'),
            ]);

            // Redirect with success message
            return redirect()->route('digital.index')
                ->with('success', 'Digital Resource "' . $record->title . '" created successfully!');

        } catch (\Exception $e) {
            $errorMessage = app()->environment('local')
                ? 'Failed to create digital resource: ' . $e->getMessage()
                : 'Failed to create digital resource. Please try again.';

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
        return view('records.digital.show', [
            'record' => $record,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Record $record)
    {
        return view('records.digital.edit', [
            'record' => $record,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DigitalResource $eCollection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DigitalResource $eCollection)
    {
        //
    }
}
