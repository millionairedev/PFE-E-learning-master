<?php

namespace App\Http\Controllers;

use App\Matiere;
use Illuminate\Http\Request;
use DataTables;
use DB;

class MatiereController extends Controller
{
    public function index()
    {

      $matieres = DB::table('matieres')->get();


        return view('Admin.matieres')->with('matieres',$matieres);
    }


     public function store(Request $request)
    {

    $this->validate($request,[
        'name'=>'required',
        'filieres_id'=>'required',

    ]);

    $mat = new Matiere;
    $mat->name = $request->input('name');
    $mat->filieres_id = $request->input('filieres_id');
    $mat->save();

   return redirect('/admin-matieres')->with('success','Nouvelle matiere ajoutée !');
    }



    public function update(Request $request, $id)
    {

    $this->validate($request,[
        'name'=>'required',
        'filieres_id'=>'required',
   
    ]);

    $mat = Matiere::find($id);
    $mat->name = $request->input('name');
    $mat->filieres_id = $request->input('filieres_id');
    $mat->save();


   return redirect('/admin-matieres')->with('success','Matiere modifiée ');
    }


    public function destroy($id)
    {
      $mat = Matiere::find($id);
      $mat->delete();
     return redirect('/admin-matieres')->with('success','Matiere supprimée ');
    }
}
