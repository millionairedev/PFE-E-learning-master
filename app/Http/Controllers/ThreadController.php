<?php

namespace App\Http\Controllers;

use App\Thread;
use App\Filiere;
use Illuminate\Http\Request;
use DB;
use Mail;
use Auth;

class ThreadController extends Controller
{

    function __construct()
    {
    
    return $this->middleware('auth')->except('index');

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
            $threads=$filiere->threads;
        }
        else{
      $threads = Thread::paginate(15)->where("id",Auth::user()->filiere);
        }
        $fields = DB::table('filieres')->where("id",Auth::user()->filiere)->pluck("name","id");
        return view('thread.index', compact('threads'));




        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         if(auth()->user()->usertype == 'Etudiant'){

            abort(401,"unauthorized");
         }

        return view('thread.create');
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
             ['subject'=>'required|min:10',
            'filieres'=>'required'
            ,'thread'=>'required|min:10',
           


        ]);

        $thread=auth()->user()->threads()->create($request->all());

        $thread->filieres()->attach($request->filieres);

        if ($request->has('img'))
        {
            $thread->update(['img' => $request->file('img')->store('fichierdiscussion')]);
        }


        return back()->withMessage('Nouvelle Discussion crée !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show(Thread $thread)
    {
        return view('layouts.single', compact('thread'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        return view('thread.edit', compact('thread'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thread $thread)
    {
        if(auth()->user()->id != $thread->user_id){

            abort(401,"unauthorized");
         }

         $this->authorize('update',$thread);



         $this->validate($request, ['subject'=>'required|min:10',
             'filieres'=>'required',
             'thread'=>'required|min:10'
        ]);

        

         $thread->update($request->all());

         return redirect()->route('thread.show',$thread->id)->withMessage('Discussion mise a jour !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {

        if(auth()->user()->id != $thread->user_id){

            abort(401,"unauthorized");
         }

        $thread->delete();
        return redirect()->route('thread.index')->with('Discussion Supprimée !');
    }

    public function markAsSolution(Request $request)
    {

       $solutionId = $request->input('solutionId');
        $threadId = $request->input('threadId');
        $thread = Thread::find($threadId);
        $thread->solution = $solutionId;
        if ($thread->save()){
            if (request()->ajax()) {
                return response()->json(['status' => 'success', 'message' => 'marked as solution']);
            }
            return back()->withMessage('Marquer comme solution');
        }

    }
}
