<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Record;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = Record::with('book')
        ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('records.books.index', ['records' => $records]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('records.books.create');
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
            'call-number' => 'required|string|max:50',
            'physical-location' => 'required|string|in:Circulation,Fiction,Filipiniana,General References,Graduate School,Reserve,PCAARRD,Vertical Files',
            'location-symbol' => 'required|string|max:10',
            'date-acquired' => 'required|date',
            'source' => 'required|string|in:Purchase,Donation,Exchange,Government Depository',
            'purchase-amount' => 'nullable|numeric|min:0',
            'acquisition-status' => 'required|string|in:Processing,Available,Pending Review',
            'additional-notes' => 'nullable|string|max:1000',
//        end of records part, start of book part
            'primary-author' => 'required|string|max:255',
            'publication-year' => 'required|integer|min:1000|max:' . (date('Y') + 10),
            'publisher' => 'required|string|max:255',
            'place-of-publication' => 'required|string|max:255',
            'isbn-issn' => 'nullable|string|max:50',
            'additional-authors' => 'nullable|string|max:500',
            'editor' => 'nullable|string|max:255',
            'series-title' => 'nullable|string|max:255',
            'edition' => 'nullable|string|max:100',
            'cover-type' => 'required|string|in:Hardcover,Paperback,Spiral-bound,Ring-bound,Other',
            'book-cover-image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'table-of-contents' => 'nullable|string|max:2000',
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
            if ($request->hasFile('book-cover-image')) {
                $coverImagePath = $request->file('book-cover-image')->store('book-covers', 'public');
            }

            // Create the book record
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
            $record->book()->create([
                'Publication_Year' => $request->input('publication-year'),
                'Publisher' => $request->input('publisher'),
                'Place_of_Publication' => $request->input('place-of-publication'),
                'ISBN_ISSN' => $request->input('isbn-issn'),
                'Series_Title' => $request->input('series-title'),
                'Edition' => $request->input('edition'),
                'Cover_Type' => $request->input('cover-type'),
                'Book_Cover_Image' => $coverImagePath, // Use the uploaded image path
                'Table_of_Contents' => $request->input('table-of-contents'),
                'Summary_Abstract' => $request->input('summary-abstract'),
            ]);

            // Redirect with success message
            return redirect()->route('books.index')
                ->with('success', 'Book "' . $record->title . '" created successfully!');

        } catch (\Exception $e) {
            $errorMessage = app()->environment('local') // will only show this in local
                ? 'Failed to create book: ' . $e->getMessage()
                : 'Failed to create book. Please try again.';

            return redirect()->back()
                ->with('error', $errorMessage)
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $books)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $books)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $books)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $books)
    {
        //
    }
}
