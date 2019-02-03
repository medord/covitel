<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FacturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
            $list_villes = DB::table('villes')
                ->select('*')
                ->get();

            return view('pages.factures')->with([
                'list_clients'=>$list_clients,
                'list_contrats'=>$list_contrats,
                'list_procedures'=>$list_procedures,
                'list_tribunals'=>$list_tribunals,
                'list_villes'=>$list_villes
            ]);
        }else{
            return redirect('/login');
        }
    }

    public function getClientDepences(Request $request){

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
