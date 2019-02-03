<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Users;

class UserController extends Controller
{


    public function index()
    {
        if(session('userid')){
             return redirect('/dossier');

        }else{
            return redirect('/login');
        }
    }

    public function authUser(Request $request){
        $users = DB::table('utilisateurs')
            ->select("utilisateurId","nom", "prenom", "email", "motPasse")
            ->where('email', '=', $request->usermail)
            ->get();
        if(count($users)>0){
            if(password_verify($request->userpassword,$users[0]->motPasse)){
                session(['userid' => $users[0]->utilisateurId]);
                session(['userEmail' => $users[0]->email]);
                session(['userNom' => $users[0]->prenom.' '.$users[0]->nom]);
                return redirect('/dossier');
            }else{
                return redirect('/login')->with('passwordError','Wrong Password')->withInput();
            }
        }else{
            return redirect('/login')->with('emailError','Wrong Password')->withInput();
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

    public function show($id)
    {
        //
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
