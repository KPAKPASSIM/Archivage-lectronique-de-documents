<?php

namespace App\Http\Controllers;

use App\Models\FormulaireTable;
use App\Models\TypeDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FormulaireTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FormulaireTable $model)
    {
        return view('formulaire.index', ['formulaireTables' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formulaire.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        FormulaireTable::create([
            'id_type_document'=>$request->idTypeDocument,
            'libelle_formulaire'=>$request->name
        ]);
        return redirect()->route("formulaire.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FormulaireTable  $formulaireTable
     * @return \Illuminate\Http\Response
     */
    public function show(FormulaireTable $formulaireTable)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FormulaireTable  $formulaireTable
     * @return \Illuminate\Http\Response
     */
    public function edit( $formulaireTable)
    {
        $formulaireTable = FormulaireTable::findOrFail($formulaireTable);
        return view('formulaire.edit', compact('formulaireTable'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FormulaireTable  $formulaireTable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FormulaireTable $formulaireTable)
    {
        $formulaireTable->update(
            $request->merge(['id_type_document' => Hash::make($request->get('id'))])
                ->except([$request->get('id') ? '' : 'id type document']),
            $request->merge(['libelle_formulaire'=> Hash::make($request->get('name'))])
                ->except([$request->get('name')? '': 'libelle document'])
        );

        return redirect()->route('formulaire.index')->withStatus(__('formulaire modifié avec succès.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FormulaireTable  $formulaireTable
     * @return \Illuminate\Http\Response
     */
    public function destroy( $formulaireTable)
    {
        FormulaireTable::destroy($formulaireTable);

        return redirect()->route('formulaire.index')->withStatus(__('formulaire supprimé avec succès.'));
    }
}
