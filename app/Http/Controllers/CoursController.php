<?php

namespace App\Http\Controllers;

use App\Cours;
use App\Filiere;
use App\Matiere;
use Illuminate\Http\Request;
use DB;
use Mail;
use Auth;
class CoursController extends Controller
{

     function __construct()
    {
    
    return $this->middleware('auth');

    }
    

     public function sendmail(){

    
    $mailtooo="tim8.alk8@gmail.com";

     $data = [];
    Mail::send('layouts.mail.coursmail', $data, function($message)  use ($mailtooo) {
      $message->to($mailtooo)
              ->subject('Nouveau cours ! ');
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
            $cours=$filiere->cours ?? '';

                
        }
    
   else if ($request->has('matieres')  )
        {
            $matis = Matiere::find($request->matieres);
            $cours=$matis->cours;
        }

        else {

       $cours = Cours::paginate(2);
       
    }  


     
      $matieres = DB::table("matieres")->where("filieres_id",Auth::user()->filiere)->get();
    return view('cours.index',compact('cours','matieres'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $fields = DB::table('filieres')->where("id",Auth::user()->filiere)->pluck("name","id");
        return view('cours.create',compact('fields'));
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


        $cour=auth()->user()->cours()->create($request->all());

        $cour->filieres()->attach($request->filieres);
        $cour->matieres()->attach($request->matiere);

         if ($request->has('fichier'))
        {
            $cour->update(['fichier' => $request->file('fichier')->store('fichierdiscussion')]);
        }
     
        return redirect()->route('cours.index')->with('success','Nouveau cours ajouté !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cours  $cours
     * @return \Illuminate\Http\Response
     */
    public function show(Cours $cour)
    {
        
       $fil_id = $cour->filieres;
       $mat_id = $cour->matiere;

       $fils = DB::table("filieres")->where("id",$fil_id)->first();
       $mats = DB::table("matieres")->where("id",$mat_id)->first();
     $matieres = DB::table("matieres")->where("filieres_id",Auth::user()->filiere)->pluck("name","id");
     return view('cours.single', compact('cour','fils','mats','matieres'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cours  $cours
     * @return \Illuminate\Http\Response
     */
    public function edit(Cours $cour)
    {
         $fields = DB::table('filieres')->where("id",Auth::user()->filiere)->pluck("name","id");
    return view('cours.edit', compact('cour','fields'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cours  $cours
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cours $cour)
    {
        if(auth()->user()->id != $cour->user_id){

            abort(401,"acces non authorisé");
         }

         $this->validate($request, 
             [
                'titre'=>'required',
                'matiere'=>'required',
                'filieres'=>'required',
           
        ]);

         $cour->update($request->all());
         if ($request->has('fichier'))
        {
            $cour->update(['fichier' => $request->file('fichier')->store('fichierdiscussion')]);
        }

         return redirect()->route('cours.index',$cour->id)->with('success','Cours mis a jour !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cours  $cours
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cours $cour)
    {    

        if(auth()->user()->id != $cour->user_id){

            abort(401,"acces non authorisé");
         }


        $cour->delete();
         return redirect()->route('cours.index',$cour->id)->with('success','Cours supprimé !');

    }


            public function getMatieres($id) 
            {        
                $matieres = DB::table("matieres")->where("filieres_id",$id)->pluck("name","id");
                return json_encode($matieres);

            }


    }