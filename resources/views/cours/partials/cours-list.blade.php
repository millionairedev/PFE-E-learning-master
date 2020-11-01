
<table class="table table-bordered table-hover ">
  @forelse($cours as $crs)
  <thead>
    <tr>
      <th scope="col">Titre</th>
     <th scope="col">Professeur</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td scope="row"><a href="{{route('cours.show',$crs->id)}}"> {{$crs->titre}}</a></td>
      <td><p> <a href="{{route('user_profile',$crs->user->name ?? '')}}">{{$crs->user->name ?? ''}}</a> {{$crs->created_at->diffForHumans()}}</p></td>
     @empty
        <h5>Aucun cours</h5>
    </tr> 
    @endforelse
  </tbody>
</table>


