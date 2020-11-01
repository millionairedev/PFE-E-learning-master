<h4>{{$comment->body}}</h4>
@if(!empty($thread->solution))
    @if($thread->solution == $comment->id)
        <button class="btn btn-success pull-right">Solution</button>
    @endif

@else
    @can('update',$thread)
            <div  class="btn btn-success pull-right" onclick="markAsSolution('{{$thread->id}}','{{$comment->id}}',this)">Marquer comme solution</div>
    @endcan
      

@endif



	<lead>{{$comment->user->name}}</lead>

	<div class="actions">

    <button class="btn btn-default btn-xs" id="{{$comment->id}}-count" >{{$comment->likes()->count()}}</button>
    <span  class="btn btn-default btn-xs  {{$comment->isLiked()?"liked":""}}" onclick="likeIt('{{$comment->id}}',this)"><span class="glyphicon glyphicon-heart"></span></span>
		 <a data-toggle="modal" href="#{{$comment->id}}" class="btn btn-primary btn-xs">Modifier</a>

  <!-- Modal -->
  <div class="modal fade" id="{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Modal title</h4>
        </div>
        <div class="modal-body">

          <div class="comment-form">
	<form action="{{route('comment.update',$comment->id)}}" method="POST" role="form">
		{{csrf_field()}}
		{{method_field('put')}}
		<legend>Modifier commentaire</legend>
		<div class="form-group">
		<input type="text" class="form-control" value="{{$comment->body}}" id="" name="body">
		</div>
		<button class="btn btn-primary" type="submit">Modifier Commentaire</button>
	</form>
</div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


	
	<form action="{{route('comment.destroy',$comment->id)}}" method="POST" class="inline-it">
	{{csrf_field()}}
	{{method_field('DELETE')}}
	<input class="btn btn-xs btn-danger" value="Supprimer" type="submit" name="Delete">	
    </form>	
		</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>


    <script type="text/javascript">
        function markAsSolution(threadId, solutionId,elem) {
            var csrfToken='{{csrf_token()}}';
            $.post('{{route('markAsSolution')}}', {solutionId: solutionId, threadId: threadId,_token:csrfToken}, function (data) {
                $(elem).text('Solution');
            });
        }

        function likeIt(commentId,elem){
            var csrfToken='{{csrf_token()}}';
            var likesCount=parseInt($('#'+commentId+"-count").text());
            $.post('{{route('toggleLike')}}', {commentId: commentId,_token:csrfToken}, function (data) {
                console.log(data);
               if(data.message==='liked'){
                   $(elem).addClass('liked');
                   $('#'+commentId+"-count").text(likesCount+1);
//                   $(elem).css({color:'red'});
               }else{
//                   $(elem).css({color:'black'});
                   $('#'+commentId+"-count").text(likesCount-1);
                   $(elem).removeClass('liked');
               }
            });
          }


    </script>

