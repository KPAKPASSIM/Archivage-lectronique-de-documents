<?php

namespace App\Http\Controllers;

use App\Models\ChampSpecifique;
use Illuminate\Http\Request;

class ChampSpecifiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ChampSpecifique $model)
    {
        return view('formulaire.champ', ['typeDocuments' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(ChampSpecifique $champSpecifique)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChampSpecifique  $champSpecifique
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChampSpecifique $champSpecifique)
    {
        //
    }
}
