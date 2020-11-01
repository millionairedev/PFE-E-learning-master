<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Comment;

class LikeController extends Controller
{
    public function toggleLike(Request $request)
   {
       $commentId=$request->input('commentId');
       $comment=Comment::find($commentId);

        if(!$comment->isLiked()){
            $comment->likeIt();
            return response()->json(['status'=>'success','message'=>'liked']);

        }else{
            $comment->unlikeIt();
            return response()->json(['status'=>'success','message'=>'unliked']);

        }


   }
}
