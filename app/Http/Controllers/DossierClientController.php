<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DossierClientController extends Controller
{
    public function getNotifs(){
        /*$notifs = [];

        $fact_notifs = DB::select('factures')
            ->get();*/
    }

    public function index()
    {
        if(session('userid')){
            $list_procedures = DB::table('procedures')
                ->select('*')
                ->get();

            /*$list_tribunals = DB::table('tribunals')
                ->select('*')
                ->get();*/

            $list_clients = DB::table('clients')
                ->select('*')
                ->get();
            $list_contrats = DB::table('contrats')
                ->select('*')
                ->get();
            $list_villes = DB::table('villes')
                ->select('*')
                ->get();

            return view('pages.dossier')->with([
                'list_clients'=>$list_clients,
                'list_contrats'=>$list_contrats,
                'list_procedures'=>$list_procedures,
                //'list_tribunals'=>$list_tribunals,
                'list_villes'=>$list_villes
            ]);
        }else{
            return redirect('/login');
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function search($id=null)
    {

        if(session('userid')){
            $list_procedures = DB::table('procedures_judics')
                ->select('*')
                ->get();

            $list_tribunals = DB::table('tribunals')
                ->select('*')
                ->get();

            $list_clients = DB::table('clients')
                ->select('*')
                ->get();
            $list_contrats = DB::table('contrats')
                ->select('*')
                ->get();
            $list_status = DB::table('etapes_judic')
                ->select('id','libelleEtape')
                ->get();

            if(isset($id)){
                $dossier_client = DB::table('dossier_clients')
                    ->join('clients','dossier_clients.idClient','=','clients.id')
                    ->select('dossier_clients.id','clients.nomClient','dateDossier','typeDossier')
                    ->where('dossier_clients.id','=',$id)
                    ->get()->first();
                $dossier_tribs_client = DB::table('dossier_tribs')
                    ->join('tribunals','dossier_tribs.idTribunal','=','tribunals.id')
                    ->join('procedures_judics','dossier_tribs.idProc','=','procedures_judics.id')
                    ->join('etapes_judic','dossier_tribs.status','=','etapes_judic.id')
                    ->select('*')
                    ->where('dossier_tribs.idDossierClient','=',$dossier_client->id)
                    ->get();

                for ($i = 0; $i<$dossier_tribs_client->count(); $i++){
                    $adversaires = explode(",",$dossier_tribs_client[0]->adversaires);
                    $adv_query = DB::table("adversaires")
                        ->select("id","nomAdv")
                        ->whereIn("id",$adversaires)
                        ->get();
                    $dossier_tribs_client[$i]->adversaires = $adv_query;

                    $contrats = explode(",",$dossier_tribs_client[0]->contrats);
                    $conts_query = DB::table("contrats")
                        ->select("id","numContrat")
                        ->whereIn("id",$contrats)
                        ->get();
                    $dossier_tribs_client[$i]->contrats = $conts_query;
                }
                return view('pages.searchDossier')->with([
                    'dossier_client'=>$dossier_client,
                    'dossier_tribs_client'=>$dossier_tribs_client,
                    'list_clients'=>$list_clients,
                    'list_contrats'=>$list_contrats,
                    'list_procedures'=>$list_procedures,
                    'list_tribunals'=>$list_tribunals,
                    'list_status'=>$list_status
                ]);
            }else{

                $list_dossiers = DB::table('dossier_clients')
                    ->join('clients','dossier_clients.idClient','=','clients.id')
                    ->select('dossier_clients.id','clients.nomClient','dateDossier','typeDossier')
                    ->get();
                return view('pages.searchDossier')->with([
                    'list_dossiers'=>$list_dossiers,
                    'list_clients'=>$list_clients,
                    'list_contrats'=>$list_contrats,
                    'list_procedures'=>$list_procedures,
                    'list_tribunals'=>$list_tribunals,
                ]);
            }

        }else{
            return redirect('/login');
        }

    }

    public function show($id)
    {


    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
