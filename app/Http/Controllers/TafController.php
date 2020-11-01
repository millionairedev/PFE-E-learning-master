<?php

namespace App\Http\Controllers;

use App\Taf;
use App\Filiere;
use App\Matiere;
use Illuminate\Http\Request;
use DB;
use Mail;
use Auth;

class TafController extends Controller
{
     function __construct()
    {
    
    return $this->middleware('auth');

    }

  public function sendmail(){

    $mailtooo="tim8.alk8@gmail.com";

     $data = [];
    Mail::send('layouts.mail.tafmail', $data, function($message)  use ($mailtooo) {
      $message->to($mailtooo )
              ->subject('Nouveau travail a faire ! ');
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
            $tafs=$filiere->tafs ?? '';

                
        }
    
   else if ($request->has('matiere')  )
        {
            $matis = Matiere::find($request->matiere);
            $tafs=$matis->tafs;
         
        }

    else {

     $tafs = Taf::paginate(5); 

     }  


     $matieres = DB::table("matieres")->where("filieres_id",Auth::user()->filiere)->get();
    return view('taf.index',compact('tafs','matieres'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $fields = DB::table('filieres')->where("id",Auth::user()->filiere)->pluck("name","id");
        return view('taf.create',compact('fields'));
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


        $taf=auth()->user()->tafs()->create($request->all());

        $taf->filieres()->attach($request->filieres);
        $taf->matieres()->attach($request->matiere);

         if ($request->has('fichier'))
        {
            $taf->update(['fichier' => $request->file('fichier')->store('fichierdiscussion')]);
        }
     
        return redirect()->route('taf.index')->with('success','Nouveau tàf ajouté !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Taf  $taf
     * @return \Illuminate\Http\Response
     */
    public function show(Taf $taf)
    {
        
       $fil_id = $taf->filieres;
       $mat_id = $taf->matiere;

       $fils = DB::table("filieres")->where("id",$fil_id)->first();
       $mats = DB::table("matieres")->where("id",$mat_id)->first();
     $matieres = DB::table("matieres")->where("filieres_id",Auth::user()->filiere)->pluck("name","id");
     return view('taf.single', compact('taf','fils','mats','matieres'));
    }

    /**
     * Show the form for editing the specified resource.
     *
      * @param  \App\Taf  $taf
     * @return \Illuminate\Http\Response
     */
    public function edit(Taf $taf)
    {
    return view('taf.edit', compact('taf'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cours  $cours
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Taf $taf)
    {
        if(auth()->user()->id != $taf->user_id){

            abort(401,"acces non authorisé");
         }

         $this->validate($request, 
             [
                'titre'=>'required',
                'matieres'=>'required',
                'filieres'=>'required',
           
        ]);

         $taf->update($request->all());
         if ($request->has('fichier'))
        {
            $taf->update(['fichier' => $request->file('fichier')->store('fichierdiscussion')]);
        }

         return redirect()->route('taf.index',$taf->id)->with('success','Tàf mis a jour !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Taf  $taf
     * @return \Illuminate\Http\Response
     */
    public function destroy(Taf $taf)
    {    

        if(auth()->user()->id != $taf->user_id){

            abort(401,"acces non authorisé");
         }


         $taf->delete();
         return redirect()->route('taf.index',$taf->id)-->with('success','Taf supprimé !');

    }


      public function getMatieres($id) 
        {        
             $matieres = DB::table("matieres")->where("filieres_id",$id)->pluck("name","id");
             return json_encode($matieres);

      }


    }