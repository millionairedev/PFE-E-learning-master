<div class="list-group">
  <div class="col-sm-9">
      
        @forelse($threads as $thread)
      <h4><small>AVIS RECENTS</small></h4>
      <hr>
      <h3><small><a href="{{route('thread.show',$thread->id)}}"> {{$thread->subject}}</a><small></h3>
      <h5><span class="glyphicon glyphicon-time"></span>  Publié par : <a href="{{route('user_profile',$thread->user->name ?? '')}}">{{$thread->user->name ?? ''}}</a> {{$thread->created_at->diffForHumans()}}</h5>
      <br>
      <h5>{{\Illuminate\Support\Str::limit($thread->thread,100) }}.</h5>
      <br><br>
      <hr>
      

     @empty
        <h5>Aucun avis :( </h5>
  @endforelse

</div>