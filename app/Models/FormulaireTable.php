<?php

namespace App\Models;


class FormulaireTable extends BaseModel
{
    protected $table = 'formulaires_tables';

    public function champSpecifiques()
    {
        return $this->belongsToMany('App\Models\ChampSpecifique','champ_specifique_formulaire_tables','champSpecifique_id ','formulaire_id');
    }


    public function typeDocument(){
        return $this->belongsTo('App\Models\TypeDocument','id_type_document');
    }
}
