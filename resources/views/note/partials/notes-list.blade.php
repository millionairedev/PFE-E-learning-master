<table class="table table-bordered table-hover ">
  @forelse($notes as $nts)
  <thead>
    <tr>
      <th scope="col">Titre</th>
     <th scope="col">Professeur</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td scope="row"><a href="{{route('note.show',$nts->id)}}"> {{$nts->titre}}</a></td>
      <td><p> <a href="{{route('user_profile',$nts->user->name ?? '')}}">{{$nts->user->name ?? ''}}</a> {{$nts->created_at->diffForHumans()}}</p></td>
     @empty
        <h5>Aucune Note</h5>
    </tr> 
    @endforelse
  </tbody>
</table>


