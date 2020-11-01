<?php

namespace App\Http\Controllers;

use App\Filiere;
use Illuminate\Http\Request;
use DataTables;
use DB;

class FiliereController extends Controller
{
    public function index()
    {

      $filieres = DB::table('filieres')->get();


        return view('Admin.filieres')->with('filieres',$filieres);
    }


     public function store(Request $request)
    {

    $this->validate($request,[
        'name'=>'required',
        

    ]);

    $fil = new Filiere;
    $fil->name = $request->input('name');
    $fil->save();

   return redirect('/admin-filieres')->with('success','Nouvelle filiere ajoutée !');
    }



    public function update(Request $request, $id)
    {

    $this->validate($request,[
        'name'=>'required',
   
    ]);

    $fil = Filiere::find($id);
    $fil->name = $request->input('name');
 
    $fil->save();


   return redirect('/admin-filieres')->with('success','Filiere modifiée ');
    }


    public function destroy($id)
    {
      $fil = Filiere::find($id);
      $fil->delete();
     return redirect('/admin-filieres')->with('success','Filiere supprimée ');
    }
}
