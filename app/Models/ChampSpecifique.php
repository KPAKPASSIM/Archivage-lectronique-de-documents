<?php

namespace App\Models;


class ChampSpecifique extends BaseModel
{
    protected $table = 'champ_specifiques';

    public function TypeDocuments()
    {
        return $this->hasOne(TypeDocument::class,'id','type_documents_id');
    }
}
