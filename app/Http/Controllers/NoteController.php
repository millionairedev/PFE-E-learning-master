<?php

namespace App\Http\Controllers;

use App\Note;
use App\Filiere;
use App\Matiere;
use Illuminate\Http\Request;
use DB;
use Mail;
use Auth;
class NoteController extends Controller
{


     function __construct()
    {
    
    return $this->middleware('auth');

    }

public function sendmail(){

    $mailtooo="tim8.alk8@gmail.com";


     $data = DB::table('filieres')->where("id",Auth::user()->filiere)->pluck("name","id")->toArray();
    Mail::send('layouts.mail.notemail', $data, function($message)  use ($mailtooo) {
      $message->to($mailtooo )
              ->subject('Affichage notes ! ');
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
         if ($request->has('filieres'))
        {

            $filiere = Filiere::find($request->filieres);
            $notes=$filiere->notes ?? '';

                
        }
    
   else if ($request->has('matiere')  )
        {
            $matis = Matiere::find($request->matiere);
            $notes=$matis->notes;
         
        }

        else {

       $notes = Note::paginate(5);
       
    }  



     
      $matieres = DB::table("matieres")->where("filieres_id",Auth::user()->filiere)->get();
    return view('note.index',compact('notes','matieres'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $fields = DB::table('filieres')->where("id",Auth::user()->filiere)->pluck("name","id");
        return view('note.create',compact('fields'));
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


        $note=auth()->user()->notes()->create($request->all());

        $note->filieres()->attach($request->filieres);
        $note->matieres()->attach($request->matiere);

         if ($request->has('fichier'))
        {
            $note->update(['fichier' => $request->file('fichier')->store('fichierdiscussion')]);
        }
     
        return redirect()->route('note.index')->withMessage('Nouvelles notes ajoutées !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        
       $fil_id = $note->filieres;
       $mat_id = $note->matiere;

       $fils = DB::table("filieres")->where("id",$fil_id)->first();
       $mats = DB::table("matieres")->where("id",$mat_id)->first();
     $matieres = DB::table("matieres")->where("filieres_id",Auth::user()->filiere)->pluck("name","id");
     return view('note.single', compact('note','fils','mats','matieres'));
    }

    /**
     * Show the form for editing the specified resource.
     *
      * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
    return view('note.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cours  $cours
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        if(auth()->user()->id != $note->user_id){

            abort(401,"acces non authorisé");
         }

         $this->validate($request, 
             [
                'titre'=>'required',
                'matieres'=>'required',
                'filieres'=>'required',
           
        ]);

         $note->update($request->all());
         if ($request->has('fichier'))
        {
            $note->update(['fichier' => $request->file('fichier')->store('fichierdiscussion')]);
        }

         return redirect()->route('note.index',$note->id)->withMessage('Notes mises a jour !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {    

        if(auth()->user()->id != $note->user_id){

            abort(401,"acces non authorisé");
         }


         $note->delete();
         return redirect()->route('note.index',$note->id)->withMessage('Notes supprimées !');

    }


      public function getMatieres($id) 
        {        
             $matieres = DB::table("matieres")->where("filieres_id",$id)->pluck("name","id");
             return json_encode($matieres);

      }


    }