<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class FiltreController extends Controller
{
    public function filtrer ($id) {


        if($id==1){
            $documents =  Document::where('type_document_id',1)
                ->get();
        } else
            if ($id==2){
                $documents =  Document::where('type_document_id',2)
                    ->get();
            }
            else if ($id==3){
                $documents =  Document::where('type_document_id',3)
                    ->get();
            }
            else if ($id==5){
                $documents =  Document::where('type_document_id',5)
                    ->get();
            }
            else if ($id==4){
                $documents =  Document::where('type_document_id',4)
                    ->get();
            }
            else if ($id==7){
                $documents =  Document::where('type_document_id',7)
                    ->get();
            }
        return view('document.index', compact('documents'));

    }
}
