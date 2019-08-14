<?php

namespace App\Http\Controllers;

use App\Models\ChampSpecifique;
use App\Models\ChampSpecifiqueFormulaireTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ChampSpecifiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ChampSpecifique $model)
    {
        return view('champ.index', ['champSpecifiques' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('champ.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $champ = ChampSpecifique::create([
            'libelle_champ'=>$request->libelle_champ,
            'slug_champ'=>Str::slug($request->libelle_champ,'_'),
        ]);

       if ($champ){
           ChampSpecifiqueFormulaireTable::create([
               'formulaire_id'=>$request->formulaireTable,
               'champSpecifique_id'=>$champ->id,
           ]);
       }

        return redirect()->route("formulaire.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChampSpecifique  $champSpecifique
     * @return \Illuminate\Http\Response
     */
    public function show(ChampSpecifique $champSpecifique)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChampSpecifique  $champSpecifique
     * @return \Illuminate\Http\Response
     */
    public function edit( $champSpecifique)
    {
        $champSpecifique = ChampSpecifique::findOrFail($champSpecifique);
        return view('champ.edit', compact('champSpecifique'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChampSpecifique  $champSpecifique
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChampSpecifique $champSpecifique)
    {
        $champSpecifique->update(
            $request->merge(['formulaire_id' => Hash::make($request->get('idFormulaire'))])
                ->except([$request->get('id') ? '' : 'id formulaire']),
            $request->merge(['libelle_champ'=> Hash::make($request->get('name'))])
                ->except([$request->get('name')? '': 'libelle champ'])
        );

        return redirect()->route('champ.index')->withStatus(__('champ modifié avec succès.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChampSpecifique  $champSpecifique
     * @return \Illuminate\Http\Response
     */
    public function destroy( $champSpecifique)
    {
        ChampSpecifique::destroy($champSpecifique);

        return redirect()->route('champ.index')->withStatus(__('champ supprimé avec succès.'));
    }
}
