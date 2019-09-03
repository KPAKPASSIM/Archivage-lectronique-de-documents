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
        $std = [
            'titre_document' => $request->titre,
            'reference' => $request->reference,
            'date_archivage' => $request->date_archivage,
            'date_document' => $request->date_document,
            'nom_auteur' => $request->nom_auteur,
            'type_document_id' => $request->type_documents_id,
            'user_id'=>auth()->id(),
            'adresse_auteur' => $request->adresse_auteur,
        ];

        $additionnel = json_encode($request->except([
            'titre_document', 'reference', 'date_archivage', 'date_document',
            'nom_auteur', 'adresse_auteur', '_token', '_method', 'fichier_joint'
        ]));
        $std['attribut_additionnel'] = $additionnel;
        $doc = Document::create($std);
        if($request->hasFile('fichier_joint')) {
            $fichier_joint = $request->file('fichier_joint');
            $ext = $fichier_joint->getClientOriginalExtension();
            $fichier_joint->move(public_path('documents'), $doc->id . '.' . $ext);
            $doc->fichier_joint = $doc->id . '.' . $ext;
            $doc->save();
        }
        return redirect()->route("document.index");
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
    public function edit( $document)
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
    public function update(Request $request,  $document)
    {
        Document::findOrFail(Document)->update($request->all());

        return redirect()->route('document.index')->withStatus(__(' document modifié avec succès.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Document $document
     * @return \Illuminate\Http\Response
     */
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
    public function destroy( $document)
    {

        Document::destroy($document);

        return redirect()->route('document.index')->withStatus(__('document supprimé avec succès.'));
    }


}
