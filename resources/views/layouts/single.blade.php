@extends('layouts.front')
@section('category')
<div class="col-md-3">

 <nav class="nav-sidebar">
    
                <ul class="nav">
                @if(auth()->user() != null && auth()->user()->usertype == 'Etudiant' )
                  <li><a class="btn btn-success" href="{{route('thread.create')}}"> Creer Avis <i class="glyphicon glyphicon-plus"></i> </a></li>
              @endif
      
                   
    <li><a href="{{route('thread.index',['filieres'=>Auth::user()->filiere ?? ''])}}" class="btn-default" style="text-align: center;">
  <span class="badge"></span>Touts les Avis</a><li>
                    
                </ul>
            </nav>
          </div>
            @endsection
@section('content')
<div class="content-wrap-well">
<h4>{{$thread->subject}}</h4>
<hr>

<div class="thread-detais">
	 {!! \Michelf\Markdown::defaultTransform($thread->thread)  !!}
</div>
<br>
@if($thread->img != null)
<iframe  width="100%" height="500px" src="{{asset("storage/$thread->img")}}"> 
</iframe>
@endif
@can('update',$thread)
<div class="actions">
	<a href="{{route('thread.edit',$thread->id)}}" class="inline-it" method="POST">Modifier</a>

	<form action="{{route('thread.destroy',$thread->id)}}" method="POST" class="inline-it">
	{{csrf_field()}}
	{{method_field('DELETE')}}
	<input class="btn btn-xs btn-danger" value="Supprimer" type="submit" name="Delete">	
    </form>	
		
</div>
@endcan

</div>
<hr>
<br>

@foreach($thread->comments as $comment)
<div class="comment-list well well-lg">
	
	@include('layouts.partials.comment-list')
</div>

<hr>

 <button class="btn btn-xs btn-default" onclick="toggleReply('{{$comment->id}}')">Repondre</button>

<br>
 

<div class="reply-form-{{$comment->id}} hidden">
	<form action="{{route('replycomment.store',$comment->id)}}" method="POST" role="form">
		{{csrf_field()}}
		<legend>Repondre</legend>
		<div class="form-group">
		<input type="text" class="form-control" id="" name="body">
		</div>
		<button class="btn btn-primary" type="submit">Repondre</button>
	</form>
	</div>

	@foreach($comment->comments as $reply)
	<div class="small well text-info reply-list" style="margin-left: 40px;">
	<p>{{$reply->body}}</p>
	<lead>{{$reply->user->name}}</lead>
<div class="actions">

		 <a data-toggle="modal" href="#{{$reply->id}}" class="btn btn-primary btn-xs">Modifier</a>

  <!-- Modal -->
  <div class="modal fade" id="{{$reply->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Modal title</h4>
        </div>
        <div class="modal-body">

          <div class="comment-form">
	<form action="{{route('comment.update',$reply->id)}}" method="POST" role="form">
		{{csrf_field()}}
		{{method_field('put')}}
		<legend>Modifier commentaire</legend>
		<div class="form-group">
		<input type="text" class="form-control" value="{{$reply->body}}" id="" name="body">
		</div>
		<button class="btn btn-primary" type="submit">Modifier Reponse</button>
	</form>
</div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->




	
	<form action="{{route('comment.destroy',$reply->id)}}" method="POST" class="inline-it">
	{{csrf_field()}}
	{{method_field('DELETE')}}
	<input class="btn btn-xs btn-danger" value="Supprimer" type="submit" name="Delete">	
    </form>	
		
		</div>

	</div>
    @endforeach

	

	@endforeach
</div>
<br><br>
<div class="comment-form">
	<form action="{{route('threadcomment.store',$thread->id)}}" method="POST" role="form">
		{{csrf_field()}}
		<legend>Ajouter commentaire</legend>
		<div class="form-group">
		<input type="text" class="form-control" id="" name="body">
		</div>
		<button class="btn btn-primary" type="submit">Commenter</button>
	</form>
</div>
@endsection



<script type="text/javascript">
function toggleReply(commentId) {
  $('.reply-form-'+commentId).toggleClass('hidden');
}

</script>

