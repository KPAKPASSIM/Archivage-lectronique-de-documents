<?php

namespace App\Http\Controllers;
use App\Models\Document;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $courrierArrive = DB::table('documents')
            ->select(DB::raw('count(*) as courrierArrive, type_document_id'))
            ->where('type_document_id', '=', 1)
            ->groupBy('type_document_id')
            ->get();
        $courrierArrive=$courrierArrive[0]->courrierArrive;

        $courrierArrives= DB::table('documents')
             ->where('type_documents_id','=',1);

       // dd($courrierArrive[0]->courrierArrive);
        $courrierDepart = DB::table('documents')
            ->select(DB::raw('count(*) as courrierDepart, type_document_id'))
            ->where('type_document_id', '=', 2)
            ->groupBy('type_document_id')
            ->get();
        $courrierDepart=$courrierDepart[0]->courrierDepart;
        // dd($courrierDepart[0]->courrierDepart);

        $contratPersonnel = DB::table('documents')
            ->select(DB::raw('count(*) as contratPersonnel, type_document_id'))
            ->where('type_document_id', '=', 5)
            ->groupBy('type_document_id')
            ->get();
        $contratPersonnel=$contratPersonnel[0]->contratPersonnel;
        //dd($contratPersonnel[0]-

        $contratClient = DB::table('documents')
            ->select(DB::raw('count(*) as contratClient, type_document_id'))
            ->where('type_document_id', '=', 3)
            ->groupBy('type_document_id')
            ->get();
        $contratClient=$contratClient[0]->contratClient;
        //dd($contratPersonnel[0]->contratPersonnel);

        $contratPrestaire = DB::table('documents')
            ->select(DB::raw('count(*) as contratPrestaire, type_document_id'))
            ->where('type_document_id', '=', 4)
            ->groupBy('type_document_id')
            ->get();
        $contratPrestaire=$contratPrestaire[0]->contratPrestaire;

        $facture = DB::table('documents')
            ->select(DB::raw('count(*) as facture, type_document_id'))
            ->where('type_document_id', '=', 7)
            ->groupBy('type_document_id')
            ->get();
        $facture=$facture[0]->facture;
        //dd($contratPersonnel[0]->contratPersonnel);
        //return view('dashboard',['courrierArrive' => $courrierArrive[0]->courrierArrive],
                                    //  ['courrierDepart' => $courrierDepart[0]->courrierDepart]
                                    //    );

        return view('dashboard',compact('courrierArrive','courrierDepart','contratPersonnel',
                                              'contratClient','contratPrestaire','facture','courrierArrives'));
    }
}
