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
//            ddc classification
//        call number
//            physical location
//            location symbol
            'date-acquired' => 'required|date',
            'source' => 'required|string|in:Purchase,Donation,Gift,Exchange,Other',
            'purchase-amount' => 'nullable|numeric|min:0',
            'acquisition-status' => 'required|string|in:Available,Checked Out,Lost,Damaged,Under Repair,Withdrawn',
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
//                ddc classification
//            call number
//            physical location
//            location symbol
                'date_acquired' => $request->input('date-acquired'),
                'source' => $request->input('source'),
                'purchase_amount' => $request->input('purchase-amount'),
                'acquisition_status' => $request->input('acquisition-status'),
                'additional_notes' => $request->input('additional-notes'),
            ]);

            // Redirect with success message
            return redirect()->route('books.index')
                ->with('success', 'Book "' . $record->title . '" created successfully!');

        } catch (\Exception $e) {
            // Handle any errors during creation
            return redirect()->back()
                ->with('error', 'Failed to create book. Please try again.')
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
