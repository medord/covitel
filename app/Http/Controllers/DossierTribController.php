<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Excel;


class DossierTribController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {

        $excelFile = $request->file('dossier_file');

        if(isset($excelFile)){


            $data = Excel::load($excelFile, function($reader) {
            })->get();

            if(!empty($data) && $data->count()){

                foreach ($data as $key => $value) {
                    var_dump($value);
                }
            }
        }else{
            $adversaires = [];
            $contrats = [];

            $idDossier = DB::table('dossiers')
                ->insertGetId([
                    'numeroDossier'=>rand(0,999999),
                    'typeDossier'=>$request->type_dossier,
                    'clientId'=>$request->id_client,
                    'dateCreation'=>date('Y-m-d H:i:s'),
                    'creationUtilisateurId'=>session('userid'),
                    'anneeDossier'=>date('Y')
                ]);
            $procList = $request->procList;
            $contratsList = $request->contratsList;
            $adversairesList = $request->adversairesList;

            foreach ($contratsList as $contrat){
                $contratId = DB::table('contrats')
                    ->insertGetId([
                        "referenceContrat"=>$contrat["cont_num"],
                        "montantCreance"=>$contrat["cont_creance"],
                        "dossierId"=>$idDossier,
                        "creationUtilisateurId"=>session('userid')
                    ]);
                array_push($contrats,$contratId);
            }

            foreach ($adversairesList as $adv){
                $advId = DB::table('adversaires')
                    ->insertGetId([
                        "dossierId"=>$idDossier,
                        "natureDebiteur"=>$adv["adv_type"],
                        "nomDebiteur"=>$adv["adv_nom"],
                        "adresse"=>$adv["adv_adresse"],
                        "villeId"=>$adv["adv_ville"],
                        "cin"=>$adv["adv_ref"]
                    ]);
                array_push($adversaires,$advId);
            }

            foreach ($procList as $proc){
                DB::table('dossiers_tribunaux')
                    ->insert([
                        "numeroTribunalCodeProcedure"=>$proc["proc_type"],
                        "numeroTribunalAnnee"=>date('Y'),
                        "adversairesId"=>implode(',',$adversaires),
                        "contratsId"=>implode(',',$contrats),
                        "procedureId"=>$proc["proc_type"],
                        "dossierId"=>$idDossier,
                        "montantCreance"=>$proc["proc_creance"],
                        "creanceAImprimer"=>$proc["proc_creance"],
                        "statutId"=>1,
                        "suiviId"=>1
                    ]);
            }

            return 'success';
        }
    }

    public function editDossierTrib(Request $request){

    }

    public function deleteDossierTrib($id){

    }
}
