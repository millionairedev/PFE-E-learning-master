<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use DataTables;

class ProfesseurController extends Controller
{
    public function index()
    {

      $users = User::where('usertype', 'Professeur')->get();


        return view('Admin.Utilisateurs.professeurs')->with('users',$users);
    }


     public function store(Request $request)
    {

    $this->validate($request,[
        'name'=>'required',
        'phone'=>'required',
        'adress'=>'required',
        'cni'=>'required',
        'cne'=>'required',
        'email'=>'required',
        'usertype'=>'required',

    ]);

    $usrs = new User;
    $usrs->name = $request->input('name');
    $usrs->phone = $request->input('phone');
    $usrs->email = $request->input('email');
    $usrs->adress = $request->input('adress');
    $usrs->cni = $request->input('cni');
    $usrs->cne = $request->input('cne');
    $usrs->usertype = $request->input('usertype'); 
    $usrs->save();

   return redirect('/admin-professeurs')->with('success','Professeur ajouté !');
    }



    public function update(Request $request, $id)
    {

    $this->validate($request,[
        'name'=>'required',
        'phone'=>'required',
        'adress'=>'required',
        'cni'=>'required',
        'cne'=>'required',
        'email'=>'required',
        'usertype'=>'required',

    ]);

    $usrs = User::find($id);
    $usrs->name = $request->input('name');
    $usrs->phone = $request->input('phone');
    $usrs->email = $request->input('email');
    $usrs->adress = $request->input('adress');
    $usrs->cni = $request->input('cni');
    $usrs->cne = $request->input('cne');
    $usrs->usertype = $request->input('usertype'); 
    $usrs->save();
    $usrs->save();

   return redirect('/admin-professeurs')->with('success','Professeur modifié ');
    }


    public function destroy($id)
    {
      $usrs = User::find($id);
      $usrs->delete();
     return redirect('/admin-professeurs')->with('success','Professeur supprimé ');
    }
}
