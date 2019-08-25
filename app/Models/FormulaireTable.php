<?php

namespace App\Models;


class FormulaireTable extends BaseModel
{
    protected $table = 'formulaires_tables';

    public function champSpecifiques()
    {
        return $this->belongsToMany(ChampSpecifique::class, 'champ_specifique_formulaire_tables',
            'formulaire_id', 'champSpecifique_id');
    }


    public function typeDocument()
    {
        return $this->belongsTo('App\Models\TypeDocument', 'id_type_document');
    }
}
