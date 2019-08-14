<?php

namespace App\Models;


class TypeDocument extends BaseModel
{
    protected $table = 'type_documents';

    public function formulaires(){
        return $this->hasMany('App\Models\FormulaireTable','id_type_document');
    }
}

