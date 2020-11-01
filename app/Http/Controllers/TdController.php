<?php

namespace App\Http\Controllers;

use App\Td;
use App\Filiere;
use App\Matiere;
use Illuminate\Http\Request;
use DB;
use Auth;
use Mail;

class TdController extends Controller
{


     function __construct()
    {
    
    return $this->middleware('auth');

    }

  public function sendmail(){

    $mailtooo="tim8.alk8@gmail.com";

     $data = [];
    Mail::send('layouts.mail.tdmail', $data, function($message)  use ($mailtooo) {
      $message->to($mailtooo )
              ->subject('Nouveau Td(s) ! ');
      $message->from('info@gmail.com','Fsjes E-learning');

    });
    return redirect('/');
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (session('success'))
         {
            alert()->success('Success !',session('success'));

          }




         if ($request->has('filieres'))
        {

            $filiere = Filiere::find($request->filieres);
            $tds=$filiere->tds ?? '';

                
        }
    
   else if ($request->has('matiere')  )
        {
            $matis = Matiere::find($request->matiere);
            $tds=$matis->tds;
         
        }

    else {

     $tds = Td::paginate(5); 

     }  


     $matieres = DB::table("matieres")->where("filieres_id",Auth::user()->filiere)->get();
    return view('td.index',compact('tds','matieres'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $fields = DB::table('filieres')->where("id",Auth::user()->filiere)->pluck("name","id");
        return view('td.create',compact('fields'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
if(auth()->user()->usertype != 'Professeur'){

            abort(401,"acces non authorisé");
         }

        $this->validate($request, 
             [
                'titre'=>'required',
                'matiere'=>'required',
                'filieres'=>'required',
           
        ]);


        $td=auth()->user()->tds()->create($request->all());

        $td->filieres()->attach($request->filieres);
        $td->matieres()->attach($request->matiere);

         if ($request->has('fichier'))
        {
            $td->update(['fichier' => $request->file('fichier')->store('fichierdiscussion')]);
        }
     
        return redirect()->route('td.index')->with('success','Nouveau td ajouté !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Td  $td
     * @return \Illuminate\Http\Response
     */
    public function show(Td $td)
    {
        
       $fil_id = $td->filieres;
       $mat_id = $td->matiere;

       $fils = DB::table("filieres")->where("id",$fil_id)->first();
       $mats = DB::table("matieres")->where("id",$mat_id)->first();
       $matieres = DB::table("matieres")->where("filieres_id",Auth::user()->filiere)->pluck("name","id");
     return view('td.single', compact('td','fils','mats','matieres'));
    }

    /**
     * Show the form for editing the specified resource.
     *
      * @param  \App\Td  $td
     * @return \Illuminate\Http\Response
     */
    public function edit(Td $td)
    {
    return view('td.edit', compact('td'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cours  $cours
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Td $td)
    {
        if(auth()->user()->id != $td->user_id){

            abort(401,"acces non authorisé");
         }

         $this->validate($request, 
             [
                'titre'=>'required',
                'matieres'=>'required',
                'filieres'=>'required',
           
        ]);

         $td->update($request->all());
         if ($request->has('fichier'))
        {
            $td->update(['fichier' => $request->file('fichier')->store('fichierdiscussion')]);
        }

         return redirect()->route('td.index',$td->id)->with('success','Td mis a jour !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Td  $td
     * @return \Illuminate\Http\Response
     */
    public function destroy(Td $td)
    {    

        if(auth()->user()->id != $td->user_id){

            abort(401,"acces non authorisé");
         }


         $td->delete();
         return redirect()->route('td.index',$td->id)-->with('success','Td supprimé !');

    }


      public function getMatieres($id) 
        {        
             $matieres = DB::table("matieres")->where("filieres_id",$id)->pluck("name","id");
             return json_encode($matieres);

      }


    }