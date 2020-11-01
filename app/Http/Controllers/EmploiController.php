<?php

namespace App\Http\Controllers;

use App\Emploi;
use App\Filiere;
use Illuminate\Http\Request;
use DB;

class EmploiController extends Controller
{
   
    function __construct()
    {
    
    return $this->middleware('auth');

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


        if ($request->has('filiere'))
        {
            $filiere = Filiere::find($request->filiere);
            $emplois=$filiere->emplois;
        }
        else{
        $emplois = Emploi::paginate(15);
}
return view('emploi.index', compact('emplois'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         if(auth()->user()->usertype != 'admin'){

            abort(401,"unauthorized");
         }

        return view('emploi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, 
             ['titre'=>'required',
            'filieres'=>'required',
            'fichier'=>'required',
           


        ]);

        $emploi=auth()->user()->emplois()->create($request->all());

        $emploi->filieres()->attach($request->filieres);

        if ($request->has('fichier'))
        {
            $emploi->update(['fichier' => $request->file('fichier')->store('fichierdiscussion')]);
        }


        return redirect()->route('emploi.index')->with('success','Nouvel emploi ajouté !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Emploi  $emploi
     * @return \Illuminate\Http\Response
     */
    public function show(Emploi $emploi)
    {
       $fil_id = $emploi->filieres;

       $fils = DB::table("filieres")->where("id",$fil_id)->first();

        return view('emploi.single', compact('emploi','fils'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Emploi  $emploi
     * @return \Illuminate\Http\Response
     */
    public function edit(Emploi $emploi)
    {
        return view('emploi.edit', compact('emploi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Emploi $emploi)
    {
        if(auth()->user()->usertype != 'admin'){

            abort(401,"unauthorized");
         }

         $this->authorize('update',$emploi);



         $this->validate($request, [
             'titre'=>'required',
            'filieres'=>'required',
            'fichier'=>'required',
           
        ]);

        

         $emploi->update($request->all());

         return redirect()->route('emploi.index',$emploi->id)->with('success','Emploi mis a jour !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Emploi  $emploi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->user()->usertype != 'admin'){

            abort(401,"unauthorized");
         }

        $emp = Emploi::find($id);
        $emp->delete();
        return redirect()->route('emploi.index')->with('success','Emploi Supprimmé !');
    }

   
}
