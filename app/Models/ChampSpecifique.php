<?php

namespace App\Models;


class ChampSpecifique extends BaseModel
{
    protected $table = 'champ_specifiques';

    public function formulaires()
    {
        return $this->belongsToMany('App\Models\FormulaireTable','champ_specifique_formulaire_tables','champSpecifique_id','formulaire_id');
    }
}
