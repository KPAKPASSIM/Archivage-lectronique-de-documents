<?php

namespace App\Http\Controllers;

use App\Models\ChampSpecifiqueFormulaireTable;
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
    public function show($id)
    {
        $formulaireTable = FormulaireTable::findOrFail($id);
        return view('formulaire.show',compact('formulaireTable'));
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
    public function update(Request $request,  $formulaireTable)
    {
        FormulaireTable::findOrFail($formulaireTable)->update($request->all());

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

    public function createChamp($formulaireTable){
        return view('champ.create',compact('formulaireTable'));
    }
    public function champs($formulaireTable){

        $formulaireTable = FormulaireTable::find($formulaireTable);
        $champs = ChampSpecifiqueFormulaireTable::where('formulaire_id',$formulaireTable->id)->get('champSpecifique_id');
        return view('champ.index',compact('formulaireTable','champs'));
    }
}
