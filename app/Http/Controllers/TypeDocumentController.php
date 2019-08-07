<?php

namespace App\Http\Controllers;

use App\Models\TypeDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TypeDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
      * @param  \App\TypeDocument  $model
     * @return \Illuminate\Http\Response
     */
    public function index(TypeDocument $model)
    {
        return view('typedocument.index', ['typeDocuments' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('typedocument.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TypeDocument::create([
            'libelle_type_document'=>$request->name
        ]);
        return redirect()->route("typedocument.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TypeDocument  $typeDocument
     * @return \Illuminate\Http\Response
     */
    public function show(TypeDocument $typeDocument)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TypeDocument  $typeDocument
     * @return \Illuminate\Http\Response
     */
    public function edit( $typeDocument)
    {
        $typeDocument = TypeDocument::findOrFail($typeDocument);
        return view('typedocument.edit', compact('typeDocument'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TypeDocument  $typeDocument
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeDocument $typeDocument)
    {
        $typeDocument->update(
            $request->merge(['libelle_type_document' => Hash::make($request->get('name'))])
                ->except([$request->get('name') ? '' : 'type document']
                ));

        return redirect()->route('typedocument.index')->withStatus(__('Type document modifié avec succès.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeDocument  $typeDocument
     * @return \Illuminate\Http\Response
     */
    public function destroy($typeDocument)
    {

        TypeDocument::destroy($typeDocument);

        return redirect()->route('typedocument.index')->withStatus(__('Utilisateur supprimé avec succès.'));
    }
}
