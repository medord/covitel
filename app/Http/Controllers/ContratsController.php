<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContratsController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function add(Request $request)
    {
        DB::table('contrats')->insert([
            'numContrat' => $request->addCont_num
        ]);

        return redirect("/dossier");
    }


    public function edit($id)
    {
        //
    }

    public function show($id)
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
