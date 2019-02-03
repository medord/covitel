<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
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


    public function add(Request $request)
    {


        $clientId = DB::table('clients')->insertGetId([
            'nomClient' => $request->addCl_nom,
            'adresseClient' => $request->addCl_adresse,
            'villeId' => $request->addCl_ville,
            'typeClient' => $request->addCl_type
        ]);

        $newClient = DB::table('clients')
            ->select('*')
            ->where('clientId','=',$clientId)->get();

        //return redirect("/dashboard");

        return response()->json([
            'type' => 'success',
            'client' => $newClient[0]
        ]);
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
