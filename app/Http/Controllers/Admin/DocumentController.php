<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use App\Models\Document;
use App\Models\Fund;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Document::with('fund')->latest('publish_date')->get();

        return view('admin.documents.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $funds = Fund::orderBy('name')->get();

        return view('admin.documents.create', compact('funds'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDocumentRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('documents', 'public');
        }

        Document::create($data);

        return redirect()
            ->route('admin.documents.index')
            ->with('success', 'Document uploaded successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        $funds = Fund::orderBy('name')->get();

        return view('admin.documents.edit', compact('document', 'funds'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDocumentRequest $request, Document $document)
    {
        $data = $request->validated();

        if ($request->hasFile('file')) {
            // Delete old file
            if ($document->file) {
                Storage::disk('public')->delete($document->file);
            }

            $data['file'] = $request->file('file')->store('documents', 'public');
        } else {
            unset($data['file']);
        }

        $document->update($data);

        return redirect()
            ->route('admin.documents.index')
            ->with('success', 'Document updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        // Delete the file from storage
        if ($document->file) {
            Storage::disk('public')->delete($document->file);
        }

        $document->delete();

        return redirect()
            ->route('admin.documents.index')
            ->with('success', 'Document deleted successfully.');
    }
}
