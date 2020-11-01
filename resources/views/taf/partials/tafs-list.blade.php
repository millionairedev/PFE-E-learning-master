<table class="table table-bordered table-hover ">
  @forelse($tafs as $tfs)
  <thead>
    <tr>
      <th scope="col">Titre</th>
     <th scope="col">Professeur</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td scope="row"><a href="{{route('taf.show',$tfs->id)}}"> {{$tfs->titre}}</a></td>
      <td><p> <a href="{{route('user_profile',$tfs->user->name ?? '')}}">{{$tfs->user->name ?? ''}}</a> {{$tfs->created_at->diffForHumans()}}</p></td>
     @empty
        <h5>Aucun Travail à faire ! </h5>
    </tr> 
    @endforelse
  </tbody>
</table>