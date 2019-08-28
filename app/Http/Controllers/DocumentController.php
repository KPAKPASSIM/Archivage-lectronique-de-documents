<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\TypeDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Document $model)
    {
        return view('document.index', ['documents' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeDocuments = TypeDocument::all();
        return view('document.create', compact('typeDocuments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Document $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Document $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        $document = Document::findOrFail($document);
        return view('document.edit', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Document $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Document $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
    }

    public function getChampsSpecifiques()
    {
        $id = Input::get('id');
        $typeDoc = TypeDocument::find($id);
        if ($typeDoc) {
            return response()->json($typeDoc->ChampSpecifiques, 200);
        } else {
            return response()->json([], 200);
        }
    }
}
