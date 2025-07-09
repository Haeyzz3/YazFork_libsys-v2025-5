<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PeriodicalController extends Controller
{
    public function index()
    {
        $records = Record::with('periodical')
            ->whereHas('periodical')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('records.periodicals.index', [
            'records' => $records,
        ]);
    }

    public function create()
    {
        return view('records.periodicals.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'accession-number' => 'required|string|max:255|unique:records,accession_number',
            'title' => 'required|string|max:500',
            'primary-author' => 'required|string|max:50',
            'publication-year' => 'required|integer|min:1000|max:' . (date('Y') + 10),
            'publisher' => 'required|string|max:50',
            'language' => 'required|string|max:100',
            'volume-number' => 'nullable|string|max:50',
            'issue-number' => 'nullable|string|max:50',
            'publication-date' => 'nullable|date',
            'issn' => 'nullable|string|max:50',
            'frequency' => 'nullable|string|max:50',
            'ddc-classification' => 'required|string|in:Applied Science,Arts,Fiction,General Works,History,Language,Literature,Philosophy,Pure Science,Religion,Social Science',
            'call-number' => 'string|max:50',
            'physical-location' => 'required|string|in:Circulation,Fiction,Filipiniana,General References,Graduate School,Reserve,PCAARRD,Vertical Files',
            'location-symbol' => 'string|max:10',
            'format' => 'nullable|string|max:50',
            'cover-sample-image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'date-acquired' => 'required|date',
            'source' => 'required|string|in:Purchase,Donation,Exchange,Government Depository',
            'purchase-amount' => 'nullable|numeric|min:0',
            'acquisition-status' => 'required|string|in:Processing,Available,Pending Review',
            'summary-contents' => 'nullable|string|max:1000',
            'additional-notes' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $coverSampleImagePath = null;
            if ($request->hasFile('book-cover-image')) {
                $coverSampleImagePath = $request->file('book-cover-image')->store('book-covers', 'public');
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

            // Create the associated book with additional details
            $record->periodical()->create([
                'primary_author' => $request->input('primary-author'),
                'publication_year' => $request->input('publication-year'),
                'publisher' => $request->input('publisher'),
                'volume_number' => $request->input('volume-number'),
                'issue_number' => $request->input('issue-number'),
                'publication_date' => $request->input('publication-date'),
                'issn' => $request->input('isbn-issn'),
                'frequency' => $request->input('frequency'),
                'format' => $request->input('format'),
                'cover_sample_image' => $coverSampleImagePath, // Use the uploaded image path
                'summary_contents' => $request->input('summary-contents'),
            ]);

            // Redirect with success message
            return redirect()->route('periodicals.index')
                ->with('success', 'Periodical "' . $record->title . '" created successfully!');

        } catch (\Exception $e) {
            $errorMessage = app()->environment('local') // will only show this in local
                ? 'Failed to create periodical: ' . $e->getMessage()
                : 'Failed to create periodical. Please try again.';

            return redirect()->back()
                ->with('error', $errorMessage)
                ->withInput();
        }
    }

    public function show(Record $record)
    {
        return view('records.periodicals.show', [
            'record' => $record,
        ]);
    }

    public function edit(Record $record)
    {
        return view('records.periodicals.edit', [
            'record' => $record,
        ]);
    }

    public function update(Request $request, Record $record): ?RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'accession-number' => 'required|string|max:255|unique:records,accession_number',
            'title' => 'required|string|max:500',
            'primary-author' => 'required|string|max:50',
            'publication-year' => 'required|integer|min:1000|max:' . (date('Y') + 10),
            'publisher' => 'required|string|max:50',
            'language' => 'required|string|max:100',
            'volume-number' => 'nullable|string|max:50',
            'issue-number' => 'nullable|string|max:50',
            'publication-date' => 'nullable|date',
            'issn' => 'nullable|string|max:50',
            'frequency' => 'nullable|string|max:50',
            'ddc-classification' => 'required|string|in:Applied Science,Arts,Fiction,General Works,History,Language,Literature,Philosophy,Pure Science,Religion,Social Science',
            'call-number' => 'string|max:50',
            'physical-location' => 'required|string|in:Circulation,Fiction,Filipiniana,General References,Graduate School,Reserve,PCAARRD,Vertical Files',
            'location-symbol' => 'string|max:10',
            'format' => 'nullable|string|max:50',
            'cover-sample-image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'date-acquired' => 'required|date',
            'source' => 'required|string|in:Purchase,Donation,Exchange,Government Depository',
            'purchase-amount' => 'nullable|numeric|min:0',
            'acquisition-status' => 'required|string|in:Processing,Available,Pending Review',
            'summary-contents' => 'nullable|string|max:1000',
            'additional-notes' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Handle file upload if present
            $coverSampleImagePath = $record->periodical->cover_sample_image;
            if ($request->hasFile('cover-sample-image')) {
                // Delete the old image if it exists
                if ($coverSampleImagePath && Storage::disk('public')->exists($coverSampleImagePath)) {
                    Storage::disk('public')->delete($coverSampleImagePath);
                }
                $coverSampleImagePath = $request->file('cover-sample-image')->store('book-covers', 'public');
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

            $record->periodical()->update([
                'primary_author' => $request->input('primary-author'),
                'publication_year' => $request->input('publication-year'),
                'publisher' => $request->input('publisher'),
                'volume_number' => $request->input('volume-number'),
                'issue_number' => $request->input('issue-number'),
                'publication_date' => $request->input('publication-date'),
                'issn' => $request->input('isbn-issn'),
                'frequency' => $request->input('frequency'),
                'format' => $request->input('format'),
                'cover_sample_image' => $coverSampleImagePath, // Use the uploaded image path
                'summary_contents' => $request->input('summary-contents'),
            ]);

            // Redirect with success message
            return redirect()->route('periodicals.show', $record)
                ->with('success', 'Periodical/Magazine "' . $record->title . '" created successfully!');


        } catch (\Exception $e) {
            $errorMessage = app()->environment('local') // will only show this in local
                ? 'Failed to update Periodical/Magazine: ' . $e->getMessage()
                : 'Failed to update Periodical/Magazine. Please try again.';

            return redirect()->back()
                ->with('error', $errorMessage)
                ->withInput();
        }
    }
}
