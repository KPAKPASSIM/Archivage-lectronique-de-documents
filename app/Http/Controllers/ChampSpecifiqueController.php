<?php

namespace App\Http\Controllers;

use App\Models\ChampSpecifique;
use App\Models\ChampSpecifiqueFormulaireTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;

class ChampSpecifiqueController extends Controller
{
    public function __construct() {

       $this->middleware('permission:index ChampSpecifique')->only('index');
       $this->middleware('permission:edit ChampSpecifique')->only('edit');
       $this->middleware('permission:update ChampSpecifique')->only('update');
       $this->middleware('permission:store ChampSpecifique')->only('store');
       $this->middleware('permission:delete ChampSpecifique')->only('destroy');
       $this->middleware('permission:create ChampSpecifique')->only('create');
       $this->middleware('permission:show ChampSpecifique')->only('show');
   }
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $champ = ChampSpecifique::create([
                'libelle_champ' => $request->libelle_champ,
                'slug_champ' => Str::slug($request->libelle_champ, '_'),
                'type_champ' => $request->type,
                'type_documents_id' => $request->type_documents_id,
            ]
        );
        $typedocument = $champ->TypeDocument;

        return redirect()->route("typedocument.show", compact('typedocument'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\ChampSpecifique $champSpecifique
     * @return \Illuminate\Http\Response
     */
    public function show(ChampSpecifique $champSpecifique)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\ChampSpecifique $champSpecifique
     * @return \Illuminate\Http\Response
     */
    public function edit($champSpecifique)
    {
        $champSpecifique = ChampSpecifique::findOrFail($champSpecifique);
        return view('champ.edit', compact('champSpecifique'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ChampSpecifique $champSpecifique
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $champSpecifique)
    {
        $data = $request->all();
        $data['slug_champ'] = Str::slug($request->libelle_champ, '_');
        $champ = ChampSpecifique::findOrFail($champSpecifique);
        $champ->update($data);
        $typedocument = $champ->TypeDocument;
        return redirect()->route('typedocument.show', compact('typedocument'))->withStatus(__('champ modifié avec succès.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\ChampSpecifique $champSpecifique
     * @return \Illuminate\Http\Response
     */
    public function destroy($champSpecifique)
    {
        ChampSpecifique::destroy($champSpecifique);
        return redirect()->back()->withStatus(__('champ supprimé avec succès.'));
    }
}
