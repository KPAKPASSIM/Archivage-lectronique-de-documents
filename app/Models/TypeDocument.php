<?php

namespace App\Models;


class TypeDocument extends BaseModel
{
    protected $table = 'type_documents';

    public function ChampSpecifiques(){
        return $this->hasMany(ChampSpecifique::class,'type_documents_id','id');
    }
}

