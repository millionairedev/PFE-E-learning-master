<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Thread;
use App\Notifications\RepliedToThread;

class CommentController extends Controller
{
    

    public function addThreadComment(Request $request, Thread $thread)
    {
        $this->validate($request, [

          'body'=>'required'  

        ]);

    

        $thread->addComment($request->body);
        $thread->user->notify(new RepliedToThread($thread));

        return back()->withMessage('Commentaire ajoutée !');


    }

     

    public function addReplyComment(Request $request, Comment $comment)
    {
        $this->validate($request,[
            'body'=>'required'
        ]);

       
         $comment->addComment($request->body);

         auth()->user()->notify(new RepliedToThread());
        

        return back()->withMessage('Reponse crée !');
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        if($comment->user_id != auth()->user()->id)
            abort('401');

        $this->validate($request,[
            'body'=>'required'
        ]);

        $comment->update($request->all());

        return back()->withMessage('Commentaire mis a jours !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        if($comment->user_id != auth()->user()->id)
            abort('401');

        $comment->delete();

        return back()->withMessage('Commentaire Supprimé !');

    }
}
